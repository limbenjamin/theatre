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
$db = new PDO('mysql:host=localhost;dbname=theatre;charset=utf8', 'webuser', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$cid = ($_GET["id"]); ?>	
<div class="row">
		<div class="span4">
			<div class="well">
		    <h3 class="folio-title"><span class="main-color"><i class="fa-icon-search"></i> Search for Movies</span></h3>
			<?php echo'<form method="post" action="dash2.php?id='.$cid.'">'; ?>
				<label>Movie Title</label> <input type="text" required name="title" class="span3"/><br>
				<label>Cinema</label> <input type="text" required name="cinema" class="span3"/><br>
	       		<input name="search" class="btn btn-info" type="submit" id="search" value="Submit">
	        </form>
            </div>				
		</div>
		<div class="span8">	
			<?php
			echo "<br /><br /><h3>Your Bookings</h3>";
			echo "<table class='table table-striped'>
			<tr>
			<th>Ticket ID</th>
			<th>Show ID</th>
			<th>seatNo</th>
			<th>price</th>
			<th>concession</th>
			<th>Booking Date</th>
			<th>Payment Date</th>
			<th>Pay</th>
			<th>Cancel</th>
			</tr>";
			try {
				    $sth = $db->prepare("SELECT * FROM ticket WHERE cID= :id");
					$sth->bindValue(':id', $cid);
					$sth->execute();
					while($row = $sth->fetch(PDO::FETCH_BOTH))  {
					    echo "<tr>";
					    $tid = $row[0];
					    $paid = $row[6];
					    echo "<td> $tid </td>";
					    echo "<td> $row[2] </td>";
					    echo "<td> $row[3] </td>";
					    echo "<td> $$row[4].00 </td>";
					    echo "<td> $row[5] </td>";
					    echo "<td> $row[7] </td>";
					    echo "<td> $row[8] </td>";
					    if ($paid == 1){
					    	echo '<td>Paid</td>';
					    	echo '<td>Not Allowed</td>';
					    }
					    else{
					    	echo '<td> <input type="checkbox" value='.$tid.' id="pay" class="cb"> </td>';
					    	echo '<td> <input type="checkbox" value='.$tid.' id="cancel" class="cb"> </td>';
					    }
					    echo "</tr>";
					}
					echo "</table>";
				} catch(Exception $ex) {
				    echo $ex;
				}

			echo "</div>";
			?>
		</div>
	</div>
</div>
</section>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</body>
</html>