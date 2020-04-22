@extends('User.master')
@section('body') 
      <section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Forgot Password</h2>
                        <ul class="breadcrumbs">
                           <li><a href="#" title="">Home</a></li>
                           <li>Forgot Password</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="tz-register forgot_pwd">
         <div class="log-in-pop forgot-pop">
            <div class="log-in-pop-right">
               <a href="#" class="pop-close" data-dismiss="modal"><img src="{{URL('User/Asset/images/cancel.png')}}" alt="">
               </a>
               <h4>Forgot Password</h4>
               <p>Add Your Email id to get a new password.</p>
               <form class="s12 ng-pristine ng-valid">
                  <div>
                     <div class="input-field s12">
                        <input type="text" class="validate" value="Email Id">
                     </div>
                  </div>
                  <div>
                     <div class="input-field s4">
                        <input type="submit" value="Send My Password" class="waves-button-input"> 
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </section>
@endsection('body') 
