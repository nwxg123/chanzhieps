$().ready(function()
{
    $.setAjaxForm('#serviceForm', function(response)
    {
        if(response.result == 'success')   
        {
            setTimeout(function(){window.location.reload()}, 1500);
            $.getJson($(this).attr('href'), function(response)
            {
                $.reloadAjaxModal();
            });
        }
    });
});
