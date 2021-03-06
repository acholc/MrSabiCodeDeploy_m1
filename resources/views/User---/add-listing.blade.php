@extends('User.master')
@section('body')      
      <section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Add Listing</h2>
                        <ul class="breadcrumbs">
                           <li><a href="#" title="">Home</a></li>
                           <li>Add Listing</li>
                        </ul>
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
                  <div class="col-md-3">
                     <div class="fixed-bar fl-wrap">
                        <div class="user-profile-menu-wrap fl-wrap">
                           <div class="user-profile-img box-des-ns">
                              <div class="img-nds">
                                 <img src="{{URL('UserAsset/images/tutor-8.jpg')}}" class="img-responsive" id="output_image">
                              </div>
                              <p class="user_name">John Kazantzis</p>
                           </div>
                           <!-- user-profile-menu-->
                           <div class="user-profile-menu">
                              <ul>
                                 <li><a href="{{route('edit-profile')}}"><i class="fa fa-tachometer"></i>Dashboard</a></li>
                                 <li><a href="edit-profile"><i class="fa fa-user-o"></i> Profile</a></li>
                              </ul>
                           </div>
                           <!-- user-profile-menu end-->
                           <!-- user-profile-menu-->
                           <div class="user-profile-menu">
                              <ul>
                                 <li><a href="{{route('all-listings')}}" ><i class="fa fa-th-list"></i> My listings  </a></li>
                              </ul>
                           </div>
                           <!-- user-profile-menu end-->                                        
                           <a href="#" class="log-out-btn">Log Out</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-9">
                     <div class="add-listing-sec">
                        <form id="listing_form">
                           {{ csrf_field() }}

                           <input type="hidden" name="photos[]" id="photos_field" value="">

                           <div class="form-listing custom-form">
                              <div class="row">
                                 <div class="col-md-12">
                                    <h3>About</h3>
                                 </div>
                                 <div class="col-md-8">
                                    <input type="text" name="title" placeholder="Listing Title" class="pl-15" required="true">
                                 </div>
                                 <div class="col-md-4">
                                    <select name="category" data-placeholder="All Categories" class="chosen-select" tabindex="-1" style="display: none;" required="true">
                                       <option value="All Categories">All Categories</option>
                                       <option value="Hospitals">Hospitals</option>
                                       <option value="Hotels">Hotels</option>
                                       <option value="Mechanics">Mechanics</option>
                                       <option value="Restaurant">Restaurant</option>
                                       <option value="Bars">Bars</option>
                                    </select>
                                 </div>
                                 <div class="col-md-12">
                                    <textarea placeholder="Description" name="description" required="true"></textarea>
                                 </div>
                                 <div class="col-md-12">
                                    <input type="text" placeholder="Tags" name="tags" required="true">
                                 </div>
                                 <div class="col-md-12">
                                    <h3>Contact</h3>
                                 </div>
                                 <div class="col-md-6">
                                    <input type="text" placeholder="Address" name="address" required="true">
                                 </div>
                                 <div class="col-md-6">
                                    <select name="region" data-placeholder="Listing Region" class="chosen-select" tabindex="-1" style="display: none;" required="true">
                                       <option value="Listing Region">Listing Region</option>
                                       <option value="Foods">Foods</option>
                                       <option value="Salads">Salaads</option>
                                       <option value="Kingston">Kingston</option>
                                       <option value="Signing">Signing</option>
                                    </select>
                                 </div>
                                 <div class="col-md-6">
                                    <input type="text" placeholder="Listing Phone" name="phone" required="true">
                                 </div>
                                 <div class="col-md-6">
                                    <input type="email" placeholder="Listing Mail" name="email" required="true">
                                 </div>
                                 <div class="col-md-12">
                                    <div class="add-listing-map">
                                       <div class="map-container">
                                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.5755969364104!2d-122.45284058544394!3d37.77654837975904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085874c16fa329f%3A0x48adaf3dfc9ffca6!2s2130+Fulton+St%2C+San+Francisco%2C+CA+94117%2C+USA!5e0!3m2!1sen!2sin!4v1563872542038!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="uploaded-pictures-sec"> 
                                    
                                    
                                      <!--  <div  id="my-awesome-dropzone"  class="dropzone"> -->
                                       <div id="myId" class="click-add-pictures dropzone">
                                          {{ csrf_field()}}
                                       </div>
                                    <!-- </div> -->
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="profile-edit-container">
                                       <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                                          <h4>My Socials</h4>
                                       </div>
                                       <div class="custom-form">
                                          <div class="row">
                                             <div class="col-md-6">
                                                <input type="text" placeholder="https://www.facebook.com/" value="" name="facebook">
                                             </div>
                                             <div class="col-md-6">
                                                <input type="text" placeholder="https://twitter.com/" value="" name="twitter">
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-md-6">
                                                <input type="text" placeholder="https://www.google.com" value="" name="google">
                                             </div>
                                             <div class="col-md-6">
                                                <input type="text" placeholder="https://www.whatsapp.com" value="" name="whatsapp">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="submission-btns">
                                 <button type="submit" class="btn  big-btn  color-bg flat-btn" id="">Preview &amp; Submit Listing<i class="fa fa-angle-right"></i></button>
                             
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



var myDropzone = new Dropzone('div#myId', {parallelUploads: 100, url: "{{route('check')}}", maxFiles: 30, autoProcessQueue: false, addRemoveLinks: true,headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  } });



   /////////////
   
$(function($) {
   $('#listing_form').validate({
       //ignore: " ",
   rules: {    
       region:
       {
           required:true,           
       },   
       email:
       {
           required: true,
           email: true ,
          
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
                              title: "Great!!",
                              text: "Listing has been added!",
                               icon: "success",
                                button: "OK",
                              }).then(function() {
                              window.location = "{{route('add-listing')}}";
                              });

                   }
           });
               });
                

               
              
       } 
       
   });
});
</script>




@endsection('script')
