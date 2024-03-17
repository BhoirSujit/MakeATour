<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2']))
{
$pid=intval($_GET['pkgid']);
$useremail=$_SESSION['login'];
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
$comment=$_POST['comment'];
$status=0;
$sql="INSERT INTO tblbooking(PackageId,UserEmail,FromDate,ToDate,Comment,status) VALUES(:pid,:useremail,:fromdate,:todate,:comment,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':comment',$comment,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Booked Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Course Details - Mentor Bootstrap Template</title>
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


  <style>
    .carousel {
      position: relative;


      margin: auto;
      overflow: hidden;
    }

    .carousel img {
      width: 100%;
      height: 60vh;
      display: none;
    }

    .carousel img.active {
      display: block;
    }

    .thumbnails {
      text-align: center;
      margin-top: 10px;
    }

    .thumbnails img {
      width: 100px;
      cursor: pointer;
      margin: 0 5px;
    }
  </style>

  <style>
    .map-eg iframe {
      border: 0;
      width: 100%;
      height: 350px;
    }
  </style>




</head>

<body>

  <?php include('includes/header.php');?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Package Details</h2>
        <p>Explore our diverse tour packages, each meticulously crafted to offer unforgettable experiences with seamless pick-up and drop-off services included.</p>
      </div>
    </div><!-- End Breadcrumbs -->


    <?php if($error){?>
    <div class="errorWrap"><strong>ERROR</strong>:
      <?php echo htmlentities($error); ?>
    </div>
    <?php } 
				else if($msg){?>
    <div class="succWrap"><strong>SUCCESS</strong>:
      <?php echo htmlentities($msg); ?>
    </div>
    <?php }?>
    <?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT * from tbltourpackages where PackageId=:pid";
$query = $dbh->prepare($sql);
$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>


    <?php }} ?>
    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">



        <div class="row">
          <div class="col-lg-8">
            <div class="carousel">
              <?php
              $imageNames = explode(',', $result->PackageImage);
              foreach ($imageNames as $index => $imageName) {
                  $imagePath = "admin/pacakgeimages/" . htmlentities($imageName);
                  // Output HTML for carousel images
                  echo '<img src="' . $imagePath . '" class="' . ($index === 0 ? 'active' : '') . '">';
              }
              ?>
            </div>

            <div class="thumbnails">
              <?php
              foreach ($imageNames as $index => $imageName) {
                  $imagePath = "admin/pacakgeimages/" . htmlentities($imageName);
                  // Output HTML for thumbnail images
                  echo '<img src="' . $imagePath . '" onclick="showImage(' . $index . ')" class="' . ($index === 0 ? 'active' : '') . '">';
              }
              ?>
            </div>

            <script>
              let currentImageIndex = 0;
              const images = document.querySelectorAll('.carousel img');
              const thumbnails = document.querySelectorAll('.thumbnails img');

              function showImage(index) {
                images[currentImageIndex].classList.remove('active');
                thumbnails[currentImageIndex].classList.remove('active');
                currentImageIndex = index;
                images[currentImageIndex].classList.add('active');
                thumbnails[currentImageIndex].classList.add('active');
              }
            </script>

            </script>
            <!-- <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-fluid w-100" alt=""> -->
            <h3>
              <?php echo htmlentities($result->PackageName);?>
            </h3>
            <p>

            <p class="dow"></p>
            <p><b>Features</b>
              <?php echo htmlentities($result->PackageFetures);?>
            </p>

            <?php echo htmlentities($result->PackageDetails);?>
            </p>
          </div>
          <div class="col-lg-4">
            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>ID</h5>
              <p>#PKG-
                <?php echo htmlentities($result->PackageId);?>
              </p>
            </div>
            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Package Type :</h5>
              <p><a href="#">
                  <?php echo htmlentities($result->PackageType);?>
                </a></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Package Location :</h5>
              <p>
                <?php echo htmlentities($result->PackageLocation);?>
              </p>
            </div>



            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Prize</h5>
              <p>₹
                <?php echo htmlentities($result->PackagePrice);?>
              </p>
            </div>

            <form name="book" method="post">
              <div class="course-info d-flex justify-content-between align-items-center">
                <h5>Check In</h5>
                <p> <input class="form-control date datepicker " id="datepicker" type="date" placeholder="dd-mm-yyyy"
                    name="fromdate" required=""> </p>
              </div>
              <div class="course-info d-flex justify-content-between align-items-center">
                <h5>Check Out</h5>
                <p> <input class="form-control date datepicker" id="datepicker1" type="date" placeholder="dd-mm-yyyy"
                    name="todate" required=""> </p>
              </div>

              <div class="course-info justify-content-between align-items-center">
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Query" required></textarea>
                </div>
              </div>

              <div class=" d-grid gap-2 align-items-center">
                <?php if($_SESSION['login'])
              {?>


                <button type="submit" name="submit2" class="btn-success btn">Book</button>

                <?php } else {?>

                <a href="#" data-toggle="modal" data-target="#myModal4" class="btn btn-success"> Book</a>

                <?php } ?>
              </div>




            </form>
          </div>


        </div>
      </div>

      </div>
    </section><!-- End Cource Details Section -->


    


    <!-- ======= Cource Details Tabs Section ======= -->
    <section id="cource-details-tabs" class="cource-details-tabs p-2">



      <div class="container" data-aos="fade-up">



        <div class="map-eg" data-aos="fade-up">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d945.1180045802346!2d72.87024726962471!3d18.642802998904667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be87a414264a995%3A0x152f9b80c5aa77a1!2sJ.S.M%20Law%20Collage!5e0!3m2!1sen!2sus!4v1710526941676!5m2!1sen!2sus"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>



      </div>






    </section><!-- End Cource Details Tabs Section -->

    

<!-- ======= Popular Courses Section ======= -->
<section id="popular-courses" class="courses">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Recommended Packages</h2>
     
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
        <div style="height:250px; overflow:hidden; display: flex;" class="">
          <?php
                // Get the first image name
                $imageNames = explode(',', $result->PackageImage);
                $firstImageName = reset($imageNames);
                $imagePath = "admin/pacakgeimages/" . htmlentities($firstImageName);
                ?>
            <img style="object-fit: cover; width: 100%;"
              src="<?php echo $imagePath; ?>" class="img-fluid"
              alt="...">

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

  <!-- signup -->
  <?php include('includes/signup.php');?>
  <!-- //signu -->
  <!-- signin -->
  <?php include('includes/signin.php');?>
  <!-- //signin -->
  <!-- write us -->
  <?php include('includes/write-us.php');?>

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