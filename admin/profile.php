<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$adminid=$_SESSION['alogin'];
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];

$sql="update admin set Name=:name,EmailId=:email,MobileNumber=:mobile where UserName=:adminid";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':adminid',$adminid,PDO::PARAM_STR);
$query->execute();

echo "<script>alert('Profile has been updated.');</script>";
echo "<script> window.location.href = profile.php;</script>";

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

                    <li class="sidebar-item active">
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

                    <h1 class="h3 mb-3">Change Password</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="grid-form1">



                                        <div class="panel-body">
                                            <form name="chngpwd" method="post" class="form-horizontal"
                                                onSubmit="return valid();">
                                                <?php 
                                    $adminid=$_SESSION['alogin'];
                                    $sql ="SELECT * from admin where UserName=:adminid";
                                    $query= $dbh -> prepare($sql);
                                    $query->bindParam(':adminid',$adminid, PDO::PARAM_STR);
                                    $query-> execute();
                                    $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    { ?>

                                                <div class="form-group p-2">
                                                    <label class="col-md-2 form-label">User Name</label>
                                                    <div class="col-md-5">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-key"></i>
                                                            </span>
                                                            <input class="form-control" type="text" name="name"
                                                                id="name" value="<?php echo $result->UserName;?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group p-2">
                                                    <label class="col-md-2 form-label">Name</label>
                                                    <div class="col-md-5">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-key"></i>
                                                            </span>
                                                            <input class="form-control" type="text" name="name"
                                                                id="name" value="<?php echo $result->Name;?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group p-2">
                                                    <label class="col-md-2 form-label">Email</label>
                                                    <div class="col-md-5">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-key"></i>
                                                            </span>
                                                            <input class="form-control" type="text" name="email"
                                                                id="email" value="<?php echo $result->EmailId;?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group p-2">
                                                    <label class="col-md-2 form-label">Mobile No</label>
                                                    <div class="col-md-5">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-key"></i>
                                                            </span>
                                                            <input class="form-control" type="text" name="mobile"
                                                                id="mobile" value="<?php echo $result->MobileNumber;?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php }} ?>
                                                <div class="col-sm-8 col-sm-offset-2 p-2">
                                                    <button type="submit" name="submit"
                                                        class="btn-primary btn">Submit</button>
                                                    <button type="reset" class="btn-secondary btn">Reset</button>
                                                </div>
                                        </div>

                                        </form>
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