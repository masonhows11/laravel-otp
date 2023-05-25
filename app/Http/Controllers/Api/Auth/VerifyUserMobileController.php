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


    public function verifyMobile(VerifiedUserRequest $request)
    {
        $expire = CheckExpireToken::checkExpireToken($request->token, $request->mobile);

        if ($expire == false) {
            return response()->json(['response' => 'کد فعال سازی معتبر نمی باشد', 'status' => 200], 200);
        }
        if ($user = User::where(['mobile' => $request->mobile, 'token' => $request->token])->first()) {

            //            if ($request->filled('remember')) {
            //                Auth::login($user, $remember = true);
            //                return redirect()->route('home');
            //            }
            //            Auth::login($user);
            //            return redirect()->route('home');


        }

        return redirect()->route('login.form');

    }
}
