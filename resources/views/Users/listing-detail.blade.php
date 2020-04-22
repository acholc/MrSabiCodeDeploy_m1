@extends('Users.master')
@section('body')
<script>
    function changerate(id,rate){
        
        $(function () {
 
  $("#"+id).rateYo({
    rating: rate,
    readOnly: true
  });
 
});

}
</script>
<style>
   

/* Base setup */
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

h1 {
    font-size: 2em; 
    margin-bottom: .5rem;
}

/* Ratings widget */
.rate {
    display: inline-block;
    border: 0;
}
/* Hide radio */
.rate > input {
    display: none;
}
/* Order correctly by floating highest to the right */
.rate > label {
    float: right;
}
/* The star of the show */
.rate > label:before {
    display: inline-block;
    font-size: 3rem;
    padding: .3rem .2rem;
    margin-left: 5px;
    margin-top:-13px;
    cursor: pointer;
    font-family: FontAwesome;
    content: "\f005 "; /* full star */
}
/* Zero stars rating */
.rate > label:last-child:before {
    content: "\f006 "; /* empty star outline */
}
/* Half star trick */
.rate .half:before {
    content: "\f089 "; /* half star no outline */
    position: absolute;
    padding-right: 0;
}
/* Click + hover color */
input:checked ~ label, /* color current and previous stars on checked */
label:hover, label:hover ~ label { color: #FF9800;  } /* color previous stars on hover */

/* Hover highlights */
input:checked + label:hover, input:checked ~ label:hover, /* highlight current and previous stars */
input:checked ~ label:hover ~ label, /* highlight previous selected stars for new rating */
label:hover ~ input:checked ~ label /* highlight previous selected stars */ { color: #A6E72D;  } 



</style>
      <section>
         <div class="block gray remove-top">
            <div class="row">
               <div class="col-md-12">
                  <div class="list-detail-sec">
                    
                        @if(!empty($images[0]) && file_exists('public/images/'.$images[0]->name))
                         <ul class="list-detail-carousel its_slide_show" id="listing-detail-carousel">
                        @foreach($images as $key)
                        <li>
                           <div class="list-detail-box">
                             
                              <img src="{{URL('public/images')}}/{{$key->name}}"  alt="" />
                             
                              <div class="list-detail-info">
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
                                     <div id="rateYo"></div>
                                            <!--@if($round==5)                                    -->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       @elseif($round==4.5)-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--            @elseif($round==4)-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--            @elseif($round==3.5)-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--            @elseif($round==3)-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--            @elseif($round==2.5)-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--            @elseif($round==2)-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                                   
                                            <!--       @elseif($round==1.5)-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--       @elseif($round==1)-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--       @elseif($round==0.5)-->
                                            <!--       <b class="la la-star orng"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--       @elseif($round==0)-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--       <b class="la la-star-o"></b>-->
                                            <!--    @endif   -->
                                                </span>
                                          <span id="count" class="see_reviews">
                                      @if(count($reviews)==0) No Review
                                      @elseif(count($reviews)==1) (1) Review
                                      @elseif(count($reviews)>1)  ({{count($reviews)}})  Reviews
                                      @endif
                                 </span>
                                       
                                  
                                 </div>
                                
                                 <ul class="list-detail-metas centerul">
                                  
                                    @if(Auth::id()!=$listing->user_id && $check_review==0)
                                    <li class"review_button_class"><a href="javaScript:void(0)" title="" class="write-review review_button" style="text-decoration: none">WrIte a Review</a></li>
                                    
                                    @endif
                                    
                                     <li id="remove" @if($favourite==1 || $favourite==3) style="display:inline-block;" 
                                      @else style="display: none;" 
                                     @endif><a href="javaScript:void(0)" title="" class="write-review remove_from_favourite"><i class="la la-heart red"></i>Remove from favourites</a>
                                    </li>
                                    
                                    <li id="add" @if($favourite==0) style="display:inline-block;" 
                                       @else style="display: none" 
                                    @endif ><a href="javaScript:void(0)" title="" class="write-review Add_to_favorites"><i class="la la-heart-o"></i>Add to favourites</a></li>
                                    <!--<li><a href="javaScript::void(0)" class="see_reviews write-review Add_to_favorites">see all reviews</a></li>-->
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
                                         
                                                <div id="rateYo"></div>
                                                 
                                                </span>
                 
                                  <span id="count">
                                      @if(count($reviews)==0) No Review
                                      @elseif(count($reviews)==1) (1) Review
                                      @elseif(count($reviews)>1)  ({{count($reviews)}})  Reviews
                                      @endif
                                 </span>
                                  
                                 </div>
                                
                                 <ul class="list-detail-metas centerul">

                                   
                                    @if(Auth::id()!=$listing->user_id && $check_review==0)
                                    <li class="review_button_class"><a href="javaScript:void(0)" title="" class="write-review review_button" style="text-decoration: none">WrIte a Review</a></li>
                                    @endif
                                    
                                     <li id="remove" @if($favourite==1 || $favourite== 3) style="display:inline-block;" 
                                     @else style="display: none;" 
                                     @endif><a href="javaScript:void(0)" title="" class="write-review remove_from_favourite"><i class="la la-heart red"></i>Remove from favourites</a>
                                    </li>
                                    <li id="add" @if($favourite==0) style="display:inline-block;" 
                                       @else style="display: none" 
                                    @endif><a href="javaScript:void(0)" title="" class="write-review Add_to_favorites"><i class="la la-heart-o"></i>Add to favourites</a></li>
                                    <!--<li><a href="javaScript::void(0)" class="see_reviews write-review Add_to_favorites">see all reviews</a></li>-->
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
                                 <div class="description-detail-box" id="description">
                                    <h3 class="mini-title">DESCRIPTION</h3>
                                    <div class="detail-descriptions">
                                       <p>{{$listing->description}}</p>
                                    </div>
                                 </div>
                                @if(!empty($days_time[0]))
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
                                 @if($listing->address)
                                 <div class="location-box" id="location">
                                    <h3 class="mini-title">LOCATION</h3>
                                    <div class="list-location" id="map">
                                      
                                    </div>
                                 </div>
                                 @endif
                                 <div class="contactinfo-box" id="contact">
                                    <h3 class="mini-title">Contact Details</h3>
                                    <div class="contact-info-list"><!-- 
                                       select listings.*,images.name,days_time.day,days_time.opening_hour,days_time.closing_hour from listings left join images on listing_id=images.listing_id LEFT JOIN listing_id=days_time.listing_id -->
                                       @if(isset($listing->address))<span><strong>Address</strong>{{$listing->address}}</span>@endif
                                        @if(isset($listing->phone))<span><strong>Phone</strong><a href="tel:{{$listing->phone}}">{{$listing->phone}}</a></span>@endif
                                        @if(isset($listing->mail))<span><strong>E-mail</strong><a href="mailto:{{$listing->mail}}">{{$listing->mail}}</a></span>@endif
                                        @if(isset($listing->website))<span><strong>Website</strong><a href="http://{{$listing->website}}"> {{$listing->website}}</a></span>@endif
                                    </div>
                                 </div>
                                 <div class="display-review-box blg-dtl-comt-sec">
                                   
                                    <h3 class="mini-title all_reviews">revıews</h3>
                                    <div class="review-list-sec">
                                       <ul id="review_data">
                                          @if(!empty($reviews))
                                            <?php $is=0; ?>
                                          @foreach($reviews as $key)
                                            <li>
                                             <div class="review-list">
                                                <div class="review-avatar"> <img src="{{URL('UserAssets/images/resource/r1.jpg')}}"  alt="" /> </div>
                                                <div class="reviewer-info">
                                                   <h3><a href="#" title="">{{ucwords($key->name)}}</a></h3>
                                                   <div class="reviewer-stars">
                                                     
                                                       
                                             <script> changerate({{$is}},{{$key->rating}}); </script>
                                              <div id="{{$is}}"></div>
                                     
                                                 <?php $is++; ?>
                                                </div>
                                                 
                                                   <span>{{$key->created_at}}</span>
                                                   <p>{{$key->comment}}</p>
                                                </div>
                                                
                                             </div>
                                          </li>
                                          @endforeach
                                          @endif

                                           @if(!count($reviews)>0)
                                           <li>
                                           <h3 class="" id="no_review">No revıews yet</h3>
                                          @endif
                                       </li>
                                    
                                       </ul>
                                    </div>
                                 
                                   
                                 </div>
                              @if(Auth::id()!=$listing->user_id && $check_review==0)
                                 <div class="add-review-box bg-dtl-rtg-sec" id="here">
                                    <h3 class="mini-title">Rate & Wrıte a Revıew</h3>
                                   
                                    <div class="add-review-form">
                                       <div class="add-your-stars">
                                          <h5>Your Rating</h5>
                                         <fieldset class="rate">
    <input type="radio" id="rating10" name="rating" value="10" onChange="ratingfun(this.value);" /><label for="rating10" title="5 stars"></label>
    <input type="radio" id="rating9"  name="rating" value="9" onChange="ratingfun(this.value);" /><label class="half" for="rating9" title="4 1/2 stars"></label>
    <input type="radio" id="rating8" name="rating" value="8" onChange="ratingfun(this.value);"/><label for="rating8" title="4 stars"></label>
    <input type="radio" id="rating7" name="rating" value="7" onChange="ratingfun(this.value);"/><label class="half" for="rating7" title="3 1/2 stars"></label>
    <input type="radio" id="rating6"   name="rating"value="6" onChange="ratingfun(this.value);"/><label for="rating6" title="3 stars"></label>
    <input type="radio" id="rating5" name="rating" value="5" onChange="ratingfun(this.value);"/><label class="half" for="rating5" title="2 1/2 stars"></label>
    <input type="radio" id="rating4" name="rating" value="4" onChange="ratingfun(this.value);"/><label for="rating4" title="2 stars"></label>
    <input type="radio" id="rating3" name="rating" value="3"onChange="ratingfun(this.value);" /><label class="half" for="rating3" title="1 1/2 stars"></label>
    <input type="radio" id="rating2" name="rating"  value="2" onChange="ratingfun(this.value);"/><label for="rating2" title="1 star"></label>
    <input type="radio" id="rating1" name="rating" value="1" onChange="ratingfun(this.value);" /><label class="half" for="rating1" title="1/2 star"></label>
    <input type="hidden" id="rating0" name="rating" value="0" onChange="ratingfun(this.value);"/>
</fieldset>
                                       </div>
                       <form id="rating_form">
                          {{csrf_field()}}
                         <input type="hidden" name="rating" id="rating_field">
                           <input type="hidden" name="listing_id" value="{{$listing->id}}" id="listing_id">
                         <input type="text" placeholder="Name *" value="<?php if((Auth::id())) echo Auth::User()->name; ?>" required="true" name="name" id="name" />
                         
                          <input type="text" placeholder="Website/Bussiness" value=""  name="website" id="website"/>
                          <textarea placeholder="Comment *" name="comment" required="true" id="comment"></textarea>
                          <button type="submit" id="submit">SUBMIT YOUR REVIEW</button>
                          <div class="alert alert-success" role="alert" style="display: none"></div>
                       </form>
                                    </div>
                                 </div>

                                 @endif
                               
                              </div>
                              <aside class="col-md-4 column">
                                  <div class="widget">
                                    <h3 class="mini-title">Popular Restaurants</h3>
                                    <div class="recentitem-widget">
                                       @for($i = 0; $i < 3; $i++)
                                       <div class="recentitem">
                                          <a href="{{route('listing-detail',$popular[$i]['id'])}}" title="">
                                       @if(!empty($popular[$i]['image']['name']) && file_exists('public/images/'.$popular[$i]['image']['name']))
                                      <img src="{{URL('public/images')}}/{{$popular[$i]['image']['name']}}" alt="" style="width: 30%;height: 60px" />
                                     @else   <img src="{{URL('public/images/default-small.jpg')}}" alt="" style="width: 64%;height: 60px"/>
                                     @endif</a>
                                          <h3><a href="{{route('listing-detail',$popular[$i]['id'])}}" title="">{{$popular[$i]['title']}}</a></h3>
                                          <p><i class="fa fa-map-marker listloc" aria-hidden="true"></i>{{$popular[$i]['address']}}</p>
                                       </div>
                                       @endfor
                                  
                                    </div>
                                    <!-- Recent Item Widget -->
                                 </div>
                                 <div class="widget">
                                    <h3 class="mini-title">Tags</h3>
                                    <div class="tags-widget bg-dtl-srl mCustomScrollbar">
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
  <div class="modal-dialog modal-lg">

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
var address = "{{$listing->address}}";
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
//scroll to all reviews
$("#count").on('click',function() {
    $('.all_reviews')[0].scrollIntoView({ behavior: "smooth",
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
                   
                      swal({
                              title: "Review has been added successfully",
                              icon: "success",
                              icon: "success",
                              button: "OK",
                              })
                              .then(function(){
                                    $('.review_button_class').remove();
                                    $('#here').remove();
                                    $('#no_review').remove();
                                    $('#review_data').append(results.result);
                                    //  $('#rating_form')[0].reset();
                                    if(results.count==1) $('#count').html('(1) Review');
                                    if(results.count>1)  $('#count').html('('+results.count+')'+ ' Reviews');
                                   
                                     refreshrate(results.average, results.indirate);
                                    // $('#average_rating').html(results.average);
                                    $('#stars li').parent().children('li.star').removeClass('selected');
                                    $('.'+results.random)[0].scrollIntoView({behavior:"smooth",block:"start"});
                              }); 

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
                   if(status.succ==1){
                      if($('#rating_field').val()){
                     var rating=$('#rating_field').val();
                    var listing_id=$('#listing_id').val();
                    var name=$('#name').val();
                    var email=$('#email').val();
                    var website=$('#website').val();
                    var comment=$('#comment').val();
                 $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:"{{route('rating')}}",
                data:{rating:rating,listing_id:listing_id,name:name,email:email,website:website,comment:comment},     
                success:function(data)
                   { var results=$.parseJSON(data);                                    
                    if(results.result==3){
                     swal({
                              title: "You can not review your own listings",
                              icon: "warning",
                              dangerMode: true,
                              })
                              .then(function(){window.location = "{{url()->current()}}";});     
                    }
                        else if(results.result==101){
                     swal({
                              title: "You have already reviewed the listing",
                              icon: "warning",
                              dangerMode: true,
                              })
                              .then(function(){window.location = "{{url()->current()}}";});     
                    }
                           else if(results.result==2){
                     swal({
                              title: "Sorry, An error was occurred",
                              icon: "warning",
                              dangerMode: true,
                              })
                              .then(function(){window.location = "{{url()->current()}}";});     
                    }
                    else{
                              $('.review_button_class').remove();
                              $('#here').remove();
                              swal({
                              title: "Review has been added successfully",
                              icon: "success",
                              icon: "success",
                              button: "OK",
                              })
                              .then(function(){window.location = "{{url()->current()}}";}); 
                    }            
                   }
           });
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
                         if(status.error){
                         $('#login_fail').css('display','block').html(status.error).fadeOut(7000);
                   }
                   }
           });
       } 
       
   });
});




 </script>
 <script>
     function ratingfun(value){
          
     var x = value;
    if(value==1) x=0.5;
     else if(value==2)x=1;
      else if(value==3)x=1.5;
      else if(value==4)x=2;
        else if(value==5)x=2.5;
         else if(value==6)x=3;
          else if(value==7)x=3.5;
          else if(value==8)x=4;
            else if(value==9)x=4.5
             else if(value==10)x=5;
            $('#rating_field').val(x);
             
    
}

function refreshrate(val, indirate){
    
      $("#rateYoyo").rateYo({
  rating: indirate ,
    readOnly: true
  });
   
$("#rateYo").rateYo("option", "rating", val); //returns a jQuery Element
}

$(function () {
   
   
   <?php 
   if(!$last_average)$last_average=0;
   ?>
  $("#rateYo").rateYo({
  rating: {{$last_average}},
    readOnly: true
  });
  var normalFill = $("#rateYo").rateYo("option", "rating"); //returns 50
  var x=4;
}

);

// Getter
var normalFill = $("#rateYo").rateYo("option", "rating"); //returns 50

 
//Setter 
$("#rateYo").rateYo("option", "rating", 5); //returns a jQuery Element


 </script>
@endsection('script')