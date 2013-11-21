<html>
<head>
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
<div class="container">
    <div class="row">
        <div class="span2">
          <ul class="navbar-nav sidenav-left">
            <li><a class="sidenavlink" href="./admin.php"><i class="fa-icon-home"></i> Home</a></li><br/>
            <li><a class="sidenavlink" href="./adminmovie.php"><i class="fa-icon-film"></i> Movies</a></li><br/>
            <li><a class="sidenavlink" href="./adminshow.php"><i class="fa-icon-magic"></i> Shows</a></li><br/>
            <li><a class="sideactive" href="./adminticket.php"><i class="fa-icon-money"></i> Tickets</a></li><br/>
            <li><a class="sidenavlink" href="./admincustomer.php"><i class="fa-icon-user"></i> Customers</a></li><br/>
            <li><a class="sidenavlink" href="./adminsales.php"><i class="fa-icon-star"></i> Sales Reports</a></li><br/>
            <li><a class="sidenavlink" href="./admincinema.php"><i class="fa-icon-building"></i> Cinemas</a></li>
          </ul>
        </div>
    <div class="span6">
    <br/>
    <?php

    $host = "localhost"; 
    $user = "root";
    $pass = ""; 
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

    $query = "SELECT * FROM `ticket`";
    $rs = mysql_query($query);
    if (!$rs) {
        echo "Could not execute query: $query";
        trigger_error(mysql_error(), E_USER_ERROR); 
    } else {
    } 
    echo '<div class="span10">';
    echo "<h3 class='folio-title'><span class='main-color'><i class='fa-icon-money'></i> Booked Tickets</span></h3>";
    echo "<table class='table'><tr>
    <th>Ticket ID</th>
    <th>CustomerID</th>
    <th>Show ID</th>
    <th>Seat No</th>
    <th>Price</th>
    <th>Concession</th>
    <th>Payment Status</th>
    <th>Booking Date</th>
    <th>Payment Date</th>
    <th>Update</th>
    </tr>";
    while ($row = mysql_fetch_row($rs)) {
        {
        echo "<tr>";
        echo "<td> $row[0] </td>";
        echo "<td> $row[1] </td>";
        echo "<td> $row[2] </td>";
        echo "<td> $row[3] </td>";
        echo "<td> $row[4] </td>";
        echo "<td> $row[5] </td>";
        $paid = $row[6];
        if ($paid == 1){
            echo "<td><span style='color: green'>Yes</span></td>";
        }
        else{
             echo "<td><span style='color: red'>No</span></td>";
        }
        echo "<td> $row[7] </td>";
        echo "<td> $row[8] </td>";
        echo '<td> <input type="checkbox" value='.$row[0].' id="ticket" class="cb"> </td>';
        echo "</tr>";
        }
    }
    echo "</table>";
    echo "</div>";

    mysql_close();

    ?><br/>
    </div>
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
        $id = this.id;
        $value = this.value;
        window.location.href = "./update_admin.php?value="+$value+"&id="+$id;
    }
});
</script>
</body>
</html>