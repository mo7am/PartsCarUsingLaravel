
@extends('design.layout')
@section('content')
<!-- Content Section -->
<div id="fh5co-main">
<div class="row">
    <div class="col-lg-12">
      <h3>You Can Do This</h3>
    </div>
  </div>
  <div class="row">
        <div class="col-md-12">
            <div class="">
                <button style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New </button>
            </div>
        </div>
    </div>
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif

  <div class="panel panel-default">
    <div class="panel-heading">Search Customer Data</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
     </div>

  <table class="table table-bordered">
    <tr>
      <th>No.</th>
      <th>Part Name</th>
      <th>Company </th>
      <th>Price </th>
                            
      <th>Update</th>
      <th>Delete</th>
      <th>Show</th>
    </tr>
<?php  $i=1; ?>
    @foreach ($parts as $part)
      <tr>
        <td>{{ $i++ }}</td>
        <td>{{$part->spareparts}}</td>
        <td>{{$part->mainfactor}}</td>
        <td>{{$part->price}} $</td>
        <td>
          <a style="border-radius: 5px" class="btn btn-xs btn-info" href="{{ action('CRUDpartsController@edit','id='.$part->id ) }}">Update</a>
        </td>
        <td>
           {!! Form::open(['method' => 'DELETE', 'route'=>['parts.destroy', $part->id], 'style'=> 'display:inline']) !!}
          {!! Form::submit('Delete',['class'=> 'btn btn-xs btn-danger' , 'style'=> 'border-radius: 5px'] ) !!}
          {!! Form::close() !!}
        </td>
        <td>

          <a style="border-radius: 5px" class="btn btn-xs btn-info" href="{{ action('CRUDpartsController@show','id='.$part->id ) }}">Add Photo</a>
         
        </td>
      </tr>
    @endforeach
  </table>
  {!! $parts->links() !!}
</div>
</div>
</div>

<!-- // Modal -->

<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Part</h4>
            </div>
           <form method="POST" action="{{route('parts.store')}}">
                        {{ csrf_field() }}
            <div class="modal-body">

                <div class="form-group">
                    <label for="">Part Name</label>
                    <input type="text" id="" name="spareparts" placeholder="Part Name" class="form-control" required/>
                </div>

                <div class="form-group">
                    <label for="">Part Company</label>
                    <input type="text" id="" name="mainfactor" placeholder="Part Company" class="form-control" required/>
                </div>

                <div class="form-group">
                    <label for="">Part Price</label>
                    <input type="text" id="" name="price" placeholder="Part Price" class="form-control" required/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" onclick="">Add Part</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
$('delete_form').on('submit' , function(){
if(confirm("Are You Sure")){
    return true;
}else{
    return false;
}
});
});

function GetUserDetails(id) {

  
            $("#update_first_name").val(user.first_name);
            $("#update_last_name").val(user.last_name);
            $("#update_email").val(user.email);
        }
    

    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-75591362-1', 'auto');
    ga('send', 'pageview');

</script>


    @endsection