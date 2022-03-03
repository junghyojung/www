	//top 상단이동코드
	$(document).ready(function () {
		$('.topMove').hide(); //top button 안보임
		$(window).on('scroll', function () { //스크롤의 위치가 바뀌면 발생하는 이벤트
			var scroll = $(window).scrollTop(); //스크롤의 상단부터의 거리

			//$('.text').text(scroll); //스크롤 거리를 출력해준다
			if (scroll > 500) { //스크롤 탑의 거리가 500px이 넘어가면 보여진다. 
				$('.topMove').fadeIn('slow');
			} else {
				$('.topMove').fadeOut('fast');
			}
		});

		//탑메뉴를 클릭하면 상단 탑메뉴로 이동
		$('.topMove').click(function (e) {
			e.preventDefault();

			//상단으로 스르륵 이동합니다.
			$("html,body").stop().animate({
				"scrollTop": 0
			}, 500); //스크롤의 위치를 이동시킨다.
		});
	});


