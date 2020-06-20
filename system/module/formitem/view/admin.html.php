<?php
/**
 * The admin view file of formitem module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     formitem 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/chosen.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php css::import($jsRoot . 'uploader/min.css');?>
<section class='main-table'>
  <div id='profile'>
    <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <li class='active'><a href='#tabCommon' data-toggle='tab'><?php echo $lang->formitem->usual;?></a></li>
      <li><a href='#tabProfile' data-toggle='tab'><?php echo $lang->formitem->profile;?></a></li>
    </ul>
    </header>
    <div class='tab-content'>
      <div class='tab-pane active' id='tabCommon'>
        <?php foreach($lang->formitem->controlList as $control => $name):?>
        <?php if($type == 'vote' && strpos(',radio,checkbox,section,pager,', ",$control,") === false) continue;?>
        <?php commonModel::printLink('formitem', 'create', "formID=$form->id&type=$type&control=$control", "<i class='icon icon-plus'> </i>" . $name, "class='btn btn-primary'");?>
        <?php endforeach;?>
      </div>
      <div class='tab-pane' id='tabProfile'>
        <?php foreach($lang->formitem->typeList as $key => $name):?>
        <?php $icon = $config->formitem->iconList[$key];?>
        <?php commonModel::printLink('formitem', 'create', "formID=$form->id&type=$type&control=&order=&key=$key", "<i class='icon icon-$icon'> </i>" . $name, "class='btn btn-primary'");?>
        <?php endforeach;?>
      </div>
    </div>
  </div>
  <div class='panel-heading'>
    <strong><i class='icon-th-large'></i> <?php echo $lang->formitem->list;?></strong>
  </div>
  <div class='items'>
    <?php $index = 1;?>
    <?php $page  = 1;?>
    <?php foreach($items as $item):?>
    <div class='item' id='<?php echo $item->id;?>'>
      <div class='item-heading'>
        <div class='pull-right itemActions'>
          <?php if(commonModel::hasPriv('formitem', 'create')):?>
          <span class='dropdown'>
            <a href='javascript:;' data-toggle='dropdown' class='btn btn-icon' title='<?php echo $lang->formitem->insert;?>'><i class='icon icon-plus'></i></a>
            <ul class='dropdown-menu'>
              <?php foreach($lang->formitem->controlList as $control => $name):?>
              <?php if($type == 'vote' && strpos(',radio,checkbox,section,pager,', ",$control,") === false) continue;?>
              <?php $class = $control == 'pager' ? "class='creatPager'" : '';?>
              <li><?php echo html::a(inlink('create', "formID=$form->id&type=$type&control=$control&order=$item->order"), $name, $class);?></li>
              <?php endforeach;?>
            </ul>
          </span>
          <?php endif;?>
          <?php if(commonModel::hasPriv('formitem', 'sort')) echo html::a('javascript:;', "<i class='icon icon-move'></i>", "class='sort btn btn-icon' title='{$lang->formitem->sort}' data-form='$item->form' data-id='$item->id'");?>
          <?php if($item->control != 'pager') commonModel::printLink('formitem', 'edit', "formID=$item->form&itemID=$item->id&type=$type", "<i class='icon icon-edit'></i>", "class='btn btn-icon title='{$lang->edit}''");?>
          <?php commonModel::printLink('formitem', 'delete', "itemID=$item->id", "<i class='icon icon-delete'></i>", "class='deleter btn btn-icon' title='{$lang->delete}'");?>
        </div>
        <?php if($item->control == 'section'):?>
        <h1><?php if(!commonModel::printLink('formitem', 'edit', "formID=$item->form&itemID=$item->id&type=$type", $item->title)) echo $item->title;?></h1>
        <p><?php echo $item->desc;?></p>
        <?php elseif($item->control == 'pager'):?>
        <h4 class='text-center'><?php printf($lang->formitem->pager, $page++);?></h4>
        <?php else:?>
        <h4>
          <span class='order'><?php echo $index++;?></span>
          <?php if(isset($lang->formitem->typeList[$item->type])):?>
          <span class='label label-success' title='<?php printf($lang->formitem->tips->profile, zget($lang->formitem->typeList, $item->type));?>'><?php echo zget($lang->formitem->typeList, $item->type);?></span>
          <?php endif;?>
          <?php if(!commonModel::printLink('formitem', 'edit', "formID=$item->form&itemID=$item->id&type=$type", $item->title)) echo $item->title;?>
          <?php if(strpos(",$item->rule,", ',notempty,') !== false) echo "<span class='required'></span>";?>
        </h4>
        <?php endif;?>
      </div>
      <?php if($item->control != 'section' && $item->control != 'pager'):?>
      <div class='item-content'>
        <?php
        $name = 'item' . $item->id;
        switch($item->control)
        {
            case 'radio' : 
            case 'checkbox' : 
                $func = $item->control;
                if($item->optionType == 'text') echo html::$func($name, $item->options, '', "disabled='disabled'"); 
                if($item->optionType == 'image') $this->formitem->printOptionImages($item, $name, $disabled = true);
                break;
            case 'select' : echo "<div class='w-400px'>" . html::select($name, array('' => '') + $item->options, '', "class='form-control chosen' disabled='disabled'") . '</div>';
                break;
            case 'input' : echo "<div class='w-400px'>" . html::input($name, '', "class='form-control' disabled='disabled'") . '</div>';
                break;
            case 'date' : echo "<div class='w-400px'>" . html::input($name, '', "class='form-control form-{$item->format}' disabled='disabled'") . '</div>';
                break;
            case 'textarea' : echo html::textarea($name, '', "rows='3' class='form-control' disabled='disabled'");
                break;
        }
        ?>
      </div>
      <?php endif;?>
    </div>
    <?php endforeach;?>
  </div>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
