$(document).ready(function()
{
    $('#copyBox').hide().find(':input').attr('disabled', true);
    $('#source').change(function()
    {
        $('#copyBox').hide().find(':input').attr('disabled', true);
        if($(this).val() != 'original') $('#copyBox').show().find(':input').attr('disabled', false);
    });

    /* Set current active topNav. */
    var hasActive = false;
    if(v.categoryID > 0 && $('.nav-video-' + v.categoryID).length >= 1)
    {
        hasActive = true;
        $('.nav-video-' + v.categoryID).addClass('active');
    }

    if(v.categoryPath && v.categoryPath.length)
    {
        $.each(v.categoryPath, function(index, category)
        {
            if(!hasActive)
            {
                if($('.nav-video-' + category).length >= 1) hasActive = true;
                $('.nav-video-' + category).addClass('active');
            }
        });
    }
    else if(v.path && v.path.length)
    {
        $.each(v.path, function(index, category)
        {
            if(!hasActive)
            {
                if($('.nav-video-' + category).length >= 1) hasActive = true;
                $('.nav-video-' + category).addClass('active');
            }
        });
        if(!hasActive) $('.nav-video-0').addClass('active');
    }

    if(v.categoryID !== 0) $('#category' + v.categoryID).parent().addClass('active');
});
