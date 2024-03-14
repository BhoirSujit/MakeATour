<?php
session_start();
if(isset($_POST['signin']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password FROM tblusers WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['login']=$_POST['email'];
echo "<script type='text/javascript'> document.location = 'tours.php'; </script>";
} else{
	
	echo "<script>alert('Invalid Details');</script>";

}

}

?>

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Signin with your account</h1>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="mb-3">
            <label for="email" class="col-form-label">Email</label>
            <input class="form-control" type="text" name="email" id="email" placeholder="Enter your Email"  required="">	
          </div>
          <div class="mb-3">
            <label for="password" class="col-form-label">Password</label>
			<input class="form-control" type="password" name="password" id="password" placeholder="Password" value="" required="">	
			<a href="forgot-password.php">Forgot password</a>
          </div>
		  <div>
		  <div class="d-grid gap-2">
		  <input type="submit"   class="btn btn-success" name="signin" value="Log in">
</div>
<br>
		  <p>Don't have an Account? <a href="#" data-toggle="modal" data-target="#myModal"  data-dismiss="modal">Sign Up</a></p>
</div>
        </form>
      </div>
      <div class="modal-footer">
	  <p>By logging in you agree to our <a href="tandu.php">Terms and Conditions</a> and <a href="privacypolicy.php">Privacy Policy</a></p><br>

        
      </div>
    </div>
  </div>


			
			</div>