<!DOCTYPE html>
<html lang="ko">
<head>
<?php 
    include './db.php';
    include './front_header.php';
    $category = $_POST['category'];
  ?>
</head>
<body>
  <header class="contentHeader">
  <a href="./home.php"><img src="./img/prev.png" alt=""></a>
    <a href="./menu.php"><img src="./img/allmenu.png" alt=""></a>
  </header>
  <section class="homeinnerWrapper">
  <div class="dicTop">
    <h1>놓치지마, 환급 TIP!</h1>
    <pre>연말정산 전문가, 나도 할 수 있다!</pre>
  </div>
  <a href="javascript:;" onclick="postDataContentC('A','AA')" class="tipMenuBox">
    <h2>연소득 7,000만원 이하 무주택자라면?</h2>
    <h4>#무주택 #주택청약종합저축 #소득공제</h4>
  </a>
  <a href="javascript:;" onclick="postDataContentC('B', 'BA')"  class="tipMenuBox">
    <h2>절세와 노후준비 동시에 필요하다면?</h2>
    <h4>#연금저축 #퇴직연금 #세액공제</h4>
  </a>
  <a href="javascript:;" onclick="postDataContentC('C', 'CA')"  class="tipMenuBox">
    <h2>신혼부부이거나 아이를 출산했다면?</h2>
    <h4>#혼인신고 #출생신고 #인적공제</h4>
  </a>
  <div class="ads_wrap ads_main_sm">
    <ins class="adsbygoogle"
      style="margin-bottom:1rem;"
      data-ad-client="ca-pub-6697466452855244"
      data-ad-slot="2489448492"
      data-language="ko"
      ></ins>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  </div>
  <a href="javascript:;" onclick="postDataContentC('D', 'DA')"  class="tipMenuBox">
    <h2>입학 전 자녀가 학원을 다니면?</h2>
    <h4>#영수증</h4>
  </a>
  <a href="javascript:;" onclick="postDataContentC('E', 'EA')"  class="tipMenuBox">
    <h2>	신용카드 VS 체크카드</h2>
    <h4>#신용카드 #체크카드 #현금영수증</h4>
  </a>
  <div class="ads_wrap ads_main_sm">
    <ins class="adsbygoogle"
      style="margin-bottom:1rem;"
      data-ad-client="ca-pub-6697466452855244"
      data-ad-slot="2489448492"
      data-language="ko"
      ></ins>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  </div>

  </section>
</body>

</html>