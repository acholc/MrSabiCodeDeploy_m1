@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Pages</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Pages</li>
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
								<h5>Pages
								
								</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<div class="table-responsive">
									<table class="table table-striped" data-toggle="datatables" data-plugin-options='{"searching": false}'>
										<thead>
											<tr>
												<th>Sr. No.</th>
												<th>Title</th>
												<th>Date</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>				
											<!--								
											<tr id="user_row">
													@php 
												   $date= date("D, d M Y", strtotime( $home->updated_at ));
                                                @endphp
												<td>1</td>
												<td>{{ $home->title }}</td>
												<td>{{ $date }}</td>
												<td>
																									
													<a href="{{route('adm.home')}}" class="btn btn-primary btn-circle btn-sm ripple">
														<i data-toggle="tooltip" title="Edit" class="list-icon lnr lnr-pencil"></i>
													</a>
													
												</td>
											</tr>
											-->
											<tr id="user_row">
												@php 
												   $date= date("D, d M Y", strtotime( $aboutus_data->updated_at ));
                                                @endphp
												<td>2</td>
												<td>{{ $aboutus_data->title }}</td>
												<td>{{ $date }}</td>
												<td>
												<a href="{{route('adm.about_us')}}" class="btn btn-primary btn-circle btn-sm ripple">
														<i data-toggle="tooltip" title="Edit" class="list-icon lnr lnr-pencil"></i>
													</a>
												
												</td>
											</tr>
											
											<tr id="user_row">
												@php 
												   $date= date("D, d M Y", strtotime( $contact_data->updated_at ));
                                                @endphp
												<td>3</td>
												<td>{{ $contact_data->title }}</td>
												<td>{{ $date }}</td>
												<td>
													<a href="{{route('adm.contact')}}" class="btn btn-primary btn-circle btn-sm ripple">
														<i data-toggle="tooltip" title="Edit" class="list-icon lnr lnr-pencil"></i>
													</a>
												
												</td>
											</tr>
											
											<tr id="user_row">
													@php 
												   $date= date("D, d M Y", strtotime( $policy_data->updated_at ));
                                                @endphp
												<td>4</td>
												<td>{{ $policy_data->title }}</td>
												<td>{{ $date }}</td>
												<td>
													<a href="{{route('adm.privacy_policy')}}" class="btn btn-primary btn-circle btn-sm ripple">
														<i data-toggle="tooltip" title="Edit" class="list-icon lnr lnr-pencil"></i>
													</a>
													
												</td>
											</tr>
											<tr id="user_row">
												@php 
												   $date= date("D, d M Y", strtotime( $data->updated_at ));
                                                @endphp
												<td>5</td>
												<td>{{ $data->title }}</td>
												<td>{{ $date }}</td>
												<td>
												<a href="{{route('adm.terms')}}" class="btn btn-primary btn-circle btn-sm ripple">
														<i data-toggle="tooltip" title="Edit" class="list-icon lnr lnr-pencil"></i>
													</a>
												
												</td>
											</tr>						
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

