$(function()
{
    $('#industryBox > .tree > li > a[href*="&param=' + $('#storeThemes').data('param') + '"]').parent().addClass('active');

    $(document).on('click', '#byindustry', function ()
    {
        var icon = $(this).find('i');
        if(icon.hasClass('icon-angle-down'))
        {
            icon.removeClass('icon-angle-down').addClass('icon-angle-up');
        }
        else
        {
            icon.removeClass('icon-angle-up').addClass('icon-angle-down');
        }
    });

    $(document).on('hide.zui.modal', '#ajaxModal', function ()
    {
        $('#ajaxModal').html('');
        $('.modal-backdrop').remove();
    });
});
