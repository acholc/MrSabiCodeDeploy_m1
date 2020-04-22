<?php include 'header.php';?>
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Add Event</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add Event</li>
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
							<div class="widget-body">
								 <div class="row">
									<div class="col-md-8">
										<div class="tabs tabs-desig-nw">
											<ul class="nav nav-tabs">
												<li class="nav-item"><a class="nav-link active" href="#home-tab" data-toggle="tab" aria-expanded="true">Event Details</a>
												</li>
												<li class="nav-item"><a class="nav-link " href="#profile-tab" data-toggle="tab" aria-expanded="true">Invites</a>
												</li>
											</ul>
											<!-- /.nav-tabs -->
											<div class="tab-content">
												<div class="tab-pane active" id="home-tab">
													<div class="row">
														<div class="col-lg-12">
															<div class="form-group">
																<label for="l30">Add Link</label>
																<input class="form-control" id="l30" placeholder="Username" type="text">
															</div>
														</div>
														
														<div class="col-lg-12">
															<div class="form-group">
																<label for="l30">Description</label>
																<textarea class="form-control" type="text" rows="4"></textarea>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane " id="profile-tab">
													<div class="row">
														<div class="col-md-12">
															<div id="p_scents">
																<div class="row">
																	<div class="col-sm-12">
																		<form class="form-inline pd-b-30">
																			<label class="block-invt"> Add Email address </label>
																			<input type="email" class="form-control flex-1 mr-2 pd-tb-15 px-4" id="email" placeholder="Add Email address">
																			<a href="javascript:void(0)" id="addScnt" class="btn btn-success text-uppercase fw-700 pd-tb-15 px-3"><i class="fa fa-plus"></i></a>
																		</form>
																	</div>
																</div>
															</div>
															<div class="or-tct">
																<span> Or </span>
															</div>
															<a href="javascript:void(0)" class="shr-in" data-toggle="modal" data-target="#friends-list" data-dismiss="modal"> Add from Followers List </a>
														</div>
													</div>
												</div>
											</div>
											<!-- /.tab-content -->
										</div>
										<div class="row">
											<div class="col-lg-12 mt-4">
												<div class="form-actions btn-list">
													<button class="btn btn-primary" type="button">Add Event</button>
													<button class="btn btn-outline-default" type="button">Cancel</button>
												</div>
											</div>
										</div>
									</div>
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
	
	<div class="modal fade" id="friends-list" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 class="modal-title" id="myLargeModalLabel">Invite Users</h5>
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
							<a class="dropdown btn-de" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Invite </a>
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
							<a class="dropdown btn-de bck-invt" href="#"><i class="fa fa-check" aria-hidden="true"></i> Invited </a>
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
							<a class="dropdown btn-de bck-invt" href="#"><i class="fa fa-check" aria-hidden="true"></i> Invited </a>
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
							<a class="dropdown btn-de" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Invite</a>
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
							<a class="dropdown btn-de" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Invite</a>
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
							<a class="dropdown btn-de bck-invt" href="#"><i class="fa fa-check" aria-hidden="true"></i> Invited</a>
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
							<a class="dropdown btn-de" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Invite</a>
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
							<a class="dropdown btn-de" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Invite</a>
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
	
	
    <footer class="footer text-center">
        <div class="container"><span>Copyright @ 2019. All rights reserved</span>
        </div>
        <!-- /.container -->
    </footer>
    </div>
    <!-- Scripts -->
    <script src="ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="ajax/libs/metisMenu/2.7.9/metisMenu.min.js"></script>
    <script src="ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="ajax/libs/countup.js/1.9.2/countUp.min.js"></script>
    <script src="ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
    <script src="ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <script src="ajax/libs/jqvmap/1.5.1/jquery.vmap.js"></script>
    <script src="ajax/libs/jqvmap/1.5.1/maps/jquery.vmap.usa.js"></script>
    <script src="ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
	<script src="ajax/libs/datatables/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/template.js"></script>
	<script src="assets/js/custom.js"></script>
	<script>
		$(function() {
			var scntDiv = $('#p_scents');
			var i = $('#p_scents p');
			$('#addScnt').click(function() {
					$('<div class="row click-rmv"><div class="col-sm-12"><form class="form-inline pd-b-30"><input type="email" class="form-control flex-1 mr-2 pd-tb-15 px-4" id="email" placeholder="Add Email address"><a href="javascript:void(0)" id="remScnt" class="btn btn-danger text-uppercase fw-700 pd-tb-15 px-3 remScnt"><i class="fa fa-minus"></i></a></form></div></div>').appendTo(scntDiv);
					i++;
					return false;
			});
			$(document).on('click','.remScnt',function() { 
				$(this).closest('.click-rmv').remove();
				return false;
			});
		});
	</script>
	<script>
		$(document).ready(function() {
		  $('.side-menu li:first-child').removeClass('current-page active');
		  $('.side-menu li:nth-child(3)').addClass('current-page active');
		});
	</script>
</body>
</html>