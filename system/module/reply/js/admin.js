$(document).ready(function()
{
    $('.btn-batch.delete').click(function()
    {
        bootbox.confirm(v.lang.confirmDelete, function(result)
        {
            if(result) $('#ajaxForm').submit();
        });
        return false;
    });
});
