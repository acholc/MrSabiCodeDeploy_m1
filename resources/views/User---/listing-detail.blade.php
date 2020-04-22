@extends('User.master')
@section('body') 
 <section>
         <div class="block gray remove-top">
            <div class="row">
               <div class="col-md-12">
                  <div class="list-detail-sec">
                     <ul class="list-detail-carousel" id="listing-detail-carousel">
                        <li>
                           <div class="list-detail-box">
                              <img src="{{URL('UserAsset/images/resource/ld1.jpg')}}" alt="" />
                              <div class="list-detail-info">
                                 <h3>Madam's Organ</h3>
                                 <div class="rated-list" style="opcity:0">
                                    <b class="la la-star"></b>
                                    <b class="la la-star"></b>
                                    <b class="la la-star"></b>
                                    <b class="la la-star-o"></b>
                                    <b class="la la-star-o"></b>
                                    <span>(13)</span>
                                 </div>
                                 <ul class="list-detail-metas centerul">
                                    <li><a href="#" title="" class="write-review"><i class="la la-heart-o"></i>Add to favorites</a></li>
                                    <li><a href="#" title="" class="write-review"> <i class="la la-pencil"></i> WrIte a Review</a></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li>
                           <div class="list-detail-box">
                              <img src="{{URL('UserAsset/images/ld3.jpg')}}" alt="" />
                              <div class="list-detail-info">
                                 <h3>Madam's Organ</h3>
                                 <div class="rated-list" style="opcity:0">
                                    <b class="la la-star"></b>
                                    <b class="la la-star"></b>
                                    <b class="la la-star"></b>
                                    <b class="la la-star-o"></b>
                                    <b class="la la-star-o"></b>
                                    <span>(13)</span>
                                 </div>
                                 <ul class="list-detail-metas centerul ">
                                    <li><a href="#" class="write-review" title=""><i class="la la-heart-o"></i>Add to favorites</a></li>
                                    <li><a href="#" title="" class="write-review">WrIte a Review</a></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li>
                           <div class="list-detail-box">
                              <img src="{{URL('UserAsset/images/ld3.jpg')}}" alt="" />
                              <div class="list-detail-info">
                                 <h3>Madam's Organ</h3>
                                 <div class="rated-list" style="opcity:0">
                                    <b class="la la-star"></b>
                                    <b class="la la-star"></b>
                                    <b class="la la-star"></b>
                                    <b class="la la-star-o"></b>
                                    <b class="la la-star-o"></b>
                                    <span>(13)</span>
                                 </div>
                                 <ul class="list-detail-metas centerul">
                                    <li><a href="#" title="" class="write-review"><i class="la la-heart-o"></i>Add to favorites</a></li>
                                    <li><a href="#" title="" class="write-review">WrIte a Review</a></li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                     </ul>
                     <div class="mian-listing-detail">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-8 column">
                                 <div class="description-detail-box" id="description">
                                    <h3 class="mini-title">DESCRIPTION</h3>
                                    <div class="detail-descriptions">
                                       <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                       <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</p>
                                    </div>
                                 </div>
                                 <div class="hours-box" id="hours">
                                    <h3 class="mini-title">OpenIng Hours</h3>
                                    <div class="opening-hours-box">
                                       <ul>
                                          <li>
                                             <h5>Monday</h5>
                                             <span>07:30</span>
                                             <span>20:00</span>
                                          </li>
                                          <li>
                                             <h5>Tuesday</h5>
                                             <span>07:30</span>
                                             <span>20:00</span>
                                          </li>
                                          <li>
                                             <h5>Wednesday</h5>
                                             <span>07:30</span>
                                             <span>20:00</span>
                                          </li>
                                          <li>
                                             <h5>Thursday</h5>
                                             <span>07:30</span>
                                             <span>20:00</span>
                                          </li>
                                          <li>
                                             <h5>Friday</h5>
                                             <span>07:30</span>
                                             <span>20:00</span>
                                          </li>
                                          <li>
                                             <h5>Saturday</h5>
                                             <span>07:30</span>
                                             <span>20:00</span>
                                          </li>
                                          <li>
                                             <h5>Sunday</h5>
                                             <span>Closed</span>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="location-box" id="location">
                                    <h3 class="mini-title">LOCATION</h3>
                                    <div class="list-location">
                                       <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5925803.412513284!2d-97.57383311511944!3d37.73518855206203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1506528387794" style="border:0" allowfullscreen></iframe>
                                    </div>
                                 </div>
                                 <div class="contactinfo-box" id="contact">
                                    <h3 class="mini-title">Contact</h3>
                                    <div class="contact-info-list">
                                       <span><strong>Address</strong>123 Demo Street, California USA CA 12345</span>
                                       <span><strong>Phone</strong>+0-111-222-3333</span>
                                       <span><strong>E-mail</strong>demo@example.com</span>
                                       <span><strong>Website</strong>www.example.com</span>
                                    </div>
                                 </div>
                                 <div class="display-review-box" id="review">
                                    <h3 class="mini-title">revıew</h3>
                                    <div class="review-list-sec">
                                       <ul>
                                          <li>
                                             <div class="review-list">
                                                <div class="review-avatar"> <img src="{{URL('UserAsset/images/resource/r1.jpg')}}" alt="" /> </div>
                                                <div class="reviewer-info">
                                                   <h3><a href="#" title="">Jamies Giroux</a></h3>
                                                   <span>7 months ago</span>
                                                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                </div>
                                                <div class="reviewer-stars">
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                </div>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="review-list">
                                                <div class="review-avatar"> <img src="{{URL('UserAsset/images/resource/r2.jpg')}}" alt="" /> </div>
                                                <div class="reviewer-info">
                                                   <h3><a href="#" title="">Brian Krogsgard</a></h3>
                                                   <span>7 months ago</span>
                                                   <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                </div>
                                                <div class="reviewer-stars">
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                </div>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="add-review-box">
                                    <h3 class="mini-title">Rate & Wrıte a Revıew</h3>
                                    <div class="add-review-form">
                                       <div class="add-your-stars">
                                          <h5>Your Rating</h5>
                                          <div class="reviewer-stars">
                                             <b class="la la-star"></b>
                                             <b class="la la-star"></b>
                                             <b class="la la-star"></b>
                                             <b class="la la-star"></b>
                                             <b class="la la-star"></b>
                                          </div>
                                       </div>
                                       <form>
                                          <input type="text" placeholder="Name *" />
                                          <input type="text" placeholder="Email *" />
                                          <input type="text" placeholder="Website *" />
                                          <textarea placeholder="Comment *"></textarea>
                                          <button type="submit">SUBMIT YOUR REVIEW</button>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                              <aside class="col-md-4 column">
                                 <div class="widget">
                                    <h3 class="mini-title">Popular Restaurants</h3>
                                    <div class="recentitem-widget">
                                       <div class="recentitem">
                                          <a href="#" title=""> <img src="{{URL('UserAsset/images/resource/ri.jpg')}}" alt=""> </a>
                                          <h3><a href="#" title="">Dandelion Café</a></h3>
                                          <p><i class="fa fa-map-marker listloc" aria-hidden="true"></i> Los Angeles / Sillicon Valley</p>
                                       </div>
                                       <div class="recentitem">
                                          <a href="#" title=""> <img src="{{URL('UserAsset/images/resource/ri2.jpg')}}" alt=""> </a>
                                          <h3><a href="#" title="">Jersey Breakfast</a></h3>
                                          <p><i class="fa fa-map-marker listloc" aria-hidden="true"></i> Los Angeles / Sillicon Valley</p>
                                       </div>
                                       <div class="recentitem">
                                          <a href="#" title=""> <img src="{{URL('UserAsset/images/resource/ri3.jpg')}}" alt=""> </a>
                                          <h3><a href="#" title="">Local Restaurant</a></h3>
                                          <p><i class="fa fa-map-marker listloc" aria-hidden="true"></i> Los Angeles / Sillicon Valley</p>
                                       </div>
                                    </div>
                                    <!-- Recent Item Widget -->
                                 </div>
                                 <div class="widget">
                                    <h3 class="mini-title">Tags</h3>
                                    <div class="tags-widget">
                                       <a href="#" title=""><i class="la la-tag"></i> Wine</a>
                                       <a href="#" title=""><i class="la la-tag"></i> Drink</a>
                                       <a href="#" title=""><i class="la la-tag"></i> Champagne</a>
                                       <a href="#" title=""><i class="la la-tag"></i> Cheese</a>
                                       <a href="#" title=""><i class="la la-tag"></i> Bordeaux</a>
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
      </section>
@endsection('body')       