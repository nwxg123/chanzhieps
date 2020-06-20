<?php
/**
 * The manage answers view file of ask module of CSM.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @author      Congzhi Chen <congzhi@cnezsoft.com>
 * @package     ask
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<?php include $app->getModuleRoot() . 'common/view/header.admin.html.php';?>
<?php js::set('method', 'manageanswers');?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <li data-type='internal' class='active'>
        <?php echo html::a(inlink('manageanswers'), $lang->ask->manageAnswers);?>
      </li>
    </ul>
  </header>
  <table class='table table-hover tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <th class='w-10px first'></th>
        <th class='w-60px'><?php echo $lang->question->id;?></th>
        <th class='text-left'><?php echo $lang->question->content;?></th>
        <th class='text-center actions w-40px'><?php echo $lang->delete;?></th>
        <th class='text-center actions w-10px'></th>
      </tr>
    </thead>
    <?php foreach($answers as $answer):?>
    <tr>
      <td></td>
      <td class='text-center'>
        <label for="account" class="no-margin"><?php echo $answer->id;?></label>
      </td>
      <td>
        <div>
          <?php echo sprintf($lang->question->lblAnswer, zget($users, $answer->account), $answer->addedDate, html::a(commonModel::createFrontLink('ask', 'view', "questionID=$answer->question"), '[' . $answer->questionTitle . ']', "target='_blank'"));?>
        </div>
        <div class='content'><?php echo $answer->content;?></div>
      </td>
      <td class='c-actions'>
        <?php echo html::a(inlink('deleteAnswer', "answerID=$answer->id"), "<i class='icon icon-delete'></i>", "class='deleter btn btn-icon'");?>
      </td>
      <td></td>
    </tr>
    <?php endforeach;?>
    <tr><td colspan='5'><?php $pager->show();?></td></tr>
  </table>
</section>
<?php include $app->getModuleRoot() . 'common/view/footer.admin.html.php';?>
