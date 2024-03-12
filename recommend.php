<?php
// Set up database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final_project";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$_SESSION['fname1'] = $fname1; // Store the fname1 variable in the session
  
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

// Get the form data from $_POST variables
$q1 = isset($_POST['q1']) ? $_POST['q1'] : '';
$q2 = isset($_POST['q2']) ? $_POST['q2'] : '';
$q3 = isset($_POST['q3']) ? $_POST['q3'] : '';
$q4 = isset($_POST['q4']) ? $_POST['q4'] : '';
$q5 = isset($_POST['q5']) ? $_POST['q5'] : '';

// Call the Python script using shell_exec()
// Make sure to provide the correct path to the Python script file
$command = escapeshellcmd('decision_tree.py ' . escapeshellarg($q1) . ' ' . escapeshellarg($q2) . ' ' . escapeshellarg($q3) . ' ' . escapeshellarg($q4) . ' ' . escapeshellarg($q5));
$output = shell_exec($command);

if ($output === NULL) {
    // If the command did not execute successfully, print an error message and exit
    die("Error: Unable to execute command. Please check the path to the Python script file.");
} else {
    // Print the result
    echo '</br></br><form><h3><b>Vehicle Recommendation:</b></h3>';
    echo '<h4><b>' . $output . '</b></h4></br><a href="CustomerDashboard.php"><b>Home</b></a></form>';

    if (!empty($_POST)) {
        // Insert data into database
        $sql = "INSERT INTO recommendations (q1, q2, q3, q4, q5, recommended_vehicle)
                VALUES ('$q1', '$q2', '$q3', '$q4', '$q5', '$output')";
        if (mysqli_query($conn, $sql)) {
            echo "Data saved successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
<head>
	<title>Vehicle Recommender</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<style>
		form {
			margin: 50px auto;
			width: 50%;
			padding: 20px;
			background-color: #ffffff;
			border-radius: 5px;
		}
        body {
        background-image: url("images/pic06.jpg");
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
										<a href="#" class="active">Welcome, <?php echo $_GET['id']; ?> <?php echo $_GET['fname']; ?>!</a>
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

	<form method="post" action="recommend.php">
		<h2><b>Vehicle Recommender</b></h2>
		<p><b>Answer the following questions to find a suitable vehicle:</b></p>
		<label for="q1"><b>Do you prefer an environmentally friendly vehicle?</b></label>
		<select name="q1" id="q1" required>
			<option value="">Select an option</option>
			<option value="Yes">Yes</option>
			<option value="No">No</option>
		</select><br><br>
		<label for="q2"><b>What is your expected fuel efficiency?</b></label>
		<select name="q2" id="q2" required>
			<option value="">Select an option</option>
			<option value="High">High (30+ mpg)</option>
			<option value="Low">Low (less than 30 mpg)</option>
		</select><br><br>
		<label for="q3"><b>What is your expected driving range?</b></label>
		<select name="q3" id="q3" required>
			<option value="">Select an option</option>
			<option value="Long">Long (more than 100 km)</option>
			<option value="Short">Short (less than 100 km)</option>
		</select><br><br>
		<label for="q4"><b>How many people do you usually travel with?</b></label>
		<select name="q4" id="q4" required>
			<option value="">Select an option</option>
			<option value="2-3 people">2-3 people</option>
			<option value="4-5 people">4-5 people</option>
		</select><br><br>
		<label for="q5"><b>Do you plan to tow a trailer?</b></label>
		<select name="q5" id="q5" required>
			<option value="">Select an option</option>
			<option value="Yes">Yes</option>
			<option value="No">No</option>
		</select><br><br>
		<div class="col-12">
			<ul class="actions special">
				<li><input type="submit" value="submit" /></li>
                <li><input type="reset" value="Cancel" /></li>
			</ul>
		</div>
	</form>
        </div>
</body>
</html>