<script type="text/javascript">
		jQuery(function($) {

			$form = $('.pure-form');

			$("#btn_submit").click(function(){
				var $this = $(this);
				var f = document.consult_frm;
				var start_date = f.start_date1.value + f.start_date2.value + f.start_date3.value + f.start_date4.value;
				var end_date = f.end_date1.value + f.end_date2.value + f.end_date3.value + f.end_date4.value;
				// var tour_num = f.tour_num.value;
				var sac = '310_B_2023041000001';
				var selectProduct = $('.select_product').attr('value');
				var hasClass = $('div').hasClass('select_product');

				var today = new Date();
				var year = today.getFullYear();
				var month = ('0' + (today.getMonth() + 1)).slice(-2);
				var day = ('0' + today.getDate()).slice(-2);
				var dateString = year + month  + day;

				// 출발일자가 오늘날짜보다 작을 경우 반환
				if(start_date < dateString){
					alert('출발일을 과거로 선택할 수 없습니다.');
					return false;
				}

				// 출발일자가 도착일자보다 컸을경우 반환
				if(start_date > end_date){
					alert('올바른 날짜를 입력해 주세요.');
					return false;
				}

				// 출발일자가 도착일자랑 같을경우 반환
				if(start_date === end_date){
					alert('올바른 날짜를 입력해 주세요.');
					return false;
				}
				
				

	
				var fm = document.sendForm;
				
				fm.sm_start_date.value = start_date;
				fm.sm_end_date.value = end_date;
				// fm.sm_tour_num.value = tour_num;
				fm.ac.value = sac;
				
				fm.action = "https://m.tourvalley.net:8110/tour/tourvalley/rainbow/goods/step01.jsp";
				fm.submit();

				});
		
		});
	</script>