<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if($_POST['submit']=="Update")
{
	$pagetype=$_GET['type'];
	$pagedetails=$_POST['pgedetails'];
$sql = "UPDATE tblpages SET detail=:pagedetails WHERE type=:pagetype";
$query = $dbh->prepare($sql);
$query -> bindParam(':pagetype',$pagetype, PDO::PARAM_STR);
$query-> bindParam(':pagedetails',$pagedetails, PDO::PARAM_STR);
$query -> execute();
$msg="Page data updated  successfully";

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
        <script type="text/JavaScript">
            <!--
            function MM_findObj(n, d) { //v4.01
              var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
                d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
              if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
              for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
              if(!x && d.getElementById) x=d.getElementById(n); return x;
            }
            
            function MM_validateForm() { //v4.0
              var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
              for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
                if (val) { nm=val.name; if ((val=val.value)!="") {
                  if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
                    if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
                  } else if (test!='R') { num = parseFloat(val);
                    if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
                    if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
                      min=test.substring(8,p); max=test.substring(p+1);
                      if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
                } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
              } if (errors) alert('The following error(s) occurred:\n'+errors);
              document.MM_returnValue = (errors == '');
            }
            
            function MM_jumpMenu(targ,selObj,restore){ //v3.0
              eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
              if (restore) selObj.selectedIndex=0;
            }
            //-->
            </script>
            <script type="text/javascript" src="nicEdit.js"></script>
            <script type="text/javascript">
                bkLib.onDomLoaded(function () { nicEditors.allTextAreas() });
            </script>
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
                        <li class="sidebar-item active">
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

                    <h1 class="h3 mb-3">Update Page Data error fix it
                        
                    </h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="grid-form">

                        <!---->
                        <div class="grid-form1">
                            <h3>Update Page Data</h3>
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
                                    <form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="focusedinput" class="col-sm-2 form-label">Select page</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="menu1" onChange="MM_jumpMenu('parent',this,0)">
                                                    <option value="" selected="selected" class="form-control">***Select One***
                                                    </option>
                                                    <option value="manage-pages.php?type=terms">terms and condition</option>
                                                    <option value="manage-pages.php?type=privacy">privacy and policy</option>
                                                    <!-- <option value="manage-pages.php?type=aboutus">aboutus</option> -->
                                                    <option value="manage-pages.php?type=contact">Contact us</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="focusedinput" class="col-sm-2 control-label">Selected Page</label>
                                            <div class="col-sm-8">
                                                <?php
                    
                    switch($_GET['type'])
                    {
                        case "terms" :
                                            echo "Terms and Conditions";
                                            break;
                        
                        case "privacy" :
                                            echo "Privacy And Policy";
                                            break;
                        
                        case "aboutus" :
                                            echo "About US";
                                            break;
                        case "software" :
                                            echo "Offers";
                                            break;	
                        case "aspnet" :
                                            echo "Vission And MISSION";
                                            break;		
                        case "objectives" :
                                            echo "Objectives";
                                            break;						
                        case "disclaimer" :
                                            echo "Disclaimer";
                                            break;
                        case "vbnet" :
                                            echo "Partner With Us";
                                            break;
                        case "candc" :
                                            echo "Super Brand";
                                            break;
                        case "contact" :
                                            echo "Contact Us";
                                            break;
                        
                        
                                    
                                                    
                        default :
                                        echo "";
                                        break;
                    
                    }
                    
                    
                    
                    
                    
                    ?>
                                            </div>
                                        </div>
        
        
        
        
        
        
                                        <div class="form-group">
                                            <label for="focusedinput" class="col-sm-2 control-label">Page Details</label>
                                            <div class="col-sm-8">
        
        
                                                <textarea class="form-control" rows="5" cols="50" name="pgedetails"
                                                    id="pgedetails" placeholder="Package Details" required>
                                                <?php 
        $pagetype=$_GET['type'];
        $sql = "SELECT detail from tblpages where type=:pagetype";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($results as $result)
        {		
        echo htmlentities($result->detail);
        }}
        ?>
        
                                                </textarea>
                                            </div>
                                        </div>
        
        
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <button type="submit" name="submit" value="Update" id="submit"
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
                        <!--//grid-->
        
                        <!-- script-for sticky-nav -->
                        <script>
                            $(document).ready(function () {
                                var navoffeset = $(".header-main").offset().top;
                                $(window).scroll(function () {
                                    var scrollpos = $(window).scrollTop();
                                    if (scrollpos >= navoffeset) {
                                        $(".header-main").addClass("fixed");
                                    } else {
                                        $(".header-main").removeClass("fixed");
                                    }
                                });
        
                            });
                        </script>
                        <!-- /script-for sticky-nav -->
                        <!--inner block start here-->
                        <div class="inner-block">
        
                        </div>
                        <!--inner block end here-->
                        <!--copy rights start here-->
                        <?php include('includes/footer.php');?>
                        <!--COPY rights end here-->
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