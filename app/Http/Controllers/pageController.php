<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class pageController extends Controller
{
   
   public function p1 (){
       return view ('thanks');
   }

   public function show (){

    $pages = DB::table('pages')->get();
    return view ('pages.show' , compact('pages'));
   }
}
