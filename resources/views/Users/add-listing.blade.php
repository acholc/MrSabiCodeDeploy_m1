@extends('Users.master')
<style>
@media(max-width:991px)
{
    .input-group.bootstrap-timepicker.timepicker{
    margin-top:0;
}}
@media(max-width:767px)
{
    .add-listing-sec > form input{
        margin-bottom: 22px;
    }
    .country_box .chosen-select {
    margin-bottom: 22px !important;
}
    .field_first .form-group {
    margin-bottom: 0;
}
    .input-group.bootstrap-timepicker.timepicker{
    margin-top:15px;
}
.row.customFields [class*="col-"] {
    clear: both;
}
    .row.customFields [class*="col-"] .form-group {
    display: block;
    overflow: auto;
}

}
</style>
<link rel="stylesheet" href="https://fontawesome.com/v3.2.1/assets/font-awesome/css/font-awesome.css">
@section('body')
      <section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Add Listing</h2>
                        <ul class="breadcrumbs">
                           <li><a href="{{route('/')}}" title="">Home</a></li>
                           <li>Add Listing</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="block gray ">
            <div class="container">
               <div class="row">
                  <!--div class="col-md-3">
                     <div class="fixed-bar fl-wrap">
                        <div class="user-profile-menu-wrap fl-wrap">
                           <div class="user-profile-img box-des-ns">
                              <div class="img-nds">
                                 <img src="images/tutor-8.jpg" class="img-responsive">
                                 <label class="edt-img" for="change-img">
                                 <i class="fa fa-pencil"></i> 
                                 <input required  required  type="file" id="change-img" style="visibility:hidden; width:0px; height:0px;">
                                 </label>
                              </div>
                              <p class="user_name">John Kazantzis</p>
                           </div>
                           <div class="user-profile-menu">
                              <ul>
                                 <li><a href="#"><i class="fa fa-tachometer"></i>Dashboard</a></li>
                                 <li><a href="edit-profile.html"><i class="fa fa-user-o"></i> Profile</a></li>
                              </ul>
                           </div>
                            <div class="user-profile-menu">
                              <ul>
                                 <li><a href="all-listings.html" class="db_active"><i class="fa fa-th-list"></i> My listings  </a></li>
                              </ul>
                           </div>                                      
                           <a href="#" class="log-out-btn">Log Out</a>
                        </div>
                     </div>
                  </div-->
                  <div class="col-md-12">
                     <div class="add-listing-sec">
				             	 <form id="listing_form">
                           {{ csrf_field() }}
                              <input type="hidden" name="photos[]" id="photos_field" value="" >
                           <div class="form-listing custom-form">
                              <div class="row">
                                 <div class="col-md-12">
                                    <h3>Business Details</h3>
                                 </div>
                                 </div>
                                 <div class="row">

                                 <div class="col-md-8">
                                   <div class="tooltip_box">
                                   <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="This will be a name for your business"></i>
                                    <input required   type="text" placeholder="Listing Title" class="pl-15" name="title">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                     <div class="selec_c_box tooltip_box input-group">
                                       <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="choose the category of your business for example: Hospital or Restaurant"></i>
                                    <select data-placeholder="All Categories" class="chosen-select" tabindex="-1" style="display: none;" name="category" id="submt_cat">
                                       <option value="">Select Category</option>

                                      <?php foreach ($category as $key) { ?>                                                                         
                                      <option value="{{$key->id}}">{{$key->category}}</option>

                                     <?php } ?>
                                      
                                    </select>
                                    </div>
                                 </div>
                                 </div>
                                 <div class="row">
                                     
                                     <div class="col-md-12">
                                         <div class="bs-example tooltip_box">
                                        
                                       <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Add Business tags for your business example: best in town, best in city etc."></i>
                                            <input type="text" data-role="tagsinput" placeholder="Tags"/ name="tags" title="Please select a category">
                                          </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-12">
                                    <div class="tooltip_box">
                                        
                                       <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Add more about your businees example: what you have and what is best etc."></i>
                                    <textarea placeholder="Description" name="description"></textarea>
                                    </div>
                                 </div>
                                 </div>
                                   <!--<div class="col-md-4">
                                    <div class="input-group bootstrap-timepicker timepicker">
                                        <input required  required  id="timepicker1" type="text" class="form-control input-small" placeholder="Opening Hours">
                                        <span class="input-group-addon"><i class="glyphicon  glyphicon-time"></i></span>
                                    </div>
                                 </div>-->
                                 <div class="form-table">
                                      <h3>Hours Of Operation</h3>
                                      <div id="customFields">
                                 <div class="row customFields field_first">
                                    <div class='col-md-4 col-sm-4'>
                                      <div class="form-group">
                                          <select  class="form-control" name="day[]" id="day" title="Please select a day" required="true">
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

                                    <div class='col-md-3 col-sm-3'>
                                    <div class="input-group bootstrap-timepicker timepicker">
                                    <input  type="text" class="form-control input-small timepickers" name="opening_hour[]" placeholder="opening hour">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                  </div>
                                    </div>

                                    <div class='col-md-3 col-sm-3'>
                                    <div class="input-group bootstrap-timepicker timepicker">
                                    <input type="text" class="form-control input-small timepickers" name="closing_hour[]" placeholder="closing hour">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                  </div>
                                    </div>


                                    <div class='col-md-2 col-sm-2'>
                                      <div class="form-group">
                                       <a href="javascript:void(0);" class="btn add-row addCF"><i class="fa fa-plus"></i></a>
                                    </div>
                                    </div>
                                </div>
                                </div></div>
						
									
									
                                    <div class="row">
                                   
                                 <div class="col-md-12">
                                    <h3 class="mt-3">Contact Information</h3>
                                 </div>
                                 <div class="col-md-6">
                                    <input type="text" placeholder="Address" id="autocomplete" name="address_description" required="true"> 
                                 </div>                            
                              
                                   <div class="col-md-6">
                                    <div class="selec_c_box tooltip_box country_box">
                                      <select data-placeholder="Country" class="chosen-select" tabindex="-1" style="display: none;" name="country" onchange="getval();" id="countries" required="true">
                                       <option value="">Select Country</option>
                                       <?php foreach ($countries as $key) { ?>
                                          <option value="{{ $key->country_id}}">{{ $key->country_name}}</option>
                                        <?php } ?>  
                                     </select>
                                    </div>
                                 </div>

                                    <div class="col-md-6">
                                        <div class="selec_c_box tooltip_box">
                                    <select  id="state" data-placeholder="State"  name="state" class="chosen-select" required="true"> 
                                      
                                       <option value="">State</option>                                                            
                                    </select>
                                    </div>
                                 </div>

                                            <div class="col-md-6">
                                    <input type="text" placeholder="City" name="city">
                                 </div>
                                 
                                <!-- <div class="col-md-6">
                                    <select required  data-placeholder="Listing Region" class="chosen-select" tabindex="-1" style="display: none;">
                                       <option value="Listing Region">Listing Region</option>
                                       <option value="Foods">Foods</option>
                                       <option value="Salads">Salaads</option>
                                       <option value="Kingston">Kingston</option>
                                       <option value="Signing">Signing</option>
                                    </select>
                                 </div>-->
                                 <div class="col-md-6">
                                    <input type="text" placeholder="Pin Code" name="pincode">
                                 </div>
                                 <div class="col-md-6">
                                    <input type="text" placeholder="Phone" name="phone" value="{{Auth::User()->phone}}">
                                 </div>
                                 <div class="col-md-6">
                                    <input required  type="email" placeholder="Email Address" name="email">
                                 </div>
                                 <div class="col-md-6">
                                    <input type="text" placeholder="Website" name="website">
                                 </div>
                                 <div class="col-md-12">
                                    <div class="add-listing-map">
                                       <div class="map-container" id="map">
                                     <!--      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.5755969364104!2d-122.45284058544394!3d37.77654837975904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085874c16fa329f%3A0x48adaf3dfc9ffca6!2s2130+Fulton+St%2C+San+Francisco%2C+CA+94117%2C+USA!5e0!3m2!1sen!2sin!4v1563872542038!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe> -->

                                       </div>
                                    </div>
                                 </div>
                                  <div class="col-md-12">
                                    <div class="uploaded-pictures-sec"> 
                                    
                                    
                                      <!--  <div  id="my-awesome-dropzone"  class="dropzone"> -->
                                       <div id="myId" class="click-add-pictures dropzone" name="picture">
                                          {{ csrf_field()}}
                                       </div>
                                    <!-- </div> -->
                                    </div>
                                 </div>
                              <!--   <div class="col-md-12">
                                    <div class="profile-edit-container">
                                       <div class="profile-edit-header fl-wrap">
                                          <h4>My Socials</h4>
                                       </div>
                                       <div class="custom-form">
                                          <div class="row">
                                             <div class="col-md-6">
                                                <input required  required  type="text" placeholder="https://www.facebook.com/" value="">
                                             </div>
                                             <div class="col-md-6">
                                                <input required  required  type="text" placeholder="https://twitter.com/" value="">
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-md-6">
                                                <input required  required  type="text" placeholder="https://www.google.com" value="">
                                             </div>
                                             <div class="col-md-6">
                                                <input required  required  type="text" placeholder="https://www.whatsapp.com" value="">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>-->
                              </div>
                              <div class="submission-btns">
                                 <button type="submit" class="btn  big-btn  color-bg flat-btn" id="submit_btn">Submit<i class="fa fa-angle-right"></i></button>
                              </div>
                           </div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection('body')	  
@section('script')
<script>
$(document).ready(function(){
  $(".addCF").click(function(){
     // $(".selected").removeClass("selected");
   //$(this).addClass("selected");
    $("#customFields").prepend('<div class="row customFields"><div class="col-md-4 col-sm-4"><div class="form-group"><select class="form-control" name="day[]"><option value="">Select Day</option><option>Monday</option><option>Tuesday</option><option>Wednesday</option><option>Thursday</option><option>Friday</option><option>Saturday</option><option>Sunday</option></select></div></div><div class="col-md-3 col-sm-3"><div class="form-group"><div class="input-group date timepicker" id="timepicker1"><input type="text" class="form-control input-small timepickers" name="opening_hour[]" placeholder="opening hour"><span class="input-group-addon"><span class="fa fa-clock-o"></span></span></div></div></div><div class="col-md-3 col-sm-3"><div class="form-group"><div class="input-group date timepicker" id="timepicker2"> <input type="text" class="form-control input-small timepickers" name="closing_hour[]"  placeholder="closing hour"><span class="input-group-addon"><span class="fa fa-clock-o"></span></span></div></div></div><div class="col-md-2 col-sm-2"><div class="form-group"><a href="javascript:void(0);" class="btn add-row remCF"><i class="fa fa-minus"</a></div></div></div>');
  });
    $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().parent().remove();
    });
});
</script>

<script>



var myDropzone = new Dropzone('div#myId', {acceptedFiles: ".jpeg,.jpg,.png,.gif",dictDefaultMessage: 'Upload Photos',parallelUploads: 100, url: "{{route('check')}}", maxFiles: 30, autoProcessQueue: false, addRemoveLinks: true,headers: {
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
               $('#submit_btn').prop('disabled','true').html('Please wait...');
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
                $('#submit_btn').prop('disabled','false').html('Submit');
                swal({
                title: "Your data is saved",
                text: "Listing has been added!",
                icon: "success",
                button: "OK",
                }).then(function() {
                window.location = "{{route('all-listings')}}";
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
                window.location = "{{route('all-listings')}}";
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
    showInputs: false,
    defaultTime: 'current'
  });
</script>
<script type="text/javascript">
  $(document).on('click','.addCF',function(){
      $('.timepickers').timepicker({
        showInputs: false,
        defaultTime: 'current'
      });
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

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

$(document).on('change','#submt_cat',function(){
    if($('#submt_cat').val()){
        $('#submt_cat-error').remove();
    }

});

$(document).on('change','#countries',function(){
    if($('#countries').val()){
        $('#countries-error').remove();
    }

});

$(document).on('change','#state',function(){
    if($('#state').val()){
        $('#state-error').remove();
    }

});


$(document).on('click','#submit_btn',function(){
    if(!$('#submt_cat').val()){
        $('#submt_cat-error')[0].scrollIntoView({ behavior: "smooth",block: "start"}); 
    }

});
 </script>


@endsection('script')