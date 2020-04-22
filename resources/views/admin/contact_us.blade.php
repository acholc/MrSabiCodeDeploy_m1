@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Contact us</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
								<li class="breadcrumb-item"><a href="{{route('adm.all-pages')}}">Pages</a>
                                </li>
                                <li class="breadcrumb-item active">Contact us</li>
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
								<h5>Contact us</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<form id="contactus" method="POST" action="" >
									{{ csrf_field()}}
									
										<input type="hidden" name="id" value="{{ $data['id'] }}" >
								
									<div class="row">
							
										<div class="col-md-12">
										    
											<div class="row" style="display:none">
												<div class="col-lg-12">
													<div class="form-group">
														<label for="l30">Page Title</label>
														<input class="form-control" type="text" value="{!! $data['title']!!}" name="title" id="title">
													</div>
												</div>
											
											</div>
											<div class="row">
												<div class="col-lg-12">
											
                                <div class="form-group input-has-value">
                                     @php  
                                  
                                        $img=url('/public/deal_images')."/dummimage.jpeg";
                                        
                                        if($data['content']['images']['banner'])
                                        {
                                        
                                            $img=url('/public/page_images')."/".$data['content']['images']['banner'];
                                        }
                                 @endphp
                                  <label>Banner Image</label>
                                  <input name="image" id="imgInp" type="file" accept="image/*">
                                  <img id="blah" src="{{ $img }}" alt="your image" width="100px" />
                                  <label id="imgInp-error" class="help-block" style="color:red" for="imgInp"></label> 
                              </div>
                              </div>
                              </div>
									 
									 <div class="row">
												<div class="col-lg-6">
											<div class="form-group">
												<label for="l30">Address</label>
												<input class="form-control" type="text" value="@if($data['content']['link']['address']){{$data['content']['link']['address'] }}@endif" name="address" id="address">
											</div>
										</div>		
							     	
							     		
										<div class="col-lg-6">
											<div class="form-group">
												<label for="l30">Phone</label>
												<input class="form-control" type="text" value="@if($data['content']['link']['phone']){{$data['content']['link']['phone'] }}@endif" name="phone" id="phone" >
											</div>
										</div>	
									</div>	
							     
							     		<div class="row">
												<div class="col-lg-6">
											<div class="form-group">
												<label for="l30">Fax</label>
												<input class="form-control" type="text" value="@if($data['content']['link']['fax']){{$data['content']['link']['fax'] }}@endif" name="fax" id="fax">
											</div>
										</div>
												<div class="col-lg-6">
											<div class="form-group">
												<label for="l30">Email</label>
												<input class="form-control" type="text" value="@if($data['content']['link']['email']){{$data['content']['link']['email'] }}@endif" name="email" id="email">
											</div>
										</div>
							     </div>
										
								 
										<div class="row">
												<div class="col-lg-6">
											<div class="form-group">
												<label for="l30">Twitter</label>
												<input class="form-control" type="text" value="@if($data['content']['link']['twitter']){{$data['content']['link']['twitter'] }}@endif" name="twitter" id="twitter">
											</div>
										</div>		
							     	
							     	
												<div class="col-lg-6">
											<div class="form-group">
												<label for="l30">Instagram</label>
												<input class="form-control" type="text" value="@if($data['content']['link']['insta']){{$data['content']['link']['insta'] }}@endif" name="insta" id="insta">
											</div>
										</div>		
							     	
							     </div>
							     	<div class="row">
												<div class="col-lg-6">
											<div class="form-group">
												<label for="l30">Pinterestt</label>
												<input class="form-control" type="text" value="@if($data['content']['link']['pinterest']){{$data['content']['link']['pinterest'] }}@endif" name="pinterest" id="pinterest">
											</div>
										</div>		
							     	
							     		
												<div class="col-lg-6">
											<div class="form-group">
												<label for="l30">google</label>
												<input class="form-control" type="text" value="@if($data['content']['link']['googl']){{$data['content']['link']['googl'] }}@endif" name="googl" id="googl">
											</div>
										</div>	
										</div>
										
										<div class="row">
							     	
							     	
												<div class="col-lg-6">
											<div class="form-group">
												<label for="l30">tumbler</label>
												<input class="form-control" type="text" value="@if($data['content']['link']['tumbler']){{$data['content']['link']['tumbler'] }}@endif" name="tumbler" id="tumbler">
											</div>
										</div>		
							     
							     	
												<div class="col-lg-6">
											<div class="form-group">
												<label for="l30">Android</label>
												<input class="form-control" type="text" value="@if($data['content']['link']['android']){{$data['content']['link']['android'] }}@endif" name="android" id="android">
											</div>
										</div>	
										
										</div>
										
										<div class="row">
							     	
							     	
												<div class="col-lg-6">
											<div class="form-group">
												<label for="l30">Apple</label>
												<input class="form-control"type="text" value="@if($data['content']['link']['apple']){{$data['content']['link']['apple'] }}@endif" name="apple" id="apple">
											</div>
										</div>		
							     
							    
							     
												<div class="col-lg-6">
											<div class="form-group">
												<label for="l30">Windows</label>
												<input class="form-control" type="text" value="@if($data['content']['link']['window']){{$data['content']['link']['window'] }}@endif" name="window" id="window">
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
	
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
    
    

</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#contactus').validate({   
    rules: {
        address:{
            required:true,
          
        },
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
                url:"{{route('adm.add_update_contactus')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                { 
                 // var result = $.parseJSON(data);
                 
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
