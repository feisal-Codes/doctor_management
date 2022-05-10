<?php include '../../datalayer/bookserver.php '; ?>
<!DOCTYPE html>
<html>

<head>
	<title>Doctor</title>
	<link rel="stylesheet" href="style3.css">
	<!-- the below css is to change footer styles only -->
	<link rel="stylesheet" href="../footer.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<?php include('../doctorheader.php'); ?>


<body>

	<table class="table2">
		<tr>
			<th>Appointment ID</th>
			<th>DATE</th>
			<th>TIME</th>
			<th>PatientID</th>
			<th>PatientName</th>
			<th>PatientAddress</th>
			<th>PatientEmail</th>
			<th>PatientContactNumber</th>
			<th>BloodGroup</th>



		</tr><?php
				$doctorprofile = ($_SESSION['DoctorID']);

				$sqldoc = "SELECT  p.UserID, p.Name, p.Address, p.ContactNumber,p.Bloodtype,  p.Email, b.AppoID, b.Date, b.Time, b.patientID, b.docID   FROM bookapp AS b JOIN patients AS p ON b.patientID = p.UserID WHERE b.docID=('$doctorprofile')";
				$resultdoc = $mysqli->query($sqldoc);

				if (mysqli_num_rows($resultdoc) >= 1) {

					while ($rowdoc = $resultdoc->fetch_assoc()) {

						echo "<tr><td>" . $rowdoc["AppoID"] . "</td><td>" . $rowdoc["Date"] . "</td><td>" . $rowdoc["Time"] . "</td><td>" . $rowdoc["UserID"] . "</td><td>" . $rowdoc['Name'] . "</td><td>" . $rowdoc['Address'] . "</td><td>" . $rowdoc['Email'] . "</td><td>" . $rowdoc["ContactNumber"] . "</td><td>" . $rowdoc["Bloodtype"] . "</td></tr>";
					}


					echo "</table";
				}

				?>

	</table>




	<?php include("../footer.php") ?>

</body>

</html>