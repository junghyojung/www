
    var swiper = new Swiper('.swiper-container', {
      breakpoints: { //반응형 조건 속성
        640: { //640 이상일 경우
          slidesPerView: 1, //레이아웃 2열
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
     
      direction: getDirection(),
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      on: {
        resize: function () {
          swiper.changeDirection(getDirection());
        }
      }
    });

    function getDirection() {
      var windowWidth = window.innerWidth;
      var direction = window.innerWidth <= 320? 'vertical' : 'horizontal';
   
      return direction;
      
      
    }


  
    
