<?php
if(isset($_POST['check']))
	{
	$email = $_POST['email'];
	$password = $_POST['password'];
	$db = new PDO('mysql:host=localhost;dbname=theatre;charset=utf8', 'root', 'dbpassword');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	try {
	    $sth = $db->prepare("SELECT cID FROM customer WHERE email= :email AND cPw= :pw ");
		$sth->bindValue(':email', $email);
		$sth->bindValue(':pw', $password);
		$sth->execute();
		while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
	    	$cid = $row['cID'];
		}
	} catch(Exception $ex) {
	    echo $ex;
	}

	if(is_null($cid)){
		echo "Invalid user or password";
	}
	else{
		header("Location: dash.php?id=".$cid);
	}


	}
else
{
}
die();
?>