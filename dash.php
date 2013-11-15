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
$db = new PDO('mysql:host=localhost;dbname=theatre;charset=utf8', 'root', 'dbpassword');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$cid = ($_GET["id"]); ?>	
<div class="row">
		<div class="span4">
			<div class="well">
		    <h3 class="folio-title"><span class="main-color"><i class="fa-icon-search"></i> Search for Movies</span></h3>
			<?php echo'<form method="post" action="dash2.php?id='.$cid.'">'; ?>
				<label>Movie Title</label>
				<?php
				    $sth1 = $db->prepare("SELECT movieName FROM movie");
				    $sth1->execute();
				?>
				<select id="title" name="title">
				    <option value="">All</option>
				    <?php 
				        while($row1 = $sth1->fetch(PDO::FETCH_BOTH)) {
				           echo "<option value='".$row1[0]."'> $row1[0] </option>";
				        }
				    ?>
				</select>
				<br>
				<label>Cinema</label>
				<?php
				    $sth2 = $db->prepare("SELECT cinemaName FROM cinema");
				    $sth2->execute();
				?>
				<select id="cinema" name="cinema">
				    <option value="">All</option>
				    <?php 
				        while($row2 = $sth2->fetch(PDO::FETCH_BOTH)) {
				           echo "<option value='".$row2[0]."'> $row2[0] </option>";
				        }
				    ?>
				</select>    
				<br>
				<label>Date</label> <input type="date" min="<?php echo date('Y-m-d'); ?>" id="date" name="date" class="span3"/><br>
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
			<th>Movie Name</th>
			<th>Hall No.</th>
			<th>Cinema</th>
			<th>Seat No.</th>
			<th>Price</th>
			<th>Concession</th>
			<th>Booking Date</th>
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
					    $sid = $row[2];
					    $sth2 = $db->prepare("SELECT * FROM shows,movie WHERE showID= :id AND shows.movieID = movie.movieID");
						$sth2->bindValue(':id', $sid);
						$sth2->execute();
					    while ($row2 = $sth2->fetch(PDO::FETCH_BOTH)){
							echo "<td> $row2[movieName] </td>";
							echo "<td> $row2[2] </td>";
						}
					    $sth3 = $db->prepare("SELECT * FROM shows,hall,cinema WHERE showID= :id AND shows.hallID=hall.hallID AND hall.cinemaID = cinema.cinemaID");
						$sth3->bindValue(':id', $sid);
						$sth3->execute();
					    while ($row3 = $sth3->fetch(PDO::FETCH_BOTH)){
							echo "<td> $row3[cinemaName] </td>";
						}						
					    echo "<td> $row[3] </td>";
					    echo "<td> $$row[4].00 </td>";
					    echo "<td> $row[5] </td>";
					    echo "<td> $row[7] </td>";
					    if ($paid == 1){
					    	echo "<td><span style='color: green'>PAID</span> on <br/>$row[8]</td>";
					    	echo '<td>Not Allowed</td>';
					    }
					    else{
					    	echo '<td><span style="color: red">Pay Now:</span> <input type="checkbox" value='.$tid.' id="pay" class="cb"> </td>';
					    	echo '<td><span style="color: red">Cancel Now:</span> <input type="checkbox" value='.$tid.' id="cancel" class="cb"> </td>';
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
<script>
$('.cb').mousedown(function() {
    var op = confirm("Are you sure?");
    if (op==true){
        $(this).trigger("change");
        $action = this.id;
        $id = this.value;
        $cid = <?php echo $cid; ?>;
        if ($action == "pay"){
        	window.location.href = "./pay_client.php?cid="+$cid+"&id="+$id;
        }
        else{
        	window.location.href = "./cancel_client.php?cid="+$cid+"&id="+$id;
        }
    }
});
</script>
</body>
</html>
