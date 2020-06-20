<?php
/**
 * The create view of faq module of XiRangCSM
 *
 * @copyright   Copyright 2009-2011 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Congzhi Chen<congzhi@cnezsoft.com>
 * @package     faq
 * @version     $Id: buildform.html.php 1914 2011-06-24 10:11:25Z yidong@cnezsoft.com $
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.modal.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<?php include '../../common/view/chosen.html.php';?>
<form method='post' action='<?php echo inlink('create', "objectID={$objectID}");?>' id='ajaxForm'>
  <table class='table table-form w-p100'>
    <?php if($this->config->request->categoryRule == 'byProduct'):?>
    <tr>
      <th class='w-80px'><?php echo $lang->faq->product;?></th>
      <td><?php echo html::select('product', $products, $objectID, "class='form-control select-menu'");?></td>
    </tr>
    <?php endif;?>
    <?php if($this->config->request->categoryRule == 'byCategory'):?>
    <tr>
      <th class='w-80px'><?php echo $lang->faq->productCategory;?></th>
      <td><?php echo html::select('productCategory', $productCategories, $objectID, "class='form-control select-menu'");?></td>
    </tr>
    <?php endif;?>
    <?php if($this->config->request->categoryRule == 'global'):?>
    <tr>
      <th class='w-80px'><?php echo $lang->faq->category;?></th>
      <td><?php echo html::select('categories[]', $categories, $objectID, "class='form-control chosen' multiple");?></td>
    </tr>
    <?php endif;?>
    <tr>
      <th><?php echo $lang->faq->request;?></th>
      <td><?php echo html::input('request', '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->faq->answer;?></th>
      <td><?php echo html::textarea('answer', '', "class='form-control' rows=10");?></td>
    </tr>
    <tr><td></td> <td><?php echo html::submitButton();?></td></tr>
  </table>
</form>
<?php include '../../common/view/footer.modal.html.php';?>
