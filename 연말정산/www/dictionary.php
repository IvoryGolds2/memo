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
  <a href="./home.php"><img src="./img/prev.png" alt=""></a>
    <a href="./menu.php"><img src="./img/allmenu.png" alt=""></a>
  </header>
  <section class="homeinnerWrapper">
    <div class="dicTop">
      <h1>연말정산 용어 사전</h1>
      <pre>아리송한 연말정산 관련 용어, 정확히 알아보아요!</pre>
    </div>
    <div class="dicMenu">
    <a href="javascript:;" onclick="postDataContentB('ㄱ')">ㄱ</a>
      <a href="javascript:;" onclick="postDataContentB('ㅂ')">ㅂ</a>
      <a href="javascript:;" onclick="postDataContentB('ㅅ')">ㅅ</a>
      <a href="javascript:;" onclick="postDataContentB('ㅇ')">ㅇ</a>
      <a href="javascript:;" onclick="postDataContentB('ㅊ')">ㅊ</a>
      <a href="javascript:;" onclick="postDataContentB('ㅎ')">ㅎ</a>
    </div>
    <?php
    $i = 1;
    $sql = query("SELECT DISTINCT * from dictionary WHERE category = '$category'");
    foreach($sql as $key => $val) { 
      if ($i  % 2 === 0) { ?>
        <div class="dicBox">
          <?php if($val['title']) { ?>
            <h2 class="title"><?=$val['title']?></h2>
          <?php } ?>
          <?php if($val['content']) { ?>
            <pre><?=$val['content']?></pre>
          <?php } ?>
        </div>
          <div class="ads_wrap ads_main_sm">
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
        <div class="dicBox">
          <?php if($val['title']) { ?>
            <h2 class="title"><?=$val['title']?></h2>
          <?php } ?>
          <?php if($val['content']) { ?>
            <pre><?=$val['content']?></pre>
          <?php } ?>
        </div>
      <?} 
      $i++;
    }?>  
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

document.addEventListener('DOMContentLoaded', function () {
    const category = "<?php echo $category; ?>"; // PHP 변수를 JavaScript 변수로 가져옵니다.
    const links = document.querySelectorAll('.dicMenu a'); // atozMenu 클래스 하위의 모든 링크를 선택합니다.

    // 모든 링크의 클래스를 초기화합니다.
    links.forEach(function (link) {
      link.classList.remove('on');
    });

    // 해당하는 링크에 클래스를 추가합니다.
    if (category === 'ㄱ') {
      const link = document.querySelector('.dicMenu a:nth-child(1)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'ㅂ') {
      const link = document.querySelector('.dicMenu a:nth-child(2)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'ㅅ') {
      const link = document.querySelector('.dicMenu a:nth-child(3)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'ㅇ') {
      const link = document.querySelector('.dicMenu a:nth-child(4)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'ㅊ') {
      const link = document.querySelector('.dicMenu a:nth-child(5)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'ㅎ') {
      const link = document.querySelector('.dicMenu a:nth-child(6)');
      if (link) {
        link.classList.add('on');
      }
    }
  });
</script>
</html>