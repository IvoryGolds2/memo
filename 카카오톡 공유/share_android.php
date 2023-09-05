<div class="share_wrap">
	<h4>공유하기</h4>
	<ul>
		<li><button type="button" id="kakaotalk-sharing-btn"><img src="./img/share_kakao.png" alt="카카오톡 공유하기"></button></li>
		<li><button type="button" onclick="shareTwitter()"><img src="./img/share_twitter.png" alt="트위터 공유하기"></button></li>
		<li><button type="button" onclick="clip()"><img src="./img/share_url.png" alt="URL 복사하기"></button></li>
	</ul>
</div>
<script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
<!-- <script src="https://t1.kakaocdn.net/kakao_js_sdk/2.0.1/kakao.min.js" integrity="sha384-eKjgHJ9+vwU/FCSUG3nV1RKFolUXLsc6nLQ2R1tD0t4YFPCvRmkcF8saIfOZNWf/" crossorigin="anonymous"></script> -->
<script>

</script>
<script>
	Kakao.Share.createDefaultButton({
        container: '#kakaotalk-sharing-btn',
        objectType: 'feed',
        content: {
            // 1. title, description, imageUrl : 앱 주제에 따라 수정
            title: 'test',
            description: 'testtesttest',
            imageUrl: '',

            // 2. 플레이스토어 주소
            link: {
                mobileWebUrl: window.location.href,
                webUrl: window.location.href
            },
        },
        buttons: [
            {
                title: '자세히보기',
                link: {
                    mobileWebUrl: window.location.href,
                    webUrl: window.location.href,
                    androidExecParams: 'market://플레이스토어 주소', 
                },
            },
        ],
        installTalk : true // 카카오톡 미설치시 카톡설치유도
    });

    /*트위터 공유하기 */
    function shareTwitter() {
        var sendText = '';
        var sendUrl = '플레이스토어 주소기입';
        window.location.href = "https://twitter.com/intent/tweet?text=" + sendText + "&url=" + sendUrl;
    }

    /*url 공유하기 */
    function clip(){
		var url = window.location.href;
		var textarea = document.createElement("textarea");
		document.body.appendChild(textarea);
		url = '플레이스토어 주소기입';   //플레이스토어 주소
		textarea.value = url;
		textarea.select();
		document.execCommand("copy");
		document.body.removeChild(textarea);
		alert("URL이 복사되었습니다.");
	}
</script>