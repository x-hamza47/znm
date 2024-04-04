<?php
	require_once "./header.php";
?>
<div class="modal fade" id="update-project" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to update the project? &#128578;
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update">Proceed</button>
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
								<h1>Edit Project</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="projects.php" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">

					<!-- Default box -->
                    <?php
                    	if (isset($_GET['proId'])) {
                            $usr_id = htmlspecialchars($_GET['proId']);
                            $db = new Database();
                            $sql = "SELECT * FROM projects WHERE id = ?";
                            $query= $db->prepare($sql);
                            $query->bind_param('i',$usr_id);
                            if($query->execute()) {
                                $query->bind_result($id, $img, $title, $desc, $status);
								$query->fetch();
                                $query->close();
                    ?>
					<form class="container-fluid " method="POST"  enctype="multipart/form-data" id="form">
                        <div class="row" >
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">								
                                        <div class="row">
                                        <div class="form-group">
                                            <input type="hidden" name="pro_id"  class="form-control" value="<?php echo $id; ?>">
                                        </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" id="title" value="<?php echo $title; ?>" class="form-control" placeholder="Title">	
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description"><?php echo $desc; ?></textarea>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>	                                                                      
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Media</h2>								
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="inputGroupFile04"  name="fileUpload">
                                        </div>
                                    </div>	 
                                                                                                       
                                </div>
                                <div class="row" id="product-gallery">
                                    <div class="col-md-3"> 
                                        <div class="card" id='image-div'>
                                            <input type="hidden" name="old_img" value="<?php echo $img; ?>">
                                            <img src="uploads/<?php echo $img;?>" class="card-img-top" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <div class="card-body">	
                                        <h2 class="h4 mb-3">Project status</h2>
                                        <div class="mb-3">
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
							<input type="submit"  class="btn btn-primary" value="Update" data-bs-toggle='modal' data-bs-target='#update-project'>
							<a href="projects.php" class="btn btn-outline-dark ml-3">Cancel</a>
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
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div> 
			
		</div>
        <?php  require_once "./footer.php" ; ?>
 
       <script type="module">
            $(function () {
                // Summernote
                $('.summernote').summernote({
                    height: '300px'
                });
            });
            import {scs,closeIcon,err,clears}  from "./js/modules2.js";

            var form = $("#form");
            $("input[type='submit']").on("click",function(e){
                e.preventDefault();
                const formData = new FormData(form[0]);
                $("#update").click(function(){
                    $('#update-project').modal('hide');
                    $.ajax({
                        url : "php/update-project.php",
                        type : "POST",
                        data : formData,
                        dataType:'json',
                        contentType: false, 
                        processData: false,
                        success : function (response) {
                            if(response.status == true) {
                                form.trigger("reset");
                                scs("Successfull",response.message);
                            }else{
                                err("Error!",response.message);
                            }
    
                        }
                    });
                });
            });
            
        </script>