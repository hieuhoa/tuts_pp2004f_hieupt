<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //

    protected $table = 'tickes';

    public function user()
{
    return   $this->belongsTo(User::class);
}
    public function getTitle()
{
    return   $this->title;
}

}