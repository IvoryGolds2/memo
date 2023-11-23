<?php
$host = 'idbinsu.kr';
$db = 'apidb';
$user = 'apidb';
$pass = 'elql12!';

$dsn = "mysql:host=$host;dbname=$db;";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nickname = $_POST['nickname'];
    $stmt = $pdo->prepare("INSERT INTO christmas_user (username, password, nickname) VALUES (?, ?, ?)");
    $stmt->execute([$username, $password, $nickname]);
    echo json_encode(['message' => '회원가입 성공!']);
} catch (Exception $e) {
    echo json_encode(['message' => '회원가입에 오류가 있습니다']);
}

?>