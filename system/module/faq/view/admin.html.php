<?php
/**
 * The manage view of faq module of XiRangCSM
 *
 * @copyright   Copyright 2009-2011 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Congzhi Chen<congzhi@cnezsoft.com>
 * @package     faq
 * @version     $Id: buildform.html.php 1914 2011-06-24 10:11:25Z yidong@cnezsoft.com $
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php js::set('id', $objectID);?>
<div class='main'>
  <div class='mainSidebar'>
    <div class='panel'>
      <div class='panel-heading'><strong><i class="icon-sitemap"></i> <?php echo $lang->faq->category;?></strong></div>
      <div class='panel-body'>
        <?php if(isset($this->config->request->categoryRule) and $this->config->request->categoryRule == 'global'):?>
        <?php echo $categories;?>
        <?php elseif(isset($this->config->request->categoryRule) and $this->config->request->categoryRule == 'byCategory'):?>
        <?php echo $this->loadModel('tree')->getTreeMenu('product', 0, array('exttreeModel', 'createFaqLink'));?>
        <?php else:?>
        <div id='treeMenuBox'>
          <ul class='tree tree-lines' data-type='product'>
            <?php foreach($categories as $id => $name):?>
            <li><?php echo html::a(inlink('admin', "mode={$this->config->request->categoryRule}&objectID=$id"), $name, ($id == $objectID) ? "class='active'" : '');?></li>
            <?php endforeach;?>
          </ul>
        </div>
        <?php endif;?>
      </div>
    </div>
  </div>
  <div class='mainContent' id='categoryBox'>
    <div class='panel'>
      <div class='panel-heading'>
        <div class='panel-actions'><?php echo html::a(inlink('create', "objectID=$objectID"), $lang->faq->create, "class='btn btn-primary' data-toggle='modal'");?></div>
      </div>
      <table class='table table-form'>
        <tr>
          <td>
            <div id='top'>
              <h2><?php echo $lang->faq->catalog;?></h2>
              [ <a id='toggleToc' href='#' onclick='toggleToc()'><span><?php echo $lang->hide;?></span></a> ]
            </div>
            <ol class='faqList'>
              <?php foreach($faqs as $id => $faq):?>
              <li><a href='<?php echo "#faq$id";?>' data-id="<?php echo $faq->id;?>"><?php echo $faq->request;?></a></li>
              <?php endforeach;?>
            </ol>
          </td>
        </tr>
      </table>  
      <table class='table table-form'>
        <?php foreach($faqs as $id => $faq):?>
        <tr>
          <td class='w-10px'></td>
          <td><?php echo "<strong id ='faq$id'>$faq->request</strong>";?></td>
          <td class='w-150px'></td>
        </tr>
        <tr>  
          <td></td>
          <td><?php echo $faq->answer;?></td>
          <td>
            <?php 
            echo $lang->faq->views . $faq->views ." ";
            echo html::a($this->inLink('edit', "FAQID=$faq->id"), $lang->edit, "data-toggle='modal'");
            echo html::a($this->inLink('delete', "FAQID=$faq->id"), $lang->delete, "class='deleter'");
            ?>
          </td>
        </tr>
        <tr>
          <td></td>
          <td colspan='2'><hr /></td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
