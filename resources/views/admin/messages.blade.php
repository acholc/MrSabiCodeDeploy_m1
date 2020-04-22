@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Messages</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Messages</li>
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
						<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<div class="table-responsive">
									<table class="table table-striped" data-toggle="datatables" data-plugin-options='{"searching": false}'>
										<thead>
											<tr>
												<th>Name</th>
												<th>Email</th>
												<th style="width: 198px;">Subject</th>
												<th>Message</th>
												<th style="width:74px">Recieved at</th>
												<th  style="width:91px">Action</th>
											</tr>
										</thead>
										<tbody>	
									
								       @if($data)
								       @foreach($data as $key)
											<tr class="user_row"  id="{{$key['id']}}">
											
												<td>{{$key['name']}}</td>
												<td>{{$key['email']}}</td>
												<td>{{$key['subject']}}</td>
												<td style="text-overflow: hidden;"><p>{{$key['message']}}</p></td>
												<td>{{$key['created_at']}}</td>
											<!-- <td><label class="badge badge-success">Active</label></td> -->
												<td>
													<a href="{{route('adm.view_message',$key['id'])}}" data-toggle="modal" data-target="#myModal" title="View" class="btn btn-view-listing btn-circle btn-sm ripple">
														<i  data-toggle="tooltip" title="View"  class="list-icon lnr lnr-eye"></i>
													</a>
													<a href="javascript:void(0)"  class="btn btn-warning btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
														<i data-toggle="tooltip" title="Delete"  class="list-icon lnr lnr-trash"></i>
													</a>
												</td>
											</tr>
										
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
       ================/////////modal//////////////==================
       <div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header d-block text-center">
          <!--button type="button" class="close" data-dismiss="modal">&times;</button-->
          <h4 class="modal-title">Message</h4>
        </div>
        <div class="modal-body" style="font-size:14px">
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default adm-btn-blk" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
 ================/////////modal//////////////==================
    </div>
    <!-- /.content-wrapper -->
@endsection('body')

@section('script')
<script>
$('.lnr-trash').on('click',function(){
var id=$(this).closest('.user_row').attr('id');
var it=$(this);
$('.yes_delete').on('click',function(){
                 $('.delete-pop').modal('hide');
    	        $.ajax({ 
						type:'POST',
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						url:"{{route('adm.delete_messages')}}",
						data: {'id':id},                 
						cache: false, 
						success:function(data)
                    { 
                     if(data==1){it.closest('.user_row').animate({"opacity": 0,"left":"-1000px" }, 1000, function() {
                $(this).hide();
             });
                         
                     }

                    }
          });
});
});

//view message=====
$(document).on('click','.btn-view-listing',function(){
$('#myModal').find('.modal-body').load($(this).attr('href'));    
    
});


</script>
<script>
jQuery(document).ready(function($) {
	$('p').each(function(index, value) {
		 $(this).html($(this).html().substring(0, 90)+'...'); // number of characters
	});
});
</script>
@endsection('script')
