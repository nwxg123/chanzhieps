$(document).ready(function()
{
    $('[name=createValue]').change(function()
    {
        if($(this).prop('checked'))
        {
            $(this).parents('.input-group').find('input[name*=value]').attr('disabled', false).removeClass('hidden');
            $(this).parents('.input-group').find('select[name*=value] + div').hide();
        }
        else
        {
            $(this).parents('.input-group').find('input[name*=value]').attr('disabled', true).addClass('hidden');
            $(this).parents('.input-group').find('select[name*=value] + div').attr('disabled', false).show();
        }
    })

    $('[name=createValue]').change();
})
