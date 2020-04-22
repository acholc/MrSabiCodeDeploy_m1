<?php include 'header.php';?>
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Appointments</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Appointments</li>
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
                <div class="widget-list">
                    <!-- Events List -->
                    <div class="col-md-12 widget-holder widget-full-content px-0">
                        <div class="widget-bg">
                            <div class="widget-body">
                                <div class="row no-gutters">
									<!-- /.col-md-3 -->
                                    <div class="col-12">
                                        <div class="custom-fullcalendar row fullcalendar" id="fullcalendar-1" data-toggle="fullcalendar" data-plugin-options='{ "events" : "assets/js/events-sample.json"}'></div>
                                        <!-- /.fullcalendar -->
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script src="ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/custom.js"></script>
	<script>
		$(document).ready(function() {
		  $('.side-menu li:first-child').removeClass('current-page active');
		  $('.side-menu li:nth-child(5)').addClass('current-page active');
		});
	</script>
</body>
</html>