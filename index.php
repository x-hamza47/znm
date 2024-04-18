<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Title -->
      <title>ZNM-Enterprises</title>
      <!-- Favicons -->
      <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
      <link rel="manifest" href="favicon/site.webmanifest">
          <!-- Link Swiper's CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
      <!-- Boxicons Cdn -->
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <!-- Link Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- Custom CSS -->
      <link rel="stylesheet" href="css/carousel.css">
      <link rel="stylesheet" href="css/colors.css">
      <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
        <!--  NAVBAR  -->
        <nav class="nav">

            <a href="index.php" id="logo">
                <img src="images/logo-2.png" alt="logo">
            </a>
            
           
              <ul class="links">
                <li><a href="index.php#home" class="active">Home</a></li>
                <li><a href="index.php#about-us">About</a></li>
                <li><a href="index.php#service">Services</a></li>
                <li><a href="interior.php">Interior Gallery</a></li>
                <li><a href="projects.php">Projects</a></li>
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
          <?php include_once "./pages/header-cards.php"; ?>
        </div>
      </div>
    </section>

    </header>

    <!--    HOME SECTION    -->
    <section class="home" id="home">

        <div class="slider">
            <div class="imgs">
              
              <div class="img" style="left: 0;">
                <div class="content">
                  <h2 class="current-img">Explosive License Service</h2>
                  <a href="license.php" class="current-img"><button>See more!</button></a>
                </div>
              </div>

              <div class="img"> 
                <div class="content">
                    <h2>Design Consultant</h2>
                    <a href="service.php"><button>See more!</button></a>
                </div>
              </div>

              <div class="img">
                <div class="content">
                    <h2>Construction</h2>
                  <a href="service.php"><button>See more!</button></a>
                </div>
              </div>


              <div class="img">
                <div class="content">
                    <h2>Web Development</h2>
                  <a href="service.php"><button>See more!</button></a>
                </div>
              </div>
              <div class="img">
                <div class="content">
                    <h2>Event Managment</h2>
                  <a href="service.php"><button>See more!</button></a>
                </div>
              </div>

            </div>

            <span class="prev"><i class='bx bx-chevron-left'></i></span>
            <span class="next"><i class='bx bx-chevron-right' ></i></span>
            <!-- Dots -->
            <div class="dots"></div>
          </div>
       
    </section>

<!-- About Us -->

<section class="about-us" id="about-us">

    <div class="container">
        
      <div class="content">
        <div class="info-text txt2">
          
              <h3>The Intelligent Way to Plan</h3>
              <p>It all began with a passion for design and strong relationships, evolving into a powerhouse of engineering expertise with a wide range of services and exciting new products on the horizon. Although we've primarily served the mining and construction sectors, our reach goes far beyond.</p>
              
              <p>At <strong>ZNM</strong>, we're all about finding smart, sustainable solutions that make life easier for our clients. Whether we're starting from scratch or fine-tuning existing projects, our focus is on exceeding your expectations and making sure you feel valued every step of the way.</p>
              
              <p><strong>ZNM</strong> is more than just a consulting firm; we're your partners in the design and construction process. Our goal is to build lasting relationships based on trust and outstanding performance from every member of our team.</p>
              
            </div>
            <div class="info-img img2"></div>

      </div>

        <div class="content">
          <div class="info-img img1"></div>
          <div class="info-text txt1">
            
            <h3>Our Specialization</h3>
            <ul class="our-special">
              <li>Design Consultant</li>
              <li>Explosive License Service</li>
              <li>Interior Designing</li>
              <li>Construction</li>
              <li>Web Development</li>
              <li>Event Management</li>
            </ul>

          <h3 style="margin-top: 20px;">Our Value</h3>
          <dl class="val-desc">
            <dt>High Standards</dt>
            <dd>Be the BETTER solution provider, setting foundation for long term value.</dd>
            <dt>Build Trust</dt>
            <dd>Take responsibility for commitments, actions an recommendation</dd>
            <dt>Pragmatism</dt>
            <dd>Balance innovation and creativity with Business awareness and productivity</dd>
            <dt>Open Communication</dt>
            <dd>Communication clearly and efficiently up and across the business</dd>
            <dt>Collaboration</dt>
            <dd>Respect individual work while creating success for the team initiative</dd>
          </dl>
            
        </div>

        </div>
        </div>
  </section>

  <section class="service-sec" id="service">
           <div class="head-container">
                <h2>Services</h2>
          </div>
    <main class="service-container">
      <!-- service bx-1 -->
            <div class="service-bx">
            <svg class="serv-ico" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" ><path d="m260-260 300-140 140-300-300 140-140 300Zm220-180q-17 0-28.5-11.5T440-480q0-17 11.5-28.5T480-520q17 0 28.5 11.5T520-480q0 17-11.5 28.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>          
              <h3>Topography</h3>
              <div class="serv-detail">
                <p>
                Topography is the topic (theme, framework, and plan) that holds architecture and landscape...
                </p>
              </div>
              <button class="serv-btn" ><a href="service.php#topography">Read More</a></button>
            </div>
    <!-- service bx-2 -->
          <div class="service-bx">
            <svg class="serv-ico" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" ><path d="m270-120-10-88 114-314q15 14 32.5 23.5T444-484L334-182l-64 62Zm420 0-64-62-110-302q20-5 37.5-14.5T586-522l114 314-10 88ZM480-520q-50 0-85-35t-35-85q0-39 22.5-69.5T440-752v-88h80v88q35 12 57.5 42.5T600-640q0 50-35 85t-85 35Zm0-80q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Z"/></svg>
            <h3>Architecture Services</h3>
            <div class="serv-detail">
              <ul>
                <li>Pre-Design</li>
                <li>Sketch Design</li>
                <li>Developed Design</li>
              </ul>
            </div>
            <button class="serv-btn" ><a href="service.php#architect-service">Read More</a></button>
          </div>
    <!-- service bx-3 -->
        <div class="service-bx">
        <svg class="serv-ico" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" ><path d="M160-120q-17 0-28.5-11.5T120-160q0-17 11.5-28.5T160-200h40v-240h-40q-17 0-28.5-11.5T120-480q0-17 11.5-28.5T160-520h40v-240h-40q-17 0-28.5-11.5T120-800q0-17 11.5-28.5T160-840h640q17 0 28.5 11.5T840-800q0 17-11.5 28.5T800-760h-40v240h40q17 0 28.5 11.5T840-480q0 17-11.5 28.5T800-440h-40v240h40q17 0 28.5 11.5T840-160q0 17-11.5 28.5T800-120H160Zm120-80h400v-240q-17 0-28.5-11.5T640-480q0-17 11.5-28.5T680-520v-240H280v240q17 0 28.5 11.5T320-480q0 17-11.5 28.5T280-440v240Zm200-120q50 0 85-34.5t35-83.5q0-39-22.5-67T480-620q-75 86-97.5 114.5T360-438q0 49 35 83.5t85 34.5ZM280-200v-560 560Z"/></svg>         
          <h3>License Service</h3>
            <div class="serv-detail">
          <p> Our team consists of skilled professionals and tradespeople. We aim to deliver top-quality...</p> 
            </div>
          <button class="serv-btn" ><a href="license.php">Read More</a></button>
        </div>

    <!-- service bx-5 -->
          <div class="service-bx">
          <svg class="serv-ico" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" ><path d="M756-120 537-339l84-84 219 219-84 84Zm-552 0-84-84 276-276-68-68-28 28-51-51v82l-28 28-121-121 28-28h82l-50-50 142-142q20-20 43-29t47-9q24 0 47 9t43 29l-92 92 50 50-28 28 68 68 90-90q-4-11-6.5-23t-2.5-24q0-59 40.5-99.5T701-841q15 0 28.5 3t27.5 9l-99 99 72 72 99-99q7 14 9.5 27.5T841-701q0 59-40.5 99.5T701-561q-12 0-24-2t-23-7L204-120Z"/></svg>          
            <h3>Construction</h3>
            <div class="serv-detail">
          <p> Our team consists of skilled professionals and tradespeople. We aim to deliver top-quality...</p> 
            </div>
            <button class="serv-btn" ><a href="service.php#construction">Read More</a></button>
          </div>

    <!-- service bx-6 -->
    <div class="service-bx">
        <svg  class="serv-ico" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M791-55 280-566l-87 87 183 183-56 56L80-480l143-143L55-791l57-57 736 736-57 57Zm-54-282-57-57 87-87-183-183 56-56 240 240-143 143Z"/></svg>
          <h3>Web Development</h3>
      <div class="serv-detail">
        <p>
        Trust our team for top-quality web development services that bring your vision to life...
        </p>
      </div>
      <button class="serv-btn" ><a href="service.php#web-dev">Read More</a></button>
    </div>
    <!-- service bx-7 -->
    <div class="service-bx">
    <svg class="serv-ico" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M280-120v-80h160v-124q-49-11-87.5-41.5T296-442q-75-9-125.5-65.5T120-640v-40q0-33 23.5-56.5T200-760h80v-80h400v80h80q33 0 56.5 23.5T840-680v40q0 76-50.5 132.5T664-442q-18 46-56.5 76.5T520-324v124h160v80H280Zm0-408v-152h-80v40q0 38 22 68.5t58 43.5Zm200 128q50 0 85-35t35-85v-240H360v240q0 50 35 85t85 35Zm200-128q36-13 58-43.5t22-68.5v-40h-80v152Zm-200-52Z"/></svg>          <h3>Event Management</h3>
      <div class="serv-detail">
        <p>
        Trust our team for top-quality web development services that bring your vision to life...
        </p>
      </div>
      <button class="serv-btn" ><a href="service.php#web-dev">Read More</a></button>
    </div>
  </main>
  </section>

  <section class="visits" id="visit">

  <div class="visit-container">
          <!-- carousel -->
    <div class="carousel">
        <!-- list item -->
        <div class="list">
            <!-- item 1 -->
            <div class="item">
                <img src="images/petroleum-2.jpg">
                <div class="content">
                    <div class="author">HAMZA</div>
                    <h2 class="title">DEVELOPER</h2>
                    <h3 class="topic">LANDSCAPE</h3>
                    <p class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut quibusdam dolore, perspiciatis totam vel quasi dolorum molestiae delectus, molestias exercitationem tempore doloribus quia mollitia! Voluptas ipsa itaque sapiente eligendi! Deserunt.
                    </p>
                </div>
            </div>
            <!-- item 2 -->
          <div class="item">
            <img src="images/3d-e1.jpg">
            <div class="content">
                <div class="author">HAMZA</div>
                <h2 class="title">DEVELOPER</h2>
                <h3 class="topic">LANDSCAPE</h3>
                <p class="des">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut quibusdam dolore, perspiciatis totam vel quasi dolorum molestiae delectus, molestias exercitationem tempore doloribus quia mollitia! Voluptas ipsa itaque sapiente eligendi! Deserunt.
                </p>
            </div>
          </div>
            <!-- item 3 -->
          <div class="item">
            <img src="images/construction-3-e1.jpg">
            <div class="content">
                <div class="author">HAMZA</div>
                <h2 class="title">DEVELOPER</h2>
                <h3 class="topic">LANDSCAPE</h3>
                <p class="des">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut quibusdam dolore, perspiciatis totam vel quasi dolorum molestiae delectus, molestias exercitationem tempore doloribus quia mollitia! Voluptas ipsa itaque sapiente eligendi! Deserunt.
                </p>
            </div>
            </div>
          <!-- item 4 -->
          <div class="item">
            <img src="images/event-1.jpg">
            <div class="content">
                <div class="author">HAMZA</div>
                <h2 class="title">DEVELOPER</h2>
                <h3 class="topic">LANDSCAPE</h3>
                <p class="des">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut quibusdam dolore, perspiciatis totam vel quasi dolorum molestiae delectus, molestias exercitationem tempore doloribus quia mollitia! Voluptas ipsa itaque sapiente eligendi! Deserunt.
                </p>
            </div>
          </div>
          <!-- item 5 -->
          <div class="item">
            <img src="images/web-background-d.jpg">
            <div class="content">
                <div class="author">HAMZA</div>
                <h2 class="title">DEVELOPER</h2>
                <h3 class="topic">LANDSCAPE</h3>
                <p class="des">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut quibusdam dolore, perspiciatis totam vel quasi dolorum molestiae delectus, molestias exercitationem tempore doloribus quia mollitia! Voluptas ipsa itaque sapiente eligendi! Deserunt.
                </p>
            </div>
            </div>
        </div>
        <!-- thumbnail -->
        <div class="thumbnail">
            <!-- item 2 -->
            <div class="item">
                <img src="images/3d-e1.jpg">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="des">
                        Description
                    </div>
                </div>
            </div>
            <!-- item 3 -->
            <div class="item">
                <img src="images/construction-3-e1.jpg">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="des">
                        Description
                    </div>
                </div>
            </div>
            <!-- item 4 -->
            <div class="item">
                <img src="images/event-1.jpg">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="des">
                        Description
                    </div>
                </div>
            </div>
            <!-- item 5 -->
            <div class="item">
                <img src="images/web-background-d.jpg">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="des">
                        Description
                    </div>
                </div>
            </div>
            <!-- item 1 -->
            <div class="item">
                <img src="images/petroleum-2.jpg">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="des">
                        Description
                    </div>
                </div>
            </div>
        </div>
            <!-- arrows -->
            <div class="arrows">
                <button id="prev"><</button>
                <button id="next">></button>
            </div>
            <div class="time"></div>
    </div>

  </div>
  </section>

 <?php require_once './pages/clients.php'; ?>

<!-- Contact Section -->

<section class="contact_section" id="contact">

  <div class="contact-heading">
    <h2>
      Contact Us
    </h2>
  </div>
  <div class="contact-container">

    <div class="form_container">

      <!-- form -->
      <form id="contact_form">
        <div class="inp_grp">
          <input type="text" id="name" name="name" autocomplete="off">
          <label for="name">*Name</label>
          <i class='bx bxs-user'></i>
        </div>
        <div class="inp_grp">
          <input type="text" id="phone" name="phone" autocomplete="off">
          <label for="phone">Phone</label>
          <i class='bx bxs-phone' ></i>
        </div>
        <div class="inp_grp">
          <input type="email" id="email" name="email" autocomplete="off">
          <label for="email">*Email</label>
          <i class='bx bxs-envelope' ></i>
        </div>
        <div class="msg_grp">
          <textarea name="msg" id="msg" autocomplete="off"></textarea>
          <label>*Message</label>
        </div>

        <div class="sub-btn">
          <button id="send" type="submit">
            <i class='bx bxs-send' ></i>
            Send
          </button>
        </div>
      </form>
      <!-- form end -->
    </div>
    <!-- toast -->
          <div class="toast">
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

    <!-- google map -->
    <div class="g-map" id='map'>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3619.473388225556!2d67.05494938151904!3d24.88182938747785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33eede7deb1f1%3A0x52ea7d2b10bec712!2s11%2F1%2C%20Plot%2011%2C%20Modern%20Society%20PECHS%2C%20Karachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!5e0!3m2!1sen!2s!4v1708077549800!5m2!1sen!2s"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" crossorigin="anonymous"></iframe>
    </div>

  </div>

</section>

<?php  require_once "./pages/footer.php"; ?>

<script src="./js/slider.js"></script>
<script type="module" src="js/app.js"></script>
<script type="module" src="js/restrictions.js" loading="lazy" defer></script>

</html>