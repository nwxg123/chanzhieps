$(document).ready(function()
{
    $('input[name=open]').change(function()
    {
        $('.cdn-host').toggle($('#open1').prop('checked'));
    });

    $('input[name=open]').change();

    $.setAjaxForm('#websiteForm', function(response)
    {
        if(response.result != 'success')
        {
            if(!$('.tip').hasClass('hidden')) $('.tip').addClass('hidden').empty();

            if(response.result == 'fail' && typeof(response.error) != 'undefined')
            {   
                $('.tip').html(response.error).removeClass('hidden');
            }
            else if(response.reason == 'captcha')
            {
                $('.captchaModal').click();
            }
            else if(response.message.length)
            {
                $.each(response.message, function(key, file)
                {
                    $('#messageBox').append(file + '<br>').parent().show();
                })
            }
        }
        
        if('success' == response.result) 
        {
          $.get(location.href, function(){window.location.reload();});
        }
    });

    $('#websiteForm input').change(function(){ $('#messageBox').html('').parent().hide();});

    $('.cdnreseter').click(function()
    {
        $('#messageBox').html('').parent().hide();
        $('#site').val($('#site').data('default'));
    })

    $('[name^=requestType]').change(function()
    {
        if(!$('[value=PATH_INFO]').prop('checked') && v.requestType == 'pathinfo')
        {
            $('#requestTypeTip').fadeIn();
        }
        else
        {
            $('#requestTypeTip').hide();
        }
    });

    $('[name^=requestType]').change();
});
