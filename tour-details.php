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

  <!-- =======================================================
  * Template Name: Mentor
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <?php include('includes/header.php');?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Package Details</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
          quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
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
            <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-fluid w-100" alt="">
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
              <p>₹<?php echo htmlentities($result->PackagePrice);?></p>
            </div>

            <form name="book" method="post">
              <div class="course-info d-flex justify-content-between align-items-center">
                <h5>From</h5>
                <p> <input class="form-control date" id="datepicker" type="text" placeholder="dd-mm-yyyy"
                    name="fromdate" required=""> </p>
              </div>
              <div class="course-info d-flex justify-content-between align-items-center">
                <h5>To</h5>
                <p> <input class="form-control date" id="datepicker1" type="text" placeholder="dd-mm-yyyy" name="todate"
                    required=""> </p>
              </div>

              <div class="course-info justify-content-between align-items-center">
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Comment" required></textarea>
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
    <section id="cource-details-tabs" class="cource-details-tabs">



      <div class="container" data-aos="fade-up">

   
       
        <div data-aos="fade-up">
          <iframe style="border:0; width: 100%; height: 350px;"
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
            frameborder="0" allowfullscreen></iframe>
        </div>
        


      </div>






    </section><!-- End Cource Details Tabs Section -->



    

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