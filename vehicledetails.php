<?php
//database connection
@include 'config.php';

$_SESSION['fname1'] = $fname1; // Store the fname1 variable in the session
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (isset($_POST["logout"])) {
		// Unset session variables and destroy session
		unset($_SESSION["uname1"]);
		unset($_SESSION["fname1"]);
		session_destroy();
	
		// Redirect to login page
		header("location: login.php");
	  }
	}
  
  $fname = isset($_SESSION["fname1"]) ? $_SESSION["fname1"] : "";

$query ="SELECT * FROM vehicles";
$connect=mysqli_query($conn,$query);
$num=mysqli_num_rows($connect);//check in database any data have orp not
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Vehicle Details</title>
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
							<li><a href="CustomerDashboard.php?fname=<?php echo $_SESSION['fname1']; ?>">Home</a></li>
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

			<!-- Main -->
				<section id="main" class="container medium">
					<div class="box">
						<form method="post" action="#">
					<header>
						<h2 align="center"><b>Vehicle Details</b></h2></br>
					</header>
							<div class="row gtr-50 gtr-uniform">
								<table>
									<tr>
										<th><b>Id</b></th>
										<th><b>Vehicle Type</b></th>
										<th><b>Vehicle Name</b></th>
										<th><b>Fuel Type</b></th>
										<th><b>Number of Seats</b></th>
									</tr>
									<?php
									if ($num>0){
										while($data=mysqli_fetch_assoc($connect)){
											echo"
												<tr>
													<td>".$data['Id']."</td>
													<td>".$data['vehicle_type']."</td>
													<td>".$data['vehicle_name']."</td>
													<td>".$data['fuel_type']."</td>
													<td>".$data['num_seats']."</td>
												</tr>
											";
										}
									}
									?>
									<tr></tr>
								</table>
							</div>
						</form>
					</div>
				</section>

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