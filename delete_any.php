<?php
$dbhost = 'localhost';
$dbuser = 'webuser';
$dbpass = 'dbpassword';
$con=mysqli_connect($dbhost, $dbuser, $dbpass,"theatre");
if(! $con )
{
  die('Could not connect: ' . mysql_error());
}
	try {
	$id = ($_POST['id']);
	if ($id < 1000){
		mysqli_query($con,"DELETE FROM cinema WHERE cinemaID='$id'");
		mysqli_close($con);
	}
	else if ($id < 2000){
		mysqli_query($con,"DELETE FROM hall WHERE hallID='$id'");
		mysqli_close($con);
	}
	else if ($id < 3000){
		mysqli_query($con,"DELETE FROM movie WHERE movieID='$id'");
		mysqli_close($con);
	}
	else if ($id < 4000){
		mysqli_query($con,"DELETE FROM shows WHERE showID='$id'");
		mysqli_close($con);
	}
	else if ($id < 5000){
		mysqli_query($con,"DELETE FROM customer WHERE customerID='$id'");
		mysqli_close($con);
	}
	else{
		mysqli_query($con,"DELETE FROM ticket WHERE ticketID='$id'");
		mysqli_close($con);
	}

	
	} catch(Exception $ex) {
	    echo $ex;
	}


echo "Entered data successfully\n";
header("Location: admin.php");
?>