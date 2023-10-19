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
    <a href="./changedmenu.php"><img src="./img/prev.png" alt=""></a>
    <a href="./menu.php"><img src="./img/allmenu.png" alt=""></a>
  </header>
  <img class="cuteimg" src="./img/d_main.png" alt="">
  <section class="homeinnerWrapper changedWrapper">
  
  <?php
    $sql2 = query("SELECT DISTINCT title from changed WHERE category = '$category'");
    foreach($sql2 as $key2 => $val2) { ?>
    <div class="changedContent">
      <?php if($val2['title']) { ?>
        <h1 class="title"><?= $val2['title'] ?></h1>
      <?php } ?>
      <?php
        $sql3 = query("SELECT DISTINCT * from changed WHERE title = '$val2[title]' and category = '$category'");
        foreach ($sql3 as $key3 => $val3) {
      ?>
        <?php if($val3['tag']) { ?>
          <h4 class="tag"><?= $val3['tag'] ?></h4>
        <?php } ?>
        <?php if($val3['subtitle']) { ?>
          <h2 class="subtitle"><?= $val3['subtitle'] ?></h2>
        <?php } ?>
        <?php if($val3['content']) { ?>
          <pre><?= $val3['content'] ?></pre>
        <?php } ?>
    </div>
  <?php
    }
  }
  ?>
  <div class="ads_wrap ads_main_big">
    <ins class="adsbygoogle"
      data-ad-client="ca-pub-6697466452855244"
      data-ad-slot="2489448492"
      data-language="ko"
      ></ins>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  </div>
  <div class="stupid">
    <a target="_blank" href="https://apps.apple.com/kr/app/id6444873820"><img src="./img/btn_e.png" alt=""></a>
  </div>  
  </section>
</body>
</html>