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
            <li><a class="sideactive" href="./adminmovie.php"><i class="fa-icon-film"></i> Movies</a></li><br/>
            <li><a class="sidenavlink" href="./adminshow.php"><i class="fa-icon-magic"></i> Shows</a></li><br/>
            <li><a class="sidenavlink" href="./adminticket.php"><i class="fa-icon-money"></i> Tickets</a></li><br/>
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

    $query = "SELECT * FROM `movie`";
    $rs = mysql_query($query);
    if (!$rs) {
        echo "Could not execute query: $query";
        trigger_error(mysql_error(), E_USER_ERROR); 
    } else {
    } 
    echo '<div class="span8">';
    echo "<h3 class='folio-title'><span class='main-color'><i class='fa-icon-film'></i> All Movies</span></h3>";
    echo "<table class='table'><tr>
    <th>Movie ID</th>
    <th>Title</th>
    <th>Year</th>
    <th>Genre</th>
    <th>Studio</th>
    <th>Director</th>
    <th>Rating</th>
    <th>Update</th></tr>";
    while ($row = mysql_fetch_row($rs)) {
        {
        echo "<tr>";
        echo "<td> $row[0] </td>";
        echo "<td> $row[1] </td>";
        $year = substr($row[2], 0, 4);
        echo "<td> $year </td>";
        echo "<td> $row[3] </td>";
        echo "<td> $row[4] </td>";
        echo "<td> $row[5] </td>";
        echo "<td> $row[6] </td>";
        echo '<td> <input type="checkbox" value='.$row[0].' id="movie" class="cb"> </td>';
        echo "</tr>";
        }
    }
    echo "</table>";
    echo "</div>";

    mysql_close();

    ?><br/>
            <div class="span4">
            <h3 class="folio-title"><span class="main-color"><i class="fa-icon-plus-sign"></i> Add a New Movie</span></h3>
            <form method="post" action="add_movie.php" >
            <table class="formtable">
            <tr>
            <td width="100">Movie Title</td>
            <td><input required name="movieName" type="text" id="movieName"></td>
            </tr>
            <tr>
            <td width="100">Year</td>
            <td><input required name="year" type="text" id="year"></td>
            </tr>
            <tr>
            <td width="100">Genre</td>
            <td><input required name="genre" type="text" id="genre"></td>
            </tr>
            <tr>
            <td width="100">Studio</td>
            <td><input required name="studio" type="text" id="studio"></td>
            </tr>
            <tr>
            <td width="100">Director</td>
            <td><input required name="director" type="text" id="director"></td>
            </tr>
            <tr>
            <td width="100">Rating</td>
            <td><input required name="rating" type="text" id="rating"></td>
            </tr>
            <tr>
            <td width="100"> </td>
            <td>
            <input name="add" class="pull-right btn btn-success" type="submit" id="add" value="Add Movie">
            </td>
            </tr>
            </table>
            </form><br/>
            <h3 class="folio-title"><span class="main-color"><i class="fa-icon-minus-sign"></i> Remove a Movie</span></h3>
            <form method="post" action="delete_any.php" onsubmit="return confirm('Are you sure?')">
            <table class="formtable">
            <tr>
            <td width="100">Movie ID</td>
            <td><input name="id" type="number" min="2001" id="id"></td>
            </tr>
            <tr>
            <td></td>
            <td>
            <input name="add" class="pull-right btn btn-danger" type="submit" id="del" value="Remove Movie">
            </td>
            </tr>
            </table>
            </form>          
        </div>
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