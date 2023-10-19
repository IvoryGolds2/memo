<!DOCTYPE html>
<html lang="ko">
<head>
<?php 
    include './db.php';
    include './front_header.php';
    $category = $_POST['category'];
    $categorycode = $_POST['categorycode'];
  ?>
</head>
<body>
  <header class="contentHeader">
  <a href="./tipmenu.php"><img src="./img/prev.png" alt=""></a>
    <a href="./menu.php"><img src="./img/allmenu.png" alt=""></a>
  </header>
  <section class="purpleBox">
    <h3>연말정산 전문가, 나도 할 수 있다!</h3>
    <h1>놓치지마, 환급 TIP!</h1>
    <h3>숨은 정보를 비교할 줄 알아야 환급금도 늘린다!</br>
      다가오는 연말정산, 환급금도 대폭 늘려보자!
    </h3>
  </section>
  <section class="homeinnerWrapper">
  <?php
    $sql = query("SELECT DISTINCT tag from tip WHERE category = '$category'");
    foreach($sql as $key => $val) { ?>
      <div>
        <h4 class="margin1"><?=$val['tag']?></h4>
      </div>
  <?php } ?>  
  <h1>조금 더 자세히 알아볼까요?</h1>
  <div class="atozMenu">
  <?php
    $sql1 = query("SELECT DISTINCT category,title, categorycode from tip WHERE category = '$category'");
    foreach($sql1 as $key1 => $val1) { ?>
      <a href="javascript:;" onclick="postDataContentC('<?php echo $val1['category'] ;?>','<?php echo $val1['categorycode'] ;?>')"><?=$val1['title']?></a>
      <?php } ?>  
  </div>
  <?php
    $sql = query("SELECT DISTINCT * from tip WHERE categorycode = '$categorycode'");
    foreach($sql as $key => $val) { ?>
      <div class="atozBox">
        <?php if($val['subtitle']) { ?>
          <h2 class="subtitle"><?=$val['subtitle']?></h2>
        <?php } ?>
        <?php if($val['content']) { ?>
          <pre><?=$val['content']?></pre>
        <?php } ?>
        <?} 
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
      <a href="./qna.php"><img src="./img/qna2.png" alt=""></a>
    </div>
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
    const category = "<?php echo $categorycode; ?>"; // PHP 변수를 JavaScript 변수로 가져옵니다.
    const links = document.querySelectorAll('.atozMenu a'); // atozMenu 클래스 하위의 모든 링크를 선택합니다.

    // 모든 링크의 클래스를 초기화합니다.
    links.forEach(function (link) {
      link.classList.remove('on');
    });

    // 해당하는 링크에 클래스를 추가합니다.
    if (category === 'AA') {
      const link = document.querySelector('.atozMenu a:nth-child(1)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'AB') {
      const link = document.querySelector('.atozMenu a:nth-child(2)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'AC') {
      const link = document.querySelector('.atozMenu a:nth-child(3)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'AD') {
      const link = document.querySelector('.atozMenu a:nth-child(4)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'BA') {
      const link = document.querySelector('.atozMenu a:nth-child(1)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'BB') {
      const link = document.querySelector('.atozMenu a:nth-child(2)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'CA') {
      const link = document.querySelector('.atozMenu a:nth-child(1)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'CB') {
      const link = document.querySelector('.atozMenu a:nth-child(2)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'DA') {
      const link = document.querySelector('.atozMenu a:nth-child(1)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'DB') {
      const link = document.querySelector('.atozMenu a:nth-child(2)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'DC') {
      const link = document.querySelector('.atozMenu a:nth-child(3)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'EA') {
      const link = document.querySelector('.atozMenu a:nth-child(1)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'EB') {
      const link = document.querySelector('.atozMenu a:nth-child(2)');
      if (link) {
        link.classList.add('on');
      }
    }
  });
</script>
</html>