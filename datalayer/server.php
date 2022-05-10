<?php

// storing global variables in session
//check if there is a session running, if its not running, starts a session

if (!isset($_SESSION)) {
	session_start();
}
$errors = array();

$mysqli = new mysqli("localhost", "root", "", "arawelo");

if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	exit();
}




if (isset($_POST['Register'])) {
	$Username 	= $mysqli->real_escape_string($_POST['Username']);
	$name	= $mysqli->real_escape_string($_POST['Name']);
	$Address 	= $mysqli->real_escape_string($_POST['Address']);
	$ContactNumber	 = $mysqli->real_escape_string($_POST['ContactNumber']);
	$Email 		=  $mysqli->real_escape_string($_POST['Email']);
	$Password 	= $mysqli->real_escape_string($_POST['password']);
	$bloodtype 	= $mysqli->real_escape_string($_POST['bloodtype']);






	if (empty($Username)) {
		array_push($errors, "Username is required");
		# code...
	}

	if (empty($name)) {
		array_push($errors, "name is required");
		# code...
	}


	if (empty($Address)) {
		array_push($errors, "Address is required");
		# code...
	}

	if (empty($ContactNumber)) {
		array_push($errors, "Contact Number is required");
		# code...
	}


	if (empty($Email)) {
		array_push($errors, "Email is required");
		# code...
	}

	if (empty($Password)) {
		array_push($errors, "Password is required");
		# code...
	}

	if (empty($bloodtype)) {
		array_push($errors, "Bloodtype is required");
		# code...
	}







	if (count($errors) == 0) {


		$Password = md5($Password);

		$sql = "INSERT INTO  patients (Username, Name, Address, ContactNumber, Email, Password,Bloodtype) VALUES ('$Username','$name','$Address','$ContactNumber','$Email','$Password','$bloodtype') ";



		if (!$mysqli->query($sql)) {
			printf("%d Row inserted.\n", $mysqli->affected_rows);
		}
		// if (move_uploaded_file($_FILES['']))


		$_SESSION['Username'] = $Username;
		$_SESSION['success'] = "you are now logged in";
		header('location:../presentaionlayer/patient/index.php');
	}



	# code...
	# code...
}




if (isset($_POST['Login'])) {

	$Username	= $mysqli->real_escape_string($_POST['Username']);
	$Password 	= $mysqli->real_escape_string($_POST['password']);
	if (empty($Username)) {
		array_push($errors, "Username is required");
		# code...
	}
	if (empty($Password)) {
		array_push($errors, "Password is required");


		# code...
	}


	if (count($errors) == 0) {

		$Password = md5($Password);



		$query = "SELECT * FROM patients WHERE Username=('$Username')AND Password=('$Password')";
		$result = mysqli_query($mysqli, $query);
		$myResults = $result->fetch_assoc();
		// echo $myResults['UserID'];
		if (mysqli_num_rows($result) == 1) {


			$_SESSION['Userprofile'] = $myResults['UserID'];
			$_SESSION['Username'] = $Username;
			$_SESSION['success'] = "you are now logged in";
			header('location:../presentaionlayer/patient/index.php');
		} else {
			array_push($errors, "The ID/Password not correct");
		}
	}
}


# code...


if (isset($_GET['logout'])) {

	session_destroy();
	unset($_SESSION['Username']);
	header('location:login.php');
}


if (isset($_GET['My info'])) {
	header('location:login.php');
}



$userprofile = $_SESSION['Userprofile'];
$query = "SELECT * FROM patients WHERE UserID=('$userprofile')";
$result = mysqli_query($mysqli, $query);
$col = mysqli_fetch_assoc($result);














if (isset($_POST['Login2'])) {

	$DoctorID2	= $mysqli->real_escape_string($_POST['doctorID']);
	$DoctorPassword2 = $mysqli->real_escape_string($_POST['doctorpassword']);
	if (empty($DoctorID2)) {
		array_push($errors, "Doctor ID is required");
		# code...
	}
	if (empty($DoctorPassword2)) {
		array_push($errors, "Password is required");


		# code...
	}


	if (count($errors) == 0) {





		$queryD = "SELECT * FROM doctor WHERE DoctorID=('$DoctorID2')AND password=('$DoctorPassword2')";
		$resultD = mysqli_query($mysqli, $queryD);
		if (mysqli_num_rows($resultD) == 1) {




			$_SESSION['DoctorID'] = $DoctorID2;
			$_SESSION['success'] = "you are now logged in";
			header('location:../presentaionlayer/doctor/index2.php');
		} else {
			array_push($errors, "The ID/Password not correct");
		}
	}
}




$doctorprofile = isset($_SESSION['DoctorID']);
$querydoctor = "SELECT * FROM doctor WHERE DoctorID=('$doctorprofile')";
$resultdoctor = mysqli_query($mysqli, $querydoctor);
$colD = mysqli_fetch_assoc($resultdoctor);


if (isset($_GET['logout'])) {

	session_destroy();
	unset($_SESSION['Username']);
	header('location:login.php');
}









if (isset($_POST['Login3'])) {

	$adminID	= $mysqli->real_escape_string($_POST['adminID']);
	$adminpassword = $mysqli->real_escape_string($_POST['adminpassword']);
	if (empty($adminID)) {
		array_push($errors, "Admin ID is required");
		# code...
	}
	if (empty($adminpassword)) {
		array_push($errors, "Password is required");


		# code...
	}


	if (count($errors) == 0) {





		$queryA = "SELECT * FROM admin WHERE AdminID=('$adminID')AND adminpassword=('$adminpassword')";
		$resultA = mysqli_query($mysqli, $queryA);
		if (mysqli_num_rows($resultA) == 1) {




			$_SESSION['AdminID'] = $adminID;
			$_SESSION['success'] = "you are now logged in";
			header('location:../presentaionlayer/admin/index3.php');
		} else {
			array_push($errors, "The ID/Password not correct");
		}
	}
}




if (isset($_POST['sendfeedback'])) {
	$feedback2	= $mysqli->real_escape_string($_POST['feedx']);




	$sqlfeed = "INSERT INTO  feedback (pID,feedback) VALUES ('$userprofile','$feedback2') ";

	if (!$mysqli->query($sqlfeed)) {
		printf("%d Row inserted.\n", $mysqli->affected_rows);
	}
}






$mysqli->close();
