@extends('Users.master')
@section('body')
@if(!empty($privacy_policy))
      <section class="bred-crumb-sec" 
   <?php 
if($privacy_policy['images']['banner'] && file_exists('public/page_images'.'/'.$privacy_policy['images']['banner']))
{
         echo'style="background-image: url('.URL('public/page_images').'/'.$privacy_policy['images']['banner'].')"';
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
                        <h2>Privacy Policy</h2>
                        <ul class="breadcrumbs">
                           <li><a href="{{route('/')}}" title="">Home</a></li>
                           <li>Privacy Policy</li>
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
                    <div class="p_policy">
                        <!--<h3 class="mini-title">Privacy Policy for MrSabi</h3>-->
                        @if(!empty($privacy_policy))
                        <h3 class="mini-title">{!!$privacy_policy['content']['title']!!}</h3>
                      {!!$privacy_policy['link']['our_privacy_policies']!!}
                      @endif

                  </div>
				  </div>
               </div>
            </div>
         </div>
      </section>

@endsection('body')