<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\message;
use App\replays;
use App\User;
use DB;
use DateTime;
use Validator;
Use Redirect;
use App\Requestpart;
use Hash;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::user()->type_id == 1)
      {
        return view('design.index');
      }else{
        return view('design.indexuser');
      }
    }

    public function about()
    {
        return view('design.about');
    }

     public function contact()
    {
        return view('design.contact');
    }


    
       public function CRUDAdmin()
    {
        return view('design.CRUDAdmin');
    }


  public function AddMessage(Request $request)
    {
       $rules = array(
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'message' => 'required',
        'userid' => 'required',

      );
      // for Validator
      $validator = Validator::make ( Input::all (), $rules );
      if ($validator->fails())
        return redirect()->route('/contact')->with(array('errors' => $validator->getMessageBag()->toArray()));

      else {
        $msg = new message();
        $msg->name = Input::get('name');
        $msg->email = Input::get('email');
        $msg->phone = Input::get('phone');
        $msg->message = Input::get('message');
        $msg->userid = Input::get('userid');
        $msg->type_id = 1;

        $msg->save();

        $msg = message::all();
        return redirect()->route('/contact')->with('success','Your Purchase Created Successfully');
    }
    }

      public function lockscreen()
    {
        return view('lockScreen.lock_screen');
    }

   public function lockscreenlogin()
    {
       $password =  Input::get('password');


    $ps =  Auth::user()->password;

   if(Hash::check($password , $ps))
   {
     return redirect()->route('/homepage'); 
   }else{
      return redirect()->route('/lockscreen')->with("success" , "Password Incorrect"); 
   }
       
   }

 /*<a href=" {{action('HomeController@showcomment','id='.$msg->id)}}" style="border-radius: 5px" type="submit" class="btn btn-primary" onclick="">Show Comments</a>*/

   public function mymessage()
    {

    /*$message  = DB::table('partscar.messages')
      ->leftjoin('partscar.replay' , 'messages.id' ,'=' ,'replay.message_id')
     ->where('messages.userid' ,'=' , Auth::user()->id , 'and' , 'messages.type_id ' , '=' , 1 )
      ->select('*')
      ->paginate(3)
      ;

      if(!$message )
      {*/
         $repl = replays::where('type_id', '=',  1);
       // $message = message::where('userid', '=', Auth::user()->id , 'and' , 'type_id' , '=' ,1)->paginate(3);

$message  = DB::table('partscar.messages')
     ->where('messages.userid' ,'=' , Auth::user()->id )
     ->where('messages.type_id' ,'=' , 1 )
      ->select('*')
      ->paginate(3);

        return view('design.messages' , compact('message' , 'repl'))->with('i',(request()->input('page',1) -1) *3);
   
   } 


    public function showcomment(request $request)
    {

         $messageid = $request->id;

         $repl  = DB::table('partscar.replays')
     ->where('replays.message_id' ,'=' , $messageid )
     ->where('replays.type_id' , '=' ,1 )
      ->select('*')
      ->get()
      ;
      //$message = message::where('userid', '=', Auth::user()->id , 'and' , 'type_id' , '=' ,1)->paginate(3);

 $message  = DB::table('partscar.messages')
     ->where('messages.userid' ,'=' , Auth::user()->id )
     ->where('messages.type_id' ,'=' , 1 )
      ->select('*')
      ->paginate(3);

        //$repl = replay::where('message_id', '=',  $messageid);
        return view('design.messages' , compact( 'message','repl'))->with('i',(request()->input('page',1) -1) *3);
   
   } 


   public function addcomment()
    {


   
         $messageid = Input::get('messageid');
         $userid = Auth::user()->id;
         $typeid = 1;
         $content = Input::get('content');
         $time = 
         
         $rely = new replays();
         $rely->content = $content;
         $rely->type_id = $typeid;
         $rely->message_id = $messageid;
         $rely->user_id = $userid;
         $now = new DateTime();
         $timestamp = $now->getTimestamp(); 
         $rely->datetime = $now;
          
         $rely->save();


         $repl  = DB::table('partscar.replays')
     ->where('replays.message_id' ,'=' , $messageid )
     ->where('replays.type_id' , '=' ,1 )
      ->select('*')
      ->get()
      ;

      $message  = DB::table('partscar.messages')
     ->where('messages.userid' ,'=' , Auth::user()->id )
     ->where('messages.type_id' ,'=' , 1 )
      ->select('*')
      ->paginate(3);
        //$repl = replay::where('message_id', '=',  $messageid);
       return Redirect::back()->with(compact('message' , 'repl') , 'i',(request()->input('page',1) -1) *3);
        //return view('design.messages' , compact( 'message','repl'))->with('i',(request()->input('page',1) -1) *3);
   
   } 



   public function community()
    {

   
         $repl = replays::where('type_id', '=',  2);
        $message = message::where('type_id' , '=' ,2)->paginate(3);
        return view('design.community' , compact('message' , 'repl'))->with('i',(request()->input('page',1) -1) *3);
   
   } 



   public function showcommunitycomment(request $request)
    {

         $messageid = $request->id;

         $repl  = DB::table('partscar.replays')
     ->where('replays.message_id' ,'=' , $messageid )
     ->where('replays.type_id' , '=' , 2)
      ->select('*')
      ->get()
      ;
      $message = message::where('type_id' , '=' ,2)->paginate(3);
        //$repl = replay::where('message_id', '=',  $messageid);
        return view('design.community' , compact( 'message','repl'))->with('i',(request()->input('page',1) -1) *3);
   
   } 



    public function addcommunitycomment()
    {


   
         $messageid = Input::get('messageid');
         $userid = Auth::user()->id;
         $typeid = 2;
         $content = Input::get('content');
         $time = 
         
         $rely = new replays();
         $rely->content = $content;
         $rely->type_id = $typeid;
         $rely->message_id = $messageid;
         $rely->user_id = $userid;
         $now = new DateTime();
         $timestamp = $now->getTimestamp(); 
         $rely->datetime = $now;
          
         $rely->save();


         $repl  = DB::table('partscar.replays')
     ->where('replays.message_id' ,'=' , $messageid )
     ->where('replays.type_id' , '=' ,2 )
      ->select('*')
      ->get()
      ;
      
      $message  = DB::table('partscar.messages')
     ->where('messages.userid' ,'=' , Auth::user()->id )
     ->where('messages.type_id' ,'=' , 2 )
      ->select('*')
      ->paginate(3);
        //$repl = replay::where('message_id', '=',  $messageid);
       return Redirect::back()->with(compact('message' , 'repl') , 'i',(request()->input('page',1) -1) *3);
        //return view('design.messages' , compact( 'message','repl'))->with('i',(request()->input('page',1) -1) *3);
   
   } 


   public function addpost()
   {

    $msg = new message();
    $msg->name = Auth::user()->fname;
    $msg->email = Auth::user()->email;
    $msg->phone = Auth::user()->phone;
    $msg->message = Input::get('message');
    $msg->userid = Auth::user()->id;
    $msg->type_id = 2;

    $msg->save();


      $repl = replays::where('type_id', '=',  2);

      $message  = DB::table('partscar.messages')
     ->where('messages.userid' ,'=' , Auth::user()->id )
     ->where('messages.type_id' ,'=' , 2 )
      ->select('*')
      ->paginate(3);
        //$repl = replay::where('message_id', '=',  $messageid);
       return Redirect::back()->with(compact('message' , 'repl') , 'i',(request()->input('page',1) -1) *3);

     
   }


   public function showmyposts()
    {


     $repl = replays::where('type_id', '=',  2);

     $message  = DB::table('partscar.messages')
     ->where('messages.userid' ,'=' , Auth::user()->id )
     ->where('messages.type_id' ,'=' , 2 )
     ->select('*')
     ->paginate(3);
        //$repl = replay::where('message_id', '=',  $messageid);
        return view('design.community' , compact( 'message','repl'))->with('i',(request()->input('page',1) -1) *3);
   
   }

}
