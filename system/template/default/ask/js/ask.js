$(document).ready(function()
{
    $(document).on('change', '#product', function()
    {
        productID = $(this).val();
        link = createLink('ask', 'ask', 'categoryID=' + v.categoryID + '&productID=' + productID);
        location.href = link;
    });

    $.setAjaxForm('#askForm', function(response)
    {
        if(response.result == 'success')
        {
            setTimeout(function(){ location.href = response.locate;}, 1200);
        }
        else
        {
            if(response.reason == 'needChecking')
            {
                $('#captchaBox').html(Base64.decode(response.captcha)).show();
            }
        }
    });
})
