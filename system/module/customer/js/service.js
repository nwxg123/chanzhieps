$().ready(function()
{
    $.setAjaxLoader('.loadInModal', '#ajaxModal');

    $('.btn-extend').click(function()
    {
        btn = $(this);
        bootbox.confirm(v.extendNotice + $(this).text(), function(result)
        {
            if(result)
            {
                $.getJSON(btn.attr('href'), function(response)
                {
                    if(response.result == 'success')
                    {
                        btn.parent().prev().html('<span>' + response.message + '</span>').show();
                        btn.parent().prev().find('span').hide().fadeToggle('slow').addClass('text-important');
                    }
                    else
                    {
                        bootbox.alert(response.message);
                    }
                });
            }
            return true;
        });
        return false;
    });
});
