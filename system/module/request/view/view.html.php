<?php
/**
 * The view view of request module of XiRangCSM
 *
 * @copyright   Copyright 2009-2011 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Congzhi Chen<congzhi@cnezsoft.com>
 * @package     request
 * @version     $Id: buildform.html.php 1914 2011-06-24 10:11:25Z yidong@cnezsoft.com $
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.modal.html.php';?>
<table class='table table-form' align='center' id='requestCont'>
  <tr>
    <th class='w-80px'><?php echo $lang->request->product;?></th>
    <td><?php echo $request->productName?><span class="divider"></span></td>
  </tr>
  <tr>
    <th><?php echo $lang->request->category;?></th>
    <td><?php echo $request->categoryName?><span class="divider"></span></td>
  </tr>
  <tr>
    <th><?php echo $lang->request->status;?></th>
    <td><?php $status = $request->status == 'viewed' ? 'wait' : $request->status; echo $lang->request->statusList[$status]?><span class="divider"></span></td>
  </tr>
  <tr>
    <th><?php echo $lang->request->desc;?></th>
    <td class='text-middle'> <?php echo $request->desc;?> </td>
  </tr>
  <tr>
    <th><?php echo $lang->request->file;?></th>
    <td> <?php echo $this->fetch('file', 'printFiles', array('files' => $request->files, 'fieldset' => 'false'));?></td>
  </tr>
</table>
<div class='panel-heading'><strong><?php echo $lang->request->actionList;?></strong></div>
<div class='panel-body'>
  <ol id='historyItem'>
    <?php $i = 1; ?>
    <?php foreach($actions as $action):?>
    <li value='<?php echo $i ++;?>'>
      <?php
      if(isset($users[$action->actor])) $action->actor = $users[$action->actor];
      if(strpos($action->actor, ':') !== false) $action->actor = substr($action->actor, strpos($action->actor, ':') + 1);
      ?>
      <span><?php $this->action->printAction($action);?></span>
      <?php if(!empty($action->comment)):?>
      <div class='history'><?php echo nl2br($action->comment);?></div>
      <?php endif;?>
    </li>
    <?php endforeach;?>
  </ol>
</div>
<?php
js::set('viewType', $viewType);
js::set('run_mode', RUN_MODE);
?>
<?php include '../../common/view/footer.modal.html.php';?>
