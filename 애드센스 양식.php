<!-- 수동광고, 멀티플렉스, 인아티클 광고는 각각 아래의 코드를 갖다 쓰고  https://docs.google.com/spreadsheets/d/1mKrbjHgGMHLAMWcKDPYOGlplZ3qc0XpTqOrNSLlPz-Q/edit#gid=1178857006 여기서 리다이렉트용 주소 해당하는 계정 찾아서 
https://docs.google.com/spreadsheets/d/1mKrbjHgGMHLAMWcKDPYOGlplZ3qc0XpTqOrNSLlPz-Q/edit#gid=1935030084 여기서 코드를 확인하실 수 있습니다. 인피드 광고를 삽입해야하는 상황이라면 기획자분께 발급을 요구하여 삽입하여야됩니다.(지금은 찬희님 담당)-->

<!-- 수동광고 -->
<div class="ads_wrap ads_main_big">
    <ins class="adsbygoogle"
        data-ad-client="ca-pub-코드번호"
        data-ad-slot="수동slot번호"
        data-language="ko"
        ></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>

<!-- 멀티플렉스 -->
<div>
    <ins class="adsbygoogle"
        style="display: block;"
        data-language="ko"
        data-ad-client="ca-pub-코드번호"
        data-ad-slot="멀티slot번호"
        data-ad-format="autorelaxed"
        data-matched-content-ui-type="image_sidebyside,image_sidebyside"
        data-matched-content-rows-num="4,1"
        data-matched-content-columns-num="1,1"
        ></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>

<!-- 인아티클 -->
<div>
    <ins class="adsbygoogle"
        style="display:block; text-align:center;"
        data-ad-layout="in-article"
        data-ad-format="fluid"
        data-ad-client="ca-pub-코드번호"
        data-ad-slot="인아티클slot번호"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>

<!-- 아주 좋은 광고 예제 -->
<!-- 마지막 부분에만 사이즈가 다른 광고가 들어가는 경우 유용합니다! -->
<div class="contentbox">
        <?php
        $sql2 = query("SELECT DISTINCT title from content WHERE category = '$category'");
        $i = 1;
        $length = $sql2 -> num_rows;
        foreach($sql2 as $key2 => $val2) {
            if ($i === 1) { ?>
                <?php if($val2['title']) { ?>
                <span class="boxtitle"><?= $val2['title'] ?></span>
                <?php } ?>
                <?php
                $sql3 = query("SELECT DISTINCT * from content WHERE title = '$val2[title]' and category = '$category'");
                foreach ($sql3 as $key3 => $val3) {
                ?>
                <?php if($val3['redtitle']) { ?>
                <p class="redtitle"><?= $val3['redtitle'] ?></p>
                <?php } ?>
                <?php if($val3['content']) { ?>
                <pre><?= $val3['content'] ?></pre>
                <?php } ?>
                <?php if($val3['chart']) { ?>
                <img src="./img/<?= $val3['chart'] ?>.png" alt="">
                <?php } ?>
                <div class="ads_wrap ads_main_big">
                    <ins class="adsbygoogle"
                        data-ad-client="ca-pub-2858778486116301"
                        data-ad-slot="1643431225"
                        data-language="ko"
                        ></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <?} } elseif ($i === $length) { ?>
                <?php if($val2['title']) { ?>
                <span class="boxtitle"><?= $val2['title'] ?></span>
                <?php } ?>
                <?php
                $sql3 = query("SELECT DISTINCT * from content WHERE title = '$val2[title]' and category = '$category'");
                foreach ($sql3 as $key3 => $val3) {
                ?>
                <?php if($val3['redtitle']) { ?>
                <p class="redtitle"><?= $val3['redtitle'] ?></p>
                <?php } ?>
                <?php if($val3['content']) { ?>
                <pre><?= $val3['content'] ?></pre>
                <?php } ?>
                <?php if($val3['chart']) { ?>
                <img src="./img/<?= $val3['chart'] ?>.png" alt="">
                <?php } ?>
                <div class="ads_wrap ads_main_big">
                    <ins class="adsbygoogle"
                        data-ad-client="ca-pub-2858778486116301"
                        data-ad-slot="1643431225"
                        data-language="ko"
                        ></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <?} } else { ?>
                    <?php if($val2['title']) { ?>
                    <span class="boxtitle"><?= $val2['title'] ?></span>
                    <?php } ?>
                    <?php
                    $sql3 = query("SELECT DISTINCT * from content WHERE title = '$val2[title]' and category = '$category'");
                    foreach ($sql3 as $key3 => $val3) {
                    ?>
                    <?php if($val3['redtitle']) { ?>
                    <p class="redtitle"><?= $val3['redtitle'] ?></p>
                    <?php } ?>
                    <?php if($val3['content']) { ?>
                    <pre><?= $val3['content'] ?></pre>
                    <?php } ?>
                    <?php if($val3['chart']) { ?>
                    <img src="./img/<?= $val3['chart'] ?>.png" alt="">
                    <?php } ?>
                <?}}
            $i++;
        }
    ?>  
    </div>