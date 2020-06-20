<?php
$access = $this->loadModel('access')->getAccessByObject('thread', $thread->id);
?>
<div class='form-group' id='scoreForm'>
<label class="score-item col-md-1 col-sm-2 control-label"><?php echo $lang->score->common?></label>
<div class="score-item ol-md-11 col-sm-10"><?php echo html::input('access[score]', $access['score'], "class='form-control' style='width:80px;'");?></div>
</div>
<script>
$().ready(function()
{
    $('#fileform').parents('.form-group').before($('#scoreForm'));
});
</script>
