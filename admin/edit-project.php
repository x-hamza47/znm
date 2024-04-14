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
                            require_once "../admin/php/crud.php";
                            $db = new Database();
                            $sql = "SELECT projects.project_id,projects.project_name,projects.project_desc,projects.category,projects.sub_category,location,status,project_images.id,project_images.project_image FROM projects LEFT JOIN project_images
                            ON projects.project_id = project_images.pid WHERE project_id = ?";
                            $query= $db->prepare($sql);
                            $query->bind_param('s',$usr_id);
                            if($query->execute()) {
                                $query->bind_result($id, $title, $desc, $cid, $sid, $location, $status,$img_id,$img);
                                $imgs = array();
                                while ($query->fetch()) {
                                    $imgId[] = $img_id;
                                    $imgs[] = $img;
                                }
                                $query->close();
                    ?>
					<form class="container-fluid " method="POST"  enctype="multipart/form-data" id="form">
                        <div class="row" >
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">								
                                        <div class="row">
                                        <div class="form-group">
                                            <input type="hidden" id="p_id" name="pro_id"  class="form-control" value="<?php echo $id; ?>">
                                        </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" id="title" value="<?php echo $title; ?>" class="form-control" placeholder="Title">	
                                                    <p></p>
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
                                        <div id="image" class="dropzone dz-clickable">
                                            <div class="dz-message needsclick">    
                                             <br>Drop files here or click to upload.<br><br>                                            
                                            </div>
                                        </div>
                                    </div>	 
                                                                                                       
                                </div>
                                <div class="row" id="product-gallery">
                                    <?php
                                    if(!empty($imgs)) {
                                    foreach ($imgs as $key => $img) {
                                        echo "<div class='col-md-3' id='img-row-" . $imgId[$key] . "'> 
                                        <div class='card' id='image-div'>
                                            <input type='hidden' name='old_img[]' value='" . $img . "'>
                                            <img src='uploads/" . $img . "' class='card-img-top' alt=''>
                                            <div class='card-body'>
                                                <a href='javascript:void(0)' data-img-row='" . $imgId[$key] . "' class='btn btn-danger'>Delete</a>
                                            </div>
                                        </div>
                                        </div>";
                                    }   
                                }
                                ?>
                              
                                </div>
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label for="location">Location</label>
                                        <input type="text" value="<?php echo $location; ?>" name="location" id="location" class="form-control" placeholder="e.g., Mirpurkhas, Sindh, Pakistan">	
                                        <p></p>
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
                                <div class="card">
                                    <div class="card-body">	
                                        <h2 class="h4  mb-3">Project category</h2>
                                        <div class="mb-3">
                                            <label for="category">Category</label>
                                            <select name="category" id="category" class="form-control">
                                            <option selected disabled>-- Select a Category --</option>
											<?php 
												// $db2 = new Database();
												$response = $db->select('categories','cid,name',null,"status = '1'",'name ASC',null,null);
												if($response != false){
													foreach ($response as $category) {
														echo "<option ".(($category['cid'] == $cid) ? 'selected' : '')." value='{$category['cid']}'>{$category['name']}</option>";
													}
												}else{
													echo "<option disabled>--Categories not found--</option>";
												}
											?>
											</select>
											<p></p>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category">Sub category</label>
                                            <select name="sub_category" id="sub_category" class="form-control">
                                            <option selected disabled>-- Select a Sub Category --</option>
                                            <?php 
												// $db2 = new Database();
												$response2 = $db->select('sub_categories','id,name',null,"category_id = '{$cid}' AND status = '1'",'name ASC',null,null);
												if($response2 != false){
													foreach ($response2 as $subcategory) {
														echo "<option ".(($subcategory['id'] == $sid) ? 'selected' : '')." value='{$subcategory['id']}'>{$subcategory['name']}</option>";
													}
												}
											?>
                                            </select>
                                            <p></p>
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
           import {scs,closeIcon,err,clears}  from "./js/modules2.js";
        var dropzone;
        Dropzone.autoDiscover = false;    
            $(function () {
                // Summernote
                $('.summernote').summernote({
                    height: '300px'
                });
                dropzone = new Dropzone('#image',{ 
                    url: "php/update-project-img.php",
                    maxFiles: 4,
                    uploadMultiple: true,
                    parallelUploads : 4,
                    addRemoveLinks: true,
                    acceptedFiles: "image/jpeg,image/png,image/jpg",
                    autoProcessQueue: false,
                    success: function(file, response) {
                        if(response.status == true) {
                            setTimeout(() => {
                                scs("Successfull",response.message);
                            },5500);
                        }else{
                            setTimeout(() => {
                                err("Error!",response.message);
                            },5500);
                        }
                        
                    },
                        complete:function(file){
                           setTimeout(() => {
                            this.removeFile(file);
                           },2000) ;
                        }
                });
            });

            var form = $("#form");
            $("input[type='submit']").on("click",function(e){
                e.preventDefault();
            });
            $("#update").click(function(){
                $('#update-project').modal('hide');
                let name = $("#title").val();;
                let location = $("#location").val();


                if(name != ""){
                    $('#title').removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback').html("");

                    if(location != ""){
                        $('#description').removeClass('is-invalid')
					    .siblings('p')
					    .removeClass('invalid-feedback').html("");

                                const formData = new FormData(form[0]);
                                $.ajax({
                                    url : "./php/update-project.php",
                                    type : "POST",
                                    data : formData,
                                    dataType:'json',
                                    contentType: false, 
                                    processData: false,
                                    success : function (response) {
                                        console.log(response);
                                        if(response.status == true) {
                                            // form.trigger("reset");
                                         var pro_id = $("#p_id").val();
                                        dropzone.options.params = { pro_id: pro_id };
                                        dropzone.processQueue();
                                            scs("Successfull",response.message);
                                        }else{
                                            err("Error!",response.message);
                                        }
                                    }
                                });
   
                    }else{
                        $('#location').addClass('is-invalid')
					    .siblings('p')
					    .addClass('invalid-feedback').html("The location field is required");
                    }

                }else{
                    $('#title').addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html("The title field is required");
                }

                });

            
    $('#category').change(function(){
    let category_id = $(this).val();
    $.ajax({
            url : "./php/project-sub-category.php",
            type : 'GET',
            data : { category_id: category_id},
            dataType : 'json',
            success: function(response){

                $('#sub_category').find('option').not(':first').remove();
                $.each(response,function(key, item){
                    console.log(item.id);
                    $('#sub_category').append(`<option value="${item.id}">${item.name}</option>`);
                });
            }
            ,error:function(jqXHR, exception) {
            console.error("Something went wrong");
            }
    });
    });

$("#image-div .card-body a").click(function(){
    let img_id = $(this).data("img-row");
    let img = $('#img-row-' + img_id + ' input[name="old_img[]"]').val();
    clears();
    if (img_id != "") {
    $.ajax({
    type: "POST",
    url: "./php/delete-img.php",
    data: {img_id : img_id,img_name : img},
    dataType: "json",
    success: function (response) {
        if(response.status === true){
            $('#img-row-' + img_id).fadeOut(400, function() {
                $(this).remove();
            });
        }else{
            alert("ERROR");
        }
    }
    });
    } else {
    res.err("Error","Project not found!");
    }
   
});
            
        </script>