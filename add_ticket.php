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

	$ticketID = ($_POST['ticketID']);
	$customerID = ($_POST['customerID']);
	$showID = $_POST['showID'];
	$seatNo = ($_POST['seatNo']);
	$price = ($_POST['price']);
	$concession = ($_POST['concession']);
	$paid = $_POST['paid'];
	date_default_timezone_set('Asia/Singapore');
	$date = date('Y-m-d H:i:s');
	$paiddate = null;
	if ($paid == 1)
		$paiddate = date('Y-m-d H:i:s');
	if (is_null($ticketID)){
		$sql = "INSERT INTO `theatre`.`ticket` (`ticketID`, `cID`, `showID`, `seatNo`, `price`, `concession`, `paid`, `bookDateTime`, `paidDateTime`) 
				VALUES (null, '$customerID', '$showID','$seatNo', '$price', '$concession', '$paid', '$date', '$paiddate');";
	}
	else{
		$sql = "UPDATE `theatre`.ticket SET cID='$customerID', showID='$showID', seatNo='$seatNo', price='$price',concession='$concession', paid='$paid',paidDateTime ='$paiddate'
		 WHERE ticketID='$ticketID'";
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