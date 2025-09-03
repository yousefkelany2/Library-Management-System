<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
     use HasFactory, Notifiable;
     protected $guards = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
     protected function casts(): array
    {
        return [
           
            'password' => 'hashed',
        ];
    }
}
