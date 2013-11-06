<html>
<head>
<link href="assets/bootstrap.css" rel="stylesheet">
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/admin.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
      <div class="nav-top"> 
      <div class="navbar navbar-fixed-top navbar-inverse" id="top-nav"> 
        <div class="navbar-inner">
          <div class="container"> 
              <a class="brand" href="./admindash.php">
              <span><i class="fa-icon-wrench"></i> Popcorn Admin</span></a>
               <div id="main-nav" class="scroller-spy">
                  <nav>
                    <ul class="nav pull-right" id="nav">
                      <li><a href="./index.php">Logout</a> </li>
                    </ul>
                  </nav>
                </div>          
          </div>
        </div>
      </div>
      </div>
<section>
<div class="container">
<div class="span6"> 
<?php
if(isset($_POST['add']))
{
$dbhost = 'localhost';
$dbuser = 'webuser';
$dbpass = 'dbpassword';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
$db = new PDO('mysql:host=localhost;dbname=theatre;charset=utf8', 'webuser', 'dbpassword');
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
					echo "<h3>Whoops, there's an overlap in the start datetime and end datetime with another show at the same venue!</h3>";
					echo "<h4>Please add a valid time range with no clashes!</h4>";
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
echo "<h3>Entered data successfully</h3>";
mysql_close($conn);
}
else
{
}
function datesOverlap($start_one,$end_one,$start_two,$end_two) {

   if($start_one <= $end_two && $end_one >= $start_two) { //If the dates overlap
        return 1;
   }

   return 0; //Return 0 if there is no overlap
}
?>
</div>
</div>
</section>
</body>
</html>