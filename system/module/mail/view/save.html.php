<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-body'>
    <div class='alert alert-success'>
      <i class='icon-ok-sign'></i>
      <div class='content'><?php echo $lang->mail->successSaved; ?></div>
    </div>
    <div><?php if($this->post->turnon and commonModel::hasPriv('mail', 'test')) echo html::linkButton($lang->mail->test, inlink('test')); ?></div>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
