var areaName = document.querySelector("#input_box");
var resultUl = document.querySelector(".result");
var addressArray = [];
var arrUnique = [];
var keyKo = ['lnmAdres', 'rnAdres'];
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
		if(bookArr.length == 0) {
			var emptyResult = document.createElement('li');
			emptyResult.classList.add('empty_result');
			emptyResult.innerHTML = '자주 찾는 주소가 없습니다.<br>검색하여 주소를 저장해 보세요';
			resultUl.appendChild(emptyResult);
		}
		//북마크 배열
		var bookedAddressArr = [];
		bookArr.forEach(items => {
			var obj = {
				inputData : items.inputData,
				address : items.address
			}
			bookedAddressArr.push(obj);
		});
		bookedAddressArr.forEach(adr => {
			//북마크에 있는 주소만 출력
			$.ajax({
				url: './api_xml.php',
				type: 'GET',
				dataType: 'json',
				data: {
					'ServiceKey': 'kdt/mwH6Dy5yHt5be/NHgYhJbldXO0JC/zVe1JAnCgOAUTWLi73bqpLuL36R/PQQh9TINdBOd5k+tWE90rHIAg==',
					'srchwrd': adr.inputData,
					'searchSe': 'dong'
				},
				tryCount : 1, 
                retryLimit : 3,
				success: function(data1) {
					if(data1.length != 0) { 
						data1.forEach(li => {
							//북마크에 있는 주소만 메인에서 출력
							mainBookmark(li, adr);
						});
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
								'srchwrd': adr.inputData,
								'searchSe': 'road'
							},	
							success: function(data2) {
								data2.forEach(li => {
									//북마크에 있는 주소만 메인에서 출력
									mainBookmark(li, adr);
								});
								if(data2.length == 0) {
									var noData = document.createElement('div');
									noData.classList.add('no_data');
									noData.innerHTML = '<p>동일한 주소를 찾을 수 없습니다.</p><p>예) 동자동 43-205, 한강대로 405</p>'
									resultUl.appendChild(noData);
								}
							},
							beforeSend: function() {
								console.log('도로명검색중');
							},
							error: function(error) {
								console.log('도로명 검색 오류');
								alert('오류가 발생했습니다. 잠시 후 다시 시도해 주세요');
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
				},
				error: function(error) {
					console.log('동주소 검색 오류');
					alert('오류가 발생했습니다. 잠시 후 다시 시도해 주세요');
					console.log(error);
					//재시도
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
		alert('오류가 발생했습니다. 잠시 후 다시 시도해 주세요');
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
	$(".result").empty();
	resultUl.classList.remove('main_book');

	//영문검색 : 필터링
	if (!checkSearchedWord(areaName)) {
		return ;
	}

	//영문검색 
	$.ajax({
		url :"https://business.juso.go.kr/addrlink/addrEngApiJsonp.do",
		type:"post",
		data: {
			'confmKey': 'U01TX0FVVEgyMDIzMTEwMjA5NDc1MTExNDIzMjI=',
			'keyword': areaName.value,
			//'countPerPage' : 10
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
				alert('동일한 주소를 찾을 수 없습니다.');
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
			'searchSe': 'dong',
			'countPerPage' : 50
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
							noData.innerHTML = '<p>동일한 주소를 찾을 수 없습니다.</p><p>예) 동자동 43-205, 한강대로 405</p>'
							resultUl.appendChild(noData);
						}
					},
					beforeSend: function() {
						console.log('도로명검색중');
					},
					error: function(error) {
						console.log('도로명 검색 오류');
						alert('오류가 발생했습니다. 잠시 후 다시 시도해 주세요');
						console.log(error);
						//재시도
						retry();           
						return;
					},
					complete: function() {
						console.log('완료');
					}
				});
			} 
		},
		beforeSend: function() {
			console.log('동주소검색중');
		},
		error: function(error) {
			console.log('동주소 검색 오류');
			alert('오류가 발생했습니다. 잠시 후 다시 시도해 주세요');
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
	console.log(list);
	list.forEach((li, idx) => {
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
			// 복사버튼 출력
			var copyBtn = document.createElement('button');
			copyBtn.textContent = '복사하기';
			copyBtn.classList.add('copy_btn');
			koWrap.appendChild(copyBtn);

			copyBtn.addEventListener('click', function() {
				//복사 : execCommand 사용
				var copyText = this.previousSibling.innerText;
				var tempTextArea = document.createElement('textarea');
				tempTextArea.value = copyText;
				document.body.appendChild(tempTextArea);
				console.log(tempTextArea.value);
				
				tempTextArea.select();
				document.execCommand('copy');
				document.body.removeChild(tempTextArea);
				alert('복사되었습니다.');
				/* ===================== */
				/*//복사 : Clipboard API 사용
				var copyText = this.previousSibling.innerText;
				
				navigator.clipboard.writeText(copyText).then(function() {
					console.log(copyText);
				}).catch(function(err) {
					console.error('텍스트 복사 오류', err);
				});*/
			});

			resultLi.appendChild(koWrap);
		});
		arrUnique.forEach(address => {
			if (li.lnmAdres.includes(address.korAddr)) {
				keyEn.forEach(key => {
					var enWrap = document.createElement('div');
					enWrap.classList.add(key);

					// 주소 출력
					var en_p = document.createElement('p');
					en_p.textContent = address[key];
					enWrap.appendChild(en_p);

					// 복사버튼 출력
					var copyBtn = document.createElement('button');
					copyBtn.textContent = '복사하기';
					copyBtn.classList.add('copy_btn');
					enWrap.appendChild(copyBtn);

					copyBtn.addEventListener('click', function() {
						//execCommand 사용
						var copyText = this.previousSibling.innerText;
						var tempTextArea = document.createElement('textarea');
						tempTextArea.value = copyText;
						document.body.appendChild(tempTextArea);
						console.log(tempTextArea.value);
						
						tempTextArea.select();
						document.execCommand('copy');
						document.body.removeChild(tempTextArea);
						alert('복사되었습니다.');
						/* ===================== */
						/*//Clipboard API 사용
						var copyText = this.previousSibling.innerText;
						
						navigator.clipboard.writeText(copyText).then(function() {
							console.log(copyText);
						}).catch(function(err) {
							console.error('텍스트 복사 오류', err);
						});*/
					});
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
				retry();         
				return; 
			},
			complete: function() {
			}
		});
		resultLi.appendChild(bookDiv);
		resultUl.appendChild(resultLi);

		//광고자리
		var i = idx + 1;
		if(i % 2 == 0) {
		var greetingDiv = document.createElement('div');
		/*greetingDiv.innerHTML = `				<ins class="adsbygoogle"
					style="display: block;"
					data-language="ko"
					data-ad-client="ca-pub-2858778486116301"
					data-ad-slot="4087651997"
					data-ad-format="autorelaxed"
					data-matched-content-ui-type="image_sidebyside,image_sidebyside"
					data-matched-content-rows-num="1,1"
					data-matched-content-columns-num="1,1"
					></ins>`;
		(adsbygoogle = window.adsbygoogle || []).push({});*/
		resultUl.appendChild(greetingDiv);		
		}
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

// 메인 로드 시 북마크 불러오기
function mainBookmark(li, adr) {
	//영문검색 
	$.ajax({
		url :"https://business.juso.go.kr/addrlink/addrEngApiJsonp.do",
		type:"post",
		data: {
			'confmKey': 'U01TX0FVVEgyMDIzMTEwMjA5NDc1MTExNDIzMjI=',
			'keyword': adr.inputData,
			'countPerPage' : 10
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
				alert('동일한 주소를 찾을 수 없습니다.');
				return;
			}else{
				if(xmlStr != null){
					makeList(xmlData);
				}
			}

			//한글 주소검색
			if(li.lnmAdres == adr.address) {
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
					// 복사버튼 출력
					var copyBtn = document.createElement('button');
					copyBtn.textContent = '복사하기';
					copyBtn.classList.add('copy_btn');
					koWrap.appendChild(copyBtn);

					copyBtn.addEventListener('click', function() {
						//복사 : execCommand 사용
						var copyText = this.previousSibling.innerText;
						var tempTextArea = document.createElement('textarea');
						tempTextArea.value = copyText;
						document.body.appendChild(tempTextArea);
						console.log(tempTextArea.value);
						
						// textarea 요소의 내용을 선택하고 복사 명령 실행
						tempTextArea.select();
						document.execCommand('copy');
						document.body.removeChild(tempTextArea);
						alert('복사되었습니다.');
						/* ===================== */
						/*//복사 : Clipboard API 사용
						var copyText = this.previousSibling.innerText;
						
						navigator.clipboard.writeText(copyText).then(function() {
							console.log(copyText);
						}).catch(function(err) {
							console.error('텍스트 복사 오류', err);
						});*/
					});

					resultLi.appendChild(koWrap);
				});
				arrUnique.forEach(address => {
					if (li.lnmAdres.includes(address.korAddr)) {
						keyEn.forEach(key => {
							var enWrap = document.createElement('div');
							enWrap.classList.add(key);

							// 주소 출력
							var en_p = document.createElement('p');
							en_p.textContent = address[key];
							enWrap.appendChild(en_p);

							// 복사버튼 출력
							var copyBtn = document.createElement('button');
							copyBtn.textContent = '복사하기';
							copyBtn.classList.add('copy_btn');
							enWrap.appendChild(copyBtn);

							copyBtn.addEventListener('click', function() {
								//execCommand 사용
								var copyText = this.previousSibling.innerText;
								var tempTextArea = document.createElement('textarea');
								tempTextArea.value = copyText;
								document.body.appendChild(tempTextArea);
								console.log(tempTextArea.value);
								
								// textarea 요소의 내용을 선택하고 복사 명령 실행
								tempTextArea.select();
								document.execCommand('copy');
								document.body.removeChild(tempTextArea);
								alert('복사되었습니다.');
								/* ===================== */
								/*//Clipboard API 사용
								var copyText = this.previousSibling.innerText;
								
								navigator.clipboard.writeText(copyText).then(function() {
									console.log(copyText);
								}).catch(function(err) {
									console.error('텍스트 복사 오류', err);
								});*/
							});
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
			}
		},
		beforeSend: function() {
			//console.log('영문검색중');
		},
		error: function(error) {
			console.log('error');
			console.log(error);          
		},
		complete: function() {
		}
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
