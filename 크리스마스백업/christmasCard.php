<!DOCTYPE html>
<html lang="ko">
<head>
  <?php 
    include './db2.php';
    include './front_header.php';
    $user = $_GET['user'];
    $seq = $_GET['seq'];
    $selectedImage = $_GET['selectedImage'];
  ?>
</head>
<body class="cardBG">
  <button class="gobackBtn" onclick="goBack2()">
    <img src="./img/back.png" alt="">
  </button>
  <img class="cardTopImg" src="./img/merry.png" alt="">
    <?php
      $sql = "SELECT DISTINCT * FROM christmas_letter WHERE username = ? AND seq = ?";
      $params = [$user, $seq];
      $result = query($sql, $params)->fetchAll();
      foreach($result as $key => $val) { ?>
        <img class="letterGiftImg" src="./img/<?=$val['img']?>.png" alt="">
        <div class="letterBox">
          <pre><?=$val['letter']?></pre>
        </div>
        <div class="letterFrom">
          <h1>FROM , </h1>
          <h1><?=$val['from_name']?></h1>
        </div>
    <?php } ?>  
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>
</html>
<script>
  function goBack2() {
    window.history.go(-1);
  }
</script>