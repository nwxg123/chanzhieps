<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.modal.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<form method='post' id='ajaxForm' action='<?php echo inlink("stick", "articleID={$article->id}");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-80px'><?php echo $lang->article->stick;?></th>
      <td class='w-p80'><?php echo html::radio('sticky', $lang->article->sticks, $article->sticky);?></td>
      <td></td>
    </tr>
    <tr class="<?php if($article->sticky == 0) echo 'hide';?>">
      <th class='w-80px'><?php echo $lang->article->stickBold;?></th>
      <td>
        <?php $checked = $article->stickBold ? 1 : '';?>
        <?php echo html::checkbox('stickBold', array(1 => ''), $checked, '', 'inline', 1); ?>
      </td>
      <td></td>
    </tr>
    <tr class="<?php if($article->sticky == 0) echo 'hide';?>">
      <th class='w-80px'><?php echo $lang->article->stickTime;?></th>
      <td>
        <div class='input-control has-icon-right'>
          <?php echo html::input('stickTime', formatTime($article->stickTime), "class='form-control form-datetime'");?>
          <label for="stickTime" class="input-control-icon-right"><i class="icon icon-calendar"></i></label>
        </div>
      </td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td colspan='2'><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../common/view/footer.modal.html.php';?>
