<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;
use Storage;



class User extends Authenticatable
{
    use HasApiTokens, HasRoles, HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
    ];

    public function getImageUrlAttribute()
    {
        return Storage::disk('products')->url($this->avatar);
    }

    public function payment_method(){
        return $this->hasOne(PaymentMethod::class);
    }

    public function addresses(){
        return $this->hasMany(Address::class);
    }

    public function cards(){
        return $this->hasMany(Card::class);
    }

}
