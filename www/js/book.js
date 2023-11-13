// 즐겨찾기
let booked = false;
function bookmark(target,inputData,address) {
var encodeInputData = encodeURIComponent(inputData);
var encodeAddress = encodeURIComponent(address);
  if (!booked) {
  booked = true;
    if (!target.classList.contains('on')) {
      // 즐겨찾기를 눌렀을 때, 즐겨찾기가 되어 있지 않은 공고일 경우 => 추가
      target.classList.add('on');
	console.log(ID+' ' + inputData+' ' + address);
      $.ajax({
        url: './book_add.php',
        type: 'POST',
        data: {
          identification: ID,
          inputData: encodeInputData,
          address: encodeAddress
        },
        success: function(data) {
          alert('즐겨찾기에 등록되었습니다.')
        },
        error: function(xhr, status, error) {
          console.error(error);
        },
        complete: function() {
          booked = false;
        }
      });
    } else if (target.classList.contains('on')) {
      // 즐겨찾기를 눌렀을 때, 즐겨찾기가 되어 있는 공고일 경우 => 삭제
      target.classList.remove('on');

      $.ajax({
        url: './book_remove.php',
        type: 'POST',
        data: {
          identification: ID,
          inputData: encodeInputData,
          address: encodeAddress
        },
        success: function(data) {
          alert('즐겨찾기가 해제되었습니다.');
		  location.replace(location.href);
        },
        error: function(xhr, status, error) {
          console.error(error);
        },
        complete: function() {
		  setTimeout(() => {
			booked = false;
		  }, 1000);
        }
      });
    }
  }
  
}