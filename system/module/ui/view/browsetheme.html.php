<?php if(!defined("RUN_MODE")) die();?>
<div id="mainArea">
  <?php foreach($themes as $theme):?>
  <?php $link      = inlink('installtheme', "package={$theme->name}&downLink=&md5=");?>
  <?php $installed = (isset($installedThemes['default'][$theme->name]) or isset($installedThemes['mobile'][$theme->name]));?>
  <div class='theme-wrapper col-md-3 col-sm-6'>
    <div class='theme'>
      <div class='left-wrapper'>
        <div class='info-wrapper'>
          <span class='theme-name'>
            <?php echo $theme->name . '.zip';?>
          </span>
          <span class='info text-muted small'>
            <span class='size'><?php echo helper::formatKB($theme->size / 1024);?></span>
            <span class='time'><?php echo $theme->time;?></span>
          </span>
        </div>
        <div class='actions-wrapper'>
          <span class='actions'>
            <?php if($installed) echo "<span class='text-success'><i class='icon icon-ok-sign'></i> {$lang->ui->theme->installed}</span>";?>
            <?php if(!$installed):?>
                <?php echo html::a($link . "&type=full",  $lang->ui->importTypes->full, "class='btn btn-xs btn-install btn-full import-full'");?>
                <?php echo html::a($link . '&type=theme', $lang->ui->importTypes->theme, "class='btn btn-xs btn-install import-class' data-toggle='modal'");?>
              <?php echo html::a($link . "&type=full",  '', "class='hide' data-toggle='modal'");?>
            <?php endif;?>
          </span>
        </div>
      </div>
      <div class='right-wrapper'>
        <i class='icon icon-file-zip-o'></i>
      </div>
    </div>
  </div>
  <?php endforeach;?>
  <div class='theme-wrapper col-md-3 col-sm-6'>
    <div class='theme add' id="packageSectionActions">
      <?php echo html::a(inlink('uploadTheme'), "<i class='icon icon-plus'></i>" . $lang->ui->addTheme, "data-toggle='modal' class='btn' data-position='80'");?>
    </div>
  </div>
</div>
<style>
.theme-panel > .panel-body{padding-top:4px !important; cursor:pointer;}
.theme-panel > .panel-body > .theme-title{font-size:16px; padding: 10px 0; color:#555; font-weight:bold;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;}
.theme-panel .span-size{margin-left:20px;}
.p-actions{margin-right:10px; padding-left:12px;}
.p-actions > i {font-size:13px; padding:4px; font-weight:bold;}
.panel-actions{margin-right: 0px}
</style>
<script>
$().ready(function()
{
    $('.btn-full').click(function()
    {
        var $btn = $(this)
        bootbox.confirm(v.lang.fullImportTip, function(result)
        {
            if(result) $btn.next().click();
        });
        return false;
    });
});
</script>
