$(document).ready(function()
{
    $("input[name=type]").change(function()
    {
        if($(this).val() == 'chanzhipersonal')
        {
            $('.chanzhipersonal').show();
            $('.chanzhienterprise').hide();
        }
        else
        {
            $('.chanzhipersonal').hide();
            $('.chanzhienterprise').show();
        }
    });

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
    });

    $(document).on('click', '#smsSender', function()
    {
        if(!$('#mobile').val()) return false;
        url = createLink('admin', 'getMobileCodeByApi', "mobile=" + $('#mobile').val());
        $.getJSON(url, function(response)
        {
            if(response.result == 'success')
            {
                 $('#smsSender').popover({trigger:'manual', content:response.message, placement:'right'}).popover('show');
                 $('#smsSender').next('.popover').addClass('popover-success');
                 function distroy(){$('#smsSender').popover('destroy')}
                 setTimeout(distroy,3000);
                 return false;
            }
            else
            {
                bootbox.alert(response.message);
            }
        });
        return false;
    });
});
