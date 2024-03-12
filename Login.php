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
session_start();

if(isset($_POST['submit'])){
    $uname = mysqli_real_escape_string($conn,$_POST['uname']);
    $password = md5($_POST['password']);

    $select = "SELECT * FROM user_type WHERE uname = '$uname' && password= '$password'";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);

         if($row['user_type'] == 'Admin'){
// Redirect to admin page
			$_SESSION["uname"] = $uname;
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['id'] = $row['id'];
            header('location: AdminDashboard.php');

         }elseif($row['user_type'] == 'Customer'){
// Redirect to customer page
			$_SESSION["uname1"] = $uname;
            $_SESSION['fname1'] = $row['fname'];
            $_SESSION['id1'] = $row['id'];
            header('location: CustomerDashboard.php');
         }
    }else{
        $error = "Incorrect username or password";
    }
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<style>
        body {
        background-image: url("images/pic07.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        }
	</style>
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Main -->
					<section id="main" class="container medium">
						<div class="box">
							<h2 align="center"><span class="image1"><img src="images/user.png" height="100px" width="100px" alt="" align="middle" /></span><br><b>Login</b></h2>
							<?php if(isset($error)) { ?>
							<div class="alert alert-danger">
								<strong>Error!</strong> <?php echo $error; ?>
							</div>
							<?php } ?>
							<form method="post" action="">
								<div class="row gtr-50 gtr-uniform">
									<div class="col-6 col-12-mobilep">
										<input type="text" name="uname" id="uname" value="" placeholder="User Name" required />
									</div>
									<div class="col-6 col-12-mobilep">
										<input type="password" name="password" id="password" value="" placeholder="Password" required/>
									</div>
									<div class="col-12">
										<ul class="actions special">
											<li><input type="submit" value="Login" name="submit"/></li>
											<li><input type="reset" value="Cancel" /></li>
										</ul>
									</div>
								</div>
							</form>
							<a href="register_form.php"><b>Don't have an account? Register here</b></a>
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