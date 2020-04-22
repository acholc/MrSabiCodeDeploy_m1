<div class="modal modal-danger fade edit-pop" id="" tabindex="-1" role="dialog"
	aria-labelledby="myMediumModalLabel" aria-hidden="true" style="display: none">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				
				<div class="modal-body">
					<form id="editcat" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" name="editcategory" class="form-control" aria-describedby="emailHelp" value="Category name">
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
	
	@section('script')
	<script>
	    
	    
	    
	    
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
             $.ajax({
                type:'POST',
                url:"{{route('adm.edit-category')}}",
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
						title: "Category has been saved",
						text: "Category has been added",
						icon: "success",
						button: "OK",
						});
					 }

					 if(result.status==103)
				  	{
					   
						swal("Category already exists!");
					}

                }
            });
        } 
        
    });
    
	</script>