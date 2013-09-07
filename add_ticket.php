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


	$ticketID = ($_POST['ticketID']);
	$customerID = ($_POST['customerID']);
	$showID = $_POST['showID'];
	$seatNo = ($_POST['seatNo']);
	$price = ($_POST['price']);
	$concession = ($_POST['concession']);
	$paid = $_POST['paid'];
	$bookDateTime = ($_POST['bookDateTime']);
	$paidDateTime = ($_POST['paidDateTime']);

$sql = "INSERT INTO `theatre2`.`ticket` (`ticketID`, `customerID`, `showID`, `seatNo`, `price`, `concession`, `paid`, `bookDateTime`, `paidDateTime`) 
		VALUES ('$ticketID', '$customerID', '$showID','$seatNo', '$price', '$concession', '$paid', '$bookDateTime', '$paidDateTime');";

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