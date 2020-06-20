<?php if(!defined("RUN_MODE")) die();?>
<?php
$this->app->loadClass('pager', $static = true);
$pager = new pager($recTotal = 0, 6, 1);
$frontLog = $this->loadModel('action')->getAllList('front', $pager);
?>
<style>
.widget-frontLog .panel-body {overflow:hidden} 
.widget-frontLog .main {height:231px;padding:5px 20px;min-width:390px}
.widget-frontLog .main-list {height:31px}
.widget-frontLog .loop-out {float:left;width:21%;}
.widget-frontLog .loop-line {float:left;width:4px;border-right:1px solid #ddd;height:24px;margin-top:6px;margin-left:3%}
.widget-frontLog .main-list.new:last-child .loop-line, .main-list.ago:last-child .loop-line {border-right:0px}
.widget-frontLog .loop {width:7px;height:7px;border-radius:50%;background-color:#ddd}
.widget-frontLog .loop-in {float:right;width:70%;text-overflow:ellipsis;overflow:hidden;white-space:nowrap}
.widget-frontLog .line {border-bottom:1px solid #ddd;margin-bottom:16px}
</style>
<div class='main main-front'>
  <?php $todayCount = 0;?>
  <?php $notTodayCount = 0;?>
  <?php foreach($frontLog as $logInfo):?>
    <?php if(substr($logInfo->date, 0, 10) == date('Y-m-d')):?>
      <?php if($todayCount == 0):?> 
        <?php $todayCount ++;?>
        <div class='today'>
      <?php endif;?>
    <div class='main-list new'>
      <div class='loop-out'>
        <span><?php echo $this->lang->widget->operationLog->today;?></span>
        <span><?php echo substr($logInfo->date, 11, 5);?></span>
      </div>
      <div class='loop-line'><div class='loop'></div></div>
      <div class='loop-in'><?php echo $logInfo->actor;?> <?php echo $this->lang->widget->operationLog->front->{$logInfo->action};?> <?php echo $logInfo->comment?></div>
    </div>
    <?php else:?>
    <?php if($notTodayCount == 0):?> 
      <?php $notTodayCount ++;?>
        <?php if($todayCount != 0):?>
        <div class='line'></div>
        </div>
        <?php endif;?>
      <div>
    <?php endif;?>
    <div class='main-list ago'>
      <div class='loop-out'>
        <span><?php echo substr($logInfo->date, 5, 5);?></span>
        <span><?php echo substr($logInfo->date, 11, 5);?></span>
      </div>
      <div class='loop-line'><div class='loop'></div></div>
      <div class='loop-in'><?php echo $logInfo->actor;?> <?php echo $this->lang->widget->operationLog->front->{$logInfo->action};?> <?php echo $logInfo->comment?></div>
    </div>
    <?php endif;?>
  <?php endforeach;?>
  <?php if($todayCount != 0 || $notTodayCount != 0):?>
  </div>
  <?php endif;?>
</div>
