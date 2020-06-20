<?php if(!defined("RUN_MODE")) die();?>
<?php $needVerifyFeedBack   = commonModel::isAvailable('message') ? $this->loadModel('message')->getUncheckedMessages() : 0;?>
<?php $needVerifyContribute = $this->loadModel('article')->getUncheckedSubmissions();?>
<?php $needVerifyThread     = $this->loadModel('thread')->getUncheckedThreads();?>
<?php $shopVerifyList       = $this->loadModel('order')->getStatisticalOrders('shop', ',waitSend,refunding,waitConfirm');?>
<?php $needAddProduct       = $this->loadModel('product')->computeShortages();?>
<style>
<?php if(!commonModel::isAvailable('shop')):?>
.widget-untreatedList .panel-title {color:#ddd}
<?php endif;?>
.gray {color:#ddd}
.gray a {color:#ddd}
.top-block {padding:20px 20px 0px 20px;text-align:center;overflow:hidden}
.top-block .top-tag {float:left;width:33%;}
.top-block .top-tag .img {width:44px;height:44px;margin:auto;margin-bottom:8px}
.top-block .top-tag .img > i {font-size:44px}
.available .top-block .top-tag .img.green  > i {color:#22D3B6}
.available .top-block .top-tag .img.violet > i {color:#7580FF}
.available .top-block .top-tag .img.orange > i {color:#FF9E35}
.top-block .top-tag > .down-icon {margin-top:8px}
.top-block .top-tag > .down-icon > i {font-size:28px;color:#ECEBF7}
.bottom-block {padding:0px 20px 12px 20px;text-align:center;overflow:hidden}
.bottom-block .bottom-tag {float:left;width:33%;padding:5px}
.bottom-block .bottom-tag .small-tag {min-width:110px;max-width:120px;margin:0px auto 10px auto;overflow:hidden;line-height:28px}
.bottom-block .bottom-tag .small-tag .name {float:left;margin-right:5px}
.bottom-block .bottom-tag .small-tag .number {float:right;width:34px;text-align:left;font-size:20px}
.available .bottom-block .bottom-tag .small-tag .number.green  > a {color:#22D3B6}
.available .bottom-block .bottom-tag .small-tag .number.violet > a {color:#7580FF}
.available .bottom-block .bottom-tag .small-tag .number.orange > a {color:#FF9E35}
</style>
<div class='<?php echo !commonModel::isAvailable('shop') ? 'gray' : 'available';?>'>
    <div class='top-block'>
      <div class='top-tag'>
        <div class='img green'><i class='icon icon-audit'></i></div>
        <?php echo $this->lang->widget->todoList->verifyProcess;?>
        <div class='down-icon'><i class='icon icon-double-arrow-down'></i></div>
      </div>
      <div class='top-tag'>
        <div class='img violet'><i class='icon icon-order'></i></div>
        <?php echo $this->lang->widget->todoList->orderProcess;?>
        <div class='down-icon'><i class='icon icon-double-arrow-down'></i></div>
      </div>
      <div class='top-tag'>
        <div class='img orange'><i class='icon icon-truck'></i></div>
        <?php echo $this->lang->widget->todoList->replenishmentProcess;?>
        <div class='down-icon'><i class='icon icon-double-arrow-down'></i></div>
      </div>
    </div> 
    <div class='bottom-block'>
      <div class='bottom-tag'>
        <div class='small-tag'>
          <span class='number green'><?php echo !commonModel::isAvailable('shop') ? 0 : html::a(helper::createLink('message', 'admin'), $needVerifyFeedBack > 99 ? '99+' : $needVerifyFeedBack . ' ');?></span>
          <span class='name'><?php echo $this->lang->widget->todoList->needVerifyFeedBack;?></span>
        </div>
        <div class='small-tag'>
          <span class='number green'><?php echo !commonModel::isAvailable('shop') ? 0 : html::a(helper::createLink('article', 'admin', 'type=submission&categoryID=user&orderBy=submission_asc'), $needVerifyContribute > 99 ? '99+' : $needVerifyContribute . ' ');?></span>
          <span class='name'><?php echo $this->lang->widget->todoList->needVerifyContribute;?></span>
        </div>
        <div class='small-tag'>
          <span class='number green'><?php echo !commonModel::isAvailable('shop') ? 0 : html::a(helper::createLink('forum', 'admin', 'boardID=0&orderBy=status_desc'), $needVerifyThread > 99 ? '99+' : $needVerifyThread . ' ');?></span>
          <span class='name'><?php echo $this->lang->widget->todoList->needVerifyThread;?></span>
        </div>
      </div>
      <div class='bottom-tag'>
        <div class='small-tag'>
          <span class='number violet'><?php echo !commonModel::isAvailable('shop') ? 0 : html::a(helper::createLink('order', 'admin', 'type=shop&mode=deliveryStatus&param=not_send'), $shopVerifyList['waitSend'] > 99 ? '99+' : $shopVerifyList['waitSend'] . ' ');?></span>
          <span class='name'><?php echo $this->lang->widget->todoList->needDeliveryOrder;?></span>
        </div>
        <div class='small-tag'>
          <span class='number violet'><?php echo !commonModel::isAvailable('shop') ? 0 : html::a(helper::createLink('order', 'admin', 'type=shop&mode=payStatus&param=refunding'), $shopVerifyList['refunding'] > 99 ? '99+' : $shopVerifyList['refunding'] . ' ');?></span>
          <span class='name'><?php echo $this->lang->widget->todoList->needRetrunOrder;?></span>
        </div>
        <div class='small-tag'>
          <span class='number violet'><?php echo !commonModel::isAvailable('shop') ? 0 : html::a(helper::createLink('order', 'admin', 'type=shop&mode=deliveryStatus&param=send'), $shopVerifyList['waitConfirm'] > 99 ? '99+' : $shopVerifyList['waitConfirm'] . ' ');?></span>
          <span class='name'><?php echo $this->lang->widget->todoList->needReceivingOrder;?></span>
        </div>
      </div>
      <div class='bottom-tag'>
        <div class='small-tag'>
          <span class='number orange'><?php echo !commonModel::isAvailable('shop') ? 0 : html::a(helper::createLink('product', 'admin', 'categoryID=&orderBy=amount_asc'), $needAddProduct > 99 ? '99+' : $needAddProduct . ' ');?></span>
          <span class='name'><?php echo $this->lang->widget->todoList->needAddProduct;?></span>
        </div>
      </div>
    </div>
</div>
