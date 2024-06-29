<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model implements Authenticatable
{
    use HasFactory, \Illuminate\Auth\Authenticatable;

    protected $table = 'profile';

    // Fillable fields for mass assignment
    protected $fillable = [
        'firstname', 
        'lastname', 
        'username', 
        'email', 
        'password', 
        'avatar',
        'is_admin',
    ];

    // Hide fields from JSON serialization
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
