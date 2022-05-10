<?php
include('../../datalayer/server.php');
include('../../datalayer/dbconnection.php');

?>
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

	<div>
		<h2 class="headerP">My Information</h2>



		<form method="post" action="treatment.php" class="infoP" style="margin-left:-1px; margin-top:0px ;width: 40%;padding: 20px;border :3px solid #39ca74 ;background: white; border-radius: 10px 10px 10px 10px;">






			<?php
			$Username =  ($_SESSION['Username']);
			$sqlqu = "SELECT  * FROM  patients  WHERE Username=('$Username') ";
			$result = $mysqli->query($sqlqu);
			$patient = mysqli_fetch_all($result, MYSQLI_ASSOC);

			?>


			<div class="contentP" style="font-weight: bold;">



				<h3>
					<?php
					echo "Name: " . $patient[0]['Username'] . "</br>" . "</br>";

					echo "Patient Name: " . $patient[0]['Name'] . "</br>" . "</br>";
					echo "Email: " . $patient[0]['Email'] . "</br>" . "</br>";
					echo "Contact Number: " . $patient[0]['ContactNumber'] . "</br>" . "</br>";
					echo "Address: " . $patient[0]['Address'] . "</br>" . "</br>";
					echo "Blood Type: " . $patient[0]['Bloodtype'] . "</br>" . "</br>";




					?>

				</h3>


			</div>

			<div class="input-group">
				<button type="submit" name="treatmentHistory" class="btn" style=" border-radius: 5px;margin-left: 80%; border:none;padding: 10px 20px 10px 20px">MyTreatment History</button>



			</div>
			<div class="input-group">
				<button type="submit" name="feedback" class="btn" style=" border-radius: 5px;margin-left: 80%; border:none;padding: 10px 30px 10px 30px">Send Feedback</button>
			</div>


		</form>









	</div>
	<?php include("../footer.php") ?>

</body>

</html>

<!--<?php if (isset($_SESSION['success'])) : ?> 
            <div class="error success" > 
                <h3> 
                    <?php

					unset($_SESSION['success']);
					?> 
                </h3> 
            </div> 
        <?php endif ?> 

        $Patientsearch = mysqli_real_escape_string($mysqli,$_POST['Patientsearch']);
	
	$query="SELECT * FROM patients WHERE UserID=('$Patientsearch')";
	$result2=mysqli_query($mysqli,$query);

   
        <!-- information of the user logged in -->
<!-- welcome message for the logged in user -->