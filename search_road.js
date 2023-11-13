var areaName = document.querySelector("#input_box");
var resultUl = document.querySelector(".result");
var addressArray = [];
var arrUnique = [];
var keyKo = ['zipNo','lnmAdres', 'rnAdres',];
var keyEn = ['roadAddr', 'jibunAddr'];
//li :: api 배열
//adr :: DB 정보 배열
//메인페이지 로드 시 북마크 주소만 출력

$.ajax({
	url: './bookArr.php',
	type: 'GET',
	dataType: 'json',
	tryCount : 1, 
    retryLimit : 3,
	success: function(bookArr) {
		//북마크 배열
		var bookedAddressArr = [];
		console.log(bookedAddressArr);
		bookArr.forEach(items => {
			var obj = {
				inputData : items.inputData,
				address : items.address
			}
			bookedAddressArr.push(obj);
			console.log(items);
		});
		bookedAddressArr.forEach(adr => {
			//영문검색 
			$.ajax({
				url :"https://business.juso.go.kr/addrlink/addrEngApiJsonp.do",
				type:"post",
				data: {
					'confmKey': 'devU01TX0FVVEgyMDIzMDkyNjExMDkzMjExNDEzMjQ=',
					'keyword': adr.inputData,
					'countPerPage' : 100
				},
				dataType:"jsonp",
				crossDomain:true,
				tryCount : 1, 
                retryLimit : 3,
				success:function(xmlStr){
					if(navigator.appName.indexOf("Microsoft") > -1){
						var xmlData = new ActiveXObject("Microsoft.XMLDOM");
						xmlData.loadXML(xmlStr.returnXml)
						console.log(xmlStr);
					}else{
						var xmlData = xmlStr.returnXml;
					}
					$("#list").html("");
					var errCode = $(xmlData).find("errorCode").text();
					var errDesc = $(xmlData).find("errorMessage").text();
					if(errCode != "0"){
						// alert('동일한 주소를 찾을 수 없습니다.');
					}else{
						if(xmlStr != null){
							makeList(xmlData);
						}
					}
				},
				beforeSend: function() {
				},
				error: function(error) {
					console.log('영문검색 오류');
					console.log(error);

					//재시도
                    this.tryCount++;
                    retry();    
                    return; 
				},
				complete: function() {
				}
			});
		});
		
	},
	beforeSend: function() {
	},
	error: function(error) {
		console.log(error);
		//재시도
		retry();           
		return; 
	},
	complete: function() {
	}
});




//검색기능
$("#search_btn").click(function() {
  //window.location.href = "./result.php";
	if (areaName.value.trim() === '') {
    alert("값을 입력해 주세요");
    return;
  }
	$(".result").empty();
	var contentDiv = document.createElement('div');
	contentDiv.classList.add('searchContent');
	
	var greetingDiv = document.createElement('h1');
	greetingDiv.textContent = '"';
	contentDiv.appendChild(greetingDiv);
	
	var greetingDiv = document.createElement('h2');
	greetingDiv.textContent = areaName.value;
	contentDiv.appendChild(greetingDiv);
	
	var greetingDiv = document.createElement('h2');
	greetingDiv.textContent = '"';
	contentDiv.appendChild(greetingDiv);
	
	var greetingDiv = document.createElement('h3');
	greetingDiv.textContent = '에 대한 검색 결과입니다.';
	contentDiv.appendChild(greetingDiv);
	
	// contentDiv를 resultUl에 추가
	resultUl.appendChild(contentDiv);
	//영문검색 : 필터링
	if (!checkSearchedWord(areaName)) {
    return ;
	}

	//영문검색 
	$.ajax({
		url :"https://business.juso.go.kr/addrlink/addrEngApiJsonp.do",
		type:"post",
		data: {
			'confmKey': 'devU01TX0FVVEgyMDIzMDkyNjExMDkzMjExNDEzMjQ=',
			'keyword': areaName.value,
			'countPerPage' : 100
		},
		dataType:"jsonp",
		crossDomain:true,
		success:function(xmlStr){
			if(navigator.appName.indexOf("Microsoft") > -1){
				var xmlData = new ActiveXObject("Microsoft.XMLDOM");
				xmlData.loadXML(xmlStr.returnXml)
			}else{
				var xmlData = xmlStr.returnXml;
			}
			var errCode = $(xmlData).find("errorCode").text();
			var errDesc = $(xmlData).find("errorMessage").text();
			if(errCode != "0"){
				// alert('동일한 주소를 찾을 수 없습니다.');
				return;
			}else{
				if(xmlStr != null){
					makeList(xmlData);
				}
			}
		},
		beforeSend: function() {
			console.log('영문검색중');
		},
		error: function(error) {
			console.log('error');
			console.log(error);
			//재시도
			retry();           
			return;
		},
		complete: function() {
		}
	});

	//검색 기능
	$.ajax({
		url: './api_xml.php',
		type: 'GET',
		dataType: 'json',
		tryCount : 1, 
		retryLimit : 3,
		data: {
			'ServiceKey': 'kdt/mwH6Dy5yHt5be/NHgYhJbldXO0JC/zVe1JAnCgOAUTWLi73bqpLuL36R/PQQh9TINdBOd5k+tWE90rHIAg==',
			'srchwrd': areaName.value,
			'searchSe': 'dong'
		},
		success: function(data1) {
			if(data1.length != 0) { 
				// 동주소로 검색
				searchFunc(data1);
			} else if(data1.length == 0) {
				//도로명 검색
				$.ajax({
					url: './api_xml.php',
					type: 'GET',
					dataType: 'json',
					tryCount : 1, 
					retryLimit : 3,
					data: {
						'ServiceKey': 'kdt/mwH6Dy5yHt5be/NHgYhJbldXO0JC/zVe1JAnCgOAUTWLi73bqpLuL36R/PQQh9TINdBOd5k+tWE90rHIAg==',
						'srchwrd': areaName.value,
						'searchSe': 'road'
					},	
					success: function(data2) {
						searchFunc(data2);
						if(data2.length == 0) {
							var noData = document.createElement('div');
							noData.classList.add('no_data');
							noData.innerHTML = '<img src="../img/img.png" alt="">'
							resultUl.appendChild(noData);
						}
					},
					beforeSend: function() {
						console.log('도로명검색중');
					},
					error: function(error) {
						console.log('도로명 검색 오류');
						console.log(error);
						//재시도
						retry();           
						return;
					},
					complete: function() {
					}
				});
			} 
		},
		beforeSend: function() {
			console.log('동주소검색중');
		},
		error: function(error) {
			console.log('동주소 검색 오류');
			console.log(error);
			//재시도
			retry();          
			return;
		},
		complete: function() {
		}
	});
});

//검색기능
$(window).ready(function() {
	console.log(keyword1);
	if (keyword1.trim() === '') {
    alert("값을 입력해 주세요");
    return;
  }
	$(".result").empty();
	resultUl.classList.remove('main_book');

	var contentDiv = document.createElement('div');
	contentDiv.classList.add('searchContent');
	
	var greetingDiv = document.createElement('h1');
	greetingDiv.textContent = '"';
	contentDiv.appendChild(greetingDiv);
	
	var greetingDiv = document.createElement('h2');
	greetingDiv.textContent = keyword1;
	contentDiv.appendChild(greetingDiv);
	
	var greetingDiv = document.createElement('h2');
	greetingDiv.textContent = '"';
	contentDiv.appendChild(greetingDiv);
	
	var greetingDiv = document.createElement('h3');
	greetingDiv.textContent = '에 대한 검색 결과입니다.';
	contentDiv.appendChild(greetingDiv);
	
	// contentDiv를 resultUl에 추가
	resultUl.appendChild(contentDiv);

	//영문검색 : 필터링
	if (!checkSearchedWord(areaName)) {
		return ;
	}

	//검색 기능
	$.ajax({
		url: './api_xml.php',
		type: 'GET',
		dataType: 'json',
		tryCount : 1, 
		retryLimit : 3,
		data: {
			'ServiceKey': 'kdt/mwH6Dy5yHt5be/NHgYhJbldXO0JC/zVe1JAnCgOAUTWLi73bqpLuL36R/PQQh9TINdBOd5k+tWE90rHIAg==',
			'srchwrd': keyword1,
			'searchSe': 'dong'
		},
		success: function(data1) {
			if(data1.length != 0) { 
				// 동주소로 검색
				searchFunc(data1);
			} else if(data1.length == 0) {
				//도로명 검색
				$.ajax({
					url: './api_xml.php',
					type: 'GET',
					dataType: 'json',
					tryCount : 1, 
					retryLimit : 3,
					data: {
						'ServiceKey': 'kdt/mwH6Dy5yHt5be/NHgYhJbldXO0JC/zVe1JAnCgOAUTWLi73bqpLuL36R/PQQh9TINdBOd5k+tWE90rHIAg==',
						'srchwrd': keyword1,
						'searchSe': 'road'
					},	
					success: function(data2) {
						searchFunc(data2);
						if(data2.length == 0) {
							var noData = document.createElement('div');
							noData.classList.add('no_data');
							noData.innerHTML = '<img src="../img/img.png" alt="">'
							resultUl.appendChild(noData);
						}
					},
					beforeSend: function() {
						console.log('도로명검색중');
					},
					error: function(error) {
						console.log('도로명 검색 오류');
						console.log(error);
						//재시도
						retry();           
						return;
					},
					complete: function() {
					}
				});
			} 
		},
		beforeSend: function() {
			console.log('동주소검색중');
		},
		error: function(error) {
			console.log('동주소 검색 오류');
			console.log(error);
			//재시도
			retry();          
			return;
		},
		complete: function() {
		}
	});

});


function searchFunc(list) {
	list.forEach(li => {
		var resultLi = document.createElement('li');
		var addressAll;

		keyKo.forEach(key => {
			var koWrap = document.createElement('div');
			koWrap.classList.add(key);
			if(key === 'lnmAdres') {
				addressAll = li[key];
			}
			// 주소 출력

			var ko_p = document.createElement('p');
			ko_p.textContent = li[key];
			koWrap.appendChild(ko_p);


			resultLi.appendChild(koWrap);
		});
		arrUnique.forEach(address => {
			if (li.lnmAdres.includes(address.korAddr)) {
				keyEn.forEach(key => {
					var enWrap = document.createElement('div');
					enWrap.classList.add(key);
					resultLi.appendChild(enWrap);
				});
			}
		});
		//북마크 버튼추가
		var bookDiv = document.createElement('button');
		bookDiv.classList.add('book');
		bookDiv.setAttribute('onClick',`bookmark(this,'${areaName.value}','${addressAll}')`);
		//북마크 유무 판별
		$.ajax({
			url: './bookArr.php',
			type: 'GET',
			dataType: 'json',
			tryCount : 1, 
			retryLimit : 3,
			success: function(bookArr) {
				var bookedAddressArr = [];
				bookArr.forEach(items => {
					bookedAddressArr.push(items.address);
				});
				if(bookedAddressArr.includes(addressAll)) {
					bookDiv.classList.add('on') ;
				}
			},
			beforeSend: function() {
			},
			error: function(error) {
				alert('오류가 발생했습니다. 잠시 후 다시 시도해 주세요');
				console.log(error);
				//재시도
				this.tryCount++;
				retry();        
				return; 
			},
			complete: function() {
			}
		});
		resultLi.appendChild(bookDiv);

		resultUl.appendChild(resultLi);
	});
}


//영문 검색 결과 값 배열화
function makeList(xmlStr){
	// XML 데이터를 jQuery 객체로 변환
	var $xmlData = $(xmlStr);
	$xmlData.find("juso").each(function () {
		var roadAddr = $(this).find('roadAddr').text();
		var jibunAddr = $(this).find('jibunAddr').text();
		var korAddr = $(this).find('korAddr').text();

		var addressInfo = {
			roadAddr: roadAddr,
			jibunAddr: jibunAddr,
			korAddr: korAddr
		};
		addressArray.push(addressInfo);
	});

	// 중복 값 제거
	arrUnique = addressArray.filter((address, idx, arr) => {
		return arr.findIndex(item => item.korAddr === address.korAddr ) === idx
	});
}

//특수문자, 특정문자열(sql예약어의 앞뒤공백포함) 제거
function checkSearchedWord(obj){
	if(obj.value.length >0){
		//특수문자 제거
		var expText = /[%=><]/ ;
		if(expText.test(obj.value) == true){
			alert("특수문자를 입력 할수 없습니다.") ;
			obj.value = obj.value.split(expText).join(""); 
			return false;
		}
		
		//특정문자열(sql예약어의 앞뒤공백포함) 제거
		var sqlArray = new Array(
			//sql 예약어
			"OR", "SELECT", "INSERT", "DELETE", "UPDATE", "CREATE", "DROP", "EXEC",
      "UNION",  "FETCH", "DECLARE", "TRUNCATE" 
		);
		
		var regex;
		for(var i=0; i<sqlArray.length; i++){
			regex = new RegExp( sqlArray[i] ,"gi") ;
			
			if (regex.test(obj.value) ) {
			  alert("\"" + sqlArray[i]+"\"와(과) 같은 특정문자로 검색할 수 없습니다.");
				obj.value =obj.value.replace(regex, "");
				return false;
			}
		}
	}
	return true ;
}

function retry() {
	this.tryCount++;
	if (this.tryCount <= this.retryLimit) {
		$.ajax(this);
		return;
	}
}
