<header>
  <h1><a href="./home.php" target="_parent" class="movelink"><img src="./Img/logo-2.png" alt=""></a></h1>
  <ul>
    <li><a href="./home.php" target="_parent" class="movelink">홈</a></li>
    <li><a href="./lh_map.php" target="_parent" class="movelink">지도</a></li>
    <li><a href="./sale.php" target="_parent" class="movelink">분양공고</a></li>
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
	if(window.location.href.match("lh_map.php")){//news.php일때 홈li a에 active
		rm_active();
		tab[1].classList.add('active');
	};
		if(window.location.href.match("sale.php")){//qna.php일때 홈li a에 active
		rm_active();
		tab[2].classList.add('active');
	};
	if(window.location.href.match("news.php")){//qna.php일때 홈li a에 active
		rm_active();
		tab[3].classList.add('active');
	};
	if(window.location.href.match("qna.php")){//qna.php일때 홈li a에 active
		rm_active();
		tab[4].classList.add('active');
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