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
            <div class="span4">
                <header class="page-header">
                    <h3>Register</h3>             
                </header>
                <div class="well">
        					<form method="post" action="add_customer_client.php">
        					<table class="table-condensed">
        					<tr>
        					<td width="100">Name:</td>
        					<td><input name="customerName" required type="text" id="customerName"></td>
        					</tr>
        					<tr>
        					<td width="100">Email:</td>
        					<td><input name="email" required type="email" id="email"></td>
        					</tr>
        					<tr>
        					<td width="100">Password:</td>
        					<td><input name="password" required type="password" id="password"></td>
        					</tr>
        					<tr>
        					<td width="100">Phone</td>
        					<td><input name="phone" required type="text" id="phone"></td>
        					</tr>
        					<tr>
        					<td width="100"></td>
        					<td>
        					<input name="add" class="btn btn-info btn-block span2" type="submit" id="add" value="Register">
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
<footer class="footer">
  <div class="container">
    <h5 align="center">Copyright &copy; 2013. CS2102 Group 42.</h5>
  </div>
</footer>
</body>
</html>