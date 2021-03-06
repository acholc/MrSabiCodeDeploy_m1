@extends('Users.master')
@section('body')
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
      <section>
         <div class="block gray remove-top">
            <div class="row">
               <div class="col-md-12">
                  <div class="list-detail-sec">
                    
                        @if(!empty($deal[0]->image) && file_exists('public/deal_images/'.$deal[0]->image))
                         <ul class="list-detail-carousel" id="listing-detail-carousel">
                        @foreach($images as $key)
                        <li>
                           <div class="list-detail-box">
                             
                              <img src="{{URL('public/deal_images')}}/{{$deal[0]->image}}"  alt="" />
                             
                              <div class="list-detail-info">
                                 <div class="dis-tyle">
                             <span class="dels-dist">{{$deal[0]->discount}}<small> Off </small></span> 
                             </div>
                                 <h3>{{$listing->title}}</h3>
                                 <div class="rated-list" style="opcity:0">

                                   <!--  getting star average -->
                                   <?php
                              $array=array();
                                 if(count($reviews)>0)
                                 {

                                    foreach($reviews as $rate)
                                 {
                                    $array[]=$rate->rating;
                                 }    
                                    $average=array_sum($array)/count($reviews);
                                    $round= round($average,1); 
                                 }
                                 else
                                {
                                  $round =0;
                                }
                                   ?>       <span id="average_rating">             
                                            @if($round>4.5)                                    
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   @elseif($round>3.5)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($round>2.5)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($round>1.5)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($round>0)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($round==0)
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                @endif   
                                                </span>
                                          <span id="count">
                                      @if(count($reviews)==0) No Review
                                      @elseif(count($reviews)==1) (1) Review
                                      @elseif(count($reviews)>1)  ({{count($reviews)}})  Reviews
                                      @endif
                                 </span>
                                  
                                 </div>
                                 <ul class="list-detail-metas centerul">
                               
                                    <li id="add" @if($favourite==0) style="display:inline-block;" 
                                       @else style="display: none" 
                                    @endif><a href="javaScript:void(0)" title="" class="write-review Add_to_favorites"><i class="la la-heart-o"></i>Add to favourites</a></li>

                                    <li id="remove" @if($favourite==1) style="display:inline-block;" 
                                    @else style="display: none;" 
                                    @endif><a href="javaScript:void(0)" title="" class="write-review remove_from_favourite"><i class="la la-heart red"></i>Remove from favourites</a></li>
                                                              
                                 </ul>
                              </div>
                           </div>
                        </li>
          @endforeach
           </ul>
          @else 
            <ul class="its_else_image">
          <li>
                           <div class="list-detail-box">
                             
                              <img src="{{URL('public/images/default.jpg')}}"  alt="" />
                             
                              <div class="list-detail-info">
                                          <div class="dis-tyle">
                             <span class="dels-dist">{{$deal[0]->discount}}<small> Off </small></span> 
                             </div>
                                 <h3>{{$listing->title}}</h3>
                                 <div class="rated-list" style="opcity:0">

                                   <!--  getting star average -->
                                   <?php
                              $array=array();
                                 if(count($reviews)>0)
                                 {

                                    foreach($reviews as $rate)
                                 {
                                    $array[]=$rate->rating;
                                 }    
                                    $average=array_sum($array)/count($reviews);
                                    $round= round($average,1); 
                                 }
                                 else
                                {
                                  $round =0;
                                }
                                   ?>       <span id="average_rating">             
                                            @if($round>4.5)                                    
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   @elseif($round>3.5)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($round>2.5)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($round>1.5)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($round>0)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($round==0)
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                @endif   
                                                </span>
                 
                                  <span id="count">
                                      @if(count($reviews)==0) No Review
                                      @elseif(count($reviews)==1) (1) Review
                                      @elseif(count($reviews)>1)  ({{count($reviews)}})  Reviews
                                      @endif
                                 </span>
                                 </div>
                                 <ul class="list-detail-metas centerul">
                                
                                    <li id="add" @if($favourite==0) style="display:inline-block;" 
                                       @else style="display: none" 
                                    @endif><a href="javaScript:void(0)" title="" class="write-review Add_to_favorites"><i class="la la-heart-o"></i>Add to favourites</a></li>

                                    <li id="remove" @if($favourite==1) style="display:inline-block;" 
                                    @else style="display: none;" 
                                    @endif><a href="javaScript:void(0)" title="" class="write-review remove_from_favourite"><i class="la la-heart red"></i>Remove from favourites</a></li>
                                  
                                 </ul>
                              </div>
                           </div>
                        </li>
                        </ul>
          @endif            
                   
                    

                     <div class="mian-listing-detail">
                        <div class="container">                           
                           <div class="row">

                              <div class="col-md-8 column">
                                        <div class="deal-meals-box" id="meals">
                           <h3 class="mini-title">Meals And DrInks</h3>
                           <div class="brv-box-sm">
                              <span class="brv-off"> {{$deal[0]->discount}} off </span> on all Buffet, Drinks, Burger, Italian Foods and many more. 
                           </div>
                           <div class="deals-meals-sec">
                             
                         @if(!empty($similar))
                         @foreach($similar as $key)
                              <div class="deals-meals">
                                 <div class="deals-meals-thumb">
                                     @if(isset($key['image']) &&  file_exists('public/deal_images/'.$key['image']))
                                      <img src="{{URL('public/deal_images')}}/{{$key['image']}}" alt="">
                                      @else  <img src="{{URL('public/deal_images/default-small.jpg')}}" alt="">
                                      @endif
                                      </div>
                                 <div class="deals-meals-detail">
                                    <h3><a href="#" title="">title</a> <span>SPECIALITY</span></h3>
                                    <ul class="rate-strs foosa">
                                   <span id="average_rating">             
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
                                                </span>
                                       </li>
                                    </ul>
                                    <p>{{$key['description']}}</p>
                                 </div>
                                 <div class="meal-price">
                                    $12.99 <strike> $20.00 </strike>
                                 </div>
                              </div><!-- Meals -->
                          @endforeach
                          @endif
                           </div>
                        </div>
                                 <div class="description-detail-box" id="description">
                                    <h3 class="mini-title">DESCRIPTION</h3>
                                    <div class="detail-descriptions">
                                       <p>{{$listing->description}}</p>
                                    </div>
                                 </div>
                                 @if(!empty($days_time))
                                 <div class="hours-box" id="hours">
                                    <h3 class="mini-title">OpenIng Hours</h3>
                                    <div class="opening-hours-box">
                                       <ul>
                                          @foreach($days_time as $key)
                                          <li>
                                             <h5>{{$key->day}}</h5>
                                             <span>{{$key->opening_hour}}</span>
                                             <span>{{$key->closing_hour}}</span>
                                          </li>
                                          @endforeach
                                      
                                       </ul>
                                    </div>
                                 </div>
                                 @endif
                                 @if($deal[0]->address)
                                 <div class="location-box" id="location">
                                    <h3 class="mini-title">LOCATION</h3>
                                    <div class="list-location" id="map">
                                      
                                    </div>
                                 </div>
                                 @endif
                                 <div class="contactinfo-box" id="contact">
                                    <h3 class="mini-title">Contact Detail</h3>
                                    <div class="contact-info-list"><!-- 
                                       select listings.*,images.name,days_time.day,days_time.opening_hour,days_time.closing_hour from listings left join images on listing_id=images.listing_id LEFT JOIN listing_id=days_time.listing_id -->
                                       @if(isset($deal[0]->address))<span><strong>Address</strong>{{$deal[0]->address}}</span>@endif
                                       @if(isset($deal[0]->phone))<span><strong>Phone</strong><a href="tel:{{$deal[0]->phone}}">{{$deal[0]->phone}}</a></span>@endif
                                       @if(isset($listing->mail))<span><strong>E-mail</strong><a href="mailto:{{$listing->mail}}">{{$listing->mail}}</a></span>@endif
                                       @if(isset($listing->website))<span><strong>Website</strong><a href="http://{{$listing->website}}"> {{$listing->website}}</a></span>@endif
                                    </div>
                                 </div>
                              
                                                 
                              </div>
                              <aside class="col-md-4 column">
                                 <div class="widget">
                                    <h3 class="mini-title">Popular Businesses</h3>
                                    <div class="recentitem-widget widget_section">
                                       @for($i = 0; $i < 3; $i++)
                                       <div class="recentitem">
                                          <a href="{{route('listing-detail',$popular[$i]['id'])}}" title="">
                                       @if(!empty($popular[$i]['image']['name']) && file_exists('public/images/'.$popular[$i]['image']['name']))
                                      <img src="{{URL('public/images')}}/{{$popular[$i]['image']['name']}}" alt="" />
                                     @else   <img src="{{URL('public/images/default-small.jpg')}}" alt="" />
                                     @endif</a>
                                          <div class="rec_cont"><h3><a href="{{route('listing-detail',$popular[$i]['id'])}}" title="">{{$popular[$i]['title']}}</a></h3>
                                          <p><i class="fa fa-map-marker listloc" aria-hidden="true"></i> {{$popular[$i]['address']}}</p>
                                          </div>
                                       </div>
                                       @endfor
                                  
                                    </div>
                                    <!-- Recent Item Widget -->
                                 </div>
                                 <div class="widget">
                                    <h3 class="mini-title">Tags</h3>
                                    <div class="tags-widget widget_section bg-dtl-srl mCustomScrollbar">
                                         <?php  $tags=explode(',',$listing->tags); ?>
                                       @foreach($tags as $key)
                                        @if($key)
                                     <a href="{{url('search-by-tag/')}}/{{$key}}" title=""><i class="la la-tag"></i>{{$key}}</a>
                                     @endif
                                      @endforeach                           
                                    </div>
                                 </div>
                              </aside>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        <!-- Modal -->
<div id="myModal" class="modal fade login-popup" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     
      <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="log-in-pop">
            <div class="log-in-pop-left">
               <!--h4>Login through social media</h4>
               <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                  </li>
                  <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                  </li>
                  <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                  </li>
               </ul-->
            </div>
            <div class="log-in-pop-right">
               <a href="#" class="pop-close" data-dismiss="modal"><img src="{{URL('UserAssets/images/cancel.png')}}" alt="">
               </a>
               <h4>Login</h4>
               <p>Don't have an account? Create your account. It's take less then a minutes</p>
               <form class="s12 ng-pristine ng-valid"   id="login_form">
                <input type="hidden" name="non_redirect" value="1">
                 {{ csrf_field()}}
                  <div>
                     <div class="input-field s12">
                        <input type="text" name="email" data-ng-model="name1" class="validate" placeholder="Email" required="true">
                     </div>
                  </div>
                  <div>
                     <div class="input-field s12">
                        <input type="password" name="password" class="validate" placeholder="Password" required="true">
                     </div>
                  </div>
                  <div>
                     <div class="input-field s4">
                        <input type="submit" value="Login" class="waves-button-input"> 
                       <div class="alert alert-danger" role="alert" style="display: none" id="login_fail">
                      </div> 
                        
                           <div class="alert alert-danger" role="alert" style="display: none" id="login_error">Invalid credentials
                           </div> 
                
               
               
                     </div>
                  </div>
                  <div>
                     <div class="input-field s12 popup_link"> <a href="{{route('forgot-password')}}">Forgot password</a> | <a href="{{route('User_register')}}">Create a new account</a> </div>
                  </div>
               </form>
             
            </div>
         </div></div>
    
    </div>

  </div>
</div>
  <!--   ////// -->
      </section>
   <!--  ////-->
   <!-- Trigger the modal with a button -->
@endsection('body')
@section('script')
        <script>

  var loc= $('#autocomplete').val();         
var geocoder = new google.maps.Geocoder(); // initialize google map object
var address = "{{$deal[0]->address}}";
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

//the function for adding listing ton favourite===========
$('.Add_to_favorites').on('click',function(){
  if(!'{{Auth::id()}}'){ $('#myModal').modal('show');}
var id="{{$listing->id}}";

 $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              type:'POST',
              url:"{{route('Add_to_favorites')}}",
              data:{id:id},          
              success:function(data)
              {      
               if(data==1){
                  $('#remove').css('display','inline-block');
                  $('#add').css('display','none');           
               }
               if(data==0){
               swal("Something went wrong, Try again");
               }           
               
              }
              });

});

$('.remove_from_favourite').on('click',function(){
var id="{{$listing->id}}";

 $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              type:'POST',
              url:"{{route('remove_favourite_listings')}}",
              data:{id:id},          
              success:function(data)
              {      
               if(data==1){
                
                  $('#add').css('display','inline-block');
                     $('#remove').css('display','none');
                 
                            }
               if(data==0){
              
               }           
               
              }
              });

});

//scroll to review
$(".review_button").on('click',function() {
    $('#here')[0].scrollIntoView({ behavior: "smooth",
    block: "start"}); 
});

//rating
$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
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
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    $('#rating_field').val(ratingValue);
       
  });
  
  
});


function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}

// rating end
// /new

// if(!"{{Auth::id()}}"){
//   $('#submit').on('click',function(){
//     $('#myModal').modal('show');
//   });
// }


///new
//rating form
   
$(function($) {
   $('#rating_form').validate({
       ignore:"hidden:not(select)",
   rules: {
        "day[]": "required",   
      "category":"required",    
       comment:
       { 
           required:true,           
       },   
       email:
       {   required:true,
           email: true ,
       },
        name:
       {   required:true,
          
       },
   },  
   messages: 
       {                 
         email: 
         {
           required: "Please Enter  Email",
           email:"Your email address must be in the format of name@domain.com",
           },
         comment:{
          required:"Please write a comment"
         },
            name:{
          required:"Please enter your name"
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
        if('{{Auth::id()}}'){
          $.ajax({
                type:'POST',
                url:"{{route('rating')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                   { var results=$.parseJSON(data);
                                    
                    if(results.result){
                     $('#no_review').remove();
                     $('#review_data').append(results.result);
                     $('#rating_form')[0].reset();
                    if(results.count==1) $('#count').html('(1) Review');
                    if(results.count>1)  $('#count').html('('+results.count+')'+ ' Reviews');
                     $('#average_rating').html(results.average);
                     $('#stars li').parent().children('li.star').removeClass('selected');
                     $('.alert').css('display','inline-block').html('Your review has been added').fadeOut(5000);              
                    }
                    else{
                     swal("Something went wrong, Try again!!");
                    }
            
                   }
           });}
           else{

               $('#myModal').modal('show');

           } 
       }
       
   });
});
///login form
$(function($) {
   $('#login_form').validate({
      rules: {
        email:
       {  email: true ,
         required:true          
       },
      password:{
            required:true
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
             $.ajax({
                type:'POST',
                url:"{{route('User_login')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                   {   
                    var status = $.parseJSON(data);                 
                      if(status.error){
                         $('#login_fail').css('display','block').html(status.error).fadeOut(7000);
                   }
                   else{
                       swal({
                            title: "Login successfully",
                            text: "Listing added to favourite",
                            icon: "success",
                            button: "OK",
                            }).then(function()
                            {   var id="{{$listing->id}}";
                               $.ajax({
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                type:'POST',
                                url:"{{route('Add_to_favorites')}}",
                                data:{id:id},          
                                success:function(data)
                                {      
                                 if(data==1){
                                     window.location="{{url()->current()}}";       
                                 }
                                 if(data==0){
                                 swal("Something went wrong, Try again");
                                 } 
                                   if(data==2){
                                window.location="{{url()->current()}}";
                                 }                                 
                                }
                                });
                            });
                   }
                   }
           });
       } 
       
   });
});


 </script>
@endsection('script')
