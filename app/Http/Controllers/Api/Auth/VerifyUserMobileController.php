<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifiedUserRequest;
use App\Models\User;
use App\Services\CheckExpireToken;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

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

            //  return $request;

            // get bearerToken token from request
            $token = $request->bearerToken();

            // get last token row from token table
            // return $token = PersonalAccessToken::findToken($token);


            // get user by token
            // $token = PersonalAccessToken::findToken($token);
            // $user = $token->tokenable;

            // get all tokens belong to current user
            // $token = $user->tokens;

            // $token = '';

            $response = [
                'user' => $user->name,
                'mobile' => $user->mobile,
                'verifiedCode' => $user->token,
                'token' => $token,
            ];
            return response()->json(['response' => $response, 'status' => 200], 200);

        }


    }
}
