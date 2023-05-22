<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifyUserMobileController extends Controller
{
    //
    public function verifiedMobileForm()
    {

        return view('auth_front.verify_mobile');
    }

    public function verifiedMobile(Request $request)
    {


    }
}
