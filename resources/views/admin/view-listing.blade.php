@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">View Listing</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
								<li class="breadcrumb-item"><a href="{{route('adm.listing')}}">Business Listing</a>
                                </li>
                                <li class="breadcrumb-item active">View Listing</li>
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
								<h5>View Listing
								
								</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<form id="profile_changes">
									{{ csrf_field()}}
									<div class="row">
										<div class="col-lg-6">
											<div class="list_view">
												<h4>CREATED BY: <span>{{$data[0]->user[0]['name']}}</span></h4>
											</div>
										</div>
										<div class="col-lg-6">
										<div class="list_view">
											<h4>BUSINESS NAME : <span>{{$data[0]->title}}</span></h4>
										</div>
										</div>
									</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="list_view">
												<h4>CATEGORY: <span>{{$data[0]->category[0]['category']}}</span></h4>
											</div>
									</div>
									<div class="col-lg-6">
										<div class="list_view">
											<h4>TAGS : <span>{{$data[0]->tags}}</span></h4>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="list_view">
											<h4>DESCRIPTION :
											<span>{{$data[0]->description}}</span></h4>
											
										</div>
									</div>
								</div>
								<div class="row">
								
									<div class="col-md-12 widget-holder mt-0">
									<div class="widget-heading clearfix pl-0">
                                    <div class="list_view">
											<h4 class="mt-0">OPENING HOURS</h4>
											</div>
                                </div>
                            <div class="widget-bg-2">
                              
                                <!-- /.widget-heading -->
                                <div class="widget-body clearfix">
                                    
                                    <table class="tablesaw color-table table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                                        <thead>
                                            <tr class="bg-primary">
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Days</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Opening Time</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Closing Time</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($data[0]->days_time as $key)
                                            <tr>
                                                <td class="title">{{$key['day']}}</td>
                                                <td>{{$key['opening_hour']}}</td>
                                                <td>{{$key['closing_hour']}}</td>
                                              
                                            </tr>
                                            @endforeach
                                 
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.widget-body -->
                            </div>
                            <!-- /.widget-bg -->
                        </div>
                        
								
								</div>
								<div class="row">
									<div class="col-lg-12">
										<h4 class="dobl-brdr mt-2">Contact Information</h4>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-6">
										<div class="list_view">
											<h4>ADDRESS : <span>{{$data[0]->address}}</span></h4>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="list_view">
											<h4>CITY : <span>{{$data[0]->city}}</span></h4>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="list_view">
											<h4>STATE : <span>{{$state_name[0]['state_name']}}</span></h4>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="list_view">
											<h4>PHONE NO. : <span>{{$data[0]->phone}}</span></h4>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-6">
										<div class="list_view">
											<h4>EMAIL : <span>{{$data[0]->mail}}</span></h4>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="list_view">
											<h4>WEBSITE : <span>{{$data[0]->website}}</span></h4>
										</div>
									</div>
								</div>
								
					<div class="row">
					
					
												<div class="col-lg-12">
												<div class="list_view">
											<h4 class="mb-3">LOCATION ON MAP </h4>
										</div>
												
													<div class="map-container" id="map">
                                        
                                       </div>
												</div>
											</div>

<div class="row preview-images-zone mt-3 ui-sortable">
		<div class="col-lg-12"><div class="list_view">
											<h4 class="mb-3">IMAGES</h4>
										</div></div>
                @foreach($data[0]->images as $key)
                                                   <div class="col-lg-3 preview-image preview-show-1">
                                                    
                                                      <div class="image-zone delete_image"><img  src="{{url('public/images')}}/{{$key['name']}}"></div>
                                                   </div>
                                                   @endforeach
    </div>
	
	<div class="row">
												<div class="col-lg-12 mt-3">
													<div class="form-actions btn-list">
														<!--<button class="btn btn-primary" type="submit">Save Changes</button>-->
														<a href="{{route('adm.edit-listing',$data[0]->id)}}" class="btn btn-warning">Go Back To Edit</a>
															<span id="pass-error" class="text-danger"></span>
													</div>
												</div>
											</div>
	

									
									
								</form>
							</div>
							<!-- /.widget-body -->
						</div>
						<!-- /.widget-bg -->
					</div>
               </div>
            </div>
            <!-- /.container -->
        </main>
@endsection('body')
@section('script')
<script type="text/javascript">
 


  var loc= $('#autocomplete').val();         
var geocoder = new google.maps.Geocoder(); // initialize google map object
var address = "{{$data[0]->address}}";
geocoder.geocode( { 'address': address}, function(results, status) {

if (status == google.maps.GeocoderStatus.OK) {
   var latitude = results[0].geometry.location.lat();
var longitude = results[0].geometry.location.lng();
var myCenter=new google.maps.LatLng(latitude,longitude);
      function initialize()
{
var mapProp = {
 center:myCenter,
 zoom:13,
 mapTypeId:google.maps.MapTypeId.ROADMAP
 };

var map=new google.maps.Map(document.getElementById("map"),mapProp);

var marker=new google.maps.Marker({
 position:myCenter,
 });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize); 
   } 
});
 </script>

@endsection('script')