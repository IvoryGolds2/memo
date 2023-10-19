<!DOCTYPE html>
<html lang="ko">
<head>
<?php 
    include './db.php';
    include './front_header.php';
    $category = $_POST['category'];
  ?>
</head>
<style>
    /* 광고모달 */
    * {-webkit-tap-highlight-color: transparent}
    .coopang_wrap {position:fixed;height: 100%;width: 100%;left: 0;top: 0;background-color: #fff;z-index: 1000;display: flex;justify-content: center;align-items: center; flex-direction: column;overflow-y: scroll;display:none;}
    .coopang_wrap img {width: 40%;max-width: 700px;margin-top:5rem;}
    .coopang_wrap .rest {text-align: center;font-size: 1.6rem;line-height: 1.2;color:#666;margin-bottom:3rem;}
    .coopang_wrap .info {text-align: center;font-size: 1.2rem;line-height: 1.2;color:#aaa;}
    .coopang_wrap .cancel {width:2rem;height:2rem;position:absolute;right:1.5rem;top:50%;transform:translateY(-50%);}
    .coopang_wrap .cancel span {width: 100%;height: 2px;left:0;top:50%;background-color: #fff;transform-origin: center;display:block;position: absolute;}
    .coopang_wrap .cancel span:nth-of-type(1){transform: rotate(45deg);}
    .coopang_wrap .cancel span:nth-of-type(2){transform: rotate(-45deg);}
    .coopang_wrap .link {width: calc(100% - 6rem);max-width: 700px;border-radius: 10rem;background-color: #9ac67d;margin-bottom: 1.5rem;box-shadow: 2px 2px 10px rgba(0, 0, 0, .2);border:none;position:relative;}
    .coopang_wrap .link p {color: #fff;font-size: 1.6rem;font-weight:600;width:calc(100% - 8rem);margin:0 auto;padding:1.5rem 0;}
    .coopang_wrap .link em {color: #53b9ff;font-size: 1.2rem;font-style:inherit;}
    .lock {overflow:hidden;touch-action:none;}
    



    /* 전면광고 */
    .fullAd_wrap {position: fixed;left: 0;top: 0;width: 100%;height:100vh;display: flex;align-items: center;flex-direction: column;justify-content: center;background-color: rgba(0, 0, 0, .4);backdrop-filter: blur(3px);z-index: 1000;}
    .fullAd_wrap .cancel {position: absolute;top:1.5rem;right: 1.5rem;width: 2.5rem;height: 2.5rem;display: flex;align-items: center;justify-content: center;background-color: #111;box-shadow: 0 0 .3rem rgba(0, 0, 0, .2);border-radius: 50%;display: none;z-index: 100000;}
    .fullAd_wrap .cancel span {position: fixed;width: 60%;height: 1.5px;transform-origin: center;background-color: #fff;}
    .fullAd_wrap .cancel span:nth-of-type(1) {transform: rotate(45deg);}
    .fullAd_wrap .cancel span:nth-of-type(2) {transform: rotate(-45deg);}
    .ins_wrap {position: absolute;top: 50%;left: 50%;width: 100%;transform: translate(-50%, -50%);height: fit-content;}
    .time {position: absolute;transform: translateX(-50%);left: 50%;top: 1.5rem;padding: 1rem 3rem;color: #666;z-index: 1000;font-weight: 500;border-radius: 10rem;background-color: #fff;box-shadow: 0 0 .5rem rgba(0, 0, 0, .2);}
    p {font-size: 1.6rem;line-height: 1.4;color:#fff;}

</style>
<body>
  <div class="sunWrapper">
    <img class="sun" src="./img/deco.png" alt="">
  </div>
  <div class="checkinnerWrapper">
  <div class="test_container">
  <?php
    $count = 1;
    $sql = query("SELECT * from test");
    foreach ($sql as $r => $row) {
        if ($count === 4 || $count === 8 || $count === 12 || $count === 16 || $count === 20 || $count === 24 || $count === 28) {
            $seq = $row['seq'];
            echo '<div class="test">';
            echo '<h2>'.$row['question'].'</h2>';
            ?>
            <ul class="radio_wrap">
                <li class="radio radio-<?=$count?>_1">
                    <input id="radio-<?=$count?>_1" type="radio"
                    name="radio-<?=$count?>" value="0" 
                    data-seq="<?=$seq?>">
                    <label class="circle1" for="radio-<?=$count?>_1"></label>
                    <div>전혀</br>그렇지 않다</div>
                </li>
                <li class="radio radio-<?=$count?>_2">
                    <input id="radio-<?=$count?>_2" type="radio"
                    name="radio-<?=$count?>" value="1" 
                    data-seq="<?=$seq?>">
                    <label class="circle2" for="radio-<?=$count?>_2"></label>
                    <div>가끔</br>그렇다</div>
                </li>
                <li class="radio radio-<?=$count?>_4">
                    <input id="radio-<?=$count?>_4" type="radio"
                    name="radio-<?=$count?>" value="2" 
                    data-seq="<?=$seq?>">
                    <label class="circle3" for="radio-<?=$count?>_4"></label>
                    <div>자주</br>그렇다</div>
                </li>
                <li class="radio radio-<?=$count?>_5">
                    <input id="radio-<?=$count?>_5" type="radio"
                    name="radio-<?=$count?>" value="3" 
                    data-seq="<?=$seq?>">
                    <label class="circle4" for="radio-<?=$count?>_5"></label>
                    <div>매일</br>그렇다</div>
                </li>
            </ul>
            <?php
            echo '</div>';
            echo'<div class="ads_wrap ads_main_sm">
                    <ins class="adsbygoogle"
                        data-ad-client="ca-pub-8021100486946859"
                        data-ad-slot="5718247066"
                        data-language="ko"
                        ></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>';
        } else {
            $seq = $row['seq'];
            echo '<div class="test">';
            echo '<h2>'.$row['question'].'</h2>';
            ?>
            <ul class="radio_wrap">
                <li class="radio radio-<?=$count?>_1">
                    <input id="radio-<?=$count?>_1" type="radio"
                    name="radio-<?=$count?>" value="0" 
                    data-seq="<?=$seq?>">
                    <label class="circle1" for="radio-<?=$count?>_1"></label>
                    <div>전혀</br>그렇지 않다</div>
                </li>
                <li class="radio radio-<?=$count?>_2">
                    <input id="radio-<?=$count?>_2" type="radio"
                    name="radio-<?=$count?>" value="1" 
                    data-seq="<?=$seq?>">
                    <label class="circle2" for="radio-<?=$count?>_2"></label>
                    <div>가끔</br>그렇다</div>
                </li>
                <li class="radio radio-<?=$count?>_4">
                    <input id="radio-<?=$count?>_4" type="radio"
                    name="radio-<?=$count?>" value="2" 
                    data-seq="<?=$seq?>">
                    <label class="circle3" for="radio-<?=$count?>_4"></label>
                    <div>자주</br>그렇다</div>
                </li>
                <li class="radio radio-<?=$count?>_5">
                    <input id="radio-<?=$count?>_5" type="radio"
                    name="radio-<?=$count?>" value="3" 
                    data-seq="<?=$seq?>">
                    <label class="circle4" for="radio-<?=$count?>_5"></label>
                    <div>매일</br>그렇다</div>
                </li>
            </ul>
            <?php
            echo '</div>';
        }
        $count++;
    }
    $mysqli -> close(); // 닫기
    ?>
  </div>
  <div class="flexdiv"><div class="submit">테스트 결과보기</div></div>
  <h5 class="mar">이 본문의 출처는 정신건강의학회(https://www.psychiatry.org)에 있습니다.</h5>
  <h5>출처 방문 링크: <a target="_blank" href="https://www.psychiatry.org">https://www.psychiatry.org</a></h5>
  </div>
  <!-- <footer>
    <a href="./home.php"><img src="./img/home.png" alt=""></a>
  </footer> -->

    <!-- 광고 -->
    <div class="coopang_wrap">
        <p style="font-size:1.8rem;text-align:center;margin:5rem 0;line-height:1.4;font-weight:bold;color:#111;">쿠팡 방문은 앱을 운영할 수 있는 힘이 됩니다.<br>항상 앱을 사랑해주셔서 감사합니다.</p>
        <!-- <img src="./img/coopang.png" alt=""> -->
        <p class="rest">쿠팡에 잠시 다녀오실 동안<br>테스트 결과를 가져올게요! 영차! 영차!</p>
        <button class="link">
            <p>광고보고오기 (ﾉ◕ヮ◕)ﾉ*:･ﾟ✧</p>
            <div class="cancel"><span></span><span></span></div>
        </button>
        <p class="info">이 포스팅은 쿠팡 파트너스 활동의 일환으로,<br>이에따른 일정액의 수수료를 제공받습니다.</p>
    </div>


    <!-- 전면광고 -->
    <div class="fullAd_wrap off">
        <p class="info">결과를 불러오는 중이에요</p>
        <P class="time"></P>
        <div class="ins_wrap">
            <!-- 전면광고제작 시도코드1 -->
            <ins class="adsbygoogle"
                data-language="ko"
                style="display:inline-block;width:728px;height:100vh"
                data-ad-client="ca-pub-8021100486946859"
                data-ad-slot="5718247066"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>


    <!-- js에서 window.open 사용시 간혹 오류 발생하므로 display none 상태의 a태그 사용 -->
    <a href="https://link.coupang.com/a/bbqXdx" style="display:none;" id="coopang_link" target="_blank"></a>


</body>
<script src="./js/postData.js"></script>
<script>
    // document.addEventListener("DOMContentLoaded", function () {
    //     const submitButton = document.querySelector(".submit");
    //     submitButton.addEventListener("click", function () {
    //         coopang();
    //     })
    // });


    // /** 광고창 코드 */
    // function coopang(){
    //     var storage_time = 12 * 60 * 60 * 1000; // 12시간 동안 보이지 않게
    //     // var storage_time = 10 * 1000; // 10초 동안 보이지 않게
    //     // var storage_time = -1; // 광고가 항상 안보임
    //     // var storage_time = 0; // 광고가 항상 보임
    //     var adTime = localStorage.getItem("adTime");
    //     const body = document.querySelector('body');
    //     const cancel = document.querySelector('.cancel');
    //     const coopang_link = document.querySelector('#coopang_link');
    //     const coopang_wrap = document.querySelector('.coopang_wrap');
    //     const coopang_wrap_btn = document.querySelector('.coopang_wrap button p');

        
    //     coopang_wrap_btn.addEventListener('click',function () {
    //         coopang_link.click();
    //         setAdTime();
    //         goNext();
    //     })
    //     cancel.addEventListener('click',function () {
    //         // 취소 - 창이 닫히긴 하지만 다시보지않기 설정은 x 
    //         goNext();
    //         console.log(this);
    //     })
    //     if (storage_time >= 0 && (!adTime || new Date() >= new Date(adTime))) { // 광고보여줌
    //         console.log('다시보지않음 만료');
    //         coopang_wrap.style.display = 'flex';
    //         body.classList.add('lock');

    //     } else { // 광고안보여줌
    //         console.log('다시보지않음 적용중');
    //         goNext();
    //     }
    //     function setAdTime() {
    //         var adt = new Date();
    //         adt.setTime(adt.getTime() + storage_time);
    //         localStorage.setItem("adTime", adt);
    //         console.log('다시보지않음');
    //     }
    //     function goNext(){
    //         body.classList.remove('lock');
    //         coopang_wrap.style.display = 'none';

    //         // 다음페이지 동작
    //         setTimeout(() => {
    //             checkSubmit();
    //         }, 50);
      
    //     }
    // }


  
    // /** 테스트 결과 판단 */
    // function checkSubmit(){
        
    //     const radioInputs = document.querySelectorAll('input[type="radio"]');
    //     const totalQuestions = radioInputs.length / 4; // 선택지의 개수로 나누기
    //     const selectedInputs = Array.from(radioInputs).filter(input => input.checked);
    //     const answeredQuestions = selectedInputs.length;
    //     // 선택한 값
    //     const selectedValues = selectedInputs.map(input => ({
    //         seq: input.getAttribute("data-seq"),
    //         value: input.value
    //     }));

    //     const allQuestionsAnswered = answeredQuestions === totalQuestions;

    //     if (!allQuestionsAnswered) {
    //         alert(`모든 문항에 대한 답변이 필요합니다.\n\n- 총 ${totalQuestions}개중 ${answeredQuestions}개 답변함`);
    //         return; // 모든 문항에 대한 답변이 없으면 결과를 계산하지 않고 함수 종료
    //     }

    //     // 결과
    //     let testResult = 0;
    //     selectedValues.forEach(el => {
    //         testResult += parseInt(el.value);
    //     });

    //     console.log(`테스트 결과: ${testResult}점`); // 로그로 결과 표시

    //     if (testResult <= 21) {
    //         sessionStorage.setItem('testResult', testResult);
    //         window.location.href = './resulta.php';
    //     } else if (testResult >= 21 && testResult <= 45) {
    //         sessionStorage.setItem('testResult', testResult);
    //         window.location.href = './resultb.php';
    //     } else if (testResult >= 46 && testResult <= 70) {
    //         sessionStorage.setItem('testResult', testResult);
    //         window.location.href = './resultc.php';
    //     } else if (testResult >= 71) {
    //         sessionStorage.setItem('testResult', testResult);
    //         window.location.href = './resultd.php';
    //     }
    // }
</script>
<script>

    document.addEventListener("DOMContentLoaded", function () {
        var storage_time = 12 * 60 * 60 * 1000; // 12시간 동안 보이지 않게
        // var storage_time = 30 * 1000; // 10초 동안 보이지 않게
        // var storage_time = -1; // 광고가 항상 안보임
        // var storage_time = 0; // 광고가 항상 보임
        const body = document.querySelector('body');
        const forPlanner = document.querySelector('.forPlanner');
        const submitButton = document.querySelector(".submit");
        const coopang_cancel = document.querySelector('.coopang_wrap .cancel');
        const coopang_link = document.querySelector('#coopang_link');
        const coopang_wrap = document.querySelector('.coopang_wrap');
        const coopang_wrap_btn = document.querySelector('.coopang_wrap button p');


        // 1. 결과보기 클릭
        submitButton.addEventListener("click", function () {
            coopang();
        })

        // 2. 쿠팡창 작동
        coopang_wrap_btn.addEventListener('click', ()=>{
            coopang_link.click(); // window.open 대체
            setAdTime();
            goNext();
        });
        coopang_cancel.addEventListener('click', ()=>{
            goNext();
        })
        
        /** 쿠팡광고 보여줄지 판단 */
        function coopang(){
            var adTime = localStorage.getItem("adTime");
            console.log(adTime);
            if (storage_time >= 0 && (!adTime || new Date() >= new Date(adTime))) {
                console.log('다시보지않음 만료');
                coopang_wrap.style.display = 'flex';
                body.classList.add('lock');
            } else {
                console.log('다시보지않음 적용중');

                // +++ 쿠팡 광고를 보여주지 않을 경우에는 애드센스 전면광고 등장
                fullAdShow();
            }
        }
        /** 다시보지않기 */
        function setAdTime() {
            var adt = new Date();
            adt.setTime(adt.getTime() + storage_time);
            localStorage.setItem("adTime", adt);
            console.log('다시보지않음');
        }
        /** 쿠팡창 닫기 */
        function goNext(){
            body.classList.remove('lock');
            coopang_wrap.style.display = 'none';
            setTimeout(() => { checkSubmit(); }, 50);
        }
        /** 다음동작 */
        function checkSubmit(){
            const radioInputs = document.querySelectorAll('input[type="radio"]');
            const totalQuestions = radioInputs.length / 4; // 선택지의 개수로 나누기
            const selectedInputs = Array.from(radioInputs).filter(input => input.checked);
            const answeredQuestions = selectedInputs.length;
            // 선택한 값
            const selectedValues = selectedInputs.map(input => ({
                seq: input.getAttribute("data-seq"),
                value: input.value
            }));
    
            const allQuestionsAnswered = answeredQuestions === totalQuestions;
    
            if (!allQuestionsAnswered) {
                alert(`모든 문항에 대한 답변이 필요합니다.\n\n- 총 ${totalQuestions}개중 ${answeredQuestions}개 답변함`);
                return; // 모든 문항에 대한 답변이 없으면 결과를 계산하지 않고 함수 종료
            }
    
            // 결과
            let testResult = 0;
            selectedValues.forEach(el => {
                testResult += parseInt(el.value);
            });
    
            console.log(`테스트 결과: ${testResult}점`); // 로그로 결과 표시
    
            if (testResult <= 21) {
                sessionStorage.setItem('testResult', testResult);
                window.location.href = './resulta.php';
            } else if (testResult >= 21 && testResult <= 45) {
                sessionStorage.setItem('testResult', testResult);
                window.location.href = './resultb.php';
            } else if (testResult >= 46 && testResult <= 70) {
                sessionStorage.setItem('testResult', testResult);
                window.location.href = './resultc.php';
            } else if (testResult >= 71) {
                sessionStorage.setItem('testResult', testResult);
                window.location.href = './resultd.php';
            }


        
        }
        /** 전면광고 */
        function fullAdShow() {
            const fullAd_wrap = document.querySelector('.fullAd_wrap');
            const time = document.querySelector('.time');
            let randomNumber = Math.random();
            if(randomNumber < 0.75){ // 확률
    
                document.querySelector('body').style.overflow = 'hidden';
                fullAd_wrap.classList.remove('off');
                
                // 타이머
                var timeText = 5;
                time.textContent = timeText + '초';
    
                var countdown = setInterval(function () {
                    timeText -= 1;
                    time.textContent = timeText + '초';
    
                    if (timeText <= 0) {
                        time.textContent = '창이 닫힙니다';
                        clearInterval(countdown);
                        
                        
                        setTimeout(function() {
                            closeAd();
                        }, 500);
                    }
                }, 1000);
    
                function closeAd() {
                    fullAd_wrap.classList.add('off');
                    document.querySelector('body').style.overflow = 'auto';
                }
    
                setTimeout(() => { goNext(); }, 5500);
            }else{
                // 확률에 해당되지 않으면 광고창 제거
                fullAd_wrap.classList.add('off');
                goNext();
            }
            console.log('광고확률 : ' + randomNumber);
    
        }
        
        
    });
    
</script>
</html>