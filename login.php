<html>
<head>
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
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
<br />
<section>
<div class="panel first">
    <div class="container">
        <div class="row">
            <div class="span4">
                <header class="page-header">
                    <h3>Login</h3>             
                </header>
                <div class="well">
    				<form method="post" action="check_customer.php">
    				<table class="table-condensed">
    				<tr>
    				<td width="100">email</td>
    				<td><input required name="email" type="email" id="email"></td>
    				</tr>
    				<tr>
    				<td width="100">password</td>
    				<td><input required name="password" type="password" id="password"></td>
    				</tr>
    				<tr>
    				<td width="100"></td>
    				<td><input name="check" class="btn btn-info btn-block span2" type="submit" id="check" value="Login"></td>
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