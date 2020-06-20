$(function()
{
    $('#hour, #minute, #second').change(function()
    {
        $('#' + $(this).attr('id') + 'Label').remove();
        $('#timeLimitLabel').remove();
    });

    $('#endAmount, #endTime').change(function()
    {
        $('#endConditionLabel').remove();
    });
});
