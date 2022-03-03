$(document).ready(function(){
    // style 기본설정

    $('.business_text').hide();
    // 섬유무역/중공업/... 해당 div 숨기기 --> hide();
    $('#tab1').show();
    // 섬유무역 div 보여주기 --> show();
    $('#select1').css('background', '#185d9c');
    // 섬유무역 tab 파란색으로 기본설정
    $('.business_img').hide();
    $('#business_img1').show();
    

    // 섬유무역 클릭이벤트
    $('#select1').click(function(e){
        e.preventDefault();
        // a링크를 통해 #으로 가는 것을 막아줌
        $('.business_text').hide();
        // 아예 전체 div를 한 번 없에줌
        $('.business_img').hide();
        // 전체 이미지를 다 지워줌
        $('#business_img1').show();
        // 1번 이미지만 보여주게 하기
        $('#tab1').show();
        // 섬유무역 div를 보여줌
        $('.select').css('background', 'rgba(255, 255, 255, 0)');
        // 아예 전체 li 배경색을 없에줌 (--> $('.business_text').hide(); 참고)
        $('#select1').css('background', '#185d9c');
        // 1번 클릭이벤트니까 select 1번을 파랑색으로 변경
        $('.alink').css('color', 'black');
        // alink 전체 글씨 색 black으로 변경
        $('#alink1').css('color', 'white');
        // 선택 된 alink의 글씨 색만 하얀색으로 변경
    });

    $('#select2').click(function(e){
        e.preventDefault();
        $('.business_text').hide();
        $('.business_img').hide();
        $('#business_img2').show();
        $('#tab2').show();
        $('#select2').css('z-index','10' );
        $('.select').css('background', 'rgba(255, 255, 255, 0)');
        $('#select2').css('background', '#185d9c');
        $('.alink').css('color', 'black');
        $('#alink2').css('color', 'white');
    });

    $('#select3').click(function(e){
        e.preventDefault();
        $('.business_text').hide();
        $('.business_img').hide();
        $('#business_img3').show();
        $('#tab3').show();
        $('#select3').css('z-index','10' );
        $('.select').css('background', 'rgba(255, 255, 255, 0)');
        $('#select3').css('background', '#185d9c');
        $('.alink').css('color', 'black');
        $('#alink3').css('color', 'white');
    });

    $('#select4').click(function(e){
        e.preventDefault();
        $('.business_text').hide();
        $('.business_img').hide();
        $('#business_img4').show();
        $('#tab4').show();
         $('#select4').css('z-index','10' );
        $('.select').css('background', 'rgba(255, 255, 255, 0)');
        $('#select4').css('background', '#185d9c');
        $('.alink').css('color', 'black');
        $('#alink4').css('color', 'white');
    });
});




//슬라이드
// JavaScript Document
$(document).ready(function() {
   
    var position=0;  //최초위치
    var movesize=450; //이미지 하나의 너비
    //var timeonoff;
   
    $('.slide_gallery ul').after($('.slide_gallery ul').clone());

    /*
    timeonoff= setInterval(function () {
           position-=movesize;  // 150씩 감소
       $('.slide_gallery').stop().animate({left:position}, 'fast',
            function(){							
           if(position==-750){
              $('.slide_gallery').css('left',0);
              position=0;
           }
       });
   }, 2000);
   */
    
    
        //슬라이드 겔러리를 한번 복제
 
  $('.button').click(function(e){
     e.preventDefault();

     //clearInterval(timeonoff);
     
     if($(this).is('.m1')){
          if(position==-2250){
              $('.slide_gallery').css('left',0);
               position=0;
           }
         
          position-=movesize;  // 450씩 감소
              $('.slide_gallery').stop().animate({left:position}, 'fast',
                function(){							
                    if(position==-2250){
                        $('.slide_gallery').css('left',0);
                        position=0;
                    }
                });
     }else if($(this).is('.m2')){
           if(position==0){
                $('.slide_gallery').css('left',-2250);
                position=-2250;
            }
 
            position+=movesize; // 450씩 증가
            $('.slide_gallery').stop().animate({left:position}, 'fast',
                function(){							
                    if(position==0){
                        $('.slide_gallery').css('left',-2250);
                        position=-2250;
                    }
                });
      }
   });
});

