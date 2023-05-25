<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifiedUserRequest;
use App\Models\User;
use App\Services\CheckExpireToken;
use Illuminate\Support\Facades\Auth;

class VerifyUserMobileController extends Controller
{
    //


    public function verifiedMobile(VerifiedUserRequest $request)
    {
        $expire = CheckExpireToken::checkExpireToken($request->token, $request->mobile);

        if ($expire == false) {
            session()->flash('error', 'کد فعالسازی معتبر نمی باشد.');
            return redirect()->route('verified.mobile.form');

        }
        if ($user = User::where(['mobile' => $request->mobile, 'token' => $request->token])->first()) {

            if ($request->filled('remember')) {
                Auth::login($user, $remember = true);
                return redirect()->route('home');
            }
            Auth::login($user);
            return redirect()->route('home');

        }

        return redirect()->route('login.form');

    }
}
