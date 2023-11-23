<!DOCTYPE html>
<html lang="ko">
<head>
    <?php include './front_header.php'; ?>
</head>
<body class="homeBG">
    <img class="bearImg" src="./img/main_img.png" alt="">
    <div class="withdrawalBox">
        <form action="./withdrawal.php" method="post">
            <div class="textout">탈퇴할 계정 정보를 입력해 주세요.</div>
            <div>
                ID<input type="text" id="checkUsername" name="username" autocomplete='off' required>
            </div>
            <div>
                비밀번호<input type="password" name="password" autocomplete='off' required><br>
            </div>
            <div class="withdrawalBtn">
                <button type="submit">회원탈퇴</button>
            </div>
        </form>
    </div>
</body>
<script>
</script>
<script src="./js/postData.js"></script>
</html>
