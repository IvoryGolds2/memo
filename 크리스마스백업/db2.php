<?php
    $host = 'idbinsu.kr';
    $dbName = 'apidb';
    $user = 'apidb';
    $pw = 'elql12!';

    $dsn = "mysql:host=$host;dbname=$dbName;charset=utf8";
    $pdo = new PDO($dsn, $user, $pw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepared Statement를 사용한 쿼리 실행 함수
    function query($sql, $params = []) {
        global $pdo;
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
?>
