$().ready(function(){

    var nav_height;

    $('.nav-main li em').css('display', 'none');

    $('.nav-main li').hover(function(){
        nav_height = $(this).height();
        $(this).hasClass('item-first') ? $(this).animate({height: '74'}) : $(this).animate({height: '66'});
        $(this).children('a').children('em').fadeIn();
    }, function(){
        $('.nav-main li').clearQueue();
        $(this).children('a').children('em').fadeOut();
        $(this).animate({height: nav_height});
    });
    
    $('.totop').click(function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });

});