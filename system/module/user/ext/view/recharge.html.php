<?php if(isset($pass) and !$pass):?>
<?php
$url    = helper::safe64Encode($this->app->getURI());
$target = 'modal';
include '../../../guarder/view/validate.html.php';
?>
<?php else:?>
<?php include '../../../common/view/header.modal.html.php';?>
<form id='charge' method='post' action='<?php echo inlink('recharge', "account={$agent->account}&tradetype=recharge");?>'>
  <table class='table table-form'>
    <tr>
      <th><?php echo $lang->user->tradeID?></th>
      <td class='w-400px'><?php echo html::input('tradeID', '', "class='form-control'")?></td>
    </tr>
    <tr>
      <th><?php echo $lang->user->amount?></th>
      <td><?php echo html::input('amount', '', "class='form-control'")?></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton(). html::resetButton()?></td>
    </tr>
  </table>
</form>
<script>
$(document).ready(function()
{   
    $.setAjaxForm('#charge', function(data)
    {
        if(data.result == 'success') setTimeout(function(){parent.location.reload()}, 1500);
    }); 
});
</script>
<?php include '../../../common/view/footer.modal.html.php';?>
<?php endif;?>
