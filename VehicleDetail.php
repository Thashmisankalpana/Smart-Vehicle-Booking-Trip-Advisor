<?php
//database connection
@include 'config.php';

  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (isset($_POST["logout"])) {
		// Unset session variables and destroy session
		unset($_SESSION["uname"]);
		unset($_SESSION["fname"]);
		session_destroy();
	
		// Redirect to login page
		header("location: login.php");
	  }
	}
	
  $fname = isset($_SESSION["fname"]) ? $_SESSION["fname"] : "";
  
  $_SESSION['fname'] = $fname; // Store the fname variable in the session

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Admin Dashboard</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<h1><a href="">Transport</a> Suggest U</h1>
			  <nav id="nav">
						<ul>	
							<li><a href="AdminDashboard.php?fname=<?php echo $_SESSION['fname']; ?>">Home</a></li>
							<li>
								<a href="#" class="icon solid fa-angle-down">Profile</a>
								<ul>
									<li>
										<a href="#" class="active">Welcome, <?php echo $_GET['fname']; ?>!</a>
									</li>
									<li>
										<form method="post">
  											<input type="submit" name="logout" value="Logout">
										</form>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<h2>Transport Suggest U</h2>
					<p>suggesting a suitable method of transport(vehicle)<br>according to the nature of the journey under the prevailing conditions of the country these days.</p>
					<!--<ul class="actions special">
						<li><a href="#" class="button primary">Sign Up</a></li>
						<li><a href="Login.php" class="button">Login</a></li>
					</ul>-->
				</section>

			<!-- Main -->
				<section id="main" class="container">

					<section class="box special features">
                        <h3>Vehicle Details</h3>
						<div class="features-row">
							<section>
								<span class="image1"><img src="images/add.png" height="50px" width="50px" alt="" /></span>
								<span class="image1"><img src="images/car.png" height="100px" width="100px" alt="" /></span>
            					<br/><a href="vehicledetailadd.php?fname=<?php echo $fname; ?>"><b>Add Vehicle details</b></a>
							</section>
							<section>
								<span class="image2"><img src="images/car.png" height="100px" width="100px" alt="" /></span>
            					<br/><a href="adminvehicledetails.php?fname=<?php echo $fname; ?>"><b>Vehicle details</b></a>
							</section>
						</div>
				  </section>
				</section>

				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon brands fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>