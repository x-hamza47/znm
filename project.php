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
                <li><a href="index.php#projects" class="active">Projects</a></li>
                <li><a href="index.php#clients">Clients</a></li>
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
        <h2></h2>
    </div>
</section>

<section class="project" id="project"> 
    				<!-- Default box -->
                    <?php
                    	if (isset($_GET['proId'])) {
                            $usr_id = htmlspecialchars($_GET['proId']);
                            require_once "./php/config.php";
                            $db = new dataSend();
                            $sql = "SELECT projects.project_name, projects.project_desc, projects.location, 
                            project_images.project_image,
                            categories.name AS c_name, sub_categories.name AS s_name 
                    FROM projects 
                    LEFT JOIN categories ON projects.category = categories.cid 
                    LEFT JOIN sub_categories ON projects.sub_category = sub_categories.id 
                    LEFT JOIN project_images ON projects.project_id = project_images.pid 
                    WHERE project_id = ? 
                    ORDER BY project_images.pid ASC 
                    LIMIT 4";
                            $query= $db->prepare($sql);
                            $query->bind_param('s',$usr_id);
                            if($query->execute()) {
                                $query->bind_result($title, $desc, $location,$img, $cid, $sid);
                                $imgs = array();
                                while ($query->fetch()) {
                                    // $imgId[] = $img_id;
                                    $imgs[] = $img;
                                }
                                $query->close();
                    ?>
    <main class="project-container container-fluid d-flex justify-content-between flex-wrap">

        <div class="info-bx-1 container-fluid  ">

            <div class="desc-container">
                <h3><?php echo $title; ?></h3>
                <div class="desc"><?php echo $desc; ?> </div>
            </div> 
            <div class="detail-container">
                <h4>Service</h4>
                <span><?php echo $cid;?></span>
            </div> 
            <div class="detail-container">
                <h4>Category</h4>
                <span><?php echo $sid;?></span>
            </div> 
            <div class="detail-container">
                <h4>Location</h4>
                <span><?php echo $location; ?></span>
            </div> 
        </div>
        <div class="img-container">
                <?php foreach ($imgs as $i) {
                    echo "<img src= 'admin/uploads/".$i."'>";
                } ?>
        </div>

    </main>
    <?php
            }else{
                return false;
            }
        }else{
            return false;
        }
    ?>
</section>

<?php require_once "./pages/lets-talk.php";  ?>

<?php require_once "./pages/footer.php"; ?>

<script type="module" src="js/service.js"></script>
<script>
    let name = $('.desc-container h3').text();
    $("#project-head .heading h2").text(name);
</script>

</html>