
<?php
include('../../datalayer/server.php');
include('../../datalayer/dbconnection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
	<!-- the below css is to change footer styles only -->
	<link rel="stylesheet" href="../footer.css">
    
</head>
<?php include("../patientheader.php")?>

<body>

<?php  if (isset($_POST['treatmentHistory'])) {
			 ?>
		
         	<table class="table2">
         	<caption style="margin-left: 34px;padding: 10px;font-weight: bold;font-size: 30px;" class="asd">Treatment History</caption>
		<tr>
		<th>DoctorID</th> 
		<th>DoctorName</th>
		<th>Treatment</th>
		<th>Doctor's Note</th>	


		</tr> 
		
		<?php
		$PID =$mysqli -> real_escape_string($_SESSION['Userprofile']);

		$sqlP2="SELECT  * FROM  prescription   WHERE descID=('$PID') OR descName=('$PID') " ;
		$resultP2=$mysqli->query($sqlP2);
		if(mysqli_num_rows($resultP2)>0){
			while ($rowP2=$resultP2->fetch_assoc()) {

				echo "<tr><td>".$rowP2["descID"]."</td><td>".$rowP2["descName"]."</td><td>".$rowP2["treatment"]."</td><td>".$rowP2['Note']."</td></tr>";
			}


			echo "</table";
	


		}
	}?>

 </table>
 <?php


  




if (isset($_POST['feedback'])) {
?>
    <form class="feedback" method="post" action="index.php"  >
    <div >
                <h2 class= "feedback_header">FeedBack</h2>
            <textarea class= "feedback_body" name="feedx" placeholder="Write something............"></textarea>
            <button type="submit" name="sendfeedback" class="feedback_btn" >Send</button>



        </div>


    <?php  }


    ?>
    </form>








<?php include("../footer.php") ?>

</body>
</html>