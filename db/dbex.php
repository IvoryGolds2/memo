<!-- 기본 -->
<?php
      $sql = query("SELECT DISTINCT header from content WHERE category = '$category'");
      foreach($sql as $key => $val) { ?>
        <div>
          <h1><?=$val['header']?></h1>
        </div>
    <?php } ?>  

<!-- if로 데이터가 존재할 때 불러오기 -->
<?php
    $sql2 = query("SELECT DISTINCT * from content WHERE category = '$category'");
    foreach($sql2 as $key2 => $val2) { ?>
      <div class="contentA">
        <?php if($val2['title']) { ?>
          <p class="title"><?=$val2['title']?></p>
        <?php } ?>
        <?php if($val2['subtitle']) { ?>
          <p class="subtitle"><?=$val2['subtitle']?></p>
        <?php } ?>
        <?php if($val2['content']) { ?>
          <pre><?=$val2['content']?></pre>
        <?php } ?>
        <?php if($val2['chart']) { ?>
          <img src="./img/<?=$val2['chart']?>.png" alt="">
        <?php } ?>
      </div>
  <?php  } ?>  

<!-- 광고삽입 예제 -->
  <?php
      $sql = query("SELECT DISTINCT * from checkcard");
      $i = 1;
      foreach($sql as $key => $val) { 
        if ($i % 3 === 0) { ?>
          <div class="qnaToggleBox">
          <button class="toggleButton" data-key="<?=$key?>">
            <h1 class="toggleColor"><?=$val['title']?></h1> 
            <img class="toggleIcon" src="./img/qna-down.png" alt="Show">
          </button>
          <div>
            <pre class="content" style="display: none;"><?=$val['content']?></pre>
          </div>
        </div>
        <?php echo'
          <div class="ads_wrap ads_main_sm">
              <ins class="adsbygoogle"
                  data-ad-client="ca-pub-2858778486116301"
                  data-ad-slot="1643431225"
                  data-language="ko"
                  ></ins>
              <script>
                  (adsbygoogle = window.adsbygoogle || []).push({});
              </script>
          </div>
          ';
        } else { ?>
          <div class="qnaToggleBox">
          <button class="toggleButton" data-key="<?=$key?>">
            <h1 class="toggleColor"><?=$val['title']?></h1> 
            <img class="toggleIcon" src="./img/qna-down.png" alt="Show">
          </button>
          <div>
            <pre class="content" style="display: none;"><?=$val['content']?></pre>
          </div>
        </div>
        <? }
        $i++;
      }
    ?>