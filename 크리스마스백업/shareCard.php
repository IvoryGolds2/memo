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
      $sql = "SELECT DISTINCT nickname FROM christmas_user WHERE username = ?";
      $params = [$user];
      $result = query($sql, $params)->fetchAll();
      foreach($result as $key => $val) { ?>
        <div class="treeText">
          <h1><span class="nic"><?=$val['nickname']?></span>님의</br></h1>
          <h3 class="normalFont">크리스마스트리에 카드를 걸어보세요!</h3>
        </div>
    <?php } ?>
    <div class="christmasTree">
    <img src="./img/img_tree.png" alt="">
    <?php
      $sql2 = "SELECT DISTINCT * FROM christmas_letter WHERE username = ?";
      $params = [$user];
      $result2 = query($sql2, $params)->fetchAll();

      $i = 1;
      $cardsPerPage = 15;
      $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

      foreach($result2 as $key2 => $val2) { 
        $giftClass = "gift" . $i;

        // 현재 페이지 범위에 있는 카드만 표시
        if ($i >= ($currentPage - 1) * $cardsPerPage + 1 && $i <= $currentPage * $cardsPerPage) {
          ?>
          <div class="<?=$giftClass?> gift">
            <h4><?=$val2['from_name']?></h4>
            <img src="./img/<?=$val2['img']?>.png" alt="">
        </div>
          <?php
        }

        $i++;
      } ?>  
      <?php
        // 이전 페이지로 이동하는 링크를 생성
        if ($currentPage > 1) {
          echo '<a href="./shareCard.php?user=' . $user . '&page=' . ($currentPage - 1) . '" class="prevPageLink"><img src="./img/prev_3.png" alt=""></a>';
        }

        // 다음 페이지로 이동하는 링크를 생성
        if ($i > $currentPage * $cardsPerPage) {
          echo '<a href="./shareCard.php?user=' . $user . '&page=' . ($currentPage + 1) . '" class="nextPageLink"><img src="./img/next_3.png" alt=""></a>';
        }
      ?>
    </div>

    <a href="./choose.php?user=<?php echo $user; ?>" class="paperBtn" id="writeBtn">크리스마스카드 쓰러가기</a>
    <a href="./home.php" class="paperBtn" id="makeBtn">내 크리스마스 트리 만들기</a>
  </section>
</body>
</html>