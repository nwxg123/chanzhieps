<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The admin view file of article of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     article
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php js::set('categoryID', $categoryID);?>
<?php $status     = $this->get->status ? $this->get->status : 'all';?>
<?php $status     = $this->get->tab ? 'submission' : $status;?>
<?php $date       = $this->get->date ? $this->get->date : '';?>
<?php $searchWord = $this->get->searchWord ? $this->get->searchWord : '';?>
<?php $link = "type=$type&categoryID=$categoryID&orderBy=$orderBy&recTotal=&recPerPage=&pageID=";?>
<section class='main-table'>
  <header class='clearfix'>
    <?php if(!empty($lang->article->stateTabs[$type])):?>
    <ul class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->article->stateList as $state => $stateLang):?>
      <?php if(!strpos($lang->article->stateTabs[$type], $state)) continue;?>
      <li <?php if($state == $status) {echo "class='active'";}?>>
        <?php echo html::a(inlink('admin', $link . "&status=$state&date=$date&searchWord=$searchWord"), sprintf($stateLang, $articleStat[$state]));?>
      </li>
      <?php endforeach;?>
    </ul>
    <?php endif;?>
    <?php if($type != 'submission'):?>
    <div class='pull-left btn-toolbar'>
      <div class='space'></div>
      <div class='input-control has-icon-right'>
        <button type='btn' class='btn'>
          <?php echo !empty($date) ? $date : $lang->selectDate;?>
          <i class='icon-angle-sm-down'></i>
          <?php if(!empty($date)):?> <i class='icon-close'></i> <?php endif;?>
        </button>
        <input type='btn' value='<?php echo $date;?>' class='btn form-datecustom w-90px' data-picker-position='bottom-right' href='<?php echo inlink('admin', $link . "&status=$status");?>'/>
      </div>
      <div class='space'></div>
      <form method='get' class='input-control search-box has-icon-right' data-ride='searchbox'>
        <?php echo html::hidden('m', 'article');?>
        <?php echo html::hidden('f', 'admin');?>
        <?php echo html::hidden('type', $type);?>
        <?php echo html::hidden('categoryID', $categoryID);?>
        <?php echo html::hidden('orderBy', $orderBy);?>
        <?php echo html::hidden('recTotal', isset($this->get->recTotal) ? $this->get->recTotal : 0);?>
        <?php echo html::hidden('recPerPage', isset($this->get->recPerPage) ? $this->get->recPerPage : 10);?>
        <?php echo html::hidden('pageID', isset($this->get->pageID) ? $this->get->pageID :  1);?>
        <?php echo html::hidden('status', $status);?>
        <?php echo html::hidden('date', $date);?>
        <?php echo html::input('searchWord', $searchWord, "class='form-control search-query' placeholder='{$lang->searchPlaceholder}'");?>
        <button type="submit" class="btn btn-link input-control-icon-right search-submit-btn"><i class="icon icon-search icon-lg"></i></button>
      </form>
    </div>
    <div class='pull-right btn-toolbar'>
      <?php if($type == 'page') commonModel::printLink('article', 'create', "type={$type}", '<i class="icon icon-plus"></i> ' . $lang->page->create, 'class="btn btn-primary"');?>
      <?php if($type != 'page') commonModel::printLink('article', 'create', "type={$type}&category={$categoryID}", '<i class="icon icon-plus"></i> ' . $lang->$type->create, 'class="btn btn-primary"');?>
    </div>
    <?php endif;?>
  </header>
  <table class='table table-hover tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "type=$type&categoryID=$categoryID&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID&status=$status&date=$date&searchWord=$searchWord";?>
        <th class='w-20px'></th>
        <th class='c-title'><?php commonModel::printOrderLink('title', $orderBy, $vars, $lang->article->title);?></th>
        <?php if(commonModel::isAvailable('message') && $type != 'page'):?>
        <th class='c-comments w-150px'><?php echo $lang->article->comments;?></th>
        <?php endif;?>
        <th class='c-views w-100px'><?php commonModel::printOrderLink('views', $orderBy, $vars, $lang->article->statistics);?></th>
        <?php if($type == 'submission'):?>
        <th class='c-type w-80px'><?php echo $lang->article->type;?></th>
        <?php endif;?>
        <?php if($type != 'page' and $type != 'submission'):?>
        <th class='c-category w-120px'><?php echo $lang->article->category;?></th>
        <?php endif;?>
        <?php if($type != 'page'):?>
        <th class='c-author w-100px'><?php commonModel::printOrderLink('author', $orderBy, $vars, $lang->article->author);?></th>
        <?php endif;?>
        <th class='c-addedDate w-250px'><?php commonModel::printOrderLink('addedDate', $orderBy, $vars, $lang->article->date);?></th>
        <?php if($type == 'submission'):?>
        <th class='c-submission w-100px'> <?php commonModel::printOrderLink('submission', $orderBy, $vars, $lang->article->status);?></th>
        <?php endif;?>
        <?php if($app->clientLang == 'zh-cn' || $app->clientLang == 'zh-tw'):?>
        <?php if($type != 'submission'):?>
          <th class="actions w-30px"><?php echo $lang->edit;?></th>
          <th class="actions w-30px"><?php echo $lang->article->images;?></th>
          <th class="actions w-30px"><?php echo $lang->article->files;?></th>
          <?php if($type == 'article' || !empty($this->config->bear->appID)):?>
          <th class="actions w-40px"><?php echo $lang->article->transfer;?></th>
          <?php endif;?>
          <th class="actions w-30px"><?php echo $lang->more;?></th>
        <?php else:?>
          <th class="actions w-30px"><?php echo $lang->submission->check;?></th>
          <th class="actions w-30px"><?php echo $lang->edit;?></th>
          <th class="actions w-30px"><?php echo $lang->delete;?></th>
        <?php endif?>
        <?php else:?>
          <?php $colspan = ($type == 'article' || !empty($this->config->bear->appID)) ? '5' : '4';?>
          <?php $colspan = $type != 'submission' ? $colspan : '3';?>
          <?php $widthClass = 'w-' . $colspan * 30 . 'px';?>
          <th colspan='<?php echo $colspan;?>' class="actions <?php echo $widthClass;?>"><?php echo $lang->actions;?></th>
        <?php endif?>
        <th class="actions w-10px"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($articles as $article):?>
      <?php $stick = isset($sticks[$article->id]) ? true : false;?>
      <tr>
        <td class='text-center'></td>
        <?php $bold = ($stick and $article->stickBold) ? 'font-weight: bold;' : '';?>
        <td class='c-title' title="<?php echo $article->title;?>" style="<?php echo $bold;?> color:<?php echo $article->titleColor;?>">
        <?php if($type == 'submission'):?>
          <div class='title text-ellipsis'><?php echo $article->title;?></div>
        <?php else:?>
        <div class="title pull-left text-ellipsis <?php echo $article->status !== 'draft' && $article->submission == '0' ? 'p100' : 'p65';?>">
            <?php if($stick):?><span class='text-red' title='<?php echo zget($lang->article->sticks, $article->sticky);?>'><i class="icon icon-top-setting"></i></span><?php endif;?>
            <?php echo html::a($this->article->createPreviewLink($article->id), $article->title, "target='_blank' class='text-muted'");?>
          </div>
          <?php if($article->status == 'draft') echo '<span class="label pull-left">' . $lang->article->statusList[$article->status] .'</span>';?>
          <?php if($article->submission != '0') echo '<span class="label label-custom pull-left">' . $lang->submission->common .'</span>';?>
        <?php endif;?>
        </td>
        <?php if(commonModel::isAvailable('message') && $type != 'page'):?>
        <td class='text-left c-comments'>
          <?php $articleID = $article->id;?>
          <?php $reviewedMessageCount   = !empty($message[$articleID]) ? $message[$articleID]->count : 0;?>
          <?php $unReviewedMessageCount = !empty($unReviewedMessage[$articleID]) ? $unReviewedMessage[$articleID]->count : 0;?>
          <?php echo sprintf($lang->article->reviewed, $reviewedMessageCount);?>
          <?php if($unReviewedMessageCount):?>
          <?php commonModel::printLink('message', 'admin', "", sprintf($lang->article->underReview, $unReviewedMessageCount), 'class="reviewed text-danger"');?>
          <?php endif;?>
        </td>
        <?php endif;?>
        <td class='text-center c-views'><?php echo sprintf($lang->article->viewCount, $article->type == 'book' ? $article->bookViews : $article->views);?></td>
        <?php if($type == 'submission'):?>
        <td class='text-center c-type'><?php echo zget($lang->submission->typeList, $article->type, $lang->article->submission);?></td>
        <?php endif;?>
        <?php if($type != 'page' and $type != 'submission'):?>
        <?php $count = 0;?>
        <td class='text-center text-ellipsis c-category' title='<?php foreach($article->categories as $category) {echo $category->name . ' ';$count ++;}?>'>
          <?php foreach($article->categories as $category) {echo $category->name;break;};?>
          <?php if($count > 1) echo '...';?>
        </td>
        <?php endif;?>
        <?php if($type != 'page'):?>
        <td class='text-center text-muted text-ellipsis c-author' title='<?php echo $article->author;?>'><?php echo $article->author;?></td>
        <?php endif;?>
        <td class='text-center text-muted c-addedDate'>
            <?php if($article->addedDate > helper::now()):?>
            <?php echo $lang->article->releaseStatusList['timed'];?>
            <?php echo date('Y-m-d H:i',strtotime($article->addedDate));?>
            <?php elseif($article->status == 'draft'):?>
            <?php echo $lang->article->releaseStatusList[$article->status];?>
            <?php echo date('Y-m-d H:i',strtotime($article->editedDate));?>
            <?php else:?>
            <?php echo $lang->article->releaseStatusList[$article->status];?>
            <?php echo date('Y-m-d H:i',strtotime($article->addedDate));?>
            <?php endif;?>
        </td>

        <?php if($type == 'submission') echo "<td class='text-center c-submission'>" . $lang->submission->status[$article->submission] . '</td>';?>

        <?php if($type == 'submission'):?>

          <?php if($article->submission != articleModel::SUBMISSION_STATUS_APPROVED):?>
            <td class='c-actions'><?php commonmodel::printlink('article', 'check', "articleid=$article->id", "<i class='icon icon-check'></i>", "title='{$lang->submission->check}' class='btn btn-icon'");?></td>
            <td class='c-actions'></td>
          <?php else:?>
            <td class='c-actions'></td>
            <td class='c-actions'><?php commonModel::printLink('article', 'edit', "articleID=$article->id&type=$article->type", "<i class='icon icon-pencil'></i>", "title='{$lang->edit}' class='btn btn-icon'");?></td>
          <?php endif;?>

          <td class='c-actions'><?php commonModel::printLink('article', 'delete', "articleID=$article->id", "<i class='icon icon-delete'></i>", "title='{$lang->delete}' class='btn btn-icon deleter'");?></td>

        <?php else:?>

        <td class='c-actions'><?php commonModel::printLink('article', 'edit', "articleID=$article->id&type=$article->type", '<i class="icon icon-edit"></i>', "title='{$lang->edit}' class='btn btn-icon'");?></td>

        <td class='c-actions'><?php commonModel::printLink('file', 'browse', "objectType=$article->type&objectID=$article->id&isImage=1", '<i class="icon icon-image"></i>', "data-toggle='modal' title='{$lang->article->images}' class='btn btn-icon'");?></td>

        <td class='c-actions'><?php commonModel::printLink('file', 'browse', "objectType=$article->type&objectID=$article->id&isImage=0", '<i class="icon icon-paperclip"></i>', "data-toggle='modal' title='{$lang->article->files}' class='btn btn-icon'");?></td>

        <?php if($type == 'article' || !empty($this->config->bear->appID)):?>
        <td class='c-actions'>
          <div class='dropdown'>
            <button type='button' class='btn btn-icon' data-toggle='dropdown' title='<?php echo $lang->article->transfer;?>'><i class='icon icon-goto'></i><span class='caret'></span></button>
            <ul class='dropdown-menu pull-right'>
              <?php if($type == 'article'):?>
              <li><?php commonmodel::printlink('article', 'forward2blog', "articleid=$article->id", $lang->article->forward2Blog, "data-toggle='modal'");?></li>
              <li><?php commonmodel::printlink('article', 'forward2forum', "articleid=$article->id", $lang->article->forward2Forum, "data-toggle='modal'");?></li>
              <?php endif;?>
              <?php if(!empty($this->config->bear->appID)):?>
              <li><?php commonmodel::printlink('bear', 'submit', "objectType={$article->type}&objectID={$article->id}", $lang->article->forward2Baidu, "data-toggle='modal'");?></li>
              <?php endif;?>
            </ul>
          </div>
        </td>
        <?php endif;?>
        <td class='c-actions'>
          <span class='dropdown'>
            <a data-toggle='dropdown' href='javascript:;' title='<?php echo $lang->more;?>' class='btn btn-icon'><i class='icon icon-ellipsis-h'></i></a>
            <ul class='dropdown-menu pull-right'>
              <li><?php commonModel::printLink('visual', 'design', "page={$type}_view&object=$article->id", $lang->article->layout, "data-toggle='modal' data-width='100%' data-type='iframe'");?></li>
              <?php if($type != 'page'):?>
              <li><?php commonModel::printLink('article', 'stick', "article=$article->id", $lang->article->stick, "data-toggle='modal'");?></li>
              <?php endif;?>
              <li><?php commonModel::printLink('article', 'setcss', "articleID=$article->id", $lang->article->css, "data-toggle='modal'");?></li>
              <li><?php commonModel::printLink('article', 'setjs', "articleID=$article->id", $lang->article->js, "data-toggle='modal'");?></li>
              <li><?php commonModel::printLink('article', 'delete', "articleID=$article->id", $lang->delete, 'class="deleter"');?></li>
              
            </ul>
          </span>
        </td>
        <td></td>
      </tr>
      <?php endif;?>
      <?php endforeach;?>
    </tbody>
  </table>
  <div class='table-footer'>
    <?php $pager->show();?>
  </div>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
