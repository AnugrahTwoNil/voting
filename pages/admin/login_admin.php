<?php
include("../header/config.php");

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../../assets/img/logo osis.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../asset_login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../asset_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../asset_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../asset_login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../asset_login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../asset_login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../asset_login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../asset_login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../asset_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../asset_login/css/main.css">
	<!--===============================================================================================-->
</head>

<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" autocomplete="off " action="proses_login_admin.php">
					<span class="login100-form-title p-b-43">
						Login Untuk Masuk
					</span>


					<div class="wrap-input100 validate-input" data-validate="Valid username is required">
						<input class="input100" type="text" name="username" required autocomplete="newname">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>




					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>

				<video src="../../assets/img.mp4" autoplay muted loop></video>
				</div>
			</div>
		</div>
	</div>
	</div>





	<!--===============================================================================================-->
	<script src="../../asset_login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../../asset_login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="../../asset_login/vendor/bootstrap/js/popper.js"></script>
	<script src="../../asset_login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../../asset_login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../../asset_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../../asset_login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="../../asset_login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="../../asset_login/js/main.js"></script>

</body>

</html>