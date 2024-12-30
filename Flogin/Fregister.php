<!DOCTYPE html>
<html lang="en">
<head>
	<title>PDAM</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="logoair.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<style>
		/* Add space between the buttons on the same line */
		.container-login100-form-btn {
			display: flex; /* Use flexbox to align the buttons */
			justify-content: space-evenly; /* Space out buttons on the same line */
			width: 100%; /* Make the container take up full width */
		}
		.login100-form-btn {
			
			width: 40%; /* Make each button take up nearly half of the space */
		}
	</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('air.png');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Register
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post" action="../Sistem/inputuser.php" onsubmit="return validatePasswords()">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username" autocomplete="off">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					
					<!-- First password -->
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" id="password" name="password" placeholder="Password" autocomplete="new-password" value="">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<!-- Confirmation password -->
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" autocomplete="new-password" value="">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Register
						</button>
						<a href="Flogin.php" class="login100-form-btn">
							Back
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script>
		function validatePasswords() {
			var password = document.getElementById("password").value;
			var confirmPassword = document.getElementById("confirm-password").value;

			if (password !== confirmPassword) {
				alert("Confirmation password does not match the first password.");
				location.reload(); // Reload the page if passwords don't match
				return false; // Prevent form submission
			}
			return true; // Allow form submission
		}
	</script>

</body>
</html>
