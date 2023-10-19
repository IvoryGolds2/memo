<!DOCTYPE html>
<html lang="ko">
<head>
<?php include './front_header.php';?>
<?php

// home, news, in_article -> IDB
// home, qna, sale, view -> DB
require_once '/home/users/aws899_app/www/common.php';
$http_url = $_SERVER[ "HTTP_HOST" ];

$SET_NO = '';
$app_name = '';
$APP_CODE = '';
$category_code = 'G001';
$query = " SELECT set_number, app_code, app_name FROM app WHERE app_code LIKE '%$category_code%' ";

$queryResult = querySelect($query);
foreach($queryResult as $key => $val) {
	$SET_NO   = $val['set_number'];
	$APP_CODE = $val['app_code'];
	$app_name = $val['app_name'];
}
?>
</head>
<body>
  <header>
    <a href="./menu.php"><img src="./img/allmenu.png" alt=""></a>
  </header>
  <section class="homeinnerWrapper">
    <div class="homeCute">
      <div>연말이와 정산이와</br>함께 만들어나가는</br>연말정산!</div>
      <img src="./img/main.png" alt="">
    </div>
    <a class="longbtn longTop" href="javascript:;" onclick="postDataContentA('A')"><img src="./img/btn_a.png" alt=""></a>
    <div class="homeMidBtn">
      <a class="longbtn" href="javascript:;" onclick="postDataContentB('ㄱ')"><img src="./img/btn_b.png" alt=""></a>
      <a class="longbtn" href="./tipmenu.php"><img src="./img/btn_c.png" alt=""></a>
    </div>
    <a class="longbtn" href="./changedmenu.php"><img src="./img/btn_d.png" alt=""></a>
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
    <div class="homeNews">
      <div>연말정산 ⋅ 세금 관련</br>지금 뜨는 뉴스</div>
      <a href="./news.php"><img src="./img/more.png" alt=""></a>
    </div>
				<div class="swiper mySwiper">
					<div class="swiper-wrapper">
						<?
						$query = " SELECT category_code FROM common WHERE app_code = '$APP_CODE' and set_number = '$SET_NO' ";
						$queryResult = querySelect($query);
						foreach($queryResult as $key => $val) {

							//$q1 = "SELECT news_code FROM news_link WHERE set_number = '$SET_NO' and category_code = '$category_code' order by news_code ";
							$q1 = "SELECT distinct nl.news_code as news_code, news.title, news.content, news.news_date, news.link FROM news_link as nl left join news on nl.news_code = news.news_code WHERE set_number = '$SET_NO' and category_code = '$category_code' order by REPLACE(news_date,'.','') *1 desc, news_code desc LIMIT 4";

							$r1 = querySelect($q1);
							//if( $debug ) echo('q1 : '.$q1 .'<br>');
							foreach($r1 as $key => $val) {
								$code = $val['news_code'];
								$title = $val['title'];
								$content = $val['content'];
								$str = mb_strimwidth($content,0,75,'...','utf-8');
								$news_date = $val['news_date'];
								$link = $val['link'];
								$link = str_replace("http://", "https://", $link);
								$news_img = $val['news_image'];
								echo $val['news_image'] ;

								//echo $code;
						?>
						<div class="swiper-slide">
							<a href="javascript:;" onClick="postNews('<?=$code?>')">
								<h2 class="title_wrap"><?=$title?></h2>
								<pre class="content"><?=$str?></pre>
								<div class="fl">
									<h4 class="date"><?=$news_date?></h4>	
								</div>
							</a>
						</div>
						<?
								}
							}
						?>
					</div>
				</div>
      <!-- 뉴스 -->
			<div class="ads_wrap ads_main_big">
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
    <a class="longbtn" href="./qna.php"><img src="./img/qna.png" alt=""></a>
    <a target="_blank" class="longbtn" href="https://apps.apple.com/kr/app/id6444873820"><img src="./img/btn_e.png" alt=""></a>
  </section>
</body>
<script src="./js/postData.js"></script>
<script>

$(document).ready(function() {
	  var $swiper = $(".swiper-container");
	  var $bottomSlide = null; 
	  var $bottomSlideContent = null; 

	  var mySwiper = new Swiper(".swiper-container", {
		spaceBetween: 10,
		SlidesPerView: 'auto',
		centeredSlides: true,
		roundLengths: true,
		loop: true,
		loopedSlides : 3,
		autoplay: {
		delay: 3000,
		disableOnInteraction: false,
		},
	  });
	});

    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1.5,
      spaceBetween: 10,
      resistance: true,
      resistanceRatio: 0,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  
</script>
</html>