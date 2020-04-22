@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Home</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
								<li class="breadcrumb-item"><a href="{{route('adm.all-pages')}}">Pages</a>
                                </li>
                                <li class="breadcrumb-item active">Home</li>
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
								<h5>Home</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<form id="home" method="POST" enctype="multipart/form-data">
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
							      <label for="l30">First Slide Image</label>
                              <div class="form-group input-has-value">
                                  @php  
                                  
                                        $img=url('/public/deal_images')."/dummimage.jpeg";
                                        
                                        if($data['pagedata']['images']['first_slide_img'])
                                        {
                                        
                                            $img=url('/public/page_images')."/".$data['pagedata']['images']['first_slide_img'];
                                        }
                                        
                                 @endphp
                                  <img id="fourth" src="{{ $img }}" width="100px" alt="your image" />
                                  <input name="first_slide_img" id="first_slide_img" type="file"  accept="image/*">
                              </div>
                          </div>
                        <div class="col-lg-6">
                             <label for="l30">Second Slide Image</label>
                              <div class="form-group input-has-value">
                                   @php  
                                        $secimg=url('/public/deal_images')."/dummimage.jpeg";
                                        
                                        if($data['pagedata']['images']['second_slide_img'])
                                        {
                                        
                                            $secimg=url('/public/page_images')."/".$data['pagedata']['images']['second_slide_img'];
                                        }
                                        
                                 @endphp
                                  <img id="blah" src="{{ $secimg }}" width="100px" alt="your image" />
                                  <input name="second_slide_img" id="second_slide_img" type="file" accept="image/*">
                              </div>
                          </div>
                        <div class="col-lg-6">
                             <label for="l30">Third Slide Image</label>
                              <div class="form-group input-has-value">
                                 @php  
                                  
                                        $thirdimg=url('/public/deal_images')."/dummimage.jpeg";
                                        
                                        if($data['pagedata']['images']['third_slide_img'])
                                        {
                                        
                                            $thirdimg=url('/public/page_images')."/".$data['pagedata']['images']['third_slide_img'];
                                        }
                                        
                                 @endphp
                                  <img id="second" src="{{ $thirdimg }}" width="100px" alt="your image" />
                                  <input name="third_slide_img" id="third_slide_img" type="file" accept="image/*">
                              </div>
                          </div>
                          <div class="col-lg-6">
                               <label for="l30">Fourth Slide Image</label>
                              <div class="form-group input-has-value">
                                  @php  
                                  
                                        $forthimg=url('/public/deal_images')."/dummimage.jpeg";
                                        
                                        if($data['pagedata']['images']['fourth_slide_img'])
                                        {
                                        
                                            $forthimg=url('/public/page_images')."/".$data['pagedata']['images']['fourth_slide_img'];
                                        }
                                        
                                 @endphp
                                  <img id="last" src="{{$forthimg}}" width="100px" alt="your image" />
                                  <input name="fourth_slide_img" id="fourth_slide_img" type="file" accept="image/*">
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
				</div>	
				</form>
		    </div>
									
								
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
    
   // first preview //  
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#fourth').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#first_slide_img").change(function() {
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

$("#second_slide_img").change(function() {
  readURLs(this);
});
    
    // midd second image//
     function secondreadURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#second').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#third_slide_img").change(function() {
  secondreadURL(this);
});

 // midd third image //
 
     function thirdreadURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#last').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#fourth_slide_img").change(function() {
  thirdreadURL(this);
});


</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#home').validate({   
    rules: {
        title:{
            required:true,
          
        },
        
    },  
     
        submitHandler: function(form) 
        { 
             $.ajax({
                type:'POST',
                url:"{{route('adm.save_home')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                { 
                  var result = $.parseJSON(data);
                 
                  if(result.status==102)
					{
					   
						swal({
						title: "Saved",
						text: "Saved",
						icon: "success",
						button: "OK",
						});
						window.location.reload();
					 }
                }
            });
        } 
        
    });
    
   });
</script>


@endsection('script')
