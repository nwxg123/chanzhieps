<?php if(!defined("RUN_MODE")) die();?>
<?php 
/**
 * The admin view of order module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Yuting Wang <wangyuting@cnezsoft.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php $status = $this->get->status ? $this->get->status : 'all';?>
<?php $link   = "startDate=&endDate=";?>
<section class='main-table fixed'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->order->orderStat as $state => $stateLang):?>
      <li <?php if($state == $status) {echo "class='active'";}?>>
        <?php echo html::a(inlink('stat', $link . "&status=$state"), $stateLang);?>
      </li>
      <?php endforeach;?>
    </ul> 
    <div class='search pull-left'>
      <form method='get' class='input-control search-box' data-ride='searchbox'>
        <?php echo html::hidden('m', 'order');?>
        <?php echo html::hidden('f', 'stat');?>
        <div class='input-control has-icon-right '>
          <?php echo html::input('startDate', $startDate, "class='form-control form-date w-120px' data-picker-position='bottom-right' placeholder='{$lang->order->startDate}'");?>
          <label for="startDate" class="input-control-icon-right"><i class="icon icon-calendar"></i></label>
        </div>
        <?php echo '-';?>
        <div class='input-control has-icon-right'>
          <?php echo html::input('endDate', $endDate, "class='form-control form-date w-120px' data-picker-position='bottom-right' placeholder='{$lang->order->endDate}'");?>
          <label for="endDate" class="input-control-icon-right"><i class="icon icon-calendar"></i></label>
        </div>
        <?php echo html::hidden('status', 'all');?>
        <button type="submit" class="btn"><?php echo $lang->order->look;?></button>
      </form>
    </div>
  </header>
  <table class='table tablesorter table-fixed table-head'>
    <tbody>
      <tr>
        <td class='text-center'>
          <div class='order-title'><?php echo $lang->order->payAmount;?></div>
          <div class='top-number'>
            <span class='unit'><?php echo zget($lang->product->currencySymbols, $config->product->currency, '￥');?></span>
            <?php echo number_format($payAmount, 2, '.', ',');?>
          </div>
        </td>
        <td class='text-center'>
          <div class='order-title'><?php echo $lang->order->orderTotal;?></div>
          <div class='top-number'><?php echo $orderTotal;?></div>
        </td>
        <td class='text-center'>
          <div class='order-title'><?php echo $lang->order->types['shop'];?></div>
          <div class='top-number'><?php echo $shopOrderTotalList['all'];?></div>
        </td>
        <td class='text-center'>
          <div class='order-title'><?php echo $lang->order->types['score'];?></div>
          <div class='top-number'><?php echo $scoreOrderTotalList['all'];?></div>
        </td>
      </tr>
    </tbody>
  </table>
</section>

<table class='table tablesorter table-fixed table-footer main-table'>
  <thead>
    <tr>
      <th class='col-xs-2'></th>
      <th class='col-xs-5 title text-center'><?php echo $lang->order->todoOrder;?></th>
      <th class='col-xs-5 title text-center'><?php echo $lang->order->finishedOrder;?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class='text-center title'>
        <div class='order-title'><?php echo $lang->order->types['shop'];?></div>
        <div class='top-number'><?php echo $shopOrderTotalList['all'];?></div>
      </td>
      <td class='text-center'>
        <div class='col-xs-4'>
          <div class='order-title'><i class='icon icon-order'></i><?php echo $lang->order->statusList['not_send'];?></div>
          <div class='top-number'><?php echo $shopOrderTotalList['waitSend'];?></div> 
        </div>
        <div class='col-xs-4'>
          <div class='order-title'><i class='icon icon-truck'></i><?php echo $lang->order->statusList['send'];?></div>
          <div class='top-number'><?php echo $shopOrderTotalList['waitConfirm'];?></div> 
        </div>
        <div class='col-xs-4'>
          <div class='order-title'><i class='icon icon-refund'></i><?php echo $lang->order->statusList['refunding'];?></div>
          <div class='top-number'><?php echo $shopOrderTotalList['refunding'];?></div> 
        </div>
      </td>
      <td class='text-center'>
        <div class='col-xs-4'>
          <div class='order-title'><i class='icon icon-check-circle'></i><?php echo $lang->order->statusList['finished'];?></div>
          <div class='top-number'><?php echo $shopOrderTotalList['finished'];?></div> 
        </div>
        <div class='col-xs-4'>
          <div class='order-title'><i class='icon icon-refund'></i><?php echo $lang->order->statusList['refunded'];?></div>
          <div class='top-number'><?php echo $shopOrderTotalList['refunded'];?></div> 
        </div>
        <div class='col-xs-4 gray'>
          <div class='order-title'><i class='icon icon-minus-circle'></i><?php echo $lang->order->statusList['expired'];?></div>
          <div class='top-number'><?php echo $shopOrderTotalList['expired'];?></div> 
        </div>
      </td>
    </tr>
    <tr><td class='space' colspan='3'></td></tr>
    <tr>
      <td class='text-center title'>
        <div class='order-title'><?php echo $lang->order->types['score'];?></div>
        <div class='top-number'><?php echo $scoreOrderTotalList['all'];?></div>
      </td>
      <td class='text-center'>
        <div class='col-xs-4'>
          <div class='order-title'><i class='icon icon-payment'></i><?php echo $lang->order->statusList['not_paid'];?></div>
          <div class='top-number'><?php echo $scoreOrderTotalList['waitPay'];?></div> 
        </div>
      </td>
      <td class='text-center'>
        <div class='col-xs-4'>
          <div class='order-title'><i class='icon icon-check-circle'></i><?php echo $lang->order->statusList['finished'];?></div>
          <div class='top-number'><?php echo $scoreOrderTotalList['finished'];?></div> 
        </div>
        <div class='col-xs-4 gray'>
          <div class='order-title'><i class='icon icon-minus-circle'></i><?php echo $lang->order->statusList['expired'];?></div>
          <div class='top-number'><?php echo $scoreOrderTotalList['expired'];?></div> 
        </div>
      </td>
    </tr>
  </tbody>
</table>
<?php include '../../common/view/footer.admin.html.php';?>
