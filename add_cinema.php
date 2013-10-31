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


	$cinemaName = ($_POST['cinemaName']);
	$address = $_POST['address'];
	$telNo = $_POST['telNo'];
	$manager = $_POST['manager'];


$sql = "INSERT INTO `theatre`.`cinema` (`cinemaID`, `cinemaName`, `address`, `telNo`) VALUES (null, '$cinemaName', '$address', '$telNo');";

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