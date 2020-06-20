<table class='hide' id='certifyTable'>
  <tbody>
    <tr>
      <th><?php echo $lang->score->methods['certifyemail'] . $lang->score->methods['award'];?></th> 
      <td><?php echo html::input('certifyemail', isset($this->config->score->counts->certifyemail) ? $this->config->score->counts->certifyemail : '', "class='form-control'");?></td><td></td>
    </tr>
    <tr>
      <th><?php echo $lang->score->methods['certifymobile'] . $lang->score->methods['award'];?></th> 
      <td><?php echo html::input('certifymobile', isset($this->config->score->counts->certifymobile) ? $this->config->score->counts->certifymobile : '', "class='form-control'");?></td><td></td>
    </tr>
    <tr>
      <th><?php echo $lang->score->methods['certifyrealname'] . $lang->score->methods['award'];?></th> 
      <td><?php echo html::input('certifyrealname', isset($this->config->score->counts->certifyrealname) ? $this->config->score->counts->certifyrealname : '', "class='form-control'");?></td><td></td>
    </tr>
    <tr>
      <th><?php echo $lang->score->methods['certifycompany'] . $lang->score->methods['award'];?></th> 
      <td><?php echo html::input('certifycompany', isset($this->config->score->counts->certifycompany) ? $this->config->score->counts->certifycompany : '', "class='form-control'");?></td><td></td>
    </tr>
  </tbody>
</table>
<script>
$(document).ready(function()
{
  $('#ajaxForm #maxLogin').parents('tr').after($('#certifyTable tbody').html());  
});
</script>
