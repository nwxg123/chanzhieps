/* Keep session random valid. */
needPing = true;
$('#submit').click(function()
{
    var password = $('#password').val();
    var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
    if(!reg.test($('#account').val())) password = md5(md5(md5($('#password').val()) + $('#account').val()) + v.random);

    fingerprint = getFingerprint();
    loginURL = createLink('user', 'login');
    $.ajax(
    {
        type: "POST",
        data:"account=" + $('#account').val() + '&password=' + password + '&referer=' + encodeURIComponent($('#referer').val()) + '&fingerprint=' + fingerprint,
        url:loginURL,
        dataType:'json',
        success:function(data)
        {
            if(data.result == 'success') return location.href=data.locate;
            $.ajax(
            {
                type: "POST",
                data: "account=" + $('#account').val() + '&password=' + encodeURIComponent($('#password').val()) + '&referer=' + encodeURIComponent($('#referer').val()) + '&fingerprint=' + fingerprint,
                url:loginURL,
                dataType:'json',
                success:function(data)
                {
                    if(data.reason == 'captcha')
                    {
                        $('.captchaModal').prop('href', data.url);
                        setTimeout(function(){$('.captchaModal').click();}, 1000);
                    }
                    if(data.result == 'fail') showFormError(data.message);
                    if(data.result == 'success') location.href=data.locate;
                    if(typeof(data) != 'object') showFormError(data);
                },
                error:function(data){showFormError(data.responseText);}
            })
        },
        error:function(data){showFormError(data.responseText);}
    })
    return false;
});

function showFormError(text)
{
    if(text == '') return true;
    var error = $('#formError').text(text);
    var parent = error.closest('.form-group');
    if(parent.length) parent.show();
    else $('#formError').show();
}
