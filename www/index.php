<?php
$identification = $_POST['id']? $_POST['id'] : ($_GET['identification'] ? $_GET['identification'] : '');
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<?php include "./front_header.php";?>
	<link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <div id="wrap">
        <div class="img_wrap">
			<img src="./img/index.png" alt="index">
		</div>

		<?php if($identification){ ?>
		<!-- 정상작동 -->
		<script>
		setTimeout(() => {
		  redirect();
		}, 2000);
		function redirect(category) {
			const form = document.createElement('form');
			form.classList.add('off');
			form.action = 'https://roadadd.suuiin2498.co.kr/home.php';
			form.method = 'POST';

			const input = document.createElement('input');
			input.name = 'idform';
			input.value = '<?php echo $identification; ?>';

			form.appendChild(input);
			document.body.appendChild(form);
			form.submit();
		}
		</script>
	<?php }else{  ?>
 		<script>
		setTimeout(() => {
		  modalOn();
		}, 2000);
		function modalOn() {
			$("#wrap").addClass('on');
		}
		</script>
		<div class="modal">
			<div class="modal_con">
				<h3>오류<span class="close"></span></h3>
				<div class="modal_box">
					<img src="./img/deco.png" alt="">
					<p>잘못된 접근입니다. <br> 앱을 완전히 종료하고 재실행한 뒤에도 같은 문제가 지속될 시 다음 이메일로 연락 부탁드립니다. <br><a href="mailto:'dab969879@gmail.com'">dab969879@gmail.com</a></p>
					<div>
						<button type="button" onclick="clip()">복사</button>
					</div>							
				</div>
			</div>
			<div class="modal_bg"></div>
		</div>
		<?php }?>


    </div>
</body>
<script>
	$("button.index_a").click(function(e){
		e.preventDefault();

		$("#wrap").addClass("on");
		$('#wrap').on('scroll touchmove mousewheel', function(e){
			e.preventDefault();
			e.stopPropagation();
			return false;
		})
	});
	
	$('.modal_bg, .close > img, .close').click(function(){
		$("#wrap").removeClass("on"); 
		$('#wrap').off('scroll touchmove mousewheel');
	});

	function clip(){
		var url = 'dab969879@gmail.com';
		var textarea = document.createElement("textarea");
		document.body.appendChild(textarea);
		textarea.value = url;
		textarea.select();
		document.execCommand("copy");
		document.body.removeChild(textarea);
		alert("복사되었습니다.");

		$("#wrap").removeClass("on"); 
	};
</script>
</html>