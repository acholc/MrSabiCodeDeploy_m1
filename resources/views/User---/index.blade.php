<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="keywords" content="">
<title>Mr Sabi</title>

<!-- Styles -->
<link rel="stylesheet" href="{{URL::asset('UserAsset/css/bootstrap.min.css')}}" type="text/css" /><!-- Bootstrap -->
<link rel="stylesheet" href="{{URL::asset('UserAsset/css/line-awesome.min.css')}}" type="text/css" /><!-- Icons -->

<link rel="stylesheet" href="{{URL::asset('UserAsset/css/style.css')}}" type="text/css" /><!-- Style -->
<link rel="stylesheet" href="{{URL::asset('UserAsset/css/select2.min.css')}}" type="text/css" />	
<link rel="stylesheet" href="{{URL::asset('UserAsset/css/responsive.css')}}" type="text/css" /><!-- Responsive -->	
<link rel="stylesheet" href="{{URL::asset('UserAsset/css/colors/colors.css')}}" type="text/css" /><!-- color -->

<link rel="stylesheet" href="{{URL::asset('UserAsset/css/font-awesome.min.css')}}">
<link rel="shortcut icon" type="image/png" href="{{URL::asset('UserAsset/images/favicon.png')}}"/>
 <link rel="stylesheet" type="text/css" href="{{URL::asset('UserAsset/css/flaticon.css')}}"> 
<style>

</style> 
</head>
<body>
<div class="page-loading">
	<div class="loadery"></div>
</div>
<div class="mrsabi-layout">

	<div class="responive-header resnsve-hed-mb">
		<div class="logo"><a href="{{route('/')}}" title=""><img src="{{URL('UserAsset/images/logo-white.png')}}" alt="" /></a></div>
		<span class="open-responsive-btn"><i class="la la-bars"></i><i class="la la-close"></i></span>
		<div class="resp-btn-sec flt-lft-mb">
			
				<div class="btns-extra-top rightmr-20">
					<a href="{{route('listing')}}" title="" class="add-listing-btn left">Write a Review</a>				
					<a href="{{route('add-listing')}}" title="" class="add-listing-btn right">Add Your Business</a>

				</div>
		</div>
		<div class="responisve-menu">
			<span class="close-reposive"><i class="la la-close"></i></span>
			<div class="logo"><a href="{{route('/')}}" title=""><img src="{{URL('UserAsset/images/logo-white.png')}}" alt="" /></a></div>
			<ul>

						<li>
							<a href="{{route('categories')}}" title="">Browse by Category</a>
						</li>
						<li>
							<a href="#" title="">download mobile</a>
						</li>
						
						<li>
							<a href="{{route('SignIn')}}" title="">Login</a>
						</li>
			</ul>
		</div>
	</div><!-- Responsive-header -->
	
	<header class="on-top with-transparent">
		<div class="container">
			<a href="{{route('add-listing')}}" title="" class="add-listing-btn left hoverhead">Write a Review</a>
			<div class="logo"><!--a href="" title=""><img src="images/logo-white.png" alt="" /></a--></div>
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
						<!-- <li> -->
							<!-- <a href="#" title="">Home</a> -->
						<!-- </li> -->
						<li>
							<a href="{{route('categories')}}" title="">Browse by Category</a>
						</li>
						<li>
							<a href="#" title="">download mobile</a>
						</li>

						 <?php                

              if(Auth::id())
              {
          
          echo'<li class="welcome_user">
               <img src='.URL("UserAsset/images/tutor-8.jpg").'>
               <a href="#" title="">Welcom , John</a>
               </li> 

                   <li>
                  <a href="'.route("user_logout").'" title="">Logout</a>
               </li>  
              ';
              }
              else
              {
         echo' <li>
               <a href="'.route("SignIn").'" title="">Login</a>
               </li>';
              }
            
               ?>

           
						
					
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
							<li><img src="{{URL('UserAsset/images/slider/slide.jpg')}}" alt="" /></li>
							<li><img src="{{URL('UserAsset/images/slider/slide2.jpg')}}" alt="" /></li>
							<li><img src="{{URL('UserAsset/images/slider/slide3.jpg')}}" alt="" /></li>
							<li><img src="{{URL('UserAsset/images/slider/slide.jpg')}}" alt="" /></li>
						</ul>
						<div class="mian-featured-area">
							<div class="main-featured-text">
								<h1>Mr <span class='org'>Sabi</span></h1>
								<span>Get In Touch</span>
							</div>
							<div class="directory-searcher extra-margin indxserchsec">
								<form>
 
									<div class="field mb-width pstin-rltve select_box">
										<select data-placeholder="All Locations" class="chosen-select" tabindex="2">
								            <option value="All Locations">Location</option>
								            <option value="United States">India</option>
								            <option value="United Kingdom">United Kingdom</option>
								            <option value="Afghanistan">United States</option>

								        </select>
									</div>
									<div class="field search  mb-width"><i class="fa fa-search" aria-hidden="true"></i><input type="text" placeholder="Search here....."></div>
									<div class="field serchbtn">
										<button type="submit">SEARCH</button>
									</div>
								</form>
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
							<h2>Our Top Categories</h2>
							<center>
							    <span class="seprator"></span>
							</center>
							<span class="font-poppins">Discover & connect with the great local businesses by MrSabi.</span>
						</div>
					</div>
					<div class="do-tonight-sec">
						<div class="row">
							<div class="col-md-3 col-sm-3">
								<div class="dt-box">
									<a href="{{route('listing')}}" title="">
										<img src="{{URL('UserAsset/images/resource/td1.jpg')}}" alt="" />
										<span>Hospitals</span>
									</a>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="dt-box">
									<a href="{{route('listing')}}" title="">
										<img src="{{URL('UserAsset/images/resource/td2.jpg')}}" alt="" />
										<span>Hotels</span>
									</a>
								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="dt-box">
									<a href="{{route('listing')}}" title="">
										<img src="{{URL('UserAsset/images/resource/td3.jpg')}}" alt="" />
										<span>Mechanics</span>
									</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6  col-sm-6">
								<div class="dt-box">
									<a href="{{route('listing')}}" title="">
										<img src="{{URL('UserAsset/images/resource/td41.jpg')}}" alt="" />
										<span>Restaurants</span>
									</a>
								</div>
							</div>
							<div class="col-md-6  col-sm-6">
								<div class="dt-box">
									<a href="{{route('listing')}}" title="">
										<img src="{{URL('UserAsset/images/resource/td4.jpg')}}" alt="" />
										<span>Bars</span>
									</a>
								</div>
							</div>
							<div class="col-md-12 col-sm-12 text-center">
							<a class="view-btn" href="{{route('categories')}}">View All</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block gray busns-list-sec">
			<div class="row">
				<div class="col-md-12">
					<div class="heading">
						<h2>Explore Our Business Listings</h2>
							<center>
							    <span class="seprator"></span>
							</center>
						<span class="font-poppins">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</span>
					</div>
					<div class="listing-carousel">
						<div class="row" id="listing-carousel">
							<div class="col-md-3">
								<div class="listing-box list-busns-sec">
									<div class="listing-box-thumb">
										<span class="price-list">SHOPPING MALLS</span>
										<img src="{{URL('UserAsset/images/img-6.jpg')}}" alt="" />
										<div class="listing-box-title">
											
											<span class="indx-loctn-clr"><i class="fa fa-map-marker" aria-hidden="true"></i> 123 Shopping Street St. California</span>
										
										<div class="rated-list rate-mb-0 rtd-color" >
											<b class="la la-star"></b>
											<b class="la la-star"></b>
											<b class="la la-star"></b>
											<b class="la la-star"></b>
											<b class="la la-star-o"></b>
											<span>(13 Reviews)</span>
										</div>
										</div>
									</div>
									<div class="listing-rate-share">
	
										<a href="{{route('listing-detail')}}" title=""><i class="flaticon-shop"></i></a>
										<h3>Shop In City</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="listing-box list-busns-sec">
									<div class="listing-box-thumb">
										<span class="price-list">Hotels</span>
										<img src="{{URL('UserAsset/images/img-7.jpg')}}" alt="" />
										<div class="listing-box-title">
											
											<span class="indx-loctn-clr"><i class="fa fa-map-marker" aria-hidden="true"></i> 111 Town Hotel Street, Alaska</span>
										
										<div class="rated-list rate-mb-0 rtd-color" >
											<b class="la la-star"></b>
											<b class="la la-star"></b>
											<b class="la la-star"></b>
											<b class="la la-star"></b>
											<b class="la la-star-o"></b>
											<span>(7 Reviews)</span>
										</div>
										</div>
									</div>
									<div class="listing-rate-share">
	
										<a href="{{route('listing-detail')}}" title=""><i class="flaticon-hotel"></i></a>
										<h3>Hotel JW Merriot</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="listing-box list-busns-sec">
									<div class="listing-box-thumb">
										<span class="price-list">Restaurants</span>
										<img src="{{URL('UserAsset/images/img-8.jpg')}}" alt="" />
										<div class="listing-box-title">
											
											<span class="indx-loctn-clr"><i class="fa fa-map-marker" aria-hidden="true"></i> 123 Kathal St. Tampa City</span>
										
										<div class="rated-list rate-mb-0 rtd-color" >
											<b class="la la-star"></b>
											<b class="la la-star"></b>
											<b class="la la-star"></b>
											<b class="la la-star"></b>
											<b class="la la-star-o"></b>
											<span>(7 Reviews)</span>
										</div>
										</div>
									</div>
									<div class="listing-rate-share">
	
										<a href="{{route('listing-detail')}}" title=""><i class="flaticon-cook"></i></a>
										<h3>The Green Restaurant</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="listing-box list-busns-sec">
									<div class="listing-box-thumb">
										<span class="price-list">SHOPPING MALLS</span>
										<img src="{{URL('UserAsset/images/img-6.jpg')}}" alt="" />
										<div class="listing-box-title">
											
											<span class="indx-loctn-clr"><i class="fa fa-map-marker" aria-hidden="true"></i> 123 Shopping Street St. California</span>
										
										<div class="rated-list rate-mb-0 rtd-color" >
											<b class="la la-star"></b>
											<b class="la la-star"></b>
											<b class="la la-star"></b>
											<b class="la la-star"></b>
											<b class="la la-star-o"></b>
											<span>(13 Reviews)</span>
										</div>
										</div>
									</div>
									<div class="listing-rate-share">
	
										<a href="{{route('listing-detail')}}" title=""><i class="flaticon-shop"></i></a>
										<h3>Shop In City</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="listing-box list-busns-sec">
									<div class="listing-box-thumb">
										<span class="price-list">Hotels</span>
										<img src="{{URL('UserAsset/images/img-7.jpg')}}" alt="" />
										<div class="listing-box-title">
											
											<span class="indx-loctn-clr"><i class="fa fa-map-marker" aria-hidden="true"></i> 111 Town Hotel Street, Alaska</span>
										
										<div class="rated-list rate-mb-0 rtd-color" >
											<b class="la la-star"></b>
											<b class="la la-star"></b>
											<b class="la la-star"></b>
											<b class="la la-star"></b>
											<b class="la la-star-o"></b>
											<span>(7 Reviews)</span>
										</div>
										</div>
									</div>
									<div class="listing-rate-share">
	
										<a href="{{route('listing-detail')}}" title=""><i class="flaticon-hotel"></i></a>
										<h3>Hotel JW Merriot</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<section class="indx-abut-sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7 col-sm-9 col-lg-offset-5 col-md-offset-5 col-sm-offset-3">
			     <div class="indx-abut-in">
				 <h3>Who We Are</h3>
				 <h1>Some Facts About Us</h1>
				 <h4>Lorem ipsum dolor  sit amet</h4>
				 <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur </p>
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
						<h2>Recently Added Businesses</h2>
							<center>
							    <span class="seprator"></span>
							</center>
						<span class="font-poppins">Browse the most desirable categories just for you</span>
					</div>
					<div class="listing-carousel">
						<div class="row" id="listing-carousel11">
							<div class="col-md-3">
								<div class="listing-box list-busns-sec">
									<div class="listing-box-thumb">
									
										<img src="{{URL('UserAsset/images/category-box-05.jpg')}}" alt="" />
										<div class="listing-box-title">
											
											<p>Bars<br><a class="bsn-hvr" href="javascript:void(0)">14 listings</a></p>
											<a class="recrent-btn" href="{{route('listing')}}">Browse</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="listing-box list-busns-sec">
									<div class="listing-box-thumb">
									
										<img src="{{URL('UserAsset/images/category-box-06.jpg')}}" alt="" />
										<div class="listing-box-title">
											
											<p>Restaurants<br><a class="bsn-hvr" href="javascript:void(0)">24 listings</a></p>
											<a class="recrent-btn" href="{{route('listing')}}">Browse</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="listing-box list-busns-sec">
									<div class="listing-box-thumb">
									
										<img src="{{URL('UserAsset/images/category-box-01.jpg')}}" alt="" />
										<div class="listing-box-title">
											
											<p>Hotels<br><a class="bsn-hvr" href="javascript:void(0)">18 listings</a></p>
											<a class="recrent-btn" href="{{route('listing')}}">Browse</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="listing-box list-busns-sec">
									<div class="listing-box-thumb">
									
										<img src="{{URL('UserAsset/images/resource/td1.jpg')}}" alt="" />
										<div class="listing-box-title">
											
											<p>Hospital<br><a class="bsn-hvr" href="javascript:void(0)">18 listings</a></p>
											<a class="recrent-btn" href="{{route('listing')}}">Browse</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="listing-box list-busns-sec">
									<div class="listing-box-thumb">
									
										<img src="{{URL('UserAsset/images/resource/td3.jpg')}}" alt="" />
										<div class="listing-box-title">
											
											<p>Mechanics<br><a class="bsn-hvr" href="javascript:void(0)">14 listings</a></p>
											<a class="recrent-btn" href="{{route('listing')}}">Browse</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="listing-box list-busns-sec">
									<div class="listing-box-thumb">
									
										<img src="{{URL('UserAsset/images/category-box-01.jpg')}}" alt="" />
										<div class="listing-box-title">
											
											<p>Hotels<br><a class="bsn-hvr" href="javascript:void(0)">18 listings</a></p>
											<a class="recrent-btn" href="{{route('listing')}}">Browse</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="listing-box list-busns-sec">
									<div class="listing-box-thumb">
									
										<img src="{{URL('UserAsset/images/resource/td1.jpg')}}" alt="" />
										<div class="listing-box-title">
											
											<p>Hospital<br><a class="bsn-hvr" href="javascript:void(0)">18 listings</a></p>
											<a class="recrent-btn" href="{{route('listing')}}">Browse</a>
										</div>
									</div>
								</div>
							</div>

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
					Blog And Insights
				</h3>
					<center>
							    <span class="seprator"></span>
							</center>
				<p class="headng-pragrph font-poppins">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium <br>doloremque laudantium, totam rem aperiam</p>
			</div>
		</div>

		<div class="row">
			<!-- Blog Post Item -->
			<div class="col-md-4 col-sm-6">
				<a href="{{route('blog-detail')}}" class="blog-compact-item-container">
					<div class="blog-compact-item">
						<img src="{{URL('UserAsset/images/blog-compact-post-01.jpg')}}" alt="">
						<span class="blog-item-tag">Hotels</span>
						<div class="blog-compact-item-content">
							<ul class="blog-post-tags">
								<li>22 August 2019</li>
							</ul>
							<h3>Lorem ipsum dolor sit</h3>
							<p>Sed sed tristique nibh iam porta volutpat finibus. Donec in aliquet urneget mattis lorem. Pellentesque pellentesque.</p>
						</div>
					</div>
				</a>
			</div>
			<!-- Blog post Item / End -->

			<!-- Blog Post Item -->
			<div class="col-md-4 col-sm-6">
				<a href="{{route('blog-detail')}}" class="blog-compact-item-container">
					<div class="blog-compact-item">
						<img src="{{URL('UserAsset/images/blog-compact-post-02.jpg')}}" alt="">
						<span class="blog-item-tag">Restaurants</span>
						<div class="blog-compact-item-content">
							<ul class="blog-post-tags">
								<li>18 August 2019</li>
							</ul>
							<h3>Sed ut perspiciatis unde</h3>
							<p>Sed sed tristique nibh iam porta volutpat finibus. Donec in aliquet urneget mattis lorem. Pellentesque pellentesque.</p>
						</div>
					</div>
				</a>
			</div>
			<!-- Blog post Item / End -->

			<!-- Blog Post Item -->
			<div class="col-md-4 col-sm-6">
				<a href="{{route('blog-detail')}}" class="blog-compact-item-container">
					<div class="blog-compact-item">
						<img src="{{URL('UserAsset/images/blog-compact-post-03.jpg')}}" alt="">
						<span class="blog-item-tag">Mechanics</span>
						<div class="blog-compact-item-content">
							<ul class="blog-post-tags">
								<li>10 August 2019</li>
							</ul>
							<h3>At vero eos et accusamus</h3>
							<p>Sed sed tristique nibh iam porta volutpat finibus. Donec in aliquet urneget mattis lorem. Pellentesque pellentesque.</p>
						</div>
					</div>
				</a>
			</div>
			<!-- Blog post Item / End -->

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
				<img src="{{URL('UserAsset/images/mobile.png')}}">
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
				<img class="qrcose-img" src="{{URL('UserAsset/images/QR-Code.jpg')}}">
				<a href=""><img src="{{URL('UserAsset/images/android.png')}}"></a>
				<a href=""><img src="{{URL('UserAsset/images/apple.png')}}"></a>
				
				</div>			
			</div>			
		</div>
	</div>
</section>
<footer>
		<div class="block remove-bottom gray color-dark footer-topmr">
			<div class="container">
				<div class="row">
					<div class="col-md-4 column">
						<div class="widget">
							<h3 class="footer-title footerlogo"><img src="{{URL('UserAsset/images/logo.png')}}"></h3>
							<div class="about-widget mb-footer-cntr">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscingelit. Nulla ultrices nisi vitae laoreet dapibus. Etiampulvinar non justo at tincidunt. Cras turpis erat, ornare eget sem ut, tempus scelerisque lorem.</p>
								<ul>
									<li><a href="#" title=""><i class="la la-twitter"></i></a></li>
									<li><a href="#" title=""><i class="la la-instagram"></i></a></li>
									<li><a href="#" title=""><i class="la la-pinterest"></i></a></li>
									<li><a href="#" title=""><i class="la la-google-plus"></i></a></li>
									<li><a href="#" title=""><i class="la la-tumblr "></i></a></li>
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
                                    <li><a href="{{route('AboutUs')}}" title="">About Us</a></li>
                                    <li><a href="{{route('contact')}}">Contact Us</a></li>
                                    @if(!Auth::id())
                                      <li><a href="{{route('SignIn')}}" title="">Login</a></li> 
                                      <li><a href="{{route('User_register')}}" title="">Register</a></li>
                                    @endif
                              
                                    
                                    <li><a href="{{route('categories')}}" title="">Categories</a></li>
                                    <li><a href="{{route('listing')}}" title="">Write a Review</a></li>
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
										<i class="la la-map"></i>
										<span class="f2">Address</span>
										<span>123 Demo Street, California USA CA 12345</span>
									</li>
									<li>
										<i class="la la-mobile"></i>
										<span class="f2">Cell Phone</span>
										<span>+0-111-222-3333, +1-123-456-7890</span>
									</li>
									<li>
										<i class="la la-envelope"></i>
										<span class="f2">E-mail Address</span>
										<span><a href="#"><span class="__cf_email__">demo@example.com ,</span></a> <a href="#"><span class="__cf_email__">example@gmail.com</span></a></span>
									</li>
								</ul>
							</div>
						</div><!-- Widget -->
					</div>
				</div>
			</div>
			<div class="bottom-line footer-botm-sec">
				<span>Copyright © 2019. All Rights Reserved</span>
				<ul class="footer-botm-lnk">
				<li>Download Now:</li>
				<li><a href=""><i class="fa fa-android" aria-hidden="true"></i></a></li>
				<li><a href=""><i class="fa fa-apple" aria-hidden="true"></i></a></li>
				<li><a href=""><i class="fa fa-windows" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
	</footer>



</div>

<!-- Script -->
<script type="text/javascript" src="{{URL('UserAsset/js/modernizr.js')}}"></script><!-- Modernizer -->
<script type="text/javascript" src="{{URL('UserAsset/js/jquery-2.1.1.js')}}"></script><!-- Jquery -->
<script type="text/javascript" src="{{URL('UserAsset/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{URL('UserAsset/js/script.js')}}"></script><!-- Script -->
<script type="text/javascript" src="{{URL('UserAsset/js/bootstrap.min.js')}}"></script><!-- Bootstrap -->
<script type="text/javascript" src="{{URL('UserAsset/js/scrolltopcontrol.js')}}"></script><!-- ScrollTopControl -->
<script type="text/javascript" src="{{URL('UserAsset/js/slick.min.js')}}"></script><!-- Slick -->
<script type="text/javascript" src="{{URL('UserAsset/js/scrolly.js')}}"></script><!-- Slick -->
<script type="text/javascript" src="{{URL('UserAsset/js/sumoselect.js')}}"></script><!-- Nice Select -->

<!-- <script type="text/javascript" src="js/choosen.min.js"></script> --><!-- Nice Select -->
<script type="text/javascript" src="{{URL('UserAsset/js/waypoints.js')}}"></script><!-- Nice Select -->

<!-- scrolltop -->
<script>
	//** jQuery Scroll to Top Control script- (c) Dynamic Drive DHTML code library: http://www.dynamicdrive.com.
//** Available/ usage terms at http://www.dynamicdrive.com (March 30th, 09')
//** v1.1 (April 7th, 09'):
//** 1) Adds ability to scroll to an absolute position (from top of page) or specific element on the page instead.
//** 2) Fixes scroll animation not working in Opera. 


var scrolltotop={
	//startline: Integer. Number of pixels from top of doc scrollbar is scrolled before showing control
	//scrollto: Keyword (Integer, or "Scroll_to_Element_ID"). How far to scroll document up when control is clicked on (0=top).
	setting: {startline:100, scrollto: 0, scrollduration:1000, fadeduration:[500, 100]},
	controlHTML: '<img src="{{URL("UserAsset/images/up.png")}}" style="width:60px; height:60px" />', //HTML for control, which is auto wrapped in DIV w/ ID="topcontrol"
	controlattrs: {offsetx:5, offsety:5}, //offset of control relative to right/ bottom of window corner
	anchorkeyword: '#top', //Enter href value of HTML anchors on the page that should also act as "Scroll Up" links

	state: {isvisible:false, shouldvisible:false},

	scrollup:function(){
		if (!this.cssfixedsupport) //if control is positioned using JavaScript
			this.$control.css({opacity:0}) //hide control immediately after clicking it
		var dest=isNaN(this.setting.scrollto)? this.setting.scrollto : parseInt(this.setting.scrollto)
		if (typeof dest=="string" && jQuery('#'+dest).length==1) //check element set by string exists
			dest=jQuery('#'+dest).offset().top
		else
			dest=0
		this.$body.animate({scrollTop: dest}, this.setting.scrollduration);
	},

	keepfixed:function(){
		var $window=jQuery(window)
		var controlx=$window.scrollLeft() + $window.width() - this.$control.width() - this.controlattrs.offsetx
		var controly=$window.scrollTop() + $window.height() - this.$control.height() - this.controlattrs.offsety
		this.$control.css({left:controlx+'px', top:controly+'px'})
	},

	togglecontrol:function(){
		var scrolltop=jQuery(window).scrollTop()
		if (!this.cssfixedsupport)
			this.keepfixed()
		this.state.shouldvisible=(scrolltop>=this.setting.startline)? true : false
		if (this.state.shouldvisible && !this.state.isvisible){
			this.$control.stop().animate({opacity:1}, this.setting.fadeduration[0])
			this.state.isvisible=true
		}
		else if (this.state.shouldvisible==false && this.state.isvisible){
			this.$control.stop().animate({opacity:0}, this.setting.fadeduration[1])
			this.state.isvisible=false
		}
	},
	
	init:function(){
		jQuery(document).ready(function($){
			var mainobj=scrolltotop
			var iebrws=document.all
			mainobj.cssfixedsupport=!iebrws || iebrws && document.compatMode=="CSS1Compat" && window.XMLHttpRequest //not IE or IE7+ browsers in standards mode
			mainobj.$body=(window.opera)? (document.compatMode=="CSS1Compat"? $('html') : $('body')) : $('html,body')
			mainobj.$control=$('<div id="topcontrol">'+mainobj.controlHTML+'</div>')
				.css({position:mainobj.cssfixedsupport? 'fixed' : 'absolute', bottom:mainobj.controlattrs.offsety, right:mainobj.controlattrs.offsetx, opacity:0, cursor:'pointer'})
				.attr({title:'Scroll Back to Top'})
				.click(function(){mainobj.scrollup(); return false})
				.appendTo('body')
			if (document.all && !window.XMLHttpRequest && mainobj.$control.text()!='') //loose check for IE6 and below, plus whether control contains any text
				mainobj.$control.css({width:mainobj.$control.width()}) //IE6- seems to require an explicit width on a DIV containing text
			mainobj.togglecontrol()
			$('a[href="' + mainobj.anchorkeyword +'"]').click(function(){
				mainobj.scrollup()
				return false
			})
			$(window).bind('scroll resize', function(e){
				mainobj.togglecontrol()
			})
		})
	}
}

scrolltotop.init()



</script>

@yield('script')

<!-- scrolltop -->

</body>
</html>