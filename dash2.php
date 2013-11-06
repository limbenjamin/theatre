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
if(isset($_POST['search']))
	{
	$title = $_POST['title'];
	$cinema = $_POST['cinema'];
	$date = $_POST['date'];
	$db = new PDO('mysql:host=localhost;dbname=theatre;charset=utf8', 'webuser', 'dbpassword');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$cid = ($_GET["id"]);
	try {
			if (empty($date)){
				$currdate = date("Y-m-d h:i:s");
				$sth = $db->prepare("SELECT * 
					FROM shows, movie, hall, cinema
					WHERE movieName LIKE '%$title%' 
					AND shows.movieID=movie.movieID
					AND shows.startTime BETWEEN :date0 AND '2014-12-31 23:59:00'
					AND shows.hallID=hall.hallID
					AND hall.cinemaID = cinema.cinemaID
					AND cinemaName LIKE '%$cinema%'");
				$sth->bindValue(':date0', $currdate);
				$sth->execute();
			}
			else{
					$date0 = $date . " 00:00:00";
					$date1 = $date . " 23:59:00";
					echo $date0;
					echo $date1;
					$sth = $db->prepare("SELECT * 
					FROM shows, movie, hall, cinema
					WHERE movieName LIKE '%$title%' 
					AND shows.movieID=movie.movieID
					AND shows.startTime BETWEEN :date0 AND :date1
					AND shows.hallID=hall.hallID
					AND hall.cinemaID = cinema.cinemaID
					AND cinemaName LIKE '%$cinema%'");
				$sth->bindValue(':date0', $date0);
				$sth->bindValue(':date1', $date1);
				$sth->execute();
			}
			echo "<br/><br/><h3>Search Results</h3>";
			echo "<table class='table table-striped'>
			<thead>
			<tr>
			<th>Show ID</th>
			<th>Movie Name</th>
			<th>Movie Rating</th>
			<th>Hall No.</th>
			<th>Cinema<th>
			<th>Duration(hr)</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th>Seats available</th>
			</tr>
			</thead>
			<tbody>";
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
					echo '<td><span class="rating">'.$row1[6].'</span></td>';
				}
				$hid = $row[2];
			    echo "<td> $hid </td>";
			    $sth2 = $db->prepare("SELECT cinemaName FROM cinema, hall WHERE hallID= :id2 AND hall.cinemaID = cinema.cinemaID");
				$sth2->bindValue(':id2', $hid);
				$sth2->execute();
				while($row2 = $sth2->fetch(PDO::FETCH_BOTH))  {
					echo "<td> $row2[0] </td>";
				}
				$cinemaName = $row2[0];
			    echo "<td> $cinemaName </td>";
			    echo "<td> $row[3] </td>";
			    echo '<td><span class="duration">'.$row[4].'</span></td>';
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
			echo "</tbody></table>";
		} catch(Exception $ex) {
		    echo $ex;
		}
	}

echo "</div>";
?>
<br/>
<div class="container">
	<h3>New Booking<h3>
	<?php echo'<form method="post" action="add_ticket_client.php?id='.$cid.'">'; ?>
	<table class="table-condensed">
	<tr>
	<td width="100">show no.</td>
	<td width="30"><input required name="showID" type="number" min="1" id="showID"></td>
	</tr>
	<tr>
	<td width="100">seat no.</td>
	<td width="30"><input required name="seatNo" type="number" min="1" id="seatNo"></td>
	</tr>
	<tr>
		<td width="100">Concession</td>
		<td><fieldset data-role="controlgroup">
           <label><input type="radio" class="required" name='concession' value='ADULT' id="adult" />  ADULT</label>
           <label><input type="radio" name='concession' value='CHILD' id="child" />  CHILD</label>
           <label><input type="radio" name='concession' value='ELDER' id="elderly" />  ELDERLY</label>
            </fieldset>
        </td>
    </tr>        
	<tr>
	<tr>
	<td width="100">pay now</td>
	<td><input name="paid" type="text" id="paid"></td>
	</tr>
	<tr>
	<td width="100"></td>
	<td>
	<input name="add" class="btn btn-info span2" type="submit" id="add" value="Book">
	</td>
	</tr>
	</table>
	</form>
</div>

</section>
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
<script>
function sortTable(table, col, reverse) {
    var tb = table.tBodies[0], // use `<tbody>` to ignore `<thead>` and `<tfoot>` rows
        tr = Array.prototype.slice.call(tb.rows, 0), // put rows into array
        i;
    reverse = -((+reverse) || -1);
    tr = tr.sort(function (a, b) { // sort rows
        return reverse // `-1 *` if want opposite order
            * (a.cells[col].textContent.trim() // using `.textContent.trim()` for test
                .localeCompare(b.cells[col].textContent.trim())
               );
    });
    for(i = 0; i < tr.length; ++i) tb.appendChild(tr[i]); // append each row in order
}

function makeSortable(table) {
    var th = table.tHead, i;
    th && (th = th.rows[0]) && (th = th.cells);
    if (th) i = th.length;
    else return; // if no `<thead>` then do nothing
    while (--i >= 0) (function (i) {
        var dir = 1;
        th[i].addEventListener('click', function () {sortTable(table, i, (dir = 1 - dir))});
    }(i));
}

function makeAllSortable(parent) {
    parent = parent || document.body;
    var t = parent.getElementsByTagName('table'), i = t.length;
    while (--i >= 0) makeSortable(t[i]);
}

window.onload = function () {makeAllSortable();};
</script>
</body>
</html>