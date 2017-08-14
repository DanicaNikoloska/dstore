<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    const ADMIN = 0;
    const MODERATOR = 1;
    const VISITOR = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){
        return $this->role == User::ADMIN;
    }

    public function isModerator(){
        return $this->role == User::MODERATOR;
    }

    public function isVisitor(){
        return $this->role == User::VISITOR;
    }
    public function cart(){
        return $this->belongsTo(\App\ShoppingCart::class);
    }
}
