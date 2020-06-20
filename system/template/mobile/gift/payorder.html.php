<?php include TPL_ROOT . 'common/header.html.php';?>
<?php $common->printPositionBar('payorder', $order);?>
<form method='post' id='ajaxForm'>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->gift->order->confirm;?></strong></div>
    <table class='table table-borded'>
      <tr class='text-center'> 
        <th class='w-id'><?php echo $lang->gift->id;?></th>
        <th class='text-left'><?php echo $lang->gift->name;?></th>
        <th><?php echo $lang->gift->score;?></th>
      </tr>
      <tr class='text-center'> 
        <td><?php echo $order->id;?></td>
        <td class='text-left'>
          <?php echo $order->gift->productName;?>
          <?php if(!empty($order->gift->extra)) foreach($order->gift->extra as $code => $value) echo $value;?>
        </td>
        <td><?php echo $order->score;?></td>
      </tr>
    </table>
    <div class='panel-footer'>
      <?php echo html::submitButton($lang->gift->order->exchange, "btn btn-primary") . html::hidden('orderID', $order->id)?>
    </div>
  </div>
</form>
<?php include TPL_ROOT . 'common/footer.html.php';?>
