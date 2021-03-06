<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php'; ?>
<section class='main-table'>
  <div class='panel-body'>
    <form id='ajaxForm' action="<?php echo inlink('setting');?>" method='post'>
      <table class='table table-form table-fixed'>
        <tr>
          <th class='w-100px'><?php echo $lang->forum->postReview;?></th> 
          <td><?php echo html::radio('postReview', $lang->forum->postReviewOptions, isset($config->forum->postReview) ? $config->forum->postReview : 'close', "class='checkbox'");?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->forum->index;?></th> 
          <td><?php echo html::radio('indexMode', $lang->forum->indexModeOptions, isset($config->forum->indexMode) ? $config->forum->indexMode : 'board', "class='checkbox'");?></td><td></td>
        </tr>
        <?php if(isset($config->oauth->wechat)):?>
        <tr>
          <th><?php echo $lang->forum->bindWechat;?></th> 
          <td><?php echo html::radio('bindWechat', $lang->forum->bindWechatOptions, isset($config->forum->bindWechat) ? $config->forum->bindWechat : 'close', "class='checkbox'");?></td><td></td>
        </tr>
        <?php endif;?>
        <tr>
          <th></th>
          <td colspan='2'>
            <?php echo html::submitButton();?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
