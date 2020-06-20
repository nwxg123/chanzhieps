<table class='hide' id='hideTable'>
  <tbody>
    <tr>
      <th><?php echo $lang->score->methods['expendproduct'] . $lang->score->methods['award'];?></th> 
      <td><?php echo html::input('expend', isset($this->config->score->counts->expend) ? $this->config->score->counts->expend : '', "class='form-control'");?></td><td></td>
    </tr>
    <tr>
      <th><?php echo $lang->score->methods['exchangeRatio'];?></th> 
      <td class='w-500px'>
        <div class='input-group'>
          <span class='input-group-addon'><?php echo 1 . $lang->score->amountUnit . ' = ' ?></span>
          <?php echo html::input('exchangeRatio', isset($this->config->score->counts->exchangeRatio) ? $this->config->score->counts->exchangeRatio : '', "class='form-control'");?>
          <span class='input-group-addon'><?php echo $lang->score->common; ?></span>
        </div>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->score->methods['exchangeLimit'];?></th> 
      <td>
        <div class='input-group'>
          <?php echo html::input('exchangeLimit', isset($this->config->score->counts->exchangeLimit) ? $this->config->score->counts->exchangeLimit : '', "class='form-control'");?>
          <span class='input-group-addon'>%</span>
        </div>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->score->methods['rechargebalance'] . $lang->score->methods['award'];?></th> 
      <td><?php echo html::input('recharge', isset($this->config->score->counts->recharge) ? $this->config->score->counts->recharge : '', "class='form-control'");?></td><td></td>
    </tr>
  </tbody>
</table>
<script>
$(document).ready(function()
{
  $('#ajaxForm th.w-120px').removeClass('w-120px').addClass('w-150px');
  $('#ajaxForm #maxLogin').parents('tr').after($('#hideTable tbody').html());  
});
</script>
