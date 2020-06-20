<?php if(!defined("RUN_MODE")) die();?>
<style>
.process {overflow:hidden;padding:8px 48px 20px 48px}
.block {float:left;text-align:center;width:25%}
.block > .block-title {color:#fff;border-radius:5px;display:inline-block;padding:0px 14px;width:100%;line-height:0px;position:relative}
.block > .block-title.color-0 {border-top: 15px solid #A8C8F3; border-bottom: 15px solid #A8C8F3;}
.block > .block-title.color-1 {border-top: 15px solid #75AAF0; border-bottom: 15px solid #75AAF0;border-left:15px solid #ffffff}
.block > .block-title.color-2 {border-top: 15px solid #579DF3; border-bottom: 15px solid #579DF3;border-left:15px solid #ffffff}
.block > .block-title.color-3 {border-top: 15px solid #358EF8; border-bottom: 15px solid #358EF8;border-left:15px solid #ffffff}
.block > .block-title.color-0 > .built-in {position: absolute; border-top: 15px solid #fff; border-bottom: 15px solid #fff; border-left: 15px solid #A8C8F3; top: -15px; right: 0px;}
.block > .block-title.color-1 > .built-in {position: absolute; border-top: 15px solid #fff; border-bottom: 15px solid #fff; border-left: 15px solid #75AAF0; top: -15px; right: 0px;}
.block > .block-title.color-2 > .built-in {position: absolute; border-top: 15px solid #fff; border-bottom: 15px solid #fff; border-left: 15px solid #579DF3; top: -15px; right: 0px;}
.block > .block-tag.color-0 > .icon {color:#A8C8F3}
.block > .block-tag.color-1 > .icon {color:#75AAF0}
.block > .block-tag.color-2 > .icon {color:#579DF3}
.block > .block-tag.color-3 > .icon {color:#358EF8}
.block > .block-tag {margin-top:20px;font-size:14px}
.block > .block-tag i {margin-right:5px;color:#ECEBF7;font-size:16px}
.block > i {color:#ddd}
</style>
<div class='process'>
  <?php foreach($this->lang->widget->process as $key => $process):?>
  <div class='block'>
    <?php foreach($process as $icon => $title):?>
    <?php if($icon == 'top'):?>
    <div class='block-title color-<?php echo $key;?>'><?php echo $title;?><div class='built-in'></div></div>
    <?php else:?>
    <div class='block-tag color-<?php echo $key;?>'><i class='icon icon-<?php echo $icon?>'></i><?php echo $title;?></div>
    <?php endif;?>
    <?php endforeach;?>
  </div>
  <?php endforeach;?>
</div>
