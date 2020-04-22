@extends('User.master')
@section('body')
	<section class="bred-crumb-sec">
		<div class="block no-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="inner-header">
							<h2>All Listing</h2>
							<ul class="breadcrumbs">
								<li><a href="#" title="">Home</a></li>
								<li>All Listing</li>
							</ul>	
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
				
					<div class="col-md-3">
                     <div class="fixed-bar fl-wrap">
                        <div class="user-profile-menu-wrap fl-wrap">
                           <div class="user-profile-img box-des-ns">
                              <div class="img-nds">
                                 <img src="{{URL('UserAsset/images/tutor-8.jpg')}}" class="img-responsive">
                                 <label class="edt-img" for="change-img">
                                 <i class="fa fa-pencil"></i> 
                                 <input type="file" id="change-img" style="visibility:hidden; width:0px; height:0px;">
                                 </label>
                              </div>
                              <p class="user_name">John Kazantzis</p>
                           </div>
                           <!-- user-profile-menu-->
                           <div class="user-profile-menu">
                              <ul>
                                 <li><a href="#"><i class="fa fa-tachometer"></i>Dashboard</a></li>
                                 <li><a href="{{route('edit-profile')}}"><i class="fa fa-user-o"></i> Profile</a></li>
                              </ul>
                           </div>
                           <!-- user-profile-menu end-->
                           <!-- user-profile-menu-->
                           <div class="user-profile-menu">
                              <ul>
                                 <li><a href="#" class="db_active"><i class="fa fa-th-list"></i> My listings  </a></li>
                                 <li><a href="{{route('add-listing')}}"><i class="fa fa-plus-square-o"></i> Add New</a></li>
                              </ul>
                           </div>
                           <!-- user-profile-menu end-->                                        
                           <a href="#" class="log-out-btn">Log Out</a>
                        </div>
                     </div>
                  </div>
				
					<div class="col-md-9">
						<div class="list-listings">
							<div class="row">

								<?php
								foreach ($listing as $key){
                                ?>								 	
								 
								<div class="col-md-12" id="row">
									<div class="recent-places-box list-style">
										<div class="recent-place-thumb mbwidth">
											<a href="#" title=""><img src="" alt="" /></a>
										</div>
										<div class="recent-place-detail">
											<div class="listing-box-title">
												<h3><a href="#" title="">{{$key->title}}</a></h3>
												<span>{{$key->address}}</span>
												<span>{{$key->phone}}</span>
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
											<div class="edit-delete edit-delete-listing">
												<a class="edit-listing" href="{{route('edit-listing',['id' => $key->id])}}" title=""><i class="la la-pencil"></i> EDIT</a>
												<button type="button" class="del-listing delete"  class="delete" id="{{$key->id}}"><i class="la la-trash-o" ></i> Delete</button>
											</div>
										</div>
									</div>
								</div>

							<?php	} ?>
					
					
						
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
				</div>
			</div>
		</div>
	</section>
@endsection('body')	

@section('script')
<script>
	
$('.delete').on('click',function(){
    var id = $(this).attr('id');     
    $.ajax({       

                 
                   type:'POST',
                   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                   url:"{{route('delete-listing')}}",
                   data: {'id':id},                 
                   cache: false, 
                   success:function(data)
                   { 
                      var result = $.parseJSON(data);
                      if(result.status==102){
                      	$('#row').html('');
                      }
                      else{
                      	alert('failed');
                      }                     

                    }
           });       

});






</script>

@endsection('script')




