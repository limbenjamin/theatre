<html>
<head>
<<<<<<< HEAD
<link href="assets/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php

$db = new PDO('mysql:host=localhost;dbname=theatre;charset=utf8', 'webuser', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$cid = ($_GET["id"]);
echo "<br /><br /><h4>Existing Bookings</h4>";
echo "<table><td>ticketID</td><td>showID</td><td>seatNo</td><td>price</td><td>concession</td><td>paid</td><td>bookDateTime</td><td>paidDateTime</td><td>Pay</td><td>Cancel</td>";


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
		    echo "<td> $row[4] </td>";
		    echo "<td> $row[5] </td>";
		    echo "<td> $paid </td>";
		    echo "<td> $row[7] </td>";
		    echo "<td> $row[8] </td>";
		    if ($paid == 1){
		    	echo '<td></td>';
		    	echo '<td></td>';
		    }
		    else{
		    	echo '<td> <input type="checkbox" value='.$tid.' id="pay" class="cb"> </td>';
		    	echo '<td> <input type="checkbox" value='.$tid.' id="cancel" class="cb"> </td>';
		    }
		    echo "</tr>";
		}
		echo "</table>";
		$sth = $db->prepare("SELECT * FROM shows");
		$sth->execute();
		echo "<br /><br /><h4>Available Shows</h4>";
		echo "<table><td>show no.</td><td>movie name</td><td>hall no.</td><td>duration</td><td>startTime</td><td>endTime</td><td>Seats available</td>";
		while($row = $sth->fetch(PDO::FETCH_BOTH))  {
		    echo "<tr>";
		    $sid = $row[0];
		    echo "<td> $sid </td>";
		    $mid = $row[1];	
		    $sth1 = $db->prepare("SELECT * FROM movie WHERE movieID= :id1");
			$sth1->bindValue(':id1', $mid);
			$sth1->execute();
			while($row1 = $sth1->fetch(PDO::FETCH_BOTH))  {
				echo "<td> $row1[1] </td>";
			}
			$hid = $row[2];
		    echo "<td> $hid </td>";
		    echo "<td> $row[3] </td>";
		    echo "<td> $row[4] </td>";
		    echo "<td> $row[5] </td>";
		    $sth3 = $db->prepare("SELECT * FROM hall WHERE hallID= :id3");
			$sth3->bindValue(':id3', $hid);
			$sth3->execute();
			while($row3 = $sth3->fetch(PDO::FETCH_BOTH))  {
				$total = $row3[2];	
			}
			unset($arr);
			$arr = array();
			for($i=1;$i<=$total;$i++){
				array_push($arr, $i);
			}
		    $sth2 = $db->prepare("SELECT seatNo FROM ticket WHERE showID= :id2");
			$sth2->bindValue(':id2', $sid);
			$sth2->execute();
			unset($taken);
			$taken = array();
			while ($row2 = $sth2->fetch(PDO::FETCH_BOTH)){
				array_push($taken, $row2[0]);
			}
			unset($diff);
			$diff = array_diff($arr,$taken);
			unset($empty);
			for($i=0;$i<=sizeof($arr);$i++){
				if (!(is_null($diff[$i])))
					$empty .= ",".$diff[$i];
			}
			$str = substr($empty,1);
			echo "<td> $str </td>";
		    echo "</tr>";
		}
		echo "</table>";
	} catch(Exception $ex) {
	    echo $ex;
	}

echo "</div>";

mysql_close();

?><br/>
<div>
	
	<h4>New Booking<h4>
	<?php echo'<form method="post" action="add_ticket_client.php?id='.$cid.'">'; ?>
	<table class="table-condensed">
	<tr>
	<td width="100">show no.</td>
	<td><input name="showID" type="text" id="showID"></td>
	</tr>
	<tr>
	<td width="100">seat no.</td>
	<td><input name="seatNo" type="text" id="seatNo"></td>
	</tr>
	<tr>
	<td width="100">price</td>
	<td><input name="price" type="text" id="price"></td>
	</tr>
	<tr>
	<td width="100">concession</td>
	<td><input name="concession" type="text" id="concession"></td>
	</tr>
	<tr>
	<td width="100">pay now</td>
	<td><input name="paid" type="text" id="paid"></td>
	</tr>
	<tr>
	<td width="100"></td>
	<td>
	<input name="add" class="btn btn-info btn-block span2" type="submit" id="add" value="Book">
	</td>
	</tr>
	</table>
	</form>

</div>
=======
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
				<label>Movie Title</label> <input type="text" id="title" name="title" class="span3"/><br>
				<label>Cinema</label> <input type="text" id="cinema" name="cinema" class="span3"/><br>
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
			<th>Seat No</th>
			<th>Price</th>
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
>>>>>>> 3691ee7c8b6d2af33b4956aedcdb3a3cc61e0cfd
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$('.cb').mousedown(function() {
    if (!$(this).is(':checked')) {
        this.checked = confirm("Are you sure?");
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