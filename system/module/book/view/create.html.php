<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The create book view file of book of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai<daitingting@xirangit.com>
 * @package     book
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php'; ?>
<?php include '../../common/view/kindeditor.html.php';?>
<div class='col-md-12'>
  <div class='panel'>
    <div class='panel-heading'>
      <ol class='breadcrumb'>
        <li><?php commonModel::printLink('book', 'admin', '', $lang->book->common);?></li>
        <li class='active'><?php echo $lang->book->create;?></li>
      </ol>
    </div>
    <div class='panel-body'>
      <form id='ajaxForm' method='post' class='form-inline'>
        <table class='table table-form'>
          <tr>
            <th class='w-100px'><?php echo $lang->book->author;?></th>
            <td><?php echo html::input('author', $app->user->realname, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><span><?php echo $lang->book->title;?></span></th>
            <td>
              <div class='required required-wrapper'></div>
              <div class='input-group title-wrapper'>
                <?php echo html::input('title', '', 'class="form-control has-icon-right"');?>
                <span class='input-group-addon w-70px'><?php echo $lang->book->order;?></span>
                <?php echo html::input('order', '', "class='form-control'");?>
              </div>
            </td>
          </tr>
          <tr>
            <th><span><?php echo $lang->book->alias;?></span></th>
            <td>
              <div class='required required-wrapper'></div>
              <div class='input-group'>
                <span class='input-group-addon'>http://<?php echo $this->server->http_host . $config->webRoot?>book/</span>
                <?php echo html::input('alias', '', "class='form-control' placeholder='{$lang->alias}'");?>
                <span class='input-group-addon'>.html</span>
              </div>
            </td>
          </tr>
          <tr>
            <th><?php echo $lang->book->keywords;?></th>
            <td><?php echo html::input('keywords', '', 'class=form-control');?></td>
          </tr>
          <tr>
            <th><?php echo $lang->book->summary;?></th>
            <td colspan='2'><?php echo html::textarea('summary', '', "class='form-control' rows='8'");?></td>
          </tr>
          <tr>
            <th></th>
            <td colspan='2' class='actions'>
              <?php echo html::submitButton();?>
              <?php echo html::backButton('', 'btn btn-default btn-back');?>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
