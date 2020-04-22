@extends('Users.master')
@section('body')
      <section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Login</h2>
                        <ul class="breadcrumbs">
                           <li><a href="{{route('/')}}" title="">Home</a></li>
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
               <!--h4>Login through social media</h4>
               <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                  </li>
                  <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                  </li>
                  <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                  </li>
               </ul-->
            </div>
            <div class="log-in-pop-right">
               <a href="#" class="pop-close" data-dismiss="modal"><img src="{{URL('UserAssets/images/cancel.png')}}" alt="">
               </a>
               <h4>Login</h4>
               <p>Don't have an account? Create your account. It's take less then a minutes</p>
               <form class="s12 ng-pristine ng-valid" id="login_form">
                 {{ csrf_field()}}
                  <div>
                     <div class="input-field s12">
                        <input type="text" name="email" data-ng-model="name1" class="validate" placeholder="Email" required="true">
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
                        <div class="social_login">
                           
                         </div>
                   @if(Session::has('user_login_error')) <div class="alert alert-danger" role="alert">
                            {{Session::get('user_login_error')}}
                           </div> 
                   @endif
                   <div class="alert alert-danger" role="alert" style="display: none" id="login_fail">
                      </div> 
                  @if(Session::has('register_message'))
                  <div class="alert alert-success" role="alert">{{Session::get('register_message')}}</div>
                   @endif
                     </div>
                  </div>
                  <div>
                     <div class="input-field s12"> <a href="{{route('forgot-password')}}">Forgot password</a> | <a href="{{route('User_register')}}">Create a new account</a> </div>
                  </div>
               </form>
             
            </div>
         </div>
      </section>
@endsection('body')
@section('script')
<!-- <script>
 $('#login_form').validate({rules: {    
         email:
        {      
            email: true ,
           
        },          
    messages: 
        {        
          email: 
          {
            required: "Please Enter  Email",
            email:"Your email address must be in the format of name@domain.com",
            remote: "Invalid Credentials"
          }
         
        }}});  

</script> -->
<script>
     
$(function($) {
   $('#login_form').validate({
       // ignore:"hidden:not(select)",
   rules: {
    
       email:
       {
           
           email: true ,
          
       },    
   },  
   messages: 
       {       
       
         email: 
         {
           required: "Please Enter  Email",
           email:"Your email address must be in the format of name@domain.com",
          
         },
       
       },
         highlight: function(element) {
           $(element).parent().addClass('has-error');
         },
         unhighlight: function(element) {
           $(element).parent().removeClass('has-error');
         },
             errorElement: 'span',
             errorClass: 'validation-error-message help-block form-helper bold',
             errorPlacement: function(error, element) {
               if (element.parent('.input-group').length) {
                 error.insertAfter(element.parent());
               } else {
                 error.insertAfter(element);
              }
            },
       submitHandler: function(form) 
       { 
                $.ajax({
                type:'POST',
                url:"{{route('User_login')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                   { 
                    var status = $.parseJSON(data);
                    if(status.succ){
                      window.location=status.succ;
                    }
                  if(status.error) $('#login_fail').css('display','block').html(status.error).fadeOut(7000);
                  
                   
                   }
           });
         } 
       
   });
});

</script>
@endsection('script')

