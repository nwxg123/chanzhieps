$(function ()
{
    var setDelHref = function ()
    {
        var delIDs = [];
        $('input[name="deliveryAddress"]:checked').each(function (i)
        {
            delIDs[i] = $(this).val();
        });
        var delHref = $('.deleter').attr('href');
        delHref = delHref.replace(/(.*-).*(\..*)/, '$1' + delIDs.join(',') + '$2');
        $('.deleter').attr('href', delHref);
    };

    $.refreshAddressList = function ()
    {
        $('#addressListWrapper').load(window.location.href + ' #addressList');
        $('#operate').show();
        $('#create').parent().removeClass('create-center');
    };

    $(document).on('click', '.item', function ()
    {
        if($('#operate').attr('current') === 'manageDone')
        {
            if($(this).find('input[name="deliveryAddress"]').attr('checked') === false)
            {
                $(this).find('input[name="deliveryAddress"]').attr('checked', true);
            }
            else
            {
                $(this).find('input[name="deliveryAddress"]').removeAttr('checked');
                $('#allSelect').removeAttr('checked');
            }
            setDelHref();
        }
    });

    $(document).on('click', '#operate', function ()
    {
        if($(this).attr('current') === 'manage')
        {
            $(this).html(v.manageDone);
            $(this).attr('current', 'manageDone');
            $('.checkbox-circle').show();
            $('#create').hide();
            $('#delete').show();
            $('.edit-button').hide();
        }
        else
        {
            $(this).html(v.manage);
            $(this).attr('current', 'manage');
            $('.checkbox-circle').hide();
            $('#create').show();
            $('#delete').hide();
            $('.edit-button').show();
        }
    });

    $(document).on('click', '.all-select', function ()
    {
        if($(this).find('input[name="allSelect"]').attr('checked') === false)
        {
            $(this).find('input[name="allSelect"]').attr('checked', true);
            $('input[name="deliveryAddress"]').attr('checked', true);
        }
        else
        {
            $(this).find('input[name="allSelect"]').removeAttr('checked');
            $('input[name="deliveryAddress"]').removeAttr('checked');
        }
        setDelHref();
    });
});
