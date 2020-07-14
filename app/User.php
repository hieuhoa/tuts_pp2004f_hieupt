<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable , HasRoles;

    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'provider_id',
        'provider_name'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function setNameEmailAttribute($value)
    {
        $this->attributes['name'].$this->attributes['email'];
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // public function comments(){
    //     return $this->hasMany(Comment::class);
    // }
}
