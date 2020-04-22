@extends('Users.master')
@section('body')
      <section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Reset Password</h2>
                        <ul class="breadcrumbs">
                           <li><a href="{{route('/')}}" title="">Home</a></li>
                           <li>Reset Password</li>
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
               <a href="#" class="pop-close" data-dismiss="modal"><img src="{{URL('UserAssets/images/cancel.png')}}" alt="">
               </a>
               <h4>Reset Password</h4>
               <form class="s12 ng-pristine ng-valid" id="reset_password">
                  {{csrf_field()}}
                  <div>
                     <div class="input-field s12">
                        <p>New Password</p>
                        <input type="password" class="validate" placeholder="New password" name="newpassword" required="true" id="newpassword">
                     </div>

                     <div class="input-field s12">
                        <p>Confirm Password</p>
                        <input type="password" class="validate" placeholder="Confirm password" name="confirmpassword" required="true" id="confirmpassword">
                     </div>                    
                  </div>
                  <div>
                     <div class="input-field s4">
                        <input type="submit" value="Reset Password" class="waves-button-input"> 
                     </div>
                      <div class="alert alert-danger" role="alert" style="display: none;" id="pass-error"></div>
                  </div>
               </form>
            </div>
         </div>
      </section>
@endsection('body')
@section('script')
<script>
  $(function($) {
   $('#reset_password').validate({
       //ignore: " ",
   rules: { 
   newpassword:{minlength:6,
                       maxlength:20},   
       password:
       {
           required:true,           
       },   
       email:
       {
           required: true,
           email: true ,
           
       },
   },  
   messages: 
       {   newpassword:{    
                           minlength:"Password should be of minimum 6 characters",
                   maxlength:"Password should be of maximum 20 characters"},
         password:
         {
           required:'Please Enter Password', 
         },         
         email: 
         {
           required: "Please Enter  Email",
           email:"Your email address must be in the format of name@domain.com",
           remote: "Invalid Credentials"
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
             if($('#newpassword').val() == $('#confirmpassword').val()){
                  $.ajax({
                   type:'POST',
                   url:"{{route('change-password')}}",
                   data: new FormData(form),
                   contentType: false, 
                   cache: false, 
                   processData:false,
                   success:function(data)
                   {                        
                    if(data==1){
                       swal({
                title: "Great!!",
                text: "Password has been reset, login now",
                icon: "success",
                button: "OK",
                }).then(function() {
                window.location = "{{route('SignIn')}}";
                });
                    }
                    if(data==2){
                    swal("Something went wrong, Please try again").then(function() {
                window.location = "{{route('password-reset')}}";
                });
                    }

                   }
           });

             }
             else{
               $('#pass-error').css('display','block').html('Passwords do not match').fadeOut(5000);
             
             }          
        
       } 
       
   });
});
</script>
@endsection('script')