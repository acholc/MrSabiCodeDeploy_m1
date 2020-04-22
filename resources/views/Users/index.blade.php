<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="keywords" content="">
<title>Mr Sabi</title>

<!-- Styles -->
<link rel="stylesheet" href="{{URL('UserAssets/css/bootstrap.min.css')}}" type="text/css" /><!-- Bootstrap -->
<link rel="stylesheet" href="{{URL('UserAssets/css/line-awesome.min.css')}}" type="text/css" /><!-- Icons -->
<link rel="stylesheet" href="{{URL('UserAssets/css/style.css')}}" type="text/css" /><!-- Style -->
<link rel="stylesheet" href="{{URL('UserAssets/css/select2.min.css')}}" type="text/css" />	
<link rel="stylesheet" href="{{URL('UserAssets/css/responsive.css')}}" type="text/css" /><!-- Responsive -->	
<link rel="stylesheet" href="{{URL('UserAssets/css/colors/colors.css')}}" type="text/css" /><!-- color -->
 <link rel="shortcut icon" type="image/png" href="{{URL('UserAssets/images/favicon.png')}}"/>
<link rel="stylesheet" href="{{URL('UserAssets/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

 <link rel="stylesheet" type="text/css" href="{{URL('UserAssets/css/flaticon.css')}}"> 

 <script type="text/javascript" src="{{URL('UserAssets/js/jquery-2.1.1.js')}}"></script>
 <script src="{{URL('UserAssets/rateyo/src/jquery.rateyo.js')}}"></script>
</head>
<body>
   

<div class="page-loading">
	<div class="loadery"></div>
</div>
<div class="mrsabi-layout">

	<div class="responive-header resnsve-hed-mb">
		<div class="logo" style="display:none;"><a href="{{route('/')}}" title=""><img src="{{URL('UserAssets/images/white-mr-sabi.png')}}" alt="" /></a></div>
		<span class="open-responsive-btn"><i class="la la-bars"></i><i class="la la-close"></i></span>
		<div class="resp-btn-sec flt-lft-mb">
			
				<div class="btns-extra-top rightmr-20">
					<a href="{{route('search-listings')}}" title="" class="add-listing-btn left">Write a Review</a>				
					<a href="{{route('add-listing')}}" title="" class="add-listing-btn right">Add Your Business</a>
                     @if(Auth::check())
                  <a href="{{route('user_logout')}}" title="" class="add-listing-btn left">Logout</a>
                  @else
                  <a href="{{route('SignIn')}}" title="" class="add-listing-btn left">Login</a>
                  @endif
				</div>
		</div>
		<div class="responisve-menu">
			<span class="close-reposive"><i class="la la-close"></i></span>
			<div class="logo"><a href="{{route('/')}}" title=""><img src="" alt="" /></a></div>
			<ul>

						<li>
							<a href="{{route('categories')}}" title="">Browse by Category</a>
						</li>
						<li>
							<a href="#" title="">download mobile</a>
						</li>
						
					 @if(Auth::User())
              <li class="menu-item-has-children welcome_user">
               <a href="{{route('edit-profile')}}" title="">My Account</a>
               <ul>
                  <li class="user-dtls"> 
                     <img src="{{URL('public/profile_pictures')}}/{{Auth::User()->profile_image}}" class="user-ia">
                     <span>{{ucwords(Auth::User()->name)}}</span>
                  </li>
                  <li><a href="{{route('edit-profile')}}" title=""><i class="fa fa-user"></i> &nbsp; Profile</a></li>
                  <li><a href="{{route('all-listings')}}" title=""><i class="fa fa-th-list"></i> &nbsp; My Listings</a></li>
                   <li><a href="{{route('favourite_listings')}}" title=""><i class="la la-heart orng"></i> &nbsp; Favourite Listings</a></li>
                  <li><a href="{{route('user_logout')}}" title=""><i class="fa fa-sign-out"></i> &nbsp; Logout</a></li>
               </ul>
            </li>
            
            @endif
						 <li><a href="{{route('blogs')}}" title="">Blogs and Insights</a></li>
                        <li><a href="{{route('deals')}}" title="">Deals</a></li>
                        <li><a href="{{route('AboutUs')}}" title="">About Us</a></li>
                        <li><a href="{{route('contact')}}" title="">Contact Us</a></li>
                        <li><a href="{{route('categories')}}" title="">Categories</a></li>
                        <li><a href="{{route('terms')}}" title="">Terms of Service</a></li>
                        <li><a href="{{route('privacy-policy')}}" title="">Privacy Policy</a>
                </li>
			</ul>
		</div>
	</div><!-- Responsive-header -->
	
	<header class="on-top with-transparent">
		<div class="container">
			<a href="{{route('search-listings')}}" title="" class="add-listing-btn left hoverhead">Write a Review</a>
			<a href="{{route('deals')}}" title="" class="add-listing-btn left hoverhead view_deals">View Deals</a>
			<div class="logo"><!--a href="" title=""><img src="{{URL('UserAssets/images/logo-white.png')}}" alt="" /></a--></div>
			<div class="menu-sec">
				<div class="btns-extra-top">
					<a href="{{route('add-listing')}}" title="" class="add-listing-btn right">Add Your Business</a>
					<!--a href="" title="" class="add-listing-btn" style="margin-right: 15px;
    padding: 13px 20px;
    text-transform: capitalize;
    background: rgba(255, 152, 0, 1);">Write a Review</a-->
				</div>
				<nav class="header-menu">
					<ul>
						
						<li>
							<a href="{{route('categories')}}" title="">Browse by Category</a>
						</li>
						<li>
							<a href="#" title="">download mobile</a>
						</li>
						
			   @if(Auth::User())
              <li class="menu-item-has-children welcome_user">
               <a href="{{route('edit-profile')}}" title="">My Account</a>
               <ul>
                  <li class="user-dtls"> 
                     <img src="{{URL('public/profile_pictures')}}/{{Auth::User()->profile_image}}" class="user-ia">
                     <span>{{ucwords(Auth::User()->name)}}</span>
                  </li>
                  <li><a href="{{route('edit-profile')}}" title=""><i class="fa fa-user"></i> &nbsp; Profile</a></li>
                  <li><a href="{{route('all-listings')}}" title=""><i class="fa fa-th-list"></i> &nbsp; My Listings</a></li>
                   <li><a href="{{route('favourite_listings')}}" title=""><i class="la la-heart orng"></i> &nbsp; Favourite Listings</a></li>
                  <li><a href="{{route('user_logout')}}" title=""><i class="fa fa-sign-out"></i> &nbsp; Logout</a></li>
               </ul>
            </li>
            @else
               <li>
                  <a href="{{route('SignIn')}}" title="">Login</a>
               </li>
            @endif
                   
					</ul>
				</nav>
			</div>
		</div>
	</header>

	<section>
		<div class="block no-padding">
			<div class="row">
				<div class="col-md-12">
					<div class="main-featured-sec no-layer">
						<ul class="featured-bg-slide">
							@if(!empty($slide_show) && file_exists('public/page_images/'.$slide_show[0]['image_name']))
							@foreach($slide_show as $key)
							<li><img src="{{URL('public/page_images')}}/{{$key['image_name']}}" alt="" /></li>
							@endforeach
							@else<li><img src="{{URL('UserAssets/images/slider/slide.jpg')}}" alt="" /></li>
							@endif							
						</ul>
						<div class="mian-featured-area">
							<div class="main-featured-text">
								<img src="{{URL('UserAssets/images/white-mr-sabi.png')}}" width="300">
								<!--span>Get In Touch</span-->
							</div>
							<div class="directory-searcher extra-margin indxserchsec">
								<form action="{{route('search-listings')}}" method="post" id="search_listings_index">
									{{csrf_field()}}
 
									<div class="field mb-width pstin-rltve select_box">
								    <select data-placeholder="All Locations" class="chosen-select" tabindex="2" name="location" id="location_id">
								        <option value="">Location</option>
                                        @if(!empty($listings))
										@foreach($listings as $key)
										<?php $loca[]=$key->address; ?>
										@endforeach
										<?php $location=array_unique($loca);?>
										
										@foreach($location as $key)
							            
							            <option value="{{$key}}">{{$key}}</option>
							            @endforeach
							            @endif
							

								        </select>
									</div>
									<div class="field search  mb-width"><i class="fa fa-search" aria-hidden="true"></i><input type="text" placeholder="Search here....." name="keywords" id="keywords_id"></div>
									<div class="field serchbtn">
										<button type="submit" id="search_button">SEARCH</button>
									</div>
								
							       
								</form>
								<div style="display:none" class="search_error_msg" id="keyword_error">
									    Select location or type keyword
									</div>
							</div>
							
							<a class="arrow-down floating" href="#scroll-here" title=""><i class="la la-angle-down"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="scroll-here">
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="heading">
							<h2>{{$heads->h1}}</h2>
							<center>
							    <span class="seprator"></span>
							</center>
							<span class="font-poppins">{{$heads->sb1}}</span>
						</div>
					</div>
					<div class="do-tonight-sec">
						<div class="row">
							<?php $i=0;?>
							@foreach($featured as $key)
							@if($i==0)<div class="col-md-3 col-sm-4 mobile-w-50">
						    @elseif($i==1)<div class="col-md-6 col-sm-4 mobile-w-50">
						    @elseif($i==2)<div class="col-md-3 col-sm-4 mobile-w-50">
						    @elseif($i==3)<div class="col-md-6 col-sm-4 mobile-w-50">	
						    @elseif($i==4)<div class="col-md-6 col-sm-4 mobile-w-50">		
						    @endif	
								<div class="dt-box">
									<a href="{{route('listing',$key['id'])}}" title="">
										<img src="{{URL('public/category/')}}/{{$key['image']}}" alt="" />
										<span>{{$key['category']}}</span>
									</a>
								</div>
							</div>
							<?php $i++; ?>
							@endforeach
					
						</div>
						@if(count($featured)>4)
							<div class="col-md-12 col-sm-12 text-center">
							<a class="view-btn" href="{{route('categories')}}">View All</a>
							</div>
					   @endif
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block gray busns-list-sec">
			<div class="row">
				<div class="col-md-12">
					<div class="heading">
						<h2>{{$heads->h2}}</h2>

							<center>
							    <span class="seprator"></span>
							</center>
						<span class="font-poppins">{{$heads->sb2}}</span>
					</div>
					@if(!empty($listings))
					<div class="listing-carousel">
						<div class="row" id="listing-carousel">
												@foreach($listings as $key)
							<div class="col-md-3">
								<div class="listing-box list-busns-sec">
									<div class="listing-box-thumb">
									<span class="price-list">{{$key['cat']}}</span>
															  @if(!empty($key->image[0]['name']) && file_exists('public/images/'.$key->image[0]['name']))<img src="{{URL('public/images/')}}/{{$key->image[0]['name']}}" alt="" />
			@else <img src="{{URL('public/images/default-small.jpg')}}" alt="" />
			@endif	
										<div class="listing-box-title">
											
											<span class="indx-loctn-clr"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$key->address}}</span>
										
										<div class="rated-list rate-mb-0 rtd-color" >
										      <div id="{{$key->id}}"></div>
                                             <script> 
                                             $(document).ready(
                                                 function(){
                                                changerate({{$key->id}},{{$key->overall_rating}});
                                                 }
                                                 
                                                 );
                                          </script>
											          <!--@if($key->overall_rating>4.5)                                    -->
                     <!--                              <b class="la la-star orng"></b>-->
                     <!--                              <b class="la la-star orng"></b>-->
                     <!--                              <b class="la la-star orng"></b>-->
                     <!--                              <b class="la la-star orng"></b>-->
                     <!--                              <b class="la la-star orng"></b>-->
                     <!--                              @elseif($key->overall_rating>3.5)-->
                     <!--                              <b class="la la-star orng"></b>-->
                     <!--                              <b class="la la-star orng"></b>-->
                     <!--                              <b class="la la-star orng"></b>-->
                     <!--                              <b class="la la-star orng"></b>-->
                     <!--                              <b class="la la-star-o"></b>-->
                     <!--                              @elseif($key->overall_rating>2.5)-->
                     <!--                              <b class="la la-star orng"></b>-->
                     <!--                              <b class="la la-star orng"></b>-->
                     <!--                              <b class="la la-star orng"></b>-->
                     <!--                              <b class="la la-star-o"></b>-->
                     <!--                              <b class="la la-star-o"></b>-->
                     <!--                              @elseif($key->overall_rating>1.5)-->
                     <!--                              <b class="la la-star orng"></b>-->
                     <!--                              <b class="la la-star orng"></b>-->
                     <!--                              <b class="la la-star-o"></b>-->
                     <!--                              <b class="la la-star-o"></b>-->
                     <!--                              <b class="la la-star-o"></b>-->
                     <!--                              @elseif($key->overall_rating>0)-->
                     <!--                              <b class="la la-star orng"></b>-->
                     <!--                              <b class="la la-star-o"></b>-->
                     <!--                              <b class="la la-star-o"></b>-->
                     <!--                              <b class="la la-star-o"></b>-->
                     <!--                              <b class="la la-star-o"></b>-->
                     <!--                              @elseif($key->overall_rating==0)-->
                     <!--                              <b class="la la-star-o"></b>-->
                     <!--                              <b class="la la-star-o"></b>-->
                     <!--                              <b class="la la-star-o"></b>-->
                     <!--                              <b class="la la-star-o"></b>-->
                     <!--                              <b class="la la-star-o"></b>-->
                     <!--                           @endif  -->
											<span>
                                            @if($key->total_reviews==0) No Review
                                            @elseif($key->total_reviews==1) (1) Review
                                            @elseif($key->total_reviews>1)  ({{$key->total_reviews }})  Reviews
                                            @endif
                                           </span>
										</div>
										</div>
									</div>
									<div class="listing-rate-share">
	                                   
										<a href="{{route('listing-detail',$key->id)}}" data-toggle="tooltip" data-placement="top" title="{{$key['cat']}}">
										     @if(isset($key['cat_icon']))
										    <i class="{{$key['cat_icon']}}">
										      @else  <i class="flaticon-shop">
										          @endif
										    </i></a>
										<h3>{{$key->title}}</h3>
										<p>{{$key->description}}</p>
										<a href="{{route('listing-detail',$key->id)}}" class="see-more">See Details <i class="fa fa-angle-right" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
							@endforeach
						

						</div>
					</div>
					@else <h2 class="text-center">No listings yet</h2>
					@endif
				</div>
			</div>
		</div>
	</section>
<section class="indx-abut-sec"
   <?php 
if(!empty($who_we_are)){
if($who_we_are['images']['bottom_img'] && file_exists('public/page_images'.'/'.$who_we_are['images']['bottom_img']))
{
         echo'style="background-image: url('.URL('public/page_images').'/'.$who_we_are['images']['bottom_img'].')"';
}
else{
   echo'style="background-image: url('.URL('public/page_images/brdcrmbbg.jpg').')"';
     }}
     else{
   echo'style="background-image: url('.URL('public/page_images/brdcrmbbg.jpg').')"';
     }

    ?>
    >
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7 col-sm-9 col-lg-offset-5 col-md-offset-5 col-sm-offset-3">
			     <div class="indx-abut-in">
				 <h3>Who We Are</h3>
				 <h1>Some Facts About Us</h1>
				 <p>{!!$who_we_are['content']['bottom_desc']!!}</p>
				 <a href="{{route('AboutUs')}}">View All</a>
				 </div>
			</div>
		</div>
	</div>
</section>		
<section>
		<div class="block  added-busns-sec">
			<div class="row">
				<div class="col-md-12">
					<div class="heading">
						<h2>{{$heads->h3}}</h2>
							<center>
							    <span class="seprator"></span>
							</center>
						<span class="font-poppins">{{$heads->sb3}}</span>
					</div>
					<div class="listing-carousel">
						<div class="row" id="listing-carousel11">
							@foreach($recent_bussiness as $key)
							<div Class="col-md-3">
								<div class="listing-box list-busns-sec">
									<div class="listing-box-thumb">
									
										<img src="{{URL('public/category')}}/{{$key->image}}" alt="" />
										<div class="listing-box-title">
											
											<p>{{$key->category}}<br><a class="bsn-hvr" href="javascript:void(0)">{{$key->total}} listings</a></p>
											<a class="recrent-btn" href="{{route('listing',$key->id)}}
												">Browse</a>
										</div>
									</div>
								</div>
							</div>
							@endforeach
				

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- Recent Blog Posts -->
<section class="fullwidth gray border-top blog-index-sec">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-45">
				{{$heads->h4}}
				</h3>
					<center>
							    <span class="seprator"></span>
							</center>
				<p class="headng-pragrph font-poppins">	{{$heads->sb4}}</p>
			</div>
		</div>

		<div class="row">
		    @foreach($blog_3 as $key)
			<!-- Blog Post Item -->
			<div class="col-md-4 col-sm-6 mobile-w-50">
				<a href="{{route('blog-details',$key['id'])}}" class="blog-compact-item-container">
					<div class="blog-compact-item">
					    @if(isset($key['image']) && file_exists('public/blog_images/'.$key['image']))
					         	<img src="{{URL('public/blog_images')}}/{{$key['image']}}" alt="">
						@else 	<img src="{{URL('public/deal_images/default-small.jpg')}}" alt="">
						@endif
						<span class="blog-item-tag">@if(!empty($key['all_categories'])){{$key['all_categories'][0]['category']}} @endif</span>
						<div class="blog-compact-item-content">
							<ul class="blog-post-tags">
								<li>{{substr_replace($key['created_at'],"",-8)}}</li>
							</ul>
							<h3>{{$key['title']}}</h3>
							<p>{!!$key['description']!!}</p>
						</div>
					</div>
				</a>
			</div>
			<!-- Blog post Item / End -->
			@endforeach

		



			<div class="col-md-12 col-sm-12 centered-content">
				<a href="{{route('blogs')}}" class="button border margin-top-10">View All</a>
			</div>

		</div>

	</div>
</section>
<!-- Recent Blog Posts / End -->
<section class="indx-getapp-sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-sm-6">
				<div class="indx-getapp-img">
				<img src="{{URL('UserAssets/images/mobile.png')}}">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6">
				<div class="indx-getapp-list">
				<h1>Looking For The Best Service Provider? <b>Get The App!</b></h1>
				<ul>
				<li><i class="fa fa-check" aria-hidden="true"></i> Find nearby listings</li>
				<li><i class="fa fa-check" aria-hidden="true"></i> Easy service enquiry</li>
				<li><i class="fa fa-check" aria-hidden="true"></i> Listing reviews and ratings</li>
				<li><i class="fa fa-check" aria-hidden="true"></i> Manage your listing, enquiry and reviews</li>
				</ul>
				<p>We'll send you a link, open it on your phone to downloadthe app</p>
				<img class="qrcose-img" src="{{URL('UserAssets/images/QR-Code.jpg')}}">
				<a href=""><img src="{{URL('UserAssets/images/android.png')}}"></a>
				<a href=""><img src="{{URL('UserAssets/images/apple.png')}}"></a>
				
				</div>			
			</div>			
		</div>
	</div>
</section>
                     <?php
                       $Address_cont = App\Pages::where('id','29')->get()->toArray(); 
                       if(!empty($Address_cont))  $Address_contact = unserialize($Address_cont[0]['value']);
                       else $Address_contact=array();             
                      
                     ?>
                    
<footer>
		<div class="block remove-bottom gray color-dark footer-topmr">
			<div class="container">
				<div class="row">
					<div class="col-md-4 column">
						<div class="widget">
							<h3 class="footer-title footerlogo"><img src="{{URL('UserAssets/images/JUSS-MR-SABI.png')}}"></h3>
							<div class="about-widget mb-footer-cntr">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscingelit. Nulla ultrices nisi vitae laoreet dapibus. Etiampulvinar non justo at tincidunt. Cras turpis erat, ornare eget sem ut, tempus scelerisque lorem.</p>
								    <ul>
								    	@if(!empty($Address_contact))
                                 <li><a href="http://{!!$Address_contact['link']['twitter']!!}" data-toggle="tooltip" title="Twitter" target="_blank"><i class="la la-twitter"></i></a></li>
                                 <li><a href="http://{!!$Address_contact['link']['insta']!!}"  data-toggle="tooltip" title="Instagram" target="_blank"><i class="la la-instagram"></i></a></li>
                                 <li><a href="http://{!!$Address_contact['link']['pinterest']!!}"  data-toggle="tooltip" title="Pinterest" target="_blank"><i class="la la-pinterest"></i></a></li>
                                 <li><a href="http://{!!$Address_contact['link']['googl']!!}"  data-toggle="tooltip" title="Google" target="_blank"><i class="la la-google-plus"></i></a></li>
                                 <li><a href="http://{!!$Address_contact['link']['tumbler']!!}" data-toggle="tooltip" title="Tumbler" target="_blank"><i class="la la-tumblr "></i></a></li>
                                 @endif
                              </ul>

							</div>
						</div><!-- Widget -->
					</div>
					<div class="col-md-4 column  footer-none">
						<div class="widget">
							<h3 class="footer-title">OUR USEFUL LINKS</h3>
							<div class="link-widget">
					    <ul>
                        <li><a href="{{route('add-listing')}}" title="">Add Your Business</a></li>
                        <li><a href="{{route('blogs')}}" title="">Blogs and Insights</a></li>
                        <li><a href="{{route('deals')}}" title="">Deals</a></li>
                        <li><a href="{{route('AboutUs')}}" title="">About Us</a></li>
                        <li><a href="{{route('contact')}}" title="">Contact Us</a></li>
                        @if(!Auth::check())
                        <li><a href="{{route('SignIn')}}" title="">Login</a></li>
                        <li><a href="{{route('User_register')}}" title="">Register</a></li>
                        @endif
                        <li><a href="{{route('categories')}}" title="">Categories</a></li>
                        <li><a href="{{route('search-listings')}}" title="">Write a Review</a></li>
                        <li><a href="{{route('terms')}}" title="">Terms of Service</a></li>
                        <li><a href="{{route('privacy-policy')}}" title="">Privacy Policy</a></li>
                        </ul>
							</div>
						</div><!-- Widget -->
					</div>
					
					<div class="col-md-4 column footer-none">
						<div class="widget">
							<h3 class="footer-title">CONTACT INFORMATION</h3>
							<div class="contact-widget">
							  <ul>
                                 <li>
                                 	@if(!empty($Address_contact))
                                    <i class="la la-map"></i>
                                    <span class="f2">Address</span>
                                    <span>{!!$Address_contact['link']['address']!!}</span>
                                 </li>
                                 <li>
                                    <i class="la la-mobile"></i>
                                    <span class="f2">Phone</span>
                                    <a href="tel:{!!$Address_contact['link']['phone']!!}"><span>{!!$Address_contact['link']['phone']!!}</span></a>
                                 </li>
                                 <li>
                                    <i class="la la-envelope"></i>
                                    <span class="f2">E-mail Address</span>
                                    <span><a href="mailto:{!!$Address_contact['link']['email']!!}"><span class="__cf_email__">{!!$Address_contact['link']['email']!!}</span></a></span>
                                 </li>
                                 @endif
                              </ul>
						</div><!-- Widget -->
					</div>
				</div>
			</div>
		</div>
			<div class="bottom-line footer-botm-sec">
				<span>Copyright © 2019. All Rights Reserved</span>
				<ul class="footer-botm-lnk">
					@if(!empty($Address_contact))
				<li>Download Now:</li>
				<li><a href="http://{!!$Address_contact['link']['android']!!}" target="_blank"><i class="fa fa-android" aria-hidden="true"></i></a></li>
				<li><a href="http://{!!$Address_contact['link']['apple']!!}" target="_blank"><i class="fa fa-apple" aria-hidden="true"></i></a></li>
				<li><a href="http://{!!$Address_contact['link']['window']!!}" target="_blank"><i class="fa fa-windows" aria-hidden="true"></i></a></li>
				@endif
				</ul>
			</div>
		
		<div id="topcontrol" title="Scroll Back to Top" style="position: fixed; bottom: 5px; right: 5px; opacity: 1; cursor: pointer;display: none"><i class="fa fa-caret-up"></i></div>
	</div>
	</footer>

<!-- Script -->
<script type="text/javascript" src="{{URL('UserAssets/js/modernizr.js')}}"></script><!-- Modernizer -->
<script type="text/javascript" src="{{URL('UserAssets/js/jquery-2.1.1.js')}}"></script><!-- Jquery -->
<script type="text/javascript" src="{{URL('UserAssets/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{URL('UserAssets/js/script.js')}}"></script><!-- Script -->
<script type="text/javascript" src="{{URL('UserAssets/js/bootstrap.min.js')}}"></script><!-- Bootstrap -->
<script type="text/javascript" src="{{URL('UserAssets/js/scrolltopcontrol.js')}}"></script><!-- ScrollTopControl -->
<script type="text/javascript" src="{{URL('UserAssets/js/slick.min.js')}}"></script><!-- Slick -->
<script type="text/javascript" src="{{URL('UserAssets/js/scrolly.js')}}"></script><!-- Slick -->
<script type="text/javascript" src="{{URL('UserAssets/js/sumoselect.js')}}"></script><!-- Nice Select -->
<!-- <script type="text/javascript" src="js/choosen.min.js"></script> --><!-- Nice Select -->
<script type="text/javascript" src="{{URL('UserAssets/js/waypoints.js')}}"></script><!-- Nice Select -->
  <script type="text/javascript" src="{{URL('UserAssets/js/jquery.validate.min.js')}}"></script><!-- Form -->

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
///scroll top
$(window).scroll(function(){

if($(this).scrollTop()){
$('#topcontrol').fadeIn();
}
else{
$('#topcontrol').fadeOut();
}
});

$('#topcontrol').click(function(){
$('html, body').animate({scrollTop:0},1000);
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
$(document).on('click','#search_button',function(){
    var location = $.trim($('#location_id').val());
     var keyword = $.trim($('#keywords_id').val());
    var x =0;
    if(location !='' )
    {
       x=1
    }
     if(keyword !='' )
    {
       x=1
    }
    if (x === 0 ) {
         $('#keyword_error').css('display','block').fadeOut(5000);
         return false;
    }
    
});

</script>
    <script>
    
    function changerate(id,rate){
        $(document).ready(function () {
           
               $("#"+id).rateYo({
               rating: rate,
               readOnly: true
                               });
                           });
                 }

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
</body>
</html>