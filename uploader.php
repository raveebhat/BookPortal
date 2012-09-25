<?php
require_once './sdk.class.php';


$s3 = new AmazonS3();
$bucket = 'book-bucket-' . strtolower($s3->key);


 $response = $s3->create_object($bucket,  $_FILES['uploadedfile']['name'], array(
    'fileUpload' => $_FILES['uploadedfile']['tmp_name'],
     'storage' => AmazonS3::STORAGE_REDUCED,
     'acl' => AmazonS3::ACL_PUBLIC,
     'meta' => array(
        'title'         => $_POST['title'],    // x-amz-meta-word
        
    ),
));


var_dump($_FILES);
var_dump($response);



?>
