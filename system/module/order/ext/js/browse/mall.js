$(document).ready(function()
{
    $('a[disabled=disabled]').addClass('disabled').css('color', '#aaa');

    $.setAjaxForm('#commentForm', function(response)
    {
        if(response.result == 'success')
        {
            setTimeout(function()
            {
                var link = createLink('message', 'comment', 'objecType=' + v.objectType + '&objectID=' + v.objectID);
                if(v.objectType == 'order') $('#commentForm').closest('.modal-body').load(link, location.href="#first");
                if(v.objectType != 'order') $('#commentForm').closest('#commentBox').load(link, location.href="#first");
            },  
            1000);   
        }
        else
        {
            if(response.reason == 'needChecking')
            {
                $('#captchaBox').html(Base64.decode(response.captcha)).show();
            }
        }
    });
});
