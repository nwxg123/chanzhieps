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
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->form->modeList as $key => $label):?>
      <li <?php echo $mode == $key ? "class='active'" : "";?>>
        <?php echo html::a(inlink('report', "formID=$formID&type=$type&mode=$key"), $label);?>
      </li>
      <?php endforeach;?>
    </ul>
    <div class='pull-right btn-toolbar'>
      <?php echo html::a(inlink('admin',"type=$type"), $lang->goback, "class='btn btn-default'");?>
    </div>
  </header>
  <?php if($mode == 'byUser') include 'reportbyuser.html.php';?>
  <?php if($mode == 'byItem') include 'reportbyitem.html.php';?>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
