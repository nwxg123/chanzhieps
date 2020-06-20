$(function()
{
    $('[name=status]').change(function()
    {
        $('#staff, #onlineResponse, #offlineResponse').parents('tr').toggle($('#status1').prop('checked'));
    });

    $('[name=status]').change();
});
