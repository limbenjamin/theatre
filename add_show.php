<?php
if(isset($_POST['add']))
{
$dbhost = 'localhost';
$dbuser = 'webuser';
$dbpass = 'password';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

	$movieID = ($_POST['movieID']);
	$hallID = ($_POST['hallID']);
	$duration = ($_POST['duration']);
	$startTime = ($_POST['startTime']);
	$endTime = $_POST['endTime'];

$sql = "INSERT INTO `theatre`.`shows` (`showID`, `movieID`, `hallID`, `duration`, `startTime`, `endTime`) VALUES (null, '$movieID', '$hallID', '$duration', '$startTime', `endTime`);";

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