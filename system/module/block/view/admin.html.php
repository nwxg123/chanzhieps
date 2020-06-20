<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The browse view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='row'>
  <?php foreach($config->block->categoryGroups as $category => $groups):?>
  <div class='col-sm-3'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><?php echo $lang->block->categoryList[$category];?></strong>
        <div class='panel-actions'><?php echo html::a(inlink('create'), "<i class='icon icon-plus'> </i>" . $lang->block->add, "class='btn btn-primary btn-sm'");?></div>
      </div>
      <div class='panel-body'>
        <?php foreach($groups as $group => $blockList):?>
          <?php if($group == 'layout') continue;?>
          <?php $isCategoryEmpty = false;?>
          <?php foreach($blocks as $block):?>
            <?php if(strpos($blockList, ",$block->type,") === false) continue;?>
            <?php $isCategoryEmpty = true;?>
          <?php endforeach;?>
          <div class='block-group'>
            <?php if($isCategoryEmpty):?>
            <div class='block-title'><?php echo $lang->visual->design->{$group};?></div>
            <?php endif;?>
            <?php foreach($blocks as $block):?>
              <?php
              if(strpos($blockList, ",$block->type,") === false) continue;
              if(strpos($block->type, 'code') === false && !is_object($block)) $block->content = json_decode($block->content);
              ?>
              <div class='block-item'>
                <div class='title' title='<?php echo $block->title;?>'> <?php echo $block->title;?>&nbsp; </div>
                <div class='actions'>
                  <?php commonModel::printLink('block', 'edit', "block={$block->id}", '<i class="icon icon-edit"></i>', "class='btn btn-link' data-toggle='modal' title='$lang->edit'");?>
                  <?php commonModel::printLink('block', 'delete', "block={$block->id}", '<i class="icon icon-delete"></i>', "class='btn btn-link deleter' title='$lang->delete'");?>
                </div>
              </div>
            <?php endforeach;?>
          </div>
        <?php endforeach;?>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
