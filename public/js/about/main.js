$(document).ready(function()
{
    $('#tell_me_more').click(function()
    {
        $('#tell_me_more').hide();
        $('#bio').show();
        if ($(window).width() < 480 || $(window).height() < 480) {
            // $('#main').animate({
            //     height: $('#summary').height()+800
            // }, 500);
        }
        else
        {
            $('#main').animate({
                height: $('#summary').height()+200
            }, 500);
        }
        $('html, body').animate({scrollTop: $('#summary').offset().top}, 500);
        $('#button_group').show();
    });

    $('#go_to_feats').click(function(){
        $('#nav #feats_button').click();
    });
});