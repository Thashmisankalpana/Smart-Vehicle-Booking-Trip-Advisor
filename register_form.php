<?php
@include 'config.php';

if(isset($_POST['submit'])){
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);
    $pnumber = mysqli_real_escape_string($conn,$_POST['pnumber']);
    $user_type = ($_POST['user_type']);
    $uname = mysqli_real_escape_string($conn,$_POST['uname']);
    $password = md5($_POST['password']);

    $select = "SELECT * FROM user_type WHERE uname = '$uname' && password= '$password'";

    $result = mysqli_query($conn,$select);

    if (mysqli_num_rows($result) > 0){

        $error[] = 'user already exist';
    }
    else
    {
            $insert ="INSERT INTO user_type(fname, lname, address, pnumber, user_type, uname, password) VALUES ('$fname','$lname','$address','$pnumber'
            ,'$user_type', '$uname','$password')";

            mysqli_query($conn,$insert);
            header('Location:Login.php');
        }
};
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Sign Up</title>
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

			<!-- Main -->
				<section id="main" class="container medium">
					<div class="box">
						<h2 align="center"><span class="image1"><img src="images/user.png" height="100px" width="100px" alt="" align="middle" /></span><br><b>Sign Up</b></h2>
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
									<input type="text" name="fname" id="fname" value="" placeholder="First Name" required />
								</div>
								<div class="col-6 col-12-mobilep">
									<input type="text" name="lname" id="lname" value="" placeholder="Last Name" required/>
								</div>
                                <div class="col-6 col-12-mobilep">
									<input type="text" name="address" id="address" value="" placeholder="Address" required />
								</div>
                                <div class="col-6 col-12-mobilep">
									<input type="text" name="pnumber" id="pnumber" value="" placeholder="Phone Number" required />
								</div>
                                <div class="col-6 col-12-mobilep">
                                    <select name="user_type">
                                        <option value="Customer">Customer</option>
                                        <option value="Admin">Admin</option>
                                    </select>
								</div>
								<div class="col-6 col-12-mobilep">
								</div>
								<div class="col-6 col-12-mobilep">
									<input type="text" name="uname" id="uname" value="" placeholder="User Name" required />
								</div>
								<div class="col-6 col-12-mobilep">
									<input type="password" name="password" id="password" value="" placeholder="Password" required/>
								</div>
								<div class="col-12">
									<ul class="actions special">
										<li><input type="submit" name="submit" value="Sign Up" /></li>
                                        <li><input type="reset" value="Cancel" /></li>
									</ul>
								</div>
							</div>
						</form>
                        <a href="Login.php"><b>you are an member -></b></a><br><br>
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