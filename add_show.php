<?php
if(isset($_POST['add']))
{
$dbhost = 'localhost';
$dbuser = 'webuser';
$dbpass = 'j8ldl971';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
$db = new PDO('mysql:host=localhost;dbname=theatre;charset=utf8', 'webuser', 'j8ldl971');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
	$showID = ($_POST['showID']);
	$movieID = ($_POST['movieID']);
	$hallID = ($_POST['hallID']);
	$duration = ($_POST['duration']);
	$startTime = ($_POST['startTime']);
	$endTime = $_POST['endTime'];

	//check start time after end time
	if ($startTime > $endTime)
		 die('Start time is after end time. Error');

	//check duration correct
	if ((strtotime($endTime) - strtotime($startTime))/(60*60.0) != $duration){
		die('Duration is not Correct.');
	}


	//check show overlap
	$sth = $db->prepare("SELECT startTime,endTime FROM shows WHERE hallID=:id AND showID<>:sid");
			$sth->bindValue(':id', $hallID);
			$sth->bindValue(':sid', $showID);
			$sth->execute();
			while($row = $sth->fetch(PDO::FETCH_BOTH)) {
				$retval = datesOverlap($row[0],$row[1],$startTime,$endTime);
				if ($retval == 1){
					die('Overlap in dates');
				}
			}
	if (is_null($showID)){
		$sql = "INSERT INTO `theatre`.`shows` (`showID`, `movieID`, `hallID`, `duration`, `startTime`, `endTime`) 
		VALUES (null, '$movieID', '$hallID', '$duration', '$startTime', '$endTime');";

	}
	else{
		$sql = "UPDATE `theatre`.shows SET movieID='$movieID', hallID='$hallID', duration='$duration', startTime='$startTime', 
		endTime='$endTime' WHERE showID='$showID'";
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

function datesOverlap($start_one,$end_one,$start_two,$end_two) {

   if($start_one <= $end_two && $end_one >= $start_two) { //If the dates overlap
        return 1;
   }

   return 0; //Return 0 if there is no overlap
}



?>