@extends('Users.master')
@section('body')
      <section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Forgot Password</h2>
                        <ul class="breadcrumbs">
                           <li><a href="{{route('/')}}" title="">Home</a></li>
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
               <a href="#" class="pop-close" data-dismiss="modal"><img src="{{URL('UserAssets/images/cancel.png')}}" alt="">
               </a>
               <h4>Forgot Password</h4>
               <p>Add Your Email id to get a new password.</p>
               <form class="s12 ng-pristine ng-valid" id="reset_password">
                  {{csrf_field()}}
                  <div>
                     <div class="input-field s12">
                        <input type="text" class="validate" placeholder="Email Id" name="email">
                     </div>
                  </div>
                  <div>
                     <div class="input-field s4">
                        <input type="submit" value="Reset Password" class="waves-button-input" id="submit"> 
                     </div>
                     @if(Session::has('error'))<div class="alert alert-danger" role="alert" id="email_error">
                                  {{Session::get('error')}}
                                 </div>
                     @endif
                    <div class="alert alert-secondary" role="alert" id="success" style="display: none;">
                                
                   </div>
                    
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
  
       email:
       {  required: true,
           email: true ,           
       },


   },  
   messages: 
       {    
         email: 
         {
           required: "Please Enter  Email",
           email:"Your email address must be in the format of name@domain.com",
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
       {         $('#submit').prop('disabled', true);
                $('#submit').attr('value', 'Wait...');
              $.ajax({
                   type:'POST',
                   url:"{{route('reset_password')}}",
                   data: new FormData(form),
                   contentType: false, 
                   cache: false, 
                   processData:false,
                   success:function(data)
                   {                        
                    if(data==102){
                      $("#reset_password").trigger("reset");
                       $('#success').css('display','block');
                       $('#success').attr('class','alert alert-success');
                      $('#success').html('The confirmation link is sent to your registered email').fadeOut(5000);
                       $('#submit').attr('value', 'Reset Password');
                       $('#submit').prop('disabled', false);

                    }
                    if(data==103){                     
                      $('#success').css('display','block');
                      $('#success').attr('class','alert alert-danger');
                      $('#success').html('Email does not exists').fadeOut(5000);
                      $('#submit').attr('value', 'Reset Password');
                      $('#submit').prop('disabled', false);
                    }

                   }
           });
       } 
       
   });
});
  if('{{Session::get("error")}}'){$('#email_error').fadeOut(5000);}
</script>
@endsection('script')