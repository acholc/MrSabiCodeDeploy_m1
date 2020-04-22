@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">User Details</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">User Details</li>
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
					<div class="col-md-4 widget-holder">
						<div class="box-im-set bg-cngss">
							<div class="img-srt-bt">
								<img src="{{URL('/public/profile_pictures/')}}/{{$data->profile_image}}" class="img-usr">
							</div>
							<h5 class="m-0 mt-3">{{$data->name}}</h5>
							<ul class="fllowzz">
								<li> <a href="javascript:void(0)" data-toggle="modal" data-target="#followers-list">120 Followers </a> </li>
								<li> <a href="javascript:void(0)" data-toggle="modal" data-target="#following-list">141 Following </a> </li>
							</ul>
						</div>
						<div>
							<div class="widget-bg">
								<div class="widget-body pt-0">
									<div class="widget-profile">
										<ul class="list-unstyled profile-info-list mr-t-40">
											<li class="media align-items-center"><span class="thumb-xs mr-3"><span class="user-char-image bg-success text-inverse"><i class="fa fa-envelope"></i></span></span>
												<div class="media-body">
													<h6 class="content-color">Email Address </h6>
													<p class="text-muted mb-0"><a href="#" class="text-muted">{{$data->email}}</a>
													</p>
												</div>
												<!-- /.media-body -->
											</li>
											<li class="media align-items-center"><span class="thumb-xs mr-3"><span class="user-char-image bg-success text-inverse"><i class="fa fa-phone"></i></span></span>
												<div class="media-body">
													<h6 class="content-color">Phone Number </h6>
													<p class="text-muted mb-0"><a href="#" class="text-muted">{{$data->phone}}</a>
													</p>
												</div>
												<!-- /.media-body -->
											</li>
											<li class="media align-items-center"><span class="thumb-xs mr-3"><span class="user-char-image bg-success text-inverse"><i class="fa fa-map-marker"></i></span></span>
												<div class="media-body">
													<h6 class="content-color">Location </h6>
													<p class="text-muted mb-0"><a href="#" class="text-muted">123 Demo Street, California USA</a>
													</p>
												</div>
												<!-- /.media-body -->
											</li>
										</ul>
									</div>
									<!-- /.widget-profile -->
								</div>
								<!-- /.widget-body -->
							</div>
							<!-- /.widget-bg -->
						</div>
						<!-- /.widget-bg -->
					</div>
					<div class="col-md-8 widget-holder">
						<div class="widget-bg">
							<div class="widget-body">
								<div class="tabs tabs-desig-nw">
									<ul class="nav nav-tabs">
										<li class="nav-item"><a class="nav-link active" href="#home-tab" data-toggle="tab" aria-expanded="true">Events</a>
										</li>
										<li class="nav-item"><a class="nav-link " href="#profile-tab" data-toggle="tab" aria-expanded="true">Recordings</a>
										</li>
									</ul>
									<!-- /.nav-tabs -->
									<div class="tab-content">
										<div class="tab-pane active" id="home-tab">
											<div class="box-schs">
												<ul class="widget-user-activities-detail">
													<li class="media">
														<div class="link--title link-ws">
															<a href="#" class="h6">
															<i class="fa fa-link col-prpl"></i> &nbsp; https://us04web.demo.us/j/197852512</a>
														</div>
														<!-- /.media-body -->
														<p>Mauris diam erat, fringilla sed massa tincidunt, accumsan cursus turpis. Vivamus sodales ut velit sed bibendum. Pellentesque sed lorem ut risus rhoncus tincidunt eu nec orci. Proin massa libero.
														</p>
														<div class="time-chms"> <i class="fa fa-clock-o"></i> 12 Hours ago </div>
													</li>
												</ul>
											</div>	
											<div class="box-schs">
												<ul class="widget-user-activities-detail">
													<li class="media">
														<div class="link--title link-ws">
															<a href="#" class="h6">
															<i class="fa fa-link col-prpl"></i> &nbsp; https://us04web.demo.us/j/19234234</a>
														</div>
														<!-- /.media-body -->
														<p>Pellentesque sed lorem ut risus rhoncus tincidunt eu nec orci. Proin massa libero.
														</p>
														<div class="time-chms"> <i class="fa fa-clock-o"></i> 2 Days ago </div>
													</li>
												</ul>
											</div>	
											<div class="box-schs">
												<ul class="widget-user-activities-detail">
													<li class="media">
														<div class="link--title link-ws">
															<a href="#" class="h6">
															<i class="fa fa-link col-prpl"></i> &nbsp; https://us04web.demo.us/j/42342223</a>
														</div>
														<!-- /.media-body -->
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad libero.
														</p>
														<div class="time-chms"> <i class="fa fa-clock-o"></i> 6 Days ago </div>
													</li>
												</ul>
											</div>												
										</div>
										<div class="tab-pane " id="profile-tab">
											<div class="row">
                                        <div class="col-md-6 mr-b-30 d-flex">
                                            <div class="blog-post blog-post-card text-center">
                                                <figure>
                                                    <a href="https://www.youtube.com/watch?v=9xwazD5SyVg" class="mfp-iframe" data-toggle="lightbox" data-type="iframe">
															<img src="assets/img/img1.jpg" alt="">
														<span class="triangle-top-right newa"></span>
														</a>
                                                </figure>
                                                <header>
                                                    <ul class="blog-post-share-links list-unstyled list-inline">
                                                        <li class="list-inline-item"><a href="javascript:void(0)" class="bg-danger ripple toggle-link"><i class="list-icon social-icons">sharethis</i></a>
                                                        </li>
                                                        <li class="list-inline-item">
															<a href="javascript:void(0)" class="bg-facebook ripple icon-show" data-toggle="tooltip" data-placement="bottom" title="Text message" data-original-title="Text message">
																<i class="fa fa-commenting-o"></i>
															</a>
                                                        </li>
                                                        <li class="list-inline-item">
															<a href="javascript:void(0)" class="bg-twitter ripple icon-show" data-toggle="tooltip" data-placement="bottom" title="Link Send" data-original-title="Link Send">
																<i class="fa fa-link"></i> 
															</a>
                                                        </li>
                                                        <li class="list-inline-item">
															<a href="javascript:void(0)" class="bg-dribbble ripple icon-show" data-toggle="tooltip" data-placement="bottom" title="Email" data-original-title="Email">
																<i class="fa fa-envelope-o"></i>
															</a>
                                                        </li>
														<li class="list-inline-item">
															<a href="javascript:void(0)" class="bg-linkedin ripple icon-show" data-toggle="tooltip" data-placement="bottom" title="through this site with a teacher" data-original-title="through this site with a teacher">
																<i class="fa fa-globe"></i>
															</a>
                                                        </li>
													</ul>
                                                    <div class="block text-muted blog-post-tags"><b>  Date: </b> 2 Days ago
                                                    </div>
                                                    <h4 class="h3 fw-300 m-1 blog-post-title">Recording One</h4>
                                                </header>
                                               
                                            </div>
                                            <!-- /.blog-post -->
                                        </div>
                                        <!-- /.col-md-4 -->
                                        <div class="col-md-6 mr-b-30 d-flex">
                                            <div class="blog-post blog-post-card text-center">
                                                <figure>
                                                    <a href="https://www.youtube.com/watch?v=9xwazD5SyVg" class="mfp-iframe" data-toggle="lightbox" data-type="iframe">
															<img src="assets/img/img2.jpg" alt="">
														<span class="triangle-top-right newa"></span>
														</a>
                                                </figure>
                                                <header>
                                                    <ul class="blog-post-share-links list-unstyled list-inline">
                                                        <li class="list-inline-item"><a href="javascript:void(0)" class="bg-danger ripple toggle-link"><i class="list-icon social-icons">sharethis</i></a>
                                                        </li>
                                                        <li class="list-inline-item">
															<a href="javascript:void(0)" class="bg-facebook ripple icon-show" data-toggle="tooltip" data-placement="bottom" title="Text message" data-original-title="Text message">
																<i class="fa fa-commenting-o"></i>
															</a>
                                                        </li>
                                                        <li class="list-inline-item">
															<a href="javascript:void(0)" class="bg-twitter ripple icon-show" data-toggle="tooltip" data-placement="bottom" title="Link Send" data-original-title="Link Send">
																<i class="fa fa-link"></i> 
															</a>
                                                        </li>
                                                        <li class="list-inline-item">
															<a href="javascript:void(0)" class="bg-dribbble ripple icon-show" data-toggle="tooltip" data-placement="bottom" title="Email" data-original-title="Email">
																<i class="fa fa-envelope-o"></i>
															</a>
                                                        </li>
														<li class="list-inline-item">
															<a href="javascript:void(0)" class="bg-linkedin ripple icon-show" data-toggle="tooltip" data-placement="bottom" title="through this site with a teacher" data-original-title="through this site with a teacher">
																<i class="fa fa-globe"></i>
															</a>
                                                        </li>
													</ul>
                                                    <div class="block text-muted blog-post-tags"><b>  Date: </b> 5 Days ago
                                                    </div>
                                                    <h4 class="h3 fw-300 m-1 blog-post-title">Recording Two</h4>
                                                </header>
                                               
                                            </div>
                                            <!-- /.blog-post -->
                                        </div>
                                        <!-- /.col-md-4 -->
                                        <div class="col-md-6 mr-b-30 d-flex">
                                            <div class="blog-post blog-post-card text-center">
                                                <figure>
                                                    <a href="https://www.youtube.com/watch?v=9xwazD5SyVg" class="mfp-iframe" data-toggle="lightbox" data-type="iframe">
															<img src="assets/img/img3.jpg" alt="">
														<span class="triangle-top-right newa"></span>
														</a>
                                                </figure>
                                                <header>
                                                    <ul class="blog-post-share-links list-unstyled list-inline">
                                                        <li class="list-inline-item"><a href="javascript:void(0)" class="bg-danger ripple toggle-link"><i class="list-icon social-icons">sharethis</i></a>
                                                        </li>
                                                        <li class="list-inline-item">
															<a href="javascript:void(0)" class="bg-facebook ripple icon-show" data-toggle="tooltip" data-placement="bottom" title="Text message" data-original-title="Text message">
																<i class="fa fa-commenting-o"></i>
															</a>
                                                        </li>
                                                        <li class="list-inline-item">
															<a href="javascript:void(0)" class="bg-twitter ripple icon-show" data-toggle="tooltip" data-placement="bottom" title="Link Send" data-original-title="Link Send">
																<i class="fa fa-link"></i> 
															</a>
                                                        </li>
                                                        <li class="list-inline-item">
															<a href="javascript:void(0)" class="bg-dribbble ripple icon-show" data-toggle="tooltip" data-placement="bottom" title="Email" data-original-title="Email">
																<i class="fa fa-envelope-o"></i>
															</a>
                                                        </li>
														<li class="list-inline-item">
															<a href="javascript:void(0)" class="bg-linkedin ripple icon-show" data-toggle="tooltip" data-placement="bottom" title="through this site with a teacher" data-original-title="through this site with a teacher">
																<i class="fa fa-globe"></i>
															</a>
                                                        </li>
													</ul>
                                                    <div class="block text-muted blog-post-tags"><b>  Date: </b> 12 Days ago
                                                    </div>
                                                    <h4 class="h3 fw-300 m-1 blog-post-title">Recording Three</h4>
                                                </header>
                                               
                                            </div>
                                            <!-- /.blog-post -->
                                        </div>
										<div class="col-md-6 mr-b-30 d-flex">
                                            <div class="blog-post blog-post-card text-center">
                                                <figure>
                                                    <div id="lightbox-popup-video" class="lightbox">
														<a href="https://www.youtube.com/watch?v=9xwazD5SyVg" class="mfp-iframe" data-toggle="lightbox" data-type="iframe">
															<img src="assets/img/img4.jpg" alt="">
														<span class="triangle-top-right newa"></span>
														</a>
													</div>
                                                </figure>
                                                <header>
                                                    <ul class="blog-post-share-links list-unstyled list-inline">
                                                        <li class="list-inline-item"><a href="javascript:void(0)" class="bg-danger ripple toggle-link"><i class="list-icon social-icons">sharethis</i></a>
                                                        </li>
                                                        <li class="list-inline-item">
															<a href="javascript:void(0)" class="bg-facebook ripple icon-show" data-toggle="tooltip" data-placement="bottom" title="Text message" data-original-title="Text message">
																<i class="fa fa-commenting-o"></i>
															</a>
                                                        </li>
                                                        <li class="list-inline-item">
															<a href="javascript:void(0)" class="bg-twitter ripple icon-show" data-toggle="tooltip" data-placement="bottom" title="Link Send" data-original-title="Link Send">
																<i class="fa fa-link"></i> 
															</a>
                                                        </li>
                                                        <li class="list-inline-item">
															<a href="javascript:void(0)" class="bg-dribbble ripple icon-show" data-toggle="tooltip" data-placement="bottom" title="Email" data-original-title="Email">
																<i class="fa fa-envelope-o"></i>
															</a>
                                                        </li>
														<li class="list-inline-item">
															<a href="javascript:void(0)" class="bg-linkedin ripple icon-show" data-toggle="tooltip" data-placement="bottom" title="through this site with a teacher" data-original-title="through this site with a teacher">
																<i class="fa fa-globe"></i>
															</a>
                                                        </li>
													</ul>
                                                    <div class="block text-muted blog-post-tags"><b>  Date: </b> 2 weeks ago
                                                    </div>
                                                    <h4 class="h3 fw-300 m-1 blog-post-title">Recording Four</h4>
                                                </header>
                                               
                                            </div>
                                            <!-- /.blog-post -->
                                        </div>
                                        <!-- /.col-md-4 -->
                                    </div>
										</div>
									</div>
									<!-- /.tab-content -->
								</div>
								<!-- /.tabs -->
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
	
	<div class="modal fade" id="followers-list" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title" id="myLargeModalLabel">Followers List</h5>
				</div>
				<div class="modal-body">
					<ul class="widget-user-activities scrollbar-enabled">
						<li class="media">
							<figure class="user--online thumb-xs2">
								<a href="#">
									<img class="rounded-circle" src="assets/demo/users/4.jpg" alt="">
								</a>
							</figure>
							<div class="media-body">
								<a href="#" class="single-user-name">Joseph S. Ferland</a>  
								<small>@joseph_ro</small>
								<a class="dropdown btn-de" href="user-details.php"> View Details</a>
							</div>
							<!-- /.media-body -->
						</li>
						<!-- /.media -->
						<li class="media">
							<figure class="user--online thumb-xs2">
								<a href="#">
									<img class="rounded-circle" src="assets/demo/users/2.jpg" alt="">
								</a>
							</figure>
							<div class="media-body"><a href="#" class="single-user-name">
								Sebastion Mechel</a>  
								<small>@sebMechel</small>
								<a class="dropdown btn-de" href="user-details.php"> View Details</a>
								<!-- /.dropdown -->
							</div>
							<!-- /.media-body -->
						</li>
						<!-- /.media -->
						<li class="media">
							<figure class="user--busy thumb-xs2">
								<a href="#">
									<img class="rounded-circle" src="assets/demo/users/3.jpg" alt="">
								</a>
							</figure>
							<div class="media-body"><a href="#" class="single-user-name">Milosz Pasternak</a>  <small>@Milo_P</small>
								<a class="dropdown btn-de" href="user-details.php"> View Details</a>
								<!-- /.dropdown -->
							</div>
							<!-- /.media-body -->
						</li>
						<!-- /.media -->
						<li class="media">
							<figure class="thumb-xs2">
								<a href="#">
									<img class="rounded-circle" src="assets/demo/users/1.jpg" alt="">
								</a>
							</figure>
							<div class="media-body"><a href="#" class="single-user-name">Betty Smith</a>  <small>@bettySmith</small>
								<a class="dropdown btn-de" href="user-details.php"> View Details</a>
								<!-- /.dropdown -->
							</div>
							<!-- /.media-body -->
						</li>
						<!-- /.media -->
						<li class="media">
							<figure class="thumb-xs2">
								<a href="#">
									<img class="rounded-circle" src="assets/demo/users/5.jpg" alt="">
								</a>
							</figure>
							<div class="media-body"><a href="#" class="single-user-name">Edgar J. Crawford</a>  <small>@eddieCrawford</small>
								<a class="dropdown btn-de" href="user-details.php"> View Details</a>
								<!-- /.dropdown -->
							</div>
							<!-- /.media-body -->
						</li>
						<li class="media">
							<figure class="user--busy thumb-xs2">
								<a href="#">
									<img class="rounded-circle" src="assets/demo/users/3.jpg" alt="">
								</a>
							</figure>
							<div class="media-body"><a href="#" class="single-user-name">Milosz Pasternak</a>  <small>@Milo_P</small>
								<a class="dropdown btn-de" href="user-details.php"> View Details</a>
								<!-- /.dropdown -->
							</div>
							<!-- /.media-body -->
						</li>
						<!-- /.media -->
						<li class="media">
							<figure class="thumb-xs2">
								<a href="#">
									<img class="rounded-circle" src="assets/demo/users/1.jpg" alt="">
								</a>
							</figure>
							<div class="media-body"><a href="#" class="single-user-name">Betty Smith</a>  <small>@bettySmith</small>
								<a class="dropdown btn-de" href="user-details.php"> View Details</a>
								<!-- /.dropdown -->
							</div>
							<!-- /.media-body -->
						</li>
						<!-- /.media -->
						<li class="media">
							<figure class="thumb-xs2">
								<a href="#">
									<img class="rounded-circle" src="assets/demo/users/5.jpg" alt="">
								</a>
							</figure>
							<div class="media-body"><a href="#" class="single-user-name">Edgar J. Crawford</a>  <small>@eddieCrawford</small>
								<a class="dropdown btn-de" href="user-details.php"> View Details</a>
								<!-- /.dropdown -->
							</div>
							<!-- /.media-body -->
						</li>
						<!-- /.media -->
					</ul>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	
	<div class="modal fade" id="following-list" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title" id="myLargeModalLabel">Followers List</h5>
				</div>
				<div class="modal-body">
					<ul class="widget-user-activities scrollbar-enabled">
						<li class="media">
							<figure class="user--online thumb-xs2">
								<a href="#">
									<img class="rounded-circle" src="assets/demo/users/4.jpg" alt="">
								</a>
							</figure>
							<div class="media-body">
								<a href="#" class="single-user-name">Joseph S. Ferland</a>  
								<small>@joseph_ro</small>
								<a class="dropdown btn-de" href="user-details.php"> View Details</a>
							</div>
							<!-- /.media-body -->
						</li>
						<!-- /.media -->
						<li class="media">
							<figure class="user--online thumb-xs2">
								<a href="#">
									<img class="rounded-circle" src="assets/demo/users/2.jpg" alt="">
								</a>
							</figure>
							<div class="media-body"><a href="#" class="single-user-name">
								Sebastion Mechel</a>  
								<small>@sebMechel</small>
								<a class="dropdown btn-de" href="user-details.php"> View Details</a>
								<!-- /.dropdown -->
							</div>
							<!-- /.media-body -->
						</li>
						<!-- /.media -->
						<li class="media">
							<figure class="user--busy thumb-xs2">
								<a href="#">
									<img class="rounded-circle" src="assets/demo/users/3.jpg" alt="">
								</a>
							</figure>
							<div class="media-body"><a href="#" class="single-user-name">Milosz Pasternak</a>  <small>@Milo_P</small>
								<a class="dropdown btn-de" href="user-details.php"> View Details</a>
								<!-- /.dropdown -->
							</div>
							<!-- /.media-body -->
						</li>
						<!-- /.media -->
						<li class="media">
							<figure class="thumb-xs2">
								<a href="#">
									<img class="rounded-circle" src="assets/demo/users/1.jpg" alt="">
								</a>
							</figure>
							<div class="media-body"><a href="#" class="single-user-name">Betty Smith</a>  <small>@bettySmith</small>
								<a class="dropdown btn-de" href="user-details.php"> View Details</a>
								<!-- /.dropdown -->
							</div>
							<!-- /.media-body -->
						</li>
						<!-- /.media -->
						<li class="media">
							<figure class="thumb-xs2">
								<a href="#">
									<img class="rounded-circle" src="assets/demo/users/5.jpg" alt="">
								</a>
							</figure>
							<div class="media-body"><a href="#" class="single-user-name">Edgar J. Crawford</a>  <small>@eddieCrawford</small>
								<a class="dropdown btn-de" href="user-details.php"> View Details</a>
								<!-- /.dropdown -->
							</div>
							<!-- /.media-body -->
						</li>
						<li class="media">
							<figure class="user--busy thumb-xs2">
								<a href="#">
									<img class="rounded-circle" src="assets/demo/users/3.jpg" alt="">
								</a>
							</figure>
							<div class="media-body"><a href="#" class="single-user-name">Milosz Pasternak</a>  <small>@Milo_P</small>
								<a class="dropdown btn-de" href="user-details.php"> View Details</a>
								<!-- /.dropdown -->
							</div>
							<!-- /.media-body -->
						</li>
						<!-- /.media -->
						<li class="media">
							<figure class="thumb-xs2">
								<a href="#">
									<img class="rounded-circle" src="assets/demo/users/1.jpg" alt="">
								</a>
							</figure>
							<div class="media-body"><a href="#" class="single-user-name">Betty Smith</a>  <small>@bettySmith</small>
								<a class="dropdown btn-de" href="user-details.php"> View Details</a>
								<!-- /.dropdown -->
							</div>
							<!-- /.media-body -->
						</li>
						<!-- /.media -->
						<li class="media">
							<figure class="thumb-xs2">
								<a href="#">
									<img class="rounded-circle" src="assets/demo/users/5.jpg" alt="">
								</a>
							</figure>
							<div class="media-body"><a href="#" class="single-user-name">Edgar J. Crawford</a>  <small>@eddieCrawford</small>
								<a class="dropdown btn-de" href="user-details.php"> View Details</a>
								<!-- /.dropdown -->
							</div>
							<!-- /.media-body -->
						</li>
						<!-- /.media -->
					</ul>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
@endsection('body')
@section('script')
	<script>
		$(document).ready(function() {
		  $('.side-menu li:first-child').removeClass('current-page active');
		  $('.side-menu li:nth-child(2)').addClass('current-page active');
		});
	</script>
@endsection('script')