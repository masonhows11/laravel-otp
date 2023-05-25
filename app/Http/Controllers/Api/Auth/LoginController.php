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

            if ($user) {

                $token = GenerateToken::generateToken();

                $user->token = $token;
                $user->save();
                return redirect()->route('verified.mobile.form');

            } else {

                // new token
                $token = GenerateToken::generateToken();

                // new user
                $user = User::create([
                    'mobile' => $request->mobile,
                    'token' => $token,
                ]);

                // user role
                $role = Role::create(['name' => 'user']);

                // assign role to new user
                $user->assignRole($role);

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
