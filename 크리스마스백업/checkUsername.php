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
    $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM christmas_user WHERE username = ?");
    $stmt->execute([$username]);

    $result = $stmt->fetch();
    if ($result['count'] > 0) {
        echo json_encode(['isDuplicate' => true]);
    } else {
        echo json_encode(['isDuplicate' => false]);
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    echo json_encode(['error' => 'An error occurred.']);
}
?>
