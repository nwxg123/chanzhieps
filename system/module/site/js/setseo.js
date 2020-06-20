$(document).ready(function()
{
    $.setAjaxForm('#setSeoForm', function(response)
    {
        if(!$('.tip').hasClass('hidden')) $('.tip').addClass('hidden').empty();

        if(response.result == 'fail' && typeof(response.error) != 'undefined')
        {
            $('.tip').html(response.error).removeClass('hidden');
        }
        return false;
    });
})
