@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Add Listing</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
								<li class="breadcrumb-item"><a href="{{route('adm.listing')}}">Business Listing</a>
                                </li>
                                <li class="breadcrumb-item active">Add Listing</li>
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
								<h5>Add Listing
								
								</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<form id="listing_form">
									{{ csrf_field()}}
									 <input type="hidden" name="photos[]" id="photos_field" value="">
									<div class="row">
									
										<div class="col-md-12">
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">Listing Title</label>
														<input class="form-control"  placeholder="Listing title" type="text" name="title" required="true">
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">Categories</label>
														<select class="form-control livesearch"  name="category" required="true">
														 <option value="">Select Category</option>

                                      <?php foreach ($category as $key) { ?>                                                                         
                                      <option value="{{$key->id}}">{{$key->category}}</option>

                                     <?php } ?>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="form-group">
														<div class="form-group tag_input">
                                                    <label class="control-label">Tags</label>
                                                    <input type="text" value=" " data-role="tagsinput" placeholder="Tags" class="form-control" name="tags"/>
													
                                                     </div>
														
													</div>
												</div>
												
											</div>
											<div class="row">
												<div class="col-lg-12">
                                                <div class="form-group">
												<label for="exampleInputEmail1">Description</label>
												<textarea type="text" class="form-control" rows="6" placeholder="Description" name="description"></textarea>
											</div>
                                            </div>
											</div>
											<div class="form-table"  id="customFields">
                                 <div class="row customFields">
                                    <div class='col-md-4'>
                                      <div class="form-group">
                                           <select class="form-control" name="day[]" required="true">
                                             <option value="">Select Day</option>
                                                <option value="Monday">Monday</option>
                                              <option value="Tuesday">Tuesday</option>
                                              <option value="Wednesday">Wednesday</option>
                                              <option value="Thursday">Thursday</option>
                                              <option value="Friday">Friday</option>
                                              <option value="Saturday">Saturday</option>
                                              <option value="Sunday">Sunday</option>
                                          </select>
                                      </div>
                                    </div>
                                    <div class='col-md-3'>
                                      <div class="form-group">
                                        <div class='input-group'>
                                          <input type='text' class="form-control input-small timepickers" placeholder="Opening Hour" name="opening_hour[]"/>
                                          <span class="input-group-addon">
										  
                                                        <span class="fa fa-clock-o"></span>
                                          </span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class='col-md-3'>
                                      <div class="form-group">
                                        <div class='input-group' id='timepicker2'>
                                          <input type='text' class="form-control input-small timepickers" placeholder="Closing Hour" name="closing_hour[]"/>
                                          <span class="input-group-addon">
                                                        <span class="fa fa-clock-o"></span>
                                          </span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class='col-md-2'>
                                      <div class="form-group">
                                       <a href="javascript:void(0);" class="btn add-row addCF"><i class="fa fa-plus"></i></a>
                                    </div>
                                    </div>
                                </div>
                                </div>
											<h4 class="dobl-brdr mt-2">Contact Information</h4>
											<div class="row">
																					
												<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">Address</label>
														<input class="form-control"  placeholder="Ex: House No. 12121" type="text" id="autocomplete" name="address_description" required="true">
													</div>
												</div>
													<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">Country</label>
														<select class="chosen-select form-control" name="country" onchange="getval();" id="countries" required="true">
														     <option value="">Select country</option>
														    <?php foreach ($countries as $key) { ?>
                                                            <option value="{{ $key->country_id}}">{{ $key->country_name}}</option>
                                                            <?php } ?>  
                                    
														  
													  </select>
													</div>
												</div>
												
											</div>
											<div class="row">
											    
																					
												<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">State</label>
														<select class="chosen-select form-control"  id="state" data-placeholder="State"  name="state" required="true">
														 <option value="">Select state</option>
													  </select>
													</div>
												</div>
													<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">City</label>
														<input class="form-control"  placeholder="City" type="text" name="city">
													</div>
												</div>
													<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">Phone No</label>
														<input class="form-control"  placeholder="Phone" type="text" name="phone" value="{{Auth::User()->phone}}">
													</div>
												</div>
											</div>
											<div class="row">
																					
												<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">Email</label>
														<input class="form-control"  placeholder="info@example.com" type="text" name="email" required="true" value="{{Auth::User()->email}}">
                                              
                                          </select>
													</div>
												</div>
													<div class="col-lg-6">
													<div class="form-group">
														<label for="l30">Website</label>
														<input class="form-control"  placeholder="www.example.com" type="text" name="website" value="{{Auth::User()->website}}">
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-lg-12">
													<div class="map-container" id="map">
                                      
                          </div>
												</div>
											</div>
                      <br><br>
											
             <div class="row">
	         	<div class="col-lg-12">
               <div id="myId" class="click-add-pictures dropzone" name="picture">
                                          {{ csrf_field()}}
               </div>
		       </div>
	          </div>											
											<div class="row">
												<div class="col-lg-12 mt-3">
													<div class="form-actions btn-list">
														<button class="btn btn-primary" type="submit">Save Changes</button>
														<a href="{{route('adm.users')}}" class="btn btn-warning">Cancel</a>
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
<script type="text/javascript">
      $(".livesearch").chosen();
$('.timepicker').timepicker({
        defaultTime: false
  });
       
    </script>
	<script>
$(document).ready(function(){
	$(".addCF").click(function(){
		
		$("#customFields").append('<div class="row customFields"><div class="col-md-4"><div class="form-group"><select class="form-control" name="day[]" required="true"><option value="">Select Day</option><option>Monday</option><option>Tuesday</option><option>Wednesday</option>                                              <option>Thursday</option><option>Friday</option><option>Saturday</option><option>Sunday</option></select></div></div><div class="col-md-3"><div class="form-group"><div class="input-group date timepicker" id="timepicker1"><input type="text" class="form-control input-small timepickers" name="opening_hour[]" placeholder="opening hour"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></div></div><div class="col-md-3"><div class="form-group"><div class="input-group date timepicker" id="timepicker2"> <input type="text" class="form-control input-small timepickers" name="closing_hour[]"  placeholder="closing hour"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></div></div><div class="col-md-2"><div class="form-group"><a href="javascript:void(0);" class="btn add-row remCF"><i class="fa fa-minus"</a></div></div></div>');
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
<script>



var myDropzone = new Dropzone('div#myId', {parallelUploads: 100, url: "{{route('check')}}", maxFiles: 30, autoProcessQueue: false, addRemoveLinks: true,headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  } });



   /////////////
   
$(function($) {
   $('#listing_form').validate({
       ignore:"hidden:not(select)",
   rules: {    
      "day[]": "required",   
      "category":"required",
       email:{
           email: true ,
             },
             
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
         },
         _token:{
          required:"Please select some pictures"
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

                var photos =[];
                myDropzone.processQueue();                        
                myDropzone.on('success', function(file, response) {
                console.log(file);
                console.log(response);
                photos.push(response);
                $('#photos_field').val(photos);                   
                
               });
              if(myDropzone.files.length>0)
              {
                  
               myDropzone.on("queuecomplete", function(file) {
               
                console.log(file);
                $.ajax({
                type:'POST',
                url:"{{route('add-listing-data')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                   { 

                swal({
                title: "Your data is saved",
                text: "Listing has been added!",
                icon: "success",
                button: "OK",
                }).then(function() {
                window.location = "{{route('adm.listing')}}";
                });

                   }
           });
               });
              }
              else{

                $.ajax({
                type:'POST',
                url:"{{route('add-listing-data')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                   { 

                swal({
                title: "Data is saved",
                text: "Listing has been added!",
                icon: "success",
                button: "OK",
                }).then(function() {
                window.location = "{{route('adm.listing')}}";
                });
                   }
           });


              }
            
              
        
                

               
              
       } 
       
   });
});


function getval(){

var country = $('#countries').val();

if(country==''){$('#state').html('<option value="State">State</option>');                                
}
else{
  $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              type:'POST',
              url:"{{route('cities')}}",
              data:{country:country},          
              success:function(data)
              {      
                $('#state').html(data);         
               $(".chosen-select").trigger("chosen:updated");
              }
              });
}


}
// $(".chosen-select").trigger("chosen:updated");
</script>
<script type="text/javascript">
  $('.timepickers').timepicker({
    showInputs: false
  });
</script>
<script type="text/javascript">
  $(document).on('click','.addCF',function(){
      $('.timepickers').timepicker({
        showInputs: false
      });
      //alert('hii');
  });
</script>
        <script>
        var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function() { 
            var loc= $('#autocomplete').val();         
var geocoder = new google.maps.Geocoder(); // initialize google map object
var address = loc;
geocoder.geocode( { 'address': address}, function(results, status) {

if (status == google.maps.GeocoderStatus.OK) {
   var latitude = results[0].geometry.location.lat();
var longitude = results[0].geometry.location.lng();
var myCenter=new google.maps.LatLng(latitude,longitude);
      function initialize()
{
var mapProp = {
 center:myCenter,
 zoom:14,
 mapTypeId:google.maps.MapTypeId.ROADMAP
 };

var map=new google.maps.Map(document.getElementById("map"),mapProp);

var marker=new google.maps.Marker({
 position:myCenter,
 });

marker.setMap(map);
}
initialize();
// google.maps.event.addDomListener(window, 'load', initialize); 
   } 
});         
           });

        </script>

        <script>

  var loc= $('#autocomplete').val();         
var geocoder = new google.maps.Geocoder(); // initialize google map object
var address = "Chandigarh";
geocoder.geocode( { 'address': address}, function(results, status) {

if (status == google.maps.GeocoderStatus.OK) {
   var latitude = results[0].geometry.location.lat();
var longitude = results[0].geometry.location.lng();
var myCenter=new google.maps.LatLng(latitude,longitude);
      function initialize()
{
var mapProp = {
 center:myCenter,
 zoom:7,
 mapTypeId:google.maps.MapTypeId.ROADMAP
 };

var map=new google.maps.Map(document.getElementById("map"),mapProp);

var marker=new google.maps.Marker({
 position:myCenter,
 });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize); 
   } 
});
 </script>
@endsection('script')