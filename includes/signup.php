<?php
session_start();
error_reporting(0);
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$mnumber=$_POST['mobilenumber'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql="INSERT INTO  tblusers(FullName,MobileNumber,EmailId,Password) VALUES(:fname,:mnumber,:email,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mnumber',$mnumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['login']=$_POST['email'];
$_SESSION['msg']="You are Scuccessfully registered. Now you can login ";
header('location:thankyou.php');
}
else 
{
$_SESSION['msg']="Something went wrong. Please try again.";
header('location:thankyou.php');
}
}
?>
<!--Javascript for check email availabilty-->
<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">




<div class="modal-dialog"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create your account </h1>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="mb-3">
           
			<input class="form-control" type="text" value="" placeholder="Full Name" name="fname" autocomplete="off" required="">
							

          </div>
          <div class="mb-3">
		  <input class="form-control" type="text" value="" placeholder="Mobile number" maxlength="10" name="mobilenumber" autocomplete="off" required="">

          </div>
		  <div class="mb-3">
		  <input class="form-control" type="text" value="" placeholder="Email id" name="email" id="email" onBlur="checkAvailability()" autocomplete="off"  required="">	
		 <span id="user-availability-status" style="font-size:12px;"></span> 

		   </div>
		   <div class="mb-3">
           <input class="form-control" type="password" value="" placeholder="Password" name="password" required="">	
													
		
		   </div>
		  
		  <div>
		  <div class="d-grid gap-2">
		  <input   class="btn btn-success" type="submit" name="submit" id="submit" value="Create Account">
</div>
<br>
		  <p>Have a Account? <a href="#" data-toggle="modal" data-target="#myModal4"  data-dismiss="modal">Log In</a></p>
</div>
        </form>
      </div>
      <div class="modal-footer">
	  <p>By logging in you agree to our <a href="tandu.php">Terms and Conditions</a> and <a href="privacypolicy.php">Privacy Policy</a></p><br>

        
      </div>
    </div>
  </div>



















			
			</div>