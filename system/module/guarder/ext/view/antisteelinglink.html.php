<?php
/**
 * The anti-steeling-link view file of gurader module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     gurader 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../../common/view/header.admin.html.php';?>
<section class='main-table'>
  <div class='panel-body'>
    <form id='ajaxForm' method='post'>
      <table class='table table-form'>
        <?php $status  = isset($config->guarder->antiSteelingLink->status)  ? $config->guarder->antiSteelingLink->status  : 'closed';?>
        <?php $key     = isset($config->guarder->antiSteelingLink->key)     ? $config->guarder->antiSteelingLink->key     : '';?>
        <?php $expired = isset($config->guarder->antiSteelingLink->expired) ? $config->guarder->antiSteelingLink->expired : '';?>
        <?php $style   = $status == 'closed' ? "style='display:none'" : '';?>
        <tr>
          <th class='w-150px'><?php echo $lang->guarder->antiSteelingLink->function;?></th>
          <td class='w-300px'><?php echo html::radio('status', $lang->guarder->antiSteelingLink->statusList, $status);?></td>
          <td><span class='text-important'><?php echo $lang->guarder->antiSteelingLink->functionTips;?></span></td>
        </tr>
        <tr class='detailTR' <?php echo $style;?>>
          <th><?php echo $lang->guarder->antiSteelingLink->key;?></th>
          <td><?php echo html::input('key', $key, "class='form-control'");?></td>
          <td><span class='text-important'><?php echo $lang->guarder->antiSteelingLink->keyTips;?></span></td>
        </tr>
        <tr class='detailTR' <?php echo $style;?>>
          <th><?php echo $lang->guarder->antiSteelingLink->expired;?></th>
          <td><?php echo html::input('expired', $expired, "class='form-control'");?></td>
          <td><span class='text-important'><?php echo $lang->guarder->antiSteelingLink->expiredTips;?></span></td>
        </tr>
        <tr class='detailTR' <?php echo $style;?>>
          <th></th>
          <td colspan='2'><span class='text-important'><?php echo $lang->guarder->antiSteelingLink->tips;?></span></td>
        </tr>
        <tr>
          <th></th>
          <td><?php echo html::submitButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</section>
<?php include '../../../common/view/footer.admin.html.php';?>
