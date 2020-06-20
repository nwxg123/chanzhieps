<?php
/**
 * The message view file of order module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     message
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../../common/view/header.modal.html.php';?>
<div class='row'>
<?php foreach($messageList as $message):?>
<div class='message w-p100'>
  <div class='message-id'><?php echo $message->id;?></div>
    <table class='table table-borderless w-p100'>
      <tr class='original'>
        <td>
          <?php echo "<i class='icon-user'></i> <strong>{$message->from}</strong> &nbsp;";?>
          <?php echo "<span class='gray'>$message->date</span>";?>
          <?php if(!empty($message->link))  echo html::a($message->link, $message->link, "target='_blank'");?>
          <br/>
          <?php if(!empty($message->phone)) echo "<i class='icon-phone text-info icon'></i> {$message->phone} &nbsp; ";?>
          <?php if(!empty($message->email)) echo "<i class='icon-envelope text-warning icon'></i> {$message->email} &nbsp; ";?>
          <?php if(!empty($message->qq))    echo "<strong class='text-danger'>QQ</strong> {$message->qq} &nbsp; ";?>
        </td>
        <td class='w-60px'><?php commonModel::printLink('message', 'reply', "messageID={$message->id}", $lang->message->reply, "class='loadInModal'");?></td>
      </tr>
      <tr class='original'>
        <td class='content-box' colspan='2'>
          <textarea name='' id='' rows='2' class='form-control borderless' spellcheck='false'><?php echo $message->content;?></textarea>
        </td>
      </tr>
      <?php $this->message->getAdminReplies($message);?>
    </table>
</div>
<?php endforeach;?>
<div id='pager'><?php $pager->show('right', 'shortest');?></div>
</div>
<?php include '../../../common/view/footer.modal.html.php';?>
