@extends('admin.master')
@section('body')
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Category List</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Categories</li>
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
								<h5>Category List
								<a href="javascript:void(0)" data-toggle="modal" data-target=".add-pop" class="float-right btn btn-warning  btn-sm"><i class="fa fa-plus"></i> &nbsp; Add New </a>
								</h5>
							</div>
							<!-- /.widget-heading -->
							<div class="widget-body clearfix">
								<div class="table-responsive">
									<table class="table table-striped" data-toggle="datatables" data-plugin-options='{"searching": false}'>
										<thead>
											<tr>
											    <th>Category Image</th>
												<th>Category Name</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>				
										@if(isset($data['cat_list']))
									
									     @foreach($data['cat_list'] as $cat)
											<tr class="user_row_{!! $cat['id']  !!}">
											    @if($cat['image'])
											    <td><img src="{{url('/')}}/public/category/{{$cat['image']}}" class="user_profile"></td>
											    @else
											    <td><img src="{{ url('/public/deal_images')}}/dummimage.jpeg" class="user_profile"></td>
											    @endif
												<td>{!! $cat['category'] !!}</td>
												<td>
													<a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm ripple viewcat" data-contant="{!! $cat['id']  !!}"  data-toggle="modal" data-target=".edit-pop">
														<i data-toggle="tooltip" title="Edit" class="list-icon lnr lnr-pencil"></i>
													</a>
													<a href="javascript:void(0)" class="btn btn-warning btn-circle btn-sm ripple" data-toggle="modal" data-target=".delete-pop">
														<i data-toggle="tooltip" title="Delete" class="list-icon lnr lnr-trash" id="{!! $cat['id']  !!}"></i>
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
			  <form id="addcat" method="POST" >
				  {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputEmail1">Add Category</label>
            <input name="category" type="text" class="form-control" aria-describedby="emailHelp" value="" placeholder="Category name">
          </div>
          
        <div class="col-lg-6">
          <div class="form-group input-has-value">
              <img id="blah" src="{{ url('/public/category')}}/dummimage.jpeg" alt="your image" style="height:30%; width:30%" />
              <input name="image" id="imgInp" type="file" accept="image/*">
              <label id="imgInp-error" class="help-block" style='color:red' for="imgInp"></label> 
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
	<form id="editcat" method="POST">
	    
	    {{ csrf_field() }}
  <div class="form-group">
      <input type="hidden" name="hidd" id="hidd" value="">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" name="editcategory" id="editcategory" class="form-control" aria-describedby="emailHelp" value="">
  </div>
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
        
        
        
    


@endsection('body')

@section('script')
    
<script type="text/javascript">
$(document).ready(function() {
    $('#addcat').validate({   
    rules: {
        category:{
            required:true,
          
        },
    },  
    messages: 
        { 
         category: 
          {
            required:'This field is required',
          },      
        },
          
        submitHandler: function(form) 
        { 
                
                $("label.help-block").html("");
                $("label.help-block").removeClass("error");
                $.ajax({
                type:'POST',
                url:"{{route('adm.addsss-category')}}",
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
                 
                    //if(data.status==102)
    				if(parseInt(data.success) ==102)
    				{
    				    $('.modal-danger').modal('hide');
    					swal({
    					title: "Category has been saved",
    					text: "Category has been added",
    					icon: "success",
    					button: "OK",
    					}).then(function() {
                	window.location.reload();
                });
    				
					 }

					 //if(result.status==103)
				  	 
				  	 if(parseInt(data.success) ==103)
				  	 {
					   
						swal("Category already exists!");
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
                  url:"{{route('adm.delete-category')}}",
                  data: {'id':id},                 
                  cache: false, 
                  success:function(data)
                  { 
                      var result = $.parseJSON(data);
                      if(result.status==102){
                          
                          swal({
						title: "Category has been deleted",
						text: "Category has been deleted",
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

	    
    $('#editcat').validate({   
    rules: {
        editcategory:{
            required:true,
          
        },
    },  
    messages: 
        { 
         editcategory: 
          {
            required:'This field is required',
          },      
        },
          
        submitHandler: function(form) 
        { 
            
            $("label.help-block").html("");
            $("label.help-block").removeClass("error");
             $.ajax({
                type:'POST',
                url:"{{route('adm.edit-category')}}",
                data: new FormData(form),
                contentType: false, 
                cache: false, 
                processData:false,
                success:function(data)
                { 
                 //var result = $.parseJSON(data);
                 
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
						title: "Category has been edit",
						text: "Category has been edit",
						icon: "success",
						button: "OK",
						}).then(function() {
                	window.location.reload();
                });
					
					 }

					 if(parseInt(data.success) ==103)
				 	{
						swal("Category already exists!");
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
                url: "{{route('adm.select_category')}}",
                dataType: 'JSON',
                data: data1,
                cache: false,

                success: function(data)
                {
                        $("#editcategory").val(data.category);
                       
                        $('#blahs').attr('src', "{{url('/public/category')}}/"+data.image);
                      
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


@endsection('script')