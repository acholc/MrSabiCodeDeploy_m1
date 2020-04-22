@extends('Users.master')
@section('body')
@if(!empty($AboutUs))
      <section class="bred-crumb-sec" style='background-image: url("<?php 
  
   if($AboutUs['images']['banner'] && file_exists('public/page_images'.'/'.$AboutUs['images']['banner']))
   {
      echo URL('public/page_images/'.$AboutUs['images']['banner']);
   }
   else{
      echo URL('public/page_images/brdcrmbbg.jpg');
   }

?>")';>
@else  <section class="bred-crumb-sec" style='background-image: url("<?php  echo URL('public/page_images/brdcrmbbg.jpg'); ?>")';>
   @endif
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>About Us</h2>
                        <ul class="breadcrumbs">
                           <li><a href="#" title="">Home</a></li>
                          @if(!empty($AboutUs))
                           <li>{!!$AboutUs['content']['title']!!}</li>
                           @endif
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="about-section histr-our">
         <div class="container">
            <!-- Title Box -->
            <div class="title-box">
               <div class="row clearfix">
                  <div class="col-lg-5 col-md-5 col-sm-12">
                     <!-- Sec Title -->
                     <div class="sec-title abut-mb-t0">
                        <div class="inner-title">
                           <div class="title">Our History</div>
                             @if(!empty($AboutUs))
                           <h2>{!!$AboutUs['content']['top_left_title']!!}</h2>
                            @endif
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-7 col-md-7 col-sm-12">
                     <div class="bold-text abut-mb-t0"></div>
                      @if(!empty($AboutUs))
                     <div class="text">{!!$AboutUs['content']['top_right_desc']!!}</div>
                      @endif
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="bgcolor-abut">
         <div class="block">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="heading">
                          @if(!empty($AboutUs))
                        <h2>{!!$AboutUs['content']['middle_title']!!}</h2>
                         @endif
                        <center>
                           <span class="seprator"></span>
                        </center>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="services-sec">
                        <div class="row">
                           <div class="col-md-4 col-sm-6 mobile-w-50">
                              <div class="services style2 icon-color abut-srv-sec">
                                 @if(!empty($AboutUs))
                              @if($AboutUs['images']['midd_first_img'] && file_exists('public/page_images/'.$AboutUs['images']['midd_first_img']))
                              <img src="{{URL('public/page_images')}}/{!!$AboutUs['images']['midd_first_img']!!}">
                              @else
                              <img src="{{URL('public/page_images/default-small.jpg')}}">
                              @endif   
                           
                                  <i class="la la-paperclip"></i> 
                                
                                 <h3>{!!$AboutUs['content']['midd_first_sub_title']!!}</h3>
                                 <p>{!!$AboutUs['content']['midd_first_sub_desc']!!}</p>
                                
                              </div>
                           </div>
                           <div class="col-md-4 col-sm-6 mobile-w-50">
                              <div class="services style2 icon-color abut-srv-sec">                                
                              
                                  @if($AboutUs['images']['midd_secnd_img'] && file_exists('public/page_images/'.$AboutUs['images']['midd_secnd_img']))
                              <img src="{{URL('public/page_images')}}/{!!$AboutUs['images']['midd_secnd_img']!!}">
                              @else
                              <img src="{{URL('public/page_images/default-small.jpg')}}">
                              @endif 
                                <i class="la la-map-marker"></i>
                                 <h3>{!!$AboutUs['content']['midd_secnd_sub_title']!!}</h3>
                                 <p>{!!$AboutUs['content']['midd_secnd_sub_desc']!!}</p>
                              </div>
                           </div>
                           <div class="col-md-4 col-sm-6 mobile-w-50">
                               <div class="services style2 icon-color abut-srv-sec"> 
                                @if($AboutUs['images']['midd_third_img'] && file_exists('public/page_images/'.$AboutUs['images']['midd_third_img']))
                              <img src="{{URL('public/page_images')}}/{!!$AboutUs['images']['midd_third_img']!!}">
                              @else
                              <img class="la la-tencent-weibo" src="{{URL('public/page_images/default-small.jpg')}}">
                              @endif 
                              @endif                             
                                 <i class="la la-tencent-weibo"></i>
                                  @if(!empty($AboutUs))
                                 <h3>{!!$AboutUs['content']['midd_third_sub_title']!!}</h3>
                                 <p>{!!$AboutUs['content']['midd_third_sub_desc']!!}</p>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
@if(!empty($AboutUs))
      <section class="bred-crumb-sec indx-abut-sec" style='background-image: url("<?php 
  
   if($AboutUs['images']['bottom_img'] && file_exists('public/page_images'.'/'.$AboutUs['images']['bottom_img']))
   {
      echo URL('public/page_images/'.$AboutUs['images']['bottom_img']);
   }
   else{
      echo URL('public/page_images/brdcrmbbg.jpg');
   }

?>")';>
@else  <section class="bred-crumb-sec indx-abut-sec" style='background-image: url("<?php  echo URL('public/page_images/brdcrmbbg.jpg'); ?>")';>
   @endif

         <div class="container">
            <div class="row">
               <div class="col-lg-7 col-md-7 col-sm-9 col-lg-offset-5 col-md-offset-5 col-sm-offset-3">
                  <div class="indx-abut-in  abut-brd-sec" style="color:white">
                     <h3>Who We Are</h3>
                      @if(!empty($AboutUs))
                     <h1>{!!$AboutUs['content']['bottom_title']!!}</h1>
                     <p>{!!$AboutUs['content']['bottom_desc']!!}</p>
                     @endif
                     <!--a href="">View All</a-->
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection('body')