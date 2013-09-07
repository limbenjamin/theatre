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


	$customerID = ($_POST['customerID']);
	$customerName = ($_POST['customerName']);
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];


$sql = "INSERT INTO `theatre2`.`customer` (`customerID`, `customerName`, `email`, `password`, `phone`) VALUES ('$customerID', '$customerName', '$email', '$password', '$phone');";

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