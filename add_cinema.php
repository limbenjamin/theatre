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

	$cinemaID = ($_POST['cinemaID']);
	$cinemaName = ($_POST['cinemaName']);
	$address = $_POST['address'];
	$telNo = $_POST['telNo'];
	$manager = $_POST['manager'];

	if (is_null($cinemaID)){
		$sql = "INSERT INTO `theatre`.`cinema` (`cinemaID`, `cinemaName`, `address`, `telNo`) 
		VALUES (null, '$cinemaName', '$address', '$telNo');";
	}
	else{
		$sql = "UPDATE `theatre`.cinema SET cinemaName='$cinemaName', address='$address', telNo='$telNo'
		 WHERE cinemaID='$cinemaID'";
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