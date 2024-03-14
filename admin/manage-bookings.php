<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	// code for cancel
if(isset($_REQUEST['bkid']))
	{
$bid=intval($_GET['bkid']);
$status=2;
$cancelby='a';
$sql = "UPDATE tblbooking SET status=:status,CancelledBy=:cancelby WHERE  BookingId=:bid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> bindParam(':cancelby',$cancelby , PDO::PARAM_STR);
$query-> bindParam(':bid',$bid, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Cancelled successfully";
}


if(isset($_REQUEST['bckid']))
	{
$bcid=intval($_GET['bckid']);
$status=1;
$cancelby='a';
$sql = "UPDATE tblbooking SET status=:status WHERE BookingId=:bcid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':bcid',$bcid, PDO::PARAM_STR);
$query -> execute();
$msg="Booking Confirm successfully";
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
        <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

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

                        <li class="sidebar-item active">
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
                                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                  </a>

                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <span class="text-dark">Admin</span>
                  </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="user"></i>Profile</a>
                                    <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="settings"></i> Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="content">
                    <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">Manage Booking</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <div class="card-body">
                    <div class="table-responsive">
                        
                          <table id="table" class="table table-bordered">
                          <thead>
                            <tr>
                            <th>Booikn id</th>
                              <th>Name</th>
                              <th>Mobile No.</th>
                              <th>Email Id</th>
                              <th>RegDate </th>
                              <th>From /To </th>
                              <th>Comment </th>
                              <th>Status </th>
                              <th>Action </th>
                            </tr>
                          </thead>
                          <tbody>
  <?php $sql = "SELECT tblbooking.BookingId as bookid,tblusers.FullName as fname,tblusers.MobileNumber as mnumber,tblusers.EmailId as email,tbltourpackages.PackageName as pckname,tblbooking.PackageId as pid,tblbooking.FromDate as fdate,tblbooking.ToDate as tdate,tblbooking.Comment as comment,tblbooking.status as status,tblbooking.CancelledBy as cancelby,tblbooking.UpdationDate as upddate from  tblbooking
   left join tblusers  on  tblbooking.UserEmail=tblusers.EmailId
   left join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId";
  $query = $dbh -> prepare($sql);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query->rowCount() > 0)
  {
  foreach($results as $result)
  {				?>		
                            <tr>
                              <td>#BK-<?php echo htmlentities($result->bookid);?></td>
                              <td><?php echo htmlentities($result->fname);?></td>
                              <td><?php echo htmlentities($result->mnumber);?></td>
                              <td><?php echo htmlentities($result->email);?></td>
                              <td><a href="update-package.php?pid=<?php echo htmlentities($result->pid);?>"><?php echo htmlentities($result->pckname);?></a></td>
                              <td><?php echo htmlentities($result->fdate);?> To <?php echo htmlentities($result->tdate);?></td>
                                  <td><?php echo htmlentities($result->comment);?></td>
                                  <td><?php if($result->status==0)
  {
  echo "Pending";
  }
  if($result->status==1)
  {
  echo "Confirmed";
  }
  if($result->status==2 and  $result->cancelby=='a')
  {
  echo "Canceled by you at " .$result->upddate;
  } 
  if($result->status==2 and $result->cancelby=='u')
  {
  echo "Canceled by User at " .$result->upddate;
  
  }
  ?></td>
  
  <?php if($result->status==2)
  {
      ?><td>Cancelled</td>
  <?php } elseif($result->status==1)
  {
      ?><td>Confirmed</td>
  <?php }
  
  
  else {?>
  <td><a href="manage-bookings.php?bkid=<?php echo htmlentities($result->bookid);?>" onclick="return confirm('Do you really want to cancel booking')" >Cancel</a> / <a href="manage-bookings.php?bckid=<?php echo htmlentities($result->bookid);?>" onclick="return confirm('booking has been confirm')" >Confirm</a></td>
  <?php }?>
  
                            </tr>
                           <?php $cnt=$cnt+1;} }?>
                          </tbody>
                        </table>
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