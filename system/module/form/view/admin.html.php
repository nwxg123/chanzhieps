<?php
/**
 * The admin view file of form module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     form 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <li class='active'>
        <?php echo html::a(inlink('admin'), $lang->$type->list);?>
      </li>
    </ul>
    <div class='pull-right btn-toolbar'>
      <?php commonModel::printLink('form', 'create', "type=$type", "<i class='icon icon-plus'> </i>" . $lang->$type->create, "class='btn btn-primary'");?> 
    </div>
  </header>
  <table class='table table-hover tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "type=$type&orderBy=%s&pageTotal=$pager->pageTotal&recPerPage=$pager->recPerPage&pageID=$pager->pageID";?>
        <th class='w-50px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->form->id);?></th>
        <th><?php commonModel::printOrderLink('title', $orderBy, $vars, $lang->form->title);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->form->status);?></th>
        <th><?php echo $lang->form->desc;?></th>
        <?php if($app->clientLang == 'zh-cn' || $app->clientLang == 'zh-tw'):?>
        <th class="text-center actions w-30px"><?php echo $lang->edit;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->form->manageItems;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->preview;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->form->release;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->form->cancel;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->form->report;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->form->finish;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->delete;?></th>
        <?php else:?>
        <th colspan='8' class="actions w-240px"><?php echo $lang->actions;?></th>
        <?php endif;?> 
        <th class="text-center actions w-10px"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($forms as $form):?>
      <tr class='text-center'>
        <td><?php echo $form->id;?></td>
        <td class='text-ellipsis' title='<?php echo $form->title;?>'><?php echo $form->title;?></td>
        <td><?php echo $lang->form->statusList[$form->status];?></td>
        <td class='text-ellipsis' title='<?php echo $form->desc;?>'><?php echo $form->desc;?></td>
        <td class='c-actions'>
          <?php echo html::a(inlink('edit', "formID={$form->id}&type={$type}"), "<i class='icon icon-edit'></i>", "title='{$lang->edit}' class='btn btn-icon'");?>
        </td>
        <td class='c-actions'>
          <?php if($form->status == 'draft'):?>
          <?php commonModel::printLink('formitem', 'admin', "formID={$form->id}&type={$type}", "<i class='icon icon-design'></i>", "title='{$lang->form->manageItems}' class='btn btn-icon'");?>
          <?php endif;?>
        </td>
        <td class='c-actions'>
          <?php echo html::a(commonModel::createFrontLink('form', 'view', "formID={$form->id}", "type={$type}"), "<i class='icon icon-eye-sign'></i>", "title='{$lang->preview}' class='preview btn btn-icon' target='_blank'");?>
        </td>
        <td class='c-actions'>
          <?php if($form->status == 'draft'):?>
          <?php echo html::a(inlink('switchStatus', "formID={$form->id}&status=normal"), "<i class='icon icon-external-link-square'></i>", "title='{$lang->form->release}' class='switchStatus btn btn-icon'");?>
          <?php endif;?>
        </td>
        <td class='c-actions'>
          <?php if($form->status == 'normal'):?>
          <?php echo html::a(inlink('switchStatus', "formID={$form->id}&status=draft"), "<i class='icon icon-mail-reply'></i>", "title='{$lang->form->cancel}' class='switchStatus btn btn-icon'");?>
          <?php endif;?>
        </td>
        <td class='c-actions'>
          <?php echo html::a(inlink('report', "formID={$form->id}&type={$type}"), "<i class='icon icon-statistics'></i>", "title='{$lang->form->report}' class='btn btn-icon'");?>
        </td>
        <td class='c-actions'>
          <?php if($form->status == 'normal'):?>
          <?php echo html::a(inlink('switchStatus', "formID={$form->id}&status=finished"), "<i class='icon icon-check-sign'></i>", "title='{$lang->form->finish}' class='switchStatus btn btn-icon'");?>
          <?php endif;?>
        </td>
        <td class='c-actions'>
          <?php echo html::a(inlink('delete', "formID={$form->id}"), "<i class='icon icon-delete'></i>", "title='{$lang->delete}' class='deleter btn btn-icon'");?>
        </td>
        <td class='c-actions'></td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan='13'><?php $pager->show();?></td>
      </tr>
    </tfoot>
  </table>  
</section>
<?php include '../../common/view/footer.admin.html.php';?>
