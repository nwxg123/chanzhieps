<?php
/**
 * The edit view of tree module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     tree
 * @version     $Id: edit.html.php 824 2010-05-02 15:32:06Z wwccss $
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../admin';?>
<form method='post' class='form-horizontal' id='ajaxForm' action="<?php echo inlink('attribute', 'categoryID=' . $category->id);?>">
  <div class='panel'>
    <div class='panel-heading'>
      <strong><i class="icon-pencil"></i><?php echo $lang->category->setAttribute;?>
      <span class='text-info'><?php echo $category->name;?></span></strong>
    </div>
    <div id="formBox" class='panel-body'>
      <?php $key = 0; foreach($attributes as $attribute): ?>
      <div class='row form-group row-attribute'>
        <span><?php echo $lang->attribute->code;?></span>
        <?php echo html::input("label[{$key}]", $attribute->code, "class='form-control' placeholder='{$lang->product->placeholder->label}'" )?>
        <span><?php echo $lang->attribute->name;?></span>
        <?php echo html::input("value[{$key}]", $attribute->value, "class='form-control' placeholder='{$lang->product->placeholder->value}'" )?>
        <span><?php echo $lang->attribute->inputType;?></span>
        <?php if($mode == 'category'):?>
        <div class="col-xs-1">
          <input type="checkbox" value='1' <?php if($attribute->search) echo "checked";?> name="search[<?php echo $key;?>]"/> 
          <?php echo $lang->category->search?>
        </div>
        <?php endif;?>
        <div class="col-xs-2">
          <?php echo html::a('javascript:;', "<i class='icon-plus'></i>", "class='btn btn-link pull-left btn-mini btn-add'");?>
          <?php echo html::a('javascript:;', "<i class='icon-remove'></i>", "class='btn btn-link pull-left btn-mini btn-remove'");?>
        </div>
      </div>
      <?php $key ++; endforeach;?>
    </div>
    <div class='panel-footer'>
      <?php echo html::submitButton();?>
    </div>
  </div>
  <?php js::set('key', $key);?>
  <?php if(isset($pageJS)) js::execute($pageJS);?>
</form>
<div class='row-custom hide'>
  <div class='row form-group row-attribute'>
    <div class="col-xs-3"> <?php echo html::input('label[key]', '', "class='form-control' placeholder='{$lang->product->placeholder->label}'" )?></div>
    <div class="col-xs-6"> <?php echo html::input('value[key]', '', "class='form-control' placeholder='{$lang->product->placeholder->value}'" )?></div>
    <?php if($mode == 'category'):?>
    <div class="col-xs-1">
      <input type="checkbox" value='1' checked name="search[key]"/> 
      <?php echo $lang->category->search?>
    </div>
    <?php endif;?>
    <div class="col-xs-2">
      <?php echo html::a('javascript:;', "<i class='icon-plus'></i>", "class='btn btn-link pull-left btn-mini btn-add'");?>
      <?php echo html::a('javascript:;', "<i class='icon-remove'></i>", "class='btn btn-link pull-left btn-mini btn-remove'");?>
    </div>
  </div>
</div>

