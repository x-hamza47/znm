<?php
	require_once "./header.php";
?>
<div class="modal fade" id="upload-project" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Upload</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you really want to upload the project? &#128578;
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="upload">Proceed</button>
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
								<h1>Upload Project</h1>
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
					<form class="container-fluid " method="POST" enctype="multipart/form-data" id="form">
                        <div class="row" >
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">								
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title">	
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
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
                                            <div class="col-md">
                                                <div class="mb-3">
                                                    <label for="location">Location</label>
                                                    <input type="text" name="location" id="location" class="form-control" placeholder="e.g., Mirpurkhas, Sindh, Pakistan">	
                                                    <p></p>
                                                </div>
                                            </div>                                         
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
                                                <option value="1">Show</option>
                                                <option value="0">Hide</option>
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
												require_once "../admin/php/crud.php";
												$db = new Database();
												$response = $db->select('categories','cid,name',null,"status = '1'",'name ASC',null,null);
												if($response != false){
													foreach ($response as $category) {
														echo "<option value='{$category['cid']}'>{$category['name']}</option>";
													}
												}else{
													echo "<option disabled>--Categories not found--</option>";
												}
											?>
											</select>
											
                                        </div>
                                        <div class="mb-3">
                                            <label for="category">Sub category</label>
                                            <select name="sub_category" id="sub_category" class="form-control">
                                            <option selected disabled>-- Select a Sub Category --</option>
                                            </select>
                                     
                                        </div>
                                    </div>
                                </div>
                                   
                            </div>
                        </div>
						
						<div class="pb-5 pt-3">
							<input type="submit" class="btn btn-primary" value="Upload" data-bs-toggle='modal' data-bs-target='#upload-project'>
							<a href="projects.php" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
                    </form>
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
                    url: "php/save-project-img.php",
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
            $("#upload").click(function(){
                $('#upload-project').modal('hide');
                let name = $("#title").val();
                let location = $("#location").val();
                if(name != ""){
                    $('#title').removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback').html("");

                    if(location != ""){
                        $('#location').removeClass('is-invalid')
					    .siblings('p')
					    .removeClass('invalid-feedback').html("");

                                const formData = new FormData(form[0]);
                                $.ajax({
                                url : "php/save-project.php",
                                type : "POST",
                                data : formData,
                                dataType:'json',
                                contentType: false, 
                                processData: false,
                                success : function (response) {
                                    if(response.status == true) {
                                        var pro_id = response.pro_id;
                                        dropzone.options.params = { pro_id: pro_id };
                                        dropzone.processQueue();
                                        form.trigger("reset");
                                        $('.summernote').summernote('code', ''); 
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
                    $('#sub_category').append(`<option value="${item.id}">${item.name}</option>`);
                });
            }
            ,error:function(jqXHR, exception) {
            console.error("Something went wrong");
            }
    });
    });

            
            
        </script>