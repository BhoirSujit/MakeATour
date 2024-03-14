<?php if($_SESSION['login'])
{?>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">MakeATour</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a id="navhome"  href="index.php">Home</a></li>
          <li><a id="navabout" href="about.php">About</a></li>
          <li><a id="navtour" href="tours.php">Tour Packages</a></li>
          <li><a id="navprivacypolicy" href="privacypolicy.php">Privacy policy</a></li>
          <li><a id="navtermanduse" href="tandu.php">Term of Use</a></li>
          <li><a id="navcontactus" href="contactus.php">Contact Us</a></li>
          <li><a data-toggle="modal" data-target="#myModal3" >Write Us</a></li>

          <li class="dropdown"><a href="#"><span>User</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <li class="prnt"><a href="profile.php">My Profile</a></li>
			<li class="prnt"><a href="change-password.php">Change Password</a></li>
			<li class="prnt"><a href="tour-history.php">My Tour History</a></li>
			<li class="prnt"><a href="issuetickets.php">Raised Tickets</a></li>
      <li class="prnt"><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  </div><?php } else {?>

  <!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">MakeATour</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a id="navhome" href="index.php">Home</a></li>
          <li><a id="navabout" href="about.php">About</a></li>
          <li><a id="navtour" href="tours.php">Tour Packages</a></li>
          <li><a id="navprivacypolicy" href="privacypolicy.php">Privacy policy</a></li>
          <li><a id="navtermanduse" href="tandu.php">Term of Use</a></li>
          <li><a id="navcontactus" href="contactus.php">Contact Us</a></li>
          <li><a id="navenquiry" href="enquiry.php">Enquiry</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    
			<a href="#" class="get-started-btn" data-toggle="modal" data-target="#myModal4" >Sign In</a>
    </div>
  </header><!-- End Header -->

  <?php }?>