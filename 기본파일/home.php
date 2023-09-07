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
  <div class="backgroundcolorwrapper">
    <header class="homeHeader">
      <div class="homeHeaderimg">
        <img src="./img/mainpage-logo.png" alt="">
      </div>
    </header>
    <section>
      <div class="homeinnerWrapper">
      <a href="javascript:;" onclick="postDataContentA('SUB1')"><img src="./img/main-btn1.png" alt=""></a>
      </div>
    </section>
  </div>
</body>
<script src="./js/postData.js"></script>
</html>