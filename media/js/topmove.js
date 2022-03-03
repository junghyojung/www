

$('.menu_ham').toggle(function(){
  $('#headerArea').addClass('top0');
 $('#headerArea ul').slideDown();
  $('.menu_ham').addClass('open');
  
},function(){
  $('#headerArea ul').slideUp();
  $('.menu_ham').removeClass('open');
  $('#headerArea').removeClass('top0');
});

  
var current2=0;

$(window).resize(function(){
 var screenSize= $(window).width(); 
  
  if( screenSize > 1024){
      $('#headerArea').addClass('top0');
      $('#headerArea ul').show();
      $('.menu_ham').removeClass('open');
       current2=1;
  }
  if(current2==1 && screenSize <= 1024){
      $('#headerArea').removeClass('top0');
      $('#headerArea ul').hide();
      current2=0;
  }
});
		

 

 //상단으로 이동
    
 $('.topMove').hide();
           
 $(window).on('scroll',function(){ //스크롤 값의 변화가 생기면
      var scroll = $(window).scrollTop(); //스크롤의 거리
     
     
      //$('.text').text(scroll);

      if(scroll>500){ //500이상의 거리가 발생되면
          $('.topMove').fadeIn('slow');  //top보여라~~~~
      }else{
          $('.topMove').fadeOut('fast');//top안보여라~~~~
      }
 });

  $('.topMove').click(function(e){
     e.preventDefault();
      //상단으로 스르륵 이동합니다.
     $("html,body").stop().animate({"scrollTop":1},3000); 
  });


  $('#select2').click(function(e){
      e.preventDefault();
      console.log('클릭');
  });





