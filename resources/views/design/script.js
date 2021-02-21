
    
  $(document).on('click','.create-modal', function() {
    $('#create').modal('show');
    $('.modal-title').text('Add Part');
  });

 $(document).on('click','.show-photo', function() {
   $('#add_new_record_modal').modal('show');
  $('#partid').val($(this).data('id'));
   
    $('.modal-title').text('Add Photo');
  });

 $(document).on('click','.show-photo', function() {
   $('#buy_part').modal('show');
  $('#partidd').val($(this).data('id'));
   
    $('.modal-title').text('Buy Part');
  });


$(document).on('click','.show-post', function() {
   $('#addcommunity').modal('show');
   
    $('.modal-title').text('Add Post');
  });

  // add function
  $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: 'AddPart',
      data: {
        '_token': $('input[name=_token]').val(),
        'spareparts': $('input[name=spareparts]').val(),
        'mainfactor': $('input[name=mainfactor]').val(),
        'price': $('input[name=price]').val()
      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.spareparts);
          $('.error').text(data.errors.mainfactor);
          $('.error').text(data.errors.price);
        } else {
          $('.error').remove();
          $('#table').append("<tr class='post" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.spareparts + "</td>"+
          "<td>" + data.mainfactor + "</td>"+
          "<td>" + data.price + "</td>"+
          "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-title='" + data.spareparts + "' data-body='" + data.mainfactor + "' data-body='" + data.price + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.spareparts + "' data-body='" + data.mainfactor + "'data-body='" + data.price + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.spareparts + "' data-body='" + data.mainfactor + "'data-body='" + data.price + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
          "</tr>");
        }
      },
    });
    $('#spareparts').val('');
    $('#mainfactor').val('');
    $('#price').val('');
  });


  $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: '/addItem',
      data: {
        '_token': $('input[name=_token]').val(),
        'name': $('#spareparts').val(),
        'company': $('#mainfactor').val(),
        'price': $('#price').val(),
      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.spareparts);
          $('.error').text(data.errors.mainfactor);
          $('.error').text(data.errors.price);
        } else {
          $('.error').remove();
          $('#table').append("<tr class='post" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.spareparts + "</td>"+
          "<td>" + data.mainfactor + "</td>"+
          "<td>" + data.price + "</td>"+
          "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-spareparts='" + data.spareparts + "' data-mainfactor='" + data.mainfactor + "' data-price='" + data.price + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-spareparts='" + data.spareparts + "' data-mainfactor='" + data.mainfactor + "' data-price='" + data.price + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-spareparts='" + data.spareparts + "' data-mainfactor='" + data.mainfactor + "' data-price='" + data.price + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
          "</tr>");
        }
      },
    });
    $('#spareparts').val('');
    $('#mainfactor').val('');
    $('#price').val('');

  });

// function Edit POST
$(document).on('click', '.edit-modal', function() {

$('#fid').val($(this).data('id'));
  $('#n').val($(this).data('name'));
  $('#c').val($(this).data('company'));
  $('#p').val($(this).data('price'));
$('#myModal').modal('show');
});




// form Delete function
$(document).on('click', '.delete-modal', function() {
$('#footer_action_button').text("");
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
$('#Delete').modal('show');
});

$('.modal-footer').on('click', '.delete', function(){
  $.ajax({
    type: 'POST',
    url: 'deletePart',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.id').text()
    },
    success: function(data){
       $('.post' + $('.id').text()).remove();
    }
  });
});

  // Show function
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  $('#i').text($(this).data('id'));
  $('#na').text($(this).data('name'));
  $('#co').text($(this).data('company'));
  $('#pr').text($(this).data('price'));
  $('.modal-title').text('Show Post');
  });




 



    $("#Save").click(function() {

       myData = $("#myData").serialize();

    $.ajax({
      type: 'POST',
      url: '/updatedata',
      data: myData,
      
      success: function(data){
        if ((data.errors)) {
          
        } else {
         
        }
      },
    });

  });
   
 


                                                    $("#save").click(function () {



                                                        myData = $("#myData").serialize();

                                                        $.ajax({
                                                            type: "POST",
                                                            url: "/updatedata",
                                                            data: myData,
                                                            success: function (response) {
                                                                alert(" Data Updated");

                                                            }

                                                        })

                                                    })


                                                    $("#buttonsave").click(function () {



                                                        myData = $("#mypassdata").serialize();

                                                        $.ajax({
                                                            type: "POST",
                                                            url: "/RoleManager/UpdatePassword?CurrentPasswordUser=" + document.getElementById("CurrentPasswordUser").value + "&NewPasswordUser=" + document.getElementById("NewPasswordUser").value,
                                                            success: function (response) {
                                                                alert("Password Updated");

                                                            }

                                                        })

                                                    })


                                                    $("#buttonsavepicture").click(function () {



                                                        myData = $("#mypicture").serialize();

                                                        $.ajax({
                                                            type: "POST",
                                                            url: "/RoleManager/UpdateProfileImage?Picture=" + document.getElementById("Picture").value,
                                                            
                                                            success: function (response) {
                                                                alert(response);

                                                            }

                                                        })

                                                    })


