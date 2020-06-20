<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The admin view file of slide module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan<guanxiying@xirangit.com>
 * @package     slide
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<div id='slide' class='component'>
  <div class='panel'>
    <div class='panel-heading'>
      <i class='icon-th'></i> <strong><?php echo $lang->slide->group;?></strong>
    </div>
    <div class='panel-body'>
      <section class='row cards-borderless'>
        <?php foreach($groups as $group):?>
        <div class='slide-wrapper col-lg-1_5 col-md-4 col-sm-6'>
          <div class='slide'>
            <a class='card card-slide' href='<?php echo $this->createLink('slide', 'browse', "groupID=$group->id") ?>'>
              <?php $count = count($group->slides); ?>
              <?php $slide = $group->slide;?>
              <div class='slides-holder slides-holder-<?php echo min(5, $count);?>'>
                <?php if(!empty($group->slides)): ?>
                <div class='slide-item'>
                  <?php if ($slide->backgroundType == 'image'): ?>
                  <?php print(html::image($slide->image));?>
                  <?php else: ?>
                  <div class='plain-slide' style='<?php echo 'background-color: ' . $slide->backgroundColor;?>'></div>
                  <?php endif; ?>
                  <div class='slides-count'><i class='icon-image'></i> <?php echo $count; ?></div>
                </div>
                <?php else: ?>
                <div class='empty-holder'>
                  <i class='icon-pencil icon-3x icon'></i>
                  <div id='toBeAdded'>
                    <?php echo $lang->toBeAdded;?>
                  </div>
                </div>
                <?php endif; ?>
              </div>
            </a>
            <div class='card-heading text-left'>
              <div class='group-title' data-id='<?php echo $group->id;?>' data-action="<?php echo $this->createLink('slide', 'editGroup', "groupID=$group->id");?>">
                <?php echo html::a('javascript:;', "<i class='icon icon-edit'></i>", "class='edit-group-btn'");?>
                <span class='group-name'><?php echo $group->name;?></span>&nbsp;&nbsp;
                <span class='pull-right'>
                <?php commonModel::printLink('slide', 'removeGroup', "groupID=$group->id", $lang->delete, "class='deleter btn-sm'");?>
                <?php commonModel::printLink('slide', 'browse', "groupID=$group->id", $lang->edit, "class='btn btn-sm btn-edit'");?>
                </span>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach;?>
        <div class='slide-wrapper col-lg-1_5 col-md-4 col-sm-6'>
          <div class='add-group'>
            <?php commonModel::printLink('slide', 'createGroup', '', '<i class="icon icon-plus"></i>' . $lang->slide->createGroup, "class='btn' data-toggle='modal'");?>
          </div>
        </div>
      </section>
    </div>
  </div>
  <form id="editGroupForm" class='edit-form' method='post'>
    <div class='editGroup input-group'>
      <?php echo html::input('groupName', $group->name, "class='form-control'");?>
      <span class="input-group-btn fix-border"><?php echo html::submitButton('', 'submit btn btn-primary');?> </span>
      <span class="input-group-btn"><?php echo html::commonButton($lang->cancel, 'btn-close-form btn');?></span>
      <?php echo html::hidden('groupID', '', "class='groupID'");?>
    </div>
  </form>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
