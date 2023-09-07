<?php include './db.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<?php include "./front_header.php";?>
	<link rel="stylesheet" href="./css/commmon.css">
</head>
<body>
  <?php include './header.php'; ?>
  <div class="indexBackgroundImage">
    <img class="indexText" src="./img/index.png" alt="">
    <img class="indexImg" src="./img/splash.png" alt="">
  </div>
</body>
<?php include './footer.php'; ?>
<script>
setTimeout(() => {
  window.location.href = './home.php';
}, 2000);
</script>
</html>