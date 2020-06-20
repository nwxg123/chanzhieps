<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.modal.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php js::set('parents', $parents);?>
<form method='post' id='ajaxForm' action='<?php echo inlink("forward2Forum", "articleID={$articleID}");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-100px'><?php echo $lang->article->selectBoard;?></th>
      <td class='w-p50'>
        <?php if($categories):?>
        <div class='required required-wrapper'></div>
        <?php echo html::select('board', $categories, '', "class='form-control'");?>
        <?php else:?>
        <?php echo $lang->article->noCategories['forum'];?>
        <?php endif;?>
      </td><td></td>
    </tr>
    <tr>
      <th><?php echo $lang->article->addedDate;?></th>
      <td>
        <div class='input-control has-icon-right'>
          <?php echo html::input('addedDate', $defaultPostDate, "class='form-control form-datetime'");?>
          <label for="addedDate" class="input-control-icon-right"><i class="icon icon-calendar"></i></label>
        </div>
      </td>
      <td><small class="help-inline"><?php echo $lang->article->placeholder->addedDate;?></small></td>
    </tr>
    <?php if($categories):?>
    <tr>
      <td></td>
      <td colspan='2'><?php echo html::submitButton();?></td>
    </tr>
    <?php endif;?>
  </table>
</form>
<?php include '../../common/view/footer.modal.html.php';?>
