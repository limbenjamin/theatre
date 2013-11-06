<?php
if(isset($_POST['add']))
{
$dbhost = 'localhost';
$dbuser = 'webuser';
$dbpass = 'dbpassword';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
	$hallID = ($_POST['hallID']);
	$cinemaID = ($_POST['cinemaID']);
	$capacity = $_POST['capacity'];

	if (is_null($hallID)){
		$sql = "INSERT INTO `theatre`.`hall` (`hallID`, `cinemaID`, `capacity`) VALUES (null, '$cinemaID', '$capacity');";
	}
	else{
		$sql = "UPDATE `theatre`.hall SET cinemaID='$cinemaID', capacity='$capacity'
		 WHERE hallID='$hallID'";
	}




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