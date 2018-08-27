@extends('layouts.public') @section('content')
<div id="login-button">
  <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
  </img>
</div>
<div id="container">
  <div class="header">
    <h1>Log In</h1>
    <span class="close-btn">
      <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
    </span>
  </div>

  <div class="body">
    <form >
      <div class="form-group">
        <input type="text" name="username" id="username" placeholder="Username"/>
      </div>
      <div class="form-group">
        <input type="email" name="email" id="email" placeholder="E-mail"/>
      </div>      
      <div class="form-group">
        <input type="password" name="password" id="password" placeholder="Password"/>
      </div>
      <div class="form-group">
        <a class="login_button" id="login">Log in</a>
      </div> 
      <div class="form-group">
        <a class="register_button" id="register">Sign up</a>
      </div>      
    </form>
    <div id="remember-container">
      <input type="checkbox" id="checkbox-2-1" class="checkbox" checked="checked"/>
      <span id="remember">Remember me</span>
      <span id="forgotten">Forgotten password</span>
    </div>
  </div>

  <div class="footer">
    <div class="links"><a href="{{ url('auth/google') }}" class="google" ><i class="fa fa-google-plus"></i></a></div>
    <div class="links"><a href="{{ url('auth/facebook') }}" class="facebook" ><i class="fa fa-facebook-f"></i></a></div>
    <div class="links"><a href="{{ url('auth/twitter') }}" class="twitter" ><i class="fa fa-twitter"></i></a></div>
  </div>

  <div class="alert-message">
    <span class="closebtn-message">&times;</span>  
    <strong>Error!</strong> Wrong Login Details
  </div>
</div>

<!-- Forgotten Password Container -->
<div id="forgotten-container">
   <h1>Forgotten</h1>
  <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
  </span>

  <form class="form_forgot">
    <input type="email" name="email" placeholder="E-mail">
    <a href="#" class="orange-btn ">Get new password</a>
  </form>
</div>

<!-- Register content -->
<div id="container_register">
  <div class="header">
    <h1>Sign Up</h1>
    <span class="register-close-btn">
      <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
    </span>
  </div>

  <div class="body">
    <form >
      <div class="form-group">
        <input type="text" name="register-username" id="register-username" placeholder="Username"/>
      </div>
      <div class="form-group">
        <input type="email" name="register-email" id="register-email" placeholder="E-mail"/>
      </div>      
      <div class="form-group">
        <input type="password" name="register-password" id="register-password" placeholder="Password"/>
      </div>
      <div class="form-group register">
        <a class="signup_button" id="register" >Sign up</a>
      </div>      
    </form>
  </div>  
</div>
@endsection

@section('scripts')
<script>jQuery(function(){new Adminpanel.Controllers.Login();});</script>
@endsection