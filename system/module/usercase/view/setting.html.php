<?php
/**
 * The currency view file of usercase module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     usercase
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/chosen.html.php';?>
<div class='panel'>
  <div class='panel-body'>
    <form id='ajaxForm' action="<?php echo inlink('setting');?>" method='post'>
      <table class="table table-form">
        <tr>
          <th class='w-120px'><?php echo $lang->usercase->snap;?></th>
          <td><?php echo html::radio('snap', $lang->usercase->snapOptions, isset($config->usercase->snap) ? $config->usercase->snap: 0, "class='checkbox'");?></td>
        </tr>
        <tr>
          <th class='w-120px'><?php echo $lang->usercase->crawler;?></th>
          <td><?php echo html::radio('crawler', $lang->usercase->crawlerOptions, isset($config->usercase->crawler) ? $config->usercase->crawler : 0, "class='checkbox'");?></td>
        </tr>
        <tr>
          <th class='w-120px'><?php echo $lang->usercase->snapURL;?></th>
          <td><?php echo html::input('snapURL', isset($config->usercase->snapURL) ? $config->usercase->snapURL : '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->usercase->appName;?></th>
          <td><?php echo html::input('appName', isset($config->usercase->appName) ? $config->usercase->appName : '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->usercase->secret;?></th>
          <td><?php echo html::input('secret', isset($config->usercase->secret) ? $config->usercase->secret : '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th></th>
          <td><?php echo html::submitButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
