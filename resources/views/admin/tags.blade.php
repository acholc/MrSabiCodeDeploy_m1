@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Tags</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Tags</li>
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
								<h5>Tags
								<a href="javascript:void(0)" data-toggle="modal" data-target=".add-pop" class="float-right btn btn-warning  btn-sm"><i class="fa fa-plus"></i> &nbsp; Add New </a>
								</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<div class="table-responsive">
									<table class="table table-striped" data-toggle="datatables" data-plugin-options='{"searching": false}'>
										<thead>
											<tr><th>Sr No.</th>
												<th>Tag Name</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>				
											@if(isset($data['tag']))
											@php $i =1 @endphp
											@foreach($data['tag'] as $tag)
											<tr class="user_row_{{ $tag['id'] }}">
												<td>{{$i}}</td>
												<td>{{ $tag->tag_name }}</td>
												<td>
													<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm ripple viewcat" data-contant="{!! $tag['id']  !!}" data-toggle="modal" data-target=".edit-pop">
														<i data-toggle="tooltip" title="Edit" class="list-icon lnr lnr-pencil"></i>
													</a>
													<a href="javascript:void(0)" class="btn btn-warning btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
														<i data-toggle="tooltip" title="Delete" class="list-icon lnr lnr-trash" id="{!! $tag['id']  !!}"></i>
													</a>
												</td>
											</tr>
											@php $i++ @endphp
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
        	<form id="tagform" method="POST">
        	     {{ csrf_field() }}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tag Name</label>
                    <input name="tag" type="text" class="form-control" value="" aria-describedby="emailHelp" placeholder="Tag name">
                  </div>
        		</div>
        		<div class="modal-footer"><input type="submit" value="Save" class="btn btn-primary btn-sts btn-rounded ripple text-left">
        			<button type="button" class="btn btn-warning btn-sts btn-rounded ripple text-left" data-dismiss="modal">Cancel</button>
        		</div>
        	</form>
			</div>
		<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>		
			
			<div class="modal modal-danger fade edit-pop" id="" tabindex="-1" role="dialog"
	aria-labelledby="myMediumModalLabel" aria-hidden="true" style="display: none">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				
				<div class="modal-body">
					<form id="edittag" method="POST">
					     {{ csrf_field() }}
                  <div class="form-group">
                      <input type="hidden" name="hidd" id="hidd" value="">
                    <label for="exampleInputEmail1">Tag Name</label>
                    <input name="edittags" id="edittags" type="text" class="form-control" aria-describedby="emailHelp" value="">
                  </div>				
            </div>
        	<div class="modal-footer"><input type="submit" value="Save" class="btn btn-primary btn-sts btn-rounded ripple text-left">
        		<button type="button" class="btn btn-warning btn-sts btn-rounded ripple text-left" data-dismiss="modal">Cancel</button>
        	</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>	
			
            <!-- /.container -->
        </main>
@endsection('body')

@section('script')

<script type="text/javascript">
$(document).ready(function() {
    $('#tagform').validate({   
    rules: {
        tag:{
            required:true,
          
        },
    },  
    messages: 
        { 
         tag: 
          {
            required:'This field is required',
          },      
        },
          
        submitHandler: function(form) 
        { 
             $.ajax({
                type:'POST',
                url:"{{route('adm.save_tags')}}",
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
						title: "Tag has been saved",
						text: "Tag has been added",
						icon: "success",
						button: "OK",
						}).then(function() {
                	window.location.reload();
                });
					
					 }

					 if(result.status==103)
				  	{
					   
						swal("Tag already exists!");
					}

                }
            });
        } 
        
    });
    
   });
   
   // edit tag //
       $('#edittag').validate({   
    rules: {
        edittags:{
            required:true,
          
        },
    },  
    messages: 
        { 
         edittags: 
          {
            required:'This field is required',
          },      
        },
          
        submitHandler: function(form) 
        { 
             $.ajax({
                type:'POST',
                url:"{{route('adm.edit_tag')}}",
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
						title: "Tag has been edit",
						text: "Tag has been edit",
						icon: "success",
						button: "OK",
						}).then(function() {
                	window.location.reload();
                });
						 
					 }

					 if(result.status==103)
				  	{
						swal("Tag already exists!");
					}

                }
            });
        } 
        
    });
   
   // delete tag //
   	$('.lnr-trash').on('click',function(){
		    
       var id = $(this).attr('id'); 
  
     $('.yes_delete').on('click',function(){

             
              $('.modal-danger').modal('hide');
              $.ajax({       

                 
                  type:'POST',
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  url:"{{route('adm.delete_tags')}}",
                  data: {'id':id},                 
                  cache: false, 
                  success:function(data)
                  { 
                      var result = $.parseJSON(data);
                      if(result.status==102){
                          
                          swal({
						title: "Tag has been deleted",
						text: "Tag has been deleted",
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
   
   // get data //
   $('.viewcat').click(function() {
        var id = $(this).attr('data-contant');
      
        var data1 = 'id='+id;
        
        $.ajax({
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{route('adm.select_tag')}}",
                dataType: 'JSON',
                data: data1,
                cache: false,

                success: function(data)
                {
                    $("#edittags").val(data.tag_name);
                   
                    $('#hidd').val(id);
                   
                }
              });
         });
</script>


@endsection('script')