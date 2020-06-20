<?php
/**
 * The setlevel view file of score module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     score
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../../common/view/header.admin.html.php';?>
<?php $isSectShow = commonModel::isAvailable('sect') && !empty($sectNames) ? true : false;?>
<section class='main-table'>
  <header class='clearfix'>
    <ul id='typeNav' class='nav nav-tabs-main pull-left'>
      <?php foreach($this->config->score->setCountsNav as $nav):?>
      <li data-type='internal' <?php echo $type == $nav ? "class='active'" : '';?>>
        <?php echo html::a(inlink($nav), $lang->score->$nav);?>
      </li>
      <?php endforeach;?>
    </ul>
  </header>
  <form method='post' class='form-horizontal' id='ajaxForm' action="<?php echo $this->inlink('setlevel');?>">
    <div class='panel-body' id='childList'>
      <div class='form-group'>
      <div class='<?php echo $isSectShow ? "col-md-1" : "col-xs-2 col-md-2 col-md-offset-1";?>'>
        <strong><?php echo $lang->score->code; ?></strong>
      </div>
      <div class='<?php echo $isSectShow ? "col-md-2" : "col-xs-6 col-md-3";?>'>
        <strong><?php echo $lang->score->level; ?></strong>
      </div>
      <?php if($isSectShow):?>
      <div class='col-xs-6 col-md-7'>
        <strong><?php echo $lang->score->sectLevel; ?></strong>
      </div>
      <?php endif;?> 
      <div class='<?php echo $isSectShow ? "col-md-2" : "col-xs-6 col-md-3";?>'>
        <strong><?php echo $lang->score->standard; ?></strong>
      </div>
    </div>
    <?php if(isset($rules) and !empty($rules)):?>
    <?php foreach($rules as $rule):?>
    <div class='form-group'>
      <div class='<?php echo $isSectShow ? "col-md-1" : "col-xs-3 col-md-2 col-md-offset-1";?>'>
        <input class='form-control hidden' type='text' name = 'code[]' value = '<?php echo $rule->code;?>'>
        <p class='levelCode'><?php echo $rule->code;?></p>
      </div>
      <div class='<?php echo $isSectShow ? "col-md-2" : "col-xs-6 col-md-3";?>'>
        <input class='form-control' type='text' name = 'level[]' value = '<?php echo $rule->level;?>'>
      </div>
      <?php if($isSectShow):?>
      <div class='col-xs-6 col-md-7'>
        <div class='input-group'>
          <?php foreach($sectNames as $sectCode => $sectName):?>
          <?php $name = $sectCode . '[]' ?>
          <span class="input-group-addon fix-border"><?php echo $sectName;?></span> 
          <input type="text" class="form-control" name= '<?php echo $name;?>' value='<?php echo is_array($sectLevels) ? zget($sectLevels[$sectCode], $rule->code, '') : '';?>'>
          <?php endforeach;?>
        </div>
      </div>
      <?php endif;?> 
      <div class='<?php echo $isSectShow ? "col-md-1" : "col-xs-6 col-md-3";?>'>
        <input class='form-control' type='text' name = 'score[]' value = '<?php echo $rule->score;?>'>
      </div>
    </div>
    <?php endforeach;?>
    <?php endif;?>
    <div class='plus'>
    <?php $a = array(1,2,3,4,5)?>
    <?php for($i = 1; $i <= 5; $i++):?>
      <div class='form-group'>
        <div class='<?php echo $isSectShow ? "col-md-1" : "col-xs-3 col-md-2 col-md-offset-1";?>'>
          <input class='form-control' type='text' name = 'code[]' placeholder='<?php echo $isSectShow ? '' : $this->lang->score->placeholder->code;?>' value = ''>
        </div>
        <div class='<?php echo $isSectShow ? "col-md-2" : "col-xs-6 col-md-3";?>'>
          <input class='form-control' type='text' name = 'level[]' value = ''>
        </div>
        <?php if($isSectShow):?>
        <div class='col-xs-6 col-md-7'>
          <div class='input-group'>
            <?php foreach($sectNames as $sectCode => $sectName):?>
            <?php $name = $sectCode . '[]' ?>
            <span class="input-group-addon fix-border"><?php echo $sectName;?></span> 
            <input type="text" class="form-control" name= '<?php echo $name;?>' value=''>
            <?php endforeach;?>
          </div>
        </div>
        <?php endif;?> 
        <div class='<?php echo $isSectShow ? "col-md-1" : "col-xs-6 col-md-3";?>'>
          <input class='form-control' type='text' name = 'score[]' value = ''>
        </div>
        <div class='<?php echo $isSectShow ? "col-md-1": "col-xs-6 col-md-2";?>'>
          <?php echo html::a('javascript:;', "<i class='icon-plus'></i>", "class='btn btn-link pull-left btn-mini btn-plus'");?>
        </div>
      </div>
      <?php endfor;?>
      </div>
      <div class='form-group btn-submit'>
        <div class='col-xs-8 col-md-offset-1'>
          <?php echo html::submitButton();?>
        </div>
      </div>
      <div class='col-md-offset-1'><?php echo $lang->score->tip;?></div>
    </div>
  </form>
</section>
<?php include '../../../common/view/footer.admin.html.php';?>
