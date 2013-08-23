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


	$movie_name = ($_POST['movie_name']);
	$genre = ($_POST['genre']);
	$rating = $_POST['rating'];

$sql = "INSERT INTO `theatre`.`movie` (`movie_id`, `movie_name`, `genre`, `rating`) VALUES (NULL, '$movie_name', '$genre', '$rating');";

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