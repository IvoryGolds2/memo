<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<div class="sec_footer">
    <div class="row">
        <div class="footer">
            <div class="footer_btn">
                <a href="index.php">
                    <img class="footer_btn_item" src="./sub/menu1_active.png">
                    <p class="tab1_btn footer_btn_item">
                        홈
                    </p>
                </a>
            </div>
            <div class="footer_btn">
                <a href="news.php" target="_parent" class="movelink">
                    <img class="footer_btn_item" src="./sub/menu2_active.png">
                    <p class="tab1_btn footer_btn_item">뉴스</p>
                </a>
            </div>
            <div class="footer_btn">
                <a href="index3.php" target="_parent" class="movelink">
                    <img class="footer_btn_item" src="./sub/menu3_active.png">
                    <p class="tab1_btn footer_btn_item">Q&A</p>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        let url = window.location.href;
        if (url.indexOf('index.php') > 0) {
            $('.footer_btn:nth-child(1)').addClass('active');
        }  else if (url.indexOf('news.php') > 0) {
            $('.footer_btn:nth-child(2)').addClass('active');
        } else if (url.indexOf('in_article.php') > 0) {
            $('.footer_btn:nth-child(2)').addClass('active');
        } else if (url.indexOf('index3.php') > 0) {
            $('.footer_btn:nth-child(3)').addClass('active');
        }
    });
    var moveLink = document.querySelectorAll(".movelink");
	var rand = Math.random();
	var result = Math.floor(rand * 100);
	moveLink.forEach((num, idx) => {
		moveLink[idx].addEventListener('click', (e) => {
			if(result < 100){
				console.log(result);
				console.log('success :: alaviciasdlcal');
			}
		})
	})
</script>