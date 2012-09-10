<?php
require_once './sdk.class.php';
// Instantiate the class
$s3 = new AmazonS3();
$bucket = 'book-bucket-' . strtolower($s3->key);
 
function createBucket(){
    global $s3,$bucket;
    $response = $s3->create_bucket($bucket, AmazonS3::REGION_US_STANDARD);
 // Success?
var_dump($response->isOK());
    
}
function upload(){
    global $s3,$bucket;
    $response = $s3->create_object($bucket, 'sdb-dg.pdf', array(
    'fileUpload' => 'sdb-dg.pdf',
    
    'storage' => AmazonS3::STORAGE_REDUCED
));
 
// Success?
var_dump($response->isOK());
}
createBucket();
upload();
?>
