<style>
	.tabBtn li a {
	color: black;
}
</style>
<ul class="tabBtn">
		<li class="aaa"><a href="./home.php" target="_parent" class="movelink">홈</a></li>
		<li class="bbb"><a href="./news.php" target="_parent" class="movelink">최신뉴스</a></li>
		<li class="ccc"><a href="./qna.php" target="_parent" class="movelink">질문모음</a></li>
</ul>

<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script>
    $(document).ready(function () {
        let url = window.location.href;
        if (url.indexOf('home.php') > 0) {
            $('.aaa').addClass('active');
        } else if (url.indexOf('news.php') > 0) {
            $('.bbb').addClass('active');
        } else if (url.indexOf('qna.php') > 0) {
            $('.ccc').addClass('active');
        }
    });
</script>