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
  <section class="blueBox">
    <h3>연말정산이 뭐냐...?</h3>
    <h1>연말정산 서비스 A to Z</h1>
    <h3>월급 명세서에 원천징수 되어있는 세금을</br>
      결정세액과 비교하고, 올해 낼 세금을</br>
      최종적으로 확인하는 절차
    </h3>
  </section>
  <section class="homeinnerWrapper">
    <h1>조금 더 자세히 알아볼까요?</h1>
    <div class="atozMenu">
      <a href="javascript:;" onclick="postDataContentA('A')">누가? 언제? 어떻게?</a>
      <a href="javascript:;" onclick="postDataContentA('B')">계산 과정</a>
      <a href="javascript:;" onclick="postDataContentA('C')">제출 서류</a>
      <a href="javascript:;" onclick="postDataContentA('D')">환급금</a>
      <a href="javascript:;" onclick="postDataContentA('E')">간소화 서비스</a>
      <a href="javascript:;" onclick="postDataContentA('F')">일괄제공 서비스</a>
    </div>
    <?php
    $sql = query("SELECT DISTINCT * from content WHERE category = '$category'");
    foreach($sql as $key => $val) { ?>
      <div class="atozBox">
        <?php if($val['subtitle']) { ?>
          <h2 class="subtitle"><?=$val['subtitle']?></h2>
        <?php } ?>
        <?php if($val['content']) { ?>
          <pre><?=$val['content']?></pre>
        <?php } ?>
        <?php 
          $sql2 = query("SELECT DISTINCT chart from content WHERE subtitle = '$val[subtitle]' and category = '$category'");
          foreach ($sql2 as $key2 => $val2) { ?>
            <?php if($val2['chart']) { ?>
              <div class="swiper">
                <div class="swiper-wrapper">
                  <?=$val['chart']?>
                </div>
                <div class="swiper-pagination"></div>
              </div>
            <?php } ?>
            <?php } ?>  
        <?} 
        ?>
      </div>
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
  const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },
});

document.addEventListener('DOMContentLoaded', function () {
    const category = "<?php echo $category; ?>"; // PHP 변수를 JavaScript 변수로 가져옵니다.
    const links = document.querySelectorAll('.atozMenu a'); // atozMenu 클래스 하위의 모든 링크를 선택합니다.

    // 모든 링크의 클래스를 초기화합니다.
    links.forEach(function (link) {
      link.classList.remove('on');
    });

    // 해당하는 링크에 클래스를 추가합니다.
    if (category === 'A') {
      const link = document.querySelector('.atozMenu a:nth-child(1)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'B') {
      const link = document.querySelector('.atozMenu a:nth-child(2)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'C') {
      const link = document.querySelector('.atozMenu a:nth-child(3)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'D') {
      const link = document.querySelector('.atozMenu a:nth-child(4)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'E') {
      const link = document.querySelector('.atozMenu a:nth-child(5)');
      if (link) {
        link.classList.add('on');
      }
    } else if (category === 'F') {
      const link = document.querySelector('.atozMenu a:nth-child(6)');
      if (link) {
        link.classList.add('on');
      }
    }
  });
</script>
</html>