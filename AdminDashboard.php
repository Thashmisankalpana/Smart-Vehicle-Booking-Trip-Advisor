<?php
session_start(); // Start session

if (!isset($_SESSION["uname"])) {
  // Redirect to login page if user is not logged in
  header("location: login.php");
}

if (isset($_SESSION['fname'])) { // Check if the fname1 variable is set in the session
    $fname = $_SESSION['fname']; // Retrieve the fname1 variable from the session
    // Use the fname1 variable as required
} else {
    // Handle the case where the fname1 variable is not set in the session
}
if (isset($_SESSION['id'])) { // Check if the fname1 variable is set in the session
    $id1 = $_SESSION['id']; // Retrieve the fname1 variable from the session
    // Use the fname1 variable as required
} else {
    // Handle the case where the fname1 variable is not set in the session
}
// Handle logout request
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
$id = isset($_SESSION["id"]) ? $_SESSION["id"] : "";
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
					<h1><a href="Home.php">Transport</a> Suggest U</h1>
			  <nav id="nav">
						<ul>
							<li>
								<a href="#" class="icon solid fa-angle-down">Profile</a>
								<ul>
									<li>
										<h1> Welcome, <?php echo $id; ?> <?php echo $fname; ?>
									</li>
									<li>
										<form method="post">
  											<input type="submit" name="logout" value="Logout">
										</form>
									</li>
								</ul>
							</li>
							<li>
								<a href="#" class="icon solid fa-angle-down">Services</a>
								<ul>
									<li><a href="VehicleDetail.php?fname=<?php echo $fname; ?>"><b>Vehicle Details</b></a></li>
									<li><a href="Customerdetail.php?fname=<?php echo $fname; ?>"><b>Customer Details</b></a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<h2>Transport Suggest U</h2>
					<p>suggesting a suitable method of transport(vehicle)<br>according to the nature of the journey under the prevailing conditions of the country these days.</p>
				</section>

			<!-- Main -->
				<section id="main" class="container">

					<section class="box special features">
                        <h3>Services</h3>
						<div class="features-row">
							<section>
								<span class="image1"><img src="images/car.png" height="100px" width="100px" alt="" /></span>
								<br/><a href="VehicleDetail.php?fname=<?php echo $_SESSION['fname']; ?>"><b>Vehicle Details</b></a>
							</section>
							<section>
								<span class="image2"><img src="images/user.png" height="100px" width="100px" alt="" /></span>
								<br/><a href="Customerdetail.php?fname=<?php echo $_SESSION['fname']; ?>"><b>Customer Details</b></a>
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