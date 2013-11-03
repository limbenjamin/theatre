<?php
if(isset($_POST['add']))
{
$dbhost = 'localhost';
$dbuser = 'webuser';
$dbpass = 'j8ldl971';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

	$movieID = ($_POST['movieID']);
	$movieName = ($_POST['movieName']);
	$year = ($_POST['year']);
	$genre = ($_POST['genre']);
	$studio = $_POST['studio'];
	$director = $_POST['director'];
	$rating = $_POST['rating'];

	if (is_null($movieID)){
		$sql = "INSERT INTO `theatre`.`movie` (`movieID`, `movieName`, `year`, `genre`, `studio`, `director`, `rating`) 
		VALUES (null, '$movieName', '$year', '$genre', '$studio', '$director', '$rating');";

	}
	else{
		$sql = "UPDATE `theatre`.movie SET movieName='$movieName', year='$year', genre='$genre', studio='$studio',director='$director', rating='$rating'
		 WHERE movieID='$movieID'";
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