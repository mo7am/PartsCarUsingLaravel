<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class replays extends Model
{
    //


     protected $fillable = [
        'content','type_id' , 'message_id', 'user_id','datetime',
    ];


    public $timestamps = false;


 //type 1 for replay message
//type 2 for replay community
}
