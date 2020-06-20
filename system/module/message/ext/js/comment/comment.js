$(document).ready(function()
{
    $('#pager').find('a').click(function()
    {
        if(v.objectType == 'order') $('#commentForm').closest('.modal-body').load($(this).attr('href'));
        if(v.objectType != 'order') $('#commentForm').closest('#commentBox').load($(this).attr('href'));
        return false;
    });

    /* Process contents. */
    $('.content-detail').each(function()
    {
        var obj = $(this);
        if(obj.height() > 100)
        {
            var buttons = "<a href='javascript:void(0)' onclick='showDetail(this)' class='showDetail'> ... " + v.showDetail + "</a>";
            buttons    += "<a href='javascript:void(0)' onclick='hideDetail(this)' class='hideDetail'> " + v.hideDetail + "</a>";
            obj.parent().append(buttons);
            obj.parent().find('.hideDetail').hide();
            obj.addClass('content-abstract');
        }
    });
});

function showDetail(obj)
{
    var tdContent = $(obj).parents('.td-content');
    tdContent.find('.content-detail').removeClass('content-abstract');
    tdContent.find('.showDetail').hide();
    tdContent.find('.hideDetail').show();
}

function hideDetail(obj)
{
    var tdContent = $(obj).parents('.td-content');
    tdContent.find('.content-detail').addClass('content-abstract');
    tdContent.find('.showDetail').show();
    tdContent.find('.hideDetail').hide();
}
