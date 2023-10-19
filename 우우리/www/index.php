<?php include './db.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<?php include "./front_header.php";?>
</head>
<body>
    <img class="indeximg" src="./img/index.png" alt="">
</body>
<script>
setTimeout(() => {
  window.location.href = './home.php';
}, 2000);
</script>
</html>