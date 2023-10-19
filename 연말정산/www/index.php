<?php include './db.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<?php include "./front_header.php";?>
</head>
<body class="indexBackgroundImage">
  <?php include './header.php'; ?>
    <div class="indexText">
      연말정산 어려워? </br>
      우리에게 맡겨!
    </div>
    <img class="indexImg" src="./img/index.png" alt="">
</body>
<?php include './footer.php'; ?>
<script>
setTimeout(() => {
  window.location.href = './home.php';
}, 2000);
</script>
</html>