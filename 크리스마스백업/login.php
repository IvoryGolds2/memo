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
    $stmt = $pdo->prepare("SELECT password FROM christmas_user WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($user && password_verify($_POST['password'], $user['password'])) {
        echo json_encode(['message' => 'Merry Christmas!']);
    } else {
        echo json_encode(['message' => '계정 정보가 일치하지 않습니다']);
    }
} catch (Exception $e) {
    echo json_encode(['message' => 'Error: ' . $e->getMessage()]);
}
?>