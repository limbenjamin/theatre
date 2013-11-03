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
                    <a class="brand" href="./index.php">
                    <span><i class="fa-icon-star"></i> Popcorn</span></a>
                     <div id="main-nav" class="scroller-spy">
                        <nav>
                          <ul class="nav pull-right" id="nav">
                            <li><a href="./register.php">Register</a> </li>
                            <li><a href="./login.php">Login</a> </li>
                          </ul>
                        </nav>
                      </div>          
                </div>
              </div>
            </div>
        </div>    
    </header>
<section>
<div class="panel first">
    <div class="container">
        <div class="row">
            <div class="span5">
                <header class="page-header">
                    <h3>Proccessing...</h3>             
                </header>    	
					<?php
					if(isset($_POST['add']))
					{
						$dbhost = 'localhost';
						$dbuser = 'webuser';
						$dbpass = 'j8ldl971';
						$conn = mysql_connect($dbhost, $dbuser, $dbpass);
						if(! $conn )
						{
						  die('Could not connect: ' . mysql_error());
						}


							$customerName = ($_POST['customerName']);
							$email = $_POST['email'];
							$password = $_POST['password'];
							$phone = $_POST['phone'];


						$sql = "INSERT INTO `theatre`.`customer` (`cID`, `cName`, `email`, `cPw`, `phone`) VALUES (null, '$customerName', '$email', '$password', '$phone');";

						
						$retval = mysql_query( $sql, $conn );
						if(! $retval )
						{
						  die('Could not enter data: ' . mysql_error());
						}
						echo "<h3>Congrats, $customerName</h3>";
						echo "<h3>You are successfully registered!</h3>";
						mysql_close($conn);
						}
					else
					{
					}
				    header("Location: index.php");
					die();
					?>
                </div>
            </div>      
        </div>
    </div>
</div>
</section>
<footer class="footer">
  <div class="container">
    <h5 align="center">Copyright &copy; 2013. CS2102 Group 42.</h5>
  </div>
</footer>
</body>
</html>