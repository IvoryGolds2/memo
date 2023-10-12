<!DOCTYPE html>
<html lang="ko">
<head>
	<?php include "./front_header.php";?>
</head>
<body>
  <?php include './header.php'; ?>
  <div class="indexBackgroundImage">
    <img class="indexText" src="./img/index.png" alt="">
    <img class="indexImg" src="./img/splash.png" alt="">
  </div>
</body>
<script>
setTimeout(() => {
  window.location.href = './home.php';
}, 2000);
</script>
</html>