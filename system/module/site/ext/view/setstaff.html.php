<?php
/**
 * The setxuanxuan view file of site module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Memory <lvtao@cnezsoft.com>
 * @package     site
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../../common/view/header.admin.html.php';?>
<?php include '../../../common/view/chosen.html.php';?>
<div class='panel'>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class='form-inline'>
      <table class='table table-form'>
        <tr>
          <th class='w-120px'><?php echo $lang->chat->status;?></th>
          <td class="w-p40"><?php echo html::radio('status', $lang->chat->statusList, zget($config->xuanxuan, 'status', '0'));?></td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->chat->staff;?></th>
          <td><?php echo html::select('staff[]', $adminList, zget($config->xuanxuan, 'staff', ''), "class='form-control chosen' multiple");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->chat->onlineResponse;?></th>
          <td colspan="2"><?php echo html::textarea('onlineResponse', zget($config->xuanxuan, 'onlineResponse', $lang->chat->default->onlineResponse), "class='form-control' placeholder='{$lang->chat->placeholder->online}'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->chat->offlineResponse;?></th>
          <td colspan="2"><?php echo html::textarea('offlineResponse', zget($config->xuanxuan, 'offlineResponse', $lang->chat->default->offlineResponse), "class='form-control' placeholder='{$lang->chat->placeholder->offline}'");?></td>
        </tr>
        <tr>
          <th></th>
          <td colspan='2'>
            <?php echo html::submitButton();?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../../common/view/footer.admin.html.php';?>
