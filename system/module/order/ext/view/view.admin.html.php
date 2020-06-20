<?php 
/**
 * The view view of order module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../../common/view/header.modal.html.php';?>
<table class='table table-form'>
  <tr>
    <th class='w-80px'><?php echo $lang->order->type;?></th>
    <td><?php echo zget($lang->order->types, $order->type, '');?></td>
  </tr> 
  <tr>
    <th class='w-80px'><?php echo $lang->order->productInfo;?></th>
    <td>
        <?php foreach($products as $product):?>
        <?php $extra = json_decode($product->extra);?>
        <?php
        if(!empty($extra))
        {
            $attributes = '';
            foreach($extra as $value) $attributes .= $value . ';';
        }
        ?>
        <div>
          <span><?php echo html::a(commonModel::createFrontLink('product', 'view', "id=$product->productID"), $product->productName, "target='_blank'");?></span>
          <span><?php echo $attributes;?></span>
          <span><?php echo $lang->order->price . $lang->colon . $product->price . ' ' . $lang->order->count . $lang->colon . $product->count;?></span>
        </div>
        <?php endforeach;?>
      </dl>
    </td>
  </tr>
  <?php if($order->type == 'shop' or $order->type == 'gift'):?>
  <tr>
    <th class='w-80px'><?php echo $lang->order->expressInfo;?></th>
    <td>
    <?php
    if($order->deliveryStatus !== 'not_send') 
    {
        echo $this->order->expressInfo($order) . '&nbsp;' . $order->waybill; 
    }
    else
    {
        echo $lang->order->noRecord;
    }
    ?>
    </td>
  </tr>
  <tr>
    <th class='w-80px'><?php echo $lang->order->address;?></th>
    <td>
      <?php $address = json_decode($order->address);?>
      <?php echo $address->contact . ',' . $address->address . ',' . $address->phone . ',' . $address->zipcode;?>
    </td>
  </tr> 
  <?php endif;?>
  <tr>
    <th class='w-80px'><?php echo $lang->order->account;?></th>
    <td><?php echo zget($users, $order->account, $order->account);?></td>
  </tr> 
  <tr>
    <th><?php echo $lang->order->status;?></th>
    <td><?php echo $this->order->processStatus($order);?></td>
  </tr> 
  <?php if(($order->status == 'canceling' or $order->status == 'canceled') and $order->cancelReason):?>
  <tr>
    <th><?php echo $lang->order->cancelReason;?></th>
    <td><?php echo $order->cancelReason;?></td>
  </tr> 
  <?php endif;?>
  <tr>
    <th><?php echo $lang->order->amount;?></th>
    <td><?php echo $order->amount + $order->balance;?></td>
  </tr> 
  <?php if($order->balance > 0):?>
  <tr>
    <th><?php echo $lang->order->balance;?></th>
    <td><?php echo $order->balance;?></td>
  </tr> 
  <?php endif;?>
  <?php if($order->score > 0):?>
  <tr>
    <th><?php echo $lang->order->score;?></th>
    <td><?php echo $order->score;?></td>
  </tr> 
  <?php endif;?>
  <tr>
    <th><?php echo $lang->order->payment;?></th>
    <td><?php echo zget($lang->order->paymentList, $order->payment);?></td>
  </tr> 
  <tr>
    <th class='w-80px'><?php echo $lang->order->note;?></th>
    <td><?php echo $order->note;?></td>
  </tr> 
  <tr>
    <th><?php echo $lang->order->createdDate;?></th>
    <td><?php echo $order->createdDate;?></td>
  </tr> 
  <?php if($order->payment != 'COD' and ($order->paidDate > $order->createdDate)):?>
  <tr>
    <th><?php echo $lang->order->paidDate;?></th>
    <td><?php echo $order->paidDate;?></td>
  </tr> 
  <?php endif;?>
  <?php if($order->deliveriedDate > $order->createdDate):?>
  <tr>
    <th><?php echo $lang->order->deliveriedDate;?></th>
    <td><?php echo $order->deliveriedDate;?></td>
  </tr> 
  <?php endif;?>
  <?php if($order->confirmedDate > $order->deliveriedDate):?>
  <tr>
    <th><?php echo $lang->order->confirmedDate;?></th>
    <td><?php echo $order->confirmedDate;?></td>
  </tr> 
  <?php endif;?>
  <?php if($order->payment == 'COD' and ($order->paidDate > $order->createdDate)):?>
  <tr>
    <th><?php echo $lang->order->paiedDate;?></th>
    <td><?php echo $order->paiedDate;?></td>
  </tr> 
  <?php endif;?>
  <tr class='text-center'>
    <td colspan='2'>
      <div class='btn-group'> <?php echo $this->order->printActions($order, true);?></div>
    </td>
  </tr>
</table>
<?php echo $this->fetch('action', 'history', "objectType=order&objectID={$order->id}");?>
<?php include '../../../common/view/footer.modal.html.php';?>
