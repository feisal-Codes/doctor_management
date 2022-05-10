<?php include('../../datalayer/server.php'); ?>
<?php include('../../datalayer/bookserver.php'); ?>

<!DOCTYPE html>
<html>

<head>
	<title>Doctor</title>
	<link rel="stylesheet" href="style3.css">
	<!-- the below css is to change footer styles only -->
	<link rel="stylesheet" href="../footer.css">
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<?php include('../doctorheader.php');
$DoctorID = $_SESSION["DoctorID"];

?>

<body>

	<div class="header">
		<h2>My Information</h2>

	</div>
	<form method="post" action="index2.php" class="info">

		<?php $sql3 = "SELECT  * FROM  doctor WHERE DoctorID=('$DoctorID')";
		$result3 = $mysqli->query($sql3);
		$doctor = mysqli_fetch_all($result3, MYSQLI_ASSOC);






		?>


		<div class="Dcontent">

			<h3>
				<?php
				echo "Doctor ID: " . $doctor[0]['DoctorID'] . "</br>";

				echo "Doctor Name: " . $doctor[0]['Doctorname'] . "</br>";
				echo "Email: " . $doctor[0]['email'] . "</br>";
				echo "Contact Number: " . $doctor[0]['ContactNumber'] . "</br>";
				echo "Address: " . $doctor[0]['Address'] . "</br>";
				echo "Specialization: " . $doctor[0]['categorey'] . "</br>";




				?>

			</h3>





		</div>








	</form>














	<?php include("../footer.php") ?>


</body>

</html>