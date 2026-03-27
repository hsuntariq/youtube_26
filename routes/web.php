<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::view('/studio','studio');
Route::view('/register','register');
Route::view('/login','login');
Route::post('/upload-video',[VideoController::class,'uploadVideo']);
Route::post('/register-user',[UserController::class,'registerUser']);