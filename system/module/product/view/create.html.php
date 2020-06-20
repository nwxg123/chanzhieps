<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The create view file of product module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     product
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<?php js::set('key', 1);?>
<?php js::set('categoryID', $categoryID);?>
<?php $colorPlates = helper::getColorPlates($lang->colorPlates);?>
<section class='main-form'>
  <header>
    <ol class="breadcrumb">
      <li><?php commonModel::printLink('product', 'admin', '', $lang->product->common);?></li>
      <li class="active"> <?php echo $lang->product->create;?></li>
    </ol>
  </header>
  <form method='post' role='form' id='ajaxForm'>
    <table class='table table-form'>
      <tr><th></th><td class='w-p25'></td><td class='w-p25'></td><td class='w-p50'></td></tr>
      <tr>
        <th><?php echo $lang->product->name;?></th>
        <td colspan='2'>
          <div class='input-group'>
            <div class='input-control has-icon-right'>
              <div class='colorpicker input-control-icon-right'>
                <button type='button' class='btn btn-link dropdown-toggle' data-toggle='dropdown'><span class='cp-title'></span><span class='color-bar'></span><i class='ic'></i></button>
                <ul class='dropdown-menu clearfix'>
                  <li class='heading'><?php echo $lang->color;?><i class='icon icon-close'></i></li>
                </ul>
                <input type='hidden' class='colorpicker' id='titleColor' name='titleColor' value='' data-colors='<?php echo $colorPlates;?>' data-icon='palette' data-wrapper='input-control-icon-right' data-update-color='#name'  data-provide='colorpicker'>
              </div>
              <?php echo html::input('name', '', "class='form-control'");?>
            </div>
            <div class='table-col w-120px'>
              <div class='input-group'>
                <span class="input-group-addon fix-border"><?php echo $lang->product->order;?></span>
                <?php echo html::input('order', $order, "class='form-control'");?>
              </div>
            </div>
            <div class="input-group-addon w-70px">
              <div class="checkbox-primary">
                <input type="checkbox" name="unsaleable" value="1" id="unsaleable"><label for="unsaleable" class="no-margin"><?php echo $lang->product->unsaleable;?></label>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th><?php echo $lang->product->alias;?></th>
        <td colspan='2'>
          <div class="input-group">
            <span class="input-group-addon">http://<?php echo $this->server->http_host . $config->webRoot?>product/id_</span>
            <?php echo html::input('alias', '', "class='form-control' placeholder='{$lang->alias}'");?>
            <span class="input-group-addon">.html</span>
          </div>
        </td>
      </tr>
      <tr>
        <th><?php echo $lang->product->category;?></th>
        <td colspan='2'><?php echo html::select("categories[]", $categories, $categoryID, "multiple='multiple' class='form-control chosen'");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->product->mall;?></th>
        <td colspan='2'><?php echo html::input('mall', '', "class='form-control'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->product->keywords;?></th>
        <td colspan='2'><?php echo html::input('keywords', '', "class='form-control' placeholder='{$lang->keywordsHolder}'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->product->attribute?></th>
        <td colspan='2'>
          <div class="row form-group">
            <div class='col-sm-6 col-md-6'>
              <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->product->brand;?></span>
                <?php echo html::input('brand', '', "class='form-control'");?>
              </div>
            </div>
            <div class='col-sm-6 col-md-6'>
              <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->product->model;?></span>
                <?php echo html::input('model', '', "class='form-control'");?>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th rowspan='3'></th>
        <td colspan='2'>
          <div class="row form-group">
            <div class='col-sm-6 col-md-6'>
              <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->product->color;?></span>
                <?php echo html::input('color', '', "class='form-control'");?>
              </div>
            </div>
            <div class='col-sm-6 col-md-6'>
              <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->product->amount;?></span>
                <?php echo html::input('amount', '', "class='form-control'");?>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan='2'>
          <div class="row form-group">
            <div class='col-sm-6 col-md-6'>
              <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->product->origin;?></span>
                <?php echo html::input('origin', '', "class='form-control'");?>
              </div>
            </div>
            <div class='col-sm-6 col-md-6'>
              <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->product->unit;?></span>
                <?php echo html::input('unit', '', "class='form-control'");?>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan='2'>
          <div class="row form-group">
            <div class='col-sm-6 col-md-6'>
              <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->product->price;?></span>
                <?php echo html::input('price', '', "class='form-control'");?>
                <span class='input-group-addon'>
                  <div class='checkbox-primary'>
                    <input type='checkbox' name='negotiate' id='negotiate' value='1' />
                    <label><?php echo $lang->product->negotiate;?></label>
                  </div>
                </span>
              </div>
            </div>
            <div class='col-sm-6 col-md-6'>
              <div class='input-group'>
                <span class='input-group-addon'><?php echo $lang->product->promotion;?></span>
                <?php echo html::input('promotion', '', "class='form-control'");?>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th><?php echo $lang->product->custom;?></th>
        <td colspan='2'>
          <div class='row form-group'>
            <div class="col-xs-6"> <?php echo html::input('label[0]', '', "class='form-control' placeholder='{$lang->product->placeholder->label}'" )?></div>
            <div class="col-xs-6">
              <div class='input-group'>
                <?php echo html::input('value[0]', '', "class='form-control' placeholder='{$lang->product->placeholder->value}'" )?>
                <?php echo html::a('javascript:;', "<i class='color-gray icon-plus-sign'></i>", "class='btn-add input-group-addon'");?>
                <?php echo html::a('javascript:;', "<i class='color-gray icon-minus-sign'></i>", "class='btn-remove input-group-addon'");?>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th><?php echo $lang->product->desc;?></th>
        <td colspan='3'><?php echo html::textarea('desc', '', "rows='10' class='form-control'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->product->content;?></th>
        <td colspan='3'><?php echo html::textarea('content', '', "rows='20' class='form-control'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->product->stockRemind;?></th>
        <?php $stockWarning = isset($config->product->stockWarning) ? $config->product->stockWarning : 10;?>
        <td colspan='3' class='stock-warning'><?php echo sprintf($lang->product->stockWarning, html::input('stockWarning', $stockWarning, "class='form-control text-center'"))?></td>
      </tr>
      <tr>
        <td></td>
        <td colspan='3' class='text-left'>
            <?php echo html::submitButton();?>
            <?php echo html::backButton();?>
        </td>
      </tr>
    </table>
  </form>
  <div class='hide row-custom'>
    <div class='row form-group'>
      <div class="col-xs-6"> <?php echo html::input('label[key]', '', "class='form-control' placeholder='{$lang->product->placeholder->label}'" )?></div>
      <div class="col-xs-6"> 
        <div class='input-group'>
          <?php echo html::input('value[key]', '', "class='form-control' placeholder='{$lang->product->placeholder->value}'" )?>
          <?php echo html::a('javascript:;', "<i class='color-gray icon-plus-sign'></i>", "class='btn-add input-group-addon'");?>
          <?php echo html::a('javascript:;', "<i class='color-gray icon-minus-sign'></i>", "class='btn-remove input-group-addon'");?>
        </div>
    </div>
  </div>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
