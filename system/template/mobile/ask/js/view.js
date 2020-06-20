$(function ()
{
    if($('.operations .options a').length === 0)
    {
        $('.operations').hide();
    }

    function setAnswerByFAQ(id)
    {
        if(id)
        {
            $.get(createLink('ask', 'ajaxGetFAQ', 'id=' + id), function(answer)
            {
                $('#content').html(answer);
            });
        }
        else
        {
            $('#content').html('');
        }
    }

    $('#commentForm').ajaxform();

    $('.modal-trigger').on('click', function (e)
    {
        $('.modal-trigger').hide();
    });

    $('.modal-trigger .modal-dialog').on('click', function (e)
    {
        e.stopPropagation();
    });

    $('.modal-trigger .close').on('click', function ()
    {
        $('.modal-trigger').hide();
    });

    $(document).on('click', '.operations .trigger', function ()
    {
        $(this).addClass('active');
        setTimeout(function(){
            $('.operations .trigger').removeClass('active');
        }, 100);
    });
});
