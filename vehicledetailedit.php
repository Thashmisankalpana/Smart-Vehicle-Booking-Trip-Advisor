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

if (isset($_GET['Id'])) {
    $id = $_GET['id'];

    // Retrieve the data of the selected vehicle
    $query = "SELECT * FROM vehicles WHERE Id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "Failed to retrieve data";
    }
}

if (isset($_POST['submit'])) {
    $id = $_POST['Id'];
    $vehicle_type = $_POST['vehicle_type'];
    $vehicle_name = $_POST['vehicle_name'];
    $fuel_type = $_POST['fuel_type'];
    $num_seats = $_POST['num_seats'];

    $query = "UPDATE vehicles SET vehicle_type='$vehicle_type', vehicle_name='$vehicle_name', fuel_type='$fuel_type', num_seats='$num_seats' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: AdminDashboard.php");
    } else {
        echo "Failed to update data";
    }
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Edit Vehicle Details</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<style>
        body {
        background-image: url("images/pic09.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        }
	</style>
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Transport</a> Suggest U</h1>
					<nav id="nav">
						<ul>
							<li>
								<a href="#" class="icon solid fa-angle-down">Profile</a>
								<ul>
									<li>
										<h1> Welcome, <?php echo $fname; ?>!</h1>
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

			<!-- Main -->
				<section id="main" class="container medium">
					<div class="box">
						<form method="post" action="#">
							<header>
								<h2 align="center"><b>Edit Vehicle Details</b></h2></br>
							</header>
							<div class="row gtr-50 gtr-uniform">
								<div class="col-6 col-12-mobilep">
									<label for="vehicle_type">Vehicle Type:</label>
									<input type="text" name="vehicle_type" id="vehicle_type" value="<?php echo $data['vehicle_type'] ?>" required />
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="vehicle_name">Vehicle Name:</label>
									<input type="text" name="vehicle_name" id="vehicle_name" value="<?php echo $data['vehicle_name'] ?>" required />
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="fuel_type">Fuel Type:</label>
									<input type="text" name="fuel_type" id="fuel_type" value="<?php echo $data['fuel_type'] ?>" required />
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="num_seats">Number of Seats:</label>
									<input type="text" name="num_seats" id="num_seats" value="<?php echo $data['num_seats'] ?>" required />
								</div>
								<div class="col-12">
									<ul class="actions special">
										<li><input type="submit" name="submit" value="Update" /></li>
                                        <li><input type="reset" value="Cancel" /></li>
									</ul>
								</div>
							</div>
						</form>
					</div>
				</section>
		</div>
        <!-- Footer -->
				<!--<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon brands fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
				</footer>-->

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