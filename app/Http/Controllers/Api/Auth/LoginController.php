<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use App\Services\GenerateToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    //


    public function login(LoginUserRequest $request)
    {
        try {


            $user = User::where('mobile', $request->mobile)->first();

            // if user exists
            if ($user) {

                $code = GenerateToken::generateToken();
                $user->token = $code;
                $user->save();
                $token = $user->createToken('new_user')->plainTextToken;
                $response = [
                    'user' => $user->name,
                    'mobile' => $user->mobile,
                    'verifiedCode' => $code,
                    'token' => $token,
                ];
                return response()->json(['response' => $response, 'status' => 200], 200);

            // if user not exists
            } else {

                $code = GenerateToken::generateToken();
                $user = User::create([
                    'mobile' => $request->mobile,
                    'token' => $code,
                ]);
                $user->assignRole('user');
                $token = $user->createToken('new_user')->plainTextToken;
                $response = [
                    'user' => $user->name,
                    'mobile' => $user->mobile,
                    'verifiedCode' => $code,
                    'token' => $token,
                ];
                return response()->json(['response' => $response, 'status' => 200], 200);
            }
        } catch (\Exception $ex) {
            return response()->json(['response' => $ex->getMessage(), 'status' => 500], 200);
        }


    }

    public function logOut(Request $request)
    {
        $auth_user = Auth::user();

        $auth_user->token = null;
        $auth_user->token_verified_at = null;
        $auth_user->remember_token = null;
        $auth_user->save();

        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
