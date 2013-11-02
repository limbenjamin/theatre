<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'dbpassword';
$con=mysqli_connect($dbhost, $dbuser, $dbpass,"theatre");
if(! $con )
{
  die('Could not connect: ' . mysql_error());
}
	try {
	$customerID = ($_GET["cid"]);
	$ticketID = ($_GET["id"]);
	date_default_timezone_set('Asia/Singapore');
	$paiddate = date('Y-m-d H:i:s');
	mysqli_query($con,"UPDATE ticket SET paidDateTime='$paiddate' WHERE ticketID='$ticketID'");
	mysqli_query($con,"UPDATE ticket SET paid='1' WHERE ticketID='$ticketID'");
	mysqli_close($con);/**/
	} catch(Exception $ex) {
	    echo $ex;
	}


echo "Entered data successfully\n";
header("Location: dash.php?id=".$customerID);
?>