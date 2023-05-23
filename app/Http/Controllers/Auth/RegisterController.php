<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Services\GenerateToken;


class RegisterController extends Controller
{
    //

    public function registerForm()
    {
        return view('auth_front.register');
    }

    public function register(RegisterUserRequest $request)
    {
        try {
            $token = GenerateToken::generateToken();
            User::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'token' => $token
            ]);
            return redirect()->route('verified.mobile.form');
        } catch (\Exception $ex) {
            return view('errors_custom.register_error');
        }

    }
}
