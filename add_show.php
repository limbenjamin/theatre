<?php
if(isset($_POST['add']))
{
$dbhost = 'localhost';
$dbuser = 'webuser';
$dbpass = '';
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

$sql = "INSERT INTO `theatre2`.`shows` (`showID`, `movieID`, `hallID`, `duration`, `startTime`, `endTime`) VALUES ('$showID', '$movieID', '$hallID', '$duration', '$startTime', `endTime`);";

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
?>