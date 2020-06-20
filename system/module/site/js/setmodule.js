$(document).ready(function()
{
    function init()
    {   
        $('input[name*=modules]:checked').each(function()
        {
            $(this).parent().addClass('checked');
        })    
    }

    $('.check-card').click(function()
    {
        checkbox = $(this).find('input[name*=modules]');
        checkbox.prop('checked', !checkbox.prop('checked'));
        if(checkbox.prop('checked'))
        {
            $(this).addClass('checked');
        }
        else
        {
            $(this).removeClass('checked');
        }
    });

    $.setAjaxForm('#setModuleForm', function(response)
    {
        if(!$('.tip').hasClass('hidden')) $('.tip').addClass('hidden').empty();

        if(response.result == 'fail' && typeof(response.error) != 'undefined')
        {
            $('.tip').html(response.error).removeClass('hidden');
        }
        if(response.result == 'success')
        {
            setTimeout(function(){window.location.reload();}, 1000);
        }
        return false;
    });
    init();
})
