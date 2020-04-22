@extends('Users.master')
@section('body')
@if(!empty($contacttUs))
        <section class="bred-crumb-sec" 
   <?php 
if($contacttUs['images']['banner'] && file_exists('public/page_images'.'/'.$contacttUs['images']['banner']))
{
         echo'style="background-image: url('.URL('public/page_images').'/'.$contacttUs['images']['banner'].')"';
}
else{
   echo'style="background-image: url('.URL('public/page_images/brdcrmbbg.jpg').')"';
     }
    ?>
    >
@else  <section class="bred-crumb-sec" style='background-image: url("<?php  echo URL('public/page_images/brdcrmbbg.jpg'); ?>")';>
@endif
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Contact Us</h2>
                        <ul class="breadcrumbs">
                           <li><a href="{{route('/')}}" title="">Home</a></li>
                           <li>Contact us</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="cont-map-sec">
         <div class="block gray pt0">
            <div class="row">
               <div class="col-md-12">
                  <div class="contact-map">
                     <div class="map-container" id="map">
                      
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="block gray">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 column">
                     <h3 class="mini-title">Get In Touch</h3>
                     <div class="contactus-form"  id="contact">
                        <div id="message"></div>
                        <form id="contactform">
                           {{csrf_field()}}
                           <div class="row">
                              <div class="col-md-6"><input name="name" type="text" id="name" placeholder="Name" required="" /></div>
                              <div class="col-md-6"><input  name="email" type="text" id="email" placeholder="Email"  /></div>
                              <div class="col-md-12"><input type="text" placeholder="Subject" name="subject"/></div>
                              <div class="col-md-12"><textarea id="comments" placeholder="Your Message" name="message" required=""></textarea></div>
                              <div class="col-md-12"><input class="cont-inptpd-0" type="submit" id="submit" value="send message" />
                              <img src="{{URL('UserAssets/images/ajax-loader.gif')}}" class="pic_loader" style="display: none;padding-left: 44px;padding-top: 9px;">
                              </div>

                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="col-md-4 column">
                     <div class="contact-info-box">
                        <h3 class="mini-title">Contact Information</h3>
                        <div class="contact-box">
                           <ul>
                           @if(!empty($contacttUs))
                              <li>
                                 <i class="la la-map-marker"></i>
                                 <h4>Address</h4>
                                 <span>{!!$contacttUs['link']['address']!!}</span>
                              </li>
                              <li>
                                 <i class="la la-phone"></i>
                                 <h4>Phone Number</h4>
                                 <span>{!!$contacttUs['link']['phone']!!}</span>
                              </li>
                              <li>
                                 <i class="la la-fax"></i>
                                 <h4>Fax Number</h4>
                                 <span>{!!$contacttUs['link']['fax']!!}</span>
                              </li>
                              <li>
                                 <i class="la la-envelope-o"></i>
                                 <h4>Email</h4>
                                 <span>{!!$contacttUs['link']['email']!!}</span>
                              </li>
                              @endif
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection('body')
@section('script')
 
 <script>
var geocoder = new google.maps.Geocoder(); // initialize google map object
var address ="<?php if(!empty($contacttUs)) echo $contacttUs['link']['address']; ?>";
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

google.maps.event.addDomListener(window, 'load', initialize); 
   } 
});

//====email=====
 $(function($) {
   $('#contactform').validate({
       //ignore: " ",
   rules: { 
   newpassword:{minlength:6,
                       maxlength:20},   
       password:
       {
           required:true,           
       },   
       email:
       {
           required: true,
           email: true ,
           
       },
   },  
   messages: 
       {   newpassword:{    
                           minlength:"Password should be of minimum 6 characters",
                   maxlength:"Password should be of maximum 20 characters"},
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
       {     $('#submit').prop('disabled','true').val('Please wait...'); 
             $('.loader').css('display','block'); 

               $.ajax({
                   type:'POST',
                   url:"{{route('contact-email')}}",
                   data: new FormData(form),
                   contentType: false, 
                   cache: false, 
                   processData:false,
                   success:function(data)
                   { $('#submit').prop('disabled','false').val('send message');  
                    $('.loader').css('display','none'); 
                    $('#contactform')[0].reset();                          
                    if(data==1){
                       swal({
                title: "Great!!",
                text: "Your mail has been sent",
                icon: "success",
                button: "OK",
                });
             
                    }
                    if(data==0){
                    swal("Something went wrong, Please try again").then(function() {
                     });
                    }

                   }
           });      
        
       } 
       
   });
});
 </script>
@endsection('script')