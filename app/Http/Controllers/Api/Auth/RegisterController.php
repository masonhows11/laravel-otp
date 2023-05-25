<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Services\GenerateToken;
use Spatie\Permission\Models\Role;


class RegisterController extends Controller
{
    //


    public function register(RegisterUserRequest $request)
    {
        try {

            $code = GenerateToken::generateToken();

            $user = User::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'token' => $code
            ]);


            // assign user role  to new user
            $user->assignRole('user');

            $token = $user->createToken('new_user')->plainTextToken;

            $response = [
                'user' => $user->name,
                'token' => $token,
            ];

            return response()->json(['response'=>$response,'status'=>200],200);
        } catch (\Exception $ex) {
            return response()->json(['response'=>$ex->getMessage(),'status'=>500],200);
        }

    }
}
