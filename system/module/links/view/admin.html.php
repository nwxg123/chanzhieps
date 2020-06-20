<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The setLink view file of links module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     links
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<section>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class='ve-form'>
      <table class='table table-form'>
        <tr>
          <th><?php echo $lang->links->index;?></th>
          <td><?php echo html::textarea('index', isset($this->config->links->index) ? htmlspecialchars($this->config->links->index) : '', "class='form-control area-1' rows='10'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->links->all;?></th>
          <td><?php echo html::textarea('all', isset($this->config->links->all) ? htmlspecialchars($this->config->links->all) : '', "class='form-control area-1' rows='10'");?></td>
        </tr>
        <tr>
          <th></th>
          <td>
            <?php echo html::submitButton();?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
