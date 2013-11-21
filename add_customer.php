<?php
if(isset($_POST['add']))
{
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	  die('Could not connect: ' . mysql_error());
	}

		$cID = ($_POST['cID']);
		$customerName = ($_POST['customerName']);
		$email = $_POST['email'];
		$password = $_POST['password'];
		$phone = $_POST['phone'];
		echo $cID;
	if (is_null($cID)){
		$sql = "INSERT INTO `theatre`.`customer` (`cID`, `cName`, `email`, `cPw`, `phone`) 
		VALUES (null, '$customerName', '$email', '$password', '$phone');";
	}
	else{
		echo "in";
		$sql = "UPDATE `theatre`.customer SET cName='$customerName', email='$email', cPw='$password', phone='$phone'
		 WHERE cID='$cID'";
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
header("Location: admincustomer.php");
die();
?>