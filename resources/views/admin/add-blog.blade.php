@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Add Blog</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
								<li class="breadcrumb-item"><a href="{{route('adm.blogs')}}">Blogs</a>
                                </li>
                                <li class="breadcrumb-item active">Add Blog</li>
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
								<h5>Add Blog</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<form id="addblog">
									{{ csrf_field()}}
									<div class="row">
										
										<div class="col-md-8">
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group">
														<label for="l30">Title</label>
														<input class="form-control"  placeholder="Title" type="text" value="" name="title">
													</div>
												</div>
											
											</div>
											
											<div class="row">
                        
                        <!-- /.col-md-12 -->
                        <div class="col-md-12">
                           
                                <div class="form-group">
                                    <label for="l30">Description</label>
                                    <textarea name="description" data-toggle="tinymce" data-plugin-options='{ "height": 400 }'></textarea>
                                </div>
                                <!-- /.widget-body -->
                           
                            <!-- /.widget-bg -->
                        </div>
                        <!-- /.widget-holder -->
                    </div>
                    <!-- /.row -->				
				</div>
										
					<div class="col-md-4">
						<div class="widget-bg">
                            <div class="widget-body clearfix">
                                        <div class="form-group">
                                            <label class="form-control-label">Choose Categories</label>
                                            <select name="category[]" class="m-b-10 form-control" multiple="multiple" data-placeholder="Choose" data-toggle="select2">
                                               
                                               @if(isset($data))
                                               @foreach($data as $cat)
                                                    <option value ="{{ $cat->id }}">{{ $cat->category }}</option>
                                                @endforeach
                                                @endif
                                               
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    <div class="form-group mr-t-10">
										<label class="form-control-label">Add Tags</label>
                                       <select name="tag[]" class="m-b-10 form-control" multiple="multiple" data-placeholder="Choose" data-toggle="select2">
                                               
                                               @if(isset($tags))
                                               @foreach($tags as $tag)
                                                    <option value ="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                                @endforeach
                                                @endif
                                               
                                            </select>
                                    </div>
                                
												<div class="featured_img">
												<label class="form-control-label">Featured Image</label>
												<div class="img-srt-bt">
													<img src="{{URL('adminasset/1.jpg')}}" class="img-usr" id="image_upload_preview">
													<label class="set-pa" for="inputFile">
														<i class="fa fa-pencil"></i>
														<input type="file" name="image" id="inputFile"  style="visibility:hidden; width:0px; height:0px;">
													</label>
													<label id="inputFile-error" class="help-block" style='color:red' for="inputFile"></label>
												</div>
												
												</div>
												</div>
												 <!-- /.widget-body -->
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
	  $(document).ready(function() {
    $('#addblog').validate({   
    rules: {
        
        title:{
            required:true,
        },
        description:{
            required:true,
          
        },
        category:{
            required:true,
        },
        tag:{
            
            required:true,
        },
        
    },  
    messages: 
        { 
           title:
           {
            required:"This field is required",
          },
         
         description: 
          {
            required:'This field is required',
          },     
          category:{
            required:"This field is required",
        },
        tag:{
            
            required:"This field is required",
        },
        
       
        },
          
        submitHandler: function(form) 
        { 
            $("label.help-block").html("");
            $("label.help-block").removeClass("error");
             $.ajax({
                type:'POST',
                url:"{{route('adm.save_blog')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                { 
                  //var result = $.parseJSON(data);
                 
                 if(data.errors)
                    {
                        if(data.errors.image)
                        {
                            $("label.help-block").addClass("error").html(data.errors.image);
                        }
                    }
                 
                  	if(parseInt(data.success) ==102)
					{ 
						swal({
						title: "Blog has been saved",
						text: "Blog has been added",
						icon: "success",
						button: "OK",
						}).then(function() {
                	window.location.reload();
                });
						
					 }

                  }
             });
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
