$(document).ready(function()
{
    if(v.step == 'license') $.setAjaxLoader('.loadInModal', '#ajaxModal');

    $(document).on('click', '.btn-reload', function()
    {
        $.reloadAjaxModal(); 
    })

    $(document).on('click', '.model-jump', function()
    {
        $('#ajaxModal').attr('ref', $(this).attr('url')).load($(this).attr('url'), function()
        {
            $.zui.ajustModalPosition();
        });
    })
});
