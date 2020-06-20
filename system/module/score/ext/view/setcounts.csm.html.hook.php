<table class='hide'>
<tbody id='insertCsm'>
<tr>
  <th><?php echo $lang->score->methods['question'] . $lang->score->methods['punish'];?></th> 
  <td><?php echo html::input('question', $this->config->score->counts->question, "class='form-control'");?></td><td></td>
</tr>
<tr>
  <th><?php echo $lang->score->methods['answer'] . $lang->score->methods['award'];?></th> 
  <td><?php echo html::input('answer', $this->config->score->counts->answer, "class='form-control'");?></td><td></td>
</tr>
<tr>
  <th><?php echo $lang->score->methods['setasfaq'] . $lang->score->methods['award'];?></th> 
  <td><?php echo html::input('setAsFAQ', $this->config->score->counts->setAsFAQ, "class='form-control'");?></td><td></td>
</tr>
<tr>
  <th><?php echo $lang->score->methods['delquestion'] . $lang->score->methods['punish'];?></th> 
  <td><?php echo html::input('delQuestion', $this->config->score->counts->delQuestion, "class='form-control'");?></td><td></td>
</tr>
<tr>
  <th><?php echo $lang->score->methods['delanswer'] . $lang->score->methods['punish'];?></th> 
  <td><?php echo html::input('delAnswer', $this->config->score->counts->delAnswer, "class='form-control'");?></td><td></td>
</tr>
</tbody>
</table>
<script>
$(document).ready(function() 
{ 
  $('#delReply').parent().parent().after($('#insertCsm').html()); 
});
</script>
