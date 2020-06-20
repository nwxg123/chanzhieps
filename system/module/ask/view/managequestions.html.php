<?php
/**
 * The manage questions view file of ask module of CSM.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @author      Congzhi Chen <congzhi@cnezsoft.com>
 * @package     ask
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<?php include $app->getModuleRoot() . 'common/view/header.admin.html.php';?>
<?php js::set('method', 'managequestions');?>
<div class='main'>
  <div class='mainSidebar'>
    <div class='panel'>
      <div class='panel-heading'><strong><i class="icon-sitemap"></i> <?php echo $lang->question->category;?></strong></div>
      <div class='panel-body'>
        <?php if(isset($this->config->request->categoryRule) and $this->config->request->categoryRule == 'global'):?>
        <?php echo $categoryTree;?>
        <?php elseif(isset($this->config->request->categoryRule) and $this->config->request->categoryRule == 'byCategory'):?>
        <?php echo $this->loadModel('tree')->getTreeMenu('product', 0, array('exttreeModel', 'createAskLink'));?>
        <?php else:?>
        <div id='treeMenuBox'>
          <ul class='tree'>
            <?php foreach($categoryTree as $id => $name):?>
            <li><?php echo html::a(inlink('managequestions', "categoryID={$id}"), $name, ($id == $categoryID) ? "class='active'" : '');?></li>
            <?php endforeach;?>
          </ul>
        </div>
        <?php endif;?>
      </div>
    </div>
  </div>
  <div class='mainContent'>
    <section class='main-table'>
      <header class='clearfix'>
        <ul class='nav nav-tabs-main pull-left'>
          <?php foreach($lang->question->typeList as $typeName => $typeLabel):?>
          <?php if($typeName == 'myQuestion' or $typeName == 'myAnswer') continue;?>
          <?php $class = $typeName == $type ? "class='active'" : '';?>
          <li <?php echo $class;?>>
            <?php echo html::a(inlink('managequestions', "category=$categoryID&type=$typeName"), $typeLabel);?>
          </li>
          <?php endforeach;?>
        </ul>
      </header>
      <table class='table table-hover tablesorter table-fixed'>
        <thead>
          <tr class='text-center'>
            <th class='w-50px'><?php echo $lang->question->id;?></th>
            <th class='text-left'><?php echo $lang->question->title;?></th>
            <th class='w-80px'><?php echo $lang->question->account;?></th>
            <?php if(commonModel::isAvailable('score')):?>
            <th class='w-60px'><?php echo $lang->question->score;?></th>
            <?php endif;?>
            <th class='w-60px'><?php echo $lang->question->views;?></th>
            <th class='w-60px'><?php echo $lang->question->answers;?></th>
            <th class='w-70px'><?php echo $lang->question->status;?></th>
            <th class='w-100px'><?php echo $lang->question->addedDate;?></th>
            <th class="text-center actions w-40px"><?php echo $lang->delete;?></th>
            <th class="text-center actions w-10px"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($questions as $question):?>
          <tr class='text-center'>
            <td><?php echo $question->id;?></td>
            <td class='text-left text-ellipsis'><?php echo html::a(commonModel::createFrontLink('ask', 'view', "id=$question->id"), $question->title, "target='_blank'");?></td>
            <td><?php echo zget($users, $question->account);?></td>
            <?php if(commonModel::isAvailable('score')):?>
            <td><?php echo $question->score;?></td>
            <?php endif;?>
            <td><?php echo $question->views;?></td>
            <td><?php echo $question->answers;?></td>
            <td><?php echo "<span class='label-ask ask-{$question->status}'>" . $lang->question->statusList[$question->status] . '</span>';?></td>
            <td><?php echo substr($question->addedDate, 5, 11);?></td>
            <td class='c-actions'>
              <?php echo html::a(inlink('delete', "questionID=$question->id"), "<i class='icon icon-delete'></i>", "class='btn btn-icon deleter'");?>
            </td>
            <td class='c-actions'></td>
          </tr>
          <?php endforeach;?>
        </tbody>
        <tfoot><tr><td colspan='10'><?php $pager->show();?></td></tr></tfoot>
      </table>
    </section>
  </div>
</div>
<?php include $app->getModuleRoot() . 'common/view/footer.admin.html.php';?>
