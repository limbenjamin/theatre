<html>
<head>
<link href="assets/bootstrap.css" rel="stylesheet">
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
<section>
<div class="container">
<div class="span4">           
<?php

	$db = new PDO('mysql:host=localhost;dbname=theatre;charset=utf8', 'root', 'dbpassword');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      date_default_timezone_set('Asia/Singapore');

	$action = ($_GET["id"]);
	$value = ($_GET["value"]);

	try{
		if ($value < 1000){
			$sth = $db->prepare("SELECT * FROM cinema WHERE cinemaID=:value");
			$sth->bindValue(':value', $value);
			$sth->execute();
			while($row = $sth->fetch(PDO::FETCH_BOTH)) {
?>
				
	    		<form method="post" action="add_cinema.php">
	            <table class="formtable">
	            <tr>
	            <td width="100">cinemaID</td>
	            <td><input name="cinemaID" type="text" id="cinemaID" value=<?php echo $value; ?> readonly></td>
	            </tr>
	            <tr>
	            <td width="100">cinemaName</td>
	            <td><input name="cinemaName" type="text" id="cinemaName" value=<?php echo $row[1]; ?>></td>
	            </tr>
	            <tr>
	            <td width="100">address</td>
	            <td><input name="address" type="text" id="address" value=<?php echo $row[2]; ?>></td>
	            </tr>
	            <tr>
	            <td width="100">telNo</td>
	            <td><input name="telNo" type="text" id="telNo" value=<?php echo $row[3]; ?>></td>
	            </tr>
	            <tr>
	            <td width="100"></td>
	            <td>
	            <input name="add" class="pull-right btn btn-info" type="submit" id="add" value="Update Cinema">
	            </td>
	            </tr>
	            </table>
	            </form>
<?php       }
		}
		else if ($value < 2000){
			$sth = $db->prepare("SELECT * FROM hall WHERE hallID=:value");
			$sth->bindValue(':value', $value);
			$sth->execute();
			while($row = $sth->fetch(PDO::FETCH_BOTH)) {
?>
				
	    	<form method="post" action="add_hall.php">
            <table class="formtable">
            <tr>
            <td width="100">hallID</td>
            <td><input name="hallID" type="text" id="hallID" value=<?php echo $value; ?> readonly></td>
            </tr>
            <tr>
            <td width="100">cinemaID</td>
            <td><input name="cinemaID" type="text" id="cinemaID" value=<?php echo $row[1]; ?>></td>
            </tr>
            <tr>
            <td width="100">capacity</td>
            <td><input name="capacity" type="text" id="capacity" value=<?php echo $row[2]; ?>></td>
            </tr>
            <tr>
            <td width="100"></td>
            <td>
            <input name="add" class="pull-right btn btn-info" type="submit" id="add" value="Update Hall">
            </td>
            </tr>
            </table>
            </form>
<?php       }
		}
		else if ($value < 3000){
			$sth = $db->prepare("SELECT * FROM movie WHERE movieID=:value");
			$sth->bindValue(':value', $value);
			$sth->execute();
			while($row = $sth->fetch(PDO::FETCH_BOTH)) {
?>
				
	    	<form method="post" action="add_movie.php">
            <table class="formtable">
            <tr>
            <td width="100">movieID</td>
            <td><input name="movieID" type="text" id="movieID" value=<?php echo $value; ?> readonly></td>
            </tr>           
            <tr>
            <td width="100">movieName</td>
            <td><input name="movieName" type="text" id="movieName"value=<?php echo $row[1]; ?>></td>
            </tr>
            <tr>
            <td width="100">year</td>
            <td><input name="year" type="text" id="year"value=<?php echo $row[2]; ?>></td>
            </tr>
            <tr>
            <td width="100">genre</td>
            <td><input name="genre" type="text" id="genre"value=<?php echo $row[3]; ?>></td>
            </tr>
            <tr>
            <td width="100">studio</td>
            <td><input name="studio" type="text" id="studio"value=<?php echo $row[4]; ?>></td>
            </tr>
            <tr>
            <td width="100">director</td>
            <td><input name="director" type="text" id="director"value=<?php echo $row[5]; ?>></td>
            </tr>
            <tr>
            <td width="100">rating</td>
            <td><input name="rating" type="text" id="rating"value=<?php echo $row[6]; ?>></td>
            </tr>
            <tr>
            <td width="100"> </td>
            <td>
            <input name="add" class="pull-right btn btn-info" type="submit" id="add" value="Update Movie">
            </td>
            </tr>
            </table>
            </form>
<?php       }
		}
		else if ($value < 4000){
			$sth = $db->prepare("SELECT * FROM shows WHERE showID=:value");
			$sth->bindValue(':value', $value);
			$sth->execute();
			while($row = $sth->fetch(PDO::FETCH_BOTH)) {
?>
				
	    	<form method="post" action="add_show.php">
            <table class="formtable">
            <tr>
            <td width="100">showID</td>
            <td><input name="showID" type="text" id="showID" value=<?php echo $value; ?> readonly></td>
            </tr>            	
            <tr>
            <td width="100">movieID</td>
            <td><input name="movieID" type="text" id="movieID"value=<?php echo $row[1]; ?>></td>
            </tr>
            <tr>
            <td width="100">hallID</td>
            <td><input name="hallID" type="text" id="hallID"value=<?php echo $row[2]; ?>></td>
            </tr>
            <tr>
            <td width="100">duration</td>
            <td><input name="duration" type="text" id="duration"value=<?php echo $row[3]; ?>> </td>
            </tr>
            <tr>
            <td width="100">startTime</td>
            <td><input name="startTime" type="text" id="startTime"value="<?php echo($row[4]);  ?>"> </td>
            </tr>
            <tr>
            <td width="100">endTime</td>
            <td><input name="endTime" type="text" id="endTime"value="<?php echo $row[5]; ?>"> </td>
            </tr>
            <tr>
            <td width="100"> </td>
            <td>
            <input name="add" class="pull-right btn btn-info" type="submit" id="add" value="Update Show">
            </td>
            </tr>
            </table>
            </form>
<?php       }
		}
		else if ($value < 5000){
			$sth = $db->prepare("SELECT * FROM customer WHERE cID=:value");
			$sth->bindValue(':value', $value);
			$sth->execute();
			while($row = $sth->fetch(PDO::FETCH_BOTH)) {
?>
	    	<form method="post" action="add_customer.php">
            <table class="formtable">
            <tr>
            <tr>
            <td width="100">cID</td>
            <td><input name="cID" type="text" id="cID" value=<?php echo $value; ?> readonly></td>
            </tr>            	
            <td width="100">customerName</td>
            <td><input name="customerName" type="text" id="customerName" value=<?php echo $row[1]; ?>></td>
            </tr>
            <tr>
            <td width="100">email</td>
            <td><input name="email" type="text" id="email" value=<?php echo $row[2]; ?>></td>
            </tr>
            <tr>
            <td width="100">password</td>
            <td><input name="password" type="text" id="password" value=<?php echo $row[3]; ?>></td>
            </tr>
            <tr>
            <td width="100">phone</td>
            <td><input name="phone" type="text" id="phone" value=<?php echo $row[4]; ?>></td>
            </tr>
            <tr>
            <td width="100"></td>
            <td>
            <input name="add" class="pull-right btn btn-info" type="submit" id="add" value="Update Customer">
            </td>
            </tr>
            </table>
            </form>
<?php       }
		}
		else{
			$sth = $db->prepare("SELECT * FROM ticket WHERE ticketID=:value");
			$sth->bindValue(':value', $value);
			$sth->execute();
			while($row = $sth->fetch(PDO::FETCH_BOTH)) {
?>
				
	    	<form method="post" action="add_ticket.php">
            <table class="formtable">
            <tr>
            <tr>
            <td width="100">ticketID</td>
            <td><input name="ticketID" type="text" id="ticketID" value=<?php echo $value; ?> readonly></td>
            </tr>            	
            <td width="100">customerID</td>
            <td><input name="customerID" type="text" id="customerID"value=<?php echo $row[1]; ?>></td>
            </tr>
            <tr>
            <td width="100">showID</td>
            <td><input name="showID" type="text" id="showID"value=<?php echo $row[2]; ?>></td>
            </tr>
            <tr>
            <td width="100">seatNo</td>
            <td><input name="seatNo" type="text" id="seatNo"value=<?php echo $row[3]; ?>></td>
            </tr>
            <tr>
            <td width="100">price</td>
            <td><input name="price" type="text" id="price"value=<?php echo $row[4]; ?>></td>
            </tr>
            <tr>
            <td width="100">concession</td>
            <td><input name="concession" type="text" id="concession"value=<?php echo $row[5]; ?>></td>
            </tr>
            <tr>
            <td width="100">paid</td>
            <td><input name="paid" type="text" id="paid"value=<?php echo $row[6]; ?>></td>
            </tr>
            <tr>
            <td width="100"></td>
            <td>
            <input name="add" class="pull-right btn btn-info" type="submit" id="add" value="Update Ticket">
            </td>
            </tr>
            </table>
            </form>
<?php       }
		}
	
	} catch(Exception $ex) {
		    echo $ex;
	}


?>
</div>
</div>
</section>
</body>
</html>