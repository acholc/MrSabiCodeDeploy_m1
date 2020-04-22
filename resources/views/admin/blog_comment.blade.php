@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Blog Review</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Blog Review</li>
                            </ol>
                        </div>
                        <!-- /.page-title-right -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.page-title -->
            <!-- =================================== -->
            <div class="container">
                <div class="row">
					<div class="col-md-12 widget-holder">
						<div class="widget-bg">
							<div class="widget-heading clearfix">
								<h5>Blog Review
								<a href="{{route('adm.add-listing')}}" class="float-right btn btn-warning  btn-sm"><i class="fa fa-plus"></i> &nbsp; Add New </a>
								</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<div class="table-responsive">
									<table class="table table-striped" data-toggle="datatables" data-plugin-options='{"searching": false}'>
										<thead>
											<tr>
												<th>Sr No</th>
												<th>User Name</th>
												<th>Blog</th>
												<th>Comment</th>
												<th>Ratings</th>
												
											
												<th>Action</th>
											</tr>
										</thead>
										<tbody>	
										
								       @if(isset($data['blog_review']))
								       @php $i=1; @endphp
								       @foreach($data['blog_review'] as $reviews)
											<tr class="user_row_{{ $reviews['id'] }}">
												<td>{{ $i }}</td>
												<td>@if($reviews['user_info']){{ $reviews['user_info']['name'] }} @endif</td>
												<td>@if($reviews['blog_info']){{ $reviews['blog_info']['title'] }} @endif</td>
												<td>{{ $reviews['comment'] }}</td>
												<td><div class="rating-score">
                                                 
                                                   @if($reviews['rating']==5)                                    
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   @elseif($reviews['rating']==4)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($reviews['rating']==3)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($reviews['rating']==2)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($reviews['rating']==1)
                                                   <b class="la la-star orng"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   @elseif($reviews['rating']==0)
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                   <b class="la la-star-o"></b>
                                                @endif 
												</div></td>
												
												
												<!-- <td><label class="badge badge-success">Active</label></td> -->
												<td>
													<a href="javascript:void(0)"  class="btn btn-primary btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
														<i data-toggle="tooltip" title="Delete"  class="list-icon lnr lnr-trash" id="{{ $reviews['id'] }}" ></i>
													</a>
												</td>
											</tr>
											@php $i++ @endphp
										@endforeach
										@endif
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.widget-body -->
						</div>
						<!-- /.widget-bg -->
					</div>
               </div>
            </div>

            <!-- /.container -->
        </main>
        <!-- /.main-wrappper -->
       
    </div>
    <!-- /.content-wrapper -->
@endsection('body')

@section('script')
<script>

	$('.lnr-trash').on('click',function(){
       var id = $(this).attr('id'); 
     $('.yes_delete').on('click',function(){

             
              $('.modal-danger').modal('hide');
              $.ajax({       

                 
                  type:'POST',
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  url:"{{route('adm.delete_comment')}}",
                  data: {'id':id},                 
                  cache: false, 
                  success:function(data)
                  { 
                      var result = $.parseJSON(data);
                      if(result.status==102){
                          
                          swal({
						title: "Review has been deleted",
						text: "Review has been deleted",
						icon: "success",
						button: "OK",
						}).then(function() {
                	window.location.reload();
                });
						
						$(".user_row_"+id).hide();
                      	//$('#user_row').html('');
                      }
                                        

                  }
          });

    });
   
       

});

</script>
@endsection('script')
