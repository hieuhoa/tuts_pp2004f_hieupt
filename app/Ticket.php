<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //

    protected $table = 'tickets';
    protected $guarded = ['id'];
    protected $fillable    =['title','content','slug','status','user_id'];
    public function user()
{
    return   $this->belongsTo(User::class);
}
    public function getTitle()
{
    return   $this->title;
}

}