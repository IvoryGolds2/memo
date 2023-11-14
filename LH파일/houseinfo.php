<?php include './db2.php';?>
   
    <div class="houseinfo">
			<?php
			$count = 0;
			$sql = query("SELECT * from lh_gonggo where PAN_SS != '접수마감' AND CNP_CD_NM like '%{$area}%' and AIS_TP_CD_NM like '%{$type}%' ORDER BY PAN_NT_ST_DT DESC");
			foreach ($sql as $r => $row) {
				$info = $row['AIS_TP_CD_NM'];
				$region = $row['CNP_CD_NM'];
				$ing = $row['PAN_SS'];
				$start = preg_replace('/(\d{4})(\d{2})(\d{2})/', '$1.$2.$3', $row['PAN_DT']);
				$end = $row['CLSG_DT'];
				$name = $row['PAN_NM'];
				//$link = $row['DTL_URL_MOB'];
				$link = str_replace("https://m.", "https://", $row['DTL_URL_MOB']);
				?>
				<div class="houseinfoBox">
					<div class="housefirst">
						<p><?=$info?></p>
						<p><?=$region?></p>
					</div>
					<div class="housemiddle">
						<a href="<?=$link?>"><?=$name?></a>
					</div>
					<div class="houselast">
						<p><?=$ing?></p>
						<p><?=$start?>~<?=$end?></p>
					</div>
				</div>
				<?php
					$count++;
					if($count  % 6 == 0){
						?>
						<div class="ads_wrap ads_main_sm" style="margin:0">
							<ins class="adsbygoogle" data-ad-client="ca-pub-6461658009843258" style="margin:0"
							data-language="ko"
							data-ad-slot="3782504394"></ins>
							<script>
								(adsbygoogle = window.adsbygoogle || []).push({});
							</script>
						</div>
						<?php
					}
				}
			?>
		</div>