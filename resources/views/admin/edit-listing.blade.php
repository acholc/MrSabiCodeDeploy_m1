@extends('admin.master')
<link rel="stylesheet" href="https://fontawesome.com/v3.2.1/assets/font-awesome/css/font-awesome.css">
@section('body')
<!-- ////// -->
<style> 

/* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:2.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}

</style>

<!-- ////// -->
<main class="main-wrapper clearfix">
   <!-- Page Title Area -->
   <div class="page-title">
      <div class="container">
         <div class="row">
            <div class="page-title-left">
               <h6 class="page-title-heading mr-0 mr-r-5">Edit Listing</h6>
            </div>
            <!-- /.page-title-left -->
            <div class="page-title-right d-none d-sm-inline-flex align-items-center">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="{{route('adm.listing')}}">Business Listing</a>
                  </li>
                  <li class="breadcrumb-item active">Edit Listing</li>
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
         <!-- Default Tabs -->
         <div class="col-md-12 widget-holder">                                    
                                    <!-- /.modal -->                             
		 
            <div class="widget-bg">
               <div class="widget-body">
                  
                  <div class="tabs edit_list_tabs">
                     <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#basic_info" data-toggle="tab" aria-expanded="true">Basic Info</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#ratings" data-toggle="tab" aria-expanded="true">Ratings</a>
                        </li>
                     </ul>
                     <!-- /.nav-tabs -->
                     <div class="tab-content">
                        <div class="tab-pane active" id="basic_info">
                           <div class="row">
                              <div class="col-md-12 p-0">
                                 <div class="widget-bg">
                                    <div class="widget-heading clearfix">
                                       <h5>Edit Listing</h5>
                                    </div>
                                    <!-- /.widget-heading -->
                                    <div class="widget-body clearfix">
                                       <form id="listing_form">
                                          <input type="hidden" name="list_id" value="{{$data[0]->id}}" >
                                         <input type="hidden" name="photos[]" id="photos_field" value="" >
                                          {{ csrf_field()}}

                                          <div class="row">
                                             <div class="col-md-12">
                                         <!--        <div class="row">
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <label for="l30">Title</label>
                                                         <input class="form-control"  value="{{$data[0]->title}}" type="text" value="The Tipsy Cow, Madison, WI" name="title" required="true" >
                                                      </div>
                                                   </div>
                                                </div> -->
                                                <div class="row">
                                                   <div class="col-lg-6">
                                                      <div class="form-group">
                                                         <label for="l30">Business title</label>
                                                         <input class="form-control"  value="{{$data[0]->title}}" type="text" value="" name="title" required="true">
                                                      </div>
                                                   </div>
                                                   <div class="col-lg-6">
                                                      <div class="form-group">
                                                         <label for="l30">Categories</label>
                                                         <select class="livesearch form-control" name="category" required="true">
                                                             @foreach($data[0]->categories as $key)
                                                            <option value="{{$key['id']}}" <?php echo ($data[0]->category_id ==$key['id'])?"selected":"" ?>>{{$key['category']}}</option>
                                                            @endforeach
                                                         </select>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <div class="form-group tag_input">
                                                            <label class="control-label">Tags</label>
                                                            <input type="text" value="{{$data[0]->tags}}" data-role="tagsinput" placeholder="Tags" class="form-control" name="tags" />
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row" >
                                                   <div class="col-lg-12">
                                                      <div class="form-group">
                                                         <label for="exampleInputEmail1">Description</label>
                                                         <textarea type="text" class="form-control" rows="6" placeholder="" name="description">{{$data[0]->description}}</textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                @foreach($data[0]->days_time as $key)
                                                <div class="form-table delete_row">
                                                   <div class="row customFields">
                                                      <div class='col-md-4'>
                                                         <div class="form-group">
                                                                       <input type="hidden" name="entry_exsist[]" value="{{$key['id']}}">
                                                            <select class="form-control" name="day[]" title="Please select a day" required="true">
                                                                    <option <?php echo ($key['day'] == 'Monday')?"selected":"" ?>>Monday</option>
                                                                    <option <?php echo ($key['day'] == 'Tuesday')?"selected":"" ?>>Tuesday</option>
                                                                    <option <?php echo ($key['day'] == 'Wednesday')?"selected":"" ?>>Wednesday</option>
                                                                    <option <?php echo ($key['day'] == 'Thursday')?"selected":"" ?>>Thursday</option>
                                                                    <option <?php echo ($key['day'] == 'Friday')?"selected":"" ?>>Friday</option>
                                                                    <option <?php echo ($key['day'] == 'Saturday')?"selected":"" ?>>Saturday</option>
                                                                    <option <?php echo ($key['day'] == 'Sunday')?"selected":"" ?>>Sunday</option>
                                                            </select>
                                                         </div>
                                                      </div>
                                                      <div class='col-md-3'>
                                                         <div class="form-group">
                                                            <div class='input-group adm-lst-clc-sec'>
                                                               <input  id="timepicker1" type="text" class="form-control input-small timepickers" placeholder="Opening Hour" name="opening_hour[]" value="{{$key['opening_hour']}}"/>
                                                               <span class="input-group-addon">
                                                               <span class="fa fa-clock-o"></span>
                                                               </span>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class='col-md-3'>
                                                         <div class="form-group">
                                                            <div class='input-group adm-lst-clc-sec' id='timepicker2'>
                                                               <input  id="timepicker2" type="text" class="form-control input-small timepickers" placeholder="Closing Hour" name="closing_hour[]" value="{{$key['closing_hour']}}"/>
                                                               <span class="input-group-addon">
                                                               <span class="fa fa-clock-o"></span>
                                                               </span>
                                                            </div>
                                                         </div>
                                                      </div>
                                                       <div class='col-md-2'>
                                      <div class="form-group">
                                       <button class="btn add-row delete_button_for_date" id="{{$key['id']}}" type="button"><i  class="fa fa-minus"></i></button>
                                    </div>
                                    </div>
                                                   </div>
                                                </div>
                                                @endforeach
                                                <!--///-->
                                                         <div class="form-table"  id="customFields">
                                                   <div class="row customFields">
                                                 
                                                                   </div>
                                                </div>
                                                  <div class='col-md-2'>
                                                         <div class="form-group">
                                                            <a href="javascript:void(0);" class="btn add-row addCF"><i class="fa fa-plus"></i></a>
                                                         </div>
                                                      </div>
                                                <!--///-->
                                                <h4 class="dobl-brdr mt-2">Contact Information</h4>
                                                <div class="row">
                                                   <div class="col-lg-6">
                                                      <div class="form-group">
                                                         <label for="l30">Address</label>
                                                         <input class="form-control"  value="{{$data[0]->address}}" type="text" id="autocomplete" name="address_description" required="true">
                                                      </div>
                                                   </div>
                                                     <div class="col-md-6">
                                                  <label for="l30">Country</label>
                                                <select data-placeholder="Country" class="chosen-select" tabindex="-1" style="display: none;" name="country" onchange="getval();" id="countries" required="true">
                                                <option value="">Select Country</option>
                                                  @foreach($data[0]->countries as $key)
                                                            <option value="{{$key['country_id']}}" <?php echo ($key['country_id'] == $data[0]->country_id)?"selected":"" ?>>{{$key['country_name']}}</option>
                                                            @endforeach
                                       
                                                </select>

                                                </div>
                                                
                                                </div>
                                                   <div class="row">
                                                          <div class="col-lg-6">
                                                      <div class="form-group">
                                                         <label for="l30">State</label>
                                                         <select  id="state" data-placeholder="State"  name="state" class="chosen-select" required="true">
                                                             
                                                             @foreach($data[0]->states as $key)
                                                            <option value="{{$key['state_id']}}" <?php echo ($key['state_id'] == $data[0]->state_id)?"selected":"" ?>>{{$key['state_name']}}</option>
                                                            @endforeach
                                                          
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="col-lg-6">
                                                      <div class="form-group">
                                                         <label for="l30">City</label>
                                                         <input class="form-control"  value="{{$data[0]->city}}" type="text" name="city" placeholder="City="> 
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                       <div class="col-lg-6">
                                                      <div class="form-group">
                                                         <label for="l30">Pincode</label>
                                                         <input class="form-control"  value="{{$data[0]->pincode}}" type="text" name="pincode" >
                                                      </div>
                                                   </div>
                                                   <div class="col-lg-6">
                                                      <div class="form-group">
                                                         <label for="l30">Phone No</label>
                                                         <input class="form-control"  value="{{$data[0]->phone}}" type="text" name="phone">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-lg-6">
                                                      <div class="form-group">
                                                         <label for="l30">Email</label>
                                                         <input class="form-control"  value="{{$data[0]->mail}}" type="text" name="email" required="true">
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="col-lg-6">
                                                      <div class="form-group">
                                                         <label for="l30">Website</label>
                                                         <input class="form-control"  value="{{$data[0]->website}}" type="text" name="website">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-lg-12">
                                                              <div id="map" class="map-container">
                                                               </div>
                                                   </div>
                                                </div>
                                                <div class="row preview-images-zone mt-3">
                                                    @foreach($data[0]->images as $key)
                                                   <div class="col-lg-3 preview-image preview-show-1">
                                                      <div class="image-cancel" id="{{$key['id']}}">x</div>
                                                      <div class="image-zone delete_image"><img  src="{{url('public/images')}}/{{$key['name']}}"></div>
                                                   </div>
                                                   @endforeach

                                               
                                                </div>
                                                      <span>
                                            <div id="myId" class="click-add-pictures dropzone">
                                              {{ csrf_field()}}
                                           </div>
                                     </span>
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
                                               <div class="tab-pane" id="ratings">
                           <div class="row">
                              <div class="col-md-12 p-0">
                                 <div class="widget-bg">
                                    <div class="widget-heading clearfix">
                                       <h5>Users Ratings
                                       <a href="" data-toggle="modal" data-target=".add_rating" class="float-right btn btn-warning  btn-sm"><i class="fa fa-plus"></i> &nbsp; Add New </a>
                                       </h5>
            
                                    </div>
                                    <!-- /.widget-heading -->
                                    <div class="widget-body clearfix">
                              
                                       <div class="table-responsive">
                                          <table class="table table-striped" data-toggle="datatables" data-plugin-options='{"searching": false}'>
                                             <thead>
                                                <tr>
                                                   <th>Image</th>
                                                   <th>Name</th>
                                                   <th>Rating</th>  
                                                   <th>Comment</th>
                                                   <th>Action</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                @foreach($data[0]->rating as $key)
                                                <tr class="user_row" id="{{$key['id']}}">
                                                   <td style="min-width:40px;"><img src="{{URL('public/profile_pictures/')}}/{{$key['userdata']['profile_image']}}" class="user_profile"></td>
                                                   <td>{{$key['userdata']['name']}}</td>
                                       <td><div class="rating-score">

                                                @if($key['rating']>4.5)                                    
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   @elseif($key['rating']>3.5)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($key['rating']>2.5)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($key['rating']>1.5)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($key['rating']>0)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($key['rating']==0)
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                @endif 


                                 </div></td>
                                    
                                                   <td>{{$key['comment']}}</td>
                                                   <!-- <td><label class="badge badge-success">Active</label></td> -->
                                                   <td>
                                       
                                                      <a href="{{route('adm.rating_modal',$key['id'])}}"  data-toggle="modal" data-target=".bs-modal-md" class="btn btn-primary btn-circle btn-sm ripple call_modal">
                                                      <i data-toggle="tooltip" title="Edit" class="list-icon lnr lnr-pencil"></i>
                                                      </a>
                                                      <a href="javascript:void(0)" class="btn btn-warning btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
                                                      <i data-toggle="tooltip" data-placement="top" title="Delete" class="list-icon lnr lnr-trash" id="31"></i>
                                                      </a>
                                                   </td>
                                                </tr>
                                                @endforeach
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    <!-- /.widget-body -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.tab-content -->
                  </div>
                  <!-- /.tabs -->
               </div>
               <!-- /.widget-body -->
            </div>
            <!-- /.widget-bg -->
         </div>
         <!-- /.widget-holder -->
      </div>
   </div>
    <!-- /.modal-content -->
   <div class="modal fade bs-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none" id="rating_modal">
      <div class="modal-dialog modal-md">
           <div class="modal-content">
            <form id="update_rating"> 
            {{csrf_field()}}          
                        <div class="modal-body">

                        </div>
            </form>
                
            </div>
         </div>
                                           
      </div>  
   <!-- /.modal-content -->                 
                                    
<div class="modal fade add_rating" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                               <form id="add_review">  
                                                {{csrf_field()}}
                                               <input type="hidden" name="add_rating" id="add_rating">
                                               <input type="hidden" name="listing_id" value="{{$data[0]->id}}">                                             
                                                <div class="modal-body">
													
                                          <input type="hidden" name="rating">
										<div class="form-group">
                                            <label for="l38">Add Ratings</label>
                                       <div class='rating-stars text-center'>
                                           <ul id='stars'>
                                             <li class='star' title='Poor' data-value='1'>
                                               <i class='fa fa-star fa-fw'></i>
                                             </li>
                                             <li class='star' title='Fair' data-value='2'>
                                               <i class='fa fa-star fa-fw'></i>
                                             </li>
                                             <li class='star' title='Good' data-value='3'>
                                               <i class='fa fa-star fa-fw'></i>
                                             </li>
                                             <li class='star' title='Excellent' data-value='4'>
                                               <i class='fa fa-star fa-fw'></i>
                                             </li>
                                             <li class='star' title='WOW!!!' data-value='5'>
                                               <i class='fa fa-star fa-fw'></i>
                                             </li>
                                           </ul>
                                         </div>
                           </div>
                                        <div class="form-group">
                                            <label for="l38">Add Comment</label>
                                            <textarea class="form-control" id="l38" rows="3" name="add_comment" required="true"></textarea>
                                        </div>    
                                      
                                   	
                                                </div>
                                                <div class="modal-footer">
												<button class="btn btn-primary btn-sts btn-rounded ripple text-left" type="submit">Save Changes</button>
                                            <button class="btn btn-danger btn-sts btn-rounded ripple text-left" data-dismiss="modal" aria-hidden="true" type="submit">Cancel</button>
											 </form>
                                                </div>
                                            </div>
                                         
                                        </div>
                                      
                                    </div>

   
</main>
@endsection('body')
@section('script')
<script>
$(document).ready(function(){
  $(".addCF").click(function(){
   $("#customFields").append('<div class="row customFields"><div class="col-md-4"><div class="form-group"> <input type="hidden" name="entry_exsist[]" value=""><select class="form-control" name="day[]" required="true"><option value="">Select Day</option><option>Monday</option><option>Tuesday</option><option>Wednesday</option>                                              <option>Thursday</option><option>Friday</option><option>Saturday</option><option>Sunday</option></select></div></div><div class="col-md-3"><div class="form-group"><div class="input-group date timepicker" id="timepicker1"><input type="text" class="form-control input-small timepickers" name="opening_hour[]" placeholder="opening hour"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></div></div><div class="col-md-3"><div class="form-group"><div class="input-group date timepicker" id="timepicker2"> <input type="text" class="form-control input-small timepickers" name="closing_hour[]"  placeholder="closing hour"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></div></div><div class="col-md-2"><div class="form-group"><a href="javascript:void(0);" class="btn add-row remCF"><i class="fa fa-minus"</a></div></div></div>');
  });
    $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().parent().remove();
    });
});
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
                title: "Your data is saved",
                text: "Listing has been updated!",
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
                window.location = "{{route('adm.listing')}}";
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
         

/////////
$('.delete_button_for_date').on('click',function(){
var id=$(this).attr('id');
var del=$(this);
var listing_id = "{{$data[0]->id}}";

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
var address = "{{$data[0]->address}}";
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
 </script>
 <script>
      $('.image-cancel').on('click',function(){

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
              var listing_id ='{{$data[0]->id}}';
            
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
                 $(this).closest('.preview-show-1').remove();
               
              }
            });

            });

//========delete rating=========
$('.lnr-trash').on('click',function(){
var id=$(this).closest('.user_row').attr('id');
$('.yes_delete').on('click',function(){
   $('.delete-pop').modal('hide');
         $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              type:'POST',
              url:"{{route('adm.delete_rating')}}",
              data:{'id':id},          
              success:function(data)
              {      
                if(data==1){
                  $('#'+id).animate({"opacity": 0,"left":"-1000px" },800, function() {
                $(this).hide();
             });
                }      

              }
              });

             });
});

//===========call modal data======
$('.call_modal').on('click',function(){
   $('#rating_modal').find('.modal-body').load($(this).attr('href'));  
});




//=======stars=======
//======rating=======
$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $(document).on('mouseover','#stars li',function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });

  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  /* 2. Action to perform on click */
  $(document).on('click','#stars li',function(){
     var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++){
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    $('#rating_field_val').val(ratingValue);
        $('#add_rating').val(ratingValue);
       
  });
  
});
//=========update_rating=========
$(function($) {
   $('#update_rating').validate({
       // ignore:"hidden:not(select)",
   rules: {
      comment:{required:true},

   },  
   messages: 
       {       
         comment:{
          required:"Please add comment"
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
        $.ajax({
                type:'POST',
                url:"{{route('adm.update_rating')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                   { 

                swal({
                title: "Your data is saved",
                text: "Review has been updated!",
                icon: "success",
                button: "OK",
                }).then(function() {
                window.location = "{{url()->current()}}";
                });
                   }
           });


       } 
       
   });
});


//==============add_review============
//=========update_rating=========
$(function($) {
   $('#add_review').validate({
       // ignore:"hidden:not(select)",
   rules: {
      add_comment:{required:true},

   },  
   messages: 
       {       
         add_comment:{
          required:"Please add comment"
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
        $.ajax({
                type:'POST',
                url:"{{route('adm.add_review')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                   { 

                swal({
                title: "Your data is saved",
                text: "Review has been added!",
                icon: "success",
                button: "OK",
                }).then(function() {
                window.location = "{{url()->current()}}";
                });
                   }
           });


       } 
       
   });
});
$('#listing_form').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});
 </script>
@endsection('script')