<?php 
    include "./db2.php"; 
    $identification = $_GET['identification'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <meta name="google-site-verification" content="VczGqNLzn56V6HWULdkIUipIQSlRZuBfCQSK9f-gq1E" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
    <link rel="stylesheet" href="./css/reset.css">
	<link rel="stylesheet" href="./css/common.css">
	<link rel="stylesheet" href="./css/home.css">
    <title><?=$title?></title>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5441250633929933" crossorigin="anonymous"></script>
    <script>
		document.documentElement.style.webkitTouchCallout = "none";
		document.documentElement.style.webkitUserSelect = "none";

        if ( window.location.href == "https://support.pe.kr/home.php") {
            window.location.href = "https://support.cessation.co.kr/home.php";
        }
        if ( window.location.href == "https://support.pe.kr/home.php?identification=<?php echo $identification;?>") {
            window.location.href = "https://support.cessation.co.kr/home.php?identification=<?php echo $identification;?>";
        }
	</script>
</head>
<body>
    <div id="wrap">
        <header>
            <button class="open_nav"><img src="./img/allmenu.png" alt=""></button>
            <a href="./bookmark.php?identification=<?=$identification?>"><img src="./img/book.png" alt=""></a>
        </header>

        <div class="nav_wrap">
            <nav>
                <div class="nav_header">
                    <div class="close_nav"><img src="./img/allmenu_close.png" alt=""></div>
                </div>
                <div class="nav_content">
                    <div class="tab_wrap">
                        <span class="tabs">
                            <p class="tab on">유형별 찾기</p>
                            <p class="tab">간편찾기</p>
                            <p class="tab tab_diff">즐겨찾는 보조금</p>
                            <a href="./news.php?identification=<?=$identification?>">뉴스</a>
                            <a href="./qna.php?identification=<?=$identification?>">Q&A</a>
                        </span>
                        <span>
                            <a href="https://www.gov.kr/portal/main" target="_blank"><img src="./img/btn1.png" alt="정부24 바로가기"></a>
                            <a href="tel:1588-2188" target="_blank"><img src="./img/btn2.png" alt="정부24 콜센터"></a>
                        </span>
                    </div>
                    
                    <div class="tab_content">
                        <!-- 입력과 동시에 아래 뜨도록 -->
                        <form action="./all.php?identification=<?=$identification?>&search=<?=$search?>" method="get">
                            <label for="search">
                                <input type="text" name="search" id="search" value="<?=$search?>"  placeholder="찾는 보조금 명을 입력하세요."> 
                                <input type="submit" id="search_btn">
                            </label>
                        </form>
                        <!-- 유형별 찾기 -->
                        <ul class="partner on">
                            <li><a href="./category.php?identification=<?=$identification?>&code=ALL">전체혜택</a></li>
                            <li><a href="./category.php?identification=<?=$identification?>&code=A">생활안정</a></li>
                            <li><a href="./category.php?identification=<?=$identification?>&code=B">주거자립</a></li>
                            <li><a href="./category.php?identification=<?=$identification?>&code=C">보육교육</a></li>
                            <li><a href="./category.php?identification=<?=$identification?>&code=D">고용창업</a></li>
                            <li><a href="./category.php?identification=<?=$identification?>&code=E">보건의료</a></li>
                            <li><a href="./category.php?identification=<?=$identification?>&code=F">행정안전</a></li>
                            <li><a href="./category.php?identification=<?=$identification?>&code=G">임신출산</a></li>
                            <li><a href="./category.php?identification=<?=$identification?>&code=H">보호돌봄</a></li>
                            <li><a href="./category.php?identification=<?=$identification?>&code=I">문화환경</a></li>
                            <li><a href="./category.php?identification=<?=$identification?>&code=J">농립축산어업</a></li>
                        </ul>
                        <!-- 간편찾기 -->
                        <ul class="partner">
                            <li><a href="./all.php?identification=<?=$identification?>&search=">전체혜택</a></li>
                            <li style="width:100%"><a href="solo.php?identification=<?=$identification?>&code=A">개인(가구)</a></li>
                            <li style="width:100%"><a href="sosang.php?identification=<?=$identification?>&code=B">소상공인</a></li>
                            <li style="width:100%"><a href="raw.php?identification=<?=$identification?>&code=C">법인</a></li>
                        </ul>
                        <!-- 즐겨찾는 보조금 -->
                        <ul class="partner diff"></ul>
                    </div>
                </div>
            </nav>
            <div class="nav_bg"></div>
        </div>

        <div class="content_wrap">
            <!-- search -->
            <div class="section search">
                <h1>쉽고 빠른 <span>보조금 조회!</span></h1>
                <span>
                    <a href="sub.php?identification=<?=$identification?>&code=A"><img src="./img/find1.png" alt=""></a>
                    <a href="sub.php?identification=<?=$identification?>&code=B"><img src="./img/find2.png" alt=""></a>
                </span>
            </div>
            <!-- <div class="ads_wrap ads_main_big">
                <ins class="adsbygoogle" data-ad-client="ca-pub-5441250633929933" data-language="ko" data-ad-slot="2028954353"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>						
            </div> -->
            <div style="overflow: hidden;">
                <ins class="adsbygoogle"
                    style="display: block;"
                    data-ad-client="ca-pub-5441250633929933" 
                    data-language="ko"
                    data-ad-slot="9185828796"
                    data-ad-format="autorelaxed"
                    data-matched-content-ui-type="image_sidebyside,image_sidebyside"
                    data-matched-content-rows-num="4,1"
                    data-matched-content-columns-num="1,1"
                    ></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            <!-- service -->
            <div class="section service">
                <h1>다양한 보조금 24 <span>혜택 정보!</span></h1>
                <div class="service_owl owl-carousel">
                    <a href="policy_view.php?identification=<?=$identification?>&service_id=135200005003" class="item"><img src="./img/info1.png" alt=""></a>
                    <a href="policy_view.php?identification=<?=$identification?>&service_id=135200005004" class="item"><img src="./img/info2.png" alt=""></a>
                    <a href="policy_view.php?identification=<?=$identification?>&service_id=149200005007" class="item"><img src="./img/info3.png" alt=""></a>
                    <a href="policy_view.php?identification=<?=$identification?>&service_id=149200005016" class="item"><img src="./img/info4.png" alt=""></a>
                    <a href="policy_view.php?identification=<?=$identification?>&service_id=134200000003" class="item"><img src="./img/info5.png" alt=""></a>
                    <a href="policy_view.php?identification=<?=$identification?>&service_id=SD0000011848" class="item"><img src="./img/info6.png" alt=""></a>
                    <a href="policy_view.php?identification=<?=$identification?>&service_id=135200005018" class="item"><img src="./img/info7.png" alt=""></a>
                    <a href="policy_view.php?identification=<?=$identification?>&service_id=999000000043" class="item"><img src="./img/info8.png" alt=""></a>
                    <a href="policy_view.php?identification=<?=$identification?>&service_id=326000000053" class="item"><img src="./img/info9.png" alt=""></a>
                    <a href="policy_view.php?identification=<?=$identification?>&service_id=SSE000000170" class="item"><img src="./img/info10.png" alt=""></a>
                    <a href="policy_view.php?identification=<?=$identification?>&service_id=999000000026" class="item"><img src="./img/info11.png" alt=""></a>
                    <a href="policy_view.php?identification=<?=$identification?>&service_id=135200000130" class="item"><img src="./img/info13.png" alt=""></a>
                </div>
            </div>
            <!-- <div class="ads_wrap ads_main_big">
                <ins class="adsbygoogle" data-ad-client="ca-pub-5441250633929933" data-language="ko" data-ad-slot="9472568713"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>						
            </div> -->

            <div style="overflow: hidden;">
                <ins class="adsbygoogle"
                    style="display: block;"
                    data-ad-client="ca-pub-5441250633929933" 
                    data-language="ko"
                    data-ad-slot="9185828796"
                    data-ad-format="autorelaxed"
                    data-matched-content-ui-type="image_sidebyside,image_sidebyside"
                    data-matched-content-rows-num="2,1"
                    data-matched-content-columns-num="1,1"
                    ></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>


            <!-- guide -->
            <div class="section guide">
                <h1>알아보자, <span>보조금!</span></h1>
                <div>
                    <?php
                        $mysqli2 = new mysqli('localhost', 'root', 'xptmxm12', 'aws50115');
                        $mysqli2 ->set_charset("utf8mb4");
                        function query2($sql2){
                            global $mysqli2;
                            return $mysqli2->query($sql2);
                        };
                        $sql2 = query2("SELECT code, num from bojo_banner");
                        $ii = 1;
                        foreach ($sql2 as $r2 => $row2) {
                            if($ii % 3 != 0){
                                echo '<a href="/card_home.php?identification='.$identification.'&code='.$row2['code'].'&num='.$row2['num'].'"><img src="./img/'.$row2['code'].$row2['num'].'.png" alt=""></a>';
                            }else{
                                echo '<a href="/card_home.php?identification='.$identification.'&code='.$row2['code'].'&num='.$row2['num'].'"><img src="./img/'.$row2['code'].$row2['num'].'.png" alt=""></a>';
                                ?>

                                <div class="ads_wrap ads_main_sm">
                                    <ins class="adsbygoogle" data-ad-client="ca-pub-5441250633929933" data-language="ko" data-ad-slot="9472568713"></ins>
                                    <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                    </script>						
                                </div>

                                
                                <?php

                            }
                            $ii++;
                        }
                    ?>
                </div>
            </div>
            
            <!-- footer : 홈, 햄버거 메뉴에서만 등장 -->
            <footer>
                <div class="swiper-container footer_swiper">
                    <div class="swiper-wrapper">
                        <?php
                            $sql3 = query("SELECT * from gov24_banner");
                            foreach ($sql3 as $r3 => $row3):
                        ?>
                        <div class="swiper-slide">
                        <a href="./policy_view.php?identification=<?=$identification?>&service_id=<?php echo $row3['serviceID']; ?>">

                            <p class="h1"><?php echo $row3['title']; ?></p>
                            <p class="h2"><?php echo $row3['content']; ?></p>
                            <div class="more">상세보기</div>
                        
                        </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
                <button class="up"></button>
            </footer>
        </div>

    </div>
</body>
<script>
    /** 탭 */
    const tabs = document.querySelectorAll('.tabs .tab');
    const partner = document.querySelectorAll('.partner');
    for(let ii = 0; ii < 3; ii++){
        tabs[ii].addEventListener('click',function(){
            
            const parent = tabs[ii].parentNode;
            const siblings = parent.children;
            for (let i = 0; i < 3; i++) {
                siblings[i].classList.remove('on');
                partner[i].classList.remove('on');
            }
            tabs[ii].classList.add('on');
            partner[ii].classList.add('on');
        })
    }

    /** 햄메뉴 */
	var nav_wrap = document.querySelector('.nav_wrap');
	var nav = document.querySelector('.nav_wrap nav');
	var open_nav = document.querySelector('.open_nav');
	var close_nav = document.querySelector('.close_nav');
	var nav_bg = document.querySelector('.nav_bg');

	open_nav.addEventListener('click', function() { ham_open(); });
    close_nav.addEventListener('click', function() { ham_close(); });
    function ham_open (){
        up.style.display = 'none';
        nav_bg.classList.add('on');
        nav.classList.add('on');
        nav_wrap.style.left = '0%';
        up.style.display = 'none';
        document.body.style.overflow = 'hidden';
        
    }
    function ham_close (){
        up.style.display = 'block';
        nav_bg.classList.remove('on');
        nav.classList.remove('on');
        nav_wrap.style.left = '-100%';
        up.style.display = 'block';
        document.body.style.overflow = 'auto';
        
    }
	nav.addEventListener('click', function(e) { e.stopPropagation(); });

    /** 검색제어 */
    const form = document.querySelector('form');
    const identification = "<?php echo $identification; ?>";
    var search = '';
    form.addEventListener('submit',function(e){
        search = document.getElementById('search').value;
        e.preventDefault();
        window.location.href = './all.php?identification=' + identification + '&search=' + search;
    })


    /** 위로 */
    const up = document.querySelector('button.up');
    up.addEventListener('click',function(){
        window.scrollTo({ top: 0, behavior: "smooth" }); 

    })

    
    /** 슬라이드 */
    $(".service_owl").owlCarousel({
        margin:5,
        stagePadding: 47,
        loop:1,
        autoplay: true,
        autoplayTimeout:1500,
        autoplayHoverPause: true,
        responsive:{
            0       :{items:2},
            700     :{items:3},
            900     :{items:4},
            1300    :{items:5}
        }
    })
    new Swiper('.footer_swiper', {
        loop: true,
        autoplay: {
            delay: 2500,
        },
        pagination : { // 페이징 설정
            el : '.swiper-pagination',
            type : 'fraction',
            clickable : true,
        },
        navigation : { // 네비게이션 설정
            nextEl : '.swiper-button-next', // 다음 버튼 클래스명
            prevEl : '.swiper-button-prev', // 이번 버튼 클래스명
        },
    });
    
    const paddingLeftNone = document.querySelector('.service_owl .owl-stage');
    paddingLeftNone.style.paddingLeft = 0;


    /** footer높이만큼 하단여백 */
    window.addEventListener('load',function(){
        const nav = document.querySelector('.nav_wrap nav');
        const nav_bg = document.querySelector('.nav_bg');
        const content_wrap = document.querySelector('.content_wrap');
        const height = document.querySelector('footer').clientHeight;
        nav.style.height = window.innerHeight - height;
        nav_bg.style.minHeight = window.innerHeight - height;
        content_wrap.style.marginBottom = height;
    })


    /** 즐겨찾는 보조금 */
    $('.tab_diff').click(function(){
        var identification = "<?php echo $identification; ?>";

        if(identification){
            var option = {
                "identification": identification,
            };
            $.ajax({
                type: "POST",
                url: "home_book.php",
                data: option, 
                success: function(response) {
                    $('.diff').html(response);


                    // 메뉴탭 북마크
                    const bookmark = document.querySelector('.bookmark');
                    $('.bookmark').click(function(){
                        var count = $(this).parent().index();
                        var identification = "<?php echo $identification; ?>";
                        var service_id = $(this).attr('data-id'); // 정책
                        


                        console.log(count);
                        if (identification && service_id){
                            var info = {
                                "identification" : identification,
                                "service_id" : service_id,
                            }
                            console.log('click');
                            $.ajax({
                                type: "POST",
                                url: "./bookmark_remove.php",
                                data: info, 
                                success: function(response) {
                                    $('.bookmark').parent().eq(count).closest('li').remove();
                                    // location.replace('./home.php?identification='+identification);
                                },
                                error: function(xhr, status, error) {
                                    console.error(error);
                                }
                            });
                        }else{
                            console.log('no');
                        }
                    })
                    // 메뉴탭 북마크 완

                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    })

</script>
</html>