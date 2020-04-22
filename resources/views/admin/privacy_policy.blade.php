@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Privacy Policy</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
								<li class="breadcrumb-item"><a href="{{route('adm.all-pages')}}">Pages</a>
                                </li>
                                <li class="breadcrumb-item active">Privacy Policy</li>
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
								<h5>Privacy Policy</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<form id="policy" method="POST">
									{{ csrf_field()}}
									<div class="row">
										<input type="hidden" name="id" value="{{ $data['id'] }}"> 
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
                              <div class="form-group input-has-value">
                                   @php  
                                  
                                        $img=url('/public/deal_images')."/dummimage.jpeg";
                                        
                                        if($data['content']['images']['banner'])
                                        {
                                        
                                            $img=url('/public/page_images')."/".$data['content']['images']['banner'];
                                        }
                                        
                                 @endphp
                                  <img id="blah" src="{{ $img }}" width="100px" alt="your image" />
                                  <input name="image" id="imgInp" type="file" accept="image/*">
                                  <label id="imgInp-error" class="help-block" style='color:red' for="imgInp"></label>
                              </div>
                           </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="l30">OUR PRIVACY POLICIES </label>
                                <textarea data-toggle="tinymce" name="our_privacy_policies" id="our_privacy_policies" data-plugin-options='{ "height": 400 }'>
								@if($data['content']['link']['our_privacy_policies']){{$data['content']['link']['our_privacy_policies'] }}@endif
								</textarea>
                            </div>
                        </div>
        <!--                <div class="col-md-12">-->
        <!--                    <div class="form-group">-->
        <!--                        <label for="l30">Log Files</label>-->
        <!--                        <textarea data-toggle="tinymce" name="log_files" id="log_files"  data-plugin-options='{ "height": 400 }'>-->
								<!--			@if($data['content']['link']['log_files']){{$data['content']['link']['log_files'] }}@endif-->
								<!--</textarea>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                 <div class="col-md-12">-->
        <!--                    <div class="form-group">-->
        <!--                        <label for="l30">Privacy Policies</label>-->
        <!--                        <textarea data-toggle="tinymce" name="privacy_policies" id="privacy_policies" data-plugin-options='{ "height": 400 }'>-->
								<!--	 	@if($data['content']['link']['privacy_policies']){{$data['content']['link']['privacy_policies'] }}@endif-->
								<!--</textarea>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-md-12">-->
        <!--                    <div class="form-group">-->
        <!--                        <label for="l30">Third Party Policies </label>-->
        <!--                        <textarea data-toggle="tinymce" name="third_party_policies" id="third_party_policies" data-plugin-options='{ "height": 400 }'>-->
								<!--	 	@if($data['content']['link']['third_party_policies']){{$data['content']['link']['third_party_policies'] }}@endif-->
								<!--</textarea>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-md-12">-->
        <!--                    <div class="form-group">-->
        <!--                        <label for="l30">Children's Information</label>-->
        <!--                        <textarea data-toggle="tinymce" name="children_info" id="children_info" data-plugin-options='{ "height": 400 }'>-->
								<!--	 	@if($data['content']['link']['children_info']){{$data['content']['link']['children_info'] }}@endif-->
								<!--</textarea>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-md-12">-->
        <!--                    <div class="form-group">-->
        <!--                        <label for="l30">Online Policy</label>-->
        <!--                        <textarea data-toggle="tinymce" name="online_policy" id="online_policy" data-plugin-options='{ "height": 400 }'>-->
								<!--	 @if($data['content']['link']['online_policy']){{$data['content']['link']['online_policy'] }}@endif-->
								<!--</textarea>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-md-12">-->
        <!--                    <div class="form-group">-->
        <!--                        <label for="l30">Consent</label>-->
        <!--                        <textarea data-toggle="tinymce" name="consent" id="consent" data-plugin-options='{ "height": 400 }'>-->
								<!--	  @if($data['content']['link']['consent']){{$data['content']['link']['consent'] }}@endif-->
								<!--</textarea>-->
        <!--                    </div>-->
        <!--                </div>-->
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

<script type="text/javascript">
$(document).ready(function() {
    $('#policy').validate({   
    rules: {
        welcome_to_mrsabi:{
            required:true,
          
        },
        
    },  
     
        submitHandler: function(form) 
        { 
                $("label.help-block").html("");
                $("label.help-block").removeClass("error");
             $.ajax({
                type:'POST',
                url:"{{route('adm.save_privacy')}}",
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
<script>
// <!-- profile pic review----- -->
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
@endsection('script')
