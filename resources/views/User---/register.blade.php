@extends('User.master')
@section('body')  
    <section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Register</h2>
                        <ul class="breadcrumbs">
                           <li><a href="#" title="">Home</a></li>
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
               <h4>Register</h4>
               <p>Don't have an account? Create your account. It's take less then a minutes</p>
               <form class="s12 ng-pristine ng-valid" id="register_form">
                  {{ csrf_field() }}

                  <div>
                     <div class="input-field s12">
                        <input type="text" class="validate" name="name" placeholder="name" required="true">
                     </div>
                  </div>
                  <div>
                     <div class="input-field s12">
                        <input type="email" class="validate email" name="email" placeholder="Email Id" required="true">
                     </div>
                  </div>
                  <div>
                     <div class="input-field s12">
                        <input type="password" class="validate password" name="password" placeholder="Password" required="true">
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
                     <div class="input-field s12"> <a href="{{route('SignIn')}}">Are you a already member ? Login</a> </div>
                  </div>
               </form>
            </div>
         </div>
      </section>
@endsection('body') 

@section('script')
<script>
   
$(function($) {
   jQuery.validator.addMethod("lettersonly", function(value, element) { return this.optional(element) || /^[a-z]+$/i.test(value); }, "Please letters only ");
   $('#register_form').validate({
   rules: {
       email:{
           required:true
       },
        name:{
           lettersonly:true
       }
   },  
   messages: {
       email:
         {
           required:"Please Enter Email",
           //alphabetsnspace: "Please Enter Only Letters"
         }     
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
          if($('.password').val()==$('.password_confirmation').val())
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
                           window.location.href ='{{route("SignIn")}}';
                         }

                          if(result.status==103)
                         {
                           $('.email').val('');
                           $('.password').val('');
                           $('.password_confirmation').val('');
                           swal("This email already exsists, please choose another");

                         }
                       }
               });

          }
          else{
             swal("Passwords do not match");
          }

               
           
       } 
       
   });
});


</script>
@endsection('script')     