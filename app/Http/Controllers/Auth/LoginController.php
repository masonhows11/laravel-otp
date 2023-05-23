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

        $token = GenerateToken::generateToken();

        try {
            $user = DB::table('users')
                ->where('mobile', $request->mobile)
                ->first();

        } catch (\Exception $ex) {
            return view('errors_custom.login_error');
        }

        return null;

    }

    public function logOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
