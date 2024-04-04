<?php
	require_once "./header.php";
?>
<div class="modal fade" id="create-category" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Upload</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to upload category? &#128578;
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="create">Proceed</button>
      </div>
    </div>
  </div>
</div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create Category</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="categories.php" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<form action="#" method="post" id="categoryForm">
						<div class="card">
							<div class="card-body">								
								<div class="row">
									<div class="col-12">
										<div class="mb-3">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" class="form-control" placeholder="Name">
											<p></p>	
										</div>
									</div>
									<div class="col-12">
										<div class="mb-3">
										<label for="status">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="1">Show</option>
                                                <option value="0">Hide</option>
                                            </select>
                                    	</div>
                               	 </div> 
                                   

									
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary" data-bs-toggle='modal' data-bs-target='#create-category'>Create</button>
							<a href="categories.php" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>					
					</form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
            <?php  require_once "./footer.php" ; ?>

			<script type="module">
				  import {scs,closeIcon,err,clears}  from "./js/modules2.js";
				  var form = $("#categoryForm");
					form.on("submit",function(e){
						e.preventDefault();
					});

					$("#create").click(function(){
						let cat_name = $('#name').val();
						let status = $('#status').val();
						
						if(cat_name != ""){
							$('#name').removeClass('is-invalid')
							.siblings('p')
							.removeClass('invalid-feedback').html("");
							$.ajax({
								url : "php/save-category.php",
								type : "POST",
								data : {
									name : cat_name,
									status : status
								},
								dataType:'json',
								success : function (response) {
									if(response.status == true) {
										form.trigger("reset");
                            		    $('#create-category').modal('hide');
										scs("Successfull",response.message);
									}else{
										$('#create-category').modal('hide');
										err("Error!",response.message);
									}
								}
							});
						}else{
							$('#create-category').modal('hide');
							$('#name').addClass('is-invalid')
							.siblings('p')
							.addClass('invalid-feedback').html("*required field.");
						}
    
                });
			</script>