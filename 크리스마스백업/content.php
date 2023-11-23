<!DOCTYPE html>
<html lang="ko">
<head>
  <?php 
    include './db.php';
    include './front_header.php';
    $category = $_GET['category'];
  ?>
</head>
<body>
  <header class="contentHeader">
    <a href="./home.php">
      <button>
        <img src="./img/prev.png" alt="">
      </button>
    </a>
    <?php
      $sql = "SELECT DISTINCT header from content WHERE category = ?";
      $params = [$category];
      $result = query($sql, $params)->fetchAll();
      foreach($result as $key => $val) { ?>
        <div>
          <h1><?=$val['header']?></h1>
        </div>
    <?php } ?>  
  </header>
  <section>
  <?php
    $sql = "SELECT DISTINCT header from content WHERE category = ?";
    $params = [$category];
    $result = query($sql, $params)->fetchAll();
    foreach($sql2 as $key2 => $val2) { ?>
      <div class="content">
        <?php if($val2['title']) { ?>
          <h2 class="title"><?=$val2['title']?></h2>
        <?php } ?>
        <?php if($val2['subtitle']) { ?>
          <h3 class="subtitle"><?=$val2['subtitle']?></h3>
        <?php } ?>
        <?php if($val2['content']) { ?>
          <pre><?=$val2['content']?></pre>
        <?php } ?>
        <?php if($val2['chart']) { ?>
          <img src="./img/<?=$val2['chart']?>.png" alt="">
        <?php } ?>
      </div>
  <?php  } ?>  
  </section>
</body>
</html>