<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});





Route::group(['prefix'=>'account'],function(){
    Route::group(['middleware'=>'guest'],function(){
        Route::get('register',[AccountController::class,'register'])->name('account.register');
        Route::post('register',[AccountController::class,'processRegister'])->name('account.processRegister');
        Route::get('login',[AccountController::class,'login'])->name('account.login');  
        Route::post('login',[AccountController::class,'authenticate'])->name('account.authenticate');
    });

    Route::group(['middleware'=>'auth'],function(){
        Route::get('profile',[AccountController::class,'profile'])->name('account.profile');
    });
});