@extends('Users.master')
@section('body')
<script>

    function changerate(id,rate){
        
        $(function () {
 
  $("#"+id).rateYo({
    rating: rate,
    readOnly: true
  });
 
});

}

</script>
<style>
   
</style>

     <section class="bred-crumb-sec" style="background-image: url('{{URL('public/page_images/brdcrmbbg.jpg')}}');">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Listings</h2>
                        <ul class="breadcrumbs">
                           <li><a href="{{route('/')}}" title="">Home</a></li>
                           <li>Listings</li>
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
                     <h3 class="mini-title min_titl" id="title">
                      @if(isset($search_for))<?php echo $search_for; ?>
                      @elseif($category_data){{$category_data[0]->category}} 
                      @endif</h3>
                      <button type="button" class="btn btn-info btn-lg" id="mob_model" data-toggle="modal" data-target="#filter_model">SEARCH</button>
                     <div class="filter-bar">
                        <span id="count">{{count($data)}} Results Found</span>
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
                     <div class="list-listings srch-lst-wst-sec">
                        <div class="row" id="data">
                           @if(count($data)>0)
                     @foreach($data as $key)

                           <div class="col-md-12">
                              <div class="recent-places-box list-style">
                                 <div class="recent-place-thumb mbwidth">
                                    <a href="{{route('listing-detail',$key->id)}}" title="">
            @if(!empty($key->image[0]['name']) && file_exists('public/images/'.$key->image[0]['name']))
                                      <img src="{{URL('public/images')}}/{{$key->image[0]['name']}}" alt="" />
                                     @else   <img src="{{URL('public/images/default-small.jpg')}}" alt="" />
                                     @endif
                                     </a>
                                 </div>
                                 <div class="recent-place-detail">
                                    <div class="listing-box-title">
                                       <h3><a href="{{route('listing-detail',$key->id)}}" title="">{{$key->title}}</a></h3>
                                       <span>{{$key->address}}</span>
                                       <?php $loc=$key->address; ?>
                                       <span>{{$key->phone}}</span>
                                    </div>
                                    <?php $tag[]=$key->tags;?>  
                                    <div class="listing-rate-share">
                                       <div class="rated-list">
                                            <div id="{{$key->id}}"></div>
                                             <script> changerate({{$key->id}},{{$key->overall_rating}}); </script>
                                            
                                                <!--@if($key->overall_rating>4.5)                                    -->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   @elseif($key->overall_rating>3.5)-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   @elseif($key->overall_rating>2.5)-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   @elseif($key->overall_rating>1.5)-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   @elseif($key->overall_rating>0)-->
                                                <!--   <b class="la la-star orng"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   @elseif($key->overall_rating==0)-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--   <b class="la la-star-o"></b>-->
                                                <!--@endif  -->
                                          <span>
                                            @if($key->total_reviews==0) No Review
                                            @elseif($key->total_reviews==1) (1) Review
                                            @elseif($key->total_reviews>1)  ({{$key->total_reviews }})  Reviews
                                            @endif
                                           </span>
                                       </div>
                                    </div>
                                    <div class="share-favourite mnfav" id="{{$key->id}}">
                             @if(Auth::id())      
                          <a href="javaScript:void(0)" title="" class="remove" style="text-decoration: none;">
                                <i 
                                          <?php 
                                          if(!empty($key->fav[0]['id'])){
                                          echo'class="la la-heart orng"';
                                          }
                                          else{
                                          echo'class="fa fa-heart-o"';
                                          }?>>                                  
                                </i>
                          </a>
                          @else   <a href="javaScript:void(0)" title="" class="remove" style="text-decoration: none;">
                                <i class="la la-heart-o"></i></a>
                          @endif

                            
                       
                                    </div>
                                 </div>
                              </div>
                           </div> 
                     @endforeach 
                     @else <div class="col-md-12">
                        <h3 class="text-center">No data found</h3>
                             </div>
                             @endif
                        
                        </div>
                     </div>
                     <div class="paginate">
                      {{$paginate->links('Users.default')}}
                    </div>
                  </div>
                  <aside class="col-md-4 column">
                     <form id="filter_form">
                      {{ csrf_field()}}
                     <div class="widget">
                        <h3 class="mini-title">SEARCH</h3>
                        <div class="search_widget">
                           <div class="side-search-form">
                             
                                 <div class="row">
                                    <div class="col-md-12">
                                       <input type="text" class="input-style" placeholder="Keywords" name="keywords" />
                                    </div>
                                    <div class="col-md-12">
                                       <select data-placeholder="All Locations" class="chosen-select" tabindex="2" name="location">
                     
                      <option value="">All Locations</option>
                      @foreach($address as $addresses)
                      <?php $add[]=$addresses->address; ?>
                      @endforeach
                      <?php $array_uni= array_unique($add);?>
                      @foreach($array_uni as $addres)
                      <option value="{{$addres}}"  <?php if($addres && isset($location)){echo($addres==$location)?"selected":""; }?>>{{$addres}}</option>
                          @endforeach                

                                       </select>
                                    </div>
                                    <div class="col-md-12">                                   
                                       <select data-placeholder="All Categories" class="chosen-select" tabindex="2" name="category" id="category">
                                           <option value="">All Categories</option>
                                          @foreach($category as $categories)
                                          <option value="{{$categories->id}}"  <?php if($category_data){ echo($category_data[0]->id==$categories->id)?"selected":"";  }?>>{{$categories->category}}</option>
                                          @endforeach                                 
                                       </select>
                                    </div>
                                 </div>
                           
                           </div>
                        </div>
                     </div>
                      <input type="submit" value="SEARCH" class="filter-btn">
                     <div class="widget">
                        <h3 class="mini-title">SEARCH BY TAG</h3>
                        <div  class="tags_widget tag-srl-secs" id="boxscroll">
                           <div class="filter-by-tags">
                              <div class="row">
                                 
                                       @foreach($address as $addresses)
                                       <?php 
                                       $array[]=explode(',',$addresses->tags);
                                       ?>
                                       @endforeach
                           <?php       
                                      $i=1;                                                           
                                      if (!is_array($array)) { 
                                        
                                                             } 
                                      $result = array(); 
                                      foreach ($array as $key => $value) { 
                                        if (is_array($value)) { 
                                          $result = array_merge($result, array_flatten($value)); 
                                        } 
                                        else { 
                                          $result[$key] = $value; 
                                        } 
                                      }
                                    
                           ?>
                                  @foreach(array_unique($result) as $key)
                                  @if(!empty($key)) 
                                  
                                 <div class="col-md-12">
                                    <p>
                                        <input class="styled-checkbox" id="styled-checkbox-{{$i}}" type="checkbox" value="{{$key}}" name="tags[]" <?php if(!isset($tags)){$tags='';} if($key==$tags){ echo 'checked="checked"'; }?>>
                                        <label for="styled-checkbox-{{$i}}">{{$key}}</label>
                                       <?php $i++?>
                                      
                                    </p>
                                 </div>
                                 @endif
                                   @endforeach                           
                                                      
                              </div>
                           </div>
                        </div>
                     </div>
                    <input type="submit" value="SEARCH" class="filter-btn">
                        </form>
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
  <!--   ////// -->
  
  <!-- Filter Model---->
  
  <div id="filter_model" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-body">
        
		
                     <form id="filter_popup">
                      {{ csrf_field()}}
                     <div class="widget">
                        <h3 class="mini-title">SEARCH</h3>
                        <div class="search_widget">
                           <div class="side-search-form">
                             
                                 <div class="row">
                                    <div class="col-md-12">
                                       <input type="text" class="input-style" placeholder="Keywords" name="keywords" />
                                    </div>
                                    <div class="col-md-12">
                                       <select data-placeholder="All Locations" class="chosen-select" tabindex="2" name="location">
                     
                      <option value="">All Locations</option>
                      @foreach($address as $addresses)
                      <?php $add[]=$addresses->address; ?>
                      @endforeach
                      <?php $array_uni= array_unique($add);?>
                      @foreach($array_uni as $addres)
                      <option value="{{$addres}}"  <?php if($addres && isset($location)){echo($addres==$location)?"selected":""; }?>>{{$addres}}</option>
                          @endforeach                

                                       </select>
                                    </div>
                                    <div class="col-md-12">                                   
                                       <select data-placeholder="All Categories" class="chosen-select" tabindex="2" name="category">
                                           <option value="">All Categories</option>
                                          @foreach($category as $categories)
                                          <option value="{{$categories->id}}"  <?php if($category_data){ echo($category_data[0]->id==$categories->id)?"selected":"";  }?>>{{$categories->category}}</option>
                                          @endforeach                                 
                                       </select>
                                    </div>
                                 </div>
                           
                           </div>
                        </div>
                     </div>
                      <input type="submit" value="SEARCH" class="filter-btn">
                     <div class="widget">
                        <h3 class="mini-title">SEARCH BY TAG</h3>
                        <div  class="tags_widget tag-srl-secs ">
                           <div class="filter-by-tags category-widget blg-scrl-hgt">
                              <div class="row">
                                 
                                       @foreach($address as $addresses)
                                       <?php 
                                       $array[]=explode(',',$addresses->tags);
                                       ?>
                                       @endforeach
                           <?php       
                                      $i=1;                                                           
                                      if (!is_array($array)) { 
                                        
                                                             } 
                                      $result = array(); 
                                      foreach ($array as $key => $value) { 
                                        if (is_array($value)) { 
                                          $result = array_merge($result, array_flatten($value)); 
                                        } 
                                        else { 
                                          $result[$key] = $value; 
                                        } 
                                      }
                                    
                           ?>
                                  @foreach(array_unique($result) as $key)
                                  @if(!empty($key)) 
                                  
                                 <div class="col-md-12">
                                    <p>
                                        <input class="styled-checkbox" id="styledd-checkbox-{{$i}}" type="checkbox" value="{{$key}}" name="tags[]" <?php if(!isset($tags)){$tags='';} if($key==$tags){ echo 'checked="checked"'; }?>>
                                        <label for="styledd-checkbox-{{$i}}">{{$key}}</label>
                                       <?php $i++?>
                                      
                                    </p>
                                 </div>
                                 @endif
                                   @endforeach                           
                                                      
                              </div>
                           </div>
                        </div>
                     </div>
                    <input type="submit" value="SEARCH" class="filter-btn">
                        </form>
                  
		
      </div>
     
    </div>

  </div>
</div>
  
  <!-- Filter Model---->
      </section>

@endsection('body')

@section('script')
<script>
   $(document).on('click','.remove',function(){
    if('{{Auth::id()}}'){

      var click = $(this);

   if($(this).find('i').hasClass('la la-heart orng')){
   var id=$(this).closest('.mnfav').attr('id');
  
    $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              type:'POST',
              url:"{{route('remove_favourite_listings')}}",
              data:{id:id},          
              success:function(data)
              {      
               if(data==1){
                 click.find('i').removeClass('la la-heart orng');                
                 click.find('i').addClass('fa fa-heart-o');                
                            }
               if(data==0){
               swal("Something went wrong, Try again");
               }           
               
              }
              });
   }
   if($(this).find('i').hasClass('fa fa-heart-o')){
       var id=$(this).closest('.mnfav').attr('id');
         $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              type:'POST',
              url:"{{route('Add_to_favorites')}}",
              data:{id:id},          
              success:function(data)
              {      
               if(data==1){
               click.find('i').addClass('la la-heart orng');                
                click.find('i').removeClass('fa fa-heart-o');               
                            }
               if(data==0){
               swal("Something went wrong, Try again");
               }         
               
              }
              });
   }}
   else{     
                $('#myModal').modal('show');
      

      }
});
</script>

<script>
    
    
    
$(function($) {
   $('#filter_form').validate({

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
                url:"{{route('filter_listings')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                   {
                      
                 var result= $.parseJSON(data);
                 $('#data').html(result.data);
                 $('#count').html(result.count+' Results Found');
                 $('#title').html(result.search_for);
                 $('#title')[0].scrollIntoView({behavior:"smooth",block:"start"});
                 $('.paginate').remove();
                 var length= result.ratearray.length;
                      var i;
                for (i = 0; i <= length; i++) {
                changerate(result.idarray[i], result.ratearray[i]);
                }
                   }
           });
               
            }       
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
                                 var id=$('.remove').closest('.mnfav').attr('id');
                                $.ajax({
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                type:'POST',
                                url:"{{route('Add_to_favorites')}}",
                                data:{id:id},          
                                success:function(data)
                                {      
                                 if(data==1){
                                    
                            swal({
                            title: "Login successfully",
                            text: "Listing added to favourite",
                            icon: "success",
                            button: "OK",
                            }).then(function()
                            { window.location="{{url()->current()}}";});       
                                 }
                                 if(data==0){
                                 swal("Something went wrong, Try again");
                                 } 
                                   if(data==2){
                                 swal({
                            title: "Login successfully",
                            text: "Listing added to favourite",
                            icon: "success",
                            button: "OK",
                            }).then(function()
                            { window.location="{{url()->current()}}";}); 
                                 }                             
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
    
//   $(document).on('load',function(){
//           function scrollFunction() {
//     $("#boxscroll, .blg-scrl-hgt").niceScroll({cursorborder:"",cursorcolor:"#ff9800",boxzoom:true}); // First scrollable DIV
//     }
     
//   });

$(".blg-scrl-hgt").mCustomScrollbar({
  
advanced: {
updateOnContentResize: true,

}
});
$(".blg-scrl-hgt").mCustomScrollbar({
  mouseWheelPixels: 50 //change this to a value, that fits your needs
})

/////
// $("html").niceScroll({horizrailenabled:false});
// $("html").css({"overflow-x":"hidden"});
// $("html").niceScroll(); 
// $("#mob_model").niceScroll();

// var bModalBody = $('#filter_model').find('.modal-body');

// $('#filter_model').on('shown.bs.modal', function(e){	
//   bModalBody.niceScroll({cursorborder:"",cursorcolor:"#ff9800",boxzoom:true,touchbehavior: true, autohidemode: false});
// })
// // $('#filter_model').on('hide.bs.modal', function(e){	
// //   bModalBody.niceScroll().remove();
// // });



</script>

<!--// popup-->
<script>
    $(function($) {
   $('#filter_popup').validate({

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
                url:"{{route('filter_listings')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                   { 
                 var result= $.parseJSON(data);
                 $('#data').html(result.data);
                 $('#count').html(result.count+' Results Found');
                 $('#title').html(result.search_for);
                 $('#title')[0].scrollIntoView({behavior:"smooth",block:"start"});
                 $('.paginate').remove();
                 $('#mob_model').remove();
                 $('#filter_model').modal('hide');
                
                   }
           });
               
            }       
   });
});


);




</script>

@endsection('script')
