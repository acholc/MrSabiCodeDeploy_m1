@extends('User.master')
@section('body')
      <section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Business Listings</h2>
                        <ul class="breadcrumbs">
                           <li><a href="#" title="">Home</a></li>
                           <li>Business Listings</li>
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
                  <div class="col-md-8 column">
                     <h3 class="mini-title">Business Listings</h3>
                     <div class="filter-bar">
                        <span>11 Results Found</span>
                        <div class="filter-dropdowns">
                           <select data-placeholder="Sort By" class="chosen-select" tabindex="2">
                              <option value="Sort By">Sort By</option>
                              <option value="Latest">Latest</option>
                              <option value="Oldest">Oldest</option>
                              <option value="Top Trending">Top Trending</option>
                              <option value="Price High">Price High</option>
                              <option value="Price Low">Price Low</option>
                           </select>
                        </div>
                     </div>
                     <div class="list-listings">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="recent-places-box list-style">
                                 <div class="recent-place-thumb mbwidth">
                                    <a href="#" title=""><img src="{{URL('UserAsset/images/list1.jpg')}}" alt="" /></a>
                                 </div>
                                 <div class="recent-place-detail">
                                    <div class="listing-box-title">
                                       <h3><a href="#" title="">The Tipsy Cow, Madison, WI</a></h3>
                                       <span>Los Angeles /  Sillicon Valley </span>
                                       <span>+0-111-222-3333</span>
                                    </div>
                                    <div class="listing-rate-share">
                                       <div class="rated-list">
                                          <b class="la la-star"></b>
                                          <b class="la la-star"></b>
                                          <b class="la la-star"></b>
                                          <b class="la la-star-o"></b>
                                          <b class="la la-star-o"></b>
                                          <span>(13 Reviews)</span>
                                       </div>
                                    </div>
                                    <div class="share-favourite mnfav">
                                       <a href="#" title=""><i class="la la-heart orng"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="recent-places-box list-style">
                                 <div class="recent-place-thumb mbwidth">
                                    <a href="#" title=""><img src="{{URL('UserAsset/images/list2.jpg')}}" alt="" /></a>
                                 </div>
                                 <div class="recent-place-detail">
                                    <div class="listing-box-title">
                                       <h3><a href="#" title="">Madam's Organ, Washington D.C.</a></h3>
                                       <span>Los Angeles /  Sillicon Valley </span>
                                       <span>+0-111-222-3333</span>
                                    </div>
                                    <div class="listing-rate-share">
                                       <div class="rated-list">
                                          <b class="la la-star"></b>
                                          <b class="la la-star"></b>
                                          <b class="la la-star"></b>
                                          <b class="la la-star-o"></b>
                                          <b class="la la-star-o"></b>
                                          <span>(13 Reviews)</span>
                                       </div>
                                    </div>
                                    <div class="share-favourite mnfav">
                                       <a href="#" title=""><i class="la la-heart-o"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="recent-places-box list-style">
                                 <div class="recent-place-thumb mbwidth">
                                    <a href="#" title=""><img src="{{URL('UserAsset/images/list3.jpg')}}" alt="" /></a>
                                 </div>
                                 <div class="recent-place-detail">
                                    <div class="listing-box-title">
                                       <h3><a href="#" title="">Ray’s Happy Birthday Bar, Philadelphia, PA</a></h3>
                                       <span>Los Angeles /  Sillicon Valley </span>
                                       <span>+0-111-222-3333</span>
                                    </div>
                                    <div class="listing-rate-share">
                                       <div class="rated-list">
                                          <b class="la la-star"></b>
                                          <b class="la la-star"></b>
                                          <b class="la la-star"></b>
                                          <b class="la la-star-o"></b>
                                          <b class="la la-star-o"></b>
                                          <span>(13 Reviews)</span>
                                       </div>
                                    </div>
                                    <div class="share-favourite mnfav">
                                       <a href="#" title=""><i class="la la-heart orng"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="recent-places-box list-style">
                                 <div class="recent-place-thumb mbwidth">
                                    <a href="#" title=""><img src="{{URL('UserAsset/images/list4.jpg')}}" alt="" /></a>
                                 </div>
                                 <div class="recent-place-detail">
                                    <div class="listing-box-title">
                                       <h3><a href="#" title="">The Tipsy Cow, Madison, WI</a></h3>
                                       <span>Los Angeles /  Sillicon Valley </span>
                                       <span>+0-111-222-3333</span>
                                    </div>
                                    <div class="listing-rate-share">
                                       <div class="rated-list">
                                          <b class="la la-star"></b>
                                          <b class="la la-star"></b>
                                          <b class="la la-star"></b>
                                          <b class="la la-star-o"></b>
                                          <b class="la la-star-o"></b>
                                          <span>(13 Reviews)</span>
                                       </div>
                                    </div>
                                    <div class="share-favourite mnfav">
                                       <a href="#" title=""><i class="la la-heart-o"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="pagination">
                        <ul>
                           <li class="prev"><a href="#"><i class="la  la-arrow-left"></i></a></li>
                           <li><a href="#">1</a></li>
                           <li><a class="active" href="#">2</a></li>
                           <li><a href="#">3</a></li>
                           <li><span class="delimeter">...</span></li>
                           <li><a href="#">22</a></li>
                           <li class="next"><a href="#"><i class="la  la-arrow-right"></i></a></li>
                        </ul>
                     </div>
                  </div>
                  <aside class="col-md-4 column">
                     <div class="widget">
                        <h3 class="mini-title">FILTERS</h3>
                        <div class="search_widget">
                           <div class="side-search-form">
                              <form>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <input type="text" class="input-style" placeholder="Keywords" />
                                    </div>
                                    <div class="col-md-12">
                                       <select data-placeholder="All Locations" class="chosen-select" tabindex="2">
                                          <option value="All Locations">All Locations</option>
                                          <option value="United States">United States</option>
                                          <option value="United Kingdom">United Kingdom</option>
                                          <option value="Afghanistan">Afghanistan</option>
                                          <option value="Aland Islands">Aland Islands</option>
                                          <option value="Albania">Albania</option>
                                       </select>
                                    </div>
                                    <div class="col-md-12">
                                       <select data-placeholder="All Categories" class="chosen-select" tabindex="2">
                                          <option value="All Categories">All Categories</option>
                                          <option value="Restaurants">Restaurants</option>
                                          <option value="Foods">Foods</option>
                                          <option value="Hotels">Hotels</option>
                                          <option value="Bars">Bars</option>
                                          <option value="PlayLands">PlayLands</option>
                                       </select>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="widget">
                        <h3 class="mini-title">FILTER BY TAG</h3>
                        <div class="tags_widget">
                           <div class="filter-by-tags">
                              <div class="row">
                                 <div class="col-md-12">
                                    <p>
                                       <input class="styled-checkbox" id="styled-checkbox-2" type="checkbox" value="value1">
                                       <label for="styled-checkbox-2">Accepts Cards</label>
                                    </p>
                                 </div>
                                 <div class="col-md-12">
                                    <p>
                                       <input class="styled-checkbox" id="styled-checkbox-5" type="checkbox" value="value1">
                                       <label for="styled-checkbox-5">Coupons</label>
                                    </p>
                                 </div>
                                 <div class="col-md-12">
                                    <p>
                                       <input class="styled-checkbox" id="styled-checkbox-7" type="checkbox" value="value1">
                                       <label for="styled-checkbox-7">Pets Friendly</label>
                                    </p>
                                 </div>
                                 <div class="col-md-12">
                                    <p>
                                       <input class="styled-checkbox" id="styled-checkbox-9" type="checkbox" value="value1">
                                       <label for="styled-checkbox-9">Good for Kids</label>
                                    </p>
                                 </div>
                                 <div class="col-md-12">
                                    <p>
                                       <input class="styled-checkbox" id="styled-checkbox-12" type="checkbox" value="value1">
                                       <label for="styled-checkbox-12">Alcohol</label>
                                    </p>
                                 </div>
                                 <div class="col-md-12">
                                    <p>
                                       <input class="styled-checkbox" id="styled-checkbox-23" type="checkbox" value="value1">
                                       <label for="styled-checkbox-23">Pets Friendly</label>
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a href="#" title="" class="filter-btn">filter</a>
                  </aside>
               </div>
            </div>
         </div>
      </section>
@endsection('body')
