<!DOCTYPE html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <title>Mr Sabi</title>
   <!-- Styles -->
   <link rel="stylesheet" href="{{URL('UserAsset/css/bootstrap.min.css')}}" type="text/css" />
   <!-- Bootstrap -->
   <link rel="stylesheet" href="{{URL('UserAsset/css/line-awesome.min.css')}}" type="text/css" />
   <!-- Icons -->
   <link rel="stylesheet" href="{{URL('UserAsset/css/style.css')}}" type="text/css" />
   <!-- Style --> 
   <link rel="stylesheet" href="{{URL('UserAsset/css/responsive.css')}}" type="text/css" />
   <!-- Responsive -->  
   <link rel="stylesheet" href="{{URL('UserAsset/css/colors/colors.css')}}" type="text/css" />
   <!-- color -->    
   <link rel="stylesheet" href="{{URL('UserAsset/css/font-awesome.min.css')}}">
   <link rel="shortcut icon" type="image/png" href="{{URL('UserAsset/images/favicon.png')}}"/>
   <link rel="stylesheet" type="text/css" href="{{URL('UserAsset/css/flaticon.css')}}">

      <link rel="stylesheet" href="{{URL('UserAsset/dist/min/dropzone.min.css')}}" type="text/css" />

      <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
   <div class="page-loading">
      <div class="loadery"></div>
   </div>
   <div class="mrsabi-layout">
      <div class="responive-header resnsve-hed-mb">
         <div class="logo"><a href="{{route('/')}}" title=""><img src="" alt="" /></a></div>
         <span class="open-responsive-btn"><i class="la la-bars"></i><i class="la la-close"></i></span>
         <div class="resp-btn-sec flt-lft-mb">
            <div class="btns-extra-top rightmr-20">
               <a href="{{route('listing')}}" title="" class="add-listing-btn left">Write a Review</a>           
               <a href="{{route('add-listing')}}" title="" class="add-listing-btn right">Add Your Business</a>
            </div>
         </div>
         <div class="responisve-menu">
            <span class="close-reposive"><i class="la la-close"></i></span>
            <div class="logo"><a href="" title=""><img src="images/logo-white.png" alt="" /></a></div>
            <ul>
               <li>
                  <a href="{{route('/')}}" title="">Home</a> 
               </li>
               <li>
                  <a href="{{route('categories')}}" title="">Browse by Category</a>
               </li>
               <li>
                  <a href="" title="">download mobile</a>
               </li>
              <?php
              if(Auth::id())
              {
          
          echo'
               
                <li class="welcome_user">
                        <img src="images/tutor-8.jpg" alt="user-name" />
                        <a href="#" title="">Welcom , John</a>
                     </li>
        
          ';

              }
              else{
echo' <li>
                  <a href="{{route("SignIn")}}" title="">Login</a>
               </li>';

              }
            
               ?>

            </ul>
         </div>
      </div>
      <!-- Responsive-header -->
      <header class="on-top with-transparent inner-head-sec">
         <div class="container">
            <a href="{{route('listing')}}" title="" class="add-listing-btn left hoverhead">Write a Review</a>
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

@yield('body')
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
                     </div>
                     <!-- Widget -->
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
                     </div>
                     <!-- Widget -->
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
                     </div>
                     <!-- Widget -->
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
   </script><script type="text/javascript" src="{{URL('UserAsset/js/modernizr.js')}}"></script><!-- Modernizer -->
   <script type="text/javascript" src="{{URL('UserAsset/js/jquery-2.1.1.js')}}"></script><!-- Jquery -->
   <script type="text/javascript" src="{{URL('UserAsset/js/script.js')}}"></script><!-- Script -->
   <script type="text/javascript" src="{{URL('UserAsset/js/bootstrap.min.js')}}"></script><!-- Bootstrap -->
   <script type="text/javascript" src="{{URL('UserAsset/js/scrolltopcontrol.js')}}"></script><!-- ScrollTopControl -->
   <script type="text/javascript" src="{{URL('UserAsset/js/slick.min.js')}}"></script><!-- Slick -->
   <script type="text/javascript" src="{{URL('UserAsset/js/scrolly.js')}}"></script><!-- Slick -->
   <script type="text/javascript" src="{{URL('UserAsset/js/sumoselect.js')}}"></script><!-- Nice Select -->
   <script type="text/javascript" src="{{URL('UserAsset/js/choosen.min.js')}}"></script><!-- Nice Select -->
   <script type="text/javascript" src="{{URL('UserAsset/js/rangeslider.js')}}"></script><!-- Nice Select -->
   <script src="{{URL('UserAsset/https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM&amp;callback=initMap')}}"type="text/javascript"></script>
   <script type="text/javascript" src="{{URL('UserAsset/js/maps3.js')}}"></script><!-- Nice Select -->
   <script type="text/javascript" src="{{URL('UserAsset/js/jquery.jigowatt.js')}}"></script><!-- Form -->
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

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{URL('UserAsset/js/dropzone.js')}}"></script>

@yield('script')
</body>
</html>