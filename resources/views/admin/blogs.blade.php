@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Blogs</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Blogs</li>
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
								<h5>Blogs
								<a href="{{route('adm.add-blog')}}" class="float-right btn btn-warning  btn-sm"><i class="fa fa-plus"></i> &nbsp; Add New </a>
								</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<div class="table-responsive">
									<table class="table table-striped" data-toggle="datatables" data-plugin-options='{"searching": false}'>
										<thead>
											<tr>
												<th>Title</th>
												
												<th>Categories</th>
												<th>Tags</th>
												<th>Date</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>				
												@if(isset($data))
												@php $i=1; @endphp
												@foreach($data as $blog)
											<tr class="user_row_{{ $blog['id'] }}">
												
												<td>{{ $blog['title'] }}</td>
												
												<td>
												    <?php  $category_name = ''; 
												    
												    foreach($blog['mycat'] as $cat )
												    {
												      
												        
    												    if($cat)
    												    {
    												        $category_name .= $cat[0]['category'].',';    
    												    }
												    
												   }
												  echo rtrim($category_name,',' );
												 ?> 
												    
												    </td>
												<td>
												<?php  $tag_name = ''; 
												    
												    foreach($blog['mytag'] as $tag )
												    {
				                                    
    												    if($tag)
    												    {
    												        $tag_name .= $tag[0]['tag_name'].',';    
    												    }
												    
												   }
												  echo rtrim($tag_name,',' );
												 ?> </td>
												
												@php 
												   $date= date("D, d M Y", strtotime( $blog['updated_at'] ));
                                                @endphp
												<td>{{ $date }}</td>
												<td>
																									
													<a href="{{route('adm.edit-blog',$blog['id'])}}" class="btn btn-primary btn-circle btn-sm ripple">
														<i data-toggle="tooltip" title="Edit"  class="list-icon lnr lnr-pencil"></i>
													</a>
													<a href="javascript:void(0)" class="btn btn-warning btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
														<i data-toggle="tooltip" title="Delete"  class="list-icon lnr lnr-trash" id="{{ $blog['id'] }}"></i>
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
///delete start///
		$('.lnr-trash').on('click',function(){
		    
       var id = $(this).attr('id'); 
  
     $('.yes_delete').on('click',function(){

             
              $('.modal-danger').modal('hide');
              $.ajax({       

                 
                  type:'POST',
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  url:"{{route('adm.delete_blog')}}",
                  data: {'id':id},                 
                  cache: false, 
                  success:function(data)
                  { 
                      var result = $.parseJSON(data);
                      if(result.status==102){
                          
                          swal({
						title: "Blog has been deleted",
						text: "Blog has been deleted",
						icon: "success",
						button: "OK",
						}).then(function() {
                	window.location.reload();
                });
						
						$(".user_row_"+id).hide();
                      	//$('#user_row').html('');
                      }
                      else
                      {
                      	
                      }                     

                    }
          });

    });
   
       

});
</script>
@endsection('script')
