<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
    include './db.php';
    $category = $_POST['category'];
  ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="./css/reset.css">	
	<link rel="stylesheet" href="./css/common.css">
	<link rel="stylesheet" href="./css/home.css">
	<link rel="stylesheet" href="./css/new.css">
</head>
<?php include "header.php"; ?>
<body>
  <section class="innerWrap">
    <h2>>> 2024 새롭게 적용되는 개정 세법</h2>
      <?php
        $sql = query("SELECT * from qna");
        foreach($sql as $key => $val) { ?>
        <div class="qnaToggleBox">
          <button class="toggleButton" data-key="<?=$key?>">
            <h1 class="toggleColor"><?=$val['question']?></h1> 
            <img class="toggleIcon" src="./img/arrow-down.png" alt="Show">
          </button>
          <div>
            <pre class="content" style="display: none;"><?=$val['answer']?></pre>
          </div>
        </div>
      <?php  } ?>  
      <div class="ads_wrap ads_big  ">
				<ins class="adsbygoogle " data-ad-client="ca-pub-2858778486116301" data-ad-slot="2985402594" data-language="ko"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>						
			</div>
    </section>
</body>
  <script>
    var toggleButtons = document.querySelectorAll(".toggleButton");
    var contents = document.querySelectorAll(".content");

    toggleButtons.forEach(function(button, index) {
      button.addEventListener("click", function() {
        contents.forEach(function(content, contentIndex) {
          if (contentIndex === index) {
            content.style.display = (content.style.display === "none") ? "block" : "none";
            button.querySelector(".toggleIcon").src = (content.style.display === "none") ? "./img/arrow-down.png" : "./img/arrow-up.png";          } else {
            content.style.display = "none";
            toggleButtons[contentIndex].querySelector(".toggleIcon").src = "./img/arrow-down.png";
          }
        });
      });
    });
  </script>