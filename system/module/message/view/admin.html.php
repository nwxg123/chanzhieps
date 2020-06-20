<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The admin view file of message module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     message
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php js::set('type', $type);?>
<?php $status = $this->get->status ? $this->get->status : '0';?>
<?php $link   = "type=$type&status=$status";?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <li data-type='internal' <?php echo $status == 0 ? "class='active'" : '';?>>
        <?php echo html::a(inlink('admin', "type={$type}&status=0"), $lang->message->statusList[0]);?>
      </li>
      <li data-type='internal' <?php echo $status == 1 ? "class='active'" : '';?>>
        <?php echo html::a(inlink('admin', "type={$type}&status=1"), $lang->message->statusList[1]);?>
      </li>
    </ul>
  </header>
  <form id='ajaxForm' method='post' action=''>
    <table class='table table-hover tablesorter table-fixed' id='userList'>
      <thead>
        <tr class='text-center'>
          <th class='w-10px first'></th>
          <th class='w-80px'><?php echo $lang->message->id;?></th>
          <th class='text-left'><?php echo $lang->message->content;?></th>
          <?php if($status == 0):?>
          <th class='text-center actions w-30px'><?php echo $lang->message->pass;?></th>
          <?php endif;?>
          <th class='text-center actions w-30px'><?php echo $lang->message->reply;?></th>
          <th class='text-center actions w-30px'><?php echo $lang->addToBlacklist;?></th>
          <th class='text-center actions w-30px'><?php echo $lang->delete;?></th>
          <th class='text-center actions w-10px'></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($messages as $messageID => $message):?>
      <tr class='text-left'>
        <td></td>
        <td>
          <div class="checkbox-primary">
            <input type='checkbox' name='id[]'  value='<?php echo $messageID;?>'/> 
            <label for="account" class="no-margin"><?php echo $messageID;?></label>
          </div>
        </td>
        <td>
          <div>
            <span class='uname'><i class='icon icon-user'></i><?php echo $message->from;?></span>
            <span class='gray'><?php echo $message->date;?></span>
            <?php if($message->objectTitle):?>
            <?php $commentTo = $message->type == 'reply' ? $lang->message->reply : $lang->comment->commentTo;?>
            <span class='title'><?php echo $commentTo .' '. html::a($message->objectViewURL, $message->objectTitle, "target='_blank'");?></span>
            <?php endif;?>
          </div> 
          <div class='content'><?php echo $message->content;?></div>
        </td>
        <?php if($status == 0):?>
        <td class='c-actions'>
          <?php commonModel::printLink('message', 'pass', "messageID=$message->id&type=single", "<i class='icon icon-check-sign1'></i>", "title='{$lang->message->pass} 'class='btn btn-icon pass'");?>
        </td>
        <?php endif;?>
        <td class='c-actions'>
          <?php commonModel::printLink('message', 'reply', "messageID=$message->id", "<i class='icon icon-send'></i>", "title='{$lang->message->reply}' data-toggle='modal' class='btn btn-icon'");?>
        </td>
        <td class='c-actions'>
          <?php commonModel::printLink('guarder', 'addToBlacklist', "type=message&id={$message->id}", "<i class='icon icon-cancel'></i>", "title='{$lang->addToBlacklist}' data-toggle='modal' class='btn btn-icon'");?>
        </td>
        <td class='c-actions'>
          <?php commonModel::printLink('message', 'delete', "messageID=$message->id&type=single&maxID=0&status={$status}", "<i class='icon icon-delete'></i>", "title='{$lang->delete} 'class='btn btn-icon deleter'");?>
        </td>
        <td class='c-actions'></td>
      </tr>
      <?php endforeach;?>
      </tbody>
    </table>
    <div class='table-footer'>
      <div class='batch pull-left'>
        <div class='btn-group'><?php echo html::selectbutton();?></div>
        <?php if($status == 0):?>
          <?php echo html::commonButton($lang->message->pass, 'btn btn-batch pass', "url=" . inlink('pass', "messageID=0&type=batch&maxID=0&status={$status}"));?>
        <?php endif;?>
        <?php echo html::submitButton($lang->delete, 'btn btn-batch delete', "url=" . inlink('delete', "messageID=0&type=batch&maxID=0&status={$status}"));?>
      </div>
      <?php $pager->show();?>
    </div>
  </form>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
