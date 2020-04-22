@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Business Listings</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Business Listing</li>
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
								<h5>Listing
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
												<th>Created By</th>
												<th>Category</th>
												<th>Business Name</th>
												<th>Ratings</th>
												<th>Created at</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>	
										<?php  $i=1; ?>
								       @if($data)
								       @foreach($data as $key)
											<tr class="user_row"  id="{{$key->id}}">
												<td>{{$i}}</td>
												<td>{{$key->user[0]['name']}}</td>
												<td>{{$key->category[0]['category']}}</td>
												<td>{{$key->title}}</td>
												<td><div class="rating-score">
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
												</div></td>
												<td>{{$key->created_at}}</td>
												<td id="32"> 

								      	<input 
								      	 type="checkbox" 
								      	 data-toggle="toggle" data-style="ios"
                                         name='my_checkbox' <?php echo ($key->status==1)?"checked":"" ?> class="checkbox">                         
                                      </td>
												<!-- <td><label class="badge badge-success">Active</label></td> -->
												<td>
													<a href="{{route('adm.view-listing',$key->id)}}"  data-toggle="tooltip" title="View"class="btn btn-view-listing btn-circle btn-sm ripple">
														<i  data-toggle="tooltip" title="View"  class="list-icon lnr lnr-eye"></i>
													</a>
													<a href="{{route('adm.edit-listing',$key->id)}}"  data-toggle="tooltip" title="Edit" class="btn btn-primary btn-circle btn-sm ripple">
														<i data-toggle="tooltip" title="Edit"  class="list-icon lnr lnr-pencil"></i>
													</a>
													<a href="javascript:void(0)"  class="btn btn-warning btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
														<i data-toggle="tooltip" title="Delete"  class="list-icon lnr lnr-trash"></i>
													</a>
												</td>
											</tr>
											<?php $i++; ?>
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
var id=$(this).closest('.user_row').attr('id');
var it=$(this);
$('.yes_delete').on('click',function(){
                 $('#delete_modal').modal('hide');
    	        $.ajax({ 
						type:'POST',
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						url:"{{route('delete-listing')}}",
						data: {'id':id},                 
						cache: false, 
						success:function(data)
                    { 
                         window.location="{{URL()->current()}}";

                    }
           });
});
});

$('.checkbox').on('change',function(){
    var id=$(this).closest('.user_row').attr('id');
   if($(this).is(':Checked')){
                        var status='1';
                        $.ajax({ 
						type:'POST',
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						url:"{{route('adm.change_listing_status')}}",
						data: {'id':id,'status':status},                 
						cache: false, 
						success:function(data)
                    { 
                       

                    }
           });}
   else{ 
         var status='0';
       $.ajax({ 
						type:'POST',
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						url:"{{route('adm.change_listing_status')}}",
						data: {'id':id,'status':status},                 
						cache: false, 
						success:function(data)
                    { 
                

                    }
           });}
});
</script>
@endsection('script')
