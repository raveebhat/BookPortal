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
	
	if($response->body->GetAttributesResult->Attribute) {
		$uname = $response->body->GetAttributesResult->Attribute[0]->Value;

                $utype=  $response->body->GetAttributesResult->Attribute[1]->Value;
                var_dump($utype);
		if(md5($pass) == $response->body->GetAttributesResult->Attribute[2]->Value) {
                    session_destroy();
                    session_start();
                    $_SESSION['auth']=1;
                    $_SESSION['uname']=(string)$uname;
                      $_SESSION['utype']=(string)$utype;
                      $_SESSION['email']=$email;
                      if((string)$utype=="2")
                	header("Location:index.php");
                       if((string)$utype=="1")
                          header("Location:author.php");
                       else
                           header("Location:admin.php");

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