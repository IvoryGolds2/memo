<header>
	<ul class="tabBtn">
			<li><a href="home.php">홈</a></li>
			<li><a href="news.php">c최신뉴스</a></li>
			<li><a href="qna.php">홈</a></li>
	</ul>
</header>

<script>
	var tab = document.querySelectorAll('header ul li a');
	if(window.location.href.match("home")){//home.php일때 홈li a에 active
		rm_active();
		tab[0].classList.add('active');
	};
	if(window.location.href.match("news")){//news.php일때 홈li a에 active
		rm_active();
		tab[1].classList.add('active');
	};
		if(window.location.href.match("qna")){//qna.php일때 홈li a에 active
		rm_active();
		tab[2].classList.add('active');
	};
	function rm_active(){
		for(var i = 0; i<tab.length; i++){
			tab[i].classList.remove('active');
		}
	}
</script>