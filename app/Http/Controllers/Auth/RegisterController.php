<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Services\GenerateToken;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //

    public function registerForm()
    {
        return view('auth_front.register');
    }

    public function register(RegisterUserRequest $request)
    {
        $validated = $request->validated();

        $token = GenerateToken::generateToken();

        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'token' => $token
        ]);

        return $user;


    }
}
