@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Best Deals</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Best Deals</li>
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
								<h5>Deals
								<a href="{{route('adm.add-deal')}}" class="float-right btn btn-warning  btn-sm"><i class="fa fa-plus"></i> &nbsp; Add New </a>
								</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<div class="table-responsive">
									<table class="table table-striped" data-toggle="datatables" data-plugin-options='{"searching": false}'>
										<thead>
											<tr>
												<th>Sr No</th>
												<th>Business Name</th>
												<th>Coupon Code</th>
												<th>Discount</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>				
											@if(isset($data['deal_list']))
											@php $i=1; @endphp
						                	@foreach($data['deal_list'] as $deal)						
											<tr class="user_row_{!! $deal['id']  !!}">
												
												<td>{{ $i }}</td>
												<td>@if($deal['business_info']) {{ $deal['business_info']['title']  }} @endif</td>
											
												<td><span class="badge badge-primary">{{ $deal['coupon_code'] }}</span></td>
												<td>{{ $deal['discount'] }}</td>
												
												<td>
													<a href="{{route('adm.edit-deals',$deal['id'])}}"  data-toggle="tooltip" title="Edit" class="btn btn-primary btn-circle btn-sm ripple">
														<i data-toggle="tooltip" title="Edit"  class="list-icon lnr lnr-pencil"></i>
													</a>
													<a href="javascript:void(0)"  class="btn btn-warning btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
														<i data-toggle="tooltip" title="Delete" class="list-icon lnr lnr-trash" id="{!! $deal['id']  !!}"></i>
													</a>
												</td>
											</tr>
										    @php $i++; @endphp
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
                  url:"{{route('adm.delete_deal')}}",
                  data: {'id':id},                 
                  cache: false, 
                  success:function(data)
                  { 
                      var result = $.parseJSON(data);
                      if(result.status==102){
                          
                          swal({
						title: "Deal has been deleted",
						text: "Deal has been deleted",
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
///delete end///

</script>
@endsection('script')
