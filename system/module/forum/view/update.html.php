<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php'; ?>
<section class='main-table'>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' enctype='multipart/form-data'>
      <div class='form-group'>
        <label><?php echo $lang->forum->updateDesc;?></label>
      </div>
      <div class='from-group'><?php echo html::submitButton($lang->forum->update) . html::hidden('action', 'update');?></div>
    </form>
  </div>
</section>
<?php include '../../common/view/footer.admin.html.php'; ?>
