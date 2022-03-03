$(document).ready(function(){
     
    $('.open').on('click', function(e){
        e.preventDefault();
        
        $(this).next('.leader').fadeIn('slow');
        $('.box').show();
    });
   
   $('.close, .box').on('click', function(e){
       e.preventDefault();
       
        $('.leader').fadeOut('fast');
        $('.box').hide();
   });
});
