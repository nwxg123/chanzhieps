<?php
/**
 * The create view file of attribute module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     attribute
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/chosen.html.php';?>
<?php js::set('key', 1);?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->attribute->create;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form'>
        <tr>
          <th class='w-100px'><?php echo $lang->attribute->category;?></th>
          <td class='w-p40'><?php echo html::select("category", $categories, $categoryID, "class='form-control chosen'");?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->attribute->common;?></th>
          <td colspan='2'>
            <div class="input-group">
              <span class="input-group-addon"><?php echo $lang->attribute->code;?></span>
              <?php echo html::input('code', '', "class='form-control'");?>
              <span class="input-group-addon fix-border"><?php echo $lang->attribute->name;?></span>
              <?php echo html::input('name', '', "class='form-control'");?>
              <span class="input-group-addon fix-border"><?php echo $lang->attribute->sort;?></span>
              <?php echo html::input('sort', '', "class='form-control'");?>
              <span class="input-group-addon">
                <input type='checkbox' name='search' id='search' value='1' />
                <span><?php echo $lang->attribute->search;?></span>
              </span>
            </div>
          </td>
        </tr>
        <tr>
          <th class='w-100px'><?php echo $lang->attribute->inputType;?></th>
          <td class='w-p40'><?php echo html::radio("inputType", $lang->attribute->inputTypeList, '', "class='checkbox'");?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->attribute->values;?></th>
          <td class='value-group'>
            <div class='input-group'>
              <?php echo html::input('values[0]', '', "class='form-control'" )?>
              <span class='input-group-addon btn-plus'><i class='icon-plus'></i></span>
              <span class='input-group-addon btn-remove'><i class='icon-remove'></i></span>
            </div>
          </td>
        </tr>
        <tr>
          <th class='w-100px'><?php echo $lang->attribute->default;?></th>
          <td class='w-p40'><?php echo html::input("default", '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th></th>
          <td colspan='2'>
            <?php echo html::submitButton();?>
            <?php echo html::backButton();?>
          </td>
        </tr>
      </table>
    </form>
    <div class='hide row-custom'>
      <div class='input-group'>
        <?php echo html::input('values[key]', '', "class='form-control'" )?>
        <span class='input-group-addon btn-plus'><i class='icon-plus'></i></span>
        <span class='input-group-addon btn-remove'><i class='icon-remove'></i></span>
      </div>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
