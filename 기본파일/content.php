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
      <div>
        <h1></h1>
      </div>
  </header>
  <section>
  <?php
    $sql2 = query("SELECT DISTINCT * from content WHERE category = '$category'");
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