<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Car Parts</title>
  
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

      <link rel="stylesheet" href="loginmine/css/style.css">

  
</head>

<body>

  <div class="cotn_principal">
<div class="cont_centrar">

  <div class="cont_login">
<div class="cont_info_log_sign_up">
      <div class="col_md_login">
<div class="cont_ba_opcitiy">
        
        <h2>LOGIN</h2>  
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> 
  <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
  </div>
  </div>
<div class="col_md_sign_up">
<div class="cont_ba_opcitiy">
  <h2>SIGN UP</h2>

  
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

  <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
</div>
  </div>
       </div>

    
    <div class="cont_back_info">
       <div class="cont_img_back_grey">
       <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
       </div>
       
    </div>
<div class="cont_forms" >
    <div class="cont_img_back_">
       <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
       </div>






        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
 <div class="cont_form_login">
<a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
   <h2>LOGIN</h2>
  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           

                            <div class="col-md-6">
                                <input style="width:250px ; height: 40px"  id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                                  </br>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div></br>
 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input style="width:250px ; height: 40px" id="password" type="password" class="form-control" name="password" required placeholder="Password">
</br>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </br>
                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                
                                

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                                <button type="submit" class="btn_login" onclick="cambiar_login()">LOGIN</button>
                            </div>
                        </div>

  </div>
</form>
  















 <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
   <div class="cont_form_sign_up">
<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
     <h2>SIGN UP</h2>
 <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input style="width:250px ; height: 30px" placeholder="Fname" id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autofocus>

                                @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      </br>
 <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input style="width:250px ; height: 30px" placeholder="Lname" id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required autofocus>

                                @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </br>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input style="width:250px ; height: 30px" placeholder="Email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </br>
 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input style="width:250px ; height: 30px" placeholder="Password" id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
</br>
                        <div class="form-group">
                            

                            <div class="col-md-6">
                                <input style="width:250px ; height: 30px" placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
</br>
<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input style="width:250px ; height: 30px" placeholder="Phone" id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </br>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input style="width:250px ; height: 30px" placeholder="Address" id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </br>
                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>

                            </div>
                        </div>


                        
  </div>


</form>

    </div>
    
  </div>
 </div>
</div>
  
  

    <script  src="loginmine/js/index.js"></script>




</body>

</html>
