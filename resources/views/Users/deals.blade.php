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
     <section class="bred-crumb-sec" style="background-image: url('{{URL('public/page_images/brdcrmbbg.jpg')}}');">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Best Deals</h2>
                        <ul class="breadcrumbs">
                           <li><a href="{{route('/')}}" title="">Home</a></li>
                           <li>Best Deals</li>
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
                  <div class="col-md-9 column">
                     <h3 class="mini-title" id="title">Best Deals</h3>
                     <div class="filter-bar">
                        <span>11 Results Found</span>
                        <div class="filter-dropdowns">
                           <select data-placeholder="Sort By" class="chosen-select" tabindex="2">
                              <option value="Sort By">Sort By</option>
                              <option value="Top Trending">Discount</option>
                              <option value="Price High">New Deals</option>
                              <option value="Price High">Hot Deals</option>
                              <option value="Price Low">Popular Deals</option>
                           </select>
                        </div>
                     </div>
                    <div class="grids-listings">
							<div class="row" id="data">
								<?php 
								  $tags=array();
								  $categories=array();								
								  $locations=array();
								?>

								@foreach($data as $key)
								<?php 
                                $tags[]=explode(',',$key['listing_data']['tags']);
                                $categories[$key['categories']['id']]=$key['categories']['category'];
                                $locations[]=$key['listing_data']['address'];
                              
                               
								?>
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="listing-box list-dels dl-lst-prc">
										<div class="listing-box-thumb">
											<span class="price-list">{{$key['discount']}}% OFF</span>
											  @if(!empty($key['image']) && file_exists('public/deal_images/'.$key['image']))
                                      <img src="{{URL('public/deal_images')}}/{{$key['image']}}" alt="" />
                                     @else   <img src="{{URL('public/images/default-small.jpg')}}" alt="" />
                                     @endif
											<div class="listing-box-title">
											    <span>{{$key['listing_data']['name']}}</span>
												<span>{{$key['listing_data']['address']}}</span>
											
											</div>
											<a href="#" class="hert-sv"><i class="la la-heart-o"></i></a>
									
											@if(in_array($key['id'],$maxid))<span class="badge-best">Hot 
											</span>
											@endif
										</div>
										<div class="listing-rate-share">
										    	<h3><a href="{{route('listing-detail',$key['listing_data']['id'])}}" title="">
													{{$key['listing_data']['title']}}
												</a></h3>
												<p>{{$key['description']}}</p>
											  <div class="rated-list">
											      <!--{{$key['overall_rating']}}-->
											            <div id="{{$key['id']}}"></div>
                                             <script> changerate({{$key['id']}},{{$key['overall_rating']}}); </script>
                                                <!--@if($key['overall_rating']>4.5)                                    -->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   @elseif($key['overall_rating']>3.5)-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   @elseif($key['overall_rating']>2.5)-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   @elseif($key['overall_rating']>1.5)-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   @elseif($key['overall_rating']>0)-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   @elseif($key['overall_rating']==0)-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--@endif  -->
                                          <span>
                                            @if($key['total_reviews']==0) No Review
                                            @elseif($key['total_reviews']==1) (1) Review
                                            @elseif($key['total_reviews']>1)  ({{$key['total_reviews'] }})  Reviews
                                            @endif
                                           </span>
                                       </div>
											<a href="" class="rad-mr"><i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
										<div class="price-str">
										    @if($key['price'] && $key['discount'])${{$key['price']-($key['price']*$key['discount']/100)}}
										     @endif
										     <strike> ${{$key['price']}}</strike> 
										     @if($key['coupon_code'])
										     <span class="rigt-cupn"><img src="{{URL('UserAssets/images/coupon.png')}}" alt="" /> {{$key['coupon_code']}}  </span> 
										     @endif
										   
										</div>
										</div>
									</div>
								</div>
								@endforeach					
							</div>
						</div>
                     <div class="pagination">
                      {{$paginate->links('Users.default')}}
                     </div>
                  </div>
                  <aside class="col-md-3 column">
                  	  <form id="filter_form">
                  	  	{{csrf_field()}}
                     <div class="widget">
                        <h3 class="mini-title">SEARCH</h3>
                         <div class="search_widget">
                           <div class="side-search-form">
                            
                                 <div class="row">
                                    <div class="col-md-12">
                                       <input type="text" class="input-style" placeholder="Keywords" name="keywords" />
                                    </div>
                                    <div class="col-md-12">
                                       <select data-placeholder="All Locations" class="chosen-select" tabindex="2" name="location">
                                       	 <option value="">All Locations</option>
                                         <?php $all_new_location=array();
                                               $all_cats=array();
                                               $all_unique_tags=array();
                                          foreach ($for_all_tags as $key) {
                                            $all_new_location[]=$key['address'];
                                            $all_cats[$key['categories']['id']]=$key['categories']['category'];
                                             $all_unique_tags[]=explode(',',$key['tags']);;
                                          }

                                          ?>
                                       	@foreach( array_unique($all_new_location) as $key )

                                          <option value="{{$key}}">{{($key)}}</option>
                                          @endforeach
                                         
                                       </select>
                                    </div>
                                    <div class="col-md-12">
                                       <select data-placeholder="All Categories" class="chosen-select" tabindex="2" name="category">
                                          <option value="">All Categories</option>
                                          @foreach($all_cats as $key => $value)
                                          <option value="{{$key}}">{{$value}}</option>
                                          @endforeach	
                                        
                                       </select>
                                    </div>
                                 </div>
                           </div>
                        </div>
                     </div>
                      <input type="submit" value="SEARCH" name="FILTER" class="filter-btn">
                     <div class="widget">
                     	   <?php       
                                      $i=1;                                                           
                                      if(!is_array($all_unique_tags)) {                                         
                                                             } 
                                      $result = array(); 
                                      foreach ($all_unique_tags as $key => $value) { 
                                        if (is_array($value)) { 
                                          $result = array_merge($result, array_flatten($value)); 
                                        } 
                                        else { 
                                          $result[$key] = $value; 
                                        } 
                                      }
                                    
                           ?>
                        <h3 class="mini-title">SEARCH BY TAG</h3>
                        <div class="tags_widget tag-srl-secs" id="boxscroll">
                           <div class="filter-by-tags">
                              <div class="row">
                                 @foreach(array_unique($result) as $key)
                                  @if(!empty($key)) 
                                  
                                 <div class="col-md-12">
                                    <p>
                                        <input class="styled-checkbox" id="styled-checkbox-{{$i}}" type="checkbox" value="{{$key}}" name="tags[]" <?php if(!isset($tags)){$tags='';} if($key==$tags){ echo 'checked="checked"'; }?>>
                                        <label for="styled-checkbox-{{$i}}">{{$key}}</label>
                                       <?php $i++?>
                                      
                                    </p>
                                 </div>
                                 @endif
                                   @endforeach 
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                     <input type="submit" value="SEARCH" name="FILTER" class="filter-btn">
                     </form>
                  </aside>
               </div>
            </div>
         </div>
      </section>
@endsection('body')
@section('script')
<script>
	    
$(function($) {
   $('#filter_form').validate({

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
                url:"{{route('search_deals')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                   { 
                 var result= $.parseJSON(data);
                 $('#data').html(result.data);
                 $('#count').html(result.count+' Results Found');
                 $('#title').html(result.search_for);
                 $('#title')[0].scrollIntoView({behavior:"smooth",block:"start"});
                 $('.pagination').css('display','none');
               
                   var length= result.ratearray.length;
                      var i;
                for (i = 0; i <= length; i++) {
                changerate(result.idarray[i], result.ratearray[i]);
                }
                 
                   }
           });
               
            }       
   });
});

$(".mCustomScrollbar").mCustomScrollbar({
  mouseWheelPixels: 700 //change this to a value, that fits your needs
})
</script>
@endsection('script')