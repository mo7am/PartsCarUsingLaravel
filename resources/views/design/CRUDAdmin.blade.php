@extends('design.layout')
@section('content')


<div id="fh5co-main">
  <div class="row">
  <div class="col-md-12">

<div class="row">
  <div class="col-md-12">
    <h1>Simple Laravel CRUD Ajax</h1>
  </div>
</div>




<div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th width="150px">No</th>
        <th>Fname</th>
          <th>Lname</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th >Type</th>
          <th ></th>
        <th class="text-center" width="150px">
          <a href="#" class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
      </tr>
      {{ csrf_field() }}
      <?php  $no=1; ?>
      @foreach ($users as $value)
        <tr class="post{{$value->id}}">
          <td>{{$no++}}</td>
          <td>{{$value->fname}}</td>
          <td>{{$value->lname}}</td>
          <td>{{$value->email}}</td>
          <td>{{$value->phone}}</td>
          <td>{{$value->address}}</td>
          <td>{{$value->type_id}}</td>

          <td>
            <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-fname="{{$value->fname}}" data-lname="{{$value->lname}}" data-email="{{$value->email}}"data-password="{{$value->password}}"data-phone="{{$value->phone}}"data-address="{{$value->address}}" data-typr_id="{{$value->type_id}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$value->id}}" data-fname="{{$value->fname}}" data-lname="{{$value->lname}}" data-email="{{$value->email}}"data-password="{{$value->password}}"data-phone="{{$value->phone}}"data-address="{{$value->address}}" data-typr_id="{{$value->type_id}}">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" data-fname="{{$value->fname}}" data-lname="{{$value->lname}}" data-email="{{$value->email}}"data-password="{{$value->password}}"data-phone="{{$value->phone}}"data-address="{{$value->address}}" data-typr_id="{{$value->type_id}}">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$users->links()}}








{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group row add">
            <label class="control-label col-sm-2" for="fname">Fname :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fname" name="fname"
              placeholder="Your Name Here" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>


         <div class="form-group row add">
            <label class="control-label col-sm-2" for="lname">Lname :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="lname" name="lname"
              placeholder="Your lname Here" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>


          <div class="form-group row add">
            <label class="control-label col-sm-2" for="email">Email :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" name="email"
              placeholder="Your email Here" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>


          <div class="form-group row add">
            <label class="control-label col-sm-2" for="password">Password :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="password" name="password"
              placeholder="Your password Here" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>



          <div class="form-group row add">
            <label class="control-label col-sm-2" for="phone">Phone :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="phone" name="phone"
              placeholder="Your phone Here" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>



          <div class="form-group row add">
            <label class="control-label col-sm-2" for="address">Address :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="address" name="address"
              placeholder="Your address Here" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>



        


       
        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit" id="add">
              <span class="glyphicon glyphicon-plus"></span>Save User
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remobe"></span>Close
            </button>
          </div>
    </div>
  </div>
</div></div>


{{-- Modal Form Show POST --}}
<div id="show" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
                  </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <label for="">ID :</label>
                      <b id="i"/>
                    </div>
                    <div class="form-group">
                      <label for="">Fname :</label>
                      <b id="fn"/>
                    </div>
                    <div class="form-group">
                      <label for="">Lname :</label>
                      <b id="ln"/>
                    </div>
                    <div class="form-group">
                      <label for="">Email :</label>
                      <b id="em"/>
                    </div>
                    <div class="form-group">
                      <label for="">Password :</label>
                      <b id="pa"/>
                    </div>
                    <div class="form-group">
                      <label for="">Phone :</label>
                      <b id="ph"/>
                    </div>
                    <div class="form-group">
                      <label for="">Address :</label>
                      <b id="ad"/>
                    </div>
                   
                    
                    </div>
                    </div>
                  </div>
</div>

{{-- Modal Form Edit and Delete Post --}}
<div id="myModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal">
          <div class="form-group">
            <label class="control-label col-sm-2"for="id">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fid" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="fname">Fname</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="fn">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="lname">Lname</label>
            <div class="col-sm-10">
            <textarea type="text" class="form-control" id="ln"></textarea>
            </div>
          </div>
           <div class="form-group">
            <label class="control-label col-sm-2"for="email">Email</label>
            <div class="col-sm-10">
            <textarea type="text" class="form-control" id="em"></textarea>
            </div>
          </div>
        
           <div class="form-group">
            <label class="control-label col-sm-2"for="phone">Phone</label>
            <div class="col-sm-10">
            <textarea type="text" class="form-control" id="ph"></textarea>
            </div>
          </div>
           <div class="form-group">
            <label class="control-label col-sm-2"for="address">Address</label>
            <div class="col-sm-10">
            <textarea type="text" class="form-control" id="ad"></textarea>
            </div>
          </div>
        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
          Are You sure want to delete <span class="title"></span>?
          <span class="hidden id"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>close
        </button>
      </div>
    </div>
  </div>
</div>


  </div>
  </div>





<script type="text/javascript">




{{-- ajax Form Add Post--}}
  $(document).on('click','.create-modal', function() {
    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add User');
  });
  $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: '/addAdmin',
      data: {
        _token: "{{ csrf_token() }}"
                ,
        'fname': $('input[name=fname]').val(),
        'lname': $('input[name=lname]').val(),
        'email': $('input[name=email]').val(),
        'password': $('input[name=password]').val(),
        'phone': $('input[name=phone]').val(),
        'address': $('input[name=address]').val(),
      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.fname);
          $('.error').text(data.errors.lname);
          $('.error').text(data.errors.email);
          $('.error').text(data.errors.password);
          $('.error').text(data.errors.phone);
          $('.error').text(data.errors.address);
        } else {
          $('.error').remove();
          $('#table').append("<tr class='post" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.fname + "</td>"+
          "<td>" + data.lname + "</td>"+
          "<td>" + data.email + "</td>"+
          "<td>" + data.password + "</td>"+
          "<td>" + data.phone + "</td>"+
          "<td>" + data.address + "</td>"+
        
          "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-fname='" + data.fname + "' data-lname='" + data.lname + "' data-email='" + data.email + "' data-password='" + data.password + "' data-phone='" + data.phone + "' data-address='" + data.address + "' ><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-fname='" + data.fname + "' data-lname='" + data.lname + "' data-email='" + data.email + "' data-password='" + data.password + "' data-phone='" + data.phone + "' data-address='" + data.address + "' ><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-fname='" + data.fname + "' data-lname='" + data.lname + "' data-email='" + data.email + "' data-password='" + data.password + "' data-phone='" + data.phone + "' data-address='" + data.address + "' ><span class='glyphicon glyphicon-trash'></span></button></td>"+
          "</tr>");
        }
      },
    });
    $('#fname').val('');
    $('#lname').val('');
    $('#email').val('');
    $('#password').val('');

    $('#phone').val('');
    $('#address').val('');
   
  });




 // Show function
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  $('#i').text($(this).data('id'));
  $('#fn').text($(this).data('fname'));
  $('#ln').text($(this).data('lname'));
  $('#em').text($(this).data('email'));
      $('#ph').text($(this).data('phone'));
        $('#ad').text($(this).data('address'));
  $('.modal-title').text('Show Post');
  });






// form Delete function
$(document).on('click', '.delete-modal', function() {
$('#footer_action_button').text(" Delete");
$('#footer_action_button').removeClass('glyphicon-check');
$('#footer_action_button').addClass('glyphicon-trash');
$('.actionBtn').removeClass('btn-success');
$('.actionBtn').addClass('btn-danger');
$('.actionBtn').addClass('delete');
$('.modal-title').text('Delete Post');
$('.id').text($(this).data('id'));
$('.deleteContent').show();
$('.form-horizontal').hide();
$('.title').html($(this).data('title'));
$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.delete', function(){
  $.ajax({
    type: 'POST',
    url: 'deleteAdmin',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.id').text()
    },
    success: function(data){
       $('.post' + $('.id').text()).remove();
    }
  });
});




// function Edit POST
$(document).on('click', '.edit-modal', function() {
$('#footer_action_button').text(" Update Post");
$('#footer_action_button').addClass('glyphicon-check');
$('#footer_action_button').removeClass('glyphicon-trash');
$('.actionBtn').addClass('btn-success');
$('.actionBtn').removeClass('btn-danger');
$('.actionBtn').addClass('edit');
$('.modal-title').text('Post Edit');
$('.deleteContent').hide();
$('.form-horizontal').show();
$('#fid').val($(this).data('id'));
$('#fn').val($(this).data('fname'));
$('#ln').val($(this).data('lname'));
$('#em').val($(this).data('email'));
$('#ph').val($(this).data('phone'));
$('#ad').val($(this).data('address'));

$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {
  $.ajax({
    type: 'POST',
    url: 'editAdmin',
    data: {
'_token': $('input[name=_token]').val(),
'id': $("#fid").val(),
'fname': $('#fn').val(),
'lname': $('#ln').val(),
'email': $('#em').val(),
'phone': $('#ph').val(),
'address': $('#ad').val()
},
success: function(data) {
      $('.post' + data.id).replaceWith(" "+
      "<tr class='post" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.fname + "</td>"+
          "<td>" + data.lname + "</td>"+
          "<td>" + data.phone + "</td>"+
          "<td>" + data.address + "</td>"+
   "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-fname='" + data.fname + "' data-lname='" + data.lname + "' data-email='" + data.email + "'  data-phone='" + data.phone + "' data-address='" + data.address + "' ><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-fname='" + data.fname + "' data-lname='" + data.lname + "' data-email='" + data.email + "' data-phone='" + data.phone + "' data-address='" + data.address + "' ><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-fname='" + data.fname + "' data-lname='" + data.lname + "' data-email='" + data.email + "'  data-phone='" + data.phone + "' data-address='" + data.address + "' ><span class='glyphicon glyphicon-trash'></span></button></td>"+
          "</tr>");
    }
  });
});




  


</script>






@endsection