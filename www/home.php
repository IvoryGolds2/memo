<?php 
include './db2.php'; 
session_start();
if($_POST['idform']){
	$_SESSION['identification'] = $_POST['idform'];
} 

if(!$_SESSION['identification']) {
	$_SESSION['identification'] = $_POST['id'];
}

$id = $_SESSION['identification'];

$host_href = 'https://'.$_SERVER['HTTP_HOST'].'/' ;
$book = query("SELECT * FROM search_road_book WHERE identification = '$id' AND host_href = '$host_href'");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<?php include "./front_header.php";?>
	<link rel="stylesheet" href="./css/home.css">
	<script>
		var ID = '<?=$id?>';
		console.log(ID);
	</script>
<!-- 	<script>
	if ( window.location == 'https://roadadd.suuiin2498.co.kr/home.php' ) {
		window.location.href='https://roadadd.baruninfo.net/home.php';
	}
	if ( window.location == 'http://roadadd.suuiin2498.co.kr/home.php' ) {
		window.location.href='https://roadadd.baruninfo.net/home.php';
	}
	</script> -->
</head>
<body>
	<div id="wrap">
		<main>
			<header>
				<a href="./home.php" class="home"><img src="./img/main_logo.png" alt="도로명주소변환"></a>		
			</header>
			<div class="search_wrap">
				<p>도로명주소를 찾으시나요?</p>
				<div class="input_wrap">
					<input type="text" id="input_box" placeholder="검색할 주소를 입력해 주세요">
					<button id="search_btn">검색</button>
				</div>
				<p>도로명, 지번주소에 대해 통합 검색이 가능합니다.</p>
				<p>ex) 올림픽대로208, 삼성동23</p>
			</div>
			<div>
				<ins class="adsbygoogle"
					style="display: block;"
					data-language="ko"
					data-ad-client="ca-pub-1645699707945298"
					data-ad-slot="8277666728"
					data-ad-format="autorelaxed"
					data-matched-content-ui-type="image_sidebyside,image_sidebyside"
					data-matched-content-rows-num="1,1"
					data-matched-content-columns-num="1,1"
					></ins>
				<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
			<ul class="result main_book">
				</ul>
				<div class="notice">
					<p>※ 결과가 없다면 근처 주소로 재검색 해 보세요.</p>
					<p>※ 결과가 없다면 오타와 띄어쓰기를 확인 해 보세요.</p>
					<p>※ 검색 후 주소를 복사하실 수 있습니다.</p>
				</div>
				<div>
					<ins class="adsbygoogle"
						style="display: block;"
						data-language="ko"
						data-ad-client="ca-pub-1645699707945298"
						data-ad-slot="8277666728"
						data-ad-format="autorelaxed"
						data-matched-content-ui-type="image_sidebyside,image_sidebyside"
						data-matched-content-rows-num="1,1"
						data-matched-content-columns-num="1,1"
						></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>

		</main>
	</div>
</body>
<script src="./js/search_road.js"></script>
<script src="./js/book.js"></script>
</html>