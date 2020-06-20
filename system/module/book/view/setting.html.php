<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The setting view file of book module of Chanzhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     book
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include './side.html.php';?>
<div class='col-md-10'>
  <div class='panel'>
    <div class='panel-heading'>
      <ol class='breadcrumb'>
        <li><?php commonModel::printLink('book', 'admin', '', $lang->book->common);?></li>
        <li class='active'><?php echo $lang->book->setting;?></li>
      </ol>
    </div>
    <div class='panel-body'>
      <form method='post' id='ajaxForm' class='form-inline'>
        <table class='table table-form'>
          <tr>
            <th class='w-80px'><?php echo $lang->book->index;?></th>
            <td class='w-p40'><?php echo html::select('index', $books, isset($this->config->book->index) ? $this->config->book->index : $firstBook, "class='chosen form-control'");?></td>
            <td></td>
          </tr>
          <tr>
            <th><?php echo $lang->book->fullScreen;?></th>
            <td><?php echo html::radio('fullScreen', $lang->book->fullScreenList, isset($this->config->book->fullScreen) ? $this->config->book->fullScreen : 0, "class='checkbox'");?></td>
            <td></td>
          </tr>
          <tr>
            <th></th>
            <td class='submit-btn' colspan='2'>
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
