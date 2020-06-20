<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The component view file of ui module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     ui
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<div id='setLogo' class='component'>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><?php echo $lang->ui->setLogo;?></strong>
    </div>
    <div class='panel-body row-logo'>
      <form method='post' id='logoForm' enctype='multipart/form-data' action='<?php echo $this->createLink('ui', 'setLogo');?>'>
        <div class='box'>
          <div class='card'>
          <?php if(isset($logo->webPath)) echo html::a('javascript:;', html::image($this->loadModel('file')->printFileURL($logo), "class='logo'"), "class='btn-upload'");?>
          <?php if(!isset($logo->webPath)) echo html::a('javascript:;', '<i class="icon icon-upload-cloud"></i>' . $lang->ui->uploadLogo, "class='btn btn-upload'");?>
          </div>
          <span class='actions'>
          <?php if(isset($logo->webPath)) echo html::a('javascript:;', "<i class='icon icon-lg icon-spin icon-refresh'></i><i class='icon icon-lg icon-pencil'> </i>", "class='text-info btn-editor'");?>
          <?php if(isset($logo->webPath)) commonModel::printLink('ui', 'deleteLogo', '', "<i class='icon icon-lg icon-delete'> </i>", "class='text-danger btn-deleter'");?>
          </span>
          <div class='text-important'>
            <?php if($this->app->clientDevice == 'desktop') printf($lang->ui->suitableLogoSize, '50px-80px', '80px-240px');?>
            <?php if($this->app->clientDevice == 'mobile') printf($lang->ui->suitableLogoSize, '<50px', '50px-200px');?>
            <div class='hide'><?php echo html::file('logo', "class='form-control'");?></div>
          </div>
        </div>
        <div class='box'>
          <div class='card'>
            <?php if(!empty($favicon)) $favicon->extension = 'ico';?>
            <?php
            if(isset($favicon->webPath) or $defaultFavicon)
            {
                $imagePath = isset($favicon->webPath) ? $this->loadModel('file')->printFileURL($favicon) : $config->webRoot . 'favicon.ico';
                echo html::a('javascript:;', html::image($imagePath, "class='favicon'"), "class='btn-upload'");
            }
            else
            {
                echo html::a('javascript:;', '<i class="icon icon-upload-cloud"></i>' . $lang->ui->uploadFavicon, "class='btn btn-upload'");
            }
            ?>
          </div>
          <span class='actions'>
            <?php if(isset($favicon->webPath) or $defaultFavicon) echo html::a('javascript:;', "<i class='icon icon-lg icon-pencil'> </i>", "class='btn-editor'");?>
            <?php if($favicon or $defaultFavicon) commonModel::printLink('ui', 'deleteFavicon', '', "<i class='icon icon-lg icon-delete'> </i>", "class='text-danger btn-deleter'");?>
          </span>

          <div class='text-important'>
          <?php $langParam = $app->clientLang == 'en' ? '&lang=en' : '';?>
          <?php printf($lang->ui->faviconHelp, "http://api.chanzhi.org/goto.php?item=help_favicon{$langParam}");?>
          </div>
          <div class='hide'><?php echo html::file('favicon', "class='form-control'");?></div>
        </div>
      </form>
    </div>
  </div>
</div>
<div id='slide' class='component'>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><?php echo $lang->slide->common;?></strong>
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
