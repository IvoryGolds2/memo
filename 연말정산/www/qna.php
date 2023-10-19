<!DOCTYPE html>
<html lang="ko">
<?php 
  include './db.php';
  include './front_header.php';
  $category = $_POST['category'];
?>
<body>
  <header class="contentHeader">
    <a href="#" class="goback"><img src="./img/prev.png" alt=""></a>
    <a href="./menu.php"><img src="./img/allmenu.png" alt=""></a>
  </header>
  <section class="homeinnerWrapper">
    <div class="qnaTop">
      <h1>연말정산 · 세금 관련</br>자주 묻는 질문</h1>
      <img src="./img/qna_deco.png" alt="">
    </div>
    <?php
      $i = 1;
      $sql = query("SELECT * from qna");
      foreach($sql as $key => $val) { 
        if ($i % 3 === 0) { ?>
          <div class="qnaToggleBox">
            <button class="toggleButton" data-key="<?=$key?>">
              <h1 class="toggleColor"><p class="q">Q. </p> <?=$val['question']?></h1> 
              <img class="toggleIcon" src="./img/go.png" alt="Show">
            </button>
            <div>
              <pre class="content" style="display: none;"><span class="a">A. </span><?=$val['answer']?></br></br><a href="">닫기</a></pre>
            </div>
          </div>
          <div class="ads_wrap ads_sub_sm">
            <ins class="adsbygoogle"
              style="margin-bottom:1rem;"
              data-ad-client="ca-pub-6697466452855244"
              data-ad-slot="2489448492"
              data-language="ko"
              ></ins>
            <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
          </div>
        <?} else { ?>
          <div class="qnaToggleBox">
            <button class="toggleButton" data-key="<?=$key?>">
              <h1 class="toggleColor"><p class="q">Q. </p> <?=$val['question']?></h1> 
              <img class="toggleIcon" src="./img/go.png" alt="Show">
            </button>
            <div>
              <pre class="content" style="display: none;"><span class="a">A. </span><?=$val['answer']?></br></br><a href="">닫기</a></pre>
            </div>
          </div>
        <?}
        $i++;
      } ?>  
  </section>
</body>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
    const closeButton = document.querySelector('header .goback');
    
    closeButton.addEventListener('click', function (event) {
      event.preventDefault(); // 기본 동작(링크 이동) 방지
      history.back(); // 뒤로 가기
    });
  });
    var toggleButtons = document.querySelectorAll(".toggleButton");
    var contents = document.querySelectorAll(".content");

    toggleButtons.forEach(function(button, index) {
      button.addEventListener("click", function() {
        contents.forEach(function(content, contentIndex) {
          if (contentIndex === index) {
            content.style.display = (content.style.display === "none") ? "block" : "none";
            button.querySelector(".toggleIcon").src = (content.style.display === "none") ? "./img/go.png" : "./img/go.png";
            button.querySelector(".toggleColor").style.color = (content.style.display === "none") ? "black" : "#000";
          } else {
            content.style.display = "none";
            toggleButtons[contentIndex].querySelector(".toggleIcon").src = "./img/go.png";
            toggleButtons[contentIndex].querySelector(".toggleColor").style.color = "black";
          }
        });
      });
    });
  </script>
