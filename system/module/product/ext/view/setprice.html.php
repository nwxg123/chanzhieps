<?php
/**
 * The price view file of product module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     product
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../../common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->product->setPrice . $product->name;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form'>
        <tr>
          <th class='w-100px'><?php echo $lang->product->price;?></th>
          <td><?php echo html::input('price', $product->price, "class='form-control'");?></td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->product->promotion;?></th>
          <td><?php echo html::input('promotion', $product->promotion, "class='form-control'");?></td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->product->scoreLimit;?></th>
          <td>
            <div class='input-group'>
              <span class='input-group-addon'><?php echo $this->config->product->currencySymbol;?></span>
              <?php echo html::input('scoreLimit', !empty($product->scoreLimit) ? $product->scoreLimit : 0, "class='form-control'");?>
            </div>
          </td>
          <td></td>
        </tr>
        <?php if(!empty($levels)):?>
        <?php $showName = true;?>
        <?php $is_first = true;?>
        <?php foreach($levels as $code => $level):?>
        <tr class='attribute'>
          <?php if($showName == true):?>
          <th rowspan="<?php echo count($levels)?>"><?php echo $lang->product->userLevel;?></th>
          <?php endif;?>
          <?php $placeholder = !$is_first ? $lang->product->placeholder->sameAsAbove : $lang->product->placeholder->adjustValue;?>
          <td class='w-200px text-center'><?php echo $level;?></td>
          <td>
            <div class='w-260px'>
            <div class='input-group'>
              <span class='input-group-addon'><?php echo $lang->product->adjustValue;?></span>
              <?php echo html::input('userlevel' . '[' . $code . ']', isset($prices['userlevel']["{$code}"]) ? $prices['userlevel']["{$code}"]->price : '', "class='form-control price-inputer' placeholder='{$placeholder}'");?>
            </div>
            </div>
          </td>
        </tr>
        <?php $showName = false;?>
        <?php $is_first = false;?>
        <?php endforeach;?>
        <?php endif;?>
        <tr class='attribute'>
          <th rowspan='4'><?php echo $lang->user->certify;?></th>
          <td><?php echo $lang->user->emailCertified;?></td>
          <td>
            <div class='w-260px'>
              <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->product->adjustValue;?></span>
                <?php echo html::input('certify[email]', isset($prices['certify']['email']) ? $prices['certify']['email']->price : '', "class='form-control price-inputer'");?>
              </div>
            </div>
          </td>
        </tr>
        <tr class='attribute'>
          <td><?php echo $lang->user->mobileCertified;?></td>
          <td>
            <div class='w-260px'>
              <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->product->adjustValue;?></span>
                <?php echo html::input('certify[mobile]', isset($prices['certify']['mobile']) ? $prices['certify']['mobile']->price : '', "class='form-control price-inputer'");?>
              </div>
            </div>
          </td>
        </tr>
        <tr class='attribute'>
          <td><?php echo $lang->user->realnameCertified;?></td>
          <td>
            <div class='w-260px'>
              <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->product->adjustValue;?></span>
                <?php echo html::input('certify[realname]', isset($prices['certify']['realname']) ? $prices['certify']['realname']->price : '', "class='form-control price-inputer'");?>
              </div>
            </div>
          </td>
        </tr>
        <tr class='attribute'>
          <td><?php echo $lang->user->companyCertified;?></td>
          <td>
            <div class='w-260px'>
              <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->product->adjustValue;?></span>
                <?php echo html::input('certify[company]', isset($prices['certify']['company']) ? $prices['certify']['company']->price : '', "class='form-control price-inputer'");?>
              </div>
            </div>
          </td>
        </tr>

        <?php foreach($attributes as $attribute):?>
        <tr><td> </td></tr>
        <?php if($attribute->inputType == 'input' or $attribute->values == '') continue;?>
        <?php $attribute->values = json_decode($attribute->values, true);?>
        <?php $showName = true;?>
        <?php foreach($attribute->values as $value):?>
        <?php $label = helper::safe64Encode($value);?>
        <?php $price = isset($prices[$attribute->code]) ? zget($prices[$attribute->code], $label, '') : '';?>
        <tr class='attribute'>
          <?php if($showName):?>
          <th rowspan="<?php echo count($attribute->values);?>"><?php echo $attribute->name;?></th>
          <?php endif;?>
          <td class='w-200px text-center'> <?php echo $value;?></td>
          <td>
            <div class='w-260px'>
            <div class='input-group'>
              <span class='input-group-addon'><?php echo $lang->product->adjustValue;?></span>
              <?php echo html::input($attribute->code . '[' . $label . ']', zget($price, 'price', ''), "class='form-control price-inputer' placeholder='{$lang->product->placeholder->adjustValue}'");?>
            </div>
            </div>
          </td>
        </tr>
        <?php $showName = false;?>
        <?php endforeach;?>
        <?php endforeach;?>
        <tr>
          <th></th>
          <td colspan='2'><?php echo html::submitButton();?></td>
        </tr>
      </table>
    </form>
    <div class='hide row-custom'>
      <div class='input-group'>
        <?php echo html::input('values[key]', '', "class='form-control'" )?>
        <span class='input-group-addon'><i class='icon-plus'></i></span>
        <span class='input-group-addon'><i class='icon-remove'></i></span>
      </div>
    </div>
  </div>
</div>
<style>
.table-form tr th:first-child{ text-align:center}
tr.attribute { border: 1px solid #ddd; text-align:center}
tr.attribute th:first-child{border: 1px solid #ddd; text-align:center}
tr.attribute td{ border: 1px solid #ddd; text-align:center; border-left:none; border-right:none;}
tr.attribute td:last-child{ border-right: 1px solid #ddd; }
tr.attribute.first{margin-top: 6px;}
</style>
<?php include '../../../common/view/footer.admin.html.php';?>
