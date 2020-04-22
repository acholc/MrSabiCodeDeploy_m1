@extends('Users.master')
@section('body')
     <section class="bred-crumb-sec" style="background-image: url('{{URL('public/page_images/brdcrmbbg.jpg')}}');">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Blogs</h2>
                        <ul class="breadcrumbs">
                           <li><a href="{{route('/')}}" title="">Home</a></li>
                           <li>Blogs</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="container">
          <div class="row">
                  <div class="col-md-8 column">
                     <h3 class="mini-title" id="Results_for" style="display: none">
                     </h3>
                  </div>
         </div>
         </div>
      


       
         <div class="block gray ">
            <div class="container">
               <div class="row">
                  <div class="col-md-9  column">
                     <div class="blog-sec">
                        <div class="row" id="data">
                           <?php
                           $i=0;
                           $tags_array=array();
                           ?>
                           @if(!empty($Blog))
                           @foreach($Blog as $key)
                           <div class="col-md-12">
                              <div class="blog-post wide">
                                 <div class="blog-post-thumb"> <a href="{{route('blog-details',$key['id'])}}" title="">
                                    @if(!empty($key['image']) && file_exists('public/blog_images/'.$key['image']))
                                      <img src="{{URL('public/blog_images')}}/{{$key['image']}}" alt="" />
                                     @else   <img src="{{URL('public/images/default.jpg')}}" alt="" />
                                     @endif
                                 </a></div>
                                 <div class="blog-detail">
                                    <h3><a href="{{route('blog-details',$key['id'])}}" title="">{{$key['title']}}</a></h3>
                                    <ul class="blog-metas">
                                       <li><a title=""><i class="fa fa-calendar"></i>
                                      {{substr_replace($key['created_at'],"",-8)}}
                                       </a></li>
                                        @foreach($Blog[$i]['all_tags'] as $tag_value)
                                       <li>
                                   
                                    <a title=""><i class="fa fa-tags"></i>
                                       <?php
                                        $tags_array[$tag_value['id']]=$tag_value['tag_name']; 
                                       ?>
                                       {{$tag_value['tag_name']}}
                                         </a>
                                      

                                  </li>
                                   @endforeach
                                    </ul>
                                    <p>{!!$key['description']!!}</p>
                                    <a href="{{route('blog-details',$key['id'])}}" title="">READ MORE</a>
                                 </div>
                              </div>
                              <!-- BLog Post  -->
                           </div>
                           <?php 
                           $i++;
                           ?>
                           @endforeach
                           @else 
                                     
                                          <h3 class="text-center">No blogs yet</h3>
                                     
                               
                           @endif
                       
               
                        </div>
                        <div class="pagination">
                     {{$paginate->links('Users.default')}}
                        </div>
                        <!-- Pagination -->
                     </div>
                  </div>
                  <aside class="col-md-3 column">
                     <div class="widget">
                        <h3 class="mini-title">SEARCH</h3>
                        <div class="search_widget bg-dtl-srh-sec">
                         <form>
                              <div class="row">
                                 <div class="col-md-12">
                                     <div class="input-group">
                                    <input type="text" class="input-style" placeholder="Search here" id="keyword">
                                    <a href="JavaScript:Void(0);" class="input-group-addon" id="search">
                                        <i class="fa fa-search" ></i>
                                    </a>
                                    </div>
                                 </div>
                              </div>
                          </form>
                        </div>
                     </div>
                     <div class="widget ">
                        <h3 class="mini-title">category</h3>
                        <div class="category-widget blg-scrl-hgt">
                           @if(!empty($category))
                           @foreach($category as $key)
                           <a href="{{route('listing',$key->id)}}" title="">{{$key->category}} <i>({{$key->total}})</i></a>
                           @endforeach
                           @endif
                        </div>
                     </div>
                     <div class="widget">
                        <h3 class="mini-title">Recent Posts</h3>
                        <div class="recentitem-widget">
                               @if(!empty($recent_blogs))
                               @foreach($recent_blogs as $key)
                               <div class="recentitem">
                                  <a href="{{route('blog-details',$key['id'])}}" title=""> @if(!empty($key['image']) && file_exists('public/blog_images/'.$key['image']))
                                          <img src="{{URL('public/blog_images')}}/{{$key['image']}}" alt="" width="30%" />
                                         @else   <img src="{{URL('public/images/default.jpg')}}" alt=""  width="30%"/>
                                         @endif </a>
                                  <h3><a href="{{route('blog-details',$key['id'])}}" title="">{{$key['title']}}</a></h3>
                                  <small><i class="fa fa-calendar"></i>{{substr_replace($key['created_at'],"",-8)}}</small>
                               </div>
                                @endforeach
                               @endif
                         
                        </div>
                        <!-- Recent Item Widget -->
                     </div>
                     <div class="widget">
                        <h3 class="mini-title">Tags</h3>
                        <div class="tags-widget bg-dtl-srl mCustomScrollbar">
                           @foreach($final_tags as $key)                         
                           <a href="JavaScript:Void(0)" title="" class="tag_search" data-value="{{$key['id']}}"><i class="fa fa-tags"></i>{{$key['tag_name']}}</a>
                           @endforeach                          
                        </div>
                     </div>
                  </aside>
               </div>
            </div>
         </div>
      </section>

@endsection('body')
@section('script')
<script>
$(document).on('click','#search',function() {
  var keyword=$('#keyword').val();
  $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:"{{route('search-blog')}}",
                data:{'keyword':keyword},
                success:function(data)
                   { 
                 var result= $.parseJSON(data);
                 // alert(result.keyword);                 
                 $('#data').html(result.data);                
                 $('#Results_for').css('display','block').html(result.keyword);
                 $('#Results_for')[0].scrollIntoView({behavior:"smooth",block:"start"});
                 $('.pagination').remove();
                   }
           });
});
</script>

<script>
$(document).on('click','.tag_search',function() {
   var id=$(this).attr("data-value");
  var keyword=$('#keyword').val();
  $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:"{{route('blog-tag-search')}}",
                data:{'keyword':id},
                success:function(data)
                   { 
                 var result= $.parseJSON(data);
                 // alert(result.keyword);                 
                 $('#data').html(result.data);                
                 $('#Results_for').css('display','block').html(result.keyword);
                 $('#Results_for')[0].scrollIntoView({behavior:"smooth",block:"start"});
                  $('.pagination').remove();
                   }
           });
});
</script>
@endsection('script')