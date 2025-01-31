$(function(){
    
    var curSlide = 0;
    var maxSlide = $('.principal-images').length - 1;
    var delay = 5;

    initSlide();
    changeSlide();

    function initSlide(){
        $('.principal-images').hide();
        $('.principal-images').eq(0).show();
        for(var i = 0; i < maxSlide + 1; i++){
            var content = $('.bullets').html();
            if(i == 0){
                content += '<span class="active-slide"></span>';
            }else{
                content += '<span></span>';
            }
            $('.bullets').html(content);
        }
    }

    function changeSlide(){
        setInterval(function(){
            $('.principal-images').eq(curSlide).stop().fadeOut(2000);
            curSlide++;
            if(curSlide > maxSlide){
                curSlide = 0;
            }
            $('.principal-images').eq(curSlide).stop().fadeIn(2000);

            $('.bullets span').removeClass('active-slide');
            $('.bullets span').eq(curSlide).addClass('active-slide');
        },delay * 1000);
    }

    $('body').on('click','.bullets span',function(){
        var currentBullet = $(this);
        $('.principal-images').eq(curSlide).stop().fadeOut();
        curSlide = currentBullet.index();
        $('.principal-images').eq(curSlide).stop().fadeIn();
        $('.bullets span').removeClass('active-slide');
        $('.bullets span').eq(curSlide).addClass('active-slide');
    });

});