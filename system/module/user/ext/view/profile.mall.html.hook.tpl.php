{if(strpos($config->shop->payment, 'balance') !== false)}
{$balance = $control->loadModel('balance')->decode($user->balance)}
<table class='hidden'>
  <tr class='balanceTR'> 
    <th class="text-right">{$lang->user->balance}</th> 
    <td class='text-danger'>
      <strong class='text-lg'>{$config->product->currencySymbol}{$balance}</strong>
      {if($config->shop->payment != 'balance' and $config->shop->payment != 'COD,balance' and helper::createLink('balance', 'recharge'))}
      {!html::a(helper::createLink('balance', 'recharge'), "<i class='icon icon-signin'></i> " . $lang->user->recharge, "class='inline-block' data-toggle='modal'")}
      {/if}
    </td> 
  </tr>
</table>

{noparse}
<script>
$().ready(function()
{
    $('#btnBox').parent('tr').before($('.balanceTR'));
})
</script>
{/noparse}
{/if}
