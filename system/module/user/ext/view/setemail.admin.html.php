<?php include '../../../common/view/header.modal.html.php';?>
<?php js::import($jsRoot . 'fingerprint/fingerprint.js');?>
<form method='post' id='ajaxForm' class='form form-horizontal' data-checkfingerprint='1' action="<?php echo inlink('setemail');?>">
  <table class='table table-form'>
    <tr>
      <th class='w-80px'><?php echo $lang->user->password?></th>
      <td class='w-p60'><?php echo html::password('oldPwd', '', "class='form-control' placeholder='{$lang->user->placeholder->password}'");?></td><td></td>
    </tr>
    <tr>
      <th><?php echo $lang->user->email;?></th>
      <td><?php echo html::input('email', $user->email, "class='form-control'");?></td><td></td>
    </tr>
    <tr>
      <th><?php echo $lang->user->captcha;?></th>
      <td><?php echo html::input('captcha', '', "class='form-control' placeholder='{$lang->user->placeholder->verifyCode}'");?></td>
      <td><?php echo html::a($this->createLink('mail', 'sendmailcode'), $lang->user->getEmailCode, "id='mailSender' class='btn btn-sm btn-primary'");?></td>
    </tr>
    <tr>
      <th></th>
      <td colspan='2'><?php echo html::submitButton() . html::hidden('token', $token);?></td>
    </tr>
  </table>
</form>
<script>
$(document).ready(function()
{
    appendFingerprint($('#ajaxForm'));
});
</script>
<?php include '../../../common/view/footer.modal.html.php';?>
