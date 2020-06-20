<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The browse view file of group module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     group
 * @version     $Id: browse.html.php 4769 2013-05-05 07:24:21Z wwccss $
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<section class='main-table'>
  <table class='table tablesorter table-fixed'>
    <thead>
      <tr>
       <th class='w-50px'><?php echo $lang->group->id;?></th>
       <th class='w-100px'><?php echo $lang->group->name;?></th>
       <th class='w-200px visible-lg'><?php echo $lang->group->desc;?></th>
       <th><?php echo $lang->group->users;?></th>
       <th class="text-center actions w-30px"><?php echo $lang->group->managePriv;?></th>
       <th class="text-center actions w-30px"><?php echo $lang->group->manageMember;?></th>
       <th class="text-center actions w-30px"><?php echo $lang->edit;?></th>
       <th class="text-center actions w-30px"><?php echo $lang->delete;?></th>
       <th class="text-center actions w-10px"></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($groups as $group):?>
    <?php $users = implode(' ', $groupUsers[$group->id]);?>
    <tr>
      <td class='text-center'><?php echo $group->id;?></td>
      <td><?php echo $group->name;?></td>
      <td class='visible-lg'><?php echo $group->desc;?></td>
      <td title='<?php echo $users;?>'><?php echo $users;?></td>
      <td class='c-actions'>
        <?php commonModel::printLink('group', 'managePriv', "type=byGroup&param={$group->id}", "<i class='icon icon-lock'></i>", "class='btn btn-icon'");?>
      </td>
      <td class='c-actions'>
        <?php commonModel::printLink('group', 'manageMember', "groupID={$group->id}", "<i class='icon icon-users'></i>", "class='btn btn-icon'");?>
      </td>
      <td class='c-actions'>
        <?php commonModel::printLink('group', 'edit', "groupID={$group->id}", "<i class='icon icon-edit'></i>", "class='btn btn-icon' data-toggle='modal'");?>
      </td>
      <td class='c-actions'>
        <?php commonModel::printLink('group', 'delete', "groupID={$group->id}", "<i class='icon icon-delete'></i>", "class='btn btn-icon deleter'");?>
      </td>
    </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
