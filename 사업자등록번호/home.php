<!DOCTYPE html>
<html lang="ko">
<head>
<?php include './front_header.php';?>
<?php 
    include './db.php';
    include './front_header.php';
  ?>
<link rel="stylesheet" href="./css/commmon.css">
</head>
<body>
  <span class="keyy b_no">사업자코드</span> : <span class="val b_no"></span></br>
  <span class="keyy b_stt">사업자 유형</span> : <span class="val b_stt"></span></br>
  <span class="keyy tax_type">꾸꾸</span> : <span class="val tax_type"></span></br>
  <span class="keyy end_dt">꾺꾺</span> : <span class="val end_dt"></span>
</body>
<script>
var data = {"businesses" : [{
    "b_no": "3272401588", // 사업자번호 "xxxxxxx" 로 조회 시,
    "start_dt" : "20230830",
    "P_nm" : "김상아"
  }]}; 
// var data = {"businesses" : [{
//     "b_no": "3188700348", // 사업자번호 "xxxxxxx" 로 조회 시,
//     "start_dt" : "20160509",
//     "P_nm" : "박무진"
//   }]}; 

$.ajax({
  url: "https://api.odcloud.kr/api/nts-businessman/v1/validate?serviceKey=PLvBxj2M8c8fsixPehdFtSyBj5XFOeOozv40M48cUfgUdzzS%2FF82wmsLLw0fr%2BZsB0y7HB9f3te9bhPY2yShjA%3D%3D",  // serviceKey 값을 xxxxxx에 입력
  type: "POST",
  data: JSON.stringify(data), // json 을 string으로 변환하여 전송
  dataType: "JSON",
  contentType: "application/json",
  accept: "application/json",
  success: function(result) {
    // console.log(result.data[0].status.b_no);
    // console.log(result.data[0].status.b_stt);
    // console.log(result.data[0].status.tax_type);
    // console.log(result.data[0].status.end_dt);
    var status = result.data[0].status;

    $(".val.b_no").text(status.b_no);
    $(".val.b_stt").text(status.b_stt);
    $(".val.tax_type").text(status.tax_type);
    $(".val.end_dt").text(status.end_dt);
    
    var fields = result;
  },
  error: function(result) {
      console.log(result.responseText); //responseText의 에러메세지 확인
  }
});

</script>
</html>