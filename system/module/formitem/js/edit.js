$(function()
{
    $('[name=optionType]').change(function()
    {
        if($('[name=optionType]:checked').val() == 'text') 
        {
            $('#optionsTD').parent().show();
            $('#optionsTD > .option').show();
            $('#optionsTD > .file-list').hide();
            $('.uploader-btn-browse').hide();
            $('[name=display]').parents('tr').show();
        }
        else
        {
            if($('#optionsTD > .file-list > .file').length > 0) 
            {
                $('#optionsTD').parent().show();
                $('#optionsTD > .option').hide();
                $('#optionsTD > .file-list').show();
            }
            else
            {
                $('#optionsTD').parent().hide();
            }
            $('.uploader-btn-browse').show();
            $('[name=display]').parents('tr').hide();
        }
    });

    var order = $('.option').length;
    $(document).on('click', '.addItem', function()
    {
        $(this).parents('.option').after($(this).parents('.input-group').prop('outerHTML'));
        $(this).parents('.option').next().find('[name^=options]').attr('name', 'options[' + v.key + ']').val('');
        $(this).parents('.option').next().find('[name^=answers]').attr('value', v.key);
        $(this).parents('.option').next().find('[name^=modes]').val('new');
        $(this).parents('.option').next().attr('data-order', order++);
        fixOptionIndex();
        v.key++;
    });

    $(document).on('click', '.delItem', function()
    {
        if($('.delItem').length == 1)
        {
            $(this).parents('.input-group').find('[name*=options]').val('');
            return false;
        }

        $(this).parents('.input-group').remove();
        fixOptionIndex();
    });

    $('#optionsTD').sortable({trigger: '.sortItem', selector: '.option', finish: function(){fixOptionIndex();}});
    $('[name=optionType]').change();
})

function fixOptionIndex()
{
    var index = 1;
    $('.index').each(function()
    {
        $(this).html(index);
        index++;
    });
}
