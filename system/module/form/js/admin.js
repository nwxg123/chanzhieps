$(function()
{
    $('.preview').click(function()
    {
        $.cookie('preview', true, config.cookieLife, config.cookiePath);
    });
});
