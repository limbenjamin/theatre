<?php
if(isset($_POST['check']))
	{

	$user = $_POST['user'];
	$password = $_POST['password'];
	$db = new PDO('mysql:host=localhost;dbname=theatre;charset=utf8', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	try {
	    $sth = $db->prepare("SELECT sID FROM staff WHERE sName=:user AND sPw= :pw ");
		$sth->bindValue(':user', $user);
		$sth->bindValue(':pw', $password);
		$sth->execute();
		while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
	    	$sid = $row['sID'];
		}
	} catch(Exception $ex) {
	    echo $ex;
	}

	if(is_null($sid)){
		echo "Invalid user or password";
	}
	else{
		header("Location: admin.php?id=".$sid);
	}


	}
else
{
}
die();
?>