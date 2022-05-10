<?php include '../../datalayer/bookserver.php'; ?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin</title>
	<link rel="stylesheet" href="style5.css">
	<!-- the below css is to change footer styles only -->
	<link rel="stylesheet" href="../footer.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<?php include('../adminheader.php'); ?>

<body>
	<h1 style="margin-left:35% ;margin-top:80px" class="asd">Doctors Information</h1>
	<table class="table4">
		<tr>
			<th>Doctor ID</th>
			<th>Doctor Name</th>
			<th>Email</th>
			<th>Address</th>
			<th>Contact Number</th>
			<th>Password</th>
			<th>Category</th>
		
		</tr>

		<?php $sql3 = "SELECT  * FROM  doctor ";
		$result3 = $mysqli->query($sql3);
		if (mysqli_num_rows($result3) >= 1) {
			while ($row3 = $result3->fetch_assoc()) {

				echo "<tr><td>" . $row3["DoctorID"] . "</td><td>" . $row3["Doctorname"] . "</td><td>" . $row3["email"] . "</td><td>" . $row3["Address"] . "</td><td>" . $row3['ContactNumber'] . "</td><td>" . $row3['password'] . "</td><td>" . $row3["categorey"] . "</td></tr>";
			}


			echo "</table";
		}

		?>

	</table>

	<?php include("../footer.php") ?>
</body>

</html>