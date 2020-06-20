<?php if(!defined("RUN_MODE")) die();?>
<?php 
/**
 * The admin view of order module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php js::set('finishWarning', $lang->order->finishWarning);?>
<?php $status   = $this->get->status ? $this->get->status : 'all';?>
<?php $date     = $this->get->date ? $this->get->date : '';?>
<?php $link     = "type=$type&mode=$mode&param=$param&orderBy=$orderBy&recTotal=&recPerPage=&pageID=";?>
<?php $pageLink = "&orderBy=$orderBy&recTotal=&recPerPage=&pageID=";?> 
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->order->labels->default as $state => $label):?>
      <?php list($title, $params) = explode('|', $label);?>
      <?php $class = strpos(strtolower($this->server->query_string), strtolower($params)) == false ? '' : "class='active'";?>
      <?php parse_str($this->server->query_string, $queryPart);?>
      <?php if(strpos(strtolower($this->server->query_string), 'mode=') == false and $params == 'mode=all&param=') $class = "class='active'";?>
      <li <?php echo $class;?> data-type='internal' ><?php echo html::a(inlink('admin', "type={$type}&" . $params . $pageLink . "&status=$state&date=$date"), sprintf($title, $orderStat[$state]));?></li>
      <?php endforeach;?>
    </ul> 
    <div class='pull-left btn-toolbar'>
      <div class='space'></div>
      <div class='input-control has-icon-right'>
        <button type='btn' class='btn'>
          <?php echo !empty($date) ? $date : $lang->selectDate;?> 
          <i class='icon-angle-sm-down'></i>
          <?php if(!empty($date)):?> <i class='icon-close'></i> <?php endif;?>
        </button>
        <input type='btn' value='<?php echo $date;?>' class='btn form-datecustom w-90px' data-picker-position='bottom-right' href='<?php echo inlink('admin', $link . "&status=$status");?>'/>
      </div>
    </div> 
  </header>
  <table class='table table-hover tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "type=$type&mode=$mode&param={$param}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&status=$status&date=$date";?>
        <th class='w-120px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->order->orderNumber);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('createdDate', $orderBy, $vars, $lang->order->createdDate);?></th>
        <th class='w-100px'><?php echo $lang->order->account;?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('amount', $orderBy, $vars, $lang->order->amount);?></th>
        <th><?php echo $lang->order->score;?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('payStatus', $orderBy, $vars, $lang->order->payStatus);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->order->orderStatus);?></th>
        <?php if($app->clientLang == 'zh-cn' || $app->clientLang == 'zh-tw'):?>
        <th class='text-center actions w-30px'><?php echo $lang->order->return;?></th>
        <th class='text-center actions w-30px'><?php echo $lang->order->view;?></th>
        <th class='text-center actions w-30px'><?php echo $lang->delete;?></th>
        <?php else:?>
        <th colspan='3' class="actions w-90px"><?php echo $lang->actions;?></th>
        <?php endif;?>
        <th class="text-center actions w-10px"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($orders as $order):?>
      <?php $goodsInfo = $this->order->printGoods($order);?>
      <tr class='text-center text-top'>
        <td><?php echo strtotime($order->createdDate) . $order->id;?></td>
        <td><?php echo formatTime($order->createdDate, 'Y-m-d H:i');?></td>
        <td><?php echo zget($users, $order->account);?></td>
        <td><?php echo zget($lang->product->currencySymbols, $config->product->currency, '￥') . $order->amount;?></td>
        <td><?php echo $goodsInfo;?> </td>
        <td><?php echo zget($lang->order->payStatusList, $order->payStatus, '');?></td>
        <td class="<?php echo $order->payStatus == 'paid' ? 'text-gray' : 'text-danger';?>"><?php echo $this->order->processStatus($order);?></td>
        <td class='c-actions'>
          <?php if($order->status == 'normal' and $order->payStatus == 'not_paid'):?>
          <?php echo html::a(inlink('savepayment', "orderID=$order->id"), "<i class='icon icon-renminbi-sign'></i>", "data-toggle='modal' class='btn btn-icon'");?>
          <?php endif;?>
        </td>
        <td class='c-actions'><?php echo html::a(inlink('view', "orderID=$order->id&btnLink=false"), "<i class='icon icon-bars'></i>", "data-toggle='modal' class='btn btn-icon'");?></td>
        <td class='c-actions'>
          <?php if($order->status == 'expired' or $order->status == 'canceled' or $order->status == 'finished' or $order->payStatus == 'refunded'):?>
          <?php echo html::a(inlink('delete', "orderID=$order->id"), "<i class='icon icon-delete'></i>", "class='btn btn-icon deleter'");?>
          <?php endif;?>
        </td>
        <td class='c-actions'></td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot><tr><td colspan='11'><?php $pager->show();?></td></tr></tfoot>
  </table>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
