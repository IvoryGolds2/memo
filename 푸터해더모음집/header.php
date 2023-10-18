<header>
	<h1><a href="./home.php"><img src="./img/logo.png" alt=""></a></h1>
	<ul>
		<li><a href="./home.php">홈</a></li>
		<li><a href="./news.php" target="_parent" class="movelink">최신뉴스</a></li>
		<li><a href="./qna.php" target="_parent" class="movelink">Q&A</a></li>
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