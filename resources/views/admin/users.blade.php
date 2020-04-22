@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Users List</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Users List</li>
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
								<h5>Users List
								<a href="{{route('adm.add-user')}}" class="float-right btn btn-warning  btn-sm"><i class="fa fa-plus"></i> &nbsp; Add New </a>
								</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<div class="table-responsive">
									<table class="table table-striped" data-toggle="datatables" data-plugin-options='{"searching": false}'>
										<thead>
											<tr>
												<th>Image</th>
												<th>Full Name</th>
												<th>Email</th>
												<th>Date</th>												
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>				
												<?php foreach ($data as $key) {
												?>							
											<tr class="user_row_{{$key->id}}">
											    @if($key->profile_image)
												<td><img src="{{url('/')}}/public/profile_pictures/{{$key->profile_image}}" class="user_profile"></td>
											
										           @else
											     	<td><img src="{{url('/')}}/public/profile_pictures/dummimage.jpeg" class="user_profile"></td>
										    	@endif
												
												<td>{{$key->name}} {{$key->lastname}}</td>
												
												@php 
												   $try= date("D, d M Y", strtotime($key->created_at));
                                                @endphp
												<td>{{$key->email}}</td>
												<td>{{ $try }}</td>
												
							   
								      <td id="{{$key->id}}"> 

								      	<input type="checkbox" 
								      	 data-toggle="toggle" id="{{$key->id}}" class="checkbox" data-style="ios"
                                         name='my_checkbox'
                                          <?php echo ($key->status==1)?"checked":"" ?>
								      	
								      	 >                         
                                      </td>
                                 
												<!-- <td><label class="badge badge-success">Active</label></td> -->
												<td>
													
													<a href="{{route('adm.edit-user',$key->id)}}" class="btn btn-primary btn-circle btn-sm ripple">
														<i data-toggle="tooltip" title="Edit" class="list-icon lnr lnr-pencil"></i>
													</a>
													<a href="javascript:void(0)" class="btn btn-warning btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
														<i data-toggle="tooltip" data-placement="top" title="Delete" class="list-icon lnr lnr-trash" id="{{$key->id}}"></i>
													</a>
												</td>
											</tr>
										<?php } ?>


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
@endsection('body')        
       
@section('script')
	<script>
		$(document).ready(function() {
		  $('.side-menu li:first-child').removeClass('current-page active');
		  $('.side-menu li:nth-child(2)').addClass('current-page active');
		});

///delete start///
		$('.lnr-trash').on('click',function(){
    var id = $(this).attr('id');  
    
    $('.yes_delete').on('click',function(){

             
               $('.modal-danger').modal('hide');
               $.ajax({       

                 
                   type:'POST',
                   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                   url:"{{route('adm.delete-user')}}",
                   data: {'id':id},                 
                   cache: false, 
                   success:function(data)
                   { 
                      var result = $.parseJSON(data);
                      if(result.status==102){
                          swal({
						title: "User has been deleted",
						text: "User has been deleted",
						icon: "success",
						button: "OK",
						});
                      	$(".user_row_"+id).hide();
                      	//$('#user_row').html('');
                      }
                      else{
                      	
                      }                     

                    }
           });

    });   
       

});
///delete end///


$('.checkbox').on('change',function(){
    var id=$(this).attr('id');
    
   if($(this).is(':checked')){
                        var status='1';
                        $.ajax({ 
						type:'POST',
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						url:"{{route('adm.change_user_status')}}",
						data: {'id':id,'status':status},                 
						cache: false, 
						success:function(data)
                    { 
                       

                    }
           });}
   else{ 
         var status='2';
       $.ajax({ 
						type:'POST',
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						url:"{{route('adm.change_user_status')}}",
						data: {'id':id,'status':status},                 
						cache: false, 
						success:function(data)
                    { 
                

                    }
           });}
});


</script>
<script>
		

</script>
@endsection('script')