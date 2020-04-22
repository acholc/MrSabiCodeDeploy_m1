@extends('User.master')
@section('body')
      <section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Profile</h2>
                        <ul class="breadcrumbs">
                           <li><a href="#" title="">Home</a></li>
                           <li>Edit Profile</li>
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
                                 <label class="edt-img" for="change-img">
                                 <i class="fa fa-pencil"></i> 
                                 <input  type="file" accept="image/*" onchange="preview_image(event)" name="profile_pic" id="change-img" style="visibility:hidden; width:0px; height:0px;">
                                 </label>
                              </div>
                              <p class="user_name">John Kazantzis</p>
                           </div>
                           <!-- user-profile-menu-->
                           <div class="user-profile-menu">
                              <ul>
                                 <li><a href="#"><i class="fa fa-tachometer"></i>Dashboard</a></li>
                                 <li><a href="#" class="db_active"><i class="fa fa-user-o"></i> Profile</a></li>
                              </ul>
                           </div>
                           <!-- user-profile-menu end-->
                           <!-- user-profile-menu-->
                           <div class="user-profile-menu">
                              <ul>
                                 <li><a href="#" ><i class="fa fa-th-list"></i> My listings  </a></li>
                                 <li><a href="#"><i class="fa fa-plus-square-o"></i> Add New</a></li>
                              </ul>
                           </div>
                           <!-- user-profile-menu end-->  
                           @if(Auth::id())                                      
                           <a href="{{route('user_logout')}}" class="log-out-btn">Log Out</a>
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="col-md-9">
                     <div class="profile_edit">
                        <!-- profile-edit-container--> 
                        <div class="profile-edit-container">
                           <div class="profile-edit-header fl-wrap">
                              <h4>My Account</h4>
                           </div>
                           <div class="custom-form">
                              <div class="row">
                                 <div class="col-md-6">
                                    <label>Firstname<i class="fa fa-user-o"></i></label>
                                    <input type="text" placeholder="John Kazantzis" value="">
                                 </div>
                                 <div class="col-md-6">
                                    <label>Lastname<i class="fa fa-envelope-o"></i>  </label>
                                    <input type="text" placeholder="John@mrsabi.com" value="">
                                 </div>
                              </div>
                                  <div class="row">
                                     <div class="col-md-6">
                                    <label>Email Address<i class="fa fa-envelope-o"></i>  </label>
                                    <input type="text" placeholder="John@mrsabi.com" value="">
                                 </div>
                                       <div class="col-md-6">
                                    <label>Phone<i class="fa fa-phone"></i>  </label>
                                    <input type="text" placeholder="+7(123)987654" value="">
                                 </div>                             
                                
                              </div>
                              <div class="row">
                           
                                 <div class="col-md-6">
                                    <label> Adress <i class="fa fa-map-marker"></i>  </label>
                                    <input type="text" placeholder="USA 27TH Brooklyn NY" value=""> 
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <label> Notes</label>                                              
                                    <textarea cols="40" rows="3" placeholder="About Me"></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- profile-edit-container end-->                                
                        <!-- profile-edit-container--> 
                        <div class="profile-edit-container">
                           <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                              <h4>My Socials</h4>
                           </div>
                           <div class="custom-form">
                              <div class="row">
                                 <div class="col-md-6">
                                    <label>Facebook <i class="fa fa-facebook"></i></label>
                                    <input type="text" placeholder="https://www.facebook.com/" value="">
                                 </div>
                                 <div class="col-md-6">
                                    <label>Twitter<i class="fa fa-twitter"></i>  </label>
                                    <input type="text" placeholder="https://twitter.com/" value="">
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <label> Google  <i class="fa fa-google-plus"></i>  </label>
                                    <input type="text" placeholder="https://www.google.com" value="">
                                 </div>
                                 <div class="col-md-6">
                                    <label> Whatsapp <i class="fa fa-whatsapp"></i>  </label>
                                    <input type="text" placeholder="https://www.whatsapp.com" value="">
                                 </div>
                              </div>
                              <button class="btn  big-btn  color-bg flat-btn">Save Changes<i class="fa fa-angle-right"></i></button>
                           </div>
                        </div>
                        <!-- profile-edit-container end-->                                        
                     </div>
                  </div>
                  <!--div class="col-md-2">
                     <div class="edit-profile-photo fl-wrap">
                         <img src="{{URL('UserAsset/images/tutor-8.jpg')}}" class="respimg img-responsive')}}" alt="">
                         <div class="change-photo-btn">
                             <div class="photoUpload">
                                 <span><i class="fa fa-upload"></i> Upload Photo</span>
                                 <input type="file" class="upload">
                             </div>
                         </div>
                     </div>
                     </div-->
               </div>
            </div>
         </div>
      </section>
@endsection('body')  
@section('script')
<!-- profile pic review----- -->
<script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection('script')    