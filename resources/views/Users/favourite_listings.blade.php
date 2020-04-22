@extends('Users.master')
@section('body')

 <section class="bred-crumb-sec" style="background-image: url('{{URL('public/page_images/brdcrmbbg.jpg')}}');">
    <div class="block no-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-header">
              <h2>Favourite listing</h2>
              <ul class="breadcrumbs">
                <li><a href="{{route('/')}}" title="">Home</a></li>
                <li>Favourite Listings</li>
              </ul> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@if(count($listing)>0)
<section id="section" class="data_class">
    <div class="block gray">
      <div class="container">
        <div class="row">       
          <div class="col-md-12">
            <div class="list-listings">
              <div class="row">                          
                        @foreach($listing as $key)               
                        
                <div class="col-md-12" id="{{$key->id}}" >
                  <div class="recent-places-box list-style removeclass">
                    <div class="recent-place-thumb mbwidth">
                      <a href="{{route('listing-detail',$key->id)}}" title="">  
                        @if(!empty($key->image[0]['name']) && file_exists('public/images/'.$key->image[0]['name']))
                                      <img src="{{URL('public/images')}}/{{$key->image[0]['name']}}" alt="" />
                        @else         <img src="{{URL('public/images/default-small.jpg')}}" alt="" />
                        @endif
                      </a>
                    </div>
                    <div class="recent-place-detail">
                      <div class="listing-box-title">
                        <h3><a href="{{route('listing-detail',$key->id)}}" title="">{{$key->title}}</a></h3>
                        <span>{{$key->address}}</span>
                        <span>{{$key->phone}}</span>
                      </div>
                      <div class="listing-rate-share">
                         <div class="rated-list">
                                                @if($key->overall_rating>4.5)                                    
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   @elseif($key->overall_rating>3.5)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($key->overall_rating>2.5)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($key->overall_rating>1.5)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($key->overall_rating>0)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($key->overall_rating==0)
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                @endif  
                                          <span>
                                            @if($key->total_reviews==0) No Review
                                            @elseif($key->total_reviews==1) (1) Review
                                            @elseif($key->total_reviews>1)  ({{$key->total_reviews }})  Reviews
                                            @endif
                                           </span>
                                       </div>
                      </div>
                      <div class="edit-delete edit-delete-listing">
                    <a  class="del-listing delete ml-0"  id="{{$key->id}}"><i class="la la-trash-o" ></i>Remove</a>
                      </div>
                    </div>
                  </div>
                </div>

            @endforeach
              
                    <div class="pagination">
               {{$paginate->links('Users.default')}}  
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  @else   <div class="inner-header">
              <h3>You don't have any listing yet</h3>
            
            </div>
            @endif
  <!--MODAL SECTION-->
    <div class="modal fade delete-modal" id="deleteModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure, you want to delete it?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-orange" data-dismiss="modal">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    <!--MODAL SECTION END-->
  
@endsection('body')

@section('script')
<script>
  $('.delete').on('click',function(){
  var id=$(this).attr('id');
  swal({
  title: "Are you sure?",
  text: "Want to remove listing from favorites?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete)
 {
     $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              type:'POST',
              url:"{{route('remove_favourite_listings')}}",
              data:{id:id},          
              success:function(data)
              {      
               if(data==1){
                  $('.Add_to_favorites').html('<i class="fa fa-trash"></i>Remove from favorites');
                   $('#'+id).animate({"opacity": 0,"left":"-1000px" },800, function() {
                $(this).hide();
             });
                   if($('.removeclass').length==0){
            $('.pagination').remove();
            $('#section').html('<div class="inner-header"><h3>You do not have any listing yet</h3></div>');
            }
              $('#'+inner-header).html('');

               }
               if(data==0){
               swal("Something went wrong, Try again");
               }           
               
              }
              });   


  }
});



  


  });

</script>
@endsection('script')

