@extends('design.layout')
@section('content')
<div id="fh5co-main">
     <div class="panel panel-default">
 <div class="panel-heading"><h3>Show Part</h3></div>
</br>
  <div class="row">
    <div class="col-xs-12">
      <div class="form-group">
        <strong>Part ID : </strong>
        {{ $part->id }}
      </div>
    </div>
    <div class="col-xs-12">
      <div class="form-group">
        <strong>Part Name : </strong>
        {{ $part->spareparts }}
      </div>
    </div>
    <div class="col-xs-12">
      <div class="form-group">
        <strong>Company : </strong>
        {{ $part->mainfactor }}
      </div>
    </div>
     <div class="col-xs-12">
      <div style="color: red" class="form-group">
        <strong >Price : </strong>
        {{ $part->price }} $
      </div>
    </div>
    <div class="col-xs-12">
      <div class="form-group">
        <img class="img-responsive"  src="mine/images/default.jpg" style="width: 150px ; height: 150px ; float: left ; border-radius: 50% ; margin-right: 50px">
         </br>
      </div>
    
    </div>
    <div class="col-xs-12">
      <form enctype="multipart/form-data" action="{{url('/photo')}}" method="POST">
               
                </br><input type="file" name="image" required ></br>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class=" btn btn-sm btn-primary">
                <a class="btn btn-sm btn-primary" href="{{ route('parts.index') }}">Back</a>
                <input hidden="hidden" type="text" name="part_id" value="{{ $part->id }}">

            </form>
          </br>
          </div>


  </div>
</div>

  </div>
    @endsection


