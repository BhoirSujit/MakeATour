<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_REQUEST['bkid']))
	{
		$bid=intval($_GET['bkid']);
$email=$_SESSION['login'];
	$sql ="SELECT FromDate FROM tblbooking WHERE UserEmail=:email and BookingId=:bid";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':bid', $bid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{
	 $fdate=$result->FromDate;

	$a=explode("/",$fdate);
	$val=array_reverse($a);
	 $mydate =implode("/",$val);
	$cdate=date('Y/m/d');
	$date1=date_create("$cdate");
	$date2=date_create("$fdate");
 $diff=date_diff($date1,$date2);
echo $df=$diff->format("%a");
if($df>1)
{
$status=2;
$cancelby='u';
$sql = "UPDATE tblbooking SET status=:status,CancelledBy=:cancelby WHERE UserEmail=:email and BookingId=:bid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> bindParam(':cancelby',$cancelby , PDO::PARAM_STR);
$query-> bindParam(':email',$email, PDO::PARAM_STR);
$query-> bindParam(':bid',$bid, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Cancelled successfully";
}
else
{
$error="You can't cancel booking before 24 hours";
}
}
}
}

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
        <h2>Tour History</h2>
        <p>It outlines how you collect, use, and protect user data, ensuring transparency, compliance with privacy laws,
          and user trust.</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <div class="container p-5">



      <form name="chngpwd" method="post" onSubmit="return valid();">
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
        <p>
        <table border="1" width="100%" class="table">
          <tr align="center">
            <th>#</th>
            <th>Booking Id</th>
            <th>Package Name</th>
            <th>From</th>
            <th>To</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Booking Date</th>
            <th>Action</th>
          </tr>
          <?php 

$uemail=$_SESSION['login'];;
$sql = "SELECT tblbooking.BookingId as bookid,tblbooking.PackageId as pkgid,tbltourpackages.PackageName as packagename,tblbooking.FromDate as fromdate,tblbooking.ToDate as todate,tblbooking.Comment as comment,tblbooking.status as status,tblbooking.RegDate as regdate,tblbooking.CancelledBy as cancelby,tblbooking.UpdationDate as upddate from tblbooking join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId where UserEmail=:uemail";
$query = $dbh->prepare($sql);
$query -> bindParam(':uemail', $uemail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
          <tr align="center">
            <td>
              <?php echo htmlentities($cnt);?>
            </td>
            <td>#BK
              <?php echo htmlentities($result->bookid);?>
            </td>
            <td><a href="tour-details.php?pkgid=<?php echo htmlentities($result->pkgid);?>">
                <?php echo htmlentities($result->packagename);?>
              </a></td>
            <td>
              <?php echo htmlentities($result->fromdate);?>
            </td>
            <td>
              <?php echo htmlentities($result->todate);?>
            </td>
            <td>
              <?php echo htmlentities($result->comment);?>
            </td>
            <td>
              <?php if($result->status==0)
{
echo "Pending";
}
if($result->status==1)
{
echo "Confirmed";
}
if($result->status==2 and  $result->cancelby=='u')
{
echo "Canceled by you at " .$result->upddate;
} 
if($result->status==2 and $result->cancelby=='a')
{
echo "Canceled by admin at " .$result->upddate;

}
?>
            </td>
            <td>
              <?php echo htmlentities($result->regdate);?>
            </td>
            <?php if($result->status==2)
{
	?>
            <td>Cancelled</td>
            <?php } else {?>
            <td><a href="tour-history.php?bkid=<?php echo htmlentities($result->bookid);?>"
                onclick="return confirm('Do you really want to cancel booking')">Cancel</a> /
                <a href="javascript:void(0);" onclick='printReceipt("<?php echo htmlentities($result->bookid);?>")'>Print</a>
              </td>
            <?php }?>
          </tr>
          <?php $cnt=$cnt+1; }} ?>
        </table>

        </p>
      </form>
      <script>
        function printReceipt(bookingId) {
            window.open('receipt.php?bkid=' + bookingId, '_blank');
        }
        </script>

    </div>
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
<?php } ?>