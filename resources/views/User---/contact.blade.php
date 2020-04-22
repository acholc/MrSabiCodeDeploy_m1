@extends('User.master')
@section('body')      
      <section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Contact Us</h2>
                        <ul class="breadcrumbs">
                           <li><a href="#" title="">Home</a></li>
                           <li>Contact us</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="cont-map-sec">
         <div class="block gray pt0">
            <div class="row">
               <div class="col-md-12">
                  <div class="contact-map">
                     <div id="map-container">
                        <div id="map_div">&nbsp;</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="block gray">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 column">
                     <h3 class="mini-title">Get In Touch</h3>
                     <div class="contactus-form"  id="contact">
                        <div id="message"></div>
                        <form method="post" name="contactform" id="contactform">
                           <div class="row">
                              <div class="col-md-6"><input name="name" type="text" id="name" placeholder="Name" /></div>
                              <div class="col-md-6"><input  name="email" type="text" id="email" placeholder="Email"  /></div>
                              <div class="col-md-12"><input type="text" placeholder="Subject" /></div>
                              <div class="col-md-12"><textarea name="comments" id="comments" placeholder="Your Message"></textarea></div>
                              <div class="col-md-12"><input class="cont-inptpd-0" type="submit" id="submit" value="send message" /></div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="col-md-4 column">
                     <div class="contact-info-box">
                        <h3 class="mini-title">Contact Information</h3>
                        <div class="contact-box">
                           <ul>
                              <li>
                                 <i class="la la-map-marker"></i>
                                 <h4>Address</h4>
                                 <span>123 Demo Street, California USA CA 12345</span>
                              </li>
                              <li>
                                 <i class="la la-phone"></i>
                                 <h4>Phone Number</h4>
                                 <span>+0-111-222-3333</span>
                              </li>
                              <li>
                                 <i class="la la-fax"></i>
                                 <h4>Fax Number</h4>
                                 <span>123-456-7890</span>
                              </li>
                              <li>
                                 <i class="la la-envelope-o"></i>
                                 <h4>Email</h4>
                                 <span>demo@example.com </span>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection('body')       

@section('script')

 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM&amp;callback=initMap"type="text/javascript"></script>
@endsection('script')