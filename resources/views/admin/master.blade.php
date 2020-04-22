<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png')}}" sizes="16x16" href="{{URL('adminasset/assets/img/favicon.png')}}">
    <link rel="stylesheet" href="{{URL('adminasset/assets/css/pace.css')}}">
    <title>MrSabi</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700')}}" rel="stylesheet" type="text/css">
    <link href="{{URL('adminasset/assets/vendors/feather-icons/feather.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL('adminasset/assets/vendors/linear-icons/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL('adminasset/assets/vendors/mono-social-icons/monosocialiconsfont.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL('adminasset/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL('adminasset/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{URL('adminasset/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL('adminasset/ajax/libs/select2/4.0.5/css/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL('adminasset/ajax/libs/jqvmap/1.5.1/jqvmap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL('adminasset/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{URL('adminasset/ajax/libs/datatables/1.10.18/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css">
<!-- 	<link href="{{URL('adminasset/assets/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css"> -->
	<link href="{{URL('adminasset/assets/css/chosen.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL('adminasset/assets/css/style.css')}}" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="{{URL('UserAssets/dist/min/dropzone.min.css')}}" type="text/css" />
   <link href="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/css/bootstrap-timepicker.min.css" rel="stylesheet" /> 
   
       <!-- Bootstrap -->
   <link rel="stylesheet" href="{{URL('UserAssets/css/line-awesome.min.css')}}" type="text/css" />
    <script src="{{URL('adminasset/assets/js/modernizr.min.js')}}"></script>
	
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script data-pace-options='{ "ajax": false, "selectors": [ "img" ]}' src="{{URL('adminasset/assets/js/pace.min.js')}}"></script>
     <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body data-sidebar-skin="dark" data-header-skin="light" data-navbar-brand-skin="dark" data-sidebar-state="expand">
    <div id="wrapper" class="wrapper">
        <nav class="navbar">
            <div class="container-fluid px-0 align-items-stretch">
                <!-- Logo Area -->
                <div class="navbar-header">
                    <a href="{{route('adm.admin')}}" class="navbar-brand">
                        <img class="logo-expand" alt="" src="{{URL('UserAssets/images/white-mr-sabi.png')}}">
                        <img class="logo-collapse" alt="" src="{{URL('UserAssets/images/white-mr-sabi.png')}}" width="50%">
                    </a>
                </div>
                <!-- /.navbar-header -->
                <!-- Left Menu & Sidebar Toggle -->
                <ul class="nav navbar-nav">
                    <li class="sidebar-toggle dropdown"><a href="javascript:void(0)" class="ripple"><span><i class="list-icon lnr lnr-menu"></i></span></a>
                    </li>
                </ul>
                <!-- /.navbar-left -->
                <!-- Search Form -->
                <form class="navbar-search d-none d-sm-block" role="search"><i class="list-icon lnr lnr-magnifier"></i> 
                    <input type="search" class="search-query" placeholder="Search anything..."> <a href="javascript:void(0);" class="remove-focus"><i class="lnr lnr-cross"></i></a>
                </form>
                <!-- /.navbar-search -->
                <div class="spacer"></div>
                <?php
                  $class= App\Notifications::where('seen',0)->orderBy('created_at','DESC')->limit(4)->get()->toArray();
                   // echo "<pre>";
                   //       print_r($class);die();  
                  $new_add=array();
                  foreach ($class as $key)
                         {
                            $key['user']= App\User::where('id',$key['user_id'])->first()->toArray();
                            $key['lisitng']=App\listing::where('id',$key['reviewed_id'])->first();
                            $key['blog']= App\Blog::where('id',$key['commented_id'])->first();
                            $key['added_list']= App\listing::where('id',$key['added_list_id'])->first();
                            $key['edited_list']= App\listing::where('id',$key['edited_list_id'])->first();   
                            $new_add[]=$key;
        
                         }    

                ?>
                <!-- Right Menu -->
                 @if(!empty($new_add))
                <ul class="nav navbar-nav d-none d-lg-flex ml-2 ml-0-rtl">
                  
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>
                        <i class="list-icon lnr lnr-alarm"></i> <span class="button-pulse bg-warning"></span> </span>Notifications</a>
                        <div class="dropdown-menu dropdown-left dropdown-card animated flipInY">
                            <div class="card">
                                <ul class="card-body list-unstyled dropdown-list-group">
                                    @foreach($new_add as $key)
                                    <li id="{{$key['id']}}" class="notif_row">                   
                            <a href="#" class="notif"><span class="d-flex thumb-xs2 user--online"><img src="{{URL('public/profile_pictures/')}}/{{$key['user']['profile_image']}}" class="rounded-circle" alt=""> </span><span class="media-body"><span class="heading-font-family media-heading">{{$key['user']['name']}}</span> <span class="media-content">
                               

                                    <small>
                                       
                                    @if($key['type']==1) register as a new user
                                    @elseif($key['type']==2) has reset account password
                                    @elseif($key['type']==3) has added the new listing<a href="{{route('adm.edit-listing',$key['added_list']['id'])}}">{{$key['added_list']['title']}}  
                                    </a>
                                    @elseif($key['type']==4) has edited the listing<a href="{{route('adm.edit-listing',$key['edited_list']['id'])}}">{{$key['edited_list']['title']}}  
                                    </a> 
                                    @elseif($key['type']==5) has reviewed the listing<a href="{{route('adm.edit-listing',$key['lisitng']['id'])}}">{{$key['lisitng']['title']}}  
                                    </a>
                                     @elseif($key['type']==6) has commented on the blog<a href="{{route('adm.view_blog',$key['blog']['id'])}}">{{$key['blog']['title']}}  
                                    </a>
                                    @endif
                           </small>
                           </span></span></a>           
                                </li>

                            @endforeach
                                 
                                </ul>
                                <!-- /.dropdown-list-group -->
                                <footer class="card-footer text-center">
									<a href="{{route('adm.notifications')}}" class="btn btn-link text-danger fs-12">See all notifications</a>
                                </footer>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.dropdown-menu -->
                    </li>
                </ul>
                @else    <ul class="nav navbar-nav d-none d-lg-flex ml-2 ml-0-rtl">
                  
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>
                        <i class="lnr lnr-alarm"></i></span>No new notification</a>
                    </li>
                </ul>
                @endif
                <!-- /.navbar-right -->
                <!-- User Image with Dropdown -->
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle dropdown-toggle-user ripple" data-toggle="dropdown"><span class="avatar thumb-xs">

                        <img id="profile_picture" src="{{URL('public/profile_pictures/')}}/{{Auth::User()->profile_image}}" class="rounded-circle" alt="" >
                         <i class="list-icon lnr lnr-chevron-down">
                         </i></span></a>
                        <div class="dropdown-menu dropdown-left dropdown-card dropdown-card-profile animated flipInY">
                            <div class="card">
								<ul class="list-unstyled card-body">
                                    <li class="">
                        <a href="{{route('adm.profile-settings')}}"><i class="list-icon lnr lnr-user"></i> <span class="hide-menu">Profile Settings</span></a>
                                    </li>
                                 
                                    <li><a href="{{route('adm.logout')}}"><span><i class="fa fa-sign-out" aria-hidden="true"></i><span class="align-middle"> Logout</span></span></a>
                                    </li>
                                </ul>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
            </div>
            <!-- /.dropdown-card-profile -->
            </li>
            <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-nav -->
    </div>
    <!-- /.container -->
    </nav>
    <!-- /.navbar -->
    <div class="content-wrapper">
        <!-- SIDEBAR -->
        <aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">
            <!-- Sidebar Menu -->
            <nav class="sidebar-nav">
                <ul class="nav in side-menu">
                    

                    <li class="current-page active">
						<a href="{{route('adm.admin')}}"><i class="list-icon lnr lnr-home"></i> <span class="hide-menu">Dashboard</span></a>
                    </li>
                        
					<li class="">
						<a href="{{route('adm.users')}}"><i class="list-icon lnr lnr-users"></i> <span class="hide-menu">Users</span></a>
                    </li>
					
					
					<li class="">
						<a href="{{route('adm.listing')}}"><i class="list-icon fa fa-list-alt"></i> <span class="hide-menu">Business Listing</span></a>
                    </li>
				
					 <li><a href="{{route('adm.deals')}}"><i class="list-icon lnr fa fa-tags"></i> <span class="hide-menu">Deals</span></a>
                      </li>	
                       <li><a href="{{route('adm.categories')}}"><i class="list-icon lnr lnr-layers"></i> <span class="hide-menu">Categories</span></a>
                      </li>	
                      <li><a href="{{route('adm.country')}}"><i class="list-icon lnr lnr-layers"></i> <span class="hide-menu">Country</span></a>
                      </li>	
                        <li><a href="{{route('adm.state')}}"><i class="list-icon lnr lnr-layers"></i> <span class="hide-menu">State</span></a>
                      </li>	
					  <li><a href="{{route('adm.tags')}}"><i class="list-icon fa fa-tags"></i> <span class="hide-menu">Tags</span></a>
                      </li>
					  <li><a href="{{route('adm.blogs')}}"><i class="list-icon fa fa-address-card-o"></i> <span class="hide-menu">Blogs</span></a>
                      </li>

					<li><a href="{{route('adm.all-pages')}}"><i class="list-icon lnr lnr-file-add"></i> <span class="hide-menu">Pages</span></a>
                      </li>	
                      
                      	<li><a href="{{route('adm.home')}}"><i class="list-icon lnr lnr-file-add"></i> <span class="hide-menu">Home</span></a>
                      </li>	

                        <li><a href="{{route('adm.notifications')}}"> <i class="list-icon lnr lnr-alarm"></i>  <span class="hide-menu">Notifications</span></a>
                      </li>		
                        <li class="adm-sid-msg-li"><a href="{{route('adm.messages')}}"><i class="fa fa-commenting-o" aria-hidden="true"><span class="button-pulse bg-warning"></span></i><span class="hide-menu">Messages</span></a>
                      </li>	
					
					
					
							
				
				</ul>
                <!-- /.side-menu -->
            </nav>
            <!-- /.sidebar-nav -->
        </aside>
        <!-- /.site-sidebar -->

<div class="modal modal-danger fade delete-pop" id="" tabindex="-1" role="dialog"
	aria-labelledby="myMediumModalLabel" aria-hidden="true" style="display: none">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				
				<div class="modal-body">
					<h5 class="text-dels">Are you sure you wants to delete it?</h5>
					
				</div>
				<div class="modal-footer"><a href="javascript:void(0)" class="btn btn-primary btn-sts btn-rounded ripple text-left yes_delete">Yes</a> 
					<button type="button" class="btn btn-danger btn-sts btn-rounded ripple text-left" data-dismiss="modal">No</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>	

    </div>
    <!-- /.content-wrapper -->

    @yield('body')

    <footer class="footer text-center">
        <div class="container"><span>Copyright @ 2019. All rights reserved</span>
        </div>
        <!-- /.container -->
    </footer>
    </div>
    <!-- Scripts -->
    <script src="{{URL('adminasset/ajax/libs/jquery/3.3.1/jquery.min.js')}}"></script>
    <script src="{{URL('adminasset/ajax/libs/popper.js/1.14.3/umd/popper.min.js')}}"></script>
    <script src="{{URL('adminasset/ajax/libs/metisMenu/2.7.9/metisMenu.min.js')}}"></script>
    <script src="{{URL('adminasset/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js')}}"></script>
    <script src="{{URL('adminasset/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{URL('adminasset/ajax/libs/countup.js/1.9.2/countUp.min.js')}}"></script>
    <script src="{{URL('adminasset/ajax/libs/moment.js/2.22.2/moment.min.js')}}"></script>
    <script src="{{URL('adminasset/ajax/libs/Chart.js/2.7.2/Chart.min.js')}}"></script>
    <script src="{{URL('adminasset/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js')}}"></script>
    <script src="{{URL('adminasset/ajax/libs/select2/4.0.5/js/select2.min.js')}}"></script>
    <script src="{{URL('adminasset/ajax/libs/jqvmap/1.5.1/jquery.vmap.js')}}"></script>
    <script src="{{URL('adminasset/ajax/libs/jqvmap/1.5.1/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{URL('adminasset/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{URL('adminasset/ajax/libs/datatables/1.10.18/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL('adminasset/assets/js/template.js')}}"></script>
    <script src="{{URL('adminasset/assets/js/bootstrap-tagsinput.min.js')}}"></script>
<!-- 	<script src="{{URL('adminasset/assets/js/bootstrap-timepicker.min.js')}}"></script> -->
	<!--tinyMc-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.13/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.13/themes/inlite/theme.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.13/jquery.tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.3/bootstrap3-wysihtml5.all.min.js"></script>
	<!--tinyMc-->
 <script type="text/javascript" src="{{URL('UserAssets/js/choosen.min.js')}}"></script><!-- Nice Select -->
	
	
	<script src="{{URL('adminasset/assets/js/chosen.jquery.min.js')}}"></script>	
	<script src="{{URL('adminasset/assets/js/custom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script src="{{URL('adminasset/assets/css/bootstrap-toggle.min.css')}}"></script>
	   <script src="{{URL('UserAssets/js/dropzone.js')}}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAIkAmlsGxoP63HLptMlKqpbgAv7IZBKM4"></script>
         <script src="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/js/bootstrap-timepicker.min.js"></script>
 

         <!-- seen notification -->
          <script>
            $(document).on('click','.notif',function(){
                $this=$(this);
      var id= $(this).closest('.notif_row').attr('id');
         $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:"{{route('adm.seen_notification')}}",
                data:{'id':id},
                success:function(data)
                   { 
                 var result= $.parseJSON(data);
                if(result.status==102){
                    $this.closest('.notif_row').animate({
                    opacity: 0
                    }, 500, function(){
                    $(this).hide(); //alt $(this).slideUp(400);
                    });
                    // $('#data').html(result.data);                
                    // $('#Results_for').css('display','block').html(result.keyword);
                    // $('#Results_for')[0].scrollIntoView({behavior:"smooth",block:"start"}); 
                }  
                else swal("Sorry, unknown error was occured");          
       
                   }
           });
            });
            
         </script>
@yield('script')
</body>
</html>	
		
