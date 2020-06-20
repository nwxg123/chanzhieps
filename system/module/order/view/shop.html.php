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
      <li <?php echo $class;?> data-type='internal' ><?php echo html::a(inlink('admin', "type={$type}&" . $params . $pageLink . "&date=$date"), sprintf($title, $orderStat[$state]));?></li>
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
      <div class='space'></div>
      <div class='input-control has-icon-right'>
        <button type='btn' class='btn'>
          <?php echo !empty($date) ? $date : $lang->selectDate;?> 
          <i class='icon-angle-sm-down'></i>
          <?php if(!empty($date)):?> <i class='icon-close'></i> <?php endif;?>
        </button>
        <input type='btn' value='<?php echo $date;?>' class='btn form-datecustom w-90px' data-picker-position='bottom-right' href='<?php echo inlink('admin', $link);?>'/>
      </div>
    </div>
  </header>
  <table class='table tablesorter' id='orderList'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "type=$type&mode=$mode&param={$param}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&date=$date";?>
        <th class='text-center'><?php echo $lang->order->productInfo;?></th>
        <th class='text-center'></th>
        <th class='text-center w-120px'><?php echo $lang->order->price;?></th>
        <th class='text-center w-120px'><?php echo $lang->order->count;?></th>
        <th class='text-center w-200px'><?php echo $lang->order->note;?></th>
        <th class='text-center w-60px'><?php commonModel::printOrderLink('amount', $orderBy, $vars, $lang->order->amount);?></th>
        <th class='text-center w-120px'><?php commonModel::printOrderLink('payStatus', $orderBy, $vars, $lang->order->payStatus);?></th>
        <th class='text-center w-200px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($orders as $order):?>
      <tr class='order-title'>
        <td class='text-center'><?php echo $lang->order->orderNumber . ' : ' . strtotime($order->createdDate) . $order->id;?></td>
        <td class='text-center'><?php echo $lang->order->createdDate . ' : ' . formatTime($order->createdDate, 'Y-m-d H:i');?></td>
        <td class='text-center' colspan='2'><?php echo $lang->order->last . ' : ' . formatTime($order->last, 'Y-m-d H:i');?></td>
        <td class='text-center'><?php echo $lang->order->buyer . ' : ' . zget($users, $order->account);?></td>
        <td class='text-center' colspan='2'></td>
        <td class='text-center'></td>
      </tr>
        <?php $count = 0;?>
        <?php $productsCount = count($order->products);?>
        <?php $rowspan = $productsCount > 3 ? '3' : $productsCount;?>
        <?php foreach($order->products as $product):?>
        <?php $count ++;?>
        <tr class="order-goods <?php if($count > 3) echo 'closed';?>" name="product_<?php echo $order->id;?>">
          <td colspan='2'>
            <?php if(!empty($product->image)):?>
              <?php $product->image->primary->objectType = 'product';?>
              <?php $imgsrc = $this->loadModel('file')->printFileURL($product->image->primary, 'middleURL');?>
              <div class='file-image'>
                <img class='image-small' src='<?php echo $imgsrc;?>'>
              </div>
            <?php else:?>
              <?php $imgColor = $product->id * 57 % 360;?>
              <div class='media-placeholder' style='background-color: hsl(<?php echo $imgColor;?>, 60%, 80%); color: hsl(<?php echo $imgColor;?>, 80%, 30%);' data-id='<?php echo $product->id;?>'><?php echo $product->productName;?></div>
            <?php endif;?>
            <div class='goods-title text-ellipsis' title='<?php echo $product->productName;?>'>
              <?php echo $product->productName;?>
            </div>
            <div class='goods-category text-ellipsis'>
              <?php echo $lang->order->category . ' : ';?>
              <?php foreach($product->categories as $category):?>
              <?php echo $category->name;?>
              <?php endforeach;?>
            </div>
          </td>
          <td class='text-center strong'><?php echo zget($lang->product->currencySymbols, $config->product->currency, '￥') . $product->price;?></td>
          <td class='text-center strong'><?php echo 'x ' . $product->count;?></td>
          <?php if($count == 1):?>
          <td class='text-center rowspan' rowspan='<?php echo $rowspan;?>' ><?php echo $order->note;?></td>
          <td class='text-center rowspan' rowspan='<?php echo $rowspan;?>' colspan='2'>
            <div class='amount strong'><?php echo zget($lang->product->currencySymbols, $config->product->currency, '￥') . $order->amount;?></div>
            <div><?php echo $lang->order->orderStatus . " : <span class='text-primary'>" . $this->order->processStatus($order) . '</span>';?></div> 
            <?php $payStatus = $order->status == 'normal' && $order->payStatus == 'not_paid' && $order->payment == 'COD' ? 'COD' : $order->payStatus;?>
            <div><?php echo $lang->order->payStatus . " : <span class='text-primary'>" . zget($lang->order->payStatusList, $payStatus, '') . '</span>';?></div> 
            <div></div> 
          </td>
          <td class='text-left rowspan' rowspan='<?php echo $rowspan;?>'>
            <?php $this->order->printActions($order, false, 'admin');?>
          </td>
          <?php endif;?>
        </tr>
        <?php endforeach;?>
        <?php if($count > 3):?>
        <tr class='goods-bar text-center text-primary closed' name="product_<?php echo $order->id;?>"><td colspan=8><i class='icon icon-double-arrow-down'></i></td></tr>
        <?php endif;?>
        <tr class='order-space'><td colspan='8'></td></tr>
      <?php endforeach;?>
    </tbody>
    <tfoot><tr><td colspan='8'><?php $pager->show();?></td></tr></tfoot>
  </table>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
