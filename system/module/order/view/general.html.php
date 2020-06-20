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
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php js::set('finishWarning', $lang->order->finishWarning);?>
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
      <li <?php echo $class;?> data-type='internal' >
        <?php echo html::a(inlink('admin', "type={$type}&" . $params . $pageLink . "&date=$date"), sprintf($title, $orderStat[$state]));?>
      </li>
      <?php endforeach;?>
    </ul> 
    <div class='pull-left btn-toolbar'>
      <div class='space'></div>
      <div class='input-control has-icon-right'>
        <select name="state" id="state" class="form-control">
          <option value="all" href="<?php echo inlink('admin');?>"><?php echo $lang->order->moreLabels;?></option>
          <?php foreach($lang->order->labels->hidden as $state => $label):?>
          <?php list($title, $params) = explode('|', $label);?>
          <?php $class = strpos(strtolower($this->server->query_string), strtolower($params)) == false ? '' : "selected";?>
          <?php parse_str($this->server->query_string, $queryPart);?>
          <?php if(count($queryPart) == 2 and $params == 'mode=all') $class = "selected";?>
          <option value="<?php echo $state;?>" href="<?php echo inlink('admin', "type={$type}&" . $params . $pageLink . "&date=$date");?>" <?php echo $class;?>><?php echo $title;?></option>
          <?php endforeach;?>
        </select>
      </div>
    </div>
  </header>
  <table class='table tablesorter' id='orderList'>
      <thead>
        <tr class='text-center'>
          <?php $vars = "type=$type&mode=$mode&param={$param}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}";?>
          <th class='w-60px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->order->id);?></th>
          <th class='w-60px'><?php commonModel::printOrderLink('type', $orderBy, $vars, $lang->order->type);?></th>
          <th class='w-100px'><?php commonModel::printOrderLink('account', $orderBy, $vars, $lang->order->account);?></th>
          <th><?php echo $lang->order->productInfo;?></th>
          <th class='w-80px'><?php commonModel::printOrderLink('amount', $orderBy, $vars, $lang->order->amount);?></th>
          <th class='w-80px'><?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->product->status);?></th>
          <th class='w-100px'><?php commonModel::printOrderLink('payStatus', $orderBy, $vars, $lang->order->payStatus);?></th>
          <th><?php echo $lang->order->note;?></th>
          <th class='w-100px'><?php echo $lang->order->last;?></th>
          <th class="<?php echo ($this->app->clientLang == 'en') ? 'w-280px' : 'w-240px';?>"><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($orders as $order):?>
        <?php $goodsInfo = $this->order->printGoods($order);?>
        <tr class='text-center text-top'>
          <td><?php echo $order->id;?></td>
          <td> <?php echo zget($lang->order->types, $order->type);?> </td>
          <td><?php echo zget($users, $order->account);?></td>
          <td class='text-left' <?php echo strip_tags($goodsInfo);?>><?php echo $goodsInfo;?> </td>
          <td><?php echo $order->amount;?></td>
          <td><?php echo $this->order->processStatus($order);?></td>
          <td><?php echo zget($lang->order->payStatusList, $order->payStatus, '');?></td>
          <td title='<?php echo $order->note;?>' class='text-left'><?php echo $order->note;?></td>
          <td><?php echo ($order->last == '0000-00-00 00:00:00') ? '' : formatTime($order->last, 'm-d H:i');?></td>
          <td class='text-center'><?php $this->order->printActions($order);?></td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot><tr><td colspan='10'><?php $pager->show();?></td></tr></tfoot>
    </table>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
