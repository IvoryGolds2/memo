<?php 
    require_once("./db2.php");
    
    $user = $_POST['user'];  
    $selectedImage = $_POST['selectedImage'];
    $from = $_POST['from'];
    $letter = $_POST['letter'];

    $sql = "INSERT INTO christmas_letter (username, from_name, letter, img) VALUES (?, ?, ?, ?)";
    $params = [$user, $from, $letter, $selectedImage];
    $result = query($sql, $params);

    if ($result) {
        // 쿼리가 성공한 경우
        $response = array('success' => true);
    } else {
        // 쿼리가 실패한 경우
        $response = array('success' => false);
    }

    // JSON 형태로 응답 전송
    header('Content-Type: application/json');
    echo json_encode($response);
?>