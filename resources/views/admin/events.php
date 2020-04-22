<?php include 'header.php';?>
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Events List</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Events List</li>
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
								<h5>Events List
								<a href="add-event.php" class="float-right btn btn-primary btn-sm"><i class="fa fa-plus"></i> &nbsp; Add New </a>
								
								</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<select class="events-sa">
									<option> All Events </option>
									<option> Live Events </option>
									<option> Future Events </option>
									<option> Past Events </option>
								</select>
								<div class="table-responsive">
									<table class="table table-striped" data-toggle="datatables" data-plugin-options='{"searching": false}'>
										<thead>
											<tr>
												<th>Event Link</th>
												<th>Added By</th>
												<th>Event Date</th>
												<th>Total Invites</th>
												
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<a href="#">   https://us04web.demo.us/j/197852512 </a>
												</td>
												<td><a href="user-details.php"> john122 </a></td>
												<td>12/06/2019 at 12:40am</td>
												<td><a href="event-details.php"> 20 Users </a></td>
												
												<td>
													<a href="#" class="btn btn-primary btn-circle btn-sm ripple" data-toggle="tooltip" data-placement="bottom" title="Join Event" data-original-title="Join Event">
														<i class="list-icon fa fa-user-plus"></i>
													</a>
													<a href="javascript:void(0)" class="btn btn-danger btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
														<i class="list-icon lnr lnr-trash"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="#">   https://us04web.demo.us/j/192342434 </a>
												</td>
												<td><a href="user-details.php"> marry122 </a></td>
												<td>22/06/2019 at 10:30am</td>
												<td><a href="event-details.php"> 13 Users </a></td>
											
												<td>
													<a href="#" class="btn btn-info btn-circle btn-sm ripple" data-toggle="tooltip" data-placement="bottom" title="Already Joined" data-original-title="Already Joined">
														<i class="list-icon fa fa-check"></i>
													</a>
													<a href="javascript:void(0)" class="btn btn-danger btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
														<i class="list-icon lnr lnr-trash"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="#">   https://us04web.demo.us/j/197234232 </a>
												</td>
												<td><a href="user-details.php"> johnson142 </a></td>
												<td>18/05/2019 at 08:40am</td>
												<td><a href="event-details.php"> 12 Users </a></td>
												
												<td>
													<a href="#" class="btn btn-primary btn-circle btn-sm ripple" data-toggle="tooltip" data-placement="bottom" title="Join Event" data-original-title="Join Event">
														<i class="list-icon fa fa-user-plus"></i>
													</a>
													<a href="javascript:void(0)" class="btn btn-danger btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
														<i class="list-icon lnr lnr-trash"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="#">   https://us04web.demo.us/j/1345435334 </a>
												</td>
												<td><a href="user-details.php"> chriton122 </a></td>
												<td>05/03/2019 at 11:40am</td>
												<td><a href="event-details.php"> 14 Users </a></td>
											
												<td>
													<a href="#" class="btn btn-info btn-circle btn-sm ripple" data-toggle="tooltip" data-placement="bottom" title="Already Joined" data-original-title="Already Joined">
														<i class="list-icon fa fa-check"></i>
													</a>
													<a href="javascript:void(0)" class="btn btn-danger btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
														<i class="list-icon lnr lnr-trash"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="#">   https://us04web.demo.us/j/1972234234 </a>
												</td>
												<td><a href="user-details.php"> dennial142 </a></td>
												<td>12/04/2019 at 12:40am</td>
												<td><a href="event-details.php"> 52 Users </a></td>
												
												<td>
													<a href="#" class="btn btn-primary btn-circle btn-sm ripple" data-toggle="tooltip" data-placement="bottom" title="Join Event" data-original-title="Join Event">
														<i class="list-icon fa fa-user-plus"></i>
													</a>
													<a href="javascript:void(0)" class="btn btn-danger btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
														<i class="list-icon lnr lnr-trash"></i>
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
	
	
	
<div class="modal fade" id="invited-users" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 class="modal-title" id="myLargeModalLabel">Invited Users List</h5>
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
							<a class="dropdown btn-de" href="#"> View Details</a>
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
							<a class="dropdown btn-de" href="#"> View Details</a>
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
							<a class="dropdown btn-de" href="#"> View Details</a>
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
							<a class="dropdown btn-de" href="#"> View Details</a>
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
							<a class="dropdown btn-de" href="#"> View Details</a>
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
							<a class="dropdown btn-de" href="#"> View Details</a>
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
							<a class="dropdown btn-de" href="#"> View Details</a>
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
							<a class="dropdown btn-de" href="#"> View Details</a>
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
	
    <!-- /.content-wrapper -->
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
		$(document).ready(function() {
		  $('.side-menu li:first-child').removeClass('current-page active');
		  $('.side-menu li:nth-child(3)').addClass('current-page active');
		});
	</script>
</body>
</html>