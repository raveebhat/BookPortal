<?php 
require_once './sdk.class.php';
error_reporting(-1);
ini_set('display_errors', true);
header("Content-type: text/html; charset=utf-8");

$sdb = new AmazonSDB();
$domain = 'authors';
//$authors_domain = $sdb->create_domain($domain);
	/*$add_authors = $sdb->batch_put_attributes($domain, array(
		'baf@tmh.com' => array(
				'name' => 'Behrouz A Forouzan',
				'password' => '1a1dc91c907325c69271ddf0c944bc72', //MD5 of 'pass'
				'type' => '1',
			),
		'dmr@phi.com' => array(
				'name' => 'Dennis M. Ritchie',
				'password' => '1a1dc91c907325c69271ddf0c944bc72', //MD5 of 'pass'
				'type' => '1',
		),
		));*/
	$sdb->delete_attributes($domain,"author_2",array(
		array('Name' => 'name'),
		array('Name' => 'password')
		));
	$query = "SELECT name,password FROM `{$domain}`";
	$results = $sdb->select($query);
	$authors = $results->body->Item();
	foreach($authors as $author) {
		echo($author->Attribute[0]->Value);echo("</br>");
	}
?>
