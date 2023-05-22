<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function loginForm()
    {
            return view('auth_front.login');
    }

    public function login(LoginUserRequest $request){

        return $request;
    }
}
