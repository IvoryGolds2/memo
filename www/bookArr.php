<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include './db2.php';

session_start();
$id = $_SESSION['identification']; //$_POST['id;]
$host_href = 'http://'.$_SERVER['HTTP_HOST'].'/' ;
$book = query("SELECT * FROM search_road_book WHERE identification = '$id' AND host_href = '$host_href'");
$bookArr = $book -> fetch_all(MYSQLI_ASSOC);
echo json_encode($bookArr);

?>