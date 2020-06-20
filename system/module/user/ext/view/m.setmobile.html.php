<style>
#captcha {float:left;padding-right:120px;margin-bottom:12px}
.form-group.pad-label-left > a {position: absolute;right: 0px;background:#ddd;z-index: 2;}
</style>
<div class='modal-dialog'>
  <div class='modal-content'>
    <div class='modal-header'>
      <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>×</span></button>
      <h5 class='modal-title'><i class='icon-edit'></i> {$lang->user->setEmail}</h5>
    </div>
    <div class='modal-body'>
      <form method='post' id='ajaxForm' class='form form-horizontal' action="{!inlink('setMobile')}" data-checkfingerprint='1'>
        <div class='form-group pad-label-left'>
          <label>{$lang->user->password}</label>
          {!html::password('password', '', "class='form-control' placeholder='{{$lang->user->placeholder->password}}'")}
        </div>
        <div class='form-group pad-label-left'>
          <label form='password' class='control-label'>{$lang->user->mobile}</label>
          {!html::input('mobile', $user->mobile, "class='form-control'")}
        </div>
        <div class='form-group pad-label-left'>
          <label form='password' class='control-label'>{$lang->user->captcha}</label>
          {!html::input('captcha', '', "class='form-control'")}
          {!html::a($control->createLink('sms', 'sendcertifycode'), $lang->user->getCertifyCode, "id='sender' class='btn btn-sm btn-primary'")}
        </div>
        <div class='form-group'>
          {!html::submitButton('', 'btn primary block') . html::hidden('token', $token)}
        </div>
      </form>
    </div>
  </div>
</div>
<script>
$(document).ready(function()
{
    $('#sender').click(function()
    {
        var data = {mobile: $('#mobile').val()};
        var url = $(this).attr('href');
        $.post(url, data, function(response)
        {
            if(response.result == 'success')
            {
                 $('#sender').html('OK');
            }
            else
            {
                alert(response.message);
            }
        }, 'json')
        return false;
    })
})
</script>
