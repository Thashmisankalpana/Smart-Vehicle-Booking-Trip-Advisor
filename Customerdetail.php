<?php
//database connection
@include 'config.php';

$query ="SELECT * FROM user_type WHERE user_type='Customer'";
$connect=mysqli_query($conn,$query);
$num=mysqli_num_rows($connect);//check in database any data have orp not
  
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

	
$_SESSION['fname'] = $fname; // Store the fname variable in the session
$fname = isset($_GET["fname"]) ? $_GET["fname"] : "";

?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Customer Details</title>
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
							<li><a href="AdminDashboard.php?fname=<?php echo $_SESSION['fname']; ?>">Home</a></li>
							<li>
								<a href="#" class="icon solid fa-angle-down">Profile</a>
								<ul>
									<li>
										<a href="#" class="active">Welcome, <?php echo $_GET['fname']; ?>!</h1>
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
						<h2 align="center"><b>Customer Details</b></h2></br>
					</header>
							<div class="row gtr-50 gtr-uniform">
								<table>
									<tr>
										<th><b>ID</b></th>
										<th><b>First Name</b></th>
										<th><b>Last Name</b></th>
										<th><b>Address</b></th>
										<th><b>Phone Number</b></th>
									</tr>
									<?php
									if ($num>0){
										while($data=mysqli_fetch_assoc($connect)){
											echo"
												<tr>
													<td>".$data['id']."</td>
													<td>".$data['fname']."</td>
													<td>".$data['lname']."</td>
													<td>".$data['address']."</td>
													<td>".$data['pnumber']."</td>
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