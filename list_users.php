<?php 
require_once './sdk.class.php';
error_reporting(-1);
ini_set('display_errors', true);
header("Content-type: text/html; charset=utf-8");

$domain = 'authors';
$sdb = new AmazonSDB();
$query = "SELECT name FROM `{$domain}`";
$results = $sdb->select($query);
//var_dump($results->body);
foreach($results->body->Item() as $result) {
	echo($result->Attribute->Value."&nbsp;");
	echo('<input type="button" value="'.$result->Name.'">Delete User</input><br/>');
}