<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php'; ?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <li class='active'>
        <?php echo html::a(inlink('admin'), $lang->forum->threadList);?>
      </li>
    </ul>
    <div class='pull-right btn-toolbar'>
      <form method='get' class='input-control search-box has-icon-right' data-ride='searchbox'>
        <?php echo html::hidden('m', 'forum');?>
        <?php echo html::hidden('f', 'admin');?>
        <?php echo html::hidden('boardID', $boardID);?>
        <?php echo html::hidden('orderBy', $orderBy);?>
        <?php echo html::hidden('recTotal', isset($this->get->recTotal) ? $this->get->recTotal : 0);?>
        <?php echo html::hidden('recPerPage', isset($this->get->recPerPage) ? $this->get->recPerPage : 10);?>
        <?php echo html::hidden('pageID', isset($this->get->pageID) ? $this->get->pageID :  1);?>
        <?php echo html::input('searchWord', $this->get->searchWord, "class='form-control search-query'");?>
        <button type="submit" class="btn btn-link input-control-icon-right search-submit-btn"><i class="icon icon-search icon-lg"></i></button>
      </form>
    </div>
  </header>
  <table class='table table-hover tablesorter table-fixed' id='threadList'>
    <?php if($threads):?>
    <thead>
      <tr class='text-center'>
        <?php $vars = "boardID=$boardID&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}";?>
        <th class='text-center w-70px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->thread->id);?></th>
        <th><?php echo $lang->thread->title;?></th>
        <th class='w-120px text-ellipsis'><?php echo $lang->forum->board;?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('author', $orderBy, $vars, $lang->thread->author);?></th>
        <th class='w-130px'><?php commonModel::printOrderLink('addedDate', $orderBy, $vars, $lang->thread->postedDate);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('views', $orderBy, $vars, $lang->thread->views);?></th>
        <th class='w-70px'><?php commonModel::printOrderLink('replies', $orderBy, $vars, $lang->thread->replyCount);?></th>
        <th class='w-130px'><?php commonModel::printOrderLink('repliedDate', $orderBy, $vars, $lang->thread->lastReply);?></th>
        <?php if($this->config->forum->postReview == 'open'):?>
        <th class='w-100px'><?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->thread->status);?></th>
        <?php endif;?>
        <th class='w-70px'><?php commonModel::printOrderLink('hidden', $orderBy, $vars, $lang->thread->display);?></th>
        <?php if($app->clientLang == 'zh-cn' || $app->clientLang == 'zh-tw'):?>
        <?php if($this->config->forum->postReview == 'open'):?>
        <th class="text-center actions w-30px"><?php echo $lang->thread->approve;?></th>
        <?php endif;?>
        <th class="text-center actions w-30px"><?php echo $lang->thread->transfer;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->addToBlacklist;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->delete;?></th>
        <?php else:?>
        <?php $colspan = $this->config->forum->postReview == 'open' ? '4' : '3';?>
        <?php $widthClass = 'w-' . $colspan * 30 . 'px';?>
        <th colspan='<?php echo $colspan;?>' class="actions <?php echo $widthClass;?>"><?php echo $lang->actions;?></th>
        <?php endif;?>
        <th class="text-center actions w-10px"></th>
      </tr>
    </thead>
    <?php endif;?>
    <tbody>
      <?php foreach($threads as $thread):?>
      <tr class='text-center'>
        <td><?php echo $thread->id;?></td>
        <td class='title text-left text-ellipsis'>
          <?php echo html::a(commonModel::createFrontLink('thread', 'view', "threadID=$thread->id"), $thread->title, "target='_blank' title='{$thread->title}' class='text-muted'"); ?>
        </td>
        <td class='text-ellipsis' title='<?php echo $thread->boardName;?>'><?php echo $thread->boardName;?></td>
        <td class='text-ellipsis'><?php echo $thread->authorRealname;?></td>
        <td><?php echo $thread->addedDate;?></td>
        <td><?php echo $thread->views;?></td>
        <td><?php echo $thread->replies;?></td>
        <td class='text-center'><?php if($thread->replies) echo $thread->repliedDate;?></td>
        <?php if($this->config->forum->postReview == 'open'):?>
        <td>
          <span class="<?php echo $thread->status == 'approved' ? 'span span-success text-muted' : 'text-danger'?>">
            <?php echo zget($lang->thread->statusList, $thread->status);?>
          </span>
        </td>
        <?php endif;?>

        <td class='c-actions operate text-center nofixed'>
          <span class="dropdown">
            <a href='###' class="dropdown-toggle text-muted" data-toggle="dropdown">
              <?php echo $thread->hidden ? $lang->thread->displayList['hidden'] : $lang->thread->displayList['normal'];?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu pull-right text-left" role="menu">
              <?php $text = $thread->hidden ? $lang->thread->show : $lang->thread->hide;?>
              <li><?php commonModel::printLink('thread', 'switchStatus', "threadID=$thread->id", $thread->hidden ? $lang->thread->displayList['normal'] : $lang->thread->displayList['hidden']);?></li>
            </ul>
          </span>
        </td>
        <?php if($this->config->forum->postReview == 'open'):?>
          <td class='c-actions'>
            <?php if($thread->status == 'wait' or $thread->status == ''):?>
            <?php commonmodel::printlink('thread', 'approve', "threadid=$thread->id&boardid=$thread->board", "<i class='icon icon-check-sign1'></i>", "title='{$lang->thread->approve}' class='btn btn-icon'");?>
            <?php endif;?>
          </td>
        <?php endif;?>
        <?php if($thread->status != 'wait'):?>
          <td class='c-actions'>
            <?php commonModel::printLink('thread', 'transfer', "threadID=$thread->id", "<i class='icon icon-goto'></i>", "title='{$lang->thread->transfer}' class='btn btn-icon' data-toggle='modal'");?>
          </td>
        <?php else:?>
          <td class='c-actions'></td>
        <?php endif;?>
        </td>
        <td class='c-actions'>
          <?php commonModel::printLink('guarder', 'addToBlacklist', "type=thread&id=$thread->id", "<i class='icon icon-cancel'></i>", "title='{$lang->addToBlacklist} 'class='btn btn-icon' data-toggle='modal'");?>
        </td>
        <td class='c-actions'>
          <?php commonModel::printLink('thread', 'delete', "threadID=$thread->id", "<i class='icon icon-delete'></i>", "title='{$lang->delete}' class='btn btn-icon deleter'");?>
        </td>
        <td class='c-actions'></td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <?php $colspan = $this->config->forum->postReview == 'open' ? 14 : 13;?>
    <tfoot><tr><td colspan='<?php echo $colspan;?>'><?php $pager->show();?></td></tr></tfoot>
  </table>
<section>
<?php include '../../common/view/footer.admin.html.php'; ?>
