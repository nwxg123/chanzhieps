{include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'header.modal')}
{!js::import($jsRoot . 'fingerprint/fingerprint.js')}
<form method='post' id='ajaxForm' class='form form-horizontal' data-checkfingerprint='1' action="{!inlink('setemail')}">
  <table class='table table-form'>
    <tr>
      <th class='w-80px'>{$lang->user->password}</th>
      <td class='w-p60'>{!html::password('oldPwd', '', "class='form-control' placeholder='{{$lang->user->placeholder->password}}'")}</td><td></td>
    </tr>
    <tr>
      <th>{$lang->user->email}</th>
      <td>{!html::input('email', $user->email, "class='form-control'")}</td><td></td>
    </tr>
    <tr>
      <th>{$lang->user->captcha}</th>
      <td>{!html::input('captcha', '', "class='form-control' placeholder='{{$lang->user->placeholder->verifyCode}}'")}</td>
      <td>{!html::a($control->createLink('mail', 'sendmailcode'), $lang->user->getEmailCode, "id='mailSender' class='btn btn-sm btn-primary'")}</td>
    </tr>
    <tr>
      <th></th>
      <td colspan='2'>{!html::submitButton() . html::hidden('token', $token)}</td>
    </tr>
  </table>
</form>
{noparse}
<script>
$(document).ready(function()
{
    appendFingerprint($('#ajaxForm'));
});
</script>
{/noparse}
{include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'footer.modal')}
