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
$dbuser = 'root';
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
echo "<h3>Entered data successfully</h3>";
mysql_close($conn);
}
else
{
}
header("Location: adminmovie.php");
?>
</div>
</div>
</section>
</body>
</html>