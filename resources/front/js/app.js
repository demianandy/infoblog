$(function(){
    // ================== ПЛАВНОЕ ПЕРЕМЕЩЕНИЕ =====================

    var link = $('.link');

    link.on('click', function(e){
        e.preventDefault();

        var selector = $($(this).attr('href'));

        $('html, body').animate({
            scrollTop: selector.offset().top - 0
        }, 600);
    })

})