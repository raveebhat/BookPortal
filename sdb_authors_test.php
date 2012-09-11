<?php 
require_once './sdk.class.php';
error_reporting(-1);
ini_set('display_errors', true);
header("Content-type: text/html; charset=utf-8");

$sdb = new AmazonSDB();
$domain = 'authors';
$authors_domain = $sdb->create_domain($domain);
if($authors_domain->isOK()) {
	/*$add_authors = $sdb->batch_put_attributes($domain, array(
		'author_1' => array(
				'name' => 'Behrouz A Forouzan',
				'password' => '1a1dc91c907325c69271ddf0c944bc72' 
			),
		'author_2' => array(
				'name' => 'Dennis M. Ritchie',
				'password' => '1a1dc91c907325c69271ddf0c944bc72' 
		),
		));*/
	/*if($add_authors->isOK()) {
		echo("Added Authors");*/
	$query = "SELECT name FROM `{$domain}`";
	$results = $sdb->select($query);
	$authors = $results->body->Item();
	foreach($authors as $author) {
		echo($author->Attribute->Value);echo("</br>");
	}
}
?>
