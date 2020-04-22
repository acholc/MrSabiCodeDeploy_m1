@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Dashboard</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Dashboard</li>
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
                    <div class="col-lg-12">
                        <div class="widget-list row">
                            <!-- /.widget-holder -->
                            <div class="widget-holder col-3">
                                <div class="widget-bg">
                                    <div class="widget-body bg-secondary text-inverse px-4 pt-3 pb-4 radius-3">
                                        <div class="icon-box icon-box-centered flex-1 my-0 p-0">
                                            <header class="align-self-center">
											<a href="#" class="bg-grey fs-30 text-muted"><i class="lnr lnr-star  icon-lg"></i></a>
                                            </header>
                                            <section class="mt-0">
                                                <h6 class="icon-box-title my-0"><span class="counter">{{ count($rating) }}</span></h6>
                                                <p class="mb-0">Total Reviews</p>
                                            </section>
                                        </div>
                                        <!-- /.icon-box -->
                                    </div>
                                    <!-- /.widget-body -->
                                </div>
                                <!-- /.widget-bg -->
                            </div>
                            <!-- /.widget-holder -->
                            <div class="widget-holder col-3">
                                <div class="widget-bg">
                                    <div class="widget-body bg-danger text-inverse px-4 pt-3 pb-4 radius-3">
                                        <div class="icon-box icon-box-centered flex-1 my-0 p-0">
                                            <header class="align-self-center">
											<a href="{{ route('adm.listing') }}" class="bg-grey fs-30 text-muted"><i class="fa fa-list-alt icon-lg"></i></a>
                                            </header>
                                            <section class="mt-0">
                                                <h6 class="icon-box-title my-0"><span class="counter">{{ count($listing) }}</span></h6>
                                                <p class="mb-0">Business Listing</p>
                                            </section>
                                        </div>
                                        <!-- /.icon-box -->
                                    </div>
                                    <!-- /.widget-body -->
                                </div>
                                <!-- /.widget-bg -->
                            </div>
                            <!-- /.widget-holder -->
                            <div class="widget-holder col-3">
                                <div class="widget-bg">
                                    <div class="widget-body bg-info text-inverse px-4 pt-3 pb-4">
                                        <div class="icon-box icon-box-centered flex-1 my-0 p-0 radius-3">
                                            <header class="align-self-center"><a href="{{ route('adm.categories') }}" class="bg-grey fs-30 text-muted"><i class="lnr lnr-layers icon-lg"></i></a>
                                            </header>
                                            <section class="mt-0">
                                                <h6 class="icon-box-title my-0"><span class="counter">{{ count($category) }}</span></h6>
                                                <p class="mb-0">Categories</p>
                                            </section>
                                        </div>
                                        <!-- /.icon-box -->
                                    </div>
                                    <!-- /.widget-body -->
                                </div>
                                <!-- /.widget-bg -->
                            </div>
							<div class="widget-holder col-3">
                                <div class="widget-bg">
                                    <div class="widget-body bg-success text-inverse px-4 pt-3 pb-4 radius-3">
                                        <div class="icon-box icon-box-centered flex-1 my-0 p-0">
                                            <header class="align-self-center">
											<a href="{{route('adm.users')}}" class="bg-grey fs-30 text-muted"><i class="lnr lnr-users icon-lg"></i></a>
                                            </header>
                                            <section class="mt-0">
                                                <h6 class="icon-box-title my-0"><span class="counter">{{count($user)}}</span></h6>
                                                <p class="mb-0">Total Users</p>
                                            </section>
                                        </div>
                                        <!-- /.icon-box -->
                                    </div>
                                    <!-- /.widget-body -->
                                </div>
                                <!-- /.widget-bg -->
                            </div>
                            <!-- /.widget-holder -->
                        </div>
                        <!-- /.widget-list -->
                    </div>
                    <!-- /.col-lg-4 -->
                    <div class="col-lg-12">
                        <div class="widget-list">
                            <div class="widget-holder widget-full-height">
                                <div class="widget-bg">
									<div class="widget-heading">
										<h5 class="widget-title">User Traffic</h5>
										<!-- /.widget-actions -->
									</div>
                                    <div class="widget-body pb-4">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box icon-box-side icon-box-sm mr-3 my-0 ">
                                                
                                                <section class="traffic_box">
                                                    <h6 class="icon-box-title mb-0">By Time</h6>
                                                <select class="form-control">
                                                        <option>Last 15 days</option>
                                                        <option>Last 30 days</option>
                                                        <option>Last 6 months</option>
                                                        <option>Last 1 year</option>
                                                    </select>
                                                </section>
                                            </div>
                                            <!-- /.icon-box -->
                                            <div class="icon-box icon-box-side icon-box-sm mr-3 my-0">
                                                
                                                <section class="traffic_box">
                                                    <h6 class="icon-box-title mb-0">By Category</h6>
                                                <select class="form-control">
                                                        <option>Hospital</option>
                                                        <option>Hotel</option>
                                                        <option>Mechanics</option>
                                                        <option>Restaurants</option>
                                                        <option>Bars</option>
                                                    </select>
                                                </section>
                                            </div>
                                          
                                        </div>
                                        <!-- /.d-flex -->
                                        <div style="height: 300px; margin-top: 20px">
                                            <canvas id="chartsJsSiteStatistics"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.widget-body -->
                                </div>
                                <!-- /.widget-bg -->
                            </div>
                            <!-- /.widget-holder -->
                        </div>
                        <!-- /.widget-list -->
                    </div>
                    <!-- /.col-lg-8 -->
                </div>
                 <div class="row">
                        <div class="col-md-12 widget-holder">
                            <div class="widget-bg">
                                <div class="widget-heading clearfix">
                                    <h5>Recently Added Users</h5>
                                </div>
                                <!-- /.widget-heading -->
                                <div class="widget-body clearfix">
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
												<th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Date</th>                                              
                                                <th>Status</th>                                              
												</tr>
											</thead>
											<tbody>
											<?php foreach ($data as $key) {
                                                ?>                          
                                            <tr id="user_row">
												<td><img src="{{URL('/public/profile_pictures/')}}/{{$key->profile_image}}" class="img-user"></td>
                                                <td>{{$key->name}} {{$key->lastname}}</td>
                                                <td>{{$key->email}}</td>
                                                <td>06/02/2019</td>
                                                
                                                <td>@if($key->status==1) <label class="badge badge-primary">Active</label>
                                                @elseif($key->status==2)
                                                <label class="badge badge-danger">Inactive</label>
                                                @endif 
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
                        <!-- /.widget-holder -->
                    </div>
                    <!-- /.row -->
            </div>
            <!-- /.container -->
        </main>
        <!-- /.main-wrappper -->
@endsection('body')
