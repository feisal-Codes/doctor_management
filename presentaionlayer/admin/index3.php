<?php include('../../datalayer/bookserver.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin</title>
	<link rel="stylesheet" href="style5.css" type="text/css">
	<!-- the below css is to change footer styles only -->
	<link rel= "stylesheet" href="../footer.css">
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<?php include('../adminheader.php'); ?>


<body>



	<div class="headerA">
		<h2>Add Doctor</h2>
	</div>

	<form method="post" action="index3.php">

		<?php include('../../datalayer/errors.php'); ?>

		<div class="input-groupA">
			<label>Doctor ID</label>
			<input type="text" name="addID">

		</div>


		<div class="input-groupA">
			<label>Doctor Name</label>
			<input type="text" name="addname">


		</div>

		<div class="input-groupA">
			<label>Address</label>
			<input type="text" name="addAddress">

		</div>

		<div class="input-groupA">
			<label>Contact Number</label>
			<input type="text" name="addContactNumber">


		</div>


		<div class="input-groupA">
			<label>Email address</label>
			<input type="text" name="addEmail">

		</div>

		<div class="input-groupA">
			<label>Password</label>
			<input type="text" name="addpassword">

		</div>
		<div class="input-groupA">
			<label>Category</label>
			<select name="addcategory" class="xd">
				<option value="bone">bones</option>
				<option value="heart">heart</option>
				<option value="Dentistry">Dentistry</option>
				<option value="MentalHealth">Mental Health</option>
				<option value="Surgery">Surgery</option>




			</select>
		</div>

		<div class="input-groupA">
			<button type="submit" name="Add" class="btnA">Add Doctor</button>
		</div>

      





	</form>
	
	<div class="headerAD">
		<h2>Delete Doctor</h2>
	</div>

	<form method="post" action="index3.php" class="delete">

		<div class="input-groupA">
			<label>Doctor ID</label>
			<input type="text" name="deleteID">

		</div>

		<div class="input-groupA">
			<button type="submit" name="Delete" class="btnA">Delete</button>
		</div>

	</form>


	

	<?php include("../footer.php") ?>




</body>

</html>