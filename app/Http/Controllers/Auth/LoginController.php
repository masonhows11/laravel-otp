<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use App\Services\GenerateToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //

    public function loginForm()
    {
        return view('auth_front.login');
    }

    public function login(LoginUserRequest $request)
    {


        try {


            $user = User::where('mobile', $request->mobile)->first();

            if ($user) {

                $token = GenerateToken::generateToken();

                $user->token = $token;
                $user->save();
                return redirect()->route('verified.mobile.form');

            } else {

                $token = GenerateToken::generateToken();
                User::create([
                    'mobile' => $request->mobile,
                    'token' => $token,
                ]);

                return redirect()->route('verified.mobile.form');

            }


        } catch (\Exception $ex) {

            return view('errors_custom.login_error');
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
