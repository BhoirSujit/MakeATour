<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
	{
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
	$sql ="SELECT EmailId FROM admin WHERE EmailId=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update admin set Password=:newpassword where EmailId=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();

echo "<script>alert('Your Password succesfully changed');</script>";
}
else {

echo "<script>alert('Email id or Mobile no is invalid');</script>";
}
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

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

	<title>Sign Up | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Recover Account</h1>
							<p class="lead">
								Forgot password, Don't warry. we are here.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
                                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<div class="m-sm-4">
								<form  name="chngpwd" method="post" onSubmit="return valid();">

										<div class="mb-3">
											<label class="form-label">Email Id</label>
		
											<input type="email" name="email" class="form-control form-control-lg" placeholder="Reg Email id" required="">
										</div>
										<div class="mb-3">
											<label class="form-label">Mobile No.</label>
											
											<input type="text" name="mobile" class="form-control form-control-lg" placeholder="Reg Mobile Number" required="" maxlength="10">
										</div>
										<div class="mb-3">
											<label class="form-label">New Password</label>
											
											<input type="password" class="form-control form-control-lg" name="newpassword" id="newpassword" placeholder="New Password" required="">
										</div>
										<div class="mb-3">
											<label class="form-label">Confirm Password</label>
											
											<input type="password" name="confirmpassword" id="confirmpassword" class="form-control form-control-lg" placeholder="Confirm Password" required="">
										</div>
										<div class="text-center mt-3">
											<a href="index.php" class="btn btn-lg btn-primary">Sign In</a>
											<input type="submit" class="btn btn-secondary" name="submit" value="Reset">
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
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

	<script src="js/app.js"></script>

</body>

</html>
