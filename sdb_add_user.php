<?php
	require_once './sdk.class.php';
	error_reporting(-1);
	ini_set('display_errors', true);
	header("Content-type: text/html; charset=utf-8");

	$sdb = new AmazonSDB();
	$domain = 'authors';
	$uname = $_POST["name"];
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	$type = ($_POST["type"] == "Reader" ? 2 : 1);//reader->2 author->1
	if($uname && $email && $pass) {
		$response = $sdb->get_attributes($domain, $email);
		if($response->body->GetAttributesResult->Attribute) {
			echo("already registered");
		} else {
			$response = $sdb->put_attributes($domain,$email,array(
				'name' => $uname,
				'password' => md5($pass),
				'type'  => $type,
			));
			if($response->isOK()) {
				session_start();
                            $_SESSION['ucmsg']="User created.";
    
			} else {
				session_start();
                            $_SESSION['uemsg']="User creation failed.";
   
			}
                         header('Location:admin.php');
		}
	}
?>