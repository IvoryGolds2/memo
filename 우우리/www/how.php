<!DOCTYPE html>
<html lang="ko">
<head>
<?php include './front_header.php';?>
<?php 
    include './db.php';
    include './front_header.php';
    $category = $_POST['category'];
  ?>
</head>
<body>
  <section class="howInner">
    <div>조금 무기력했던 <span>오늘,</span> 우우리가 추천하는</div>
    <div><span>사소한 할 일</span>을 실천해서</div>
    <div><span>나를 더 알아주고 아껴주면 어떨까요?</span></div>
    <div class="howgreen">
      <span>분명 나 자신이 자랑스러울 거에요!</span></br>
      오늘 우우리를 찾는 것도 작은 일을</br> 실행해주신 거랍니다 :)
    </div>
  </section>
  <!-- Slider main container -->
  <div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal1')"><img src="./img/e_a.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal2')"><img src="./img/e_b.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal3')"><img src="./img/e_c.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal7')"><img src="./img/e_g.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal8')"><img src="./img/e_h.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal1')"><img src="./img/e_a.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal2')"><img src="./img/e_b.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal3')"><img src="./img/e_c.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal7')"><img src="./img/e_g.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal8')"><img src="./img/e_h.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal1')"><img src="./img/e_a.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal2')"><img src="./img/e_b.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal3')"><img src="./img/e_c.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal7')"><img src="./img/e_g.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal8')"><img src="./img/e_h.png" alt=""></a></div>
    </div>
  </div>
  <div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal4')"><img src="./img/e_d.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal5')"><img src="./img/e_e.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal6')"><img src="./img/e_f.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal9')"><img src="./img/e_i.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal4')"><img src="./img/e_d.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal5')"><img src="./img/e_e.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal6')"><img src="./img/e_f.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal9')"><img src="./img/e_i.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal4')"><img src="./img/e_d.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal5')"><img src="./img/e_e.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal6')"><img src="./img/e_f.png" alt=""></a></div>
      <div class="swiper-slide"><a href="javascript:;" onclick="openModal('modal9')"><img src="./img/e_i.png" alt=""></a></div>
    </div>
  </div>
  <div>
    <ins class="adsbygoogle"
      style="display: block;"
      data-language="ko"
      data-ad-client="ca-pub-8021100486946859"
      data-ad-slot="7961267029"
      data-ad-format="autorelaxed"
      data-matched-content-ui-type="image_sidebyside,image_sidebyside"
      data-matched-content-rows-num="3,1"
      data-matched-content-columns-num="1,1"
      ></ins>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  </div>
  <!-- <footer>
    <a href="./home.php"><img src="./img/home.png" alt=""></a>
  </footer> -->
  <!-- 모달들 -->
    <div class="modal" id="modal1">
      <div class="modalContent" id="modalContent">
        <div class="modalX">
          <img onclick="closeModal('modal1')" src="./img/close.png" alt="">
        </div>
        <img class="contentImg" src="./img/e_a.png" alt="">
        <pre>
        간단한 움직임은 내 생각을 멈출 수 있습니다. 우울할 땐 생각이 꼬리에 꼬리를 물고 이어질 수 있습니다.
        생각이 문제 해결을 위해 어느 정도 필요하지만 과하다면 나의 에너지만 소비할 수 있게 됩니다.
        이때 정리 정돈처럼 간단한 움직임은 생각을 멈출 수 있습니다.
        </pre>
      </div>
    </div>
  <!-- 모달들 -->
    <div class="modal" id="modal2">
      <div class="modalContent" id="modalContent">
        <div class="modalX">
          <img onclick="closeModal('modal2')" src="./img/close.png" alt="">
        </div>
        <img class="contentImg" src="./img/e_b.png" alt="">
        <pre>
        하루에 일정 시간 이상 햇볕에 노출하는 시간을 갖는 것은 중요한 일입니다. 하루에 30분 이상 햇빛을 보도록 하는 게 좋습니다. 
        외출할 수 없는 상황이라면, 실내에서 커튼과 창문을 열어 환기를 시키면서 해가 가장 잘 들어오는 곳에서 머물기를 추천합니다.
        </pre>
      </div>
    </div>
  <!-- 모달들 -->
    <div class="modal" id="modal3">
      <div class="modalContent" id="modalContent">
        <div class="modalX">
          <img onclick="closeModal('modal3')" src="./img/close.png" alt="">
        </div>
        <img class="contentImg" src="./img/e_c.png" alt="">
        <pre>
        운동의 필요성이 느껴질 때 걷기 등 가벼운 운동부터 시작해 보세요!
        체계적이고 반복적인 운동은 신체 생리학적으로 엔도르핀과 모노아민의 변화를 유도하고 스트레스에 반응하여
        분비되는 물질인 코르티솔의 수준을 낮춰 기분을 좋게 하는 효과가 있습니다.
        또한 운동을 하는 동안에는 잡념으로부터 벗어날 수 있어 우울증으로 인한 부정적인 생각을 떨치는 데 도움이 됩니다.
        - 적어도 주 3회 이상, 30~40분 동안 지속적으로 운동하기
        - 주 2회 정도의 근력운동을 병행하기
        - 주치의나 운동 전문가의 지도 받기
        </pre>
      </div>
    </div>
  <!-- 모달들 -->
    <div class="modal" id="modal4">
      <div class="modalContent" id="modalContent">
        <div class="modalX">
          <img onclick="closeModal('modal4')" src="./img/close.png" alt="">
        </div>
        <img class="contentImg" src="./img/e_d.png" alt="">
        <pre>
        취미나 관심사에 시간을 할애하면서 생각을 환기 시켜주는 것도 좋아요
        음악 감상, 미술, 봉사활동, 독서, 요리, 브이로그, 등산, 여행, 영화 감상 등 다양한 취미 활동을 즐겨보는 건 어떨까요?
        </pre>
      </div>
    </div>
  <!-- 모달들 -->
    <div class="modal" id="modal5">
      <div class="modalContent" id="modalContent">
        <div class="modalX">
          <img onclick="closeModal('modal5')" src="./img/close.png" alt="">
        </div>
        <img class="contentImg" src="./img/e_e.png" alt="">
        <pre>
        가까운 친구나 가족과 대화하거나 모임에 참여하는 것은 우울감을 분산시키고 지지를 받을 수 있는 좋은 방법입니다. 
        혼자 있기보다는 나를 온전히 있는 그대로 이해해 주는 친구나 가족과 함께 시간을 보내보세요!
        특별한 대화를 하지 않더라도 자신을 이해해 주는 사람과 함께 하는 시간은 우울 감소에 도움이 될 수 있습니다.        
        </pre>
      </div>
    </div>
  <!-- 모달들 -->
    <div class="modal" id="modal6">
      <div class="modalContent" id="modalContent">
        <div class="modalX">
          <img onclick="closeModal('modal6')" src="./img/close.png" alt="">
        </div>
        <img class="contentImg" src="./img/e_f.png" alt="">
        <pre>
        명상, 묵상과 깊은 호흡을 통해 심신을 안정시키고 내가 어떤 생각을 하고 있는지, 나의 생각과 감정에 집중하고 나를 알아줄 수 있습니다.   
        </pre>
      </div>
    </div>
  <!-- 모달들 -->
    <div class="modal" id="modal7">
      <div class="modalContent" id="modalContent">
        <div class="modalX">
          <img onclick="closeModal('modal7')" src="./img/close.png" alt="">
        </div>
        <img class="contentImg" src="./img/e_g.png" alt="">
        <pre>
        두뇌에서 필요로 하는 영양소가 충분히 공급되어야 정신도 최적의 상태를 유지할 수 있습니다.
        따라서 단백질과 혈당지수가 낮은 탄수화물을 섭취하고, 과일과 채소를 통해 대사작용에 관여하는 비타민과 미네랄을 충분히 보충해야 합니다.
        여러 미네랄 중에서도 마그네슘은 우울증을 완화하는 데 도움이 됩니다.

        • 과식이나 붉은 고기, 패스트푸드, 인스턴트식품의 섭취를 줄이세요.
        • 식이섬유 섭취를 늘리고 지중해식 식단을 유지하세요.
        </pre>
      </div>
    </div>
  <!-- 모달들 -->
    <div class="modal" id="modal8">
      <div class="modalContent" id="modalContent">
        <div class="modalX">
          <img onclick="closeModal('modal8')" src="./img/close.png" alt="">
        </div>
        <img class="contentImg" src="./img/e_h.png" alt="">
        <pre>
        일상적인 자기 관리를 실천하는 것도 우울감을 줄이고 기분을 좋게 만드는 데 도움이 됩니다. 
        충분한 수면, 규칙적인 식사, 건강한 식습관을 유지하고, 스트레스 관리 기술을 익히는 등 자신의 건강과 복지를 중요시해야 합니다.
        일관된 수면 시간표를 가지고 있으면 우울증과 수면 장애 증상을 줄일 수 있습니다.

        • 잠자기 전 태블릿 PC, 스마트폰의 사용을 줄여주세요.
        • 평소 카페인이 들어 있는 음식의 섭취를 줄여주세요.
        • 잠자기 전 음주나 과도한 음식물 섭취를 줄여주세요.
        </pre>
      </div>
    </div>
  <!-- 모달들 -->
    <div class="modal" id="modal9">
      <div class="modalContent" id="modalContent">
        <div class="modalX">
          <img onclick="closeModal('modal9')" src="./img/close.png" alt="">
        </div>
        <img class="contentImg" src="./img/e_i.png" alt="">
        <pre>
        우울증에 빠지면 뇌의 일부인 전두엽의 기능이 저하되어 있는데 
        술을 마시게 되면 뇌세포 파괴가 촉진되어 뇌기능이 저하되고 우울증은 더 심해집니다.
        음주를 피하고 음주 사이에 물이나 알코올이 없는 음료 마시기
        </pre>
      </div>
    </div>

<h5>이 본문의 출처는 정신건강의학회(https://www.psychiatry.org)에 있습니다.</h5>
<h5>출처 방문 링크: <a target="_blank" href="https://www.psychiatry.org">https://www.psychiatry.org</a></h5>
</body>
<script src="./js/postData.js"></script>
<script>
  const swiper = new Swiper('.swiper', {
  direction: 'horizontal',
  slidesPerView: 2.3,
  spaceBetween: 20, // 이미지 사이의 간격 조정 (원하는 값으로 조절)
  loop: true,
  centeredSlides: true
});

// 모달 열기 함수
function openModal(modalId) {
  document.getElementById(modalId).style.display = "block";
}

function closeModal(modalId) {
  document.getElementById(modalId).style.display = "none";
  }

</script>
</html>