@extends('Users.master')
@section('body')
<style>
   

/* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:2.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}
</style>
    <section class="bred-crumb-sec" style="background-image: url('{{URL('public/page_images/brdcrmbbg.jpg')}}');">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Blog Detail</h2>
                        <ul class="breadcrumbs">
                           <li><a href="{{route('/')}}" title="">Home</a></li>
                           <li>Blog Detail</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
        <div class="container">
          <div class="row">
                  <div class="col-md-8 column">
                     <h3 class="mini-title" id="Results_for" style="display: none">
                     </h3>
                  </div>
         </div>
         </div>
      
      <section>
         <div class="block gray ">
            <div class="container">
               <div class="row">
                  <div class="col-md-9 column" id="data">
                     <div class="single-post-detail">
                        <h3 class="mini-title">{{$Blog[0]['title']}}</h3>
                        <div class="blog-post wide">
                           <div class="blog-post-thumb"> <a href="#" title="">
                              @if(!empty($Blog[0]['image']) && file_exists('public/blog_images/'.$Blog[0]['image']))
                                      <img src="{{URL('public/blog_images')}}/{{$Blog[0]['image']}}" alt="" />
                                     @else   <img src="{{URL('public/images/default.jpg')}}" alt="" />
                                     @endif
                           </a></div>
                           <div class="blog-detail">
                              <ul class="blog-metas">
                                 <li><a href="#" title=""><i class="fa fa-calendar"></i>   {{substr_replace($Blog[0]['created_at'],"",-8)}}</a></li>
                                  @if($Blog[0]['all_tags'])
                                   @foreach($Blog[0]['all_tags'] as $tag_value)
                                 <li>
                                   
                                    <a href="#" title=""><i class="fa fa-tags"></i>
                                       <?php
                                        $tags_array[$tag_value['id']]=$tag_value['tag_name']; 
                                       ?>
                                       {{$tag_value['tag_name']}}
                                         </a>
                    
                                    </li>
                                       @endforeach
                                       @endif
                              </ul>
                              <p>{!!$Blog[0]['description']!!}</p>
                           </div>
                 
                           <div class="display-review-box blg-dtl-comt-sec">
                              <h3 class="mini-title">Comments</h3>
                              <div class="review-list-sec">
                                 <ul id="append">
                                    @if(!empty($comment_data))
                                    @foreach($comment_data as $key)
                                    <li>
                                       <div class="review-list">
                                          <div class="review-avatar"> <img src="{{URL('public/profile_pictures/'.$key['user']['profile_image'])}}" alt="" width="30%"> </div>
                                          <div class="reviewer-info">
                                             <?php 
                                               
                                             
                                             $time_ago = strtotime($key['created_at']); 

                                             ?>
                                             <h3><a href="#" title="">{{$key['user']['name']}}</a></h3>
                                             <span> 
                                            
                                             {{ \Carbon\Carbon::parse($key['created_at'])->diffForHumans() }}

                                             </span>
                                             <p>{{$key['comment']}}</p>
                                          </div>
                                          <div class="reviewer-stars">
                                            @if($key['rating']>4.5)                                    
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   @elseif($key['rating']>3.5)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($key['rating']>2.5)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($key['rating']>1.5)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($key['rating']>0)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($key['rating']==0)
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                @endif   
                                          </div>
                                       </div>
                                    </li>
                                    @endforeach
                                    @else   <li> <div class="review-list">No comments yet</div> </li>
                                     @endif
                                 
                                 </ul>
                              </div>
                           </div>
                           <div class="add-review-box bg-dtl-rtg-sec">
                              <h3 class="mini-title">Leave a Comment</h3>
                              <div class="add-review-form">
                                 <div class="add-your-stars">
                                    <h5>Your Rating</h5>
                                  <div class="reviewer-stars">
                                           <!-- Rating Stars Box -->
                                         <div class='rating-stars'>
                                           <ul id='stars'>
                                             <li class='star' title='Poor' data-value='1'>
                                               <i class='fa fa-star fa-fw'></i>
                                             </li>
                                             <li class='star' title='Fair' data-value='2'>
                                               <i class='fa fa-star fa-fw'></i>
                                             </li>
                                             <li class='star' title='Good' data-value='3'>
                                               <i class='fa fa-star fa-fw'></i>
                                             </li>
                                             <li class='star' title='Excellent' data-value='4'>
                                               <i class='fa fa-star fa-fw'></i>
                                             </li>
                                             <li class='star' title='WOW!!!' data-value='5'>
                                               <i class='fa fa-star fa-fw'></i>
                                             </li>
                                           </ul>
                                         </div>
  
                                          </div>
                                 </div>
                                 <form id="rating_form">
                                    {{csrf_field()}}
                                     <input type="hidden" name="rating_field" id="rating_field">
                                    <input type="hidden" name="blog_id" value="{{$Blog[0]['id']}}" class="blog_id">
                                    <div class="row"> 
                                       <div class="col-md-4"><input type="text" placeholder="Name *" name="user_name" required="" id="user_name"></div>
                                       <div class="col-md-4"><input type="text" placeholder="Email *" name="user_email" required="" id="user_email"></div>
                                       <div class="col-md-4"><input type="text" placeholder="Website *" name="user_website" id="user_website"></div>
                                       <div class="col-md-12"><textarea placeholder="Comment *" name="user_comment" required="" id="user_comment"></textarea>
                                          <button type="submit">SUBMIT</button>
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
                      <div class="widget">
                        <h3 class="mini-title">category</h3>
                        <div class="category-widget blg-scrl-hgt mCustomScrollbar">
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
                                     @else   <img src="{{URL('public/images/default-small.jpg')}}" alt=""  width="30%"/>
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
                           @if(isset($tags_array))
                           @foreach(array_unique($tags_array) as $key=>$value)
                         
                           <a href="JavaScript:Void(0)" title="" class="tag_search" data-value="{{$key}}"><i class="fa fa-tags"></i>{{$value}}</a>
                           @endforeach  
                           @endif                        
                        </div>
                     </div>
                  </aside>
               </div>
            </div>
         </div>
                 <!-- Modal -->
<div id="myModal" class="modal fade login-popup" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
     
      <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="log-in-pop">
            <div class="log-in-pop-left">
               <!--h4>Login through social media</h4>
               <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                  </li>
                  <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                  </li>
                  <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                  </li>
               </ul-->
            </div>
            <div class="log-in-pop-right">
               <a href="#" class="pop-close" data-dismiss="modal"><img src="{{URL('UserAssets/images/cancel.png')}}" alt="">
               </a>
               <h4>Login</h4>
               <p>Don't have an account? Create your account. It's take less then a minutes</p>
               <form class="s12 ng-pristine ng-valid"   id="login_form">
                <input type="hidden" name="non_redirect" value="1">
                 {{ csrf_field()}}
                  <div>
                     <div class="input-field s12">
                        <input type="text" name="email" data-ng-model="name1" class="validate" placeholder="Email" required="true">
                     </div>
                  </div>
                  <div>
                     <div class="input-field s12">
                        <input type="password" name="password" class="validate" placeholder="Password" required="true">
                     </div>
                  </div>
                  <div>
                     <div class="input-field s4">
                        <input type="submit" value="Login" class="waves-button-input"> 
                       <div class="alert alert-danger" role="alert" style="display: none" id="login_fail">
                      </div> 
                        
                           <div class="alert alert-danger" role="alert" style="display: none" id="login_error">Invalid credentials
                           </div> 
                
               
               
                     </div>
                  </div>
                  <div>
                     <div class="input-field s12 popup_link"> <a href="{{route('forgot-password')}}">Forgot password</a> | <a href="{{route('User_register')}}">Create a new account</a> </div>
                  </div>
               </form>
             
            </div>
         </div></div>
    
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
                   }
           });
});

///comment///
$(function($) {
   $('#rating_form').validate({
       ignore:"hidden:not(select)",
   rules: {
        "day[]": "required",   
      "category":"required",    
       comment:
       { 
           required:true,           
       },   
       email:
       {   required:true,
           email: true ,
       },
        name:
       {   required:true,
          
       },
   },  
   messages: 
       {                 
         email: 
         {
           required: "Please Enter  Email",
           email:"Your email address must be in the format of name@domain.com",
           },
         comment:{
          required:"Please write a comment"
         },
            name:{
          required:"Please enter your name"
         }
       },
         highlight: function(element) {
           $(element).parent().addClass('has-error');
         },
         unhighlight: function(element) {
           $(element).parent().removeClass('has-error');
         },
             errorElement: 'span',
             errorClass: 'validation-error-message help-block form-helper bold',
             errorPlacement: function(error, element) {
               if (element.parent('.input-group').length) {
                 error.insertAfter(element.parent());
               } else {
                 error.insertAfter(element);
              }
            },
       submitHandler: function(form) 
       {
        if('{{Auth::id()}}'){
          $.ajax({
                type:'POST',
                url:"{{route('blog_comment')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                   { 
                    var response = $.parseJSON(data);
                    if(response.comment_sec)
                { 
                  $('#append').append(response.comment_sec);
                  $('.'+response.random)[0].scrollIntoView({behavior:"smooth",block:"start"});
                 }
                  if(response.fail){alert('failed');}
                   
                   
            
                   }
           });
          }
            else{

                $('#myModal').modal('show');

           } 
       }
       
   });
});

//rating
$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    $('#rating_field').val(ratingValue);
       
  });
  
  
});

///login form
$(function($) {
   $('#login_form').validate({
      rules: {
        email:
       {  email: true ,
         required:true          
       },
      password:{
            required:true
         }
   },  
   messages: 
       {  
         password:
         {
           required:'Please Enter Password', 
         },         
         email: 
         {
           required: "Please Enter  Email",
           email:"Your email address must be in the format of name@domain.com",
           remote: "Invalid Credentials"
         }
       },
         highlight: function(element) {
           $(element).parent().addClass('has-error');
         },
         unhighlight: function(element) {
           $(element).parent().removeClass('has-error');
         },
             errorElement: 'span',
             errorClass: 'validation-error-message help-block form-helper bold',
             errorPlacement: function(error, element) {
               if (element.parent('.input-group').length) {
                 error.insertAfter(element.parent());
               } else {
                 error.insertAfter(element);
              }
            },
       submitHandler: function(form) 
       { 
             $.ajax({
                type:'POST',
                url:"{{route('User_login')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                   {   
                    var status = $.parseJSON(data);                 
                   if(status.succ==1)
                   {
                   var user_name = $('#user_name').val();
                   var user_email = $('#user_email').val();
                   var rating_field = $('#rating_field').val();
                   var blog_id = $('.blog_id').val();
                    var user_website = $('#user_website').val();
                     var user_comment = $('#user_comment').val();

                   
                   $.ajax({
                      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:"{{route('blog_comment')}}",
                data:{'user_name':user_name,'user_email':user_email,'rating_field':rating_field,'blog_id':blog_id,'user_website':user_website,'user_comment':user_comment},
         
                success:function(data)
                   { 
                                
                    swal({
                              title:"Comment has been added",
                              icon:"success",
                              icon:"success",
                              button:"OK",
                              })
                              .then(function(){window.location = "{{url()->current()}}";}); 
            
                   }
           });
                   }
                         if(status.error){
                         $('#login_fail').css('display','block').html(status.error).fadeOut(7000);
                   }
                   }
           });
       } 
       
   });
});

</script>
@endsection('script')