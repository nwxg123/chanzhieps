<?php if(!class_exists('raintpl')){exit;}?><?php if(!defined("RUN_MODE")){ ?>


<?php echo die(); ?>

<?php } ?>


<?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'common', 'header'));?>


<?php echo js::set('showDetail', $control->lang->message->showDetail); ?>


<?php echo js::set('hideDetail', $control->lang->message->hideDetail); ?>


<?php echo $common->printPositionBar();?>


<div class='row blocks' data-region='message_index-topBanner'><?php echo $control->block->printRegion($layouts, 'message_index', 'topBanner', true);?>

</div>
<div class='row' id='columns' data-page='message_index'>
  <?php if(!empty($layouts['message_index']['side']) and !empty($sideFloat) && $sideFloat != 'hidden'){ ?>


  <div class="col-md-<?php echo 12 - $sideGrid; ?> col-main <?php if($sideFloat === 'left'){ ?>

 pull-right <?php } ?>">
  <?php }else{ ?>

  <div class="col-md-12">
  <?php } ?>

    <div class='row blocks' data-region='message_index-top'><?php echo $control->block->printRegion($layouts, 'message_index', 'top', true);?>

</div>
    <?php if(!empty($messages)){ ?>


    <?php $class=$this->var['class'] = 'success';?>

    <?php foreach($messages as $number => $message): ?>


    <?php $class=$this->var['class'] = $class == 'success' ? '' : 'success';?>

    <div class='w-p100 panel comment-item commment-panel' id="comment<?php echo $message->id;?>">
      <div class='panel-heading content-heading'>
        <span class='text-special'> <?php echo $message->from; ?></span>
        <span class='text-muted'> <?php echo $message->date; ?></span>
        <?php echo html::a($control->createLink('message', 'reply', "messageID=$message->id"), $lang->message->reply, "class='pull-right' data-toggle='modal' data-type='iframe' data-icon='reply' data-title='{$lang->message->reply}'"); ?>


      </div>
      <div class='panel-body'><?php echo nl2br($message->content); ?>

</div>
      <?php echo $control->message->getFrontReplies($message);?>


    </div>
    <?php endforeach; ?>

<?php } ?>

    <div class='text-right'><div class='pager clearfix'><?php echo $pager->show('right', 'short');?>

</div></div>
    <div class='panel panel-form'>
      <div class='panel-heading'><strong><i class='icon-comment-alt'></i> <?php echo $lang->message->post; ?></strong></div>
      <div class='panel-body'>
        <form method='post' class='form-horizontal' id='commentForm' action="<?php echo $control->createLink('message', 'post', 'type=message'); ?>

">
          <?php $from=$this->var['from']   = $control->session->user->account == 'guest' ? '' : $control->session->user->realname;?>

          <?php $phone=$this->var['phone']  = $control->session->user->account == 'guest' ? '' : $control->session->user->phone;?>

          <?php $mobile=$this->var['mobile'] = $control->session->user->account == 'guest' ? '' : $control->session->user->mobile;?>

          <?php $qq=$this->var['qq']     = $control->session->user->account == 'guest' ? '' : $control->session->user->qq;?>

          <?php $email=$this->var['email']  = $control->session->user->account == 'guest' ? '' : $control->session->user->email;?>

          <div class='form-group'>
            <label for='from' class='col-sm-1 control-label'><?php echo $lang->message->from; ?></label>
            <div class='col-sm-5 required'>
              <?php echo html::input('from', $from, "class='form-control'"); ?>


            </div>
          </div>
          <div class='form-group'>
            <label for='phone' class='col-sm-1 control-label'><?php echo $lang->message->phone; ?></label>
            <div class='col-sm-5'>
              <?php echo html::input('phone', $phone, "class='form-control'"); ?>


            </div>
            <div class='col-sm-6'><div class='help-block'><small class='text-important'><?php echo $lang->message->contactHidden; ?></small></div></div>
          </div>
          <div class='form-group'>
            <label for='mobile' class='col-sm-1 control-label'><?php echo $lang->message->mobile; ?></label>
            <div class='col-sm-5'>
              <?php echo html::input('mobile', $mobile, "class='form-control'"); ?>


            </div>
          </div>
          <div class='form-group'>
            <label for='qq' class='col-sm-1 control-label'><?php echo $lang->message->qq; ?></label>
             <div class='col-sm-5'>
              <?php echo html::input('qq', $qq, "class='form-control'"); ?>


            </div>
          </div>
          <div class='form-group'>
            <label for='email' class='col-sm-1 control-label'><?php echo $lang->message->email; ?></label>
            <div class='col-sm-5'>
              <?php echo html::input('email', '', "class='form-control'"); ?>


            </div>
            <div class='col-sm-5'>
              <label class='checkbox-inline'><input type='checkbox' name='receiveEmail' value='1' checked /> <?php echo $lang->comment->receiveEmail; ?></label>
            </div>
          </div>
          <div class='form-group'>
            <label for='content' class='col-sm-1 control-label'><?php echo $lang->message->content; ?></label>
            <div class='col-sm-11 required'>
              <?php echo html::textarea('content', '', "class='form-control' rows='3'"); ?>


              <?php echo html::hidden('objectType', 'message'); ?>


              <?php echo html::hidden('objectID', 0); ?>


            </div>
          </div>
          <?php if(zget($control->config->site, 'captcha', 'auto') == 'open'){ ?>


          <div class='form-group' id='captchaBox'>
            <?php echo $control->loadModel('guarder')->create4Comment(); ?>


          </div>
          <?php }else{ ?>

          <div class='form-group hiding' id='captchaBox'></div>
          <?php } ?>

          <div class='form-group'>
            <div class='col-sm-1'></div>
            <div class='col-sm-11'><label class='checkbox-inline'><input type='checkbox' name='secret' value='1' /><?php echo $lang->message->secret; ?></label></div>
          </div>
          <div class='form-group'>
            <div class='col-sm-1'></div>
            <div class='col-sm-11 col-sm-offset-1'>
              <span><?php echo html::submitButton($lang->message->submit); ?>

</span>
              <span><small class="text-important"><?php echo $lang->message->needCheck; ?></small></span>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class='row blocks' data-region='message_index-bottom'><?php echo $control->block->printRegion($layouts, 'message_index', 'bottom', true);?>

</div>
  </div>
  <?php if(!empty($layouts['message_index']['side']) and !(empty($sideFloat) || $sideFloat === 'hidden')){ ?>


  <div class='col-md-<?php echo $sideGrid; ?> col-side'>
    <div class='nav'>
    <a href='#commentForm' class='btn btn-primary btn-lg w-p100'><i class='icon-comment-alt'></i> <?php echo $lang->message->post; ?></a>
    </div>
    <side class='blocks' data-region='message_index-side'><?php echo $control->block->printRegion($layouts, 'message_index', 'side');?>

</side>
  </div>
  <?php } ?>

</div>
<div class='row blocks' data-region='message_index-bottomBanner'><?php echo $control->block->printRegion($layouts, 'message_index', 'bottomBanner', true);?>

</div>
<?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'common', 'footer'));?>


