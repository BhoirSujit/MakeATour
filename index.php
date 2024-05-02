<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Make A Tour</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  

</head>

<body>

<?php include('includes/header.php');?>
<script>
  let activenav = document.querySelector("#navhome");
  activenav.classList.add("active")
</script>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative " data-aos="zoom-in" data-aos-delay="100">
      <h1>Make A Tour,<br>Lets Explore The World</h1>
      <h2>We are team of talented planner to make your tour confortable</h2>
      <a href="tours.php" class="btn-get-started">Lets Explore</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">
<!-- Button trigger modal -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Welcome to MakeATour, your ultimate destination for effortless travel planning and unforgettable experiences.</h3>
            <p class="fst-italic">
            At MakeATour, we understand that every journey is unique, and that's why we're dedicated to empowering travelers like you to create personalized adventures tailored to your interests and preferences.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> MakeATour empowers travelers to create personalized trips tailored to their interests and preferences.</li>
              <li><i class="bi bi-check-circle"></i> Explore a diverse range of destinations, from popular tourist spots to hidden gems, all in one platform.</li>
              <li><i class="bi bi-check-circle"></i> Our mission is to inspire and facilitate meaningful journeys that create lasting memories and enrich lives.</li>
            </ul>
            

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="7588" data-purecounter-duration="1" class="purecounter"></span>
            <p>Enquiries</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="3865" data-purecounter-duration="1" class="purecounter"></span>
            <p>Register Users</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="32884" data-purecounter-duration="1" class="purecounter"></span>
            <p>Booking</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Packages</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose Us?</h3>
              <p>
              When it comes to planning your next adventure, MakeATour stands out as the premier choice. Our platform offers a level of personalization and flexibility unmatched in the industry, allowing you to tailor every aspect of your trip to your unique preferences and interests. With an extensive selection of destinations and activities at your fingertips, you'll have the freedom to explore new horizons and create unforgettable memories.
              </p>
              <div class="text-center">
                <a href="about.php" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Tailored Travel Experience</h4>
                    <p>MakeATour offers a personalized approach to travel planning, allowing you to create customized itineraries that suit your unique preferences and interests.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Extensive Destination Selection</h4>
                    <p>With access to a wide range of destinations and activities, MakeATour ensures that you can explore diverse options and discover new adventures that resonate with you.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Ease and Convenience</h4>
                    <p>Our user-friendly platform simplifies the travel planning process, providing intuitive tools and expert guidance to help you design your dream vacation hassle-free.</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

  

    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Packages</h2>
          <p>Popular Packages</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">


        					
<?php $sql = "SELECT * from tbltourpackages order by rand() limit 3";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
			



          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0 p-2">
            <div class="course-item">
            <div style="height:250px; overflow:hidden; display: flex; position: relative;" class="">
                
                <?php
                      // Get the first image name
                      $imageNames = explode(',', $result->PackageImage);
                      $firstImageName = reset($imageNames);
                      $imagePath = "admin/pacakgeimages/" . htmlentities($firstImageName);
                      ?>
                  <img style="object-fit: cover; width: 100%;"
                    src="<?php echo $imagePath; ?>" class="img-fluid"
                    alt="...">
                    <div style="position: absolute;
                  bottom: 10px;
                  right: 10px;
                  background-color: rgba(255, 255, 255, 0.8);
                  padding: 5px 10px;
                  border-radius: 5px;
                  font-size: 14px;
                  font-weight: bold;">
                    <?php echo htmlentities($result->days);?> Days
                </div>
                    
  
                </div>
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>
                    <?php echo htmlentities($result->PackageType);?>
                  </h4>
                  <p class="price">₹
                    <?php echo htmlentities($result->PackagePrice);?>
                  </p>
                </div>

                <h3><a href="tour-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>">
                    <?php echo htmlentities($result->PackageName);?>
                  </a></h3>
                <p style="
                  display: -webkit-box;
                  -webkit-line-clamp: 2; /* Number of lines to show */
                  -webkit-box-orient: vertical;
                  overflow: hidden;
                ">
                  <?php echo htmlentities($result->PackageLocation);?> :
                  <?php echo htmlentities($result->PackageFetures);?>
                </p>
                <a href="tour-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="view">Details</a>

              </div>
            </div>
          </div> <!-- End Course Item-->

<?php }} ?>
			
		
<div><a href="tours.php" class="view">View More Packages</a></div>


        </div>

      </div>
    </section><!-- End Popular Courses Section -->



  </main><!-- End #main -->

  <?php include('includes/footer.php');?>



  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    const info = document.querySelector(".exp");
    document.addEventListener("scroll", function() {
        let value = window.scrollY;
        info.style.marginLeft = value * 3.0 + "px";
    })
  </script>



</body>

</html>