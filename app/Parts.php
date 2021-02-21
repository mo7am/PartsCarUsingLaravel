<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parts extends Model
{
	 protected $fillable = [
        'spareparts','mainfactor' , 'price','image',
    ];
    //
    public $timestamps = false;
}
