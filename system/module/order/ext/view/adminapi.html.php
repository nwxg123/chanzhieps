<?php 
/**
 * The api view of order module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<?php include '../../../common/view/header.admin.html.php';?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <li class='active'>
        <?php echo html::a(inlink('adminapi'), $lang->order->api->list);?>
      </li>
    </ul>
    <div class='pull-right btn-toolbar'>
      <?php commonModel::printLink('order', 'createapi', '', $lang->order->api->create, "class='btn btn-primary'");?>
    </div>
  </header>
  <table class='table table-hover tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <th class='w-60px'><?php echo $lang->order->api->id;?></th>
        <th class='w-80px'><?php echo $lang->order->api->action;?></th>
        <th><?php echo $lang->order->api->url;?></th>
        <th class='w-80px'><?php echo $lang->order->api->debug;?></th>
        <th class='w-80px'><?php echo $lang->order->api->method;?></th>
        <th class="text-center actions w-35px"><?php echo $lang->edit;?></th>
        <th class="text-center actions w-40px"><?php echo $lang->delete;?></th>
        <th class="text-center actions w-10px"></th>
      </tr>
    </thead>
    <?php foreach($apiList as $api):?>
    <tr class='text-center'>
      <td><?php echo $api->id;?></td>
      <td><?php echo $lang->order->api->actionList[$api->action];?></td>
      <td><?php echo $api->url;?></td>
      <td><?php echo zget($lang->order->api->turnonList, $api->debug);?></td>
      <td><?php echo zget($lang->order->api->methodList, $api->method);?></td>
      <td class='c-actions'>
        <?php commonModel::printLink('order', 'editapi', "apiID=$api->id",   "<i class='icon icon-edit'></i>", "class='btn btn-icon'");?>
      </td>
      <td class='c-actions'>
        <?php commonModel::printLink('order', 'deleteapi', "apiID=$api->id", "<i class='icon icon-delete'></i>", "class='deleter btn btn-icon'");?>
      </td>
      <td class='c-actions'></td>
    </tr>
    <?php endforeach;?>
    <tr><td colspan='8'><?php $pager->show('right');?></td></tr>
  </table>
</section>
<?php include '../../../common/view/footer.admin.html.php';?>
