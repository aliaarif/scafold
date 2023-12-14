<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\ForgotPasswordController;
// use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BusinessController;
use Illuminate\Http\Request;

Route::resource('categories', CategoryController::class);
Route::resource('businesses', BusinessController::class);

Route::controller(AuthController::class)->group( function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('forgot-password', 'forgotPassword');
    Route::post('rest-password', 'resetPassword');
});
   
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::apiResource('users', UserController::class);
});

Route::controller(AuthController::class)->middleware(['auth:sanctum'])->group( function () {
    Route::get('profile', 'getProfile');
    Route::get('check-auth', 'checkAuth');
    Route::get('email-verification', 'sendEmailVerification');
    Route::post('email-verification', 'emailVerification');
    Route::put('update-profile', 'updateProfile'); // For Update the Profile
    Route::post('refresh', 'refresh');
    Route::post('logout', 'logout');
});