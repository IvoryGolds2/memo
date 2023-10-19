<?php
	header('Content-Type: text/html; charset=utf-8');

	$host = 'localhost';
	$user = 'root';
	$pw = 'xptmxm12';
	$dbName = 'testhyewon4';
	$mysqli = new mysqli($host, $user, $pw, $dbName);
	$mysqli ->set_charset("utf8");
	
	function query($sql){
		global $mysqli;
		return $mysqli->query($sql);
	}

?>
