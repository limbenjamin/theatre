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


	$customerID = ($_POST['customerID']);
	$showID = $_POST['showID'];
	$seatNo = ($_POST['seatNo']);
	$price = ($_POST['price']);
	$concession = ($_POST['concession']);
	$paid = $_POST['paid'];
	$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO `theatre`.`ticket` (`ticketID`, `cID`, `showID`, `seatNo`, `price`, `concession`, `paid`, `bookDateTime`, `paidDateTime`) 
		VALUES (null, '$customerID', '$showID','$seatNo', '$price', '$concession', '$paid', '$date', null);";

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