<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCredential extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',

        'project_url',
        'project_username',
        'project_password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'project_password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'project_password' => 'hashed',
    ];


    public function emp()
    {
        return $this->belongsTo(Emp::class);
    }
}