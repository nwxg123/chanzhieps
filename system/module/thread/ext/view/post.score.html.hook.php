<div class='form-group' id='scoreForm'>
  <label class="score-item col-md-1 col-sm-2 control-label"><?php echo $lang->score->common?></label>
  <div class="score-item ol-md-11 col-sm-10">
    <?php echo html::input('access[score]', '', "class='form-control' style='width:80px;display:inline-block;'");?>
    <?php echo html::a('javascript:void(0)', "<i class='icon-question-sign'></i>", "data-custom='{$lang->thread->threadScoreTip}' data-toggle='modal' data-icon='question-sign' data-title='{$lang->thread->common}' style='width:12px;'")?>
  </div>
</div>
<script>
$().ready(function()
{
    $('textarea').parents('.form-group').after($('#scoreForm'));
});
</script>
