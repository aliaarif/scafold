<?php

namespace App\Domain\Auth\Services;

use App\Http\Resources\User as UserResource;
use App\Domain\User\Repositories\UserRepository;
use App\Notifications\ResetpasswordVerificationNotification;
use App\Notifications\EmailVerificationNotification;
use App\Notifications\EmailVerifiedNotification;
use App\Notifications\RegisterNotification;
use App\Notifications\LoginNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\ImageProcessing;
use Illuminate\Support\Str;
use App\Traits\ResponseAPI;
use App\Models\Subscription;
use GuzzleHttp\Client;
use App\Models\User;
use Validator;
use DB;
use Otp;


class AuthService {
    
    use ResponseAPI;
    use ImageProcessing;

    private $userRepository; 
    private $otp;


    public function __construct() {
        $this->userRepository = new UserRepository();
        $this->otp = new Otp;
    }

    // Login User
    public function login($request) {
       $credentials = [
            'email' =>  $request->email,
            'password' =>  $request->password
       ];

       if(auth()->attempt($credentials)){
            $user = Auth::user();
            $user->tokens()->delete();
            $success['token'] = $user->createToken(request()->userAgent())->plainTextToken;
            $success['name'] = $user->name;
            $success['role'] = $user->role;
            $success['success'] = true;
            $user->notify(new LoginNotification());
            return response()->json($success, 200);
       } else {
            return response()->json(['error' => 'Unauthorized'], 401);
       }
    }

    // Register User
    public function register($request) { 
        $newUser = $request->validated();
        $newUser['password'] = Hash::make($newUser['password']);
        $newUser['role'] = 'User';
        $newUser['status'] = 'Active';
        $user = User::create($newUser);
        $success['token'] = $user->createToken('user', ['app:all'])->plainTextToken;
        $success['name'] = $user->name;
        $success['role'] = $user->role;
        $success['success'] = true;
        $user->notify(new EmailVerificationNotification());
        return response()->json($success, 200);
    }

   
    // Refresh Token
    public function refresh() {
            $user = Auth::user();
            $user->tokens()->delete();
            $success['token'] = $user->createToken(request()->userAgent())->plainTextToken;
            $success['name'] = $user->name;
            $success['role'] = $user->role;
            $success['success'] = true;
            // $user->notify(new RefreshNotification());
            return response()->json($success, 200);
    }

    // Logout User
    public function logout() {
        Auth::logout();
        // $user->notify(new LogoutNotification());
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function checkAuth()
    {
        if(Auth::check()){
            $success['auth'] = true;
            return response()->json($success, 200);
        }else{
            $success['auth'] = false;
            return response()->json($success, 200);
        }
      

        return Auth::check() ? true : false;
    }

    public function getProfile($request)
    {
        return $request->user();
    }

    public function updateProfile($request)
    {
        $user = $request->user();
        $validatedData = $request->validated();
        if($request->hasFile('avatar')){
            $user->avatar ?  $this->deleteImage($user->avatar) : '';
            $validatedData['avatar']  = $this->saveImage($request->file('avatar'));
        }
        $user->update($validatedData);
        $user = $user->refresh();

        $user->avatar ? $user->avatar = $user->image_url : '';
        $user->avatar;

        $success['user'] = $user;
        $success['success'] = true;
        return response()->json($success, 200);
    }

    public function emailVerification($request)
    {
        $otp2 = $this->otp->validate($request->email, $request->otp);
        if(!$otp2->status){
            return response()->json(['error' => $otp2], 401);
        }
        $user = User::where('email', $request->email)->first();
        $user->update(['email_verified_at' => now()]);
        $success['success'] = true;
        return response()->json($success, 200);
    }

    public function sendEmailVerification($request)
    {
        $request->user()->notify(new EmailVerifiedNotification());
        $success['success'] = true;
        return response()->json($success, 200);
    }

    public function forgotPassword($request)
    {
       $email = $request->only('email');
       $user = User::where('email', $email)->first();
       $user->notify(new ResetPasswordVerificationNotification());
       $success['success'] = true;
       return response()->json($success, 200);

    }

    public function resetPassword($request)
    {
        $otp2 = $this->otp->validate($request->email, $request->otp);
        if(!$otp2->status){
            return response()->json(['error' => $otp2], 401);
        }
        $user = User::where('email', $request->email)->first();
        $user->update(['password' => Hash::make($request->password)]);
        $user->tokens()->delete();
        $success['success'] = true;
        return response()->json($success, 200);
        
    }
}