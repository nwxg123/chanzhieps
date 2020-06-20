{include TPL_ROOT . 'common/header.html.php'}
<div class='row'>
  {include TPL_ROOT . 'user/side.html.php'}
  <div class='col-md-10'>
    <div class='panel'>
      <div class='panel-heading'><strong>{$lang->user->gift->caption}</strong></div>
      <table class='table table-hover table-striped' id='giftdata'>
        <thead>
          <tr class='text-center'>
            <th class='w-50px'> {$lang->user->gift->id}</th>
            <th class='w-100px'>{$lang->user->gift->product}</th>
            <th class='w-100px'>{$lang->user->gift->score}</th>
            <th class='text-left'>{$lang->user->gift->info}</th>
            <th class='w-150px'>{$lang->user->gift->createdDate}</th>
            <th class='w-100px'>{$lang->user->gift->status}</th>
	        <th class="w-100px">{$lang->user->gift->action}</th>
          </tr>
        </thead>
        <tbody class='text-center'>
          {foreach($giftOrders as $giftOrder)}
            <tr>
              <td>{$giftOrder->id}</td>
              <td>{$giftOrder->productName}</td>
              <td>{$giftOrder->score}</td>
              <td class='text-left'>{$giftOrder->info}</td>
              <td>{$giftOrder->createdDate}</td>
              <td>{$lang->user->gift->order->statusList[$giftOrder->status]}</td>
              <td class="text-center">
                {if($giftOrder->status == 'sent')}
                  {!html::a($control->createLink('gift', 'receive', "orderID=$giftOrder->id"), $lang->user->gift->order->received, "class='ajaxJSON'")}
                {/if}
                {!html::a($control->createLink('gift', 'deleteOrder', "orderID=$giftOrder->id"), $lang->delete, "class='reloadDeleter'")}
	          </td>
            </tr>
          {/foreach}
        </tbody>
        <tfoot>
          <tr><td colspan='8'>{$pager->show()}</td></tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
<script type='text/javascript'>$(function(){$.setAjaxJSONER('.ajaxJSON')})</script>
{include TPL_ROOT . 'common/footer.html.php'}
