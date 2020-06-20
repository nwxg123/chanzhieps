<?php if($mode == 'front'):?>
<?php include TPL_ROOT . 'common/header.html.php'; ?>
<?php $common->printPositionBar($module, $case);?>
<div class='row'>
  <div class='col-md-3 side'><?php include './blockleft.html.php';?></div>
  <div class='col-md-9'><?php include './case.html.php';?></div>
</div>
<?php include TPL_ROOT .'common/footer.html.php'; ?>
<?php else:?>
<?php
$webRoot   = $config->webRoot;
$jsRoot    = $webRoot . "js/";
$themeRoot = $webRoot . "theme/";
if(isset($pageCSS)) css::internal($pageCSS);
?>
<div class="modal-dialog" style="width:700px;">
  <div class="modal-content">
    <div class="modal-header">
      <?php echo html::closeButton();?>
      <h4 class="modal-title"><?php if(!empty($title)) echo $title; ?></h4>
    </div>
    <div class="modal-body">
      <div id='rejectReason' style='margin-left: 70px'></div>
      <?php include './case.html.php';?>
      <div class='panel-heading text-center'>
        <?php
        echo html::a(inlink('pass', "case=$case->id"), $lang->usercase->pass, "class='ajaxJSON btn btn-primary'");
        echo html::a(inlink('reject', "id=$case->id"), $lang->usercase->reject, "class='ajaxJSON btn btn-danger'");
        echo html::a(inlink('setAsClassical', "case=$case->id"), $lang->usercase->setClassical, "class='ajaxJSON btn'");
        echo html::a(inlink('addScore', "case=$case->id&score=50"),  '+50',  "class='ajaxJSON btn'");
        echo html::a(inlink('addScore', "case=$case->id&score=100"), '+100', "class='ajaxJSON btn'");
        echo html::a(inlink('delete', "case=$case->id"), $lang->usercase->delete, "class='deleter btn'");
        ?>
      </div>
    </div>
  </div>
</div>
<script>
$(function(){$.setAjaxJSONER('.ajaxJSON')})
</script>
<?php endif;?>
