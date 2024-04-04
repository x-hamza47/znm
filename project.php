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
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/colors.css">
      <link rel="stylesheet" href="css/lets-talk.css">
      <link rel="stylesheet" href="css/projects.css">
</head>
<body>
    <header class="header">
        <!--  NAVBAR  -->
        <nav class="nav">
            <a href="" id="logo">
                <img src="images/logo-2.png" alt="logo">
            </a>
            <!-- Nav Links -->
              <ul class="links">
                <li><a href="index.php#home">Home</a></li>
                <li><a href="index.php#about-us">About Us</a></li>
                <li><a href="index.php#service">Services</a></li>
                <li><a href="index.php#service">Design Gallery</a></li>
                <li><a href="index.php#clients">Clients</a></li>
                <li><a href="index.php#projects" class="active">Projects</a></li>
                <li><a href="index.php#contact">Contact</a></li>
              </ul>
            <button class="nav__toggle-btn"><i class='bx bx-menu'></i></button> 
        </nav>
            <i class='bx bx-chevron-down arr-dwn'></i>
            <!-- service head-->
            <section class="srv" id="srv">
                <div class=" swiper mySwiper2 srv-container">
                    <div class="swiper-wrapper srv-content">
                    <!-- card end -->
                    </div>
                </div>
            </section>
    </header>

    <section class="project-head d-flex justify-content-center align-items-center " id="project-head">
    <div class="heading">
        <h1>Project</h1>
        <h2>Company Name</h2>
    </div>
</section>

<section class="project" id="project"> 
    <main class="project-container container-fluid d-flex justify-content-between flex-wrap">

        <div class="info-bx-1 container-fluid  ">

            <div class="desc-container">
                <h3>Company Name</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio ad et eos dicta, possimus vel sequi consequatur autem iste cumque dolores alias saepe    modi quos voluptatem libero quod dolorum assumenda. </p>
            </div> 
            <div class="detail-container">
                <h4>Year</h4>
                <span>2024</span>
            </div> 
            <div class="detail-container">
                <h4>Location</h4>
                <span>Karachi,Pakistan</span>
            </div> 
            <div class="detail-container">
                <h4>Category</h4>
                <span>Form L</span>
            </div> 
        </div>
        <div class="img-container">
            <img src="./images/web-background-d.jpg">
            <img src="./images/petroleum-2.jpg">
            <img src="./images/background-6.png">
            <img src="./images/construction-3-e1.jpg">
        </div>

    </main>
</section>

<?php require_once "./pages/lets-talk.php";  ?>

<?php require_once "./pages/footer.php"; ?>

<script type="module" src="js/service.js"></script>
</html>