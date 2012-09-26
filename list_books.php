<?php 
require_once './sdk.class.php';
error_reporting(-1);
ini_set('display_errors', true);
header("Content-type: text/html; charset=utf-8");

$domain = 'books-aalr';
$sdb = new AmazonSDB();
$query = "SELECT * FROM `{$domain}`";
$results = $sdb->select($query);
foreach($results->body->Item() as $result) {
	echo($result->Attribute[1]->Value."<br/>");
	
}