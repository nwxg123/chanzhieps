$(document).ready(function()
{
    $('.btn-card-uploader, .#cardBox img').click(function()
    {
        $('#cardForm').find('#card').click();
    })

    $('.btn-license-uploader, #licenseBox').click(function()
    {
        $('#licenseForm').find('#license').click();
    })

    $('input[type=file]').change(function()
    {
        uploader = $(this).data('uploader');
        $(uploader).replaceWith('<i class="icon icon-lg icon-spin icon-refresh"></i>');
        $(this).parents('form').submit();
    });
    
    $.setAjaxForm('#cardForm', function(response)
    {
        if(response.result == 'success')
        {
            $('.cardBox').html(response.image);
        };
    });

    $.setAjaxForm('#licenseForm', function(response)
    {
        if(response.result == 'success')
        {
            $('#licenseBox').html(response.image);
        };
    });

});
