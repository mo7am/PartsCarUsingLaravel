<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Parts;
use App\galary;
use App\mainfactor;
use App\spareparts;
use Image;
use Auth;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
class profilecontroller extends Controller
{
    //


 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view ('profile.profile');
    }


    public function updateprofileimage(Request $request)
    {
     $id = Input::get('userid');
     $user = User::find($id);
 $user = new User;
// Make sure you've got the Page model

      Input::get('userid');
    if(Input::hasFile('profileimage')){
        $file = Input::file('profileimage');
        $file->move(public_path().'/' , $file->getClientOriginalName());
        $user->profileimage = $file->getClientOriginalName();
        $image =  $user->profileimage;

        dd($image);
      }
      DB::update('update users set profileimage = ? where id = ?',[$image,$id]);
   return redirect()->action('profilecontroller@index');
    }


     public function updatecoverimage(Request $request)
    {
     $id = Input::get('userid');
     $user = User::find($id);
 $user = new User;
// Make sure you've got the Page model

      Input::get('userid');
    if(Input::hasFile('coverimage')){
        $file = Input::file('coverimage');
        $file->move(public_path().'/' , $file->getClientOriginalName());
        $user->profileimage = $file->getClientOriginalName();
        $image =  $user->profileimage;
      }
      DB::update('update users set coverimage = ? where id = ?',[$image,$id]);
   return redirect()->action('profilecontroller@index');
    }


protected function validator(array $data)
    {
        return Validator::make($data, [
           
            'password' => 'required|string|min:6|confirmed',
           

        ]);
    }

   public function updatepassword(Request $request)
    {
     $id = Input::get('userid');
     $oldpass = Input::get('oldpass');
     $newpass = Input::get('Password');
     $confirmpass = Input::get('confirmpass');
     $userid = User::find($id);


     
  $ps =  Auth::user()->password;

   if(Hash::check($oldpass , $ps))
   {
   	

   	 
          if($newpass != $confirmpass)
           {
             return redirect()->action('profilecontroller@index')->with('success','Password Not Matched'); 
           }else{
           	DB::update('update users set password = ? where id = ?',[bcrypt($newpass),$id]);
            return redirect()->action('profilecontroller@index')->with('success','Password Updated Successfully');
           
      }
   }else{
     
     return redirect()->action('profilecontroller@index')->with('success','Current Password Incorrect');
   }
    
    }


     public function updatedata(Request $request)
    {

      $id = Input::get('userid');

      $rules = array(
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',

      );


      // for Validator
      $validator = Validator::make ( Input::all (), $rules );
      if ($validator->fails())
      	return redirect()->action('profilecontroller@index')->with(array('errors' => $validator->getMessageBag()->toArray()));

      else {



      User::find($id)->update($request->all());
      return redirect()->route('/viewprofile')->with('success2','User updated successfully');
    }
}
}
   
    

