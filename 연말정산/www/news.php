<?php 
    include './db.php';
    include './front_header.php';
    $category = $_POST['category'];
  ?>
<?php
// NEWS -> IDB
// IDB 가져오기
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
<!DOCTYPE html>
<html lang="ko">
  <body>
    <header class="contentHeader">
      <a href="./home.php"><img src="./img/prev.png" alt=""></a>
      <a href="./menu.php"><img src="./img/allmenu.png" alt=""></a>
    </header>
    <div id="wrap" class="news_page">
		<main>
    <div class="homeinnerWrapper">
      <div class="qnaTop">
        <h1>연말정산 · 세금 관련</br>지금 뜨는 뉴스</h1>
        <img src="./img/news_deco.png" alt="">
      </div>
				<ul class="newslist">
					<?
						$query = " SELECT category_code FROM common WHERE app_code='$APP_CODE' and set_number = '$SET_NO' ";
						$queryResult = querySelect($query);
						foreach($queryResult as $key => $val) {
							if( $debug ) echo('category_code : '.$category_code.'<br>');

							//$q1 = "SELECT news_code FROM news_link WHERE set_number = '$SET_NO' and category_code = '$category_code' order by news_code ";
							$q1 = "SELECT distinct nl.news_code as news_code, news.title, news.content, news.news_date, news.link FROM news_link as nl left join news on nl.news_code = news.news_code WHERE set_number = '$SET_NO' and category_code = '$category_code' order by REPLACE(news_date,'.','') *1 desc, news_code desc limit 10";
							
							$r1 = querySelect($q1);
							//if( $debug ) echo('q1 : '.$q1 .'<br>');

							$i = 1;
							foreach($r1 as $key => $val) {
								$code = $val['news_code'];
								$title = $val['title'];
								$content = $val['content'];
								$str = mb_strimwidth($content,0,100,'...','utf-8');
								$news_date = $val['news_date'];
								$link = $val['link'];
								$link = str_replace("http://", "https://", $link); 
								
								if ($i % 2 === 0): ?>
					<li>
						<a href="javascript:;" onClick="postNews('<?=$code?>')" class="newslink">
							<h1><?=$title?></h1>
							<div class="content_box">
								<pre class="content"><?=$str?></pre>
								<h4 class="date"><?=$news_date?></h4>
								<!-- <img src="" class="more"> -->
							</div>
						</a>
					</li>
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
					<?php 
						else:
					?>
					<li>
						<a href="javascript:;" onClick="postNews('<?=$code?>')" class="newslink">
							<h1><?=$title?></h1>
							<div class="content_box">
								<pre class="content"><?=$str?></pre>
								<h4 class="date"><?=$news_date?></h4>		
								<!-- <img src="" class="more"> -->
							</div>
						</a>
					</li>
					<?php 
						endif;
						$i++;
						}
					}
					?>
				</ul>
			</div>
		</main>
	</div>
</body>
</html>