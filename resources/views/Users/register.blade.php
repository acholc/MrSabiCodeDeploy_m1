@extends('Users.master')
@section('body')
      <section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Register</h2>
                        <ul class="breadcrumbs">
                           <li><a href="{{route('/')}}" title="">Home</a></li>
                           <li>Register</li>
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
               <!--p>Don't have an account? Create your account. It's take less then a minutes</p-->
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
               <h4>Register</h4>
               <p>Don't have an account? Create your account. It's take less then a minutes</p>
             <form class="s12 ng-pristine ng-valid" id="register_form">
                  {{ csrf_field() }}

                  <div>
                     <div class="input-field s12">
                        <input type="text" class="validate" name="name" placeholder="Name" required="true">
                     </div>
                  </div>
                  <div>
                     <div class="input-field s12">
                        <input type="text" class="validate email" name="email" placeholder="Email Id" required="true">
                     </div>
                  </div>
                  <div>
                     <div class="input-field s12">
                        <input type="password" class="validate password" name="password" placeholder="Password" required="true" id="password">
                     </div>
                  </div>
                  <div>
                     <div class="input-field s12">
                        <input type="password" class="validate password_confirmation" name="password_confirmation" placeholder="Confirm Password" required="true">
                     </div>
                  </div>
                  <div>
                     <div class="input-field s4">
                        <input type="submit" value="Register" class="waves-button-input"> 
                     </div>
                  </div>
                  <div>
                     <div class="input-field s12"> <span class="t_sign">Are you a already member ?</span> <a href="{{route('SignIn')}}">Login</a> </div>
                  </div>
               </form>
            </div>
         </div>
      </section>

@endsection('body')

@section('script')
<script>
   
$(function($) {
   //jQuery.validator.addMethod("lettersonly", function(value, element) { return this.optional(element) || /^[a-z]+$/i.test(value); }, "Please letters only ");
   $('#register_form').validate({
   rules: {
        name:{required:true},
       email:{
           required:true
       },
        password:{
         required: true,
                    minlength: 6,
                    maxlength: 20,
       },password_confirmation: {
            required: true,
            minlength: 5,
            equalTo: "#password"
        }
   },  
   messages: {
       email:
         {
           required:"Please enter your email",
           //alphabetsnspace: "Please Enter Only Letters"
         },   password: { 
                 required:"Please make a password",
                  minlength:"Password should be of minimum 6 characters",
                  maxlength:"Password should be of maximum 20 characters"


               },password_confirmation:{equalTo:"Passwords do not match"},
               password_confirmation:{required:"Please confirm your password"},
               name:{required:"Please enter your name"}    
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
                       url:"{{route('RegisterData')}}",
                       data: new FormData(form),
                       contentType: false, 
                       cache: false, 
                       processData:false,
                       success:function(data)
                       {
                          var result = $.parseJSON(data);
                         if(result.status==102)
                         {
                           window.location.href ='{{route("/")}}';
                         }

                          if(result.status==103)
                         {
                           $('.email').val('');
                           $('.password').val('');
                           $('.password_confirmation').val('');
                           swal("This email already exists, please choose another");

                         }
                       }
               });

      
               
           
       } 
       
   });
});


</script>
@endsection('script')   