<?php 
	require_once './sdk.class.php';
	error_reporting(-1);
	ini_set('display_errors', true);
	header("Content-type: text/html; charset=utf-8");

	$sdb = new AmazonSDB();
	$domain = 'authors';
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	$response = $sdb->get_attributes($domain, $email, array('name','password','type'));
	var_dump($response);
	if($response->body->GetAttributesResult->Attribute) {
		$uname = $response->body->GetAttributesResult->Attribute[0]->Value;

                $utype=  $response->body->GetAttributesResult->Attribute[1]->Value;
		if(md5($pass) == $response->body->GetAttributesResult->Attribute[2]->Value) {
                    session_destroy();
                    session_start();
                    $_SESSION['auth']=1;
                    $_SESSION['uname']=(string)$uname;
                    $_SESSION['utype']=$utype;
                    
                     header("Location:index.php");
                //        var_dump($_SESSION);
		} else {
                        session_start();
                        $_SESSION['msg']="The username or password you entered is incorrect.";
			header("Location:index.php");
		}
	} else {
		session_start();
                $_SESSION['msg']="Unregistered User,Please register";
		header("Location:index.php");
	}
 ?>