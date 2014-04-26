/**
 * Created by Administrator on 14-4-26.
 */

$(document).ready(function(){
    $(".accordion-body").removeClass('in');

    $(".left-menu-nav li a").each(function() {
        var href = window.location.href;
        if(href.indexOf($(this).attr('href'))>=0){
            $(this).addClass('active');
            $(this).parent().parent().parent().parent().addClass('in');
            $(this).parent().parent().show();
        }
    });
});