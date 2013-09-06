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


	$movieID = ($_POST['movieID']);
	$movieName = ($_POST['movieName']);
	$year = ($_POST['year']);
	$genre = ($_POST['genre']);
	$studio = $_POST['studio'];
	$director = $_POST['director'];
	$rating = $_POST['rating'];

$sql = "INSERT INTO `theatre2`.`movie` (`movieID`, `movieName`, `year`, `genre`, `studio`, `director`, `rating`) VALUES ('$movieID', '$movieName', '$year', '$genre', '$studio', '$director', '$rating');";

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