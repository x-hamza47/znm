<?php
	require_once "header.php";
?>
<!-- delete modal -->
<div class="modal fade" id="deleteDrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to Delete? &#128578;
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="delete">Delete</button>
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
								<h1>Inbox</h1>
							</div>
							<div class="col-sm-6 text-right">
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="card bg-dark">
							<div class="card-header ">
								<div class="card-tools">
									<div class="input-group" style="width: 250px;">
										<input type="text"  id="search_key" class="form-control float-right" placeholder="Search...">
					
										<div class="input-group-append">
										  <button id="s-btn" class="btn btn-primary">
											<i class="fas fa-search"></i>
										  </button>
										</div>
									  </div>
								</div>
							</div>
							<div class="card-body table-responsive p-0">								
								<table class="table table-hover bg-secondary text-nowrap ">
									<thead class="table-dark ">
										<tr>
											<th width="60">S.NO</th>									
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Time</th>
                                            <th>Date</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="tb-body">
						
									</tbody>
								</table>										
							</div>
							<div class="card-footer clearfix">
								<ul class="pagination  m-0 float-right">
								  <li class="page-item"><a class='page-link' href="#">«</a></li>
								  <li class="page-item"><a class="page-link" href="#">1</a></li>
								  <li class="page-item"><a class="page-link" href="#">2</a></li>
								  <li class="page-item"><a class="page-link" href="#">3</a></li>
								  <li class="page-item"><a class="page-link" href="#">»</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>

<script type="module">
	import {scs,closeIcon,err,clears}  from "./js/modules2.js";


	// loadTable
function loadTable (page) {
	$.ajax({
	type: "POST",
	url: "./php/fetch_data.php",
	data: {page : page},
	success: function (response) {
		$("#tb-body").html(response);
	},
	error: function(xhr, status, error) {
	console.log('Error retrieving pagination data:', error);
	}
	});
}//end

// pagination
function pagination (page) {
	let tb = "messages";
	$.ajax({
	type: "POST",
	url: "./php/pagination.php",
	data: {page : page, tb : tb},
	success: function (response) {
		$(".card-footer").html(response);
	},
	error: function(xhr, status, error) {
	console.log('Error retrieving pagination data:', error);
	}
	});
}//pagination end

loadTable();//calling on load
pagination();

	$(document).on("click",".pagination a",function(e){
	e.preventDefault();
	var page_id = parseInt($(this).not('#prev , #next').attr("id"));
	loadTable(page_id);
	pagination(page_id);
	});


$(document).on('click', '.open-msg-btn', function() {
var userId = $(this).data('user-id');
window.location.href = `chat.php?user=${userId}`;
});

	// SEARCH

	$("#search_key").on("keyup",function(){
	var search_term = $(this).val();
	$.ajax({
		url : "./php/inbox-search.php",
		type : "POST",
		data : {search : search_term},
		success : function(res){
			$("#tb-body").html(res);			
		}
	});
	});

// Delete
$(document).on('click','.delete-btn',function() {
var userId = $(this).data('user-id');
userId = encodeURIComponent(userId);
var currentPage = parseInt($(".pagination li.active a").attr("id"));
var ele =this;
clears();
$("#delete").click(function() {
if (userId != "") {
$.ajax({
   type: "POST",
   url: "./php/delete-msg.php",
   data: {d_id : userId},
   dataType: "json",
   success: function (response) {
	  if(response.status == true) {
		$('#deleteDrop').modal('hide');
		scs("Successfull",response.message);
		$(ele).closest("tr").fadeOut(400,function() {
		$(ele).closest("tr").remove();
		loadTable();pagination();
		});
	  }else{
		$('#deleteDrop').modal('hide');
		 err("Error",response.message);
	  }
   }
});
} else {
res.err("Error","Mail not found!");
}
});
});//delete end


</script>
				<?php  require_once "footer.php" ; ?>