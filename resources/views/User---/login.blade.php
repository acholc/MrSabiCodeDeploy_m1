@extends('User.master')
@section('body')   
      <section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Login</h2>                        
                        <ul class="breadcrumbs">
                           <li><a href="#" title="">Home</a></li>
                           <li>Login</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="tz-register">
         <div class="log-in-pop">
            <div class="log-in-pop-left">
               <p>Don't have an account? Create your account. It's take less then a minutes</p>
               <h4>Login with social media</h4>
               <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                  </li>
                  <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                  </li>
                  <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                  </li>
               </ul>
            </div>
            <div class="log-in-pop-right">
               <a href="#" class="pop-close" data-dismiss="modal"><img src="{{URL('UserAsset/images/cancel.png')}}" alt="">
               </a>
               <h4>Login</h4>
               <p>Don't have an account? Create your account. It's take less then a minutes</p>
               <form class="s12 ng-pristine ng-valid" action="{{route('User_login')}}" method="post">
                 {{csrf_field()}}
                  <div>
                     <div class="input-field s12">
                        <input type="email" name="email" data-ng-model="name1" class="validate" placeholder="Username">
                     </div>
                  </div>

                  <div>
                     <div class="input-field s12">
                        <input type="password" name="password" class="validate" placeholder="Password" required="true">
                     </div>
                  </div>
                  <div>
                     <div class="input-field s4">
                        <input type="submit" value="Login" class="waves-button-input"> 
                     </div>
                  </div>
                  <div>
                     <div class="input-field s12"> <a href="{{route('forgot-password')}}">Forgot password</a> | <a href="{{route('User_register')}}">Create a new account</a> </div>
                  </div>
               </form>
               
                </section>
@endsection('body')