<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\EmpRegisterMailNotification;
use App\Notifications\EmpResetPasswordNotification;
use Laravel\Sanctum\HasApiTokens;

class Emp extends Authenticatable implements MustVerifyEmail
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'emp';

    protected $fillable = [


        'firstname',
        'lastname',
        'username',
        'projectassignedto',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function sendEmailVerificationNotification()
    {
        // $this->notify(new EmpRegisterMailNotification());
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new EmpResetPasswordNotification($token));
    }

    public function project_credential()
    {
        return $this->belongsTo(ProjectCredential::class);
    }

}