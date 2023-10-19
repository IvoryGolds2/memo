<!DOCTYPE html>
<html lang="ko">
<head>
<?php 
    include './db.php';
    include './front_header.php';
    $category = $_POST['category'];
  ?>
</head>
<body>
  <header class="contentHeader">
  <a href="./home.php"><img src="./img/prev.png" alt=""></a>
    <a href="./menu.php"><img src="./img/allmenu.png" alt=""></a>
  </header>
  <section class="homeinnerWrapper">
  <div class="dicTop">
    <h1>23년도 달라진 연말정산</h1>
    <pre>알아갈수록 절세가 보이는 연말정산,
    2023년에는 어떤 것들이 달라졌는지 확인해보세요!</pre>
  </div>
  <div class="changedMenu">
    <a href="javascript:;" onclick="postDataContentD('A')" class="changedMenuBox">
      <h2>간소화 서비스 인증 수단 추가</h2>
      <pre>토스,하나은행,농협,뱅크샐러드 등 4종</pre>
    </a>
    <a href="javascript:;" onclick="postDataContentD('B')" class="changedMenuBox">
      <h2>신용카드 사용 소득공제 확대</h2>
      <pre>전년도 대비 소비금액 증가분의 20% 공제</pre>
    </a>
    <a href="javascript:;" onclick="postDataContentD('C')" class="changedMenuBox">
      <h2>대중교통 이용 공제 확대</h2>
      <pre>22년 7월 ~ 23년 6월 사용분의 80% 공제</pre>
    </a>
    <a href="javascript:;" onclick="postDataContentD('D')" class="changedMenuBox">
      <h2>무주택 근로자 월세액 공제율 상향</h2>
      <pre>급여액 7,000만원 이하, 월세액의 15~17% 공제</pre>
    </a>
    <div class="ads_wrap ads_main_sm">
      <ins class="adsbygoogle"
        style="margin-bottom:1rem;"
        data-ad-client="ca-pub-6697466452855244"
        data-ad-slot="2489448492"
        data-language="ko"
        ></ins>
      <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </div>
    <a href="javascript:;" onclick="postDataContentD('E')" class="changedMenuBox">
      <h2>청년형 장기펀드 소득공제</h2>
      <pre>연 600만원 한도, 납입금액의 40% 공제</pre>
    </a>
    <a href="javascript:;" onclick="postDataContentD('F')" class="changedMenuBox">
      <h2>전세대출 원리금 공제 한도 상향</h2>
      <pre>무주택자 원리금 공제 한도 400만원으로 상향</pre>
    </a>
    <a href="javascript:;" onclick="postDataContentD('G')" class="changedMenuBox">
      <h2>난임/선천성 이상아/미숙아 의료비 공제</h2>
      <pre>난임시술비 세액공제율 30% 상향, 선천성 이상아/미숙아 의료비 20% 공제</pre>
    </a>
    <a href="javascript:;" onclick="postDataContentD('H')" class="changedMenuBox">
      <h2>중소기업퇴직연금 세액공제</h2>
      <pre>연금소득에 퇴직연금계좌 유형 추가</pre>
    </a>
    <div class="ads_wrap ads_main_sm">
      <ins class="adsbygoogle"
        style="margin-bottom:1rem;"
        data-ad-client="ca-pub-6697466452855244"
        data-ad-slot="2489448492"
        data-language="ko"
        ></ins>
      <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </div>
    <a href="javascript:;" onclick="postDataContentD('I')" class="changedMenuBox">
      <h2>자가운전보조금 비과세 범위 확대</h2>
      <pre>종업원이 본인 명의로 임차한 차량 비과세 처리</pre>
    </a>
    <a href="javascript:;" onclick="postDataContentD('J')" class="changedMenuBox">
      <h2>문화비 신용카드 소득공제</h2>
      <pre>23년 4~12월 문화비 최대 40% 소득공제</pre>
    </a>
    <div class="ads_wrap ads_main_sm">
      <ins class="adsbygoogle"
        style="margin-bottom:1rem;"
        data-ad-client="ca-pub-6697466452855244"
        data-ad-slot="2489448492"
        data-language="ko"
        ></ins>
      <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </div>
  </div>
  </section>
</body>

</html>