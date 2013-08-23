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


	$price = ($_POST['price']);
	$show_id = ($_POST['show_id']);
	$seat_no = $_POST['seat_no'];

$sql = "INSERT INTO `theatre`.`ticket` (`ticket_id`, `price`, `show_id`, `seat_no`) VALUES (NULL, '$price', '$show_id', '$seat_no');";

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