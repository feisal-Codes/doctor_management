<?php include('../datalayer/server.php') ?>

<!DOCTYPE html>
<html>

<head>
	<title>Patient</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="header">
		<h2>Patient Login</h2>
	</div>

	<form method="post" action="patientlogin.php">

		<?php include('../datalayer/errors.php') ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="Username">

		</div>




		<div class="input-group">
			<label>Password</label>
			<input type="Password" name="password">



			<div class="input-group">
				<button type="submit" name="Login" class="btn"> Login</button>
			</div>

			<p>
				Not a member? <a href="signup.php">Sign Up </a>
			</p>





	</form>

</body>

</html>