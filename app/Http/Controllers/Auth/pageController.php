<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;



class pageController extends Controller
{
   
   public function p1 (){
       return view ('thanks.blade.php');
   }
}
