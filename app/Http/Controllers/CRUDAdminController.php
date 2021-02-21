<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class CRUDAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



public function index(){

     $users = User::where('type_id', '=', 2)->paginate(2);

        return view('design.CRUDAdmin' , compact('users'))->with('i',(request()->input('page',1) -1) *2);
  }

  public function addAdmin(Request $request){
    $rules = array(
      'fname' => 'required',
        'lname' => 'required',
        'email' => 'required',
        'password' => 'required',
        'phone' => 'required',
        'address' => 'required',
        
    );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
   $users = new User;
       $users->fname = $request->fname;
         $users->lname = $request->lname;
          $users->email = $request->email;
           $users->password = $request->password;
            $users->phone = $request->phone;
             $users->address = $request->address;
        $users->type_id = 2;
        $users->token = str_random(25);
      $users->save();
    return response()->json($users);
  }
}

public function editAdmin(request $request){

$users = User::find ($request->id);
  $users->fname = $request->fname;
         $users->lname = $request->lname;
          $users->email = $request->email;
           $users->password = $request->password;
            $users->phone = $request->phone;
             $users->address = $request->address;
        $users->type_id = $request->type_id;
  $users->save();
  return response()->json($users);
}

public function deleteAdmin(request $request){

User::find($request->$id)->delete();
        return $response()->json();
}






}
