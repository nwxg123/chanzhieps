$().ready(function()
{
    price = $('#promotion').val() > 0 ? $('#promotion').val() : $('#price').val();

    $('.price-inputer').change(function()
    {
        computedPrice = parseFloat(price) + parseFloat($(this).val());
        $(this).parents('td').next().html(computedPrice);
    })

    $('.price-inputer').change();
});
