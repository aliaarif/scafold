<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Domain\Auth\Services\AuthService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EmailVerificationRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Mail\PasswordReset;
use App\Transformers\Json;
use App\User;

class AuthController extends Controller {
    
    private $authService;

    public function __construct() {
        $this->authService = new AuthService();
        // $this->middleware('auth:api', ['except' => ['login','register', 'emailVerification', 'sendEmailVerification', 'forgotPassword', 'passwordReset']]);
    }

     // Login User
    public function login(LoginRequest $request){
        return $this->authService->login($request);
    }

    // Login Register
    public function register(RegisterRequest $request){
        return $this->authService->register($request);
    }

     // Refresh Token
     public function refresh(){
        return $this->authService->refresh();
    }

     // Logout User
     public function logout(){
        return $this->authService->logout();
    }

     // Check Authenticated or not
     public function checkAuth(){
        return $this->authService->checkAuth();
    }

     // Get Authenticated User
     public function getProfile(Request $request){
        return $this->authService->getProfile($request);
    }

    // Update Profile
    public function updateProfile(ProfileUpdateRequest $request){
        return $this->authService->updateProfile($request);
    }

    public function emailVerification(EmailVerificationRequest $request){
        return $this->authService->emailVerification($request);
    }

    public function sendEmailVerification(Request $request){
        return $this->authService->sendEmailVerification($request);
    }


    public function forgotPassword(ForgotPasswordRequest $request){
        return $this->authService->forgotPassword($request);
    }

    public function restPassword(ResetPasswordRequest $request){
        return $this->authService->restPassword($request);
    }
}