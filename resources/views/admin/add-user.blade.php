@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Add User</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
								<li class="breadcrumb-item"><a href="{{route('adm.users')}}">Users</a>
                                </li>
                                <li class="breadcrumb-item active">Add User</li>
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
								<h5>Add User
								
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
													<img src="{{URL('adminasset/1.jpg')}}" class="img-usr" id="image_upload_preview">
													<label class="set-pa" for="inputFile">
														<i class="fa fa-pencil"></i>
														<input type="file" name="profile_pic" id="inputFile"  style="visibility:hidden; width:0px; height:0px;">
														<label id="inputFile-error" class="help-block" style='color:red' for="inputFile"></label> 
													</label>
												</div>
												<h5 class="m-0 mt-3"></h5>
											</div>
										</div>
										<div class="col-md-8">
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">Firstname</label>
														<input class="form-control"  placeholder="Firstname" type="text" value="" name="name" required="true">
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">Lastname</label>
														<input class="form-control" placeholder="Lastname" type="text" value="" name="lastname" required="true">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group">
														<label for="l30">Email Address</label>
														<input class="form-control"  placeholder="Email Address" type="email" value="" name="email" required="true">
													</div>
												</div>
											</div>								
											
											<div class="row">
																					
												<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">Password</label>
														<input class="form-control"  placeholder="New password" type="password" id="newpassword" name="newpassword" required="true">
													</div>
												</div>
													<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">Confirm password</label>
														<input class="form-control"  placeholder="New password" type="password" id="confirmpassword" name="confirmpassword" required="true">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12 mt-3">
													<div class="form-actions btn-list">
														<button class="btn btn-primary" type="submit">Save Changes</button>
														<a href="{{route('adm.users')}}" class="btn btn-outline-default">Cancel</a>
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
          
            
             if($('#newpassword').val() == $('#confirmpassword').val())
             {
                  $("label.help-block").html("");
                 $("label.help-block").removeClass("error");
             	   $.ajax({
                   type:'POST',
                   url:"{{route('adm.add-user-detailes')}}",
                   data: new FormData(form),
                   contentType: false, 
                   cache: false, 
                   processData:false,
                   success:function(data)
                   {                        
                   // var result = $.parseJSON(data);
                  
                       if(data.errors)
                     {
                        if(data.errors.profile_pic)
                        {
                            $("label.help-block").addClass("error").html(data.errors.profile_pic);
                        }
                     }
                    
                    if(parseInt(data.success) ==102)
					{
                        $("#profile_changes")[0].reset();
                        $('#image_upload_preview').attr('src','{{URL("adminasset/1.jpg")}}');
						swal({
						title: "Data has been saved",
						text: "User has been added",
						icon: "success",
						button: "OK",
						});
					 }

					   if(parseInt(data.success) ==103)
					{
						swal("User already exists!", "Please use another email!");
					}
              

                }
           });

             }
                else
	             {
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
