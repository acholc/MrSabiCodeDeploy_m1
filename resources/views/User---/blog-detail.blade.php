@extends('User.master')
@section('body') 
      <section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Blog Detail</h2>
                        <ul class="breadcrumbs">
                           <li><a href="#" title="">Home</a></li>
                           <li>Blog Detail</li>
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
                     <div class="single-post-detail">
                        <h3 class="mini-title">The Modern Art of Coffee</h3>
                        <div class="blog-post wide">
                           <div class="blog-post-thumb"> <a href="#" title=""><img src="{{URL('UserAsset/images/resource/blog-detail.jpg')}}" alt=""></a></div>
                           <div class="blog-detail">
                              <ul class="blog-metas">
                                 <li><a href="#" title="">May 22, 2019</a></li>
                                 <li><a href="#" title="">Traveling</a></li>
                                 <li><a href="#" title="">by Jessica Moor</a></li>
                              </ul>
                              <p>Curabitur lacinia erat quis nisi mollis, non pulvinar diam auctor. Integer ornare lobortis tristique. Vestibulum congue eleifend sapien, ac tristique nisi dapibus quis. Vivamus ligula erat, convallis nec leo vel, eleifend imperdiet lacus. Maecenas a euismod augue. Nam eu neque in velit fermentum finibus. Morbi sed lacus in odio ullamcorper facilisis. Vivamus maximus fringilla nisi, eget tristique elit mollis sit amet.</p>
                              <p><span>A</span>in enim sit amet erat consequat vulputate. Donec ut justo nec est congue cursus sit amet aliquet lorem. In at eros id nisi sollicitudin consectetur at vel risus. Integer elit sapien, posuere nec augue non, tempus molestie est. Ut quis congue olestie est. Ut quis congue dui. Quisque finibus rhoncus nulla, nec consectetur nibh finibus sit amet. Duis eget justo venenatis nisi interd dui. Quisque finibus rhoncus nulla, nec consectetur nibh finibus sit amet. Duis eget justo venenatis nisi interdum facilisis non eget purus.</p>
                           </div>
                           <blockquote>
                              <p>Curabitur lacinia erat quis nisi mollis, non pulvinar diam auctor. Integer ornare lobortis tristique. Vestieleifend imperdiet lacus. Maecenas a euismod augue. Nam eu neque in velit fermentum finibus. Morbi sed lacus in odio ullamcorper facilisis. Vivamus maximus fringilla nisi, eget tristique elit mollis sit amet.</p>
                           </blockquote>
                           <div class="post-share">
                              <a href="#" title=""><i class="la la-twitter"></i></a>
                              <a href="#" title=""><i class="la la-instagram"></i></a>
                              <a href="#" title=""><i class="la la-linkedin"></i></a>
                              <a href="#" title=""><i class="la la-behance"></i></a>
                              <a href="#" title=""><i class="la la-google-plus"></i></a>
                           </div>
                           <div class="display-review-box">
                              <h3 class="mini-title">revıew</h3>
                              <div class="review-list-sec">
                                 <ul>
                                    <li>
                                       <div class="review-list">
                                          <div class="review-avatar"> <img src="{{URL('UserAsset/images/resource/r1.jpg')}}" alt=""> </div>
                                          <div class="reviewer-info">
                                             <h3><a href="#" title="">Jamies Giroux</a></h3>
                                             <span>7 months ago</span>
                                             <p>Donec nec tristique sapien. Aliquam ante felis, sagittis sodales diam sollicitudin, dapibus semper turpis</p>
                                          </div>
                                          <div class="reviewer-stars">
                                             <b class="la la-star"></b>
                                             <b class="la la-star"></b>
                                             <b class="la la-star"></b>
                                             <b class="la la-star"></b>
                                             <b class="la la-star"></b>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="review-list">
                                          <div class="review-avatar"> <img src="{{URL('UserAsset/images/resource/r2.jpg')}}" alt=""> </div>
                                          <div class="reviewer-info">
                                             <h3><a href="#" title="">Brian Krogsgard</a></h3>
                                             <span>7 months ago</span>
                                             <p>Donec nec tristique sapien. Aliquam ante felis, sagittis sodales diam sollicitudin, dapibus semper turpis</p>
                                          </div>
                                          <div class="reviewer-stars">
                                             <b class="la la-star"></b>
                                             <b class="la la-star"></b>
                                             <b class="la la-star"></b>
                                             <b class="la la-star"></b>
                                             <b class="la la-star"></b>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                           <div class="add-review-box">
                              <h3 class="mini-title">Rate &amp; Wrıte a Revıew</h3>
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
                                    <div class="row">
                                       <div class="col-md-4"><input type="text" placeholder="Name *"></div>
                                       <div class="col-md-4"><input type="text" placeholder="Email *"></div>
                                       <div class="col-md-4"><input type="text" placeholder="Website *"></div>
                                       <div class="col-md-12"><textarea placeholder="Comment *"></textarea>
                                          <button type="submit">SUBMIT YOUR REVIEW</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <!-- BLog Post  -->
                     </div>
                  </div>
                  <aside class="col-md-3 column">
                     <div class="widget">
                        <h3 class="mini-title">SEARCH</h3>
                        <div class="search_widget">
                           <form>
                              <div class="row">
                                 <div class="col-md-12">
                                    <input type="text" class="input-style" placeholder="Keywords">
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="widget">
                        <h3 class="mini-title">category</h3>
                        <div class="category-widget">
                           <a href="#" title="">Life Style <i>(05)</i></a>
                           <a href="#" title="">Eltertainment <i>(23)</i></a>
                           <a href="#" title="">Business  <i>(43)</i></a>
                           <a href="#" title="">Porperty <i>(12)</i></a>
                           <a href="#" title="">Tips <i>(23)</i></a>
                        </div>
                     </div>
                     <div class="widget">
                        <h3 class="mini-title">Recent Items</h3>
                        <div class="recentitem-widget">
                           <div class="recentitem">
                              <a href="#" title=""> <img src="{{URL('UserAsset/images/resource/ri.jpg')}}" alt=""> </a>
                              <h3><a href="#" title="">Dandelion Café</a></h3>
                           </div>
                           <div class="recentitem">
                              <a href="#" title=""> <img src="{{URL('UserAsset/images/resource/ri2.jpg')}}" alt=""> </a>
                              <h3><a href="#" title="">Jersey Breakfast</a></h3>
                           </div>
                           <div class="recentitem">
                              <a href="#" title=""> <img src="{{URL('UserAsset/images/resource/ri3.jpg')}}" alt=""> </a>
                              <h3><a href="#" title="">Local Restaurant</a></h3>
                           </div>
                        </div>
                        <!-- Recent Item Widget -->
                     </div>
                     <div class="widget">
                        <h3 class="mini-title">Tags</h3>
                        <div class="tags-widget">
                           <a href="#" title="">Wine</a>
                           <a href="#" title="">Drink</a>
                           <a href="#" title="">Champagne</a>
                           <a href="#" title="">Cheese</a>
                           <a href="#" title="">Bordeaux</a>
                        </div>
                     </div>
                  </aside>
               </div>
            </div>
         </div>
      </section>
@endsection('body')       