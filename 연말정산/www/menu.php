<!DOCTYPE html>
<html lang="ko">
<head>
<?php include './front_header.php';?>
<?php 
    include './db.php';
    include './front_header.php';
    $category = $_POST['category'];
  ?>
<link rel="stylesheet" href="./css/commmon.css">
</head>
<body>
    <header>
      <a href="" class="goback"><img src="./img/allmenu_close.png" alt=""></a>
    </header>
    <section class="homeinnerWrapper">
      <h1 class="menuh1">전체메뉴</h1>
      <h2>연말정산 서비스 A to Z</h2>
      <div class="menuBox">
      <a  href="javascript:;" onclick="postDataContentA('A')">누가? 언제? 어떻게?</a>
      <a  href="javascript:;" onclick="postDataContentA('B')">계산 과정</a>
      <a  href="javascript:;" onclick="postDataContentA('C')">제출 서류</a>
      <a  href="javascript:;" onclick="postDataContentA('D')">환급금</a>
      <a  href="javascript:;" onclick="postDataContentA('E')">간소화 서비스</a>
      <a  href="javascript:;" onclick="postDataContentA('F')">일괄제공 서비스</a>
      </div>
      <h2>연말정산 용어 사전</h2>
      <div class="menuBox2">
      <a  href="javascript:;" onclick="postDataContentB('ㄱ')">ㄱ</a>
      <a  href="javascript:;" onclick="postDataContentB('ㅂ')">ㅂ</a>
      <a  href="javascript:;" onclick="postDataContentB('ㅅ')">ㅅ</a>
      <a  href="javascript:;" onclick="postDataContentB('ㅇ')">ㅇ</a>
      <a  href="javascript:;" onclick="postDataContentB('ㅊ')">ㅊ</a>
      <a  href="javascript:;" onclick="postDataContentB('ㅎ')">ㅎ</a>
      </div>
      <a href="./tipmenu.php" class="linkBox">
        놓치지마, 환급 TIP!
        <img src="./img/go.png" alt="">
      </a>
      <a href="./changedmenu.php" class="linkBox">
        23년도 달라진 연말정산
        <img src="./img/go.png" alt="">
      </a>
      <a class="longbtn loneLastbtn" href="./news.php" ><img src="./img/news.png" alt=""></a>
      <div class="homeMidBtn menuLast">
        <a class="longbtn" href="./qna.php"><img src="./img/qna_mini.png" alt=""></a>
        <a class="longbtn" href="https://apps.apple.com/kr/app/id6444873820" target="_blank"><img src="./img/btn_e_mini.png" alt=""></a>
      </div>
    </section>
</body>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const closeButton = document.querySelector('header .goback');
    
    closeButton.addEventListener('click', function (event) {
      event.preventDefault(); // 기본 동작(링크 이동) 방지
      history.back(); // 뒤로 가기
    });
  });

  
</script>
</html>