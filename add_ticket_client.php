<?php
if(isset($_POST['add']))
{
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'dbpassword';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
$db = new PDO('mysql:host=localhost;dbname=theatre;charset=utf8', 'root', 'dbpassword');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

	$customerID = ($_GET["id"]);
	$showID = $_POST['showID'];
	$seatNo = ($_POST['seatNo']);
	$concession = ($_POST['concession']);
	$paid = $_POST['paid'];
	date_default_timezone_set('Asia/Singapore');
	$date = date('Y-m-d H:i:s');
	//autofill concession level
	if ($concession == 'ADULT')
		$price = 10;
	else if ($concession == 'CHILD')
		$price = 5;
	else
		$price = 7;
	if ($paid==1){
		$paiddate = date('Y-m-d H:i:s');
	}
	else{	
		$paiddate = null;
	}
	//check seat is empty before booking
	try {
		$sth = $db->prepare("SELECT * FROM ticket WHERE showID=:id AND seatNo=:seatNo");
				$sth->bindValue(':id', $showID);
				$sth->bindValue(':seatNo', $seatNo);
				$sth->execute();
				$row = $sth->fetch(PDO::FETCH_BOTH);
				if (!is_null($row[0])){
					die('Seat has been taken. Please enter an empty seat');
				}
	} catch(Exception $ex) {
	    echo $ex;
	}			
$sql = "INSERT INTO `theatre`.`ticket` (`ticketID`, `cID`, `showID`, `seatNo`, `price`, `concession`, `paid`, `bookDateTime`, `paidDateTime`) 
		VALUES (null, '$customerID', '$showID','$seatNo', '$price', '$concession', '$paid', '$date', '$paiddate');";


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
header("Location: dash.php?id=".$customerID);
?>