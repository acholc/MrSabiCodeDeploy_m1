@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">About us</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
								<li class="breadcrumb-item"><a href="{{route('adm.all-pages')}}">Pages</a>
                                </li>
                                <li class="breadcrumb-item active">About us</li>
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
								<h5>About us</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<form id="aboutus" method="POST" enctype="multipart/form-data">
									{{ csrf_field()}}
									<div class="row">
										<input type="hidden" name="id" value="{{ $data['id']}}"> 
										<div class="col-md-12">
											<div class="row" style="display:none">
												<div class="col-lg-12">
													<div class="form-group">
														<label for="l30">Page Title</label>
														<input class="form-control"  type="text" value="{{ $data['title'] }}" name="title" required="true">
													</div>
												</div>
											</div>
							<div class="row">
							  <div class="col-lg-6">
							      <label for="l30">Top Banner</label>
                              <div class="form-group input-has-value">
                                    @php 
                                        $img=url('/public/deal_images')."/dummimage.jpeg";
                                        if($data['pagedata']['images']['banner'])
                                        {
                                            $img=url('/public/page_images')."/".$data['pagedata']['images']['banner'];
                                        }
                                 @endphp
                                  <img id="fourth" src="{{ $img }}" width="100px" alt="your image" />
                                  <input name="top_banner_img" id="top_banner_img" type="file" accept="image/*">
                                  <label id="top_banner_img-error" class="help-block" style='color:red' for="top_banner_img"></label>
                              </div>
                          </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label for="l30">Top Left Title</label>
                                    <input  name="top_left_title" id="top_left_title" value="@if($data['pagedata']['content']['top_left_title']){{$data['pagedata']['content']['top_left_title'] }}@endif"  class="form-control">
                                </div>
                            </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="l30">Top Right Description</label>
                                <textarea data-toggle="tinymce" name="top_right_desc" id="top_right_desc"  data-plugin-options='{ "height": 400 }'>
                                    @if($data['pagedata']['content']['top_right_desc']){{$data['pagedata']['content']['top_right_desc'] }}@endif
								</textarea>
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group">
                                <label for="l30">Middle Title</label>
                                <input  class="form-control" name="middle_title" value="@if($data['pagedata']['content']['middle_title']){{$data['pagedata']['content']['middle_title'] }}@endif" id="middle_title">
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="l30">Middle First sub Title</label>
                                <input  class="form-control" name="midd_first_sub_title" value="@if($data['pagedata']['content']['midd_first_sub_title']){{$data['pagedata']['content']['midd_first_sub_title'] }}@endif" id="midd_first_sub_title">	
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="l30">Middle First Sub Description</label>
                                <input  class="form-control" name="midd_first_sub_desc" value="@if($data['pagedata']['content']['midd_first_sub_desc']){{$data['pagedata']['content']['midd_first_sub_desc'] }}@endif" id="midd_first_sub_desc">
                            </div>
                        </div>
                        <div class="col-lg-4">
                              <div class="form-group input-has-value">
                                    @php  
                                        $firstimg=url('/public/deal_images')."/dummimage.jpeg";
                                        if($data['pagedata']['images']['midd_first_img'])
                                        {
                                            $firstimg=url('/public/page_images')."/".$data['pagedata']['images']['midd_first_img'];
                                        }
                                 @endphp
                                  <img id="blah" src="{{ $firstimg }}" width="100px" alt="your image" />
                                  <input name="midd_first_img" id="midd_first_img" type="file" accept="image/*">
                                  <label id="midd_first_img-error" class="help-block2" style='color:red' for="midd_first_img"></label>
                              </div>
                          </div>
                           <div class="col-md-4">
                            <div class="form-group">
                                <label for="l30">Middle Second sub Title</label>
                                <input  class="form-control" name="midd_secnd_sub_title" value="@if($data['pagedata']['content']['midd_secnd_sub_title']){{$data['pagedata']['content']['midd_secnd_sub_title'] }}@endif" id="midd_secnd_sub_title">
									
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="l30">Middle Second Sub Description</label>
                                <input  class="form-control" name="midd_secnd_sub_desc" value="@if($data['pagedata']['content']['midd_secnd_sub_desc']){{$data['pagedata']['content']['midd_secnd_sub_desc'] }}@endif" id="midd_secnd_sub_desc">
									
                            </div>
                        </div>
                        <div class="col-lg-4">
                              <div class="form-group input-has-value">
                                  @php  
                                  
                                        $scndimg=url('/public/deal_images')."/dummimage.jpeg";
                                        
                                        if($data['pagedata']['images']['midd_secnd_img'])
                                        {
                                            $scndimg=url('/public/page_images')."/".$data['pagedata']['images']['midd_secnd_img'];
                                        }
                                        
                                 @endphp
                                  <img id="second" src="{{ $scndimg }}" width="100px" alt="your image" />
                                  <input name="midd_secnd_img" id="midd_secnd_img" type="file" accept="image/*">
                                  <label id="midd_secnd_img-error" class="help-block3" style='color:red' for="midd_secnd_img"></label>
                              </div>
                          </div>
                          
                          <div class="col-md-4">
                            <div class="form-group">
                                <label for="l30">Middle Third sub Title</label>
                                <input  class="form-control" name="midd_third_sub_title" value="@if($data['pagedata']['content']['midd_third_sub_title']){{$data['pagedata']['content']['midd_third_sub_title'] }}@endif" id="midd_third_sub_title">
									
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="l30">Middle Third Sub Description</label>
                                <input  class="form-control" name="midd_third_sub_desc" value="@if($data['pagedata']['content']['midd_third_sub_desc']){{$data['pagedata']['content']['midd_third_sub_desc'] }}@endif" id="midd_third_sub_desc">
									
                            </div>
                        </div>
                        <div class="col-lg-4">
                              <div class="form-group input-has-value">
                                    @php  
                                        $thirdimg=url('/public/deal_images')."/dummimage.jpeg";
                                        
                                        if($data['pagedata']['images']['midd_third_img'])
                                        {
                                            $thirdimg=url('/public/page_images')."/".$data['pagedata']['images']['midd_third_img'];
                                        }
                                 @endphp
                                  <img id="third" src="{{ $thirdimg }}" width="100px" alt="your image" />
                                  <input name="midd_third_img" id="midd_third_img" type="file" accept="image/*">
                                  <label id="midd_third_img-error" class="help-block4" style='color:red' for="midd_third_img"></label>
                              </div>
                          </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="l30">Bottom Description</label>
                                <textarea data-toggle="tinymce" name="bottom_desc" id="bottom_desc" data-plugin-options='{ "height": 400 }'>
                                    @if($data['pagedata']['content']['bottom_desc']){{$data['pagedata']['content']['bottom_desc'] }}@endif
								</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="l30">Bottom Title</label>
                                <input  class="form-control" name="bottom_title" value="@if($data['pagedata']['content']['bottom_title']){{$data['pagedata']['content']['bottom_title'] }}@endif" id="bottom_title">
                            </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group input-has-value">
                                    @php  
                                        $bottomimg=url('/public/deal_images')."/dummimage.jpeg";
                                        
                                        if($data['pagedata']['images']['bottom_img'])
                                        {
                                            $bottomimg=url('/public/page_images')."/".$data['pagedata']['images']['bottom_img'];
                                        }
                                 @endphp
                                  <img id="bottom" src="{{ $bottomimg }}" width="100px" alt="your image" />
                                  <input name="bottom_img" id="bottom_img" type="file" accept="image/*">
                                  <label id="bottom_img-error" class="help-block5" style='color:red' for="bottom_img"></label>
                              </div>
                          </div>
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
    
   // banner preview //  
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#fourth').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#top_banner_img").change(function(){
  readURL(this);
});
    
    // midd first image //
     function readURLs(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#midd_first_img").change(function() {
  readURLs(this);
});
    
    // midd second image//
     function secondreadURL(input) {
  if(input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#second').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#midd_secnd_img").change(function() {
  secondreadURL(this);
});

 // midd third image //
 
     function thirdreadURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#third').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#midd_third_img").change(function() {
  thirdreadURL(this);
});

// bootom image //
function bootomreadURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#bottom').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#bottom_img").change(function() {
  bootomreadURL(this);
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#aboutus').validate({   
    rules: {
        title:{
            required:true,
          
        },
        
    },  
     
        submitHandler: function(form) 
        { 
            $("label.help-block").html("");
            $("label.help-block").removeClass("error");
             $.ajax({
                type:'POST',
                url:"{{route('adm.save_about_us')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                { 
                  //var result = $.parseJSON(data);
                 if(data.errors)
                    {
                        if(data.errors.top_banner_img)
                        {
                            $("label.help-block").addClass("error").html(data.errors.top_banner_img);
                        }
                       
                        if(data.errors.midd_first_img)
                        {
                            $("label.help-block2").addClass("error").html(data.errors.midd_first_img);
                        }
                        if(data.errors.midd_secnd_img)
                        {
                            $("label.help-block3").addClass("error").html(data.errors.midd_secnd_img);
                        }
                        if(data.errors.midd_third_img)
                        {
                            $("label.help-block4").addClass("error").html(data.errors.midd_third_img);
                        }
                        if(data.errors.bottom_img)
                        {
                            $("label.help-block5").addClass("error").html(data.errors.bottom_img);
                        }
                    }
                    
                  if(parseInt(data.success) ==102)
					{
					   
						swal({
						title: "Saved",
						text: "Saved",
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
</script>


@endsection('script')
