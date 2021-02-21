<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class verifyController extends Controller
{
    //


    public function verify($token)

    {
    	User::where('token' , $token)->firstOrFail()->update(['token' => null]);

    	return redirect()->route('/homepage')->with('success' , 'Account Verified');
    }
}
