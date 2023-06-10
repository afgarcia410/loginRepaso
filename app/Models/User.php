<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use \Conner\Tagging\Taggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
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
    ];
    public function enlace()
    {
        return $this->hasMany(Enlace::class);
    }
    //Probar!!
    /*
     function isAdmin() {
        return $this->type == 'admin';
    }

    function isAdvanced() {
        return $this->type == 'advanced' || $this->type == 'admin';
    }

    function isUser() {
        return $this->type == 'user' || $this->type == 'advanced' || $this->type == 'admin';
    }
    */
}
