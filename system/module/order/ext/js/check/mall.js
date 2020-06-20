$(document).ready(function()
{
    $("input[name*=balance]").change(function()
    {
        if(!$('input[type=checkbox]').prop('checked'))
        {
            $('#remainAmount').html(v.currencySymbol + v.amount);
        }
        if($('input[type=checkbox]').prop('checked'))
        {
            if(v.balance >= v.amount)
            {
                $('#remainAmount').html(v.currencySymbol + '0');
            }
            else
            {
                payAmount = parseFloat(v.amount) - parseFloat(v.balance);
                $('#remainAmount').html(v.currencySymbol + parseFloat(payAmount).toFixed(2)).parent().show();
            }
        }
        $("input[name='paymentList']").change();
    });

    $("input[name*=balance]").change();
});
