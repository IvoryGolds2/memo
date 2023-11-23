<!DOCTYPE html>
<html lang="ko">
<head>
  <?php 
    include './db2.php';
    include './front_header.php';
    $user = $_GET['user'];
  ?>
  <script>
    function saveImageToSessionStorage(imgSrc) {
      // 선택된 이미지의 value 값을 가져옴
      const selectedImage = document.querySelector('.chooseBox li.selected').getAttribute('value');
      
      // 페이지 이동 및 선택된 이미지의 값을 URL 파라미터로 추가
      window.location.href = `./writeCard.php?user=<?php echo $user; ?>&selectedImage=${selectedImage}`;
    }

    document.addEventListener('DOMContentLoaded', function() {
      const chooseBox = document.querySelector('.chooseBox');
      const lis = chooseBox.querySelectorAll('li');

      // 각 li를 클릭했을 때 selected 클래스를 토글하고 버튼 활성화
      lis.forEach(function(li) {
        li.addEventListener('click', function() {
          lis.forEach(function(el) {
            el.classList.remove('selected');
          });
          li.classList.add('selected');
        });
      });
    });
  </script>
</head>
<body class="chooseBG">
  <button class="gobackBtn1" onclick="goBack()">
    <img src="./img/back.png" alt="">
  </button>
  <img class="chooseTopImg" src="./img/sub_img.png" alt="">
  <section class="chooseInner">
    <h1>마음에 드는 장식물을 선택해보세요!</h1>
    <ul class="chooseBox">
      <li value="img_1"><img src="./img/img_1.png" alt=""></li>
      <li value="img_2"><img src="./img/img_2.png" alt=""></li>
      <li value="img_3"><img src="./img/img_3.png" alt=""></li>
      <li value="img_4"><img src="./img/img_4.png" alt=""></li>
      <li value="img_5"><img src="./img/img_5.png" alt=""></li>
      <li value="img_6"><img src="./img/img_6.png" alt=""></li>
      <li value="img_7"><img src="./img/img_7.png" alt=""></li>
      <li value="img_8"><img src="./img/img_8.png" alt=""></li>
      <li value="img_9"><img src="./img/img_9.png" alt=""></li>
      <li value="img_10"><img src="./img/img_10.png" alt=""></li>
      <li value="img_11"><img src="./img/img_11.png" alt=""></li>
      <li value="img_12"><img src="./img/img_12.png" alt=""></li>
    </ul>
    <button onclick="saveImageToSessionStorage('선택된 이미지')" class="paperBtn">크리스마스카드 쓰기</button>
  </section>
</body>
</html>