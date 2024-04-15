<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Title -->
      <title>ZNM -Enterprises</title>
      <!-- Favicons -->
      <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
      <link rel="manifest" href="favicon/site.webmanifest">
        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
          <!-- Link Swiper's CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
      <!-- Boxicons Cdn -->
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <!-- Link Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- Custom CSS -->
      <link rel="stylesheet" href="css/colors.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/lets-talk.css">
      <link rel="stylesheet" href="css/projects.css">
</head>
<body>
    <header class="header">
        <!--  NAVBAR  -->
        <nav class="nav">

            <a href="" id="logo">
                <img src="images/logo-2.png" alt="logo">
                <!-- <span> <h3>ZNM Enterprises</h3></span> -->
            </a>
            
           
              <ul class="links">
                <li><a href="index.php#home">Home</a></li>
                <li><a href="index.php#about-us">About Us</a></li>
                <li><a href="index.php#service">Services</a></li>
                <li><a href="interior.php">Interior Gallery</a></li>
                <li><a href="index.php#projects" class="active">Projects</a></li>
                <li><a href="index.php#clients">Clients</a></li>
                <li><a href="index.php#contact">Contact</a></li>
              </ul>

              <button class="nav__toggle-btn"><i class='bx bx-menu'></i></button> 
        </nav>
            <i class='bx bx-chevron-down arr-dwn'></i>
<!-- service -->
    <section class="srv" id="srv">

      <div class=" swiper mySwiper2 srv-container">
        <div class="swiper-wrapper srv-content">
         
          <!-- card end -->
        </div>
      </div>
    </section>
    </header>

<section class="projects-head d-flex justify-content-center align-items-center " id="projects-head">
    <div class="heading ">
        <h1>Projects</h1>
        <h2>Having an idea. Creating spaces</h2>
    </div>
</section>

<section class="projects" id="projects">

    <main class="projects-container container-fluid">

    </main>

</section>

<?php require_once "./pages/lets-talk.php";  ?>

<?php require_once "./pages/footer.php"; ?>
  
  <script type="module" src="js/service.js"></script>

  <script type="module">
import {success,closeIcon,err,clears}  from "./js/modules.js";
	// loadTable

function loadTable () {
$.ajax({
   type: "POST",
   url: "./php/fetch-projects.php",
//    data: {page : page},
   success: function (response) {
	  $(".projects-container").html(response);
},
error: function(xhr, status, error) {
   console.log('Error retrieving pagination data:', error);
}});
}//end
loadTable();//calling on load
$(document).on('click', '.project-bx', function() {
var proId = $(this).data('pro-id');
window.location.href = `project.php?proId=${proId}`;
});
  </script>
</html>