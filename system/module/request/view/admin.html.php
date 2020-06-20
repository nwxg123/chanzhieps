<?php
/**
 * The browse view of request module of XiRangCSM
 *
 * @copyright   Copyright 2009-2011 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Congzhi Chen<congzhi@cnezsoft.com>
 * @package     request
 * @version     $Id: buildform.html.php 1914 2011-06-24 10:11:25Z yidong@cnezsoft.com $
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->request->statusList as $statusName => $statusLabel):?>
      <li <?php if($type == $statusName) {echo "class='active'";}?>>
        <?php echo html::a(inLink('admin', "type=$statusName"), $statusLabel);?>
      </li>
      <?php endforeach;?>
    </ul>
  </header>
  <!-- show header of table. -->
  <?php $vars = "type=$type&param=$param&orderBy=%s&recTotal=$recTotal&recPerPage=$recPerPage"; ?>
  <table class='table table-hover tablesorter table-fixed'>
    <thead>
    <tr class='text-center'>
      <th class='w-60px'>  <?php commonModel::printOrderLink('id',          $orderBy, $vars, $lang->request->id);?></th>
      <th><?php commonModel::printOrderLink('title',       $orderBy, $vars, $lang->request->title);?></th>
      <th><?php commonModel::printOrderLink('product',     $orderBy, $vars, $lang->request->product);?></th>
      <th class='w-100px'><?php commonModel::printOrderLink('category',    $orderBy, $vars, $lang->request->category);?></th>
      <th class='w-100px'><?php commonModel::printOrderLink('addedDate',   $orderBy, $vars, $lang->request->addedDate);?></th>
      <th><?php commonModel::printOrderLink('status',      $orderBy, $vars, $lang->request->status);?></th>
      <th class='w-100px'><?php commonModel::printOrderLink('customer',    $orderBy, $vars, $lang->request->customer);?></th>
      <th class='w-100px'><?php commonModel::printOrderLink('assignedTo',  $orderBy, $vars, $lang->request->assignedTo);?></th>
      <th class='w-100px'><?php commonModel::printOrderLink('repliedDate', $orderBy, $vars, $lang->request->repliedDate);?></th>
      <th class="text-center actions w-40px"><?php echo $lang->request->reply;?></th>
      <th class="text-center actions w-40px"><?php echo $lang->request->close;?></th>
      <th class="text-center actions w-10px"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($requests as $request):?>
    <tr class='text-center'>
      <td><?php echo $request->id;?></td>
      <td class='text-left'><?php echo html::a(inlink('view', "id=$request->id"), $request->title, "data-toggle='modal'");?></td>
      <td><?php if(!empty($request->productName)) echo $request->productName;?></td>
      <td><?php if(!empty($request->category)) echo $request->category;?></td>
      <td><?php echo substr($request->addedDate, 5,11);?></td>
      <td><?php echo $lang->request->statusList[$request->status];?></td>
      <td><?php echo $request->customer;?></td>
      <?php if($request->status != 'closed'):?>
      <td><?php echo html::a(inlink('assignedTo', "requestID={$request->id}"), "<i class='icon icon-hand-o-right'></i> $request->assignedTo", "data-toggle='modal' class='btn btn-icon'");?></td>
      <?php else:?>
      <td><?php echo $request->assignedTo;?></td>
      <?php endif;?>
      <td><?php echo substr($request->repliedDate, 5, 11);?></td> 
      <?php if($request->status != 'closed'):?>
      <td class='c-actions'>
        <?php echo html::a(inlink('reply', "requestID=$request->id"), "<i class='icon icon-send'></i>", "data-toggle='modal' class='btn btn-icon'");?>
      </td>
      <?php else:;?>
      <td class='c-actions'></td>
      <?php endif;?>
      <td class='c-actions'>
      <?php if($request->isAllowedClosed == 1):?>
        <?php echo html::a(inlink('close', "requestID=$request->id"), "<i class='icon icon-close'></i>", "class='btn btn-icon'");?>
      <?php endif;?>
      </td>
      <td class='c-actions'></td>
    </tr>
    <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr><td class='text-right' colspan='12'><?php if($dbPager) $dbPager->show();?></td></tr>
    </tfoot>
  </table>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
