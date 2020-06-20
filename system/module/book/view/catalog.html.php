<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The create book view file of book of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai<daitingting@xirangit.com>
 * @package     book
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php'; ?>
<?php include '../../common/view/datepicker.html.php';?>
<?php js::set('path', $node ? explode(',', $node->path) : array(0));?>
<div class='col-md-12'>
  <form id='ajaxForm' method='post'>
    <div class='panel'>
      <div class='panel-heading'>
        <ol class='breadcrumb'>
          <li><?php echo $node->title;?></li>
          <li class='active'><?php echo $lang->book->catalog;?></li>
        </ol>
      </div>
      <table class='table'>
        <thead>
          <tr class='text-center'>
            <th class='w-p10'><?php echo $lang->book->type;?></th>
            <th class='w-p10'><?php echo $lang->book->author;?></th>
            <th><?php echo $lang->book->title;?></th>
            <th class='w-p10'><?php echo $lang->book->alias;?></th>
            <th class='w-p10'><?php echo $lang->book->keywords;?></th>
            <th class='w-180px'><?php echo $lang->book->addedDate;?></th>
            <th class='w-90px'><?php echo $lang->book->status;?></th>
            <th class='w-30px actions'><?php echo $lang->book->move->up; ?></th>
            <th class='w-30px actions'><?php echo $lang->book->move->down; ?></th>
          </tr>
        </thead>
    
        <tbody>
          <?php $maxID = 0;?>
          <?php $newID = 1;?>
          <?php foreach($children as $child):?>
          <?php $maxID = $maxID < $child->id ? $child->id : $maxID;?>
          <tr class='text-center text-middle'>
            <td><?php echo html::select("type[$child->id]",     $lang->book->typeList, $child->type, "class='form-control'");?></td>
            <td><?php echo html::input("author[$child->id]",    $child->author,    "class='form-control'");?></td>
            <td><?php echo html::input("title[$child->id]",     $child->title,     "class='form-control'");?></td>
            <td><?php echo html::input("alias[$child->id]",     $child->alias,     "placeholder='{$lang->alias}' class='form-control'");?></td>
            <td><?php echo html::input("keywords[$child->id]",  $child->keywords,  "class='form-control'");?></td>
            <td><?php echo html::input("addedDate[$child->id]", $child->addedDate, "class='form-control date'");?></td>
            <td><?php echo html::select("status[$child->id]",    $lang->book->statusList, $child->status, "class='form-control'");?></td>
            <td class='actions'><i class='btn btn-icon icon-arrow-up icon-lg'></i></td>
            <td class='actions'><i class='btn btn-icon icon-arrow-down icon-lg'></i></td>
            <?php echo html::hidden("order[$child->id]", $child->order, "class='order'");?>
            <?php echo html::hidden("mode[$child->id]", 'update');?>
          </tr>
          <?php $newID = $child->id + 1;?>
          <?php endforeach;?>
    
          <?php for($i = $newID; $i < $newID + BOOK::NEW_CATALOG_COUNT; $i ++):?>
          <tr class='text-center text-middle node'>
            <td><?php echo html::select("type[$i]", $lang->book->typeList, '', "class='form-control'");?></td>
            <td><?php echo html::input("author[$i]", $app->user->realname, "class='form-control'");?></td>
            <td><?php echo html::input("title[$i]", '', "class='form-control'");?></td>
            <td><?php echo html::input("alias[$i]", '', "class='form-control' placeholder='{$lang->alias}' title='{$lang->alias}'");?></td>
            <td><?php echo html::input("keywords[$i]", '', "class='form-control'");?></td>
            <td><?php echo html::input("addedDate[$i]", helper::now(), "class='form-control date'");?></td>
            <td><?php echo html::select("status[$i]", $lang->book->statusList, 'normal', "class='form-control'");?></td>
            <td class='actions'><i class='btn btn-icon icon-arrow-up icon-lg'></i></td>
            <td class='actions'><i class='btn btn-icon icon-arrow-down icon-lg'></i></td>
            <?php echo html::hidden("order[$i]", '', "class='order'");?>
            <?php echo html::hidden("mode[$i]", 'new');?>
          </tr>
          <?php endfor;?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan='11' class='actions'>
                <?php echo html::submitButton();?>
                <?php echo html::hidden('referer', $this->server->http_referer);?>
                <?php echo html::backButton('', 'btn btn-default btn-back');?>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </form>
</div>
<?php js::set('maxID', $maxID)?>
<?php include '../../common/view/footer.admin.html.php';?>
