<?php include '../../datalayer/bookserver.php'; ?>
<!DOCTYPE html>
<html>

<head>
	<title>Patient</title>
	<link rel="stylesheet" href="style2.css">
	<!-- the below css is to change footer styles only -->
	<link rel="stylesheet" href="../footer.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<?php include("../patientheader.php")?>

<body>







	<div class="header">
		<h2>Book Appointment</h2>
	</div>

	<form method="post" action="book.php">

		<?php include('../../datalayer/errors.php'); ?>





		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


			<div class="input-group">
				<label>Categery</label>
				<select name="categorey" class="xd">
					<option value="bone">bone</option>
					<option value="heart">heart</option>
					<option value="Dentistry">Dentistry</option>
					<option value="MentalHealth">Mental Health</option>
					<option value="Surgery">Surgery</option>

				</select>


			</div>





			<div class="input-group">
				<button type="submit" name="Search" class="btn">Search</button>
			</div>











			<?php

			if (isset($_POST['Search'])) {

				$categorey = mysqli_real_escape_string($mysqli, $_POST['categorey']);

				$query2 = "SELECT * FROM doctor WHERE categorey=('$categorey')";
				$result2 = mysqli_query($mysqli, $query2);
			?>

				<div class="input-group">

					<label>Doctor ID</label>


					<select class="input-group2" name="docID">

						<?php while ($row2 = mysqli_fetch_assoc($result2)) {
						?>


							<option> <?php echo $row2['DoctorID'] ?> </option>



						<?php

						} ?>
					</select>
				</div>


				



				<div class="input-group">
					<label>Date</label>
					<input type="Date" name="Date">

				</div>

				<div class="input-group">
					<label>Time</label>
					<input type="Time" name="Time">
				</div>

				<div class="input-group">
					<button type="submit" name="Book" class="btn">BOOK</button>
				</div>

			<?php
			}


			?>








		</form>




		<?php include("../footer.php") ?>

</body>

</html>