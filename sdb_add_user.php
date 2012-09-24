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
	if($uname && $email && $pass) {
		$response = $sdb->get_attributes($domain, 'author_3');
		if($response->body->GetAttributesResult->Attribute) {
			echo("already registered");
		} else {
			$response = $sdb->put_attributes($domain,$email,array(
				'name' => $uname,
				'password' => md5($pass),
			));
			if($response->isOK()) {
				echo "User ".$uname." Registered Successfully";
			} else {
				echo "Registration Failed";
			}
		}

		//$results = $sdb->select($query);
		//$authors = $results->body->Item();
	}
?>
