<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $table = 'tmuser_customer';
    protected $primaryKey = 'n_user';
    protected $password = 'n_password';
    protected $fillable = [
        'n_user',
        'n_password',
        // add any other columns that can be mass-assigned
    ];
    protected $hidden = [
        'n_password',
        // add any other columns that should be hidden by default
    ];

    // Relationships
    // public function nationality()
    // {
    //     return $this->belongsTo(Nationality::class, 'nationality_id');
    // }

    // Methods
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['n_password'] = sha1(md5($value));
    // }
}
