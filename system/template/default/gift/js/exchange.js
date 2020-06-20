$(document).ready(function()
{
    $('#addressList').load(
         createLink('address', 'browse') + ' .col-md-10 .panel-body',
         function()
         {
             if($('#addressList').find('.address-list').size() == 0) $('a.createAddress').click().hide();
             $('#addressList a').remove();
         }
    );

    $(document).on('click', '.icon-remove', function()
    {
        $('#createAddress').val(0);
        $('.div-create-address').hide();
        $('[name=address]').eq(0).prop('checked', true);
        return false;
    });

    $(document).on('click', '.cancelEdit', function(){ $(this).parents('.item').find('div').toggle()});

    $('a.createAddress').click(function()
    {
        $('#createAddress').val(1);
        $('[name=address]').prop('checked', false);
        $('.div-create-address').show();
        return false;
    });

    $('#amount').change(function()
    {
        $('#score').text(parseInt($(this).val()) * v.score);
    });
});
