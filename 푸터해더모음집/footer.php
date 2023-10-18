<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<div class="sec_footer">
    <div class="row">
        <div class="footer">
            <div class="footer_btn">
                <a href="index.php">
                    <img class="footer_btn_item" src="./sub/menu1.png">
                    <p class="tab1_btn footer_btn_item">
                        홈
                    </p>
                </a>
            </div>
            <div class="footer_btn" target="_parent" class="movelink">
                <a href="lh_map.php">
                    <img class="footer_btn_item" src="./sub/menu5.png">
                    <p class="tab1_btn footer_btn_item">지도</p>
                </a>
            </div>
            <div class="footer_btn">
                <a href="index2.php" target="_parent" class="movelink">
                    <img class="footer_btn_item" src="./sub/menu2.png">
                    <p class="tab1_btn footer_btn_item">분양<br>가이드</p>
                </a>
            </div>
            <div class="footer_btn">
                <a href="news.php" target="_parent" class="movelink">
                    <img class="footer_btn_item" src="./sub/menu3.png">
                    <p class="tab1_btn footer_btn_item">최신뉴스</p>
                </a>
            </div>
            <div class="footer_btn">
                <a href="index3.php" target="_parent" class="movelink">
                    <img class="footer_btn_item" src="./sub/menu4.png">
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
        } else if (url.indexOf('lh_map.php') > 0) {
            $('.footer_btn:nth-child(2)').addClass('active');
        } else if (url.indexOf('index2.php') > 0) {
            $('.footer_btn:nth-child(3)').addClass('active');
        } else if (url.indexOf('news.php') > 0) {
            $('.footer_btn:nth-child(4)').addClass('active');
        } else if (url.indexOf('in_article.php') > 0) {
            $('.footer_btn:nth-child(4)').addClass('active');
        } else if (url.indexOf('index3.php') > 0) {
            $('.footer_btn:nth-child(5)').addClass('active');
        }
    });
</script>