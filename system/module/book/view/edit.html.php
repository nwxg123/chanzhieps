<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The edit book view file of book of chanzhiEPS.
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
<?php include '../../common/view/chosen.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php 
$path = explode(',', $node->path);
js::set('path', $path);
js::set('nodeID', $node->id);
js::set('nodeParent', $node->parent);
?>
<div class='panel'>
  <div class='panel-heading'>
    <ol class='breadcrumb'>
      <li><?php echo $node->title;?></li>
      <li class='active'><?php echo $lang->edit . $lang->book->typeList[$node->type];?></li>
    </ol>
  </div>
  <div class='panel-body'>
    <form id='ajaxForm' method='post' action='<?php echo inlink('edit', "nodeID=$node->id")?>' class='ve-form'>
      <table class='table table-form'>
        <tr id='isLinked'>
          <th class='col-xs-1'><?php echo $lang->book->author;?></th>
          <td><?php echo html::input('author', $node->author, "class='form-control'");?></td>
          <td></td>
        </tr>
        <?php if($node->type != 'book'):?>
        <tr>
          <th class='col-xs-1'><?php echo $lang->book->common;?></th>
          <td><?php echo html::select('book', $bookList, $node->book->id, "class='chosen form-control'");?></td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->book->parent;?></th>
          <td id='parentBox'><?php echo html::select('parent', $optionMenu, $node->parent, "class='chosen form-control'");?></td>
        </tr>
        <?php endif; ?>
        <tr>
          <th><?php echo $lang->book->title;?></th>
          <td>
            <div class='required required-wrapper'></div>  
            <div class='row order'>
              <div class='col-sm-12'>
                <div class='input-group title-wrapper'>
                  <?php echo html::input('title', $node->title, 'class="form-control"');?>
                  <?php if($node->type != 'book'):?>
                  <span class='input-group-addon w-100px'>
                    <?php $linkChecked = $node->link ? 'on' : 'off'; ?>
                    <?php echo html::checkbox('isLink', array('on' => $lang->book->isLink), $linkChecked, '', 'inline', 1); ?>
                  </span>
                  <?php else:?>
                  <span class='input-group-addon w-70px'><?php echo $lang->book->order;?></span>
                  <?php echo html::input('order', $node->order, "class='form-control'");?>
                  <?php endif;?>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <tr class= 'trlink hide' id='trlink'>
          <th><?php echo $lang->book->link;?></th>
          <td>
            <div class='required required-wrapper'></div>
            <?php echo html::input('link', $node->link, "class='form-control' placeholder='{$lang->book->note->link}'");?>
          </td>
        </tr>
        <tr id='isLinked'>
          <th><?php echo $lang->book->alias;?></th>
          <td>
            <?php if($node->type == 'book'):?>
            <div class='required required-wrapper'></div>
            <?php endif;?>
            <div class='input-group text-1'>
              <span class='input-group-addon'>http://<?php echo $this->server->http_host . $config->webRoot?>book/id@</span>
              <?php echo html::input('alias', $node->alias, "class='form-control' placeholder='{$lang->alias}'");?>
              <span class='input-group-addon'>.html</span>
            </div>
          </td>
        </tr>
        <tr id='isLinked'>
          <th><?php echo $lang->book->keywords;?></th>
          <td><?php echo html::input('keywords', $node->keywords, "class='form-control'");?></td>
        </tr>
        <?php if(strpos('book,chapter', $node->type) !== false):?>
        <tr id='isLinked'>
          <th><?php echo $lang->book->summary;?></th>
          <td colspan='2'><?php echo html::textarea('summary', $node->summary, "class='form-control' rows='8'");?></td>
        </tr>
        <?php else: ?>
        <tr id='isLinked'>
          <th><?php echo $lang->book->summary;?></th>
          <td><?php echo html::textarea('summary', $node->summary, "class='form-control' rows='2'");?></td>
        </tr>
        <?php endif;?>
        <?php if(strpos('book,chapter', $node->type) === false):?>
        <tr id='isLinked'>
          <th><?php echo $lang->book->content;?></th>
          <td colspan='2' valign='middle'><?php echo html::textarea('content', htmlspecialchars($node->content), "rows='15' class='form-control'");?></td>
        </tr>
        <?php endif;?>
        <?php if($node->type != 'book'):?>
          <tr id='isLinked'>
            <th><?php echo $lang->book->status;?></th>
            <td><?php echo html::radio('status', $lang->book->statusList, $node->status);?></td>
          </tr>
        <?php endif;?>
        <?php if($node->type == 'article'):?>
        <tr id='isLinked'  class='datetime-picker'>
          <th><?php echo $lang->book->addedDate;?></th>
          <td>
            <div class='input-control has-icon-right'>
              <?php echo html::input('addedDate', formatTime($node->addedDate), "class='form-control form-datetime' data-picker-position='top-right'");?>
              <label for="addedDate" class="input-control-icon-right"><i class="icon icon-calendar"></i></label>
            </div>
            <span class='help-inline'><?php echo $lang->book->note->addedDate;?></span>
          </td>
        </tr>
        <?php endif;?>
        <tr>
          <th></th>
          <td colspan='2' class='actions'>
            <?php echo html::submitButton();?>
            <?php echo html::hidden('referer', $this->server->http_referer);?>
            <?php echo html::backButton('', 'btn btn-default btn-back');?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
