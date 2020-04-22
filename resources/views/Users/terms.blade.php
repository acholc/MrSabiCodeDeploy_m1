@extends('Users.master')
@section('body')
@if(!empty($term_cond))
      <section class="bred-crumb-sec" 
   <?php 
if($term_cond['images']['banner'] && file_exists('public/page_images'.'/'.$term_cond['images']['banner']))
{
         echo'style="background-image: url('.URL('public/page_images').'/'.$term_cond['images']['banner'].')"';
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
                         <h2>Terms and Conditions</h2>
                        <ul class="breadcrumbs">
                           <li><a href="#" title="">Home</a></li>
                           <li>Terms and Conditions</li>
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
                  <div class="col-md-12 column">
                     <div class="terms-sec">
                     @if(!empty($term_cond))
                        <h3 class="mini-title">{!!$term_cond['content']['title']!!}</h3>
                        @endif
                        <div class="terms trms-pra-w-100">
                           <h4>Welcome to MrSabi</h4>
                           @if(!empty($term_cond))
                          {!!$term_cond['link']['welcome_to_mrsabi']!!}
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection('body')