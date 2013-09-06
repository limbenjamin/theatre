<html>
<head>
<link href="assets/bootstrap.css" rel="stylesheet">
</head>
</body>
<?php

$host = "localhost"; 
$user = "webuser";
$pass = ""; 
$db = "theatre2";

$r = mysql_connect($host, $user, $pass);

if (!$r) {
    echo "Could not connect to server\n";
    trigger_error(mysql_error(), E_USER_ERROR);
} else {
}

$r2 = mysql_select_db($db);
if (!$r2) {
    echo "Cannot select database\n";
    trigger_error(mysql_error(), E_USER_ERROR); 
} else {
}

$query = "SELECT * FROM `movie`";
$rs = mysql_query($query);
if (!$rs) {
    echo "Could not execute query: $query";
    trigger_error(mysql_error(), E_USER_ERROR); 
} else {
} 
echo '<div style="display:inline;float:left;">';
echo "<h4>Movies</h4>";
echo "<table><td>movieID</td><td>movieName</td><td>year</td><td>genre</td><td>studio</td><td>director</td><td>rating</td>";
while ($row = mysql_fetch_row($rs)) {
    {
    echo "<tr>";
    echo "<td> $row[0] </td>";
    echo "<td> $row[1] </td>";
    echo "<td> $row[2] </td>";
    echo "<td> $row[3] </td>";
    echo "<td> $row[4] </td>";
    echo "<td> $row[5] </td>";
    echo "<td> $row[6] </td>";
    echo "</tr>";
    }
}
echo "</table>";
$query_shows = "SELECT * FROM `shows`";
$rs = mysql_query($query_shows);
if (!$rs) {
    echo "Could not execute query: $query";
    trigger_error(mysql_error(), E_USER_ERROR); 
} else {
} 
echo "<br /><br /><h4>Shows</h4>";
echo "<table><td>showID</td><td>movieID</td><td>hallID</td><td>duration</td><td>startTime</td><td>endTime</td>";
while ($row = mysql_fetch_row($rs)) {
    {
    
    echo "<tr>";
    echo "<td> $row[0] </td>";
    echo "<td> $row[1] </td>";
    echo "<td> $row[2] </td>";
    echo "<td> $row[3] </td>";
    echo "<td> $row[4] </td>";
    echo "<td> $row[5] </td>";
    echo "</tr>";
    }
}
echo "</table>";
$query_shows = "SELECT * FROM `hall`";
$rs = mysql_query($query_shows);
if (!$rs) {
    echo "Could not execute query: $query";
    trigger_error(mysql_error(), E_USER_ERROR); 
} else {
} 
echo "<br /><br /><h4>Halls</h4>";
echo "<table><td>hallID</td><td>cinemaID</td><td>capacity</td>";
while ($row = mysql_fetch_row($rs)) {
    {
    echo "<tr>";
    echo "<td> $row[0] </td>";
    echo "<td> $row[1] </td>";
    echo "<td> $row[2] </td>";
    echo "</tr>";
    }
}
echo "</table>";
$query_ticket = "SELECT * FROM `ticket`";
$rs = mysql_query($query_ticket);
if (!$rs) {
    echo "Could not execute query: $query";
    trigger_error(mysql_error(), E_USER_ERROR); 
} else {
} 
echo "<br /><br /><h4>Tickets</h4>";
echo "<table><td>ticketID</td><td>customerID</td><td>showID</td><td>seatNo</td><td>price</td><td>concession</td><td>paid</td><td>bookDateTime</td><td>paidDateTime</td>";
while ($row = mysql_fetch_row($rs)) {
    {
    
    echo "<tr>";
    echo "<td> $row[0] </td>";
    echo "<td> $row[1] </td>";
    echo "<td> $row[2] </td>";
    echo "<td> $row[3] </td>";
    echo "<td> $row[4] </td>";
    echo "<td> $row[5] </td>";
    echo "<td> $row[6] </td>";
    echo "<td> $row[7] </td>";
    echo "<td> $row[8] </td>";
    echo "<td> $row[9] </td>";
    echo "</tr>";
    }
}
echo "</table>";
echo "</div>";

mysql_close();

?><br/>
<div style="display:inline;float:right">
<form method="post" action="add_movie.php">
<table class="table-condensed">
<tr>
<td width="100">MovieID</td>
<td><input name="movieID" type="text" id="movieID"></td>
</tr>
<tr>
<td width="100">movieName</td>
<td><input name="movieName" type="text" id="movieName"></td>
</tr>
<tr>
<td width="100">year</td>
<td><input name="year" type="text" id="year"></td>
</tr>
<tr>
<td width="100">genre</td>
<td><input name="genre" type="text" id="genre"></td>
</tr>
<tr>
<td width="100">studio</td>
<td><input name="studio" type="text" id="studio"></td>
</tr>
<tr>
<td width="100">director</td>
<td><input name="director" type="text" id="director"></td>
</tr>
<tr>
<td width="100">rating</td>
<td><input name="rating" type="text" id="rating"></td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="add" class="btn btn-info btn-block" type="submit" id="add" value="Add Movie">
</td>
</tr>
</table>
</form>
<br />

<form method="post" action="add_hall.php">
<table class="table-condensed">
<tr>
<td width="100">hallID</td>
<td><input name="hallID" type="text" id="hallID"></td>
</tr>
<tr>
<td width="100">cinemaID</td>
<td><input name="cinemaID" type="text" id="cinemaID"></td>
</tr>
<tr>
<td width="100">capacity</td>
<td><input name="capacity" type="text" id="capacity"></td>
</tr>
<tr>
<td width="100"></td>
<td>
<input name="add" class="btn btn-info btn-block span2" type="submit" id="add" value="Add Hall">
</td>
</tr>
</table>
</form>


<form method="post" action="add_show.php">
<table class="table-condensed">
<tr>
<td width="100">showID</td>
<td><input name="showID" type="text" id="showID"></td>
</tr>
<tr>
<td width="100">movieID</td>
<td><input name="movieID" type="text" id="movieID"></td>
</tr>
<tr>
<td width="100">hallID</td>
<td><input name="hallID" type="text" id="hallID"></td>
</tr>
<tr>
<td width="100">duration</td>
<td><input name="duration" type="text" id="duration"> </td>
</tr>
<tr>
<td width="100">startTime</td>
<td><input name="startTime" type="text" id="startTime"> </td>
</tr>
<tr>
<td width="100">endTime</td>
<td><input name="endTime" type="text" id="endTime"> </td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="add" class="btn btn-info btn-block" type="submit" id="add" value="Add Show">
</td>
</tr>
</table>
</form>


<form method="post" action="add_ticket.php">
<table class="table-condensed">
<tr>
<td width="100">Price</td>
<td><input name="price" type="text" id="price"></td>
</tr>
<tr>
<td width="100">Show id</td>
<td><input name="show_id" type="text" id="show_id"></td>
</tr>
<tr>
<td width="100">Seat no.</td>
<td><input name="seat_no" type="text" id="seat_no"></td>
</tr>
<tr>
<td width="100"></td>
<td>
<input name="add" class="btn btn-info btn-block span2" type="submit" id="add" value="Add Ticket">
</td>
</tr>
</table>
</form>




</div>


</body>
</html>