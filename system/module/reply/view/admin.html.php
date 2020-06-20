<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php'; ?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <li class='active'>
        <?php echo html::a(inlink('admin'), $lang->reply->list);?>
      </li>
    </ul>
    <div class='pull-right btn-toolbar'>
      <form method='get' class='input-control search-box has-icon-right' data-ride='searchbox'>
        <?php echo html::hidden('m', 'reply');?>
        <?php echo html::hidden('f', 'admin');?>
        <?php echo html::hidden('orderBy', 'addedDate_desc');?>
        <?php echo html::hidden('recTotal', isset($this->get->recTotal) ? $this->get->recTotal : 0);?>
        <?php echo html::hidden('recPerPage', isset($this->get->recPerPage) ? $this->get->recPerPage : 20);?>
        <?php echo html::hidden('pageID', isset($this->get->pageID) ? $this->get->pageID :  1);?>
        <?php echo html::input('searchWord', $this->get->searchWord, "class='form-control search-query'");?>
        <button type="submit" class="btn btn-link input-control-icon-right search-submit-btn"><i class="icon icon-search icon-lg"></i></button>
      </form>
    </div>
  </header>
  <form id='ajaxForm' method='post' action='<?php echo inlink('delete', "replyID=0&type=batch");?>'>
    <table class='table table-hover tablesorter table-fixed' id='replyList'>
      <thead>
        <tr class='text-center'>
          <th class='w-10px first'></th>
          <th class='w-60px'><?php echo $lang->reply->id;?></th>
          <th class='text-left'><?php echo $lang->reply->content;?></th>
          <th class='text-left w-250px'><?php echo $lang->reply->replyTo;?></th>
          <th class='w-120px'><?php echo $lang->reply->author;?></th>
          <th class='w-120px'><?php echo $lang->reply->addedDate;?></th>
          <th class="text-center actions w-35px"><?php echo $lang->addToBlacklist?></th>
          <th class="text-center actions w-35px"><?php echo $lang->delete?></th>
          <th class="text-center actions w-10px"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($replies as $reply):?>
        <tr class='text-center'>
          <td></td>
          <td>
            <div class="checkbox-primary">
              <input type='checkbox' name='replyID[]'  value='<?php echo $reply->id;?>'/> 
              <label for="replyID" class="no-margin"><?php echo $reply->id;?></label>
            </div>
          </td>
          <td class='text-left'>
            <div class='content'>
            <?php echo html::a(commonModel::createFrontLink('thread', 'locate', "threadID={$reply->thread}&replyID={$reply->id}"), $reply->content, "target=_blank class='text-gray'");?>
            </div>
          </td>
          <td class='text-left'>
            <div class='board text-ellipsis'><?php echo $lang->reply->board . $reply->threadTitle;?></div>
            <div class='forum text-ellipsis'><?php echo $lang->reply->forum . $reply->boardName;?></div>
          </td>
          <td><?php echo $reply->authorRealname;?></td>
          <td><?php echo substr($reply->addedDate, 5, -3);?></td>
          <td class='c-actions'><?php commonModel::printLink('guarder', 'addToBlacklist', "type=reply&id=$reply->id", "<i class='icon icon-cancel'></i>", "title='{$lang->addToBlacklist} 'data-toggle='modal' class='btn btn-icon'");?></td>
          <td class='c-actions'><?php commonModel::printLink('reply', 'delete', "replyID=$reply->id", "<i class='icon icon-delete'></i>", "title='{$lang->delete}' class='btn btn-icon deleter'");?></td> 
          <td class='c-actions'></td>
        </tr>  
        <?php endforeach;?>
      </tbody>
    </table>
    <div class='table-footer'>
      <div class='batch pull-left'>
        <div class='btn-group'><?php echo html::selectbutton();?></div>
        <?php echo html::submitbutton($lang->delete, 'btn delete btn-batch');?>
      </div>
      <?php $pager->show();?>
    </div>
  </form>
</section>
<?php include '../../common/view/footer.admin.html.php'; ?>
