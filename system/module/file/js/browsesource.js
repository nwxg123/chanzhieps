$(document).ready(function()
{
    var clipboard = new ClipboardJS('.copyBtn');
    clipboard.on('success', function(e) {
        $(e.trigger).focus().tooltip('show', v.copySuccess);
    });

    $.setAjaxForm('#fileForm', function(response)
    {
        if(response.result == 'fail')
        {
            if(response.error && response.error.length)
            {
                bootbox.dialog(
                {
                    message: response.error,
                    buttons:
                    {
                        back:
                        {  
                            label:     v.lang.back,
                            className: 'btn-primary',
                            callback:  function(){location.reload();}
                        },
                        'continue':
                        {  
                            label:     v.lang['continue'],
                            className: 'btn-primary',
                            callback:  function()
                            {
                                $('#fileForm #submit').append("<input value='1' name='continue' class='hide'>");
                                $('#fileForm #submit').click();
                            }
                        }
                    }  
                });
            }
        }
        else
        {
            setTimeout(function(){location.href = createLink('file', 'browsesource');}, 1200);
        }
    });

    $('.image-view').on('click', function()
    {
        var  batchSelect = $('.batch-select');
        $('.image-view').addClass('active').removeClass('list-view-active');
        $('.list-view').removeClass('active');
        $('#imageView').show();
        batchSelect.show();
        if(batchSelect.hasClass('disabled'))
        {
            $('.cancel-batch-select').show();
            $('.image-view-batch-delete-btn').show();
        }
        $('#listView').hide();
        $.cookie('sourceViewType', 'image', {path: config.cookiePath});
    });

    $('.list-view').on('click', function()
    {
        $('.list-view').addClass('active');
        $('.image-view').addClass('list-view-active').removeClass('active');
        $('#listView').show();
        $('#imageView').hide();
        $('.batch-select').hide();
        $('.cancel-batch-select').hide();
        $('.image-view-batch-delete-btn').hide();
        $.cookie('sourceViewType', 'list', {path: config.cookiePath});
    });


    var type = $.cookie('sourceViewType');
    if(typeof(type) === 'undefined') type = 'image';
    $('.' + type + '-view').click();
    
    $('.file-source input').mouseover(function(){$(this).select()});

    $('.checkAll').on('click', function()
    {
        $(this).closest('#' + $(this).val()).find(':checkbox').prop('checked', $(this).prop('checked'));
    });

    $('.batch-select').on('click', function()
    {
        $(this).addClass('disabled');
        $('#imageView .file-source .input-group .input-group-select').show();
        $('.cancel-batch-select').show();
        $('.image-view-batch-delete-btn').show();
    });

    $('.cancel-batch-select').on('click', function ()
    {
        $('.batch-select').removeClass('disabled');
        $(this).hide();
        $('.image-view-batch-delete-btn').hide();
        $('#imageView .file-source .input-group .input-group-select').hide();
    });

    $.setAjaxForm('#imageViewForm');
    $('.image-view-batch-delete-btn').on('click', function ()
    {
        var deleter = $(this);
        var message = deleter.data('message') ? deleter.data('message') : v.lang.confirmDelete;
        bootbox.confirm(message, function(result)
        {
            if(result)
            {
                $('.image-view-batch-delete').click();
            }
            return true;
        });
        return false;
    });

    $.setAjaxForm('#listViewForm');
    $('.list-view-batch-delete-btn').on('click', function ()
    {
        var deleter = $(this);
        var message = deleter.data('message') ? deleter.data('message') : v.lang.confirmDelete;
        bootbox.confirm(message, function(result)
        {
            if(result)
            {
                $('.list-view-batch-delete').click();
            }
            return true;
        });
        return false;
    });

    $('#listView tbody .checkbox-primary input').change(function ()
    {
        $('#listView tfoot .checkbox-primary .checkAll').prop('checked', true);
        $('#listView tbody .checkbox-primary input').each(function ()
        {
            if(!$(this).is(':checked')) $('#listView tfoot .checkbox-primary .checkAll').prop('checked', false);
        });
    });

    $.setAjaxForm('.deleteForm', function(response)
    {
        if(response.result == 'success') location.href = location.href;
    });
});
