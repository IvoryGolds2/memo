<!DOCTYPE html>
<html lang="ko">
<head>
<?php 
  include './db.php';
  include './front_header.php';
?>
</head>
<body>
  <header class="homeHeader">
    <div class="homeHeaderimg">
      <img src="./img/logo.png" alt="">
    </div>
  </header>
  <section class="homeinnerWrapper">
    <a href="javascript:;" onclick="postDataContent('SUB1')"><img src="./img/main-btn1.png" alt=""></a>
    <a href="./content.php?category=B"><img src="./img/sub-btn-2.png" alt=""></a>
  </section>
</body>
<script src="./js/postData.js"></script>
</html>
