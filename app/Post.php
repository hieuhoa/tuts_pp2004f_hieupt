<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];
    
    public function categories()
    {
        return $this->belongsToMany(Category::class)
        ->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'post');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
