$(function(){
    var $navWrap=$('.nav-wrap');
    var $offsetTop =$navWrap.offset().top;
    var $placeholder = $('.placeholder');

    function navmod(){
        if($(window).scrollTop() >= 50){
            $navWrap.addClass('nav-wrap-fixed');
            $placeholder.css('display','block');
        }else{
            $navWrap.removeClass('nav-wrap-fixed');
            $placeholder.css('display','none');
        }
    }
    navmod();
    $(window).scroll(function(){navmod()});
	$('.nav-list-item-f').mouseover(function(){
        $(this).addClass('on');
        $(this).find('.nav-list-s').show();
    });
    $('.nav-list-item-f').mouseout(function(){
        $(this).removeClass('on');
        $(this).find('.nav-list-s').hide();
    });
});