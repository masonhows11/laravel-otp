<?php


namespace App\Services;




use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class CheckExpireToken
{

    public static function checkExpireToken($token,$mobile)
    {
        try {
            $user = User::where('mobile',$mobile)
                ->where('token',$token)
                ->first();
            $expired = Carbon::parse($user->updated_at)->addMinutes(30)->isPast();
            if($expired){
                return false;
            }
            $user->token_verified_at = Date::now();
            $user->save();
            return true;
        }catch (\Exception $ex){
            return view('errors_custom.validation_error')
                ->with(['error'=>$ex->getMessage()]);
        }
    }
}
