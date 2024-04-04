<?php require_once "./header.php"; ?>
<div class="modal fade" id="edit-subcategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Upload</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to Update Sub Category? &#128578;
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="edit">Proceed</button>
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
								<h1>Edit Sub Category</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="sub-category.php" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                    <?php
                    	if (isset($_GET['sub'])) {
                            $cat_id = htmlspecialchars($_GET['sub']);
                            $db = new Database();
                            $sql = "SELECT * FROM sub_categories WHERE id = ?";
                            $query= $db->prepare($sql);
                            $query->bind_param('s',$cat_id);
                            if($query->execute()) {
                                $query->bind_result($id,$cid, $name, $status);
								$query->fetch();
                                $query->close();
                    ?>
					<form action="#" method="post" id="updateSubCategoryForm">
						<div class="card">
							<div class="card-body">								
								<div class="row">
                                    <div class="col-md-12">
										<div class="mb-3">
											<label for="name">Category</label>
											<select name="category" id="category" class="form-control">
											<option selected disabled>--Select a Category--</option>;
											<?php 
												// require_once "./php/crud.php";
												// $db = new Database();
												$response = $db->select('categories','cid,name',null,"status = '1'",'name ASC',null,null);
												if($response != false){
													foreach ($response as $category) {
														echo "<option ".(($category['cid'] == $cid) ? 'selected' : '')." value='{$category['cid']}'>{$category['name']}</option>";
													}
												}else{
													echo "<option disabled>Categories not found</option>";
												}
											?>
											</select>
											<p></p>
                        
										</div>
									</div>
                                    <div class="form-group">
                                            <input type="hidden" id="sid" name="sub_id"  class="form-control" value="<?php echo $id; ?>">
                                    </div>
									<div class="col">
										<div class="mb-3">
											<label for="name">Name</label>
											<input type="text" value="<?php echo $name; ?>" name="name" id="name" class="form-control" placeholder="Name">	
											<p></p>
										</div>
									</div>								
									<div class="col">
										<div class="mb-3">
										<label for="status">Status</label>
                                            <select name="status" id="status" class="form-control">
                                            <option <?php echo ($status == '1') ? 'selected' : '' ; ?> value="1">Show</option>
                                                <option <?php echo ($status == '0') ? 'selected' : '' ; ?>  value="0">Hide</option>
                                            </select>
                                    	</div>
                               	 </div> 							
								</div>
							</div>							
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary" data-bs-toggle='modal' data-bs-target='#edit-subcategory'>Update</button>
							<a href="sub-category.php" class="btn btn-outline-dark ml-3" >Cancel</a>
						</div>
					</form>
                    <?php
                            }else{
                                return false;
                            }
                        }else{
                            return false;
                        }
                    ?>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

<?php  require_once "./footer.php" ; ?>

<script type="module">
				  import {scs,closeIcon,err,clears}  from "./js/modules2.js";
				  var form = $("#updateSubCategoryForm");
					form.on("submit",function(e){
						e.preventDefault();
					});

					$("#edit").click(function(){ 
						let cat_id = $("#category").val();
						let cat_name = $('#name').val();
						$('#edit-subcategory').modal('hide');
						
						if(cat_name != "" && cat_id != ""){
							$('#name,category').removeClass('is-invalid')
							.siblings('p')
							.removeClass('invalid-feedback').html("");
							$.ajax({
								url : "php/update-subcategory.php",
								type : "POST",
								data : form.serialize(),
								dataType:'json',
								success : function (response) {
									if(response.status == true) {
										scs("Successfull",response.message);
									}else{
										err("Error!",response.message);
									}
								}
							});
						}else{
							$('#name,#category').addClass('is-invalid')
							.siblings('p')
							.addClass('invalid-feedback').html("*required field.");
						}
    
                });
			</script>