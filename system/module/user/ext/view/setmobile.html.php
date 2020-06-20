{include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'header.modal')}
{!js::import($jsRoot . 'fingerprint/fingerprint.js')}
<form method='post' id='ajaxForm' class='form form-horizontal' action="{!inlink('setMobile')}" data-checkfingerprint='1'>
  <table class='table table-form'>
    <tr>
      <th class='w-80px'>{$lang->user->password}</th>
      <td class='w-p60'>{!html::password('password', '', "class='form-control' placeholder='{{$lang->user->placeholder->password}}'")}</td><td></td>
    </tr>
    <tr>
      <th>{$lang->user->mobile}</th>
      <td>{!html::input('mobile', $user->mobile, "class='form-control'")}</td><td></td>
    </tr>
    <tr>
      <th>{$lang->user->captcha}</th>
      <td>{!html::input('captcha', '', "class='form-control' placeholder='{{$lang->user->placeholder->smsCode}}'")}</td>
      <td>{!html::a($control->createLink('sms', 'sendcertifycode'), $lang->user->getCertifyCode, "id='sender' class='btn btn-sm btn-primary'")}</td>
    </tr>
    <tr>
      <th></th>
      <td>{!html::submitButton() . html::hidden('token', $token)}</td><td></td>
    </tr>
  </table>
</form>
{include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'footer.modal')}
