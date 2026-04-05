<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/studio', 'studio')->middleware('auth');
Route::view('/register', 'register');
Route::view('/login', 'login')->name('login');
Route::view('/watch/{id}', 'single-video');
Route::post('/upload-video', [VideoController::class, 'uploadVideo']);
Route::post('/register-user', [UserController::class, 'registerUser']);
Route::post('/logout', [UserController::class, 'logoutUser']);
Route::post('/login-user', [UserController::class, 'loginUser']);
Route::post('/add-comment', [CommentController::class, 'createComment']);

Route::get('/get-comments', [CommentController::class, 'getComments']);
Route::get('/', [VideoController::class, 'getVideos']);
Route::get('/watch/{id}', [VideoController::class, 'getSingleVideo']);
