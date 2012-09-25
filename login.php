<?php 
	require_once './sdk.class.php';
	error_reporting(-1);
	ini_set('display_errors', true);
	header("Content-type: text/html; charset=utf-8");

	$sdb = new AmazonSDB();
	$domain = 'authors';
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	$response = $sdb->get_attributes($domain, $email, array('name','password'));
	if($response->body->GetAttributesResult->Attribute) {
		$uname = $response->body->GetAttributesResult->Attribute[0]->Value;
		if(md5($pass) == $response->body->GetAttributesResult->Attribute[1]->Value) {
			echo("Welcome ".$uname);
		} else {
			echo("Login Failed".$response->body->GetAttributesResult->Attribute[1]->Value);
		}
	} else {
		echo("Not Registered");
	}
 ?>