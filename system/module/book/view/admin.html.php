<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The admin browse view file of book module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai<daitingting@xirangit.com>
 * @package     book
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php
$path = explode(',', $node->path);
js::set('path', $path);
js::set('confirmDelete', $lang->book->confirmDelete);
js::set('showAll', $lang->book->showAll);
js::set('hideAll', $lang->book->hideAll);
?>
<?php include './side.html.php';?>
<div class='col-md-10'>
  <div class='panel-heading'>
    <a id='changeBtn' class='btn btn-open'><?php echo $lang->book->showAll;?> <i class='icon-angle-sm-down'></i></a>
    <div class='panel-actions'>
      <form method='get' class='input-control search-box has-icon-right' data-ride='searchbox'>
        <?php echo html::hidden('m', 'book');?>
        <?php echo html::hidden('f', 'search');?>
        <?php echo html::hidden('recTotal', isset($this->get->recTotal) ? $this->get->recTotal : 0);?>
        <?php echo html::hidden('recPerPage', isset($this->get->recPerPage) ? $this->get->recPerPage : 20);?>
        <?php echo html::hidden('pageID', isset($this->get->pageID) ? $this->get->pageID :  1);?>
        <?php echo html::input('searchWord', $this->get->searchWord, "class='form-control search-query' placeholder='{$lang->book->searchPlaceholder}'");?>
        <button type="submit" class="btn btn-link input-control-icon-right search-submit-btn"><i class="icon icon-search icon-lg"></i></button>
      </form>
    </div>
    <div class='panel-body'><div class='books'><?php echo $catalog;?></div></div>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
