<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{

	 protected $fillable = [
        'name','email' , 'phone','message','userid', 'type_id',
    ];
    //
}


//type 1 for message
//type 2 for community