<?php
    require_once "php/crud.php";
    SessionController::startSession();
    if (!SessionController::isLoggedIn()) {
        SessionController::redirectUserLogin();
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ZNM Enterprises - <?php  echo ucfirst(basename($_SERVER['PHP_SELF'],".php")); ?></title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<!-- Theme style -->
		<link rel="stylesheet" href="css/adminlte.min.css">
		<?php 
		if(basename($_SERVER['PHP_SELF']) == "create-project.php" || basename($_SERVER['PHP_SELF']) == "edit-project.php") {
			echo '<link rel="stylesheet" href="plugins/summernote/summernote-bs5.min.css">';
			echo '<link rel="stylesheet" href="plugins/dropzone/dropzone.css">';
		};  ?>
		<!-- Custom Css -->
		<link rel="stylesheet" href="css/custom.css">
	</head>
	<body class="hold-transition sidebar-mini">

		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Right navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
					  	<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>					
				</ul>
				<div class="navbar-nav pl-2">
					<ol class="breadcrumb p-0 m-0 bg-white">
						<li class="breadcrumb-item"><a href="<?php echo $_SERVER['PHP_SELF']; ?>"><?php  echo ucfirst(basename($_SERVER['PHP_SELF'],".php")); ?></a></li>
						<!-- <li class="breadcrumb-item active">List</li> -->
					</ol>
				</div>
				
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
							<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
							<img src="img/avatar5.png" class='img-circle elevation-2' width="40" height="40" alt="">
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
							<h4 class="h4 mb-0"><strong>Syed Noman Mobin</strong></h4>
							<div class="mb-3">znm.enterprises3@outlook.com</div>
							<div class="dropdown-divider"></div>
							<!-- <a href="#" class="dropdown-item">
								<i class="fas fa-user-cog mr-2"></i> Settings								
							</a> -->
							<div class="dropdown-divider"></div>
							<a href="change-password.php" class="dropdown-item">
								<i class="fas fa-lock mr-2"></i> Change Password
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item text-danger"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
								<i class="fas fa-sign-out-alt mr-2"></i> Logout							
							</a>							
						</div>
					</li>
				</ul>
			</nav>
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4  position-fixed">
				<!-- Brand Logo -->
				<a href="#" class="brand-link">
					<img src="./img/logo.jpg" alt="ZNM Logo" class="brand-image img-square elevation-2 ml-1" style="opacity: .8">
					<span class="brand-text font-weight-light">ZNM Enterprises</span>
				</a>
				<!-- Sidebar -->
				<div class="sidebar">
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


							<li class="nav-item">
								<a href="projects.php" class="nav-link">
									<i class="nav-icon fas fa-tag"></i>
									<p>Projects</p>
								</a>
							</li>
					
							<li class="nav-item">
								<a href="inbox.php" class="nav-link">
									<i class="fa fa-envelope nav-icon"></i>
									<p>Inbox</p>
								</a>
							</li>
		
							<li class="nav-item mt-5 " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
								<a href="#" class="nav-link" >
									<i class="nav-icon  fas fa-sign-out-alt"></i>
									<p>Logout</p>
								</a>
							</li>
					
						</ul>
					</nav>
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->

         	</aside>
			<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to Logout? &#128578;
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="proceed">Logout</button>
      </div>
    </div>
  </div>
</div>

<!-- toast -->
	<div class="toast-1">
        <div class="content">
            <i class="fa-solid fa-check check"></i>

        <div class="message">
            <span class="text text-1"><!-- Dynamic text --></span>
            <span class="text text-2"><!-- Dynamic text --></span>
        </div>
        <i class="fa-solid fa-xmark close"></i>
        
        <div class="progress"></div>
        
        </div>
    </div>
    <!-- toast end -->
