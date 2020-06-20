<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.modal.html.php';?>
<form method='post' enctype='multipart/form-data'  class='form-horizontal' id='ajaxForm' action="<?php echo $this->createLink('admin', 'getLicense');?>">
  <div class='form-group'>
    <label for='domain' class='col-sm-2 control-label'><?php echo $lang->admin->license->domain;?></label>
    <div class='col-sm-7 required'>
      <?php echo html::input('domain', $domain, "class='form-control'");?>
    </div>
  </div>
  <?php if(!$user->mobileCertified):?>
  <div class='form-group'>
    <label for='mobile' class='col-sm-2 control-label'><?php echo $lang->user->mobile;?></label>
    <div class='col-sm-7 required'>
      <?php echo html::input('mobile', $user->mobile, "class='form-control'");?>
    </div>
  </div>
  <div class='form-group'>
    <label for='captcha' class='col-sm-2 control-label'><?php echo $lang->user->captcha;?></label>
    <div class='col-sm-7 required'>
      <?php echo html::input('captcha', '', "class='form-control' placeholder='{$lang->user->placeholder->smsCode}'");?>
    </div>
    <div class='col-sm-2'>
      <?php echo html::a($this->createLink('admin', 'sendCodeByApi'), $lang->user->getCertifyCode, "id='smsSender' class='btn btn-primary'");?>
    </div>
  </div>
  <?php endif;?>
  <div class='form-group'>
    <div class='col-sm-2'></div>
    <div class='col-sm-10'>
      <?php echo html::hidden('type', 'basic');?>
      <span><?php echo html::submitButton();?></span>
    </div>
  </div>
</form>
<?php include '../../common/view/footer.modal.html.php';?>
