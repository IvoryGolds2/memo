<!DOCTYPE html>
<html lang="ko">
<head>
  <?php 
    include './db2.php';
    include './front_header.php';
    $user = $_GET['user'];
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
</head>
<body class="backgroundImage">
  <a href="./home.php" class="gohomeBtn">
    <img src="./img/btn_home.png" alt="">
  </a>
  <!-- <img src="./img/btn_home.png" alt="" class="gohomeBtn"> -->
  <section class="innerWrapper">
    <?php
      $sql = "SELECT DISTINCT nickname from christmas_user WHERE username = ?";
      $params = [$user];
      $result = query($sql, $params)->fetchAll();
      foreach($result as $key => $val) { ?>
        <div class="treeText">
          <h1><span class="nic"><?=$val['nickname']?></span>님에게</br>도착한 카드입니다!</h1>
          <h3 class="specialText">받은 카드는 <span class=redFont>12월25일</span>부터 열어볼 수 있어요 :)</h3>
        </div>
    <?php } ?>  
    <div class="christmasTree">
    <img src="./img/img_tree.png" alt="">
    <?php
      $sql2 = "SELECT DISTINCT * from christmas_letter WHERE username = ?";
      $params = [$user];
      $result2 = query($sql2, $params)->fetchAll();
      
      $i = 1;
      $cardsPerPage = 15;
      $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

      foreach($result2 as $key2 => $val2) { 
        $giftClass = "gift" . $i;

        // 현재 날짜가 2023년 12월 25일 이후인 경우에만 링크 활성화
        $currentDate = date("Y-m-d");
        $openDate = "2023-12-25";
        $isLinkEnabled = ($currentDate >= $openDate) ? true : false;

        // 현재 페이지 범위에 있는 카드만 표시
        if ($i >= ($currentPage - 1) * $cardsPerPage + 1 && $i <= $currentPage * $cardsPerPage) {
          ?>
          <button class="gift<?= $isLinkEnabled ? '' : ' disabled'; ?> openModal" onclick="<?= $isLinkEnabled ? 'openModal(\'./img/' . $val2['img'] . '.png\', \'' . $val2['username'] . '\', ' . $val2['seq'] . ')' : ''; ?>">
            <h4><?= $val2['from_name'] ?></h4>
            <img src="./img/<?= $val2['img'] ?>.png" alt="">
          </button>
          <?php
        }

        $i++;
      }
    ?>
      <?php
        // 이전 페이지로 이동하는 링크를 생성
        if ($currentPage > 1) {
          echo '<a href="./myChristmasTree.php?user=' . $user . '&page=' . ($currentPage - 1) . '" class="prevPageLink"><img src="./img/prev_3.png" alt=""></a>';
        }

        // 다음 페이지로 이동하는 링크를 생성
        if ($i > $currentPage * $cardsPerPage) {
          echo '<a href="./myChristmasTree.php?user=' . $user . '&page=' . ($currentPage + 1) . '" class="nextPageLink"><img src="./img/next_3.png" alt=""></a>';
        }
      ?>
    </div>
    <button class="paperBtn" id="shareBtn">내 크리스마스 트리 공유하기</button>
  </section>
  <div class="modal">
    <div class="modal-content">
      <a id="modalLink">
        <img class="openme" src="./img/openme.png" alt="">
        <img class="letterImg" src="./img/modal_card.png" alt="">
        <img class="giftImg" src="" id="modalImage" alt="">
      </a>
      <button class="closeModalBtn" onclick="closeModal()">x</button>
    </div>
  </div>
</body>
<script>
  const gohomeBtn = document.querySelector('.gohomeBtn');
  gohomeBtn.addEventListener('click', () => {
    // localStorage.removeItem('id');
    // localStorage.removeItem('pswd');
    // window.location.href = './home.php';
    // window.location.replace('./home.php');

    history.back();



  })
  document.addEventListener("DOMContentLoaded", function () {
    const clipboard = new ClipboardJS('#shareBtn', {
      text: function() {
        return 'http://christmas.consultingcpn.co.kr/shareCard.php?user=<?php echo $user; ?>';
      }
    });

    clipboard.on('success', function(e) {
      alert("링크가 복사되었습니다!");
    });
  });

// 모달 열기
  function openModal(imageSrc, username, seq) {
  const modal = document.querySelector('.modal');
  const modalImage = document.getElementById('modalImage');
  const modalLink = document.getElementById('modalLink');

  // 모달 내 이미지 소스 설정
  modalImage.src = imageSrc;

  // username과 seq를 저장할 수 있도록 처리
  modal.dataset.username = username;
  modal.dataset.seq = seq;

  // 링크 설정
  modalLink.href = `./christmasCard.php?user=${username}&seq=${seq}`;

  modal.style.display = 'flex';
}

  // 모달 닫기
  function closeModal() {
    const modal = document.querySelector('.modal');
    modal.style.display = 'none';
  }
</script>
</html>