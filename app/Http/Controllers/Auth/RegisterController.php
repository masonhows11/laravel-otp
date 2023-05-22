<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
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
        $validated =  $request->validated();



    }
}
