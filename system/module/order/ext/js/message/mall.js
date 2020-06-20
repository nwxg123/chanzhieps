$(document).ready(function()
{
    $('#pager').find('a').click(function()
    {
        $(this).closest('#ajaxModal').load($(this).attr('href'));
        return false;
    });

    $.setAjaxLoader('.loadInModal', '#ajaxModal');
})
