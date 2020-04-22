@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">State List</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">State</li>
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
								<h5>State List
								<a href="javascript:void(0)" data-toggle="modal" data-target=".add-pop" class="float-right btn btn-warning  btn-sm"><i class="fa fa-plus"></i> &nbsp; Add New </a>
								</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<div class="table-responsive">
									<table class="table table-striped" data-toggle="datatables" data-plugin-options='{"searching": false}'>
										<thead>
											<tr>
												<th>State Name</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>				
									@if(isset($state['state_list']))
									@foreach($state['state_list'] as $state)
											<tr class="user_row_{!! $state['state_id'] !!}">
											
												<td>{!! $state['state_name'] !!}</td>
												<td>
													<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm ripple viewcat" data-contant="{!! $state['state_id'] !!}"  data-toggle="modal" data-target=".edit-pop">
														<i data-toggle="tooltip" title="Edit" class="list-icon lnr lnr-pencil"></i>
													</a>
													<a href="javascript:void(0)" class="btn btn-warning btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
														<i data-toggle="tooltip" title="Delete" class="list-icon lnr lnr-trash" id="{!! $state['state_id'] !!}"></i>
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
					<form id="addstate" method="POST">
					    {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputEmail1">Choose Country</label>
        <select type="text" name="country" class="form-control">
            <option value="">Select Country</option>
        @if(isset($data['country_list']))		
		@foreach($data['country_list'] as $country)
		
        <option value="{!! $country['country_id']  !!}">{!! $country['country_name']  !!}</option>
        @endforeach
		@endif
										
    </select>
    <label for="exampleInputEmail1">Add State</label>
            <input name="state" type="text" class="form-control" aria-describedby="emailHelp" value="" placeholder="State name">
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
	<form id="updatestate" method="POST">
	     {{ csrf_field() }}
	   
  <div class="form-group">
      <input type="hidden" name="hidd" id="hidd" value="">
       <label for="exampleInputEmail1">Choose Country</label>
        <select type="text" name="editcountry" id="country" class="form-control">
        @if(isset($data['country_list']))		
		@foreach($data['country_list'] as $country)
        <option value="{!! $country['country_id']  !!}">{!! $country['country_name']  !!}</option>
        @endforeach
		@endif
										
    </select>
    <label for="exampleInputEmail1">State Name</label>
    <input type="text" name="editstate" id="editstate" class="form-control" aria-describedby="emailHelp" value="">
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
   <script>
       $(document).ready(function() {
    $('#addstate').validate({   
    rules: {
        country:{
            required:true,
          
        },
        
        state:{
            
          required:true,  
        },
    },  
    messages: 
        { 
         country: 
          {
            required:'This field is required',
          },   
          state:{
            required:'This field is required'
          },
        },
          
        submitHandler: function(form) 
        { 
             $.ajax({
                type:'POST',
                url:"{{route('adm.addstate')}}",
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
						title: "State has been saved",
						text: "State has been added",
						icon: "success",
						button: "OK",
						}).then(function() {
                	window.location.reload();
                });
					
					 }

					 if(result.status==103)
				  	{
					   
						swal("State already exists!");
					}

                }
            });
        } 
        
    });
    
   });
   
   
      $('.viewcat').click(function() {
        var id = $(this).attr('data-contant');
      
        var data1 = 'id='+id;
        
        $.ajax({
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{route('adm.select_state')}}",
                dataType: 'JSON',
                data: data1,
                cache: false,

                success: function(data)
               {
                    $("#editstate").val(data.state_name);
                    $("#country").val(data.country_id);
                        $('#hidd').val(id);
              
            }
    });
});

   //update state function//
       
    $('#updatestate').validate({   
    rules: {
        editcountry:{
            required:true,
          
        },
        editstate:{
            
            required:true,
        }
    },  
    messages: 
        { 
         editcountry: 
          {
            required:'This field is required',
          },      
          editstate:{
              
              required:"This field is required",
          }
        },
          
        submitHandler: function(form) 
        { 
             $.ajax({
                type:'POST',
                url:"{{route('adm.editstate')}}",
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
						title: "State has been edit",
						text: "State has been edit",
						icon: "success",
						button: "OK",
						}).then(function() {
                	window.location.reload();
                });
						
					 }

					 if(result.status==103)
				  	{
						swal("State already exists!");
					}

                }
            });
        } 
        
    });
    
    
      
   
   //delete country//
		$('.lnr-trash').on('click',function(){
       var id = $(this).attr('id'); 
  
     $('.yes_delete').on('click',function(){

             
              $('.modal-danger').modal('hide');
              $.ajax({       

                 
                  type:'POST',
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  url:"{{route('adm.delete_state')}}",
                  data: {'id':id},                 
                  cache: false, 
                  success:function(data)
                  { 
                      var result = $.parseJSON(data);
                      if(result.status==102){
                          
                          swal({
						title: "State has been deleted",
						text: "State has been deleted",
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
   
   </script>
@endsection('script')