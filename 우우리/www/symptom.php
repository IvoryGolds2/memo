<!DOCTYPE html>
<html lang="ko">
<head>
<?php include './front_header.php';?>
<?php 
    include './db.php';
    include './front_header.php';
    $category = $_POST['category'];
  ?>
</head>
<body>
  <section class="symptomInner">
    <h1>우울증 증상</h1>
    <?php
    $i = 1;
      $sql = query("SELECT DISTINCT * from symptom");
      foreach($sql as $key => $val) {
        if ($i % 3 === 0 ) { ?>
          <div class="symContent">
            <div class="cuteTitle">
              <img src="./img/<?=$val['chart']?>.png" alt=""><?=$val['title']?>
            </div>
            <div>
              <pre><?=$val['content']?></pre>
            </div>
          </div>
          <div class="ads_wrap ads_main_big">
              <ins class="adsbygoogle"
                  data-ad-client="ca-pub-8021100486946859"
                  data-ad-slot="5718247066"
                  data-language="ko"
                  ></ins>
              <script>
                  (adsbygoogle = window.adsbygoogle || []).push({});
              </script>
          </div>
        <?} else { ?>
          <div class="symContent">
            <div class="cuteTitle">
              <img src="./img/<?=$val['chart']?>.png" alt=""><?=$val['title']?>
            </div>
            <div>
              <pre><?=$val['content']?></pre>
            </div>
          </div>
          
        <? }
        $i++;
  } ?>  
    <h5>이 본문의 출처는 정신건강의학회(https://www.psychiatry.org)에 있습니다.</h5>
    <h5>출처 방문 링크: <a target="_blank" href="https://www.psychiatry.org">https://www.psychiatry.org</a></h5>
  </section>
  <!-- <footer>
    <a href="./home.php"><img src="./img/home.png" alt=""></a>
  </footer> -->
</body>
<script src="./js/postData.js"></script>
</html>