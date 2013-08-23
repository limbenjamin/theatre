<html>
<head>
<style>
table, th, td
{
border: 1px solid black;
}

</style>    
</head>
</body>
<?php

$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db = "theatre";


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
echo "Movies";
echo "<table><td>movie_id</td><td>Title</td><td>Genre</td><td>Rating</td>";
while ($row = mysql_fetch_row($rs)) {
    {
    
    echo "<tr>";
    echo "<td> $row[0] </td>";
    echo "<td> $row[1] </td>";
    echo "<td> $row[2] </td>";
    echo "<td> $row[3] </td>";
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
echo "<br /><br /> Shows";
echo "<table><td>show_id</td><td>movie_id</td><td>Start</td><td>End</td><td>Hall no.</td>";
while ($row = mysql_fetch_row($rs)) {
    {
    
    echo "<tr>";
    echo "<td> $row[0] </td>";
    echo "<td> $row[1] </td>";
    echo "<td> $row[2] </td>";
    echo "<td> $row[3] </td>";
    echo "<td> $row[4] </td>";
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
echo "<br /><br /> Tickets";
echo "<table><td>ticket_id</td><td>price</td><td>show_id</td><td>seat_no</td>";
while ($row = mysql_fetch_row($rs)) {
    {
    
    echo "<tr>";
    echo "<td> $row[0] </td>";
    echo "<td> $row[1] </td>";
    echo "<td> $row[2] </td>";
    echo "<td> $row[3] </td>";
    echo "</tr>";
    }
}
echo "</table>";
echo "</div>";

mysql_close();

?><br />
<div style="display:inline;float:right">
<form method="post" action="add_movie.php">
<table width="400" border="0" cellspacing="1" cellpadding="2">
<tr>
<td width="100">Movie Name</td>
<td><input name="movie_name" type="text" id="movie_name"></td>
</tr>
<tr>
<td width="100">Genre</td>
<td><input name="genre" type="text" id="genre"></td>
</tr>
<tr>
<td width="100">Rating</td>
<td><input name="rating" type="text" id="rating"></td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="add" type="submit" id="add" value="Add Movie">
</td>
</tr>
</table>
</form>
<br />


<form method="post" action="add_ticket.php">
<table width="400" border="0" cellspacing="1" cellpadding="2">
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
<td width="100"> </td>
<td>
<input name="add" type="submit" id="add" value="Add Ticket">
</td>
</tr>
</table>
</form>

<form method="post" action="add_show.php">
<table width="400" border="0" cellspacing="1" cellpadding="2">
<tr>
<td width="100">movie id</td>
<td><input name="movie_id" type="text" id="movie_id"></td>
</tr>
<tr>
<td width="100">start time</td>
<td><input name="start_time" type="text" id="start_time"></td>
</tr>
<tr>
<td width="100">end time</td>
<td><input name="end_time" type="text" id="end_time"></td>
</tr>
<tr>
<td width="100">hall</td>
<td><input name="hall" type="text" id="hall"> </td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="add" type="submit" id="add" value="Add Show">
</td>
</tr>
</table>
</form>
</div>

</body>
</html>