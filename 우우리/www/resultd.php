<!DOCTYPE html>
<html lang="ko">
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
<?php include './front_header.php';?>
<?php 
    include './db.php';
    include './front_header.php';
    $category = $_POST['category'];
  ?>
</head>
<body>
  <div class="resultinnerWrapper">
    <span class="redtext" id="resultText"></span><span>점입니다</span></br>
    <span>검사 결과는</span><span>&nbsp;</span><span class="redtext">고도</span><span>입니다.</span>
    <div class="hos">빠른 시일 내에 병원에 전문의와 상담하실 것을 권유드려요</div>
    <div class="hurt">
      <img src="./img/bad.png" alt="">
    </div>
    <div class="resultbox">
      <a href="./symptom.php">우울증 증상</a>
      <a href="./letter.php">우우리가 낯선 이들에게</a>
      <a href="./how.php">오늘의 할 일</a>
      <a href="./fighting.php">응원의 언어</a>
      <a href="#" id="copy-button">테스트 공유하기</a>
      <a href="./another_test.php">다른 테스트 하기</a>
    </div>
    <div class="grayText">* 진단 결과는 전문가에 의해 진단 만큼 정확하지 않은 선별검사입니다.</div>
  </div>
  <!-- <footer>
    <a href="./home.php"><img src="./img/home.png" alt=""></a>
  </footer> -->
</body>
<script src="./js/postData.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const resultText = document.getElementById("resultText");

    // 세션 스토리지에서 저장된 값을 가져와서 사용
    const testResult = sessionStorage.getItem('testResult');

    // 가져온 값을 페이지에 표시
    resultText.textContent = testResult;
});
document.addEventListener("DOMContentLoaded", function () {
  const clipboard = new ClipboardJS('#copy-button', {
    text: function() {
      // 클릭 시 복사될 내용을 반환합니다. 여기서는 원하는 링크를 반환하면 됩니다.
      return 'https://depressed.kpopcam.co.kr/home.php'; // 복사하고자 하는 링크를 여기에 넣으세요.
    }
  });

  clipboard.on('success', function(e) {
    alert("링크가 복사되었습니다!");
  });
});
</script>
</html>