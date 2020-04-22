@extends('User.master')
@section('body')    
      <section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Blogs</h2>
                        <ul class="breadcrumbs">
                           <li><a href="#" title="">Home</a></li>
                           <li>Blogs</li>
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
                     <div class="blog-sec">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="blog-post wide">
                                 <div class="blog-post-thumb"> <a href="#" title=""><img src="{{URL('UserAsset/images/resource/bw1.jpg')}}" alt=""></a></div>
                                 <div class="blog-detail">
                                    <h3><a href="#" title="">Best place for romantic dinner </a></h3>
                                    <ul class="blog-metas">
                                       <li><a href="#" title="">May 22, 2019</a></li>
                                       <li><a href="#" title="">Food</a></li>
                                    </ul>
                                    <p>Vestibulum semper mauris quis ex semper porta. Integer sit amet nisi at tellus hendrerit commodo. Proin accumsan feugiat ligula in scelerisque. Maecenas facilisis sagittis semper. Suspendisse sit amet lorem odio. Phasellus tincidunt venenatis ipsum. Mauris at consequat massa. Donec ullamcorper accumsan interdum. Nam finibus elit a libero dapibus aliquet. Vivamus accumsan, neque nec auctor dictum, tellus nisi gravida mauris, quis ultrices nulla massa in libero. </p>
                                    <a href="#" title="">READ MORE</a>
                                 </div>
                              </div>
                              <!-- BLog Post  -->
                           </div>
                           <div class="col-md-12">
                              <div class="blog-post wide">
                                 <div class="blog-post-thumb"> <a href="#" title=""><img src="{{URL('UserAsset/images/resource/bw2.jpg')}}" alt=""></a></div>
                                 <div class="blog-detail">
                                    <h3><a href="#" title="">Best quality food in town</a></h3>
                                    <ul class="blog-metas">
                                       <li><a href="#" title="">Jun 22, 2019</a></li>
                                       <li><a href="#" title="">Food</a></li>
                                    </ul>
                                    <p>Donec faucibus massa odio, eu aliquam risus ornare eget. Morbi interdum porttitor neque, nec pretium ligula faucibus et. Pellentesque vitae nisl libero. Vivamus tincidunt blandit augue, quis elementum nibh. Mauris ultricies nulla mi, in auctor lorem volutpat tempor. Ut eget sapien leo. Nam sollicitudin elit sem, id scelerisque ante lobortis vel.</p>
                                    <a href="#" title="">READ MORE</a>
                                 </div>
                              </div>
                              <!-- BLog Post  -->
                           </div>
                           <div class="col-md-12">
                              <div class="blog-post wide">
                                 <div class="blog-post-thumb"> <a href="#" title=""><img src="{{URL('UserAsset/images/resource/bw3.jpg')}}" alt=""></a></div>
                                 <div class="blog-detail">
                                    <h3><a href="#" title="">Tips for Top Quality Pics</a></h3>
                                    <ul class="blog-metas">
                                       <li><a href="#" title="">Jul 1, 2019</a></li>
                                       <li><a href="#" title="">Traveling</a></li>
                                    </ul>
                                    <p>Curabitur lacinia erat quis nisi mollis, non pulvinar diam auctor. Integer ornare lobortis tristique. Vestibulum congue cenas a euismod augue. Nam eu neque in velit fermentum finibus. Morbi sed lacus in odio ullamcorper facilisis. Vivamus maximus fringilla nisi, eget tristique elit mollis sit amet.</p>
                                    <a href="#" title="">READ MORE</a>
                                 </div>
                              </div>
                              <!-- BLog Post  -->
                           </div>
                        </div>
                        <div class="pagination">
                           <ul>
                              <li class="prev"><a href=""><i class="la  la-arrow-left"></i></a></li>
                              <li><a href="">1</a></li>
                              <li><a class="active" href="">2</a></li>
                              <li><a href="">3</a></li>
                              <li><span class="delimeter">...</span></li>
                              <li><a href="">22</a></li>
                              <li class="next"><a href=""><i class="la  la-arrow-right"></i></a></li>
                           </ul>
                        </div>
                        <!-- Pagination -->
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