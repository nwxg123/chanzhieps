<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The search view file of book module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     book
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include './side.html.php';?>
<div class='col-md-10'>
  <div class='panel'>
    <div class='panel-heading btn-toolbar'>
      <?php echo html::a($this->createLink('book', 'admin'), $lang->book->backtolist, "class='btn btn-back'");?>
      <div class='panel-actions'>
        <form method='get' class='input-control search-box has-icon-right' data-ride='searchbox'>
          <?php echo html::hidden('m', 'book');?>
          <?php echo html::hidden('f', 'search');?>
          <?php echo html::hidden('recTotal', isset($this->get->recTotal) ? $this->get->recTotal : 0);?>
          <?php echo html::hidden('recPerPage', isset($this->get->recPerPage) ? $this->get->recPerPage : 10);?>
          <?php echo html::hidden('pageID', isset($this->get->pageID) ? $this->get->pageID :  1);?>
          <?php echo html::input('searchWord', $this->get->searchWord, "class='form-control search-query' placeholder='{$lang->book->searchPlaceholder}'");?>
          <button type="submit" class="btn btn-link input-control-icon-right search-submit-btn"><i class="icon icon-search icon-lg"></i></button>
        </form>
      </div>
    </div>
    <table class='table table-hover tablesorter table-fixed'>
      <thead>
        <tr class='text-center'>
          <th class='w-200px'><?php echo $lang->book->typeList['chapter'];?></th>
          <th class='w-200px'><?php echo $lang->book->title;?></th>
          <th class='w-60px'><?php echo $lang->book->author;?></th>
          <th class='w-60px'><?php echo $lang->book->views;?></th>
          <th class='w-150px'><?php echo $lang->book->addedDate;?></th>
          <th class='actions w-20px'><?php echo $lang->edit;?></th>
          <th class='actions w-20px'><?php echo $lang->book->files;?></th>
          <th class='actions w-20px'><?php echo $lang->delete;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($articles as $article):?>
        <tr class='text-center'>
          <td class='text-left article-path' title='<?php echo $this->book->explodePath($article->path);?>'><?php echo $this->book->explodePath($article->path);?></td>
          <td class='text-left article-title' title='<?php echo $article->title;?>'>
            <span><?php echo $article->title;?></span>
            <?php if($article->status == 'draft') echo "<span class='label'>{$lang->book->statusList['draft']}</span>"?>
          </td>
          <td><?php echo $article->author;?></td>
          <td><?php echo $article->views;?></td>
          <td>
            <?php if($article->addedDate > helper::now()):?>
              <?php echo $lang->book->releaseStatusList['timed'];?>
              <?php echo formatTime($article->addedDate, 'Y-m-d H:i');?>
            <?php elseif($article->status == 'draft'):?>
              <?php echo $lang->book->releaseStatusList[$article->status];?>
              <?php echo formatTime($article->editedDate, 'Y-m-d H:i');?>
            <?php else:?>
              <?php echo $lang->book->releaseStatusList[$article->status];?>
              <?php echo formatTime($article->addedDate, 'Y-m-d H:i');?>
            <?php endif;?>
          </td>
          <td class='actions'>
            <?php commonModel::printLink('book', 'edit', "nodeID=$article->id", '<i class="icon icon-edit"></i>', 'class="btn btn-icon"');?>
          </td>
          <td class='actions'>
            <?php commonModel::printLink('file', 'browse', "objectType=book&objectID=$article->id", '<i class="icon icon-paperclip"></i>', 'data-toggle=modal class="btn btn-icon"');?>
          </td>
          <td class='actions'>
            <?php commonModel::printLink('book', 'delete', "nodeID=$article->id", '<i class="icon icon-delete"></i>', "class='deleter btn btn-icon'");?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot><tr><td colspan='8'><?php $pager->show();?></td></tr></tfoot>
    </table>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
