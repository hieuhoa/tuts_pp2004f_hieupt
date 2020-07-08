<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'status',
        'user_id',
    ];

    protected $guarded = ['id'];

    public function setTitleContentAttribute($value)
    {
        $this->attributes['title'].$this->attributes['content'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'post');
    }
    
    public function getTitle()
    {
        return $this->title;
    }
}
