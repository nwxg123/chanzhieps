$(document).ready(function()
{
    $('#sender').click(function()
    {
        var data = {mobile: $('#mobile').val()};
        var url = $(this).attr('href');
        $.post(url, data, function(response)
        {
            if(response.result == 'success')
            {
                 $('#sender').popover({trigger:'manual', content:response.message, placement:'right'}).popover('show');
                 $('#sender').next('.popover').addClass('popover-success');
                 function distroy(){$('#sender').popover('destroy')}
                 setTimeout(distroy,2000);
            }
            else
            {
                bootbox.alert(response.message);
            }
        }, 'json')
        return false;
    })
})
