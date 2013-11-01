<?php
if(isset($_POST['add']))
{
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'dbpassword';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
	$showID = ($_POST['showID']);
	$movieID = ($_POST['movieID']);
	$hallID = ($_POST['hallID']);
	$duration = ($_POST['duration']);
	$startTime = ($_POST['startTime']);
	$endTime = $_POST['endTime'];

	if (is_null($showID)){
		$sql = "INSERT INTO `theatre`.`shows` (`showID`, `movieID`, `hallID`, `duration`, `startTime`, `endTime`) 
		VALUES (null, '$movieID', '$hallID', '$duration', '$startTime', `endTime`);";

	}
	else{
		$sql = "UPDATE `theatre`.shows SET movieID='$movieID', hallID='$hallID', duration='$duration', startTime='$startTime', 
		endTime='$endTime' WHERE showID='$showID'";
	}

mysql_select_db('movie');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully\n";
mysql_close($conn);
}
else
{
}
header("Location: admin.php");
?>