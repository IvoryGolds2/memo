<?php 
    include './db.php';
    include './front_header.php';
    $category = $_POST['category'];
  ?>
<?php
// NEWS -> IDB
// IDB 가져오기
session_cache_limiter("private_no_expire");

session_start();
require_once '/home/users/aws899_app/www/common.php';
$http_url = $_SERVER[ "HTTP_HOST" ];

$SET_NO = '';
$app_name = '';
$APP_CODE = '';
$category_code = 'G001';
$query = " SELECT set_number, app_code, app_name FROM app WHERE app_code LIKE '%$category_code%' ";
$code = $_POST['code'];

$queryResult = querySelect($query);
foreach($queryResult as $key => $val) {
	$SET_NO   = $val['set_number'];
	$APP_CODE = $val['app_code'];
	$app_name = $val['app_name'];
}
?>
<!DOCTYPE html>
<html>
<header class="contentHeader">
  <a href="#" class="goback"><img src="./img/prev.png" alt=""></a>
  <a href="./menu.php"><img src="./img/allmenu.png" alt=""></a>
</header>
<body>
	<div class="homeinnerWrapper">
		<main>
		<?
			$query = " SELECT category_code FROM common WHERE app_code='$APP_CODE' and set_number = '$SET_NO' ";
			$queryResult = querySelect($query);
			foreach($queryResult as $key => $val) {

				//$q1 = "SELECT news_code FROM news_link WHERE set_number = '$SET_NO' and category_code = '$category_code' order by news_code ";
				$q1 = "SELECT distinct nl.news_code as news_code, news.title, news.content, news.news_date, news.link, news.news_image FROM news_link as nl left join news on nl.news_code = news.news_code WHERE set_number = '$SET_NO' and category_code = '$category_code' and nl.news_code = '$code' order by REPLACE(news_date,'.','') *1 desc, news_code desc ";
				
				$r1 = querySelect($q1);
				//if( $debug ) echo('q1 : '.$q1 .'<br>');

				$i = 1;
				foreach($r1 as $key => $val) {
					$code = $val['news_code'];
					$title = $val['title'];
					$content = $val['content'];
					$str = mb_strimwidth($content,0,150,'...','utf-8');
					$news_date = $val['news_date'];
					$img = $val['news_image'];
					$link = $val['link'];
					$link = str_replace("http://", "https://", $link); 
					
		?>
			<div class="box">
				<div class="title_wrap">
					<h4><?=$news_date?></h4>
					<h1><?=$title?></h1>
				</div>
				<div class="content_wrap">
					<pre><?=$content?></pre>
					<img src="<?=$img?>" alt="기사 이미지" class="news_img">
					<a href="<?=$link?>" target="_blank">뉴스 본문 바로가기</a>
				</div>			
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

		<?php	}
		}
		?>
		</main>
	</div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const closeButton = document.querySelector('header .goback');
    
    closeButton.addEventListener('click', function (event) {
      event.preventDefault(); // 기본 동작(링크 이동) 방지
      history.back(); // 뒤로 가기
    });
  });
</script>
</html>