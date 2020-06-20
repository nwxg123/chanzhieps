$(function()
{
    $(document).on('change', '.product-options', function ()
    {
        location.href = createLink('ask', 'ask', 'categoryID=0&productID=' + $(this).val());
    });

    $('#askForm').ajaxform({
        onSuccess: function (response)
        {
            if(response.result == 'fail' && response.captcha)
            {
                $('.captcha-box').html(Base64.decode(response.captcha)).removeClass('hide');
            }
        }
    });
});