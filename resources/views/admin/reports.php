<?php include 'header.php';?>
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Reports</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Reports</li>
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
								<h5>Reports				
								</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<div class="row">
									<div class="col-md-6 widget-holder widget-full-content widget-full-height mt-0">
										<div class="widget-bg p-0">
											<div class="widget-body chart-widget clearfix">
												<div class="card border-0">
													<div class="card-header border-0">
														<h5 class="sub-heading-font-family mt-3">Events Statistics</h5>
														<div style="height: 300px" class="my-4 pr-4">
															<canvas id="chartJsHorizontalBar"></canvas>
														</div>
													</div>
												</div>
												<!-- /.card -->
											</div>
											<!-- /.widget-body -->
										</div>
										<!-- /.widget-bg -->
									</div>
									<!-- /.widget-holder -->
									<div class="col-md-6 widget-holder widget-full-content widget-full-height mt-0">
										<div class="widget-bg p-0">
											<div class="widget-body chart-widget clearfix">
												<div class="card border-0">
													<div class="card-header border-0">
														<h5 class="sub-heading-font-family mt-3">Users Statistics</h5>
														<div style="height: 300px" class="my-4 pr-3">
															<canvas id="chartJsBar"></canvas>
														</div>
													</div>
												</div>
												<!-- /.card -->
											</div>
											<!-- /.widget-body -->
										</div>
										<!-- /.widget-bg -->
									</div>
									<div class="col-md-12 widget-holder">
										<div class="widget-bg">
											<div class="widget-body clearfix">
												<h5 class="box-title">Recording Statistics</h5>
												<canvas id="chartJsArea" height="150"></canvas>
											</div>
											<!-- /.widget-body -->
										</div>
										<!-- /.widget-bg -->
									</div>
									
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
    <script src="ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <script src="assets/vendors/charts/utils.js"></script>
    <script src="ajax/libs/countup.js/1.9.2/countUp.min.js"></script>
    <script src="ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/custom.js"></script>
	<script>
		$(document).ready(function() {
		  $('.side-menu li:first-child').removeClass('current-page active');
		  $('.side-menu li:nth-child(6)').addClass('current-page active');
		});
	</script>
</body>
</html>