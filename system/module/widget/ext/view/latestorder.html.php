<?php if(!defined("RUN_MODE")) die();?>
<?php
$status = zget($widget->params, 'status', 'all');
$limit  = zget($widget->params, 'limit', '10');
$this->loadModel('order');
$this->loadModel('product');
$mode = zget($this->config->order->statusFields, $status);
$pager = new pager(0, $limit, 1);
$orders = $this->order->getList($type = 'all', $mode, $status, 'id desc', $pager);
?>
<table class='table table-data table-hover table-fixed'>
  <?php foreach($orders as $order):?>
  <?php $amount = $order->amount + $order->balance;?>
  <tr onclick="$('.orderLink').click();">
    <td>
    <?php $goods = current($order->products);?>
      <a href="<?php echo helper::createLink('order', 'view', "id={$order->id}");?>" data-toggle='modal'>
      <?php echo $goods->productName . ' &times ' . $goods->count;?>
      <?php if(count($order->products) > 1) echo ' ...';?>
      </a>
    </td>
    <td class='w-60px text-right'>
      <?php if($amount) echo $this->config->product->currencySymbol . $amount?>
      <?php if($order->score) echo "<i class='icon icon-certificate text-muted'></i>" . $order->score;?>
    </td>
    <td class='w-60px'><?php echo $this->order->processStatus($order);?></td>
    <td class='w-80px'><?php echo formatTime($order->createdDate, 'Y-m-d');?></td>
  </tr>
  <?php endforeach;?>
</table>
