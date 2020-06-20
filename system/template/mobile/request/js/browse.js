$(function()
{
    $(document).on('click', '.operations .trigger', function ()
    {
        $(this).addClass('active');
        setTimeout(function(){
            $('.operations .trigger').removeClass('active');
        }, 100);
    });
});