<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use Avatar;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\User as EloquentUser;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;


class User extends  Authenticatable implements HasMedia
{
    use Notifiable , HasRoles, HasMediaTrait;

    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar'
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

    protected $appends = [
        'avatar_path'
    ];
    
    public function getAvatarPathAttribute()
    {
        if (empty($this->attributes['avatar'])) {
            return Avatar::create($this->attributes['name'])
                ->setDimension(30, 30)
                ->setFontSize(10)
                ->setShape('square')
                ->toBase64();
        }
    
        return $this->attributes['avatar']; 
    }

    public function registerMediaConversion(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(60)
            ->height(60);
    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class,'user_id', 'id');
    }

    // public function comments(){
    //     return $this->hasMany(Comment::class);
    // }
}
