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
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'dbpassword';
$con=mysqli_connect($dbhost, $dbuser, $dbpass,"theatre");
if(! $con )
{
  die('Could not connect: ' . mysql_error());
}
	try {
	$customerID = ($_GET["cid"]);
	$ticketID = ($_GET["id"]);
	date_default_timezone_set('Asia/Singapore');
	$paiddate = date('Y-m-d H:i:s');
	mysqli_query($con,"UPDATE ticket SET paidDateTime='$paiddate' WHERE ticketID='$ticketID'");
	mysqli_query($con,"UPDATE ticket SET paid='1' WHERE ticketID='$ticketID'");
	mysqli_close($con);/**/
	} catch(Exception $ex) {
	    echo $ex;
	}

echo "<h2>Thank You! Your Payment is Successful!</h2>";
echo '<h3>Click <a href="./dash.php?id=4001">here</a> to return to the dashboard</h3>';
?>
</div>
</section>
</body>
</html>