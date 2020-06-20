{*php
/**
 * The browse view file of product for mobile template of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV12 (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     product
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include TPL_ROOT . 'common/header.html.php'}
{noparse}
<style>
.icon-filter:before {content: '\e6a1';}
.icon-remove-sign:before {content: '\e652';}
#pageHeader {padding-top: 0; padding-bottom: 0;}
#filters {margin-top: -1px;}
.attrs {padding: 7px 5px 0 5px; margin-bottom: 10px;}
.attr {display: table;}
.attr-key, .attr-value {display: table-cell; padding: 3px 5px;}
.attr-key {width: 40px; text-align: right; font-size: 12px; color: #808080;}
.attr-value > a {display: inline-block; border: 1px solid #ddd; padding: 0 6px;margin-bottom:4px; border-radius: 11px; color: #666; font-size: 12px; line-height: 20px;margin-left: 5px;}
.attr-value > a.active {color: #fff; border-color: #fff;}
.panel > .panel-heading > strong {line-height:38px}
</style>
{/noparse}
<script>{!echo "place" . md5(time()) . "='" . $config->idListPlaceHolder . '' . $config->idListPlaceHolder . "'";}</script>
{!js::set('pageLayout', $control->block->getLayoutScope('product_browse', $category->id))}
<div class='block-region region-top blocks' data-region='product_browse-top'>{$control->loadModel('block')->printRegion($layouts, 'product_browse', 'top')}</div>
<div class='panel panel-section'>
  <div class='panel-heading' id='pageHeader'>
    <strong>{$category->name}</strong>
    {if(!empty($config->product->searchbox))}
    <div class='actions'>
      <a href='javascript:;' class='btn text-primary' id='filtersToggleBtn'><i class='icon icon-filter'></i> {$lang->product->filter}</a>
    </div>
    {/if}
  </div>
  {if(!empty($config->product->searchbox))}
    <div id='filters' class='attrs bg-gray-pale' style='display: none'>
      {if(!empty($children))}
        <div class='attr'>
          <div class='attr-key'>{$lang->product->category}</div>
          <div class='attr-value'>
            {foreach($children as $child)}
              {!html::a(inlink('browse', "category={{$child->id}}&pageID=1&param=" . helper::safe64Encode(json_encode($params))), $child->name)}
            {/foreach}
          </div>
        </div>
      {/if}
      {if(!empty($attributes))}
        {foreach($attributes as $attribute)}
          {$options = json_decode($attribute->values)}
          {$newParams = $params}
          <div class='attr'>
            <div class='attr-key'>{$attribute->name}</div>
            <div class='attr-value'>
              {foreach($options as $value)}
                {$active = (zget($params, $attribute->code, '') == $value) ? "class='active bg-primary'" : ''}
                {$newParams[$attribute->code] = urlencode($value)}
                {$query = http_build_query($newParams)}
                {if($config->requestType == 'GET')} {!html::a(inlink('browse', "category={{$category->id}}&pageID=1&{{$query}}"), $value, $active)} {/if}
                {if($config->requestType != 'GET')} {!html::a(inlink('browse', "category={{$category->id}}&pageID=1") . "?{{$query}}", $value, $active)} {/if}
              {/foreach}
            </div>
          </div>
        {/foreach}
      {/if}
      <div class='text-center'><a class='btn block' href='{$mobileURL}'><i class="icon icon-remove-sign"></i> {$lang->product->clearFilter}</a></div>
    </div>
  {/if}
  <div class='panel-body'>
    {$count = count($products)}
    {if($count == 0)} {$count = 1} {/if}
    {$recPerRow = min($count, 2)}
    {@$percent  = 100/$recPerRow}
    <div class='cards cards-products' data-cols='{$recPerRow}' id='products'>
      <style>.col-custom-{$recPerRow} {width: {$percent}%}</style>
      {$index = 0}
      {foreach($products as $product)}
        {$rowIndex = $index % $recPerRow}
        {if($rowIndex === 0)}
          <div class='row'>
        {/if}

        <div class='col col-custom-{$recPerRow}'>
          {$url = helper::createLink('product', 'view', "id=$product->id", "category={{$product->category->alias}}&name=$product->alias")}
          <div class='card' id='product{$product->id}' data-ve='product'>
            <a class='card-img-fixed' href='{$url}'>
              {if(empty($product->image))}
                {$imgColor = $product->id * 57 % 360}
                <div class='media-placeholder' style='background-color: hsl({$imgColor}, 60%, 80%); color: hsl({$imgColor}, 80%, 30%);' data-id='{$product->id}'>{$product->name}</div>
              {else}
                {$product->image->primary->objectType = 'product'}
                {$imgsrc = $control->loadModel('file')->printFileURL($product->image->primary, 'middleURL')}
                <img alt='{$product->name}' title='{$product->name}' src='{$imgsrc}'>
              {/if}
            </a>
            <div class='card-content'>
              <div class='card-title'>
                <a href='{$url}' style='color:{$product->titleColor}'>{$product->name}</a>
              </div>
              {if(!$product->unsaleable)}
                {if($product->negotiate)}
                  <div class='card-price'><strong class='text-danger'>{$lang->product->negotiate}</strong></div>'
                {else}
                  {if($product->promotion != 0)}
                    <div class='card-price'><strong class='text-danger'>{$control->config->product->currencySymbol}{$product->promotion}</strong>
                      {if($product->price != 0)}
                      <small class='text-muted text-line-through'>{$control->config->product->currencySymbol}{$product->price}</small>
                      {/if}
                    </div>
                  {elseif($product->price != 0)}
                    <div class='card-price'><strong class='text-danger'>{$control->config->product->currencySymbol}{$product->price}</strong></div>
                  {/if}
                {/if}
              {/if}
            </div>
          </div>
        </div>
        {if($recPerRow === 1 || $rowIndex === ($recPerRow - 1))}
        </div>
        {/if}
        {@$index++}
      {/foreach}
    </div>
  </div>
  <div class='panel-footer'>{$pager->createPullUpJS('#products', $lang->mobile->pullUpHint)}</div>
</div>
<div class='block-region region-bottom blocks' data-region='product_browse-bottom'>{$control->loadModel('block')->printRegion($layouts, 'product_browse', 'bottom')}</div>
{noparse}
<script>
$(function()
{
    var $filters = $('#filters');
    var showFilter = function()
    {
        $filters.addClass('show');
    };
    var hideFilter = function()
    {
        $filters.removeClass('show');
    };
    var toggleFileter = function()
    {
        if($filters.hasClass('show')) hideFilter();
        else showFilter();
    }
    $('#filtersToggleBtn').on('click', toggleFileter);
    if($filters.find('.attr-value > a.active').length) showFilter();
}
);
</script>
{/noparse}
{include TPL_ROOT . 'common/footer.html.php'}
