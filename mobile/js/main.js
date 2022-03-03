// $(document).ready(function(){  		
    
//     var startX, endX;
//     var imgCount;   //이미지 개수
//     var imgSize;   //이미지 너비
//     var imgIndex=0;  //이미지 순서
//     var spanBtn='';
     
//      imgCount=$('.gallery_swiper li').length;  //li의 개수를 담는다
//      imgSize=$(window).width();  // 페이지 로드시 윈도우의 너비값을 li의 너비값으로 반환한다
//      $('.gallery_swiper li').width(imgSize);  
    
//      $('.gallery_swiper').append("<div class='pageNum'></div>");  //이미지 개수만큼 페이지네이션 만들기
//      for(var i=1; i<=imgCount;i++){
//          spanBtn+='<span></span>';
//      }
//      $('.gallery_swiper .dock').html(spanBtn);    
       
//      $('.gallery_swiper .dock .on').css({'background':'#000'});  
       
    
   
//    $('.gallery_swiper').on('touchstart mousedown',function(e){
     
//     e.preventDefault();
          
//     startX=e.pageX || e.originalEvent.touches[0].pageX;
          
//     //$('body').append(startX + '<br>');
          
//    });
       
       
   
   
   
//    $('.gallery_swiper').on('touchend mouseup',function(e){
       
//     e.preventDefault();
          
//     endX=e.pageX || e.originalEvent.changedTouches[0].pageX;
           
//     //$('body').append(endX + '<br>');
       
        
          
//     if(startX<endX) {  
//         //$('body').append(' 오른쪽으로 터치드래그' + '<br>');
//         imgIndex--;
        
//          if(imgIndex<0)imgIndex=0;
//         $('h1').text(imgIndex);
//         $('.gallery_swiper ul').animate({left:-imgSize*imgIndex},'slow');
        
//     }else{      
//         //$('body').append(' 왼쪽로 터치드래그' + '<br>');
//         imgIndex++;
//         if(imgIndex>=imgCount)imgIndex=imgCount-1;
//         $('h1').text(imgIndex);
//         $('.gallery_swiper ul').animate({left:-imgSize*imgIndex},'slow');
//     }
         
//      $('.gallery_swiper .dock  span').css({'background':'#fff'});
//      $('.gallery_swiper .dock .on('+imgIndex+')').css({'background':'#000'});
       
       
//     });
       
       
   
       
//    $(window).resize(function(){    //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
//          imgSize = $(window).width();   //너비를 li의 크기로 반환한다
//           $('.gallery_swiper li').width(imgSize); 
//           $('.gallery_swiper ul').css('left',-imgSize*imgIndex); //left값을 li의 너비 값에 대응하게 처리
//    });  
     
     
   
     
   
//    });


