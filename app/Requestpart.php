<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requestpart extends Model
{
	protected $fillable = [
        'userphone','part_id' , 'user_id','quantity',
    ];
public $timestamps = false;
    
    //
}
