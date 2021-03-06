<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The build index view file of article module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     search
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-body'>
    <div class='form-group'>
      <ul id='resultBox'></ul>
    </div>
    <div class='from-group'><?php echo html::a(inlink('buildIndex'), $lang->search->buildIndex, "class='btn btn-primary' id='execButton'");?></div>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
