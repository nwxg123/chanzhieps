<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The browse view file of tree module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     tree
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<?php include '../../common/view/chosen.html.php';?>
<?php 
js::set('root', $root);
js::set('type', $type);
js::set('isWechatMenu', $isWechatMenu);
js::set('lang', $lang->js);
?>
<?php if(strpos($treeMenu, '<li>') !== false):?>
<div class='row'>
  <div class='col-md-3'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><i class="icon-sitemap"></i> <?php echo $lang->category->common;?></strong>
      </div>
      <div class='panel-body'>
        <div id='treeMenuBox'><?php echo $treeMenu;?></div>
        <?php if($isWechatMenu):?>
        <div class='panel-body'>
          <?php commonModel::printLink('wechat', 'commitMenu', "public=" . str_replace('wechat_', '', $type), $lang->wechatMenu->commit, "class='btn btn-primary jsoner w-80px'");?>
          <?php commonModel::printLink('wechat', 'deleteMenu', "public=" . str_replace('wechat_', '', $type), $lang->wechatMenu->delete, "class='btn btn-danger jsoner w-80px'");?>
          <p></p>
          <p class="text-danger"><?php echo $lang->wechatMenu->responseTip;?></p>
        </div>
        <?php endif;?>
      </div>
      <?php if(isset($fromAdminPage)):?> <div class='back text-center'><?php echo $fromAdminPage;?></div><?php endif;?>
    </div>
  </div>
  <div class='col-md-9' id='categoryBox'></div>
</div>
<?php else:?>
<div id='categoryBox'></div>
<?php endif;?>
<?php include '../../common/view/footer.admin.html.php';?>
