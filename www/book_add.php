<?php
    require_once("./db2.php");

    $identification = $_POST['identification'];
    $inputData = urldecode($_POST['inputData']);
	$address = urldecode($_POST['address']);
	$host_href = 'http://'.$_SERVER['HTTP_HOST'].'/' ;

    $result = query("INSERT INTO search_road_book (identification, inputData, address, host_href) VALUES ('{$identification}', '{$inputData}', '{$address}','{$host_href}')");

?>