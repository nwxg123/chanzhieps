$().ready(function()
{
    $('.goodsDeleter').click(function()
    {
        $(this).parents('tr').remove();
        $('[name^=count]').change();
    });

    $('[name^=useScore]').change(function()
    {
        if($(this).prop('checked'))
        {
            $('.scoreForm').show();
        }
        else
        {
            $('#score').val('');
            $('#score').change();
            $('.scoreForm').hide();
        }
    });

    $('#score').change(function()
    {
        if(!$(this).val()) $(this).val(0);
        if(parseInt($(this).val()) > parseInt($(this).attr('max'))) $(this).val($(this).attr('max'));
        $(this).val(parseInt($(this).val()));

        ratio = parseInt($(this).data('ratio'));
        value = parseInt($(this).val());
        value = parseFloat(value/ratio).toFixed(2);
        if(isNaN(value)) value = 0;
        $(this).next('strong').text('- ' + value);
        amount = 0;
        $('.amountContainer').each(function()
        {
          amount += parseFloat($(this).html());    
        })
        amount -= value;
        $('#amount').text(v.currencySymbol + amount);
    });

    $('[name^=count]').change(function()
    {
        scoreLimit = 0;
        $('[name^=scoreLimit]').each(function()
        {
            scoreLimit += parseInt($(this).parents('tr').find('[name^=count]').val()) * parseInt( $(this).val());
        });
        scoreLimit = Math.min(scoreLimit, v.userScore);
        $('#score').attr('max', scoreLimit);
        $('#maxScoreLabel').text(scoreLimit);

        $('#score').change();
    });
    $('[name^=useScore]').change();
});
