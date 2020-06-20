$(document).ready(function()
{
    $.setAjaxForm('#uploadForm', function(response)
    {
        if(response.result == 'success')
        {
            setTimeout(function()
            {
                location.href = response.locate;
            }, 3000);
        }
    });

    $.setAjaxLoader('.okFile', '#ajaxModal');
});

