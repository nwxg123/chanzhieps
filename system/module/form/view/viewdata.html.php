<?php
/**
 * The report view file of form module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     form 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php css::import($jsRoot . 'uploader/min.css');?>
<div class='btn-toolbar'>
  <?php echo html::backButton('', 'btn btn-default pull-right');?>
</div>
<section class='main-table'>
  <?php if($mode == 'byUser') include 'viewdatabyuser.html.php';?>
  <?php if($mode == 'byItem') include 'viewdatabyitem.html.php';?>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
