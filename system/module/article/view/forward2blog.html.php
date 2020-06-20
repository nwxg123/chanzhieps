<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.modal.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<script>
$("#categories").chosen();
</script>
<form method='post' id='ajaxForm' action='<?php echo inlink("forward2Blog", "articleID={$articleID}");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-130px'><?php echo $lang->article->selectCategories;?></th>
      <td class='w-p50'>
        <?php if($categories):?>
        <div class='required required-wrapper'></div>
        <?php echo html::select("categories[]", $categories, '', "multiple='multiple' class='form-control chosen'");?>
        <?php else:?>
        <?php echo $lang->article->noCategories['blog'];?>
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
