<?php
require_once './sdk.class.php';


$s3 = new AmazonS3();
$bucket = 'book-bucket-' . strtolower($s3->key);


 $response1 = $s3->create_object($bucket,  $_FILES['uploadedfile']['name'], array(
    'fileUpload' => $_FILES['uploadedfile']['tmp_name'],
     //'contentType' => 'application/pdf',
     //'storage' => AmazonS3::STORAGE_REDUCED,
     'acl' => AmazonS3::ACL_PUBLIC,
     'meta' => array(
        'title'         => $_POST['title'],    // x-amz-meta-word
        
    ),
));
 session_start();
 $author=$_SESSION['email'];
 $book= $_POST['title'];
$key = $author.'/'.$book;
    $domain = 'books-aalr';
    $sdb = new AmazonSDB();

    
$response2 = $sdb->put_attributes($domain,$key,array(
                'author' =>$author,
                'title' =>$book,
            ));


//var_dump($_FILES);
//var_dump($response);
//var_dump($response->body)
if($response1->isOK()&&$response2->isOK()   ){
    session_start();
    $_SESSION['upmsg']="Upload successful";
    header('Location:author.php');
}
else{
    session_start();
    $_SESSION['upemsg']="Upload failed";
    header('Location:author.php');
}



?>
