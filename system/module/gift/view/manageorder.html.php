<?php include $app->getModuleRoot() . 'common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo $lang->gift->manage;?></strong>
    <div class='panel-actions'><?php echo html::a(inlink('manage'), $lang->gift->back, "class='btn'");?></div>
  </div>
  <table class='table table-hover table-striped' id='orderdata'>
    <thead>
      <tr class='text-center'>
        <th class='w-60px'><?php echo $lang->gift->id;?></th>
        <th class='w-100px'><?php echo $lang->gift->account;?></th>
        <th class='w-150px'><?php echo $lang->gift->email;?></th>
        <th class='w-100px'><?php echo $lang->gift->product;?></th>
        <th class='w-80px'><?php echo $lang->gift->type;?></th>
        <th class='w-80px'><?php echo $lang->gift->score;?></th>
        <th class='w-80px'><?php echo $lang->gift->amount;?></th>
        <th class='text-left'><?php echo $lang->gift->info;?></th>
        <th class='w-150px'><?php echo $lang->gift->createdDate;?></th>
        <th class='w-100px'><?php echo $lang->gift->status;?></th>
        <th class='w-80px'><?php echo $lang->gift->action;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($giftOrders as $giftOrder):?>
      <tr class='text-center'>
        <td><?php echo $giftOrder->id;?></td>
        <td><?php echo $giftOrder->account;?></td>
        <td><?php echo $giftOrder->email;?></td>
        <td><?php echo $lang->product->list[$giftOrder->product];?></td>
        <td><?php echo $giftOrder->name;?></td>
        <td><?php echo $giftOrder->score;?></td>
        <td><?php echo $giftOrder->amount;?></td>
        <td class='text-left'><?php echo $giftOrder->info;?></td>
        <td><?php echo $giftOrder->createdDate;?></td>
        <td><?php echo $lang->gift->order->statusList[$giftOrder->status];?></td>
        <td id='action<?php echo $giftOrder->id?>'>
          <?php 
          if($giftOrder->status == 'paid') echo html::a("javascript:send($giftOrder->id)", $lang->gift->order->send); 
          echo html::a(inlink('deleteorderfromadmin', "orderID=$giftOrder->id"), $lang->gift->order->delete, "class='reloadDeleter'");
          ?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr><td colspan='11'><?php $pager->show();?></td></tr>
    </tfoot>
  </table>
</div>
<script type='text/javascript'>
function send(id)
{
    var sendHtml = "<form method='post' action='" + createLink('gift', 'sendGift', "id=" + id) + "' id='ajaxForm'><textarea name='express' style='width:110px'></textarea><br /><button type='submit'>提交</button></form>";
    $("#action" + id).html(sendHtml);
}
</script>

<?php include $app->getModuleRoot() . 'common/view/footer.admin.html.php';?>
