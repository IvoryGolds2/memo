<!DOCTYPE html>
<html lang="ko">
<head>
<?php 
include './db.php';
include './front_header.php';
$category = $_POST['category'];

if(isset($_POST['start'])) {
    $start = $_POST['start'];
} else {
    $start = 1;
}

if(isset($_POST['end'])) {
    $end = $_POST['end'];
} else {
    $end = 10;
}
?>
</head>
<style>
</style>
<body>
    <div id="loading-mask" style="position: fixed; z-index: 999; left: 0; right: 0; top: 0; bottom: 0;"></div>
    <div id="wrap" class="gotest">
        <a href="./home.php"><img src="./img/logo.png" alt="" class="logo"></a>
        <div class="test_container">
            <?php


            # 문제수
            $start_question = 1; // 1번
            $end_question = 0; // 마지막번(문제 총)
            $sql_all = query("SELECT * FROM stress_test");
            foreach ($sql_all as $r_all => $row_all) {
                $end_question++;
            }
            // echo '총 문제수 : '.$end_question;
            // echo '<br><br>시작 '.$start;
            // echo '<br>끝 '.$end;



            # 문제 출력
            $count = 1;
            $sql = query("SELECT * FROM stress_test WHERE seq >= '{$start}' AND seq <= '{$end}'; ");
            foreach ($sql as $r => $row) {
                $seq = $row['seq'];
                echo '<div class="test">';
                // echo '<h2>'.$row['question'].'</h2>';
                echo '<h2>'.$seq.'. '.$row['question'].'</h2>';
                ?>
                <ul class="radio_wrap">
                    <li class="radio radio-<?=$count?>_1">
                        <input id="radio-<?=$count?>_1" type="radio" name="radio-<?=$count?>" value="0" data-seq="<?=$seq?>">
                        <label class="circle1" for="radio-<?=$count?>_1"><div>전혀</br>그렇지 않다</div></label>
                        
                    </li>
                    <li class="radio radio-<?=$count?>_2">
                        <input id="radio-<?=$count?>_2" type="radio" name="radio-<?=$count?>" value="1"  data-seq="<?=$seq?>">
                        <label class="circle2" for="radio-<?=$count?>_2"><div>가끔</br>그렇다</div></label>
                        
                    </li>
                    <li class="radio radio-<?=$count?>_4">
                        <input id="radio-<?=$count?>_4" type="radio" name="radio-<?=$count?>" value="2" data-seq="<?=$seq?>">
                        <label class="circle3" for="radio-<?=$count?>_4"><div>자주</br>그렇다</div></label>
                        
                    </li>
                    <li class="radio radio-<?=$count?>_5">
                        <input id="radio-<?=$count?>_5" type="radio" name="radio-<?=$count?>" value="3" data-seq="<?=$seq?>">
                        <label class="circle4" for="radio-<?=$count?>_5"><div>매일</br>그렇다</div></label>
                        
                    </li>
                </ul>
                <?php
                echo '</div>';
                if($count % 4 == 0){
                    // echo '<p style="font-size:2rem;font-weight:bold; border:3px solid red;color:red;margin-bottom:2rem;text-align:center;padding:1.5rem;">광고자리!';
                }
                $count++;
            }

            
            ?>
        </div>
        
        
        <!-- 버튼 -->
        <div class="btn_wrap">
            <?php
            if($start == $start_question){ // 첫문항이면
                // echo '<div class="before gray">이전</div>'; // 버튼 비활성화
                echo '<div style="opacity:0"></div>';
            }else{
                echo '<div class="before">이전</div>';
            }
            if($end == $end_question){ // 끝문항이면
                echo '<div class="submit">결과보기</div>'; // 버튼 비활성화
            }else{
                echo '<div class="after">다음</div>';
            }
            ?>
        </div>
        <div class="bottomText">
        <h5>이 본문의 출처는 정신건강의학회(https://www.psychiatry.org)에 있습니다.</h5>
        <h5>출처 방문 링크: <a target="_blank" href="https://www.psychiatry.org">https://www.psychiatry.org</a></h5>
        </div>

        

        
        <?php $mysqli -> close(); // 닫기 ?>
    </div>
  

    <!-- 광고 -->
    <div class="coopang_wrap">
        <p class="welcome" style="font-size:1.8rem;text-align:center;margin:5rem 0;line-height:1.4;font-weight:bold;color:#111;">
            쿠팡 방문은 앱을 운영할 수 있는 힘이 됩니다.<br>
            항상 앱을 사랑해주셔서 감사합니다.
        </p>
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


    <!-- window.open 오류 방지용 -->
    <a href="https://link.coupang.com/a/bbqXdx" style="display:none;" id="coopang_link" target="_blank"></a>


</body>
<script>

    // 로컬스토리지 배열
    var questionArray = [];
    if (localStorage.getItem('questionArray')) {
        questionArray = JSON.parse(localStorage.getItem('questionArray'));
    } else {
        // 스토리지에 없으면
        for (let i = 1; i <= 30; i++) { // 총문제수 30
            questionArray.push({ 
                seq: i,
                ques: i+'번째 문제',
                ans: null
            });
        }
        localStorage.setItem('questionArray', JSON.stringify(questionArray));
    }

    // 값이 변하면 답변 저장
    const radios = document.querySelectorAll('.radio_wrap input');
    radios.forEach((el, index) => {
        el.addEventListener('change', () => {
            const ans = parseInt(el.value); // 답변
            console.log(el.dataset.seq); // 답변한 문제의 번호
            questionArray[el.dataset.seq - 1].ans = ans;
            localStorage.setItem('questionArray', JSON.stringify(questionArray));
            
            // console.log(JSON.parse(localStorage.getItem('questionArray')));
        });
    });

    // 새로고침해도 값 잔여
    window.addEventListener('load', () => {
        const storedQuestionArray = JSON.parse(localStorage.getItem('questionArray'));
        if (storedQuestionArray) {
            storedQuestionArray.forEach((data, index) => {
                const radioInput = document.querySelector(`input[data-seq="${data.seq}"][value="${data.ans}"]`);
                if (radioInput) {
                    radioInput.checked = true;
                }
            });
        }
    });


    // 이전 + 다음 버튼
    const btn_before = document.querySelector('.btn_wrap .before');
    const btn_after = document.querySelector('.btn_wrap .after');
    if(btn_before){
        btn_before.addEventListener('click',() => {
            if(btn_before.classList.contains('gray') == false){
                history.back();
            }
        })
    }
    if(btn_after){
        btn_after.addEventListener('click',() => {
            if(btn_after.classList.contains('gray') == false){
                let startQ = <?=$start?>;
                let endQ = <?=$end?>;
                switch (startQ) {
                    case 1: startQ = 11; break;
                    case 11: startQ = 21; break;
                    default: break;
                }
                switch (endQ) {
                    case 10: endQ = 20; break;
                    case 20: endQ = 30; break;
                    default: break;
                }
                goTestPost(startQ, endQ);
            }
        })
    }

    function goTestPost(start, end){
        const form = document.createElement('form');
        form.classList.add('off');
        form.action = './gotest.php';
        form.method = 'POST';

        const input1 = document.createElement('input');
        input1.name = 'start';
        input1.value = start;

        const input2 = document.createElement('input');
        input2.name = 'end';
        input2.value = end;

        form.appendChild(input1);
        form.appendChild(input2);
        document.body.appendChild(form);
        form.submit();
    }







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
            // checkSubmit();
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

                // 쿠팡 광고를 보여주지 않을 경우에는 애드센스 전면광고 등장
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



        /** 결과게산 */
        function checkSubmit(){
            const storageArray = JSON.parse(localStorage.getItem('questionArray'));
            const totalQ = storageArray.length;
            const answeredQ = storageArray.filter(item => item.ans !== null).length;
            
            const allQA = answeredQ === totalQ;
    
            if (!allQA) {
                alert(`모든 문항에 대한 답변이 필요합니다.\n\n- 총 ${totalQ}개중 ${answeredQ}개 답변함`);
                return; // 모든 문항에 대한 답변이 없으면 결과를 계산하지 않고 함수 종료
            }

            // 결과
            let testResult = questionArray.reduce((acc, item) => acc + (item.ans || 0), 0);;
            console.log(`테스트 결과: ${testResult}점`); // 로그로 결과 표시
            if (testResult <= 21) {
                sessionStorage.setItem('testResult', testResult);
                window.location.href = './result_a.php';
            } else if (testResult >= 21 && testResult <= 40) {
                sessionStorage.setItem('testResult', testResult);
                window.location.href = './result_b.php';
            } else if (testResult >= 41 && testResult <= 70) {
                sessionStorage.setItem('testResult', testResult);
                window.location.href = './result_c.php';
            } else if (testResult >= 71) {
                sessionStorage.setItem('testResult', testResult);
                window.location.href = './result_d.php';
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