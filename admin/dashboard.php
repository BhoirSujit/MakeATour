<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
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

					<li class="sidebar-item active">
						<a class="sidebar-link" href="dashboard.php">
							<i class="align-middle" data-feather="sliders"></i> <span
								class="align-middle">Dashboard</span>
						</a>
					</li>

					<li class="sidebar-item ">
						<a class="sidebar-link" href="create-package.php">
							<i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Create
								Package</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="manage-packages.php">
							<i class="align-middle" data-feather="grid"></i> <span class="align-middle">Manage
								Package</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="manage-users.php">
							<i class="align-middle" data-feather="users"></i> <span class="align-middle">Manage
								Users</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="manage-bookings.php">
							<i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Manage
								Booking</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="manageissues.php">
							<i class="align-middle" data-feather="slash"></i> <span class="align-middle">Manage
								Issues</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="manage-enquires.php">
							<i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Manage
								Enquiries</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="manage-pages.php">
							<i class="align-middle" data-feather="layers"></i> <span class="align-middle">Manage
								Pages</span>
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
							<i class="align-middle" data-feather="settings"></i> <span
								class="align-middle">Settings</span>
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

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="row">
						<div class="col-xl-12 col-xxl-12 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6" style="cursor: pointer;"
										onclick="window.location.href='manage-users.php';">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Users</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><span id="userCount">
														<?php $sql = "SELECT id from tblusers";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
					?>
														<?php echo htmlentities($cnt);?>


													</span></h1>
												<div class="mb-0">

													<span class="text-muted">Total register users</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6" style="cursor: pointer;"
										onclick="window.location.href='manageissues.php';">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Raised Issues</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="alert-circle"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><span id="productCount">
														<?php $sql5 = "SELECT id from tblissues";
$query5= $dbh -> prepare($sql5);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$cnt5=$query5->rowCount();
					?>
														<?php echo htmlentities($cnt5);?>
													</span></h1>
												<div class="mb-0">

													<span class="text-muted">Raised Issue by users</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6" style="cursor: pointer;"
										onclick="window.location.href='manage-packages.php';">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Total Packages</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="grid"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><span id="postCount">
														<?php $sql3 = "SELECT PackageId from tbltourpackages";
$query3= $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$cnt3=$query3->rowCount();
					?>
														<?php echo htmlentities($cnt3);?>
													</span></h1>
												<div class="mb-0">

													<span class="text-muted">Total packages listed</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6" style="cursor: pointer;"
										onclick="window.location.href='manage-enquires.php';">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Enquiries</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="clipboard"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><span>
														<?php $sql2 = "SELECT id from tblenquiry";
$query2= $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$cnt2=$query2->rowCount();
					?>
														<?php echo htmlentities($cnt2);?>
													</span></h1>
												<div class="mb-0">

													<span class="text-muted">Total Enquiries by users</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6" style="cursor: pointer;"
										onclick="window.location.href='manage-enquires.php';">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">New Enquiries</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="file-plus"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><span>
														<?php $sql ="SELECT id from tblenquiry where (Status is null || Status='')";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$newenq=$query->rowCount();
					?>
														<?php echo htmlentities($newenq);?>
													</span></h1>
												<div class="mb-0">

													<span class="text-muted">New Enquiries by users</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6" style="cursor: pointer;"
										onclick="window.location.href='manage-enquires.php';">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Read Enquiries</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="check-square"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><span>
														<?php $sql5 ="SELECT id from tblenquiry where (Status='1')";
													$query5= $dbh -> prepare($sql5);
													$query5->execute();
													$results5=$query5->fetchAll(PDO::FETCH_OBJ);
													$redenq=$query5->rowCount();
																		?>
														<?php echo htmlentities($redenq);?>
													</span></h1>
												<div class="mb-0">

													<span class="text-muted">Total answered Enquiries</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6" style="cursor: pointer;"
										onclick="window.location.href='manage-bookings.php';">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Bookings</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="briefcase"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><span>
														<?php $sql1 = "SELECT BookingId from tblbooking";
													$query1 = $dbh -> prepare($sql1);
													$query1->execute();
													$results1=$query1->fetchAll(PDO::FETCH_OBJ);
													$cnt1=$query1->rowCount();
																		?>
														<?php echo htmlentities($cnt1);?>
													</span></h1>
												<div class="mb-0">

													<span class="text-muted">Total Bookings by users</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6" style="cursor: pointer;"
										onclick="window.location.href='manage-bookings.php';">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">New Bookings</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="plus-square"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><span>
														<?php $sql ="SELECT BookingId from tblbooking where (status is null || status='')";
					$query = $dbh -> prepare($sql);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$newbookings=$query->rowCount();
										?>
														<?php echo htmlentities($newbookings);?>
													</span></h1>
												<div class="mb-0">

													<span class="text-muted">New Bookings by users</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6" style="cursor: pointer;"
										onclick="window.location.href='manage-bookings.php';">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Cancelled Bookings</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="slash"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><span>
														<?php $sql ="SELECT BookingId from tblbooking where (status='2')";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cancelbooking=$query->rowCount();
					?>
														<?php echo htmlentities($cancelbooking);?>
													</span></h1>
												<div class="mb-0">

													<span class="text-muted">Cancelled Bookings</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6" style="cursor: pointer;"
										onclick="window.location.href='manage-bookings.php';">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Confirm Bookings</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="check-square"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><span>
														<?php $sql ="SELECT BookingId from tblbooking where (status='1')";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cancelbooking=$query->rowCount();
					?>
														<?php echo htmlentities($cancelbooking);?>
													</span></h1>
												<div class="mb-0">

													<span class="text-muted">Total Conform bookings</span>
												</div>
											</div>
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

	<script>
		document.addEventListener("DOMContentLoaded", function () {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			var markers = [{
				coords: [31.230391, 121.473701],
				name: "Shanghai"
			},
			{
				coords: [28.704060, 77.102493],
				name: "Delhi"
			},
			{
				coords: [6.524379, 3.379206],
				name: "Lagos"
			},
			{
				coords: [35.689487, 139.691711],
				name: "Tokyo"
			},
			{
				coords: [23.129110, 113.264381],
				name: "Guangzhou"
			},
			{
				coords: [40.7127837, -74.0059413],
				name: "New York"
			},
			{
				coords: [34.052235, -118.243683],
				name: "Los Angeles"
			},
			{
				coords: [41.878113, -87.629799],
				name: "Chicago"
			},
			{
				coords: [51.507351, -0.127758],
				name: "London"
			},
			{
				coords: [40.416775, -3.703790],
				name: "Madrid "
			}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script>

</body>

</html>
<?php } ?>