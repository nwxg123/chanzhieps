$(function ()
{
    $('#requestAjaxForm').ajaxform();

    $(document).on('change', '.product-options', function ()
    {
        location.href = createLink('request', 'create', 'productID=' + $(this).val());
    })
});