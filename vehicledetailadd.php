<?php
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


// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Get the form inputs
  $vehicle_type = $_POST["vehicle_type"];
  $vehicle_name=$_POST["vehicle_name"];
  $fuel_type = $_POST["fuel_type"];
  $num_seats = $_POST["num_seats"];

  $select = "SELECT * FROM vehicles WHERE vehicle_name = '$vehicle_name'";

  $result = mysqli_query($conn,$select);

  if (mysqli_num_rows($result) > 0){

	  $error[] = 'vehicle already exist';
  }
  else{
  // Define SQL query to insert data into the table
  $sql = "INSERT INTO vehicles (vehicle_type, vehicle_name, fuel_type, num_seats) VALUES ('$vehicle_type', '$vehicle_name','$fuel_type', '$num_seats')";

	// Execute the SQL query to insert data into the table
	if ($conn->query($sql) === TRUE) {
		echo "Data inserted successfully";
		
		header('Location: adminvehicledetails.php');
	} else {
		echo "Error inserting data: " . $conn->error;
	}
}

$_SESSION['fname'] = $fname; // Store the fname variable in the session
$fname = isset($_GET["fname"]) ? $_GET["fname"] : "";

};
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Add Vehicle Details</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<style>
        body {
        background-image: url("images/pic08.jpg");
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
										<a href="#" class="active">Welcome, <?php echo $_SESSION['fname']; ?>!</a>
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
						<h2 align="center"><b>Add Vehicle Details</b></h2>
						<form method="post" action="">
						<?php
                                if(isset($error)){
                                    foreach($error as $error){
                                        echo '<span class="error-msg">'.$error.'</span>';
                                    };
                                };

                                ?>
							<div class="row gtr-50 gtr-uniform">
                                <div class="col-6 col-12-mobilep">
                                    <select name="vehicle_type">
                                        <option value="Electric car">Electric car</option>
                                        <option value="Hybrid car">Hybrid car</option>
                                        <option value="Gasoline car">Gasoline car</option>
                                        <option value="Diesel car">Diesel car</option>
                                        <option value="Motorcycle">Motorcycle</option>
                                        <option value="SUV">SUV</option>
                                    </select>
								</div>
								<div class="col-6 col-12-mobilep">
								</div>
								<div class="col-6 col-12-mobilep">
									<input type="text" name="vehicle_name" id="vehicle_name" value="" placeholder="vehicle Name" required />
								</div>
								<div class="col-6 col-12-mobilep">
                                    <select name="fuel_type">
                                        <option value="Electric">Electric</option>
                                        <option value="Gasoline and Electric">Gasoline and Electric</option>
                                        <option value="Gasoline">Gasoline</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Gasoline or Diesel">Gasoline or Diesel</option>
                                    </select>
								</div>
								<div class="col-6 col-12-mobilep">
									<input type="text" name="num_seats" id="num_seats" value="" placeholder="No of Seats" required/>
								</div>
								<div class="col-12">
									<ul class="actions special">
										<li><input type="submit" name="submit" value="Save" /></li>
                                        <li><input type="reset" value="Cancel" /></li>
									</ul>
								</div>
							</div>
						</form>
					</div>
				</section>
		</div>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>