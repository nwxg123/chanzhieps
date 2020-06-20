$(function()
{
    $('.answer').each(function()
    {
        $(this).css('margin-left', $(this).parents('.item-heading').find('.order').width() + 4);
    });
})
