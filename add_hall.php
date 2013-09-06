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


	$hallID = ($_POST['hallID']);
	$cinemaID = ($_POST['cinemaID']);
	$capacity = $_POST['capacity'];

$sql = "INSERT INTO `theatre2`.`hall` (`hallID`, `cinemaID`, `capacity`) VALUES ('$hallID', '$cinemaID', '$capacity');";

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