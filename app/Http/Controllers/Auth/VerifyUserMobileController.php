<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\CheckExpireToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyUserMobileController extends Controller
{
    //
    public function verifiedMobileForm()
    {

        return view('auth_front.verify_mobile');
    }

    public function verifiedMobile(Request $request)
    {

        $expire = CheckExpireToken::checkAdminToken($request->token, $request->mobile);

        if ($expire == false) {
            return redirect()
                ->route('verified.mobile.form')
                ->with(['error' => 'کد فعالسازی معتبر نمی باشد.']);
        }
        if ($user = User::where(['mobile' => $request->mobile, 'token' => $request->token])->first()) {
            Auth::login($user, $remember = true);
            return redirect()->route('home');
        }

        return redirect()->route('login.form');

    }
}
