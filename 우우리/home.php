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
    <div class="innerWrapper">
        <h1>
            <p>우울증 테스트</p>
        </h1>
        <div class="test_container">
            <?php
            $count = 1;
            $sql = query("SELECT * from test");
            foreach ($sql as $r => $row) {
                $seq = $row['seq'];
                echo '<div class="test">';
                echo '<h2>'.$count.'. '.$row['question'].'</h2>';
                ?>
                <ul class="radio_wrap">
                    <li class="radio radio-<?=$count?>_1">
                        <input id="radio-<?=$count?>_1" type="radio"
                        name="radio-<?=$count?>" value="0" 
                        data-seq="<?=$seq?>">
                        <label for="radio-<?=$count?>_1"></label>
                    </li>
                    <li class="radio radio-<?=$count?>_2">
                        <input id="radio-<?=$count?>_2" type="radio"
                        name="radio-<?=$count?>" value="1" 
                        data-seq="<?=$seq?>">
                        <label for="radio-<?=$count?>_2"></label>
                    </li>
                    <li class="radio radio-<?=$count?>_4">
                        <input id="radio-<?=$count?>_4" type="radio"
                        name="radio-<?=$count?>" value="2" 
                        data-seq="<?=$seq?>">
                        <label for="radio-<?=$count?>_4"></label>
                    </li>
                    <li class="radio radio-<?=$count?>_5">
                        <input id="radio-<?=$count?>_5" type="radio"
                        name="radio-<?=$count?>" value="3" 
                        data-seq="<?=$seq?>">
                        <label for="radio-<?=$count?>_5"></label>
                    </li>
                </ul>
                <?php
                echo '</div>';
                $count++;
            }

            $mysqli -> close(); // 닫기
            ?>
        </div>

        <!-- prev n next -->
        <div class="pnn">
            <button class="prev"><span></span></button>
            <button class="next"><span></span></button>
        </div>

        <div class="submit">테스트 결과보기</div>
    </div>
</body>
<script>

    const testElements = document.querySelectorAll('.test');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    let currentPage = 0;



    function changePage(offset) {
        currentPage = Math.min(Math.max(currentPage + offset, 0), Math.ceil(testElements.length / testsPerPage) - 1);
        showTests(currentPage);
    }

    prevButton.addEventListener('click', () => changePage(-1));
    nextButton.addEventListener('click', () => changePage(1));


    document.addEventListener("DOMContentLoaded", function () {
        const radioInputs = document.querySelectorAll('input[type="radio"]');
        const submitButton = document.querySelector(".submit");
        const totalQuestions = radioInputs.length / 4; // 선택지의 개수로 나누기


        submitButton.addEventListener("click", function () {
    const selectedInputs = Array.from(radioInputs).filter(input => input.checked);
    const answeredQuestions = selectedInputs.length;

    // 선택한 값
    const selectedValues = selectedInputs.map(input => ({
        seq: input.getAttribute("data-seq"),
        value: input.value
    }));
    // 모든 문항에 대한 체크 여부 확인
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
        alert(testResult + '점 양호한 상태입니다!');
    } else if (testResult >= 21 && testResult <= 45) {
        alert(testResult + '점 경도');
    } else if (testResult >= 46 && testResult <= 70) {
        alert(testResult + '점 중등도');
    } else if (testResult >= 71) {
        alert(testResult + '점 고도짱');
    }
})
});


</script>
</html>