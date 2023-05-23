<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyUserMobileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// make storage link
Route::get('/storage-link',function(){
    symlink(storage_path('app/public'),$_SERVER['DOCUMENT_ROOT'].'/storage');
});

Route::get('/', [HomeController::class,'home'])->name('home');

// authentication & authorize
Route::get('/login-form', [LoginController::class, 'loginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');//->middleware(['throttle:3,1']);

Route::get('/register-form', [RegisterController::class, 'registerForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/verified-mobile-form',[VerifyUserMobileController::class,'verifiedMobileForm'])->name('verified.mobile.form');
Route::post('/verified-mobile',[VerifyUserMobileController::class,'verifiedMobile'])->name('verified.mobile');


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logOut'])->name('logout');
});



