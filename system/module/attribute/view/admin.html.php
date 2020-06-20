<?php
/**
 * The admin view file of attribute of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     attribute
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <li class='active'>
        <?php echo html::a(inlink('admin'), $lang->attribute->list);?>
      </li>
    </ul>
    <div class='pull-right btn-toolbar'>
      <?php commonModel::printLink('attribute', 'create', "", '<i class="icon-plus"></i> ' . $lang->attribute->create, 'class="btn btn-primary"');?>
    </div>
  </header>
  <table class='table table-hover tablesorter table-fixed'>
    <?php $vars = "categoryID=$categoryID&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}";?>
    <thead>
      <tr class='text-center'>
        <th class='w-60px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->attribute->id);?></th>
        <th class='w-p10'><?php commonModel::printOrderLink('category', $orderBy, $vars, $lang->attribute->category);?></th>
        <th><?php commonModel::printOrderLink('code', $orderBy, $vars, $lang->attribute->code);?></th>
        <th><?php commonModel::printOrderLink('name', $orderBy, $vars, $lang->attribute->name);?></th>
        <th class='w-120px'><?php echo $lang->attribute->inputType;?></th>
        <th class="text-center actions w-35px"><?php echo $lang->edit;?></th>
        <th class="text-center actions w-40px"><?php echo $lang->delete;?></th>
        <th class="text-center actions w-10px"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($attributes as $attribute):?>
      <tr class='text-center'>
        <td><?php echo $attribute->id;?></td>
        <td class='text-center'><?php echo zget($categories, $attribute->category, '');?></td>
        <td class='text-center'><?php echo $attribute->code;?></td>
        <td class='text-center'><?php echo $attribute->name;?></td>
        <td class='text-center'><?php echo zget($lang->attribute->inputTypeList, $attribute->inputType, '');?></td>
        <td class='c-actions'>
          <?php commonModel::printLink('attribute', 'edit', "attributeID=$attribute->id",   "<i class='icon icon-edit'></i>", "class='btn btn-icon'");?>
        </td>
        <td class='c-actions'>
          <?php commonModel::printLink('attribute', 'delete', "attributeID=$attribute->id", "<i class='icon icon-delete'></i>", "class='deleter btn btn-icon'");?>
        </td>
      </tr> <?php endforeach;?>
    </tbody>
    <tfoot><tr><td colspan='8'><?php $pager->show();?></td></tr></tfoot>
  </table>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
