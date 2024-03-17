<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
$pid=intval($_GET['pid']);	
if(isset($_POST['submit']))
{
$pname=$_POST['packagename'];
$ptype=$_POST['packagetype'];	
$plocation=$_POST['packagelocation'];
$pprice=$_POST['packageprice'];	
$pfeatures=$_POST['packagefeatures'];
$pdetails=$_POST['packagedetails'];	
$pimage=$_FILES["packageimage"]["name"];
$sql="update TblTourPackages set PackageName=:pname,PackageType=:ptype,PackageLocation=:plocation,PackagePrice=:pprice,PackageFetures=:pfeatures,PackageDetails=:pdetails where PackageId=:pid";
$query = $dbh->prepare($sql);
$query->bindParam(':pname',$pname,PDO::PARAM_STR);
$query->bindParam(':ptype',$ptype,PDO::PARAM_STR);
$query->bindParam(':plocation',$plocation,PDO::PARAM_STR);
$query->bindParam(':pprice',$pprice,PDO::PARAM_STR);
$query->bindParam(':pfeatures',$pfeatures,PDO::PARAM_STR);
$query->bindParam(':pdetails',$pdetails,PDO::PARAM_STR);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->execute();
$msg="Package Updated Successfully";
}

	?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>MakeATour - Admin</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
                <div class="sidebar-content js-simplebar">
                    <a class="sidebar-brand" href="index.html">
              <span class="align-middle">MakeATour</span>
            </a>

                    <ul class="sidebar-nav">
                        <li class="sidebar-header">
                            Management
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="dashboard.php">
                  <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
                        </li>

                        <li class="sidebar-item ">
                            <a class="sidebar-link" href="create-package.php">
                  <i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Create Package</span>
                </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="manage-packages.php">
                  <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Manage Package</span>
                </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="manage-users.php">
                  <i class="align-middle" data-feather="users"></i> <span class="align-middle">Manage Users</span>
                </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="manage-bookings.php">
                  <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Manage Booking</span>
                </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="manageissues.php">
                  <i class="align-middle" data-feather="slash"></i> <span class="align-middle">Manage Issues</span>
                </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="manage-enquires.php">
                  <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Manage Enquiries</span>
                </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="manage-pages.php">
                  <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Manage Pages</span>
                </a>
                        </li>

                        <li class="sidebar-header">
                            Profile
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="profile.php">
                  <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="change-password.php">
                  <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
                </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="logout.php">
                  <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Logout</span>
                </a>
                        </li>

                    </ul>

                
                </div>
            </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">


                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <span class="text-dark">Admin</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                        data-feather="user"></i>Profile</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                        data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">Update Package</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div >
                                        
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
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="horizontal-form">

                                                <?php 
$pid=intval($_GET['pid']);
$sql = "SELECT * from TblTourPackages where PackageId=:pid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

                                                <form class="form-horizontal" name="package" method="post"
                                                    enctype="multipart/form-data">
                                                    <div class="form-group p-2">
                                                        <label for="focusedinput" class="col-sm-2 form-label">Package
                                                            Name</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="packagename"
                                                                id="packagename" placeholder="Create Package"
                                                                value="<?php echo htmlentities($result->PackageName);?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  p-2">
                                                        <label for="focusedinput" class="col-sm-2 form-label">Package
                                                            Type</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="packagetype"
                                                                id="packagetype"
                                                                placeholder=" Package Type eg- Family Package / Couple Package"
                                                                value="<?php echo htmlentities($result->PackageType);?>"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group  p-2">
                                                        <label for="focusedinput" class="col-sm-2 form-label">Package
                                                            Location</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control"
                                                                name="packagelocation" id="packagelocation"
                                                                placeholder=" Package Location"
                                                                value="<?php echo htmlentities($result->PackageLocation);?>"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group  p-2">
                                                        <label for="focusedinput" class="col-sm-2 form-label">Package
                                                            Price in USD</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="packageprice"
                                                                id="packageprice" placeholder=" Package Price is USD"
                                                                value="<?php echo htmlentities($result->PackagePrice);?>"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group  p-2">
                                                        <label for="focusedinput" class="col-sm-2 form-label">Package
                                                            Features</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control"
                                                                name="packagefeatures" id="packagefeatures"
                                                                placeholder="Package Features Eg-free Pickup-drop facility"
                                                                value="<?php echo htmlentities($result->PackageFetures);?>"
                                                                required>
                                                        </div>
                                                    </div>


                                                    <div class="form-group  p-2">
                                                        <label for="focusedinput" class="col-sm-2 form-label">Package
                                                            Details</label>
                                                        <div class="col-sm-5">
                                                            <textarea class="form-control" rows="5" cols="50"
                                                                name="packagedetails" id="packagedetails"
                                                                placeholder="Package Details"
                                                                required><?php echo htmlentities($result->PackageDetails);?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  p-2">
                                                        <label for="focusedinput" class="col-sm-2 form-label">Package
                                                            Image</label>
                                                        <div class="col-sm-5">
                                                        <?php
    // Split the comma-separated list of image names into an array
    $imageNames = explode(',', $result->PackageImage);

    // Iterate over each image name and display it
    foreach ($imageNames as $imageName) {
        // Construct the image path
        $imagePath = "pacakgeimages/" . htmlentities($imageName);
        ?>
        <img src="<?php echo $imagePath; ?>" width="200" alt="">
    <?php } ?>&nbsp;&nbsp;&nbsp;
                                                                
                                                                
                                                                <a
                                                                href="change-image.php?imgid=<?php echo htmlentities($result->PackageId);?>">Change
                                                                Image</a>
                                                        </div>
                                                    </div>

                                                    <div class="form-group  p-2">
                                                        <label for="focusedinput" class="col-sm-2 form-label">Last
                                                            Updation Date</label>
                                                        <div class="col-sm-5">
                                                            <?php echo htmlentities($result->UpdationDate);?>
                                                        </div>
                                                    </div>
                                                    <?php }} ?>

                                                    <div class="row">
                                                        <div class="col-sm-5 col-sm-offset-2 p-2">
                                                            <button type="submit" name="submit"
                                                                class="btn-primary btn">Update</button>
                                                        </div>
                                                    </div>





                                            </div>

                                            </form>





                                            <div class="panel-footer">

                                            </div>
                                            </form>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a class="text-muted" href="#" target="_blank"><strong>MakeATour</strong></a> &copy;
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#" target="_blank">Support</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#" target="_blank">Help Center</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#" target="_blank">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#" target="_blank">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="js/app.js"></script>



</body>

</html>
<?php } ?>