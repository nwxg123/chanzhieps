<?php
/**
 * The setdiscount  view file of product module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     mall
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../../common/view/header.admin.html.php';?>
<?php if(commonModel::isAvailable('score')):?>
<?php if(!empty($rules)):?>
<section class='main-table'>
  <form method='post' class='form-horizontal' id='ajaxForm' action="<?php echo $this->inlink('setDiscount');?>">
    <div class='panel-body'>
      <table class='table table-form'>
      <?php if(!empty($rules)):?>
      <?php 
        $holder   = "placeholder='" . $lang->product->placeholder->sameAsAbove . "'";
        $is_first = true;
      ?>
      <?php foreach($rules as $code => $level):?>
        <?php $placeholder = $is_first ? '' : "placeholder='" . $lang->product->placeholder->sameAsAbove . "'";?>
        <?php if(strpos('realnameCertified,companyCertified,mobileCertified,emailCertified', $code) !== false) $placeholder = '';?>
        <tr>
          <th class='w-70px'><?php echo $level;?></th> 
          <td class='w-250px'><?php echo html::input('discount[]', isset($this->config->product->discount->{$code}) ? $this->config->product->discount->{$code} * 100 : '', "class='form-control' $placeholder");?></td>
          <td class='percent'><?php echo $lang->percent;?></td>
          <td><?php echo html::hidden('code[]', $code);?></td>
        </tr>
        <?php $is_first = false;?>
      <?php endforeach;?>
      <?php endif;?>
      <tr>
        <th></th>
        <td colspan='2'><?php echo html::submitButton();?></td>
      </tr>
    </table>
    <p class='tip'><?php echo $lang->product->discountTip;?></p>
    </div>
  </form>
</section>
<?php else:?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo $lang->product->setDiscount; ?></strong>
  </div>
  <div class='panel-body'>
    <?php echo sprintf($lang->product->levelRequire, html::a(helper::createLink('score', 'setlevel'), $lang->product->setLevel));?>
  </div>
</div>
<?php endif;?>
<?php else:?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo $lang->product->setDiscount; ?></strong>
  </div>
  <div class='panel-body'>
    <?php echo $lang->product->discountRequire;?>
  </div>
</div>
<?php endif;?>
<?php include '../../../common/view/footer.admin.html.php';?>
