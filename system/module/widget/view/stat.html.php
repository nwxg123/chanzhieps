<?php if(!defined("RUN_MODE")) die();?>
<?php
$statLeft  = $this->lang->widget->stat->statLeft;
$statRight = $this->lang->widget->stat->statRight;
?>
<style>
.vertical-line {border-top:1px solid #f5f5f5;margin-top:10px;width:100%}
.stat {overflow:hidden;padding:0px 53px 24px 53px}
.stat-top {overflow:hidden}
.stat-bottom {overflow:hidden;}
.stat-spot {float:left;text-align:center}
.stat-spot > .spot-top {height:24px}
.stat-spot > .spot-top > .topBtn {padding:2px 4px;border:1px solid #989FEB;color:#989FEB;background-color:#ECEBF7;border-radius:0px;font-size:12px}
.stat-spot > .spot-top > .topBtn > i{margin-right:2px}
.stat-spot > .spot-bottom {margin-top:16px}
.stat-spot > .spot-bottom > .numbers {font-size:28px;font-weight:600}
</style>
<div class='stat'>
  <div class='stat-top'>
    <?php $leftWidth = intval(100/count($statLeft)) . '%';?> 
    <?php foreach($statLeft as $type => $module):?>
    <div class='stat-spot' style='width:<?php echo $leftWidth;?>'>
      <div class='spot-top'>
        <?php if($module == 'user'):?>
        <div class='btn topBtn'><i class='icon icon-arrow-up'></i><?php echo $this->lang->add?> <?php echo $this->loadModel('user')->getRecentlyAdd();?></div>
        <?php endif;?>
      </div>
      <div>
        <span class='title'>
        <?php echo $lang->widget->stat->$type;?>
        </span>
      </div>
      <div class='spot-bottom'>
        <span class='numbers'>
        <?php if($module == 'article'):?>
        <?php $number = $this->loadModel($module)->getTotalQuantity($type);?>
        <?php else:?>
        <?php $number = $this->loadModel($module)->getTotalQuantity();?>
        <?php endif;?>
        <?php echo !empty($number) ? $number : 0;?>
        </span>
      </div>
    </div>
    <?php endforeach;?>
  </div>
  <div class='vertical-line'></div>
  <div class='stat-bottom'>
    <?php $rightWidth = intval(100/count($statRight)) . '%';?> 
    <?php foreach($statRight as $type => $module):?>
    <div class='stat-spot' style='width:<?php echo $rightWidth;?>'>
      <div class='spot-top'>
      </div>
      <div>
        <span class='title'>
        <?php echo $lang->widget->stat->$type;?>
        </span>
      </div>
      <div class='spot-bottom'>
        <span class='numbers'>
        <?php $number = $this->loadModel($module)->getTotalQuantity($type);?>
        <?php echo !empty($number) ? $number : 0;?>
        </span>
      </div>
    </div>
    <?php endforeach;?>
  </div>
</div>
