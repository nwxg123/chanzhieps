$(document).ready(function()
{
    $('#idcardUploader').click(function()
    {
        $('#idcardForm').find('#idcard').click();
    })

    $('#licenseUploader').click(function()
    {
        $('#licenseForm').find('#businessLicense').click();
    })

    $('input[type=file]').change(function()
    {
        $(this).parents('form').submit();
    });
    
    $.setAjaxForm('#idcardForm', function(response)
    {
        if(response.result == 'success')
        {
            $('#idcardUploader').parent().find('span.text-error').remove();
            $('#idcardUploader').prev().removeClass('hidden').html(response.image);

            $(response.image)[0].onload = function(){computeHeight(2);}
        };
    });

    $.setAjaxForm('#idCertifyForm');
    $.setAjaxForm('#businessForm');
    $.setAjaxForm('#licenseForm', function(response)
    {
        if(response.result == 'success')
        {
            $('#licenseUploader').prev().html(response.image).removeClass('hidden');
            $(response.image)[0].onload = function(){computeHeight(2);}
        }
    });

    computeHeight(0);
    computeHeight(2);
});

function computeHeight(num)
{
    $('.profile-panel .panel-body').eq(num).height('auto');
    $('.profile-panel .panel-body').eq(num + 1).height('auto');

    height1 = $('.profile-panel .panel-body').eq(num).height();
    height2 = $('.profile-panel .panel-body').eq(num + 1).height();
    max = Math.max(height1, height2);
    $('.profile-panel .panel-body').eq(num).height(max);
    $('.profile-panel .panel-body').eq(num + 1).height(max);
}
