
  $(document).ready(function(){
    $('.boxgrid').hover(function(){
        $(".boxcaption",this ).animate({top:0}, 'slow').clearQueue();
    }, function() {
        $(".boxcaption",this).animate({top:95},'fast');
    });
});