<?php
session_start(); // Start session

if (!isset($_SESSION["uname1"])) {
  // Redirect to login page if user is not logged in
  header("location: login.php");
}

if (isset($_SESSION['fname1'])) { // Check if the fname1 variable is set in the session
    $fname1 = $_SESSION['fname1']; // Retrieve the fname1 variable from the session
    // Use the fname1 variable as required
} else {
    // Handle the case where the fname1 variable is not set in the session
}

if (isset($_SESSION['id1'])) { // Check if the fname1 variable is set in the session
    $id1 = $_SESSION['id1']; // Retrieve the fname1 variable from the session
    // Use the fname1 variable as required
} else {
    // Handle the case where the fname1 variable is not set in the session
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["logout1"])) {
	  // Unset session variables and destroy session
	  unset($_SESSION["uname1"]);
	  unset($_SESSION["fname1"]);
	  session_destroy();
  
	  // Redirect to login page
	  header("location: login.php");
	}
  }

$fname = isset($_SESSION["fname1"]) ? $_SESSION["fname1"] : "";

$id = isset($_SESSION["id1"]) ? $_SESSION["id1"] : "";

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Customer Dashboard</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<h1><a href="">Transport </a> Suggest U</h1></br>
			  <nav id="nav">
						<ul>
							<li>
								<a href="#" class="icon solid fa-angle-down">Profile</a>
								<ul>
									<li>
										<h1> Welcome, <?php echo $id; ?> <?php echo $fname; ?>!</h1>
									</li>
									<li>
										<form method="post">
  											<input type="submit" name="logout1" value="Logout">
										</form>
									</li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon solid fa-angle-down">Services</a>
								<ul>
									<li><a href="vehicledetails.php?fname=<?php echo $_SESSION['fname1']; ?>">Vehicle Details</a></li>
									<li><a href="contact.html">Your Vehicle Suggest History</a></li>
									<li><a href="customer.html">Journey History</a></li>
									<li><a href="customerjourneydetails.php?fname=<?php echo $_SESSION['fname1'] ?><?php echo $_SESSION['id1'] ?>">Vehicle Suggest</a></li>
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

					<section class="box special">
						<header class="major">
						<span class="image featured"><img src="images/banner.jpg" height="550px" width="50px" alt="" /></span>
							<h3>suggesting a suitable method of transport(vehicle)<br>according to the nature of the journey under the prevailing conditions of the country these days.</h3>
					</section>

					<section class="box special features">
                        <h3>Services</h3>
						<div class="features-row">
							<section>
								<span class="image1"><img src="images/car.png" height="120px" width="120px" alt="" /></span>
								<br/><a href="vehicledetails.php?fname=<?php echo $_SESSION['fname1']; ?>"><b>Vehicle Details</b></a>
							</section>
							<section>
								<span class="image2"><img src="images/history1.png" height="120px" width="120px" alt="" /></span>
								<br/><a href=""><b>Your Vehicle Suggest History</b></a>
							</section>
						</div>
				  <div class="features-row">
							<section>
								<span class="image3"><img src="images/journ1.png" height="120px" width="120px" alt="" /></span>
								<br/><a href=""><b>Journey History</b></a>
							</section>
							<section>
								<span class="image4"><img src="images/suggest1.png" height="120px" width="120px" alt="" /></span>
								<br/><a href="customerjourneydetails.php?fname=<?php echo $_SESSION['fname1']; ?>"><b>Vehicle Suggest</b></a>

							</section>
						</div>
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