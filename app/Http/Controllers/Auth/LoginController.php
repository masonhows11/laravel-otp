<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function logOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
