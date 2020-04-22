@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Profile Settings</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Profile Settings</li>
                            </ol>
                        </div>
                        <!-- /.page-title-right -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.page-title -->
            <!-- =================================== -->
            <div class="container">
                <div class="row">
					<div class="col-md-12 widget-holder">
						<div class="widget-bg">
							<div class="widget-heading clearfix">
								<h5>Profile Settings
								
								</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<form id="profile_changes">
									{{ csrf_field()}}
									<div class="row">
										<div class="col-md-4">
											<div class="box-im-set">
												<div class="img-srt-bt">
													<img src="{{URL('public/profile_pictures/')}}/{{Auth::User()->profile_image}}" class="img-usr" id="image_upload_preview">
													<label class="set-pa" for="inputFile">
														<i class="fa fa-pencil"></i>
														<input type="file" name="profile_pic" id="inputFile"  style="visibility:hidden; width:0px; height:0px;">
													</label>
												</div>
												<h5 class="m-0 mt-3" id="changed_name">{{Auth::User()->name}}</h5>
											</div>
										</div>
										<div class="col-md-8">
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">Firstname</label>
														<input class="form-control"  placeholder="Firstname" type="text" value="{{Auth::User()->name}}" name="name" id="Firstname">
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">Lastname</label>
														<input class="form-control" placeholder="lastname" type="text" value="{{Auth::User()->lastname}}" name="lastname">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">Email Address</label>
														<input class="form-control"  placeholder="Email Address" type="email" value="{{Auth::User()->email}}" name="email" >
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">Phone Number</label>
														<input class="form-control"  placeholder="Phone Number" type="text" value="{{Auth::User()->phone}}" name="phone">
													</div>
												</div>
											</div>
										
											<h4 class="dobl-brdr mt-2">Change password</h4>
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group">
														<label for="l30">Old Password</label>
														<input class="form-control"  placeholder="oldpassword" type="password" name="oldpassword" id="oldpassword">
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">New Password</label>
														<input class="form-control"  placeholder="newpassword" type="password" name="newpassword" id="newpassword">
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">Confirm New Password</label>
														<input class="form-control"  placeholder="confirmpassword" type="password" id="confirmpassword">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12 mt-3">
													<div class="form-actions btn-list">
														<button class="btn btn-primary" type="submit">Save Changes</button>
														<a href="{{route('adm.admin')}}" class="btn btn-outline-default">Cancel</a>
															<span id="pass-error" class="text-danger"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									
								</form>
							</div>
							<!-- /.widget-body -->
						</div>
						<!-- /.widget-bg -->
					</div>
               </div>
            </div>
            <!-- /.container -->
        </main>
@endsection('body')

@section('script')
<script>
	

$(function($) {
   $('#profile_changes').validate({
       //ignore: " ",
   rules: {    
       password:
       {
           required:true,           
       },   
       email:
       {
           required: true,
           email: true ,
           
       },
       newpassword: {
    required: function(element){
            return $("#oldpassword").val()!="";
        }
},
       oldpassword: {
    required: function(element){
            return $("#newpassword").val()!="";
        }
},
  oldpassword: {
    required: function(element){
            return $("#confirmpassword").val()!="";
        }
}

   },  
   messages: 
       {       
  
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
                   url:"{{route('adm.profile-changes')}}",
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
              $('#profile_picture').attr('src','{{URL("public/profile_pictures/")}}/{{Auth::User()->profile_image}}');

							swal({
							title: "Changes have been saved",
							text: "Your profile data and password has been changed",
							icon: "success",
							button: "OK",
							});
                   }
                if(result.status==103)
                  {
                    var pic ='{{URL("public/profile_pictures/")}}/'+result.pic;
                $('#profile_picture').attr('src',pic);     
              $('#changed_name').html($('#Firstname').val());      
							swal({
							title: "Changes have been saved",
							text: "Your profile data has been changed",
							icon: "success",
							button: "OK",
							});
                 }

                   if(result.status==104)
                  {
							swal("Sorry password did not matched with old password");
                   }

                }
           });

             }
             else{
              $('#pass-error').html('Passwords do not match');
             }          
        
       } 
       
   });
});

// <!-- profile pic review----- -->
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function () {
        readURL(this);
    });

</script>
@endsection('script')
