@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Country List</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Countries</li>
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
								<h5>Country List
								<a href="javascript:void(0)" data-toggle="modal" data-target=".add-pop" class="float-right btn btn-warning  btn-sm"><i class="fa fa-plus"></i> &nbsp; Add New </a>
								</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<div class="table-responsive">
									<table class="table table-striped" data-toggle="datatables" data-plugin-options='{"searching": false}'>
										<thead>
											<tr>
												<th>Country Name</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>				
										
									@if(isset($data['country_list']))
								
									 @foreach($data['country_list'] as $country)
											<tr class="user_row_{!!  $country['country_id'] !!}">
												<td>{!! $country['country_name']  !!}</td>
												<td>
													<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm ripple viewcat" data-contant="{!! $country['country_id']  !!}"  data-toggle="modal" data-target=".edit-pop">
														<i data-toggle="tooltip" title="Edit" class="list-icon lnr lnr-pencil"></i>
													</a>
													<a href="javascript:void(0)" class="btn btn-warning btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
														<i data-toggle="tooltip" title="Delete" class="list-icon lnr lnr-trash" id="{!! $country['country_id']  !!}"></i>
													</a>
												</td>
											</tr>
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
			
	<div class="modal modal-danger fade add-pop" id="" tabindex="-1" role="dialog"
	      aria-labelledby="myMediumModalLabel" aria-hidden="true" style="display: none">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				
				<div class="modal-body">
					<form id="addcountry" method="POST">
					    {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputEmail1">Add Country</label>
            <input name="country" type="text" class="form-control" aria-describedby="emailHelp" value="" placeholder="Country name">
          </div>
        </div>
	<div class="modal-footer"><input type="submit" value="Save" class="btn btn-primary btn-sts btn-rounded ripple text-left">
		<button type="button" class="btn btn-warning btn-sts btn-rounded ripple text-left" data-dismiss="modal">Cancel</button>
	</div>
	</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->	</div>		
	
			
		<div class="modal modal-danger fade edit-pop" id="" tabindex="-1" role="dialog"
	aria-labelledby="myMediumModalLabel" aria-hidden="true" style="display: none">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				
<div class="modal-body">
	<form id="editcount" method="POST">
	    {{ csrf_field() }}
  <div class="form-group">
      
    <label for="exampleInputEmail1">Country Name</label>
    <input type="hidden" name="hidd" id="hidd" value="">
    <input type="text" name="editcountry" id="editcountry" class="form-control" aria-describedby="emailHelp" value="">
  </div>
	</div>
	<div class="modal-footer"><input type="submit" value="Save" class="btn btn-primary btn-sts btn-rounded ripple text-left">
		<button type="button" class="btn btn-warning btn-sts btn-rounded ripple text-left" data-dismiss="modal">Cancel</button>
				</div>
				</form>
			</div>
			 <!--//.modal-content -->
		</div>
		 <!--/.modal-dialog -->
	</div>	
			
            <!-- /.container -->
            
            
 
        </main>
    
@endsection('body')

@section('script')
    
<script type="text/javascript">
$(document).ready(function() {
    $('#addcountry').validate({   
    rules: {
        country:{
            required:true,
          
        },
    },  
    messages: 
        { 
         country: 
          {
            required:'This field is required',
          },      
        },
          
        submitHandler: function(form) 
        { 
             $.ajax({
                type:'POST',
                url:"{{route('adm.add-country')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                { 
                  var result = $.parseJSON(data);
                 
                  if(result.status==102)
					{
					    $('.modal-danger').modal('hide');
						swal({
						title: "Country has been saved",
						text: "Country has been added",
						icon: "success",
						button: "OK",
						}).then(function() {
                	window.location.reload();
                });
					
					 }

					 if(result.status==103)
				  	{
					   
						swal("Country already exists!");
					}

                }
            });
        } 
        
    });
    
   });
   
   
   //delete country//
		$('.lnr-trash').on('click',function(){
       var id = $(this).attr('id'); 
  
     $('.btn-primary').on('click',function(){

             
              $('.modal-danger').modal('hide');
              $.ajax({       

                 
                  type:'POST',
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  url:"{{route('adm.delete_country')}}",
                  data: {'id':id},                 
                  cache: false, 
                  success:function(data)
                  { 
                      var result = $.parseJSON(data);
                      if(result.status==102){
                          
                          swal({
						title: "Country has been deleted",
						text: "Country has been deleted",
						icon: "success",
						button: "OK",
						}).then(function() {
                	window.location.reload();
                });
						
						$(".user_row_"+id).hide();
                      	//$('#user_row').html('');
                      }
                      else
                      {
                      	
                      }                     

                    }
          });

    });
   
       

});
//delete end//
   
   
   $('.viewcat').click(function() {
        var id = $(this).attr('data-contant');
      
        var data1 = 'id='+id;
        
        $.ajax({
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{route('adm.select_country')}}",
                dataType: 'JSON',
                data: data1,
                cache: false,

                success: function(data)
               {
                   if(data.success)
                  {
                        $("#editcountry").val(data.country_name.country_name);
                        $('#hidd').val(id);
              }
            }
    });
});
   
   
   //update coutry function//
       
    $('#editcount').validate({   
    rules: {
        editcountry:{
            required:true,
          
        },
    },  
    messages: 
        { 
         editcountry: 
          {
            required:'This field is required',
          },      
        },
          
        submitHandler: function(form) 
        { 
             $.ajax({
                type:'POST',
                url:"{{route('adm.editcountry')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                { 
                  var result = $.parseJSON(data);
                 
                  if(result.status==102)
					{
					    $('.modal-danger').modal('hide');
						swal({
						title: "Country has been edit",
						text: "Country has been edit",
						icon: "success",
						button: "OK",
						}).then(function() {
                	window.location.reload();
                });
						
					 }

					 if(result.status==103)
				  	{
						swal("Country already exists!");
					}

                }
            });
        } 
        
    });
</script>

@endsection('script')