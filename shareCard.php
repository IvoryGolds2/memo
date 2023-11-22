<!DOCTYPE html>
<html lang="ko">
<head>
  <?php 
    include './db2.php';
    include './front_header.php';
    $user = $_GET['user'];  
    $selectedImage = $_POST['selectedImage'];
  ?>
</head>
<body class="backgroundImage">
  <section class="innerWrapper">
    <?php
      $sql = query("SELECT DISTINCT nickname from christmas_user WHERE username = '$user'");
      foreach($sql as $key => $val) { ?>
        <div class="treeText">
          <h1><?=$val['nickname']?>님의</br></h1>
          <h3>크리스마스트리에 카드를 걸어보세요!</h3>
        </div>
    <?php } ?>
    <div class="christmasTree">
    <img src="./img/img_tree.png" alt="">
    <?php
      $i = 1;
      $sql2 = query("SELECT DISTINCT * from christmas_letter WHERE username = '$user'");
      foreach($sql2 as $key2 => $val2) { 
        $giftClass = "gift" . $i;
        ?>
        <a class="<?=$giftClass?> gift" href="./christmasCard.php?seq=<?=$val2['seq']?>">
          <h4><?=$val2['from_name']?></h4>
          <img src="./img/<?=$val2['img']?>.png" alt="">
        </a>
    <?php $i++; } ?>  
    </div>  
    <a href="./choose.php?user=<?php echo $user; ?>" class="paperBtn" id="writeBtn">크리스마스카드 쓰러가기</a>
    <a href="./home.php" class="paperBtn" id="makeBtn">내 크리스마스 트리 만들기</a>
  </section>
</body>
</html>