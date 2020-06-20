$(document).ready(function()
{
    /* Set the orginal and copySite, copyURL fields. */
    $('#source').change(function()
    {
        $('#copyBox').hide().find(':input').attr('disabled', true);
        if($(this).val() != 'original') $('#copyBox').show().find(':input').attr('disabled', false);
    });

    $('#isLink').change(function()
    {   
        if($(this).prop('checked'))
        {   
            $('.articleInfo').hide();
            $('.link').show();
        }   
        else
        {   
            $('.articleInfo').show();
            $('.link').hide();
        }   
    }); 
    
    $("input[name='status']").change(function()
    {
        if($("input[name='status']:checked").val() == 'normal')
        {
            $('.timed th').removeClass('draft-selected');
            $('.timed').find('input').removeAttr('disabled').removeClass('draft-selected');
        }
        else
        {
            $('.timed th').addClass('draft-selected');
            $('.timed').find('input').attr('disabled','disabled').addClass('draft-selected');
        }
    });

    /* Set current active topNav. */
    if(v.path && v.path.length)
    {
        var hasActive = false;
        $.each(v.path, function(index, category) 
        { 
            if(!hasActive)
            {
                if($('.nav-article-' + category).length >= 1) hasActive = true;
                $('.nav-article-' + category).addClass('active');
            }
        });
        if(!hasActive) $('.nav-article-0').addClass('active');
    }

    if(v.categoryID !== 0) $('.tree #category' + v.categoryID).addClass('active');
});
