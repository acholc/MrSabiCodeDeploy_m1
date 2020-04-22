@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Home</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Home</li>
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
            
            <!--///////text section//////-->
            <div class="container">
                <div class="row">
					<div class="col-md-12 widget-holder">
						<div class="widget-bg">
							<div class="widget-heading clearfix">
								<h5>Headings/Subheadings</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
											   
                                                <th>First heading</th>
                                                <th>Second heading</th>
                                                <th>Third heading</th>
                                                <th>Fourth heading</th>
                                                <th>Action</th>
											</tr>
										</thead>
										<tbody>				
									
									@if(isset($data))
								
											<tr>
											    <td id="1st">{{$home_text->h1}} <br> {{$home_text->sb1}}</td>
											    <td id="2nd">{{$home_text->h2}} <br> {{$home_text->sb2}}</td>
											    <td id="3rd">{{$home_text->h3}} <br> {{$home_text->sb3}}</td>
											    <td id="4th">{{$home_text->h4}} <br> {{$home_text->sb4}}</td>
												<td>
                                                 	<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm ripple viewcat" data-toggle="modal" data-target="#myModal">
														<i data-toggle="tooltip" title="Edit" class="list-icon lnr lnr-pencil"></i>
													</a>
												</td>
											</tr>
								
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
             <!--///////text section//////-->
            <div class="container">
                <div class="row">
					<div class="col-md-12 widget-holder">
						<div class="widget-bg">
							<div class="widget-heading clearfix">
								<h5>Slideshow Images
								<a href="javascript:void(0)" data-toggle="modal" data-target=".add-pop" class="float-right btn btn-warning  btn-sm"><i class="fa fa-plus"></i> &nbsp; Add New </a>
								</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<div class="table-responsive">
									<table class="table table-striped" data-toggle="datatables" data-plugin-options='{"searching": false}'>
										<thead>
											<tr>
											    <th>Image</th>
												
												<th>Action</th>
											</tr>
										</thead>
										<tbody>				
									
									@if(isset($data))
									@foreach($data as $image)
											<tr class="user_row_{{ $image['id'] }}">
											 
											    <td><img src="{{ url('/public/page_images')}}/{{ $image['image_name']  }}" class="user_profile"></td>
												<td>
													<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm ripple viewcat" data-contant="{{ $image['id'] }}"  data-toggle="modal" data-target=".edit-pop">
														<i data-toggle="tooltip" title="Edit" class="list-icon lnr lnr-pencil"></i>
													</a>
													<a href="javascript:void(0)" class="btn btn-warning btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
														<i data-toggle="tooltip" title="Delete" class="list-icon lnr lnr-trash" id="{{ $image['id'] }}"></i>
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
			  <form id="home" method="POST" enctype="multipart/form-data" >
				  {{ csrf_field() }}
        <div class="col-lg-6">
          <div class="form-group input-has-value">
              <img id="blah" src="{{ url('/public/category')}}/dummimage.jpeg" alt="your image" style="height:30%; width:30%" />
              <input name="image" id="imgInp" type="file" accept="image/*">
              <label id="imgInp-error" class="help-block" for="imgInp"></label>
          </div>
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
	<form id="edithome" method="POST" enctype="multipart/form-data">
	    
	    {{ csrf_field() }}
	    <input type="hidden" name="hidd" id="hidd" value="">
  <div class="col-lg-6">
          <div class="form-group input-has-value">
              <img id="blahs" src="" alt="your image" style="height:30%; width:30%" />
              <input name="editimage" id="img" type="file" accept="image/*">
              <label id="img-error" class="help-block" for="img"></label>
          </div>
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
                =================================================modal=================================================
                 <!-- Trigger the modal with a button -->


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header d-block text-center">
          <!--button type="button" class="close" data-dismiss="modal">&times;</button-->
          <h4 class="modal-title hm-cont-hdng">Content For Home Page</h4>
        </div>
        <div class="modal-body">
            
      <form class="form-horizontal" id="form_for_home_text">
          {{csrf_field()}}
  <div class="form-group">
        <h6 class="adm-hm-pge-sc modal-title">First</h6>
    <label class="control-label col-sm-2" for="email">Head:</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" name="head1" required value="{{$home_text->h1}}" id="head1">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email">Sub head:</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" name="subhead1" required value="{{$home_text->sb1}}" id="subhead1">
    </div>
  </div>

    <div class="form-group">
           <h6 class="adm-hm-pge-sc modal-title">Second</h6>
    <label class="control-label col-sm-2" for="email">Head:</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" name="head2" required value="{{$home_text->h2}}" id="head2">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email">Sub head:</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" name="subhead2" required value="{{$home_text->sb2}}" id="subhead2">
    </div>
  </div>

  <div class="form-group">
           <h6 class="adm-hm-pge-sc modal-title">Third</h6>
    <label class="control-label col-sm-2" for="email">Head:</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" name="head3" required value="{{$home_text->h3}}" id="head3">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email">Sub head:</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" name="subhead3" required value="{{$home_text->sb3}}"  id="subhead3">
    </div>
  </div>
 
    <div class="form-group">
           <h6 class="adm-hm-pge-sc modal-title">Fourth</h6>
    <label class="control-label col-sm-2" for="email">Head:</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" name="head4" required value="{{$home_text->h4}}" id="head4">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email">Sub head:</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" name="subhead4" required value="{{$home_text->sb4}}" id="subhead4">
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10 mt-4">
      <button type="submit" class="btn btn-default adm-btn-ylw">Update</button>
        <button type="button" class="btn btn-default adm-btn-blk" data-dismiss="modal">Close</button>
    </div>
  </div>
</form>

        </div>

      </div>
    </div>
  </div>
</div>
               =======================================================================================================    
        
        
    


@endsection('body')

@section('script')
    
<script type="text/javascript">
$(document).ready(function() {
    $('#home').validate({   
    rules: {
        image:{
            required:true,
          
        },
    },  
    messages: 
        { 
         image: 
          {
            required:'Please Select Image',
          },      
        },
          
        submitHandler: function(form) 
        { 
             $("label.help-block").html("");
                $("label.help-block").removeClass("error");
             $.ajax({
                type:'POST',
                url:"{{route('adm.save_home')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                { 
                  //var result = $.parseJSON(data);
                 
                  if(data.errors)
                    {
                        if(data.errors.image)
                        {
                            $("label.help-block").addClass("error").html(data.errors.image);
                        }
                    }
                 
                 
                  if(parseInt(data.success) ==102)
					{
					    $('.modal-danger').modal('hide');
						swal({
						title: "Image has been saved",
						text: "Image has been added",
						icon: "success",
						button: "OK",
						}).then(function() {
                	window.location.reload();
                });
						
					 }

					

                }
            });
        } 
        
    });
    
   });
</script>


	<script>
	
	
	 // add image preview //   
function readURLs(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURLs(this);
});
	
///delete start///
		$('.lnr-trash').on('click',function(){
		    
       var id = $(this).attr('id'); 
  
     $('.yes_delete').on('click',function(){

             
              $('.modal-danger').modal('hide');
              $.ajax({       

                 
                  type:'POST',
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  url:"{{route('adm.delete_home_image')}}",
                  data: {'id':id},                 
                  cache: false, 
                  success:function(data)
                  { 
                      var result = $.parseJSON(data);
                      if(result.status==102){
                          
                          swal({
						title: "Image has been deleted",
						text: "Image has been deleted",
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
///delete end///

    $('#edithome').validate({   
   
        submitHandler: function(form) 
        { 
             $("label.help-block").html("");
                $("label.help-block").removeClass("error");
             $.ajax({
                type:'POST',
                url:"{{route('adm.edit_home_image')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                { 
                 // var result = $.parseJSON(data);
                  if(data.errors)
                    {
                        if(data.errors.editimage)
                        {
                            $("label.help-block").addClass("error").html(data.errors.editimage);
                        }
                    }
                 
                  if(parseInt(data.success) ==102)
					{
					    $('.modal-danger').modal('hide');
						swal({
						title: "image has been edit",
						text: "image has been edit",
						icon: "success",
						button: "OK",
						}).then(function() {
                	window.location.reload();
                });
						
						 
					 }

                }
            });
        } 
        
    });


$('.viewcat').click(function() {
        var id = $(this).attr('data-contant');
      
        var data1 = 'id='+id;
        
        $.ajax({
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{route('adm.select_home_image')}}",
                dataType: 'JSON',
                data: data1,
                cache: false,

                success: function(data)
                {
                        
                       
                        $('#blahs').attr('src', "{{url('/public/page_images')}}/"+data.image_name);
                      
                        $('#hidd').val(id);
                   
                }
              });
         });

    
// update image prwview //
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blahs').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#img").change(function() {
  readURL(this);
});
</script>

<script>
    $(function($) {
   $('#form_for_home_text').validate({
       //ignore: " ",
   rules: { 
 
   },  
   messages: 
       {   
       },
         highlight: function(element) {
           $(element).parent().addClass('has-error');
         },
         unhighlight: function(element) {
           $(element).parent().removeClass('has-error');
         },
             errorElement: 'span',
             errorClass: 'validation-error-message help-block form-helper bold',
             errorPlacement: function(error, element) {
               if (element.parent('.input-group').length) {
                 error.insertAfter(element.parent());
               } else {
                 error.insertAfter(element);
              }
            },
       submitHandler: function(form) 
       {          
                 $.ajax({
                   type:'POST',
                   url:"{{route('adm.for_home_text')}}",
                   data: new FormData(form),
                   contentType: false, 
                   cache: false, 
                   processData:false,
                   success:function(data)
                   {                        
                    if(data==1){
                        $('#1st').html($('#head1').val()+'<br>'+$('#subhead1').val());
                        $('#2nd').html($('#head2').val()+'<br>'+$('#subhead2').val());
                        $('#3rd').html($('#head3').val()+'<br>'+$('#subhead3').val());
                        $('#4th').html($('#head4').val()+'<br>'+$('#subhead4').val());
                        swal({
                    title: "Headings are updated successfully",
                    icon: "success",
                    button: "OK",
                    });
                        
                    } 
                   else if(data==0){swal("No changes are made");}
                   else {swal("Something went wrong!!, Try again");}

                   }
           });         
        
       } 
       
   });
});
</script>


@endsection('script')