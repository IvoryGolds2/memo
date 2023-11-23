<!DOCTYPE html>
<html lang="ko">
<head>
  <?php 
    include './db2.php';
    include './front_header.php';
    $user = $_GET['user'];
    $selectedImage = $_GET['selectedImage'];
  ?>
</head>
<body class="cardBG">
  <button class="gobackBtn" onclick="goBack()">
    <img src="./img/back.png" alt="">
  </button>
  <img class="cardTopImg" src="./img/merry.png" alt="">
  <form class="writeCardInner" id="cardForm">
    <div class="cardTitle">
      <?php
        $sql = "SELECT DISTINCT nickname FROM christmas_user WHERE username = ?";
        $params = [$user];
        $result = query($sql, $params)->fetchAll();
        foreach($result as $key => $val) { ?>
      <h1>'<?=$val['nickname']?>'님에게</br>따뜻한 메세지를 남겨보세요:)</h1>
      <?php } ?>  
      <?php
        echo "<img src='./img/".$selectedImage.".png' alt=''>";
      ?>
    </div>
    <input type="hidden" name="selectedImage" value="<?php echo $selectedImage; ?>">
    <div class="from"><h3>FROM : </h3><input class="from" type="text" name="from" id="from" autocomplete='off'></div>
    <textarea type="text" class="letter" name="letter" id="letter" autocomplete='off' maxlength="1000"></textarea>
    <button type="submit" class="paperBtn">크리스마스 카드 보내기</button>
  </form>

  <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
  <script>
  $(document).ready(function() {
    $('#cardForm').submit(function(e) {
      e.preventDefault();

      // Get form values
      var user = '<?php echo $user; ?>';
      var selectedImage = '<?php echo $selectedImage; ?>';
      var from = $('#from').val();
      var letter = $('#letter').val();

      // Check if input fields are empty
      if (from.trim() === '' || letter.trim() === '') {
        alert('내용을 입력해 주세요!');
        return;
      }

      // Proceed with AJAX request if input fields are not empty
      $.ajax({
        url: './process_card.php',
        type: 'POST',
        data: {
          user: user,
          selectedImage: selectedImage,
          from: from,
          letter: letter
        },
        success: function(response) {
          if (response.success) {
            window.location.href = './shareCard.php?user=<?php echo $user; ?>';
          } else {
            console.error('Error:', response);
          }
        },
        error: function(error) {
          console.error('Error:', error);
        }
      });
    });
  });
  </script>
</body>
</html>