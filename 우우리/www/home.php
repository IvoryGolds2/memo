<!DOCTYPE html>
<html lang="ko">
<head>
<?php include './front_header.php';?>
<?php 
    include './db.php';
    include './front_header.php';
    $category = $_POST['category'];
  ?>
</head>
<body>
  <div class="backgroundcolorwrapper">
    <div class="homeinnerWrapper">
      <a class="homebtn btn1" href="./fighting.php"><img src="./img/btn_a.png" alt=""><h3>응원의 언어</h3></a>
      <a class="homebtn btn2" href="how.php"><img src="./img/btn_b.png" alt=""><h3>오늘의 할 일</h3></a>
      <a class="btn3" href="./check.php"><img src="./img/btn_c.png" alt=""><h3 class="center">테스트 하기</h3></a>
      <a class="homebtn btn4" href="symptom.php"><img src="./img/btn_d.png" alt=""><h3>우울증 증상</h3></a>
      <a class="homebtn btn5" href="./another_test.php"><img src="./img/btn_e.png" alt=""><h3>다른 테스트</h3></a>
    </div>
    <!-- <footer>
      <a href="./home.php"><img src="./img/home.png" alt=""></a>
    </footer> -->
  </div>
</body>
<script src="./js/postData.js"></script>
</html>