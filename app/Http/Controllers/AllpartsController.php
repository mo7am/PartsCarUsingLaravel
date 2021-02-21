<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Parts;
use Validator;
use App\requestparts;

use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
class AllpartsController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }
    //
     public function index()
    {
    /*$parts  = DB::table('partscar.spareparts')
    	->join('partscar.parts' , 'parts.spareparts_id' ,'=' ,'spareparts.id')
    	->join('partscar.mainfactors' , 'mainfactors.id' , '=' , 'parts.mainfactor_id')
    	->select('*')
    	->get();
        return view('design.Parts' , compact('parts'));*/


        $parts = Parts::all();
        return view('design.Parts' , compact('parts'));


}


 public function more(request $request)
    {
   
      $galaries  = DB::table('partscar.parts')
      ->join('partscar.galaries' , 'parts.id' ,'=' ,'galaries.part_id')
     ->where('parts.id' ,'=' ,$request->id)
      ->select('*')
      ->paginate(16)
      ;

        //$galaries = galary::all();
        return view('design.galaries' , compact('galaries'))->with('i',(request()->input('page',1) -1) *16);

        /*$galaries = galary::all();
        return view('design.galaries' , compact('galaries'));*/
}

public function buy(Request $request)
    {
       $rules = array(
        'userphone' => 'required',
        'quantity' => 'required',

      );
      // for Validator
      $validator = Validator::make ( Input::all (), $rules );
      if ($validator->fails())
        return redirect()->route('/Allparts')->with(array('errors' => $validator->getMessageBag()->toArray()));

      else {
        $requestpart = new requestparts();
        $requestpart->userphone = Input::get('userphone');
        $requestpart->part_id = Input::get('part_id');
        $requestpart->user_id = Input::get('user_id');
        $requestpart->quantity = Input::get('quantity');

        $requestpart->save();

        $requestpart = requestparts::all();
        return redirect()->route('/Allparts')->with('success','Your Purchase Created Successfully');
    }
    }
}

