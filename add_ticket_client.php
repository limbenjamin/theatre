<html>
<head>
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <header class="headertop needhead" id="header-section">
        <div class="nav-top"> 
            <div class="navbar navbar-fixed-top navbar-inverse" id="top-nav"> 
              <div class="navbar-inner">
                <div class="container"> 
                    <a class="brand" href="#">
                    <span><i class="fa-icon-star"></i> Popcorn</span></a>
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
    </header>
<br/>
<section>
<div class="container">
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
	if ($paid == 'yes')
		$paid = 1;
	else if ($paid == 'no')
		$paid = 0;
	else
		die('<h2>Please enter yes or no for pay now column</h2>');
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
					die('<h2>Seat has been taken. Please enter an empty seat.</h2>');
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
echo "<header><h3>Booking Successful</h3></header>";
echo "<h3>Your Ticket: </h3>";
echo "<div class='span8'><table class='table table-striped'>";
echo "<tr>
<th>Show ID</th>
<th>Movie Title</th>
<th>Cinema</th>
<th>Hall No.</th>
<th>Seat No</th>
<th>Price</th>
<th>Concession</th>
<th>Paid</th>
</tr>";
$movie = $db->prepare("SELECT movieName 
		FROM shows, movie 
		WHERE showID=:id 
		AND shows.movieID=movie.movieID");
$movie->bindValue(':id', $showID);
$movie->execute();
$row = $movie->fetch(PDO::FETCH_BOTH);
$mName = $row[0];
$cinema = $db->prepare("SELECT cinemaName, hall.hallID
		FROM shows, hall, cinema 
		WHERE showID=:id 
		AND shows.hallID=hall.hallID
		AND hall.cinemaID=cinema.cinemaID");
$cinema->bindValue(':id', $showID);
$cinema->execute();
$row = $cinema->fetch(PDO::FETCH_BOTH);
$cName = $row[0];
$hID = $row[1];
    echo "<tr>
	<td>$showID</td>
	<td>$mName</td>
	<td>$cName</td>
	<td>$hID</td>
	<td>$seatNo</td>
	<td>$price</td>
	<td>$concession</td>
	<td>$paid</td>";
	echo "
	</tr>
	</table></div>";
mysql_close($conn);
}
else
{
}
echo '<div class="span8"><h3>Click <a href="./dash.php?id=4001">here</a> to return to the dashboard</h3></div>';?>
</div>
</div>
</div>
</section>
</body>
</html>