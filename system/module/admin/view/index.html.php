<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The index view file of admin module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiyingl@xirangit.com>
 * @package     admin
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/chart.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<div class='dashboard' id='dashboard'>
  <header class='page-header'>
    <!--
    <div class='heading'>
      <h1><?php echo $lang->admin->dashboard;?></h1>
    </div>
      <a class='btn' data-toggle='modal' href='<?php echo $this->createLink("widget", "create"); ?>'><i class='icon icon-plus'></i> <?php echo $lang->widget->createWidget; ?></a>
    </div>-->
  </header>
  <div class='row'>
    <!--This is left block-->
    <div class='col col-main'>
      <?php reset($widgets);?>
      <?php foreach($widgets as $key => $widget):?>
      <?php
      if($widget->grid == 4) continue;
      if(isset($this->config->widget->dependence->{$widget->type}))
      {
          $dependence =  $this->config->widget->dependence->{$widget->type};
          if(!commonModel::isAvailable($dependence)) continue;
      }
      if(strpos($widget->moreLink, '|') !== false)
      {
          list($moreModule, $moreMethod, $moreParams) = explode('|', $widget->moreLink);
          $widget->moreLink = helper::createLink($moreModule, $moreMethod, $moreParams);
      }
      ?>
      <div class='panel panel-widget widget-<?php echo $widget->type;?> widget-<?php echo $widget->grid?>'>
        <div class='panel-heading'>
          <div class='panel-title'><?php echo $widget->title;?></div>
          <ul class='panel-actions nav nav-default'>
            <?php if(!empty($widget->moreLink)):?>
            <?php $target = $widget->type == 'chanzhiDynamic' ? "target='_blank'" : '';?>
            <li><?php echo html::a($widget->moreLink, 'MORE', "class='panel-action btn-more small' $target");?></li>
            <?php endif; ?>
            <!--<li class='dropdown'>
              <a href='javascript:;' data-toggle='dropdown' class='panel-action'><i class='icon icon-ellipsis-v'></i></a>
              <ul class="dropdown-menu pull-right" role="menu">
                <li><a href="<?php echo $this->createLink("widget", "edit", "index=$widget->id"); ?>" data-toggle='modal' class='edit-widget' data-title='<?php echo $widget->title; ?>' data-icon='icon-pencil'><i class="icon-pencil"></i> <?php echo $lang->edit;?></a></li>
                <li><a href="<?php echo helper::createLink('widget', 'delete', "id={$widget->id}")?>" class="deleter"><i class="icon-remove"></i> <?php echo $lang->delete; ?></a></li>
              </ul>
            </li>-->
          </ul>
        </div>
        <?php if($widget->type != 'chanzhiDynamic'):?>
        <div class='panel-body no-padding' data-url="<?php echo helper::createLink('widget', 'printWidget', 'widget=' . $widget->id);?>">
          <?php echo $this->fetch('widget', 'printWidget', 'widget=' . $widget->id)?>
        </div>
        <?php else:?>
        <div id='chanzhiDynamic'></div>
        <script>function afterDynmaicsLoad(html){$('#chanzhiDynamic').html(html);}</script>
        <script async src='//api.chanzhi.org/goto.php?item=dynamics_jsonp&extra=afterDynmaicsLoad'></script>
        <?php endif;?>
      </div>
      <?php endforeach;?>
    </div>

    <div class='col col-side'>
      <?php foreach($widgets as $key => $widget):?>
      <?php
      if($widget->grid != 4) continue;
      if(isset($this->config->widget->dependence->{$widget->type}))
      {
          $dependence =  $this->config->widget->dependence->{$widget->type};
          if(!commonModel::isAvailable($dependence)) continue;
      }
      if(strpos($widget->moreLink, '|') !== false)
      {
          list($moreModule, $moreMethod, $moreParams) = explode('|', $widget->moreLink);
          $widget->moreLink = helper::createLink($moreModule, $moreMethod, $moreParams);
      }
      ?>
      <div class='panel panel-widget widget-<?php echo $widget->type;?> widget-<?php echo $widget->grid?>'>
        <div class='panel-heading'>
        <div class='panel-title'>
          <span><?php echo $widget->title;?></span>
        </div>
        <ul class='panel-actions nav nav-default'>
          <?php if(!empty($widget->moreLink)):?>
          <?php $target = $widget->type == 'chanzhiDynamic' ? "target='_blank'" : '';?>
          <li><?php echo html::a($widget->moreLink, 'MORE', "class='panel-action btn-more small' $target");?></li>
          <?php endif; ?>
        </ul>
      </div>
      <?php if($widget->type != 'chanzhiDynamic'):?>
      <div class='panel-body no-padding' data-url="<?php echo helper::createLink('widget', 'printWidget', 'widget=' . $widget->id);?>">
        <?php echo $this->fetch('widget', 'printWidget', 'widget=' . $widget->id)?>
      </div>
      <?php else:?>
      <div id='chanzhiDynamic'></div>
      <script>function afterDynmaicsLoad(html){$('#chanzhiDynamic').html(html);}</script>
      <script async src='//api.chanzhi.org/goto.php?item=dynamics_jsonp&extra=afterDynmaicsLoad&count=7'></script>
      <?php endif;?>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</div>
<div id='noticeBox'>
<?php if(strpos($this->server->php_self, '/admin.php') !== false && empty($this->config->global->ignoreAdminEntry)):?>
<form method='post' id='ajaxForm' action='<?php echo $this->createLink('admin', 'ignore');?>'>
  <div class="alert alert-danger alert with-icon alert-dismissable">
    <button type="submit" class="close">&times;</button>
    <strong><?php echo $lang->admin->adminEntry;?></strong>
  </div>
</form>
<?php endif;?>
<?php if(!$ignoreUpgrade):?>
<div class='alert alert-success hide' id='upgradeNotice'>
  <div>
    <?php echo $lang->newVersion;?>
    <button class="close"><?php echo html::a(inlink('ignoreUpgrade'), '&times;', "class='reload'");?></button>
  </div>
</div>
<script>
function afterCheckVersion(latest)
{
  if(typeof latest != 'undefined')
  {
      if(latest.isNew)
      {
          $('#version').html(latest.version);
          $('#releaseDate').html(latest.releaseDate);
          $('#upgradeLink').attr('href', latest.url);
          $('#upgradeNotice').show();
      }
      else
      {
        $('#upgradeNotice').remove();
      }
  }
}
</script>
<script async src='<?php echo '//api.chanzhi.org/latest.php?version=' . $this->config->version . '&type=afterCheckVersion';?>'></script>
<?php endif;?>

<?php if(!$checkLocation):?>
<div class='alert alert-success'>
  <div>
    <?php echo $lang->site->changeLocation;?>
    <?php echo html::a($this->createLink('site', 'setsecurity'), $lang->site->changeSetting, "class='red'");?>
  </div>
</div>
<?php endif;?>
</div>

<?php include '../../common/view/footer.admin.html.php';?>
