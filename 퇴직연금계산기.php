<body>
<input type="text" id="valueA" placeholder="값 A 입력">
<input type="text" id="valueB" placeholder="값 B 입력">
<input type="text" id="valueC" placeholder="값 C 입력">
<!-- 나머지 입력 필드도 동일하게 생성 -->
<button onclick="calculateResult()">계산</button>
<div id="result"></div>
</body>
<script>
    var values = {};

// 값 저장 함수
// 값 계산 함수
function calculateResult() {
    // 입력 필드의 id를 사용하여 값을 가져와서 숫자로 변환
    var valueA = parseFloat(document.getElementById('valueA').value);
    var valueB = parseFloat(document.getElementById('valueB').value);
    var valueC = parseFloat(document.getElementById('valueC').value);
    var transformedValueB = valueB / 100;
    // 값이 숫자로 변환되지 않으면 경고 메시지 표시
    if (isNaN(valueA) || isNaN(valueB) || isNaN(valueC)) {
        alert("올바른 숫자를 입력하세요.");
        return; // 입력이 잘못된 경우 함수 종료
    }

    var result = (valueA * transformedValueB * valueC) / 365;

    // 결과를 화면에 표시
    var resultElement = document.getElementById("result");
    resultElement.innerHTML = "계산 결과: " + Math.floor(result) + "원";
    }
</script>