<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Add the Sanctum token trait

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens; // Make sure to use the HasApiTokens trait

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Ensure the 'role' column is fillable (for role-based access control)
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Optionally, if you want role checking functionality, you could add a method here like:
    public function isAdmin()
    {
        return $this->role === 'admin'; // You can modify this according to your role logic
    }
}

