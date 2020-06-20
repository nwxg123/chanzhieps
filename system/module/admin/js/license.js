$().ready(function()
{
    $('#applyedBtn').click(function()
    {
        bootbox.alert(v.licenseApplied, function()
        {
            $('#typeNav li').last().find('a').click();
        });
        return false;
    });
})
