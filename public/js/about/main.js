$(document).ready(function()
{
    $('#tell_me_more').click(function()
    {
        $('#tell_me_more').hide();
        $('#bio').show();
        $('#main').animate({
            height: $('#summary').height()+250
        }, 500);
        $('html, body').animate({scrollTop: $('#summary').offset().top}, 500);
        $('#button_group').show();
    });

    $('#go_to_feats').click(function(){
        $('#nav #feats_button').click();
    });
});