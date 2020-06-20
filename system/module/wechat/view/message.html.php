<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The admin view file of wechat of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     wechat
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
//a($this->server->query_string);
?>
<?php include '../../common/view/header.admin.html.php';?>
<section class='main-table'>
  <header class='clearfix'>
    <ul id='typeNav' class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->wechat->message->tabList as $tab):?>
      <?php list($query, $text) = explode('|', $tab);?>
      <li data-type='internal' <?php echo strpos($this->server->query_string, $query) !== false ? "class='active'" : '';?>>
        <?php echo html::a(inlink('message', $query), $text);?>
      </li>
      <?php endforeach;?>
    </ul> 
  </header>
  <table class='table table-hover tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <th colspan='2'><?php echo $lang->wechat->message->content;?></th>
        <th class='w-100px'><?php echo $lang->wechat->message->type;?></th>
        <th class='w-200px'><?php echo $lang->wechat->message->time;?></th>
        <th class='w-100px'><?php echo $lang->wechat->message->reply;?></th>
      </tr>
    </thead>
    <tbody>
      <?php $replyPriv = commonModel::hasPriv('wechat', 'reply');?>
      <?php foreach($messageList as $message):?>
      <tr class='text-center'>
        <td class='w-100px text-right'><?php echo zget($message, 'fromUserName', $message->wid) . $lang->colon;?></td>
        <td class='text-left'><?php echo $message->content;?></td>
        <td><?php echo zget($lang->wechat->message->typeList, $message->type);?></td>
        <td><?php echo $message->time;?></td>
        <td class='c-actions'>
          <?php if($message->type != 'unsubscribe' and $replyPriv) echo html::a(inlink('reply', "message={$message->id}"), "<i class='icon icon-reply'></i>", "class='btn btn-icon' data-toggle=modal");?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot><tr><td colspan='5'><?php $pager->show();?></td></tr></tfoot>
  </table>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
