@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Add Deal</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
								<li class="breadcrumb-item"><a href="{{route('adm.listing')}}">Best Deals</a>
                                </li>
                                <li class="breadcrumb-item active">Add Deal</li>
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
								<h5>Add Deal
								
								</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<form id="dealform">
									{{ csrf_field()}}
									<div class="row">
									
										<div class="col-md-12">
											<div class="row">
											    		<div class="col-lg-4">
													<div class="form-group">
														<label for="l30">Business Name</label>
														<select name="business" class="form-control livesearch">
													    @if(isset($buisness['buisness']))
                                                		@foreach($buisness['buisness'] as $buisness)
                                                	
                                                	
                                                        <option value="{!! $buisness['id']  !!}" selected>{!! $buisness['title']  !!}</option>
                                                        
                                                         
                                                        @endforeach
                                                		@endif
														</select>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<div class="form-group ">
                                                    <label class="control-label">Discount</label>
                                                    <input type="text" name="discount" value="" placeholder="" class="form-control"/>
													
                                                     </div>
														
													</div>
												</div>
													<div class="col-lg-4">
													<div class="form-group">
														<div class="form-group ">
                                                    <label class="control-label">Coupon Code</label>
                                                    <input name="coupon" type="text" value="" placeholder="" class="form-control"/>
													
                                                     </div>
														
													</div>
												</div>
														<div class="col-lg-4">
													<div class="form-group">
														<div class="form-group ">
                                                    <label class="control-label">title</label>
                                                    <input name="title" type="text" value="" placeholder="" class="form-control" required/>
													
                                                     </div>
														
													</div>
												</div>
														<div class="col-lg-4">
													<div class="form-group">
														<div class="form-group ">
                                                    <label class="control-label">description</label>
                                                    <input name="description" type="text" value="" placeholder="" class="form-control" required/>
													
                                                     </div>
														
													</div>
												</div>
															<div class="col-lg-4">
													<div class="form-group">
														<div class="form-group ">
                                                    <label class="control-label">price</label>
                                                    <input name="price" type="text" value="" placeholder="" class="form-control" required/>
													
                                                     </div>
														
													</div>
												</div>
											</div>
										
										<h4 class="dobl-brdr mt-2">Contact Information</h4>
										<div class="row">
                                                   <div class="col-lg-6">
                                                      <div class="form-group input-has-value">
                                                         <label for="l30">Address</label>
                                                         <input name="address" class="form-control" placeholder="" type="text">
                                                      </div>
                                                   </div>
                                                   <div class="col-lg-6">
                                                      <div class="form-group input-has-value">
                                                         <label for="l30">City</label>
                                                         <input name="city" class="form-control" placeholder="" type="text">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                      <div class="form-group input-has-value">
                                                         <label for="l30">Country</label>
                                                        <select type="text" name="country" id="country" class="form-control">
                                                         <option value="">Select Country</option>
                                                        @if(isset($data['country_list']))		
                                                		@foreach($data['country_list'] as $country)
                                                		
                                                        <option value="{!! $country['country_id']  !!}">{!! $country['country_name']  !!}</option>
                                                        @endforeach
                                                		@endif
                                                										
                                                    </select>
                                                      </div>
                                                   </div>
                                                   <div class="col-lg-6">
                                                      <div class="form-group">
                                                         <label for="l30">State</label>
                                                          <select class="form-control state" id="state" name="state">
                                                           <option value="" disabled="">State/Province</option>
                                                          <?php 
                                                          if(isset($state_list))
                                                          foreach ($state_list as $state) 
                                                          {
                                                            if($state['state_id'] == $deal['id']) 
                                                            {
                                                              echo "<option>".$state['state_name']."</option>";
                                                            }
                                                          } ?>
                                                         
                                                         
                                                        </select>
                                                   </div>
                                                    </div>
                                                   <div class="col-lg-6">
                                                      <div class="form-group input-has-value">
                                                         <label for="l30">Phone No</label>
                                                         <input name="phone" class="form-control" placeholder=""  type="text">
                                                      </div>
                                                   </div>
                                                   <div class="col-lg-6">
                                                      <div class="form-group input-has-value">
                                                          <img id="blah" src="{{ url('/public/deal_images')}}/dummimage.jpeg" alt="your image" />
                                                          <input name="image" id="imgInp" type="file" accept="image/*">
                                                          <label id="imgInp-error" class="help-block" style="color:red" for="imgInp"></label>
                                                      </div>
                                                   </div>
                                            </div>
											<div class="row">
												<div class="col-lg-12 mt-3">
													<div class="form-actions btn-list">
														<button class="btn btn-primary" type="submit">Save Changes</button>
														<a href="{{route('adm.deals')}}" class="btn btn-warning">Cancel</a>
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
<!--<link rel="stylesheet" href="http://sites.indiit.com/smartsavers/dev/css/sweet-alert.min.css">-->
<!--<script src="http://sites.indiit.com/smartsavers/dev/js/sweet-alert.min.js"></script>-->
<script>
    
    $(document).ready(function() {
    $('#dealform').validate({   
    rules: {
        
        business:{
            required:true,
        },
        discount:{
            required:true,
          
        },
        coupon:{
            required:true,
        },
        address:{
            
            required:true,
        },
        city:{
            
            required:true,
        },
        phone:{
            
            required:true,
        },
    },  
    messages: 
        { 
           business:
           {
            required:"This field is required",
          },
         
         discount: 
          {
            required:'This field is required',
          },     
          coupon:{
            required:"This field is required",
        },
        address:{
            
            required:"This field is required",
        },
        city:{
            
            required:"This field is required",
        },
        phone:{
            
            required:"This field is required",
        }
        },
          
        submitHandler: function(form) 
        { 
             $("label.help-block").html("");
             $("label.help-block").removeClass("error");
             $.ajax({
                type:'POST',
                url:"{{route('adm.insert_deal')}}",
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
						title: "Deal has been saved",
						text: "Deal has been added",
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





$(document).ready(function()
        {   
            $('#country').on('change',function(){
                $(".state option[id='selectedstate1']").remove();
                $('.option').remove();
                //$('#mystate').remove();
                var country1 = $(this).children("option:selected").val();
                var data = 'country_id='+country1;  
                $.ajax({
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url:"{{route('adm.getstate')}}",
                    data: data,
                    cache: false,
                    success: function(data) 
                    {
                    $('.state').append(data);
                    }
                  });
            });

});
    
</script>



<script type="text/javascript">
      $(".livesearch").chosen();
$('.timepicker').timepicker({
        defaultTime: false
  });
       
    </script>
	<script>
$(document).ready(function(){
	$(".addCF").click(function(){
		
		$("#customFields").append('<div class="customFields row"><div class="col-md-4"><div class="form-group"><select class="form-control"><option>Select Day</option><option>Monday</option><option>Tuesday</option><option>Wednesday</option><option>Thursday</option><option>Friday</option><option>Saturday</option><option>Sunday</option></select></div></div><div class="col-md-3"><div class="form-group"><div class="input-group"><input type="text" class="input-group date timepicker form-control" placeholder="Opening Hour" /><span class="input-group-addon"><span class="fa fa-clock-o"></span></span></div></div></div><div class="col-md-3"><div class="form-group"><div class="input-group"><input type="text" class="input-group date timepicker form-control" placeholder="Closing Hour" /><span class="input-group-addon"><span class="fa fa-clock-o"></span></span></div></div></div><div class="col-md-2"><div class="form-group"><a href="javascript:void(0);" class="btn add-row remCF"><i class="fa fa-minus"</a></div></div></div>');
	 $('.timepicker').timepicker({
        defaultTime: false
  });
  $(".livesearch").chosen();

	});
    $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().parent().remove();
    });
});

$(document).ready(function() {
    document.getElementById('pro-image').addEventListener('change', readImage, false);
    
    $( ".preview-images-zone" ).sortable();
    
    $(document).on('click', '.image-cancel', function() {
        let no = $(this).data('no');
        $(".preview-image.preview-show-"+no).remove();
    });
});



var num = 4;
function readImage() {
    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");

        for (let i = 0; i < files.length; i++) {
            var file = files[i];
            if (!file.type.match('image')) continue;
            
            var picReader = new FileReader();
            
            picReader.addEventListener('load', function (event) {
                var picFile = event.target;
                var html =  '<div class="col-lg-3 preview-image preview-show-' + num + '">' +
                            '<div class="image-cancel" data-no="' + num + '">x</div>' +
                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                            '</div>';

                output.append(html);
                num = num + 1;
            });

            picReader.readAsDataURL(file);
        }
        $("#pro-image").val('');
    } else {
        console.log('Browser not support');
    }
}



</script>
@endsection('script')