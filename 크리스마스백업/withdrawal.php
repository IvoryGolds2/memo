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

    // 사용자 입력 받기
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 입력 검증
    if (empty($username) || empty($password)) {
        echo json_encode(['message' => '아이디와 비밀번호를 모두 입력해주세요.']);
        exit;
    }

    // 데이터베이스에서 사용자 정보 가져오기
    $stmt = $pdo->prepare("SELECT * FROM christmas_user WHERE username = ?");
    $stmt->execute([$username]);

    $user = $stmt->fetch();

    if ($user) {
        // 저장된 해시된 비밀번호
        $hashedPassword = $user['password'];

        // 사용자가 제출한 비밀번호와 저장된 해시된 비밀번호 비교
        if (password_verify($password, $hashedPassword)) {
            // 비밀번호가 일치하면 사용자 삭제
            $deleteStmt = $pdo->prepare("DELETE FROM christmas_user WHERE username = ?");
            $deleteStmt->execute([$username]);

            echo json_encode(['message' => '회원탈퇴가 완료되었습니다.']);

            // 회원탈퇴 후 홈 페이지로 리다이렉션 및 얼럿 띄우기
            echo '<script>alert("회원탈퇴가 완료되었습니다."); 
                  localStorage.removeItem("id");
                  localStorage.removeItem("pswd");
                  window.location.href = "./home.php";</script>';
            exit;
        } else {
            echo json_encode(['message' => '잘못된 아이디 또는 비밀번호입니다.']);

            echo '<script>alert("잘못된 아이디 또는 비밀번호입니다. 다시 시도해 주십시오"); window.location.href = "./out.php";</script>';

            exit;
        }
    } else {
        echo json_encode(['message' => '존재하지 않는 사용자입니다.']);

        echo '<script>alert("존재하지 않는 사용자입니다. 다시 시도해 주십시오"); window.location.href = "./out.php";</script>';
        exit;
    }
} catch (Exception $e) {
    echo json_encode(['message' => '회원탈퇴에 오류가 있습니다']);
}
?>