<?php
@include 'config.php';

  
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

	$_SESSION['fname1'] = $fname1; // Store the fname1 variable in the session
	

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Get the form inputs
  $startplace = $_POST["startplace"];
  $endplace=$_POST["endplace"];
  $reason= $_POST["reason"];
  $traveldate = $_POST["traveldate"];

  // Define SQL query to insert data into the table
  $sql = "INSERT INTO journey_details (startplace, endplace, reason, traveldate) VALUES ('$startplace', '$endplace', '$reason','$traveldate')";

	// Execute the SQL query to insert data into the table
	if ($conn->query($sql) === TRUE) {
		echo "Data inserted successfully";
		
		header('Location: recommend.php');
	} else {
		echo "Error inserting data: " . $conn->error;
	}

	$fname = isset($_SESSION["fname1"]) ? $_SESSION["fname1"] : "";
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
							<li><a href="CustomerDashboard.php?fname=<?php echo $_SESSION['fname1']; ?>">Home</a></li>
							<li>
								<a href="#" class="icon solid fa-angle-down">Profile</a>
								<ul>
    								<li>
										<a href="#" class="active">Welcome, <?php echo $_GET['fname']; ?>!</a>
									</li>
									<li>
										<form method="post">
  											<input type="submit" name="logout1" value="Logout">
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
						<h2 align="center"><b>Add Your Journey Details</b></h2>
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
									<input type="text" name="startplace" id="startplace" value="" placeholder="Jouney start place" required />
								</div>
								<div class="col-6 col-12-mobilep">
									<input type="text" name="endplace" id="endplace" value="" placeholder="Jouney end place" required />
								</div>
								<div class="col-6 col-12-mobilep">
                                    <select name="reason">
                                        <option value="Work/business">Work/business</option>
                                        <option value="Pleasure/vacation">Pleasure/vacation</option>
                                        <option value="Visiting friends/family">Visiting friends/family</option>
                                        <option value="Education">Education</option>
                                        <option value="Medical Treatment">Medical Treatment</option>
                                    </select>
								</div>
								<div class="col-6 col-12-mobilep">
									<label for="date">Select a travel date:</label>
									<input type="date" id="date" name="traveldate">
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