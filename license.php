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
         <!-- Bootstrap 5 -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel="manifest" href="favicon/site.webmanifest">
          <!-- Link Swiper's CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
      <!-- Boxicons Cdn -->
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <!-- Link Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- Custom CSS -->
      <!-- <link rel="stylesheet" href="css/service.css"> -->
      <link rel="stylesheet" href="css/lets-talk.css">
      <link rel="stylesheet" href="css/license.css">
      <link rel="stylesheet" href="css/colors.css">
      <link rel="stylesheet" href="css/style.css">
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
                <li><a href="index.php#service" class="active">Services</a></li>
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
    <div class="home" >

        <div class="slider">
            <div class="imgs">
              <div class="img" style="left: 0;background:url('./images/petroleum-3.jpg');"> 
                <div class="content">
                    <h2 class="current-img">Consultancy and Licensing Services for Dangerous Chemicals and Petroleum Products in Pakistan</h2>
                    <a href="#abt-license" class="current-img"><button>See more!</button></a>
                </div>
              </div>

              <div class="img" style="background:url('./images/petroluem-2.webp');">
                <div class="content">
                    <h2>Dangerous Petroleum License [DPL]</h2>
                  <a href="#license-service"><button>See more!</button></a>
                </div>
              </div>


              <div class="img">
                <div class="content">
                    <h2>Category</h2>
                  <a href="#dpl"><button>See more!</button></a>
                </div>
              </div>


              <!-- <div class="img">
                <div class="content">
                    <h2>Dummy Text</h2>
                  <a href="service.php"><button>See more!</button></a>
                </div>
              </div> -->
              <!-- <div class="img">
                <div class="content">
                    <h2>Dummy Textt</h2>
                  <a href="service.php"><button>See more!</button></a>
                </div>
              </div> -->

            </div>

            <span class="prev"><i class='bx bx-chevron-left'></i></span>
            <span class="next"><i class='bx bx-chevron-right' ></i></span>
            <!-- Dots -->
            <div class="dots"></div>
          </div>
       
</div>

    <!-- Service Section -->
    <section class="license-sec" id="license">
           <div class="head-container">
                <h2>License Services</h2>
          </div>
    <main class="license-container gap-5">
      <!-- service bx-1 -->
            <div class="service-bx">
            <svg class="serv-ico" xmlns="http://www.w3.org/2000/svg"viewBox="0 -960 960 960"><path d="m234-480-12-60q-12-5-22.5-10.5T178-564l-58 18-40-68 46-40q-2-13-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T222-820l12-60h80l12 60q12 5 22.5 10.5T370-796l58-18 40 68-46 40q2 13 2 26t-2 26l46 40-40 68-58-18q-11 8-21.5 13.5T326-540l-12 60h-80Zm40-120q33 0 56.5-23.5T354-680q0-33-23.5-56.5T274-760q-33 0-56.5 23.5T194-680q0 33 23.5 56.5T274-600ZM592-40l-18-84q-17-6-31.5-14.5T514-158l-80 26-56-96 64-56q-2-18-2-36t2-36l-64-56 56-96 80 26q14-11 28.5-19.5T574-516l18-84h112l18 84q17 6 31.5 14.5T782-482l80-26 56 96-64 56q2 18 2 36t-2 36l64 56-56 96-80-26q-14 11-28.5 19.5T722-124l-18 84H592Zm56-160q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Z"/></svg>
            <h3>Refineries</h3>
              <div class="serv-detail">
                <p>
                  ZNM's first gig was all about diving deep into the nitty-gritty of engineering for the support systems, utility services, and storage setups in a big lubricant refinery project.
                </p>
              </div>
            </div>
    <!-- service bx-2 -->
          <div class="service-bx">
          <svg  class="serv-ico" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960"><path d="M159-120v-120h124L181-574q-27-15-44.5-44T119-680q0-50 35-85t85-35q39 0 69.5 22.5T351-720h128v-40q0-17 11.5-28.5T519-800q9 0 17.5 4t14.5 12l68-64q9-9 21.5-11.5T665-856l156 72q12 6 16.5 17.5T837-744q-6 12-17.5 15.5T797-730l-144-66-94 88v56l94 86 144-66q11-5 23-1t17 15q6 12 1 23t-17 17l-156 74q-12 6-24.5 3.5T619-512l-68-64q-6 6-14.5 11t-17.5 5q-17 0-28.5-11.5T479-600v-40H351q-3 8-6.5 15t-9.5 15l200 370h144v120H159Zm80-520q17 0 28.5-11.5T279-680q0-17-11.5-28.5T239-720q-17 0-28.5 11.5T199-680q0 17 11.5 28.5T239-640Zm126 400h78L271-560h-4l98 320Zm78 0Z"/></svg>
          <h3>Power</h3>
            <div class="serv-detail">
        <p>
          
Exploring diverse engineering solutions and conducting feasibility studies for thermal power plants under ZNM's management, incorporating insights from various fields.
        </p>
            </div>
  
          </div>
    <!-- service bx-3 -->
        <div class="service-bx">
        <svg class="serv-ico" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" ><path d="M160-120q-17 0-28.5-11.5T120-160q0-17 11.5-28.5T160-200h40v-240h-40q-17 0-28.5-11.5T120-480q0-17 11.5-28.5T160-520h40v-240h-40q-17 0-28.5-11.5T120-800q0-17 11.5-28.5T160-840h640q17 0 28.5 11.5T840-800q0 17-11.5 28.5T800-760h-40v240h40q17 0 28.5 11.5T840-480q0 17-11.5 28.5T800-440h-40v240h40q17 0 28.5 11.5T840-160q0 17-11.5 28.5T800-120H160Zm120-80h400v-240q-17 0-28.5-11.5T640-480q0-17 11.5-28.5T680-520v-240H280v240q17 0 28.5 11.5T320-480q0 17-11.5 28.5T280-440v240Zm200-120q50 0 85-34.5t35-83.5q0-39-22.5-67T480-620q-75 86-97.5 114.5T360-438q0 49 35 83.5t85 34.5ZM280-200v-560 560Z"/></svg>         
          <h3>Storage Terminal</h3>
            <div class="serv-detail">
          <p> 
ZNM is a leading private consulting company that specializes in providing services like project planning, detailed engineering, and project management for various projects.</p> 
            </div>
        </div>
    <!-- service bx-4 -->
          <div class="service-bx">
          <svg class="serv-ico" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" ><path d="M756-120 537-339l84-84 219 219-84 84Zm-552 0-84-84 276-276-68-68-28 28-51-51v82l-28 28-121-121 28-28h82l-50-50 142-142q20-20 43-29t47-9q24 0 47 9t43 29l-92 92 50 50-28 28 68 68 90-90q-4-11-6.5-23t-2.5-24q0-59 40.5-99.5T701-841q15 0 28.5 3t27.5 9l-99 99 72 72 99-99q7 14 9.5 27.5T841-701q0 59-40.5 99.5T701-561q-12 0-24-2t-23-7L204-120Z"/></svg>          
            <h3>Gas Processing</h3>
            <div class="serv-detail">
          <p>ZNM has extensive experience in design of GPPs including Sweetening, Dehydration, Hydrocarbon Due Point.</p> 
            </div>
  
          </div>

    <!-- service bx-5 -->
    <div class="service-bx">
    <svg class="serv-ico" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" ><path d="M160-120q-17 0-28.5-11.5T120-160q0-17 11.5-28.5T160-200h40v-240h-40q-17 0-28.5-11.5T120-480q0-17 11.5-28.5T160-520h40v-240h-40q-17 0-28.5-11.5T120-800q0-17 11.5-28.5T160-840h640q17 0 28.5 11.5T840-800q0 17-11.5 28.5T800-760h-40v240h40q17 0 28.5 11.5T840-480q0 17-11.5 28.5T800-440h-40v240h40q17 0 28.5 11.5T840-160q0 17-11.5 28.5T800-120H160Zm120-80h400v-240q-17 0-28.5-11.5T640-480q0-17 11.5-28.5T680-520v-240H280v240q17 0 28.5 11.5T320-480q0 17-11.5 28.5T280-440v240Zm200-120q50 0 85-34.5t35-83.5q0-39-22.5-67T480-620q-75 86-97.5 114.5T360-438q0 49 35 83.5t85 34.5ZM280-200v-560 560Z"/></svg>         
          <h3>Renewable Energy</h3>
      <div class="serv-detail">
        <p>
        Design Structural and Electrical aspects of Solar Power Projects & Civil & Structural Works and Feasibilities for Wind Farms. 
        </p>
      </div>
      
    </div>
    <!-- service bx-6 -->
    <div class="service-bx">
    <svg class="serv-ico" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M440-640v-120H280v-80h400v80H520v120h-80ZM160-120v-320h80v40h120v-120h-40v-80h320v80h-40v120h120v-40h80v320h-80v-40H240v40h-80Zm80-120h480v-80H520v-200h-80v200H240v80Zm240 0Z"/></svg>    
       <h3>Pipelines</h3>
      <div class="serv-detail">
        <p>
        ZNM has been involved in Feasibility, FEED & Detailed Engineering, and Project Management of numerous pipeline projects.
        </p>
      </div>
     
    </div>
  </main>
  </section>
  <!-- Service End -->

  <section class="abt-service" id='abt-license'>
  <div class="container-fluid ">
        
        <div class="content">
          <div class="info-img img2"></div>
          <div class="info-text txt2">
            
                <h3>About Explosive License</h3>
                <p><strong>ZNM</strong> is the pioneer private sector organization in providing Engineering & Project Management Consultancy (PMC) services in Pakistan for Oil & Gas, Process Industries, Refineries, Petroleum Storage Terminals, and Oil/Gas/Water Pipelines.</p>
                
                <p><strong>ZNM</strong> has continually expanded its horizons, extending Multi-Disciplinary Engineering & Project Management Services to a diverse range of sectors & industries such as Chemical Plants, Lubricant Blending Plants, Wax Refining Plants, Power Plants (Thermal as well as Renewable), Food, and Allied (Edible Oil Extraction and Refining, Ethanol Distilleries and Sugar Mills), LPG Storage and Bottling and Warehousing projects.</p>
                                
              </div>
  
        </div>
  
          <div class="content" id='license-service'>
            <div class="info-text txt1">
              
            <h3>License Services</h3>
            <p>At M/s. Excellent Services, we provide consultancy services for the storage of Dangerous Chemicals, Petroleum Products, and Chemicals. We understand that obtaining a license for the storage of these materials can be a complicated and lengthy process. Therefore, we assist our clients in obtaining all the necessary NOCs from different departments like D.C.O, T.M.O, Civil Defence, Anti-Narcotic Force, Environment and Protection Agency, DIG, etc., as well as proposing a plan for the storage of chemicals.</p>
            <p>We also assist in obtaining the required forms for various types of licenses:</p>
            </div>
            <div class="info-img img1"></div>
  
          </div>

          <div class="content">
            <table class="table table-bordered align-middle" id='forms-list'>
              <thead>
                <tr class="text-center align-middle ">
                  <th scope="col">Form of License</th>
                  <th scope="col">Purpose of Grant</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>
                  <th scope="row">Form “K”</th>
                  <td>For Petrol Pumps for Storage of Petrol, Diesel & Lube Oil</td>
                </tr>
                <tr>
                  <th scope="row">Form “L”</th>
                  <td>For Individuals and Oil Companies for Storage of Petroleum Products and Chemicals in bulk storage above-ground or in underground tanks.</td>
                </tr>
                <tr>
                  <th scope="row">Form “M”</th>
                  <td>For Individuals and Oil Companies for Storage of Petroleum Products and Chemicals in non-bulk storage in storage godowns.</td>
                </tr>
                <tr>
                  <th scope="row">Form “B-1”</th>
                  <td>For CNG Stations</td>
                </tr>
                <tr>
                  <th scope="row">Form “N”</th>
                  <td>For LPG Stations</td>
                </tr>
                <tr>
                  <th scope="row">Form “O”</th>
                  <td>For LPG to fill Cylinders</td>
                </tr>
                <tr>
                  <th scope="row">Form “Q”</th>
                  <td>For Transportation of Petroleum Products by land/road</td>
                </tr>
                <tr>
                  <th scope="row">Form “C”</th>
                  <td>For Import and Storage of Carbide of Calcium</td>
                </tr>
                <tr>
                  <th scope="row">Form “Spl”</th>
                  <td>For storage and sale of petroleum products by ship/barge.</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="content" id='dpl'>
            <div class="info-img img3"></div>
            <div class="info-text txt3">
              
              <h3>Dangerous Petroleum License [DPL]</h3>
              <ol class='dpl-license'>
              <li>ACETONE</li>
              <li>AERYONITHRIL</li>
              <li>ALUMINIUM POWDER</li>
              <li>AMMONIUM NITRATE</li>
              <li>ANTIMONY SULPHIDE</li>
              <li>ARSENIC SULPHIDES</li>
              <li>BENZENE</li>
              <li>BENZOL</li>
              <li>BUTANE (N.Butyl)</li>
              <li>BENZENE NAPTIIAL</li>
              <li>CHARCOAL</li>
              <li>COTTON WOOL</li>
              <li>CALCIUM CARBIDE</li>
              <li>COAL TAR NAPHTHA</li>
              <li>DIACETONE ALCOHOL</li>
              <li>DECAHYDRO NAPHTHALAMIN</li>
              <li>ETHYL ALCOHOL</li>
              <li>GLYCERINE</li>
              <li>ISO-OCTANE</li>
              <li>METHYL ALCOHOL</li>
              <li>METHANOL</li>
              <li>METHYL METHACRYLATE MONOMER</li>
              <li>MERCURY</li>
              <li>NITRIC ACID</li>
              <li>POTASSIUM NITRATE</li>
              <li>POTASSIUM CHLORIDE</li>
              <li>PRINTING INK</li>
              <li>PHOSPHOROUS</li>
              <li>PETROLEUM ETHER</li>
              <li>PATROLLING</li>
              <li>PETROL SPIRIT</li>
              <li>CITRIC ACID</li>
              <li>CTLFIF SPIRIT</li>
              <li>SOLVENT NAPHTHA LIGHT</li>
              <li>SOLVENT NAPHTHA HEAVY</li>
              <li>SODIUM NITRATE</li>
              <li>SULPHUR</li>
              <li>SULPHURIC ACID</li>
              <li>TOLUOL</li>
              <li>THINNER</li>
              <li>TOLUENE</li>
              <li>VINYL ACETATE</li>
              <li>WOOD NAPHTHA</li>
              <li>WHITE SPIRIT</li>
              <li>XYLENE META</li>
              <li>XYLOLS</li>
              <li>METHYL ETHYL KETONE (BUTANONE)</li>
              <li>ISOPROPYL ALCOHOL (IPA)</li>
            </ol>
            </div>
  
          </div>
  
          </div>
  </section>
    
  <?php include "./pages/clients.php"; ?>
  <?php require_once "./pages/lets-talk.php"; ?>
  <?php require_once "./pages/footer.php"; ?>

  <script src="./js/slider.js"></script>
  <script type="module" src="./js/service.js"></script>  
  </html>