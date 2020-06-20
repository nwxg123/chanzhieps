<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='main'>
  <?php $localLang = $switchLocal . 'Log';?>
  <?php echo html::a(inlink('browse', "extra={$switchLocal}"), $lang->action->switch . $this->app->loadLang('admin')->admin->{$localLang}, 'class="btn"');?>
  <div class='main-in'>
    <?php $infoDate = 0;?>
    <?php foreach($operationLog as $logInfo):?>
      <?php $blockDate = substr($logInfo->date, 0, 10);?>
      <?php if($infoDate != $blockDate):?>
        <?php if($infoDate != 0):?>
          </div>
          </div>
        <?php endif;?>
        <div class='block-main '>
      <?php endif;?>
      <?php if($infoDate != $blockDate):?>
        <div class='block-date <?php if($blockDate == date('Y-m-d')) echo "today";?>'><?php echo $blockDate;?></div>
        <div class='block-line <?php if($blockDate == date('Y-m-d')) echo "today";?>'></div>
        <div class='block-content <?php if($blockDate == date('Y-m-d')) echo "today";?>'>
      <?php endif;?>
      <div class='main-list new'>
        <div class='loop-out'>
          <span><?php echo substr($logInfo->date, 11, 5);?></span>
        </div>
        <div class='loop-line'><div class='loop'></div></div>
        <div class='loop-in'>
          <?php echo $logInfo->actor;?>
          <?php echo $lang->widget->operationLog->{$extra}->{$logInfo->action};?>
          <?php echo $logInfo->comment?>
        </div>
      </div>
    <?php $infoDate = $blockDate;?>
    <?php endforeach;?>
    <?php if($infoDate != 0):?>
      </div>
      </div>
    <?php endif;?>
  </div> 
  <div class='show-page'><?php $pager->show();?></div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
