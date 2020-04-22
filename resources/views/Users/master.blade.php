<!DOCTYPE html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <title>Mr Sabi</title>
      <!-- Styles -->
      <link rel="stylesheet" href="{{URL('UserAssets/css/bootstrap.min.css')}}" type="text/css" />
      <!-- Bootstrap -->
      <link rel="stylesheet" href="{{URL('UserAssets/css/line-awesome.min.css')}}" type="text/css" />
      <!-- Icons -->
      <link rel="stylesheet" href="{{URL('UserAssets/css/style.css')}}" type="text/css" />
      <!-- Style --> 
      <link rel="stylesheet" href="{{URL('UserAssets/css/responsive.css')}}" type="text/css" />
      <!-- Responsive -->  
      <link rel="stylesheet" href="{{URL('UserAssets/css/colors/colors.css')}}" type="text/css" />
      <link rel="shortcut icon" type="image/png" href="{{URL('UserAssets/images/favicon.png')}}"/>
      <!-- color -->    
      <link rel="stylesheet" href="{{URL('UserAssets/css/font-awesome.min.css')}}">
      <link rel="shortcut icon" type="image/png" href="{{URL('UserAssets/images/favicon.png')}}"/>
      <link rel="stylesheet" type="text/css" href="{{URL('UserAssets/css/flaticon.css')}}">
      <link rel="stylesheet" href="{{URL('UserAssets/dist/min/dropzone.min.css')}}" type="text/css" />
      <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css"-->
      <link rel="stylesheet" href="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
      <link rel="stylesheet" href="{{URL('UserAssets/css/jquery.mCustomScrollbar.css')}}">
            <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
	  <link href="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/css/bootstrap-timepicker.min.css" rel="stylesheet" />
   <!-- <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" />
    -->
         <meta name="csrf-token" content="{{ csrf_token() }}">
      <style>
   .recentitem h3 a {
       font-size: 16px;
       padding-bottom: 5px;
       display: block;
       margin-top: 5px;
   }
   </style>
    <script type="text/javascript" src="{{URL('UserAssets/js/jquery-2.1.1.js')}}"></script><!-- Jquery -->
    <!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
   </head>
   <body>
         <div class="page-loading">
         <div class="loadery"></div>
      </div>

      <div class="mrsabi-layout">
         <div class="responive-header resnsve-hed-mb">
            <div class="logo"><a href="{{route('/')}}" title=""><img src="{{URL('UserAssets/images/white-mr-sabi.png')}}" alt="" /></a></div>
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
               <div class="logo"><a href="" title=""><img src="{{URL('UserAssets/images/logo-white.png')}}" alt="" /></a></div>
               <ul>
                  <li>
                     <a href="{{route('/')}}" title="">Home</a> 
                  </li>
                  <li>
                     <a href="{{route('categories')}}" title="">Browse by Category</a>
                  </li>
                  <li>
                     <a href="#" title="">download mobile</a>
                  </li>
                  @if(Auth::check())
                 <li class="menu-item-has-children welcome_user">
                  <a href="{{route('edit-profile')}}" title="">My Account</a>
                  <ul>
                     <li class="user-dtls"> 
                        <img src="{{URL('public/profile_pictures')}}/{{Auth::User()->profile_image}}" class="user-ia profile_picture">
                        <span>{{ucwords(Auth::User()->name)}}</span>
                     </li>
                     <li><a href="{{route('edit-profile')}}" title=""><i class="fa fa-user"></i> &nbsp; Profile</a></li>
                     <li><a href="{{route('all-listings')}}" title=""><i class="fa fa-th-list"></i> &nbsp; My Listings</a></li>
                     <li><a href="{{route('favourite_listings')}}" title=""><i class="la la-heart orng"></i> &nbsp; Favourite Listings</a></li>
                  </ul>
               </li>
               @else
                  <!--<li>
                     <a href="{{route('SignIn')}}" title="">Login</a>
                  </li>-->
               @endif
               
                        <li><a href="{{route('blogs')}}" title="">Blogs and Insights</a></li>
                        <li><a href="{{route('deals')}}" title="">Deals</a></li>
                        <li><a href="{{route('AboutUs')}}" title="">About Us</a></li>
                        <li><a href="{{route('contact')}}" title="">Contact Us</a></li>
                        <li><a href="{{route('categories')}}" title="">Categories</a></li>
                        <li><a href="{{route('terms')}}" title="">Terms of Service</a></li>
                        <li><a href="{{route('privacy-policy')}}" title="">Privacy Policy</a></li>
               
               
            </ul>
            </div>
         </div>
         <!-- Responsive-header -->
         <header class="on-top with-transparent inner-head-sec">
            <div class="container">
               <a href="{{route('search-listings')}}" title="" class="add-listing-btn hoverhead left">Write a Review</a>
               <a href="{{route('deals')}}" title="" class="add-listing-btn left hoverhead view_deals">View Deals</a>
               <div class="logo">
                  <!--a href="" title=""><img src="images/logo-white.png" alt="" /></a-->
               </div>
               <div class="menu-sec">
                  <div class="btns-extra-top">
                     <a href="{{route('add-listing')}}" title="" class="add-listing-btn right">Add Your Business</a>
                  </div>
                  <nav class="header-menu">
                     <ul>
                        <li>
                           <a href="{{route('/')}}" title="">Home</a> 
                        </li>
                        <li>
                           <a href="{{route('categories')}}" title="">Browse by Category</a>
                        </li>
                        <li>
                           <a href="#" title="">download mobile</a>
                        </li>
                        @if(Auth::check())
                 <li class="menu-item-has-children welcome_user">
                  <a href="{{route('edit-profile')}}" title="">My Account</a>
                  <ul>
                     <li class="user-dtls"> 
                        <img src="{{URL('public/profile_pictures')}}/{{Auth::User()->profile_image}}" class="user-ia profile_picture">
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
         
          
   @yield('body')
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
     
      <script type="text/javascript" src="{{URL('UserAssets/js/script.js')}}"></script><!-- Script -->
      <script type="text/javascript" src="{{URL('UserAssets/js/bootstrap.min.js')}}"></script><!-- Bootstrap -->
      <script type="text/javascript" src="{{URL('UserAssets/js/scrolltopcontrol.js')}}"></script><!-- ScrollTopControl -->
      <script type="text/javascript" src="{{URL('UserAssets/js/slick.min.js')}}"></script><!-- Slick -->
      <script type="text/javascript" src="{{URL('UserAssets/js/scrolly.js')}}"></script><!-- Slick -->
      <script type="text/javascript" src="{{URL('UserAssets/js/sumoselect.js')}}"></script><!-- Nice Select -->
      <script type="text/javascript" src="{{URL('UserAssets/js/choosen.min.js')}}"></script><!-- Nice Select -->
      <script type="text/javascript" src="{{URL('UserAssets/js/rangeslider.js')}}"></script><!-- Nice Select -->
      <script type="text/javascript" src="{{URL('UserAssets/js/jquery.jigowatt.js')}}"></script><!-- Form -->
      <script type="text/javascript" src="{{URL('UserAssets/js/jquery.validate.min.js')}}"></script><!-- Form -->
     <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAIkAmlsGxoP63HLptMlKqpbgAv7IZBKM4"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="{{URL('UserAssets/js/dropzone.js')}}"></script>
      <script src="{{URL('UserAssets/dist/jquery.nicescroll.min.js')}}"></script>
        <script type="text/javascript" src="{{URL('UserAssets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
      <script src="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/js/bootstrap-timepicker.min.js"></script>


      <script>
      ///scroll top
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
   </script>
   <script>
    // (function($){
    //     $(window).on("load",function(){
    //         $(".tag-srl-sec").mCustomScrollbar();
    //     });
    // })(jQuery);
    
    function scrollFunction() {
    $("#boxscroll, .blg-scrl-hgt").niceScroll({cursorborder:"",cursorcolor:"#ff9800",boxzoom:false,touchbehavior: true, autohidemode: false}); // First scrollable DIV
    }
    $(document).ready(function() {
    scrollFunction();
    });

    $(window).load(function() {
      scrollFunction();
    });

    
</script>
   @yield('script')      
   </body>
   </html>