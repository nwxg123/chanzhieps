{include TPL_ROOT . 'common/header.html.php'}
{$common->printPositionBar('payorder', $order)}
<form method='post' id='ajaxForm'>
  <div class='panel'>
    <div class='panel-heading'><strong>{$lang->gift->order->confirm}</strong></div>
    <table class='table table-borded'>
      <tr class='text-center'> 
        <th class='w-id'>{$lang->gift->id}</th>
        <th class='text-left'>{$lang->gift->name}</th>
        <th>{$lang->gift->score}</th>
      </tr>
      <tr class='text-center'> 
        <td>{$order->id}</td>
        <td class='text-left'>
          {!echo $order->gift->productName  . ' &times ' . $order->gift->count}
          {if(!empty($order->gift->extra))}
            {foreach($order->gift->extra as $code => $value)}
              {$value}
            {/foreach}
          {/if}
        </td>
        <td>{$order->score}</td>
      </tr>
    </table>
    <div class='panel-footer'>
      {!html::submitButton($lang->gift->order->exchange, "btn btn-primary") . html::hidden('orderID', $order->id)}
    </div>
  </div>
</form>
{include TPL_ROOT . 'common/footer.html.php'}
