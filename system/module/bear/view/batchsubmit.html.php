<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The batchsubmit view file of article module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     bear
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<section>
  <div class='panel'>
    <div class='panel-body'>
      <div class='form-group'>
        <ul id='resultBox'></ul>
      </div>
      <div class='from-group'><?php echo html::a(inlink('batchsubmit'), $lang->bear->batchSubmit, "class='btn btn-primary' id='execButton'");?></div>
    </div>
  </div>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
