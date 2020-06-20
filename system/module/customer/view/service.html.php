<?php
/**
 * The modify password view file of user module of XiRangCSM.
 *
 * @copyright   Copyright 2009-2011 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Yangyang Shi <shiyangyang@cnezsoft.com>
 * @package     User
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.modal.html.php';?>
<?php js::set('extendNotice', $lang->customer->extendNotice);?>
<div class='panel'>
  <span>
    <?php echo $this->lang->user->account . " " . $this->lang->colon . " " . $user->account . " "  . $this->lang->user->realname . " "  . $this->lang->colon . " "  . $user->realname;?> 
  </span>
  <?php echo html::a($this->createLink('customer', 'addService', "account=$user->account"), $this->lang->customer->addService, "class='btn btn-primary btn-xs loadInModal'");?>
</div>
<table class='table table-list'>
  <thead>
    <tr class='text-center'>
      <th class='w-80px'><?php echo $lang->service->id;?></th>
      <th><?php echo $lang->service->product;?></th>
      <th class='w-120px'><?php echo $lang->service->endTime;?></th>
      <th class='w-300px'><?php echo $lang->service->extend . $lang->service->lblExtend;?></th>
    </tr>
  </thead>
  <?php foreach($services as $service):?>
  <tr class='text-center'>
    <td><strong><?php echo $service->id;?></strong></td>
    <td class='text-left'><?php echo zget($products, $service->product); ?> </td>
    <td><?php echo $service->endTime;?> </td>
    <td>
      <?php 
      echo html::a($this->createLink('customer', 'extendService', "date=onemonth&serviceID={$service->id}" ),    $lang->customer->extendOptions->onemonth,     "class='btn-extend'"); 
      echo html::a($this->createLink('customer', 'extendService', "date=twomonthes&serviceID={$service->id}"),   $lang->customer->extendOptions->twomonthes,   "class='btn-extend'"); 
      echo html::a($this->createLink('customer', 'extendService', "date=threemonthes&serviceID={$service->id}"), $lang->customer->extendOptions->threemonthes, "class='btn-extend'"); 
      echo html::a($this->createLink('customer', 'extendService', "date=sixmonthes&serviceID={$service->id}"),   $lang->customer->extendOptions->sixmonthes,   "class='btn-extend'"); 
      echo html::a($this->createLink('customer', 'extendService', "date=oneyear&serviceID={$service->id}"),      $lang->customer->extendOptions->oneyear,      "class='btn-extend'"); 
      ?>
    </td>
  </tr>
  <?php endforeach;?>
</table>
<?php include '../../common/view/footer.modal.html.php';?>
