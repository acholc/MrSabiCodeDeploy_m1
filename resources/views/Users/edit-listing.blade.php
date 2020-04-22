@extends('Users.master')
<link rel="stylesheet" href="https://fontawesome.com/v3.2.1/assets/font-awesome/css/font-awesome.css">
@section('body')
      <section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Edit Listing</h2>
                        <ul class="breadcrumbs">
                           <li><a href="{{route('/')}}" title="">Home</a></li>
                           <li>Edit Listing</li>
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
                       <form id="listing_form" class="edit_list_form">
                           {{ csrf_field() }}

                              <input type="hidden" name="list_id" value="{{$data->id}}" >
                              <input type="hidden" name="photos[]" id="photos_field" value="" >
                           <div class="form-listing custom-form">
                              <div class="row">
                                 <div class="col-md-12">
                                    <h3>Business Detail</h3>
                                 </div>
                                 </div>
                                 <div class="row">
                                 <div class="col-md-8">
                                     <div class="tooltip_box">
                                   <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="This will be a name for your business"></i>
                                    <input required   type="text" placeholder="Listing Title" class="pl-15" name="title" value="{{$data->title}}">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                     <div class="selec_c_box tooltip_box">
                                       <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="choose the category of your business for example: Hospital or Restaurant" id="cater"></i>
                                    <select data-placeholder="All Categories" class="chosen-select" tabindex="-1" style="display: none;" name="category" required="" id="submt_cat">
                                       <option value="">All Categories</option>
                                       <?php foreach ($category as $key) { ?>                             
                                       
                                       <option value="{{$key->id}}" <?php echo ($data->category_id ==$key->id)?"selected":"" ?>>{{$key->category}}</option>

                                     <?php } ?>
                                   
                                    </select>
                                    </div>
                                 </div>
                                 </div>
                                 <div class="row">
                                     
                                     <div class="col-md-12">
                                         <div class="bs-example tooltip_box">
                                             <i style="top: 12px;" class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Business tags for your business example: best in town, best in city etc."></i>
                                            <input  type="text" value="{{$data->tags}}" data-role="tagsinput" placeholder="Tags"/ name="tags">
                                          </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                      <div class="col-md-12">
                                          <div class="tooltip_box">
                                        
                                       <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add more about your businees example: what you have and what is best etc."></i>
                                    <textarea placeholder="Description" name="description">{{$data->description}}</textarea>
                                    </div>
                                 </div>
                                 </div>
                                   <!--<div class="col-md-4">
                                    <div class="input-group bootstrap-timepicker timepicker">
                                        <input required  required  id="timepicker1" type="text" class="form-control input-small" placeholder="Opening Hours">
                                        <span class="input-group-addon"><i class="glyphicon  glyphicon-time"></i></span>
                                    </div>
                                 </div>-->
                                 <?php foreach ($days_time as $key) { ?>

                                 <div class="form-table delete_row" >
                                 <div class="row customFields">
                                    <div class='col-md-4'>
                                      <div class="form-group">
                                        <input type="hidden" name="entry_exsist[]" value="{{$key->id}}" required="true" title="Please select a day">
                                          <select  class="form-control" name="day[]">
                                             <option value="">Select Day</option>
                                              <option <?php echo ($key->day == 'Monday')?"selected":"" ?>>Monday</option>
                                              <option <?php echo ($key->day == 'Tuesday')?"selected":"" ?>>Tuesday</option>
                                              <option <?php echo ($key->day == 'Wednesday')?"selected":"" ?>>Wednesday</option>
                                              <option <?php echo ($key->day == 'Thursday')?"selected":"" ?>>Thursday</option>
                                              <option <?php echo ($key->day == 'Friday')?"selected":"" ?>>Friday</option>
                                              <option <?php echo ($key->day == 'Saturday')?"selected":"" ?>>Saturday</option>
                                              <option <?php echo ($key->day == 'Sunday')?"selected":"" ?>>Sunday</option>
                                          </select>
                                      </div>
                                    </div>

                                    <div class='col-md-3'>
                                    <div class="input-group bootstrap-timepicker timepicker">
                                    <input id="timepicker1" type="text" class="form-control input-small timepickers" name="opening_hour[]" value="{{$key->opening_hour}}">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                  </div>
                                    </div>

                                    <div class='col-md-3'>
                                    <div class="input-group bootstrap-timepicker timepicker">
                                    <input id="timepicker2" type="text" class="form-control input-small timepickers" name="closing_hour[]" value="{{$key->closing_hour}}">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                  </div>
                                    </div>


                                    <div class='col-md-2'>
                                      <div class="form-group">
                                       <button class="btn add-row delete_button_for_date" id="{{$key->id}}" type="button"><i  class="fa fa-minus"></i></button>
                                    </div>
                                    </div>

                                </div>
                                </div>

                              <?php } ?>
                                 <div  id="customFields">

                                 </div>
                                    <div class='row'>
                                    <div class='col-md-2'>
                                    <div class="form-group">
                                    <a href="javascript:void(0);" class="btn add-row addCF"><i class="fa fa-plus"></i></a>
                                    </div>
                                    </div>
                                    </div>

            
                  
                  
                                    <div class="row">
                                   
                                 <div class="col-md-12">
                                    <h3>Contact Information</h3>
                                 </div>
                                 <div class="col-md-6">
                                    <input required type="text" placeholder="Address" id="autocomplete" name="address_description" value="{{$data->address}}" required="true">
                                 </div>                           
                              
                                   <div class="col-md-6">

                                      <select data-placeholder="Country" class="chosen-select" tabindex="-1" style="display: none;" name="country" onchange="getval();" id="countries" required="true">
                                       <option value="">Select Country</option>
                                       <?php foreach ($countries as $key) { ?>
                                          <option value="{{$key->country_id}}" <?php echo ($key->country_id==$data->country_id)?"selected":"" ?>>{{$key->country_name}}</option>
                                        <?php } ?>  
                                     </select>

                                 </div>

                                    <div class="col-md-6">
                                    <select  id="state" data-placeholder="State"  name="state" class="chosen-select" required="true">
                                      @if(!empty($states))
                                       @foreach($states as $state)
                                        <option value="{{$state->state_id}}" <?php echo ($state->state_id==$data->state_id)?"selected":"" ?>>{{$state->state_name}}</option>
                                       @endforeach
                                       @endif

                                    </select>
                                 </div>

                                            <div class="col-md-6">
                                    <input required    type="text" placeholder="City" name="city" value="{{$data->city}}">
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
                                    <input  type="text" placeholder="Pin Code" name="pincode" value="{{$data->pincode}}">
                                 </div>
                                 <div class="col-md-6">
                                    <input  type="text" placeholder="Phone" name="phone" value="{{$data->phone}}">
                                 </div>
                                 <div class="col-md-6">
                                    <input required    type="email" placeholder="Email Address" name="email" value="{{$data->mail}}">
                                 </div>
                                 <div class="col-md-6">
                                    <input type="text" placeholder="Website" name="website" value="{{$data->website}}">
                                 </div>
                                 <div class="col-md-12">
                                    <div class="add-listing-map">
                                       <div class="map-container" id="map">
                                      
                                       </div>
                                    </div>
                                 </div>
                                  <div class="col-md-12">
                                     <div class="uploaded-pictures-sec" > 

                                      
                                 <?php

                                        foreach ($images as $key){ ?>
                                           <div class="upload-gallery-pictures" style="margin: 10px;border-radius: 10px">
                                            <img src="<?php echo URL('images/'.$key->name);?>" alt="" id="{{$key->id}}" style="height: 134px;width:120px; box-sizing: border-box;">   
                                            <i class="fa fa-times delete_image" id="{{$key->id}}"></i>
                                           </div>
                                <?php } ?> 
                                 
                                      
                                       <span>
                                            <div id="myId" class="click-add-pictures dropzone">
                                              {{ csrf_field()}}
                                           </div>
                                     </span>
                                   
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
    $("#customFields").append('<div class="row customFields"><div class="col-md-4"><div class="form-group"> <input type="hidden" name="entry_exsist[]" value=""><select class="form-control" name="day[]"><option value="">Select Day</option><option>Monday</option><option>Tuesday</option><option>Wednesday</option>                                              <option>Thursday</option><option>Friday</option><option>Saturday</option><option>Sunday</option></select></div></div><div class="col-md-3"><div class="form-group"><div class="input-group date timepicker" id="timepicker1"><input type="text" class="form-control input-small timepickers" name="opening_hour[]" placeholder="opening hour"><span class="input-group-addon"><span class="fa fa-clock-o"></span></span></div></div></div><div class="col-md-3"><div class="form-group"><div class="input-group date timepicker" id="timepicker2"> <input type="text" class="form-control input-small timepickers" name="closing_hour[]"  placeholder="closing hour"><span class="input-group-addon"><span class="fa fa-clock-o"></span></span></div></div></div><div class="col-md-2"><div class="form-group"><a href="javascript:void(0);" class="btn add-row remCF"><i class="fa fa-minus"</a></div></div></div>');
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
      category:"required",    
       region:
       {
                     
       },   
       email:
       {
           
           email: true ,
          
       },
       _token:{
       
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
       {         $('#submit_btn').prop('disabled','true').html('Please wait...');

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
                url:"{{route('update_listing_data')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                   { 
                 $('#submit_btn').prop('disabled','false').html('Submit');
                swal({
                title: "Your data is saved",
                text: "Listing has been updated!",
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
                url:"{{route('update_listing_data')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                   { 

                swal({
                title: "Updated successfully",
                text: "Listing has been updated!",
                icon: "success",
                button: "OK",
                }).then(function() {
                window.location = "{{route('all-listings')}}";
                });

                   }
           });
            }} 
       
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

            $('.delete_image').on('click',function(){

            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this image",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
             
              if (willDelete) { 
              var id= $(this).attr('id');
              var listing_id ='{{$data->id}}';
            
              $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              type:'POST',
              url:"{{route('delete_user_images')}}",
              data:{id:id,listing_id:listing_id},          
              success:function(data)
              {      
                $('#days_time_row').html('');   

              }
              });
                 $(this).closest('.upload-gallery-pictures').remove();
               
              }
            });

            });

/////////
$('.delete_button_for_date').on('click',function(){
var id=$(this).attr('id');
var del=$(this);
var listing_id = "{{$data->id}}";

if(id){
        $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              type:'POST',
              url:"{{route('delete_day_time')}}",
              data:{id:id,listing_id:listing_id},          
              success:function(data)
              {      
                 del.closest('.delete_row').remove(); 
               
              }
              });

}


});


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
var address = "{{$data->address}}";
geocoder.geocode( { 'address': address}, function(results, status) {

if (status == google.maps.GeocoderStatus.OK) {
   var latitude = results[0].geometry.location.lat();
var longitude = results[0].geometry.location.lng();
var myCenter=new google.maps.LatLng(latitude,longitude);
      function initialize()
{
var mapProp = {
 center:myCenter,
 zoom:13,
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

$(document).on('change','#submt_cat',function(){
    if($('#submt_cat').val()){
        $('#submt_cat-error').remove();
    }

});

$(document).on('click','#submit_btn',function(){
    if(!$('#submt_cat').val()).selectedIndex == 0){
        $('#cater')[0].scrollIntoView({behavior: "smooth",block: "start"});
    }

});
 </script>
@endsection('script')