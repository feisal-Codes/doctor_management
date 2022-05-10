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

<?php include("../patientheader.php") ?>


<body>



	<form method="post" action="searchdoctor.php">

		<?php include('../../datalayer/errors.php'); ?>

		<div class="input-group">
			<label style="font-weight: bold;">Search By:<br>*Doctor ID<br>*Doctor Name<br>*Categorey</label>
			<input type="text" name="dID">

		</div>

		<div class="input-group">
			<button type="submit" name="Search" class="btn">Search</button>
		</div>









	</form>
	</form>




	<?php

	if (isset($_POST['Search'])) {

	?> <table class="table2">
			<tr>
				<th>Doctor ID</th>
				<th>Doctor Name</th>
				<th>Address</th>
				<th>Contact Number</th>
				<th>Category</th>

			</tr> <?php


					$dID = $mysqli->real_escape_string($_POST['dID']);

					$sql6 = "SELECT  * FROM  doctor   WHERE 	Doctorname=('$dID') OR DoctorID=('$dID') OR categorey=('$dID')";
					$result6 = $mysqli->query($sql6);
					if (mysqli_num_rows($result6) == 1) {
						while ($row6 = $result6->fetch_assoc()) {

							echo "<tr><td>" . $row6["DoctorID"] . "</td><td>" . $row6["Doctorname"] . "</td><td>" . $row6["Address"] . "</td><td>" . $row6["ContactNumber"] . "</td><td>" . $row6['categorey'] . "</td></tr>";
						}


						echo "</table";
					}
				} ?>
		</table>



		<?php include("../footer.php") ?>

</body>

</html>