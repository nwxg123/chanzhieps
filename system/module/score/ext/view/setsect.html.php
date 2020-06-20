<?php
/**
 * The setsect view file of score module of chanzhiEPS.
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
<?php
$colorPlates = '';
foreach (explode('|', $lang->colorPlates) as $value)
{
    $colorPlates .= "<div class='color color-tile' data='#" . $value . "'><i class='icon-ok'></i></div>";
}
?>
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
  <form method='post' class='form-horizontal' id='ajaxForm' action="<?php echo $this->inlink('setSect');?>">
    <div class='panel-body' id='childList'>
      <div class='form-group'>
        <div class='col-xs-2 col-md-2 col-md-offset-1'>
          <strong><?php echo $lang->score->sectCode; ?></strong>
        </div>
        <div class='col-xs-6 col-md-3'>
          <strong><?php echo $lang->score->sectName; ?></strong>
        </div>
        <div class='col-xs-6 col-md-3'>
          <strong><?php echo $lang->score->sectColor; ?></strong>
        </div>
      </div>
      <?php if(isset($sects) and !empty($sects)):?>
      <?php foreach($sects as $sect):?>
      <div class='form-group'>
        <div class='col-xs-3 col-md-2 col-md-offset-1'>
          <input class='form-control hidden' type='text' name = 'sectCode[]' value = '<?php echo $sect->sectCode;?>'>
          <p class='levelCode'><?php echo $sect->sectCode;?></p>
        </div>
        <div class='col-xs-6 col-md-3'>
          <input class='form-control' type='text' name = 'sectName[]' value = '<?php echo $sect->sectName;?>'>
        </div>
        <div class='colorplate col-xs-6 col-md-3' data-id='color'>
          <div class='input-group active' data='<?php echo $sect->sectColor;?>'>
            <?php echo html::input('sectColor[]', $sect->sectColor, "class='form-control input-color text-latin' placeholder='" . $lang->colorTip . "'");?>
            <span class='input-group-btn'>
              <button type='button' class='btn dropdown-toggle' data-toggle='dropdown'>
                <i class='icon icon-question'></i>
                <span class='caret'></span>
              </button>
              <div class='dropdown-menu colors'>
                <?php echo $colorPlates; ?>
              </div>
            </span>
          </div>
        </div>
      </div>
      <?php endforeach;?>
      <?php endif;?>
      <div class='plus'>
      <?php $a = array(1,2,3,4,5)?>
      <?php for($i = 1; $i <= 5; $i++):?>
        <div class='form-group'>
          <div class='col-xs-3 col-md-2 col-md-offset-1'>
            <input class='form-control' type='text' name = 'sectCode[]' placeholder='<?php echo $this->lang->score->placeholder->code;?>' value = ''>
          </div>
          <div class='col-xs-6 col-md-3'>
            <input class='form-control' type='text' name = 'sectName[]' value = ''>
          </div>
          <div class='colorplate col-xs-6 col-md-3' data-id='color'>
            <div class='input-group active' data=''>
              <?php echo html::input('sectColor[]', '', "class='form-control input-color text-latin' placeholder='" . $lang->colorTip . "'");?>
              <span class='input-group-btn'>
                <button type='button' class='btn dropdown-toggle' data-toggle='dropdown'>
                  <i class='icon icon-question'></i>
                  <span class='caret'></span>
                </button>
                <div class='dropdown-menu colors'>
                  <?php echo $colorPlates; ?>
                </div>
              </span>
            </div>
          </div>
          <div class='col-xs-6 col-md-2'>
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
      <div class='col-md-offset-1'><?php echo $lang->score->sectTip;?></div>
    </div>
  </form>
</section>
<?php include '../../../common/view/footer.admin.html.php';?>
