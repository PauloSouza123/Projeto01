$(function(){

    $('nav.mobile i').click(function(){
        var listaMenu = $('nav.mobile ul');
        var icone = $('.mobile-icon i');
        if(listaMenu.is(':hidden') == true){
            icone.removeClass('fa-bars');
            icone.addClass('fa-x');
            listaMenu.slideToggle();
        }else{
            icone.removeClass('fa-x');
            icone.addClass('fa-bars');
            listaMenu.slideToggle();
        }
    });

    if($('target').length > 0){
        var elemento = '#'+$('target').attr('target');
        var divScroll = $(elemento).offset().top;
        $('html,body').animate({'scrollTop':divScroll},2000);
    }

    carregarDinamico();
    function carregarDinamico(){
        $('[realtime]').click(function(){
            var pagina = $(this).attr('realtime');
            $('.container-principal').load('/MyProjects/Projeto_01/pages/'+pagina+'.php');
        });

        return false;
    }








});