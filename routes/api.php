<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\VerifyUserMobileController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix'=>'v1'],function (){

    Route::post('/user/create',[RegisterController::class,'register']);
    Route::post('/user/login',[LoginController::class,'login']);
    Route::post('/user/verified-mobile',[VerifyUserMobileController::class,'verifyMobile']);

});


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


