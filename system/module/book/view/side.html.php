<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The side view file of book module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai<daitingting@xirangit.com>
 * @package     book
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>

<style>
  body, #main, #mainContent {height: 95%;}
  .book-side.col-md-2 {height: 115%; padding-left: 0; border-right: 1px solid #DDDDDD;}
  .book-side ul {margin: 15px 0 25px 0;}
  .book-side li {line-height: 26px; padding: 0 0 0 10px;}
  .book-side li .icon-manual {color: #999999; margin-right: 5px;}
  .book-side li:hover .icon-manual {color: #7580FF;}
  .book-side li.active .icon-manual {color: #7580FF;}
</style>

<div class='book-side col-md-2'>
  <?php commonModel::printLink('book', 'create', '', '<i class="icon icon-plus"></i> ' . $lang->book->createBook, 'class="btn"');?>
  <div class='book-list'>
    <ul class='tree tree-lines' data-idx='0'>
      <?php foreach($bookList as $bookID => $bookTitle):?>
      <li data-idx='1' data-id="<?php echo $bookID;?>"><?php echo html::a($this->createLink('book', 'admin', "bookID=$bookID"), '<i class="icon icon-manual"></i>' . $bookTitle);?></li>
      <?php endforeach;?>
    </ul>
  </div>
  <?php commonModel::printLink('book', 'setting', '', '<i class="icon icon-setting-alt"></i> ' . $lang->book->setting, 'class="btn"');?>
</div>


