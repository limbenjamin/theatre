<html>
<head>
<link href="assets/bootstrap.css" rel="stylesheet">
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php

$host = "localhost"; 
$user = "root";
$pass = "dbpassword"; 
$db = "theatre";
$sid = ($_GET["id"]); 
//if(is_null($sid))
//    header("Location: index.php");
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
echo "<table><td>movieID</td><td>movieName</td><td>year</td><td>genre</td><td>studio</td><td>director</td><td>rating</td><td>update</td>";
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
    echo '<td> <input type="checkbox" value='.$row[0].' id="movie" class="cb"> </td>';
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
echo "<table><td>showID</td><td>movieID</td><td>hallID</td><td>duration</td><td>startTime</td><td>endTime</td><td>update</td>";
while ($row = mysql_fetch_row($rs)) {
    {
    
    echo "<tr>";
    echo "<td> $row[0] </td>";
    echo "<td> $row[1] </td>";
    echo "<td> $row[2] </td>";
    echo "<td> $row[3] </td>";
    echo "<td> $row[4] </td>";
    echo "<td> $row[5] </td>";
    echo '<td> <input type="checkbox" value='.$row[0].' id="shows" class="cb"> </td>';
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
echo "<table><td>hallID</td><td>cinemaID</td><td>capacity</td><td>update</td>";
while ($row = mysql_fetch_row($rs)) {
    {
    echo "<tr>";
    echo "<td> $row[0] </td>";
    echo "<td> $row[1] </td>";
    echo "<td> $row[2] </td>";
    echo '<td> <input type="checkbox" value='.$row[0].' id="hall" class="cb"> </td>';
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
echo "<table><td>ticketID</td><td>customerID</td><td>showID</td><td>seatNo</td><td>price</td><td>concession</td><td>paid</td><td>bookDateTime</td><td>paidDateTime</td><td>update</td>";
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
    echo '<td> <input type="checkbox" value='.$row[0].' id="ticket" class="cb"> </td>';
    echo "</tr>";
    }
}
echo "</table>";
$query_ticket = "SELECT * FROM `cinema`";
$rs = mysql_query($query_ticket);
if (!$rs) {
    echo "Could not execute query: $query";
    trigger_error(mysql_error(), E_USER_ERROR); 
} else {
} 
echo "<br /><br /><h4>Cinemas</h4>";
echo "<table><td>cinemaID</td><td>cinemaName</td><td>address</td><td>telNo</td><td>update</td>";
while ($row = mysql_fetch_row($rs)) {
    {
    
    echo "<tr>";
    echo "<td> $row[0] </td>";
    echo "<td> $row[1] </td>";
    echo "<td> $row[2] </td>";
    echo "<td> $row[3] </td>";
    echo '<td> <input type="checkbox" value='.$row[0].' id="cinema" class="cb"> </td>';
    echo "</tr>";
    }
}
echo "</table>";


$query_ticket = "SELECT * FROM `customer`";
$rs = mysql_query($query_ticket);
if (!$rs) {
    echo "Could not execute query: $query";
    trigger_error(mysql_error(), E_USER_ERROR); 
} else {
} 
echo "<br /><br /><h4>Customer</h4>";
echo "<table><td>customerID</td><td>customerName</td><td>email</td><td>password</td><td>phone</td><td>update</td>";
while ($row = mysql_fetch_row($rs)) {
    {
    
    echo "<tr>";
    echo "<td> $row[0] </td>";
    echo "<td> $row[1] </td>";
    echo "<td> $row[2] </td>";
    echo "<td> $row[3] </td>";
    echo "<td> $row[4] </td>";
    echo '<td> <input type="checkbox" value='.$row[0].' id="customer" class="cb"> </td>';
    echo "</tr>";
    }
}
echo "</table>";


echo "</div>";

mysql_close();

?><br/>

            <!--

                    this whole block is for add forms 

                                                            -->
            <div style="display:inline;float:right">
            <form method="post" action="add_movie.php">
            <table class="table-condensed">
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
            <td width="100">customerID</td>
            <td><input name="customerID" type="text" id="customerID"></td>
            </tr>
            <tr>
            <td width="100">showID</td>
            <td><input name="showID" type="text" id="showID"></td>
            </tr>
            <tr>
            <td width="100">seatNo</td>
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
            <td width="100">paid</td>
            <td><input name="paid" type="text" id="paid"></td>
            </tr>
            <tr>
            <td width="100"></td>
            <td>
            <input name="add" class="btn btn-info btn-block span2" type="submit" id="add" value="Add Ticket">
            </td>
            </tr>
            </table>
            </form>

            <form method="post" action="add_cinema.php">
            <table class="table-condensed">
            <tr>
            <td width="100">cinemaName</td>
            <td><input name="cinemaName" type="text" id="cinemaName"></td>
            </tr>
            <tr>
            <td width="100">address</td>
            <td><input name="address" type="text" id="address"></td>
            </tr>
            <tr>
            <td width="100">telNo</td>
            <td><input name="telNo" type="text" id="telNo"></td>
            </tr>
            <tr>
            <td width="100"></td>
            <td>
            <input name="add" class="btn btn-info btn-block span2" type="submit" id="add" value="Add Cinema">
            </td>
            </tr>
            </table>
            </form>

            <form method="post" action="add_customer.php">
            <table class="table-condensed">
            <tr>
            <td width="100">customerName</td>
            <td><input name="customerName" type="text" id="customerName"></td>
            </tr>
            <tr>
            <td width="100">email</td>
            <td><input name="email" type="text" id="email"></td>
            </tr>
            <tr>
            <td width="100">password</td>
            <td><input name="password" type="text" id="password"></td>
            </tr>
            <tr>
            <td width="100">phone</td>
            <td><input name="phone" type="text" id="phone"></td>
            </tr>
            <tr>
            <td width="100"></td>
            <td>
            <input name="add" class="btn btn-info btn-block span2" type="submit" id="add" value="Add Customer">
            </td>
            </tr>
            </table>
            </form>

             <!--

                    delete form

                                                                    -->


            <form method="post" action="delete_any.php">
            <table class="table-condensed">
            <tr>
            <td width="100">ID</td>
            <td><input name="id" type="text" id="id"></td>
            </tr>
            <tr>
            <td width="100"></td>
            <td>
            <input name="add" class="btn btn-info btn-block span2" type="submit" id="del" value="Delete">
            </td>
            </tr>
            </table>
            </form>



</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$('.cb').mousedown(function() {
    if (!$(this).is(':checked')) {
        this.checked = confirm("Are you sure?");
        $(this).trigger("change");
        $id = this.id;
        $value = this.value;
        window.location.href = "./update_admin.php?value="+$value+"&id="+$id;
    }
});
</script>
</body>
</html>