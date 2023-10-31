<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<div class="sec_footer">
  <div class="row">
    <div class="footer">
      <ul class="tabBtn">
        <li><a href="home.php">HOME</a></li>
        <li><a href="news.php" target="_parent" class="movelink">최신뉴스</a></li>
        <li><a href="qna.php" target="_parent" class="movelink">QNA</a></li>
      </ul>
    </div>
  </div>
</div>
<script>
    $(document).ready(function () {
        let url = window.location.href;
        if (url.indexOf('home.php') > 0) {
            $('.tabBtn li:nth-child(1)').addClass('active');
        }  else if (url.indexOf('news.php') > 0) {
            $('.tabBtn li:nth-child(2)').addClass('active');
        } else if (url.indexOf('in_article.php') > 0) {
            $('.tabBtn li:nth-child(2)').addClass('active');
        } else if (url.indexOf('qna.php') > 0) {
            $('.tabBtn li:nth-child(3)').addClass('active');
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
