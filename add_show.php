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


	$movie_id = ($_POST['movie_id']);
	$start_time = ($_POST['start_time']);
	$end_time = $_POST['end_time'];
	$hall = $_POST['hall'];

$sql = "INSERT INTO `theatre`.`shows` (`show_id`, `movie_id`, `start_time`, `end_time`, `hall`) VALUES (NULL, '$movie_id', '$start_time', '$end_time', '$hall');";

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