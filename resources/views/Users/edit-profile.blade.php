@extends('Users.master')
@section('body')
      <section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Profile</h2>
                        <ul class="breadcrumbs">
                           <li><a href="{{route('/')}}" title="">Home</a></li>
                           <li>Edit Profile</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="block gray">
            <div class="container">
               <div class="row">
                
                  <div class="col-md-12">
                     <form id="profile_changes">
                        {{ csrf_field()}}
                     <div class="profile_edit">
                         <div class="col-md-3">
                     <div class="fixed-bar fl-wrap">
                        <div class="user-profile-menu-wrap fl-wrap">
                           <div class="user-profile-img box-des-ns">
                              <div class="img-nds">
                                 <img src="{{URL('public/profile_pictures')}}/{{Auth::User()->profile_image}}" class="img-responsive" id="uploadPreview">
                                 <label class="edt-img" for="uploadImage">
                                 <i class="fa fa-pencil"></i> 
                                 <input id="uploadImage" type="file" name="profile_pic" style="visibility:hidden; width:0px; height:0px;" onchange="PreviewImage();">
                                 </label>
                              </div>
                              <p class="user_name" id="changed_name">{{(Auth::User()->name)}}</p>
							  <p class="membr-snc"> <b> Member Since: </b>{{substr_replace(Auth::User()->created_at,"",-8)}}</p>
							 <!-- <ul class="rate-strs">-->
								<!--<li> <i class="fa fa-star"></i> </li>-->
								<!--<li> <i class="fa fa-star"></i> </li>-->
								<!--<li> <i class="fa fa-star"></i> </li>-->
								<!--<li> <i class="fa fa-star-half-o"></i> </li>-->
								<!--<li> <i class="fa fa-star-o"></i> </li>-->
								<!--<li class="numberz"> 3.5 / 5  </li> -->
							 <!-- </ul>-->
                            </div>
                        </div>
                     </div>
                  </div>
                         <div class="col-md-9">
                        <!-- profile-edit-container--> 
                        <div class="profile-edit-container">
                           <div class="profile-edit-header fl-wrap">
                              <h4>My Account</h4>
                           </div>
                           <div class="custom-form">
                              <div class="row">
                                  <div class="col-md-6">
                                    <label>First Name <i class="fa fa-user-o"></i></label>
                                    <input type="text" placeholder="Name" value="{{Auth::User()->name}}" name="name" id="Firstname">
                                 </div>                                
                                 <div class="col-md-6">
                                    <label>Email Address<i class="fa fa-envelope-o"></i>  </label>
                                    <input type="text" placeholder="" value="{{Auth::User()->email}}" name="email">
                                 </div>
                              </div>
                                 <div class="profile-edit-header fl-wrap">
                                  <h4>Change Password</h4>
                              </div>
                              <div class="row">
                           
                                 <div class="col-md-6">
                                    <label>Old Password<i class="fa fa-lock"></i>  </label>
                                    <input type="password" value="" name="oldpassword" id="oldpassword">
                                 </div>

                                  <div class="col-md-6">
                                    <label>New Password<i class="fa fa-lock"></i>  </label>
                                    <input type="password"  value="" name="newpassword" id="newpassword">
                                 </div>

                                 <div class="col-md-6" style="clear:both;">
                                    <label>Confirm Password <i class="fa fa-lock"></i>  </label>
                                    <input type="password"  value="" name="confirmpassword" id="confirmpassword"> 
                                 </div>
                                 <br>

                                
                              </div>
                               <span id="pass-error" class="text-danger"></span>

                                                            <button class="btn  big-btn  color-bg flat-btn">Save Changes<i class="fa fa-angle-right"></i></button>

                           </div>
                        </div>
                        <!-- profile-edit-container end-->  										
                        <!-- profile-edit-container--> 
                        <div class="profile-edit-container " style="display:none">
                           <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                              <h4>My Socials</h4>
                           </div>
                           <div class="custom-form">
                              <div class="row">
                                 <div class="col-md-6">
                                    <label>Facebook <i class="fa fa-facebook"></i></label>
                                    <input type="text" placeholder="https://www.facebook.com/" value="">
                                 </div>
                                 <div class="col-md-6">
                                    <label>Twitter<i class="fa fa-twitter"></i>  </label>
                                    <input type="text" placeholder="https://twitter.com/" value="">
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <label> Google  <i class="fa fa-google-plus"></i>  </label>
                                    <input type="text" placeholder="https://www.google.com" value="">
                                 </div>
                                 <div class="col-md-6">
                                    <label> Whatsapp <i class="fa fa-whatsapp"></i>  </label>
                                    <input type="text" placeholder="https://www.whatsapp.com" value="">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- profile-edit-container end-->                                        
                     </div>
                     </div>
                  </form>
                  </div>
                  <!--div class="col-md-2">
                     <div class="edit-profile-photo fl-wrap">
                         <img src="images/tutor-8.jpg" class="respimg img-responsive" alt="">
                         <div class="change-photo-btn">
                             <div class="photoUpload">
                                 <span><i class="fa fa-upload"></i> Upload Photo</span>
                                 <input type="file" class="upload">
                             </div>
                         </div>
                     </div>
                     </div-->
               </div>
            </div>
         </div>
      </section>
    @endsection('body')


@section('script')
<script>
   

$(function($) {
   $('#profile_changes').validate({
       //ignore: " ",
   rules: {  
          name:{required:true},

        email:
       {
           required: true,
           email: true ,
           
       },      
       newpassword: {
    required: function(element){
            return $("#oldpassword").val()!="";
        },
        minlength:6,
                    maxlength:20,
},
       confirmpassword: {
    required: function(element){
            return $("#newpassword").val()!="";
        },
        equalTo:"#newpassword",
},
  oldpassword: {
    required: function(element){
            return $("#confirmpassword").val()!="";
        }
}

   },  
   messages: 
       {       

         email: 
         {
           required: "Please enter your email",
           email:"Your email address must be in the format of name@domain.com",          
         },
         name:{required:"Please enter your name"},
         newpassword:{
            minlength:"Password should be of minimum 6 characters",
            maxlength:"Password should be of maximum 20 characters",
            equalTo:"Please confirm the password",
         },
         confirmpassword:{equalTo:"Please confirm your password"}
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
                   url:"{{route('edit_profile_data')}}",
                   data: new FormData(form),
                   contentType: false, 
                   cache: false, 
                   processData:false,
                   success:function(data)
                   {                        
                    var result = $.parseJSON(data);
                    if(result.status==102)
                    {
              $('#changed_name').html($('#Firstname').val());
              $('.profile_picture').attr('src','{{URL("public/profile_pictures/")}}/{{Auth::User()->profile_image}}');
               $('#changed_name').html($('#Firstname').val());
              $('.profile_picture').attr('src','{{URL("public/profile_pictures/")}}/{{Auth::User()->profile_image}}');
              $('input[name=oldpassword').val('');
              $('input[name=newpassword').val('');
              $('input[name=confirmpassword').val('');
                     swal({
                     title: "Changes have been saved",
                     text: "Your profile data and password has been changed",
                     icon: "success",
                     button: "OK",
                     });
                   }
                if(result.status==103)
                  {
                     
                    var pict ='{{URL("public/profile_pictures/")}}/'+result.pic;
                     $('.profile_picture').attr('src',pict);     
                     $('#changed_name').html($('#Firstname').val());      
                     swal({
                     title: "Updated successfully",
                     text: "Your profile data has been updated",
                     icon: "success",
                     button: "OK",
                     });
                 }

                   if(result.status==104)
                  {
                     swal("Sorry password did not match with old password");
                   }

                    if(result.status==105)
                  {
                     swal("Email already exists, Try another");
                   }

                }
           });

                      
        
       } 
       
   });
});



    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

    $('#uploadImage').on('change', function() {

  var fileExtension = ['jpeg', 'jpg', 'png', 'gif'];

       if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {

         swal("Allowed formats: "+fileExtension.join(', '));

         $(this).val(null);

          return false;

       }

});

</script>
@endsection('script')
