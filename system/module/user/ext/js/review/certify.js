$(document).ready(function()
{
    $(document).on('click', '.btn-review', function()
    {
        var btn = $(this);
        $.getJSON($(this).attr('href'), function(response)
        {
            if(response.result == 'success')
            {   
                 btn.popover({trigger:'manual', content:response.message, placement:'right'}).popover('show');
                 btn.next('.popover').addClass('popover-success');
                 return setTimeout(function(){location.href = response.locate;}, 1200);
                 
            }   
            else
            {   
                bootbox.alert(response.message);
            }   
        });
        return false;
    });
})
