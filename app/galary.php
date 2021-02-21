<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galary extends Model
{
    //
     protected $fillable = [
        'image','part_id' , 
    ];
    //
    public $timestamps = false;
}
