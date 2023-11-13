<?php
    require_once("./db2.php");

    $identification = $_POST['identification'];
    $inputData = urldecode($_POST['inputData']);
	$address = urldecode($_POST['address']);
	$host_href = 'http://'.$_SERVER['HTTP_HOST'].'/' ;

    $result = query("DELETE FROM search_road_book WHERE identification = '$identification' AND address = '$address' AND host_href = '$host_href'");
?>