<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Parts;
use App\galary;
use App\mainfactor;
use App\spareparts;
use Image;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
class CRUDpartsController extends Controller
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
    	->get();*/
    	$parts = Parts::where('Checknum', '=', 1)->paginate(2);
        return view('design.crudparts' , compact('parts'))->with('i',(request()->input('page',1) -1) *2);
    }

    public function search()
    {
    	 $parts = new Parts();
            $parts = $parts->where('spareparts', 'like', '%' . $request->session()->get('search') . '%')
                ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                ->paginate(5);
            if ($request->ajax()) {
              return view('design.index', compact('parts'));
            } else {
              return view('design.ajax', compact('parts'));
            }
    }

     public function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	/*if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('mine/images/' . $filename ) );

    		$galary = new galary;
    		$galary->image = $filename;
    		$galary->part_id =$galary['part_id']; ;
    		$user->save();
    	}*/

      $Galary = new galary;
      $Galary->part_id = Input::get('part_id');
      if(Input::hasFile('image')){
        $file = Input::file('image');
        $file->move(public_path().'/' , $file->getClientOriginalName());
        $Galary->image = $file->getClientOriginalName();

      }

       $Galary->save();

         $galaryId = $Galary->id;
         $galaryImage = $Galary->image;

  

        $id = Input::get('part_id');
        $part = Parts::find($id);

// Make sure you've got the Page model
if($part) {
    $part->image = $galaryImage;
    $part->save();
}

    	$parts = Parts::where('Checknum', '=', 1)->paginate(2);
        return view('design.crudparts' , compact('parts'))->with('i',(request()->input('page',1) -1) *2);


       


    }


       public function allgalaries()
    {
   
      $galaries  = DB::table('partscar.parts')
      ->join('partscar.galaries' , 'parts.id' ,'=' ,'galaries.part_id')
     
      ->select('*')
      ->paginate(16)
      ;

        //$galaries = galary::all();
        return view('design.galaries' , compact('galaries'))->with('i',(request()->input('page',1) -1) *16);

        /*$galaries = galary::all();
        return view('design.galaries' , compact('galaries'));*/
}

   


function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('Parts')
         ->where('spareparts', 'like', '%'.$query.'%')
         ->orWhere('mainfactors', 'like', '%'.$query.'%')
         ->orWhere('price', 'like', '%'.$query.'%')
        
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('Parts')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->spareparts.'</td>
         <td>'.$row->mainfactor.'</td>
         <td>'.$row->price.'</td>
         	
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create()
    {
       
        return view('design.create');

        /*$data = $request->all();

           /*$dataspareparts = new spareparts;
           $dataspareparts->name = $dataspareparts['name'];
           $dataspareparts->save();
           $datasparepartsId = $dataspareparts->id;

              $datamainfactor = new mainfactor;
           $datamainfactor->company = $datamainfactor['company'];
           $datamainfactor->save();
           $datamainfactorId = $datamainfactor->id;

            $dataParts = new Parts;
            $dataParts->spareparts_id = $datasparepartsId;
            $dataParts->mainfactor_id = $datamainfactorId;
            $dataParts->price = $dataParts['price'];

            $dataParts->save();

            $dataPartsId = $dataParts->id;*/

         /*  $dataspareparts=  spareparts::create([
            'name' => $data['name'],
            
       /* ]);
            $datasparepartsId = $dataspareparts->id;
      
       $datamainfactor=  mainfactor::create([
            'company' => $data['company'],
            
        ]);
       $datamainfactorId = $datamainfactor->id;*/

       /* $datamainfactor=  Parts::create([
        	'spareparts_id' => $datasparepartsId,
        	'mainfactor_id' => $datamainfactorId,
            'price' => $data['price'],*/

            
        //]);

         /*$parts  = DB::table('partscar.spareparts')
    	->join('partscar.parts' , 'parts.spareparts_id' ,'=' ,'spareparts.id')
    	->join('partscar.mainfactors' , 'mainfactors.id' , '=' , 'parts.mainfactor_id')
    	->select('*')
    	->get();
        return view('design.crudparts' , compact('parts'));*/
    }

public function store(Request $request)
    {
       $rules = array(
        'spareparts' => 'required',
        'mainfactor' => 'required',
        'price' => 'required'
      );
      // for Validator
      $validator = Validator::make ( Input::all (), $rules );
      if ($validator->fails())
      	return redirect()->route('parts.index')->with(array('errors' => $validator->getMessageBag()->toArray()));

      else {
        Parts::create($request->all());
        return redirect()->route('parts.index')->with('success','Part created successfully');
    }
    }


 public function edit(request $request)
    {
        $Part = Parts::find($request->id);
        return view('design.edit', compact('Part'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function update(Request $request, $id)
    {
      $rules = array(
        'spareparts' => 'required',
        'mainfactor' => 'required',
        'price' => 'required'
      );
      // for Validator
      $validator = Validator::make ( Input::all (), $rules );
      if ($validator->fails())
      	return redirect()->route('parts.index')->with(array('errors' => $validator->getMessageBag()->toArray()));

      else {
      Parts::find($id)->update($request->all());
      return redirect()->route('parts.index')->with('success','Part updated successfully');
    }
}
   

   public function destroy($id)
    {
        Parts::find($id)->delete();
        return redirect()->route('parts.index')->with('success','part deleted successfully');
    }


    public function show(request $request)
    {
        $part = Parts::find($request->id);
        return view('design.show', compact('part'));
    }


 // add data into database
    public function addPat(Request $req) {
      $rules = array(
        'spareparts' => 'required',
        'mainfactor' => 'required',
        'price' => 'required'
      );
      // for Validator
      $validator = Validator::make ( Input::all (), $rules );
      if ($validator->fails())
      return Response::json(array('errors' => $validator->getMessageBag()->toArray()));

      else {
        $part = new Parts();
        $part->spareparts = $req->spareparts;
        $part->mainfactor = $req->mainfactor;
        $part->price = $req->price;
        $part->save();

        $parts = Parts::all();
        return view('design.crudparts' , compact('parts'));
      }
    }


public function editPart(request $request){
$part = Parts::find ($request->id);
$part = new Parts();
        $part->spareparts = $request->spareparts;
        $part->mainfactor = $request->mainfactor;
        $part->price = $request->price;
        $part->save();

$parts = Parts::all();
        return view('design.crudparts' , compact('parts'));

}

public function Add($id){
      $partss = Parts::find ($id);
      return view('design.crudparts' , compact('partss'));
	}

public function deletePart($id){
/*$post = Parts::find ($id)->delete();

$parts = Parts::all();
        return view('design.crudparts' , compact('parts'));*/

        $post = Parts::find ($id)->delete();
        return redirect('/CRUDparts');
}


public function AddPart(Request $request){
   $rules = array(
        'spareparts' => 'required',
        'mainfactor' => 'required',
        'price' => 'required'
      );
  $validator = Validator::make ( Input::all(), $rules);
  if ($validator->fails())
  return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
    $Part = new Parts;
    $Part->spareparts = $request->spareparts;
    $Part->mainfactor = $request->mainfactor;
    $Part->price = $request->price;
    $Part->save();
    return response()->json($Part);
  }
}

}

