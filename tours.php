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

  <title>Courses - Mentor Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  
</head>

<body>

  <?php include('includes/header.php');?>
  <script>
  let activenav = document.querySelector("#navtour");
  activenav.classList.add("active")
</script>

  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Tour Packages</h2>
        <p>Tour Packages offers you pre-packaged travel experiences tailored to their interests and preferences,
          simplifying trip planning and offering value-added options for an unforgettable vacation.</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
    
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-end">
        <form class="form-inline col-lg-4" method="GET" action="tours.php">
          <div class="input-group">
              <input class="form-control" type="text" name="query" placeholder="Search..." aria-label="Search">
              
              <div >
                  <button class="btn btn-outline-success ms-2" type="submit">
                      <i class="fas fa-search"></i>
                  </button>
              </div>
          </div>
      </form>
        </div>
        <div class="row" data-aos="zoom-in" data-aos-delay="100">

        


          <?php 

if(isset($_GET['query'])) {
    $search_query = $_GET['query'];
    $sql = "SELECT * FROM tbltourpackages WHERE PackageName LIKE :query OR PackageLocation LIKE :query";
    $query = $dbh->prepare($sql);
    $query->execute(array(':query' => '%' . $search_query . '%'));
} else {
    $sql = "SELECT * FROM tbltourpackages";
    $query = $dbh->prepare($sql);
    $query->execute();
}

$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
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


















        </div>

      </div>
    </section><!-- End Courses Section -->

    

  </main><!-- End #main -->

  <?php include('includes/footer.php');?>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>