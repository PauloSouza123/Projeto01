$(function(){

    var open = true;
    var windowSize = $(window)[0].innerWidth;
    var windowSizeMenu = (windowSize <= 400) ? 200 : 300;

    $('.btn-menu').click(function(){
        if(open){
            $('.menu').animate({'width':'0'});
            $('.menu').animate({'opacity':'0'});
            $('header').animate({'width':'100%'});
            $('.main').animate({'width':'100%'});
            open = false;
        }else{
            $('.menu').animate({'width':'300px'});
            $('.menu').css({'opacity':'1'});
            $('header').css({'width':'calc(100% - 300px)'});
            $('.main').css({'width':'calc(100% - 300px)'});
            open = true;
        }
    });

    $('[formato=data]').mask('99/99/9999');

});