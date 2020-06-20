{*php
/**
 * The view file of product for mobile template of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     product
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include TPL_ROOT . 'common/header.simple.html.php'}
{include TPL_ROOT . 'common/files.html.php'}

{if(!$product->isGift)}
  {$lang->product->toLogin = str_replace('%s', html::a(helper::createLink('user', 'login'), $lang->login), $lang->product->toLogin)}
  {if(commonModel::isAvailable('score'))}
    {$toLogin          = false}
    {$hasUserPrivilege = false}
    {$hasDiscount      = false}
    {if($control->app->user->account == 'guest')}
      {$privilege = $control->loadModel('product')->getUserPrivilege($product->id)}
      {$discount  = $control->product->getDiscount()}
      {if($privilege !== false or $discount !== false)} {$toLogin = true} {/if}
    {else}
      {$levelCode = $control->loadModel('user')->getUserLevel($control->app->user->account,'code')}
      {$privilege = $control->loadModel('product')->getUserPrivilege($product->id ,$levelCode)}
      {$discount  = $control->product->getDiscount($levelCode)}
      {if($privilege !== false)} {$hasUserPrivilege = true}
      {elseif($discount !== false)} {$hasDiscount = true}
      {/if}
    {/if}
  {/if}
{/if}

{if(isset($hasDiscount))} {!js::set('hasDiscount', $hasDiscount)} {/if}
{if(isset($discount))} {!js::set('discount', $discount)} {/if}

{* set categoryPath for topNav highlight. *}
{!js::set('path',  $product->path)}
{!js::set('categoryID', $category->id)}
{!js::set('categoryPath', explode(',', trim($category->path, ',')))}
{!js::set('addToCartSuccess', $lang->product->addToCartSuccess)}
{!js::set('gotoCart', $lang->product->gotoCart)}
{!js::set('goback', $lang->product->goback)}
{!js::set('location', helper::safe64Encode($canonicalURL))}
{!css::internal($product->css)}
{!js::execute($product->js)}

{$price = $control->product->computePrice($product)}
{!js::set('price', $price)}
{!js::set('currencySymbol', $control->config->product->currencySymbol)}
{noparse}
<style>
.price-label {display: inline-block; line-height: 20px; padding: 1px 5px; border: 1px solid #ccc; margin-right: 5px;}
.price-label.active {background-color: #ea644a; color: #fff; border-color: #ea644a}
.footer-right > .right-btn > .btncart {border:1px solid #6F9AFE;color:#6F9AFE;background-color:#fff}
.footer-right > .right-btn > #buyBtn {border:1px solid #6F9AFE;color:#fff;background:linear-gradient(to right,#709BFE,#1B5AFF)}
</style>
{/noparse}
<div class='block-region region-top blocks' data-region='product_view-top'>{$control->loadModel('block')->printRegion($layouts, 'product_view', 'top')}</div>
<div id='product' data-id='{$product->id}'>
<div class='appheader'>
{if(!empty($product->image->list))}
  {if(count($product->image->list) > 1)}
    <div id='productSlide' class='carousel slide' data-ride='carousel'>
      <div class='carousel-inner'>
        {$imgIndex = 0}
        {$indicators = ''}
        {foreach($product->image->list as $image)}
          <div class="item{if($imgIndex === 0)} {!echo ' active'} {/if}">
            {$image->objectType =  'product'}
            {!html::image($control->loadModel('file')->printFileURL($image, 'middleURL'), "title='{{$title}}' alt='{{$product->name}}'")}
          </div>
          {$indicators .= "<li data-target='#productSlide' data-slide-to='{{$imgIndex}}' class='" . ($imgIndex === 0 ? 'active' : '') . "'></li>"}
          {@$imgIndex++}
        {/foreach}
      </div>
      <ol class='carousel-indicators'>{$indicators}</ol>
      <a class='left carousel-control' href='#productSlide' data-slide='prev'>
        <i class='icon icon-chevron-left'></i>
      </a>
      <a class='right carousel-control' href='#productSlide' data-slide='next'>
        <i class='icon icon-chevron-right'></i>
      </a>
    </div>
  {else}
    {$product->image->primary->objectType = 'product'}
    {!html::image($control->loadModel('file')->printFileURL($product->image->primary, 'largeURL'), "title='{{$title}}' alt='{{$product->name}}'")}
  {/if}
{/if}
  <div class='heading'>
    <h2>{$product->name}</h2>
    {if(!$product->unsaleable)}
      <div id='priceBox' class='caption'>
      {if($product->promotion != 0)}
        {if(isset($toLogin) and $toLogin)}
          <strong class='text-danger'>{!echo $config->product->currencySymbol . $product->promotion}</strong>
        {else}
          {if(isset($hasUserPrivilege) and $hasUserPrivilege)}
            {$userPrice = $privilege + $product->promotion}
            <strong class='text-danger'>{!echo $config->product->currencySymbol . $userPrice}</strong>
          {elseif(isset($hasDiscount) and $hasDiscount)}
            {$userPrice = $product->promotion * $discount}
            <strong class='text-danger'>{!echo $config->product->currencySymbol . $userPrice}</strong>
          {else}
            <strong class='text-danger'>{!echo $config->product->currencySymbol . $product->promotion}</strong>
          {/if}
        {/if}
        {if($product->price != 0)}
          &nbsp;&nbsp;<small class='text-muted text-line-through'>{!echo $config->product->currencySymbol . $product->price}</small>
        {/if} 
      {elseif($product->price != 0)}
        {if(isset($toLogin) and $toLogin)}
          <strong class='text-danger'>{!echo $config->product->currencySymbol . $product->price}</strong>
        {else}
          {if(isset($hasUserPrivilege) and $hasUserPrivilege)}
            {$userPrice = $privilege + $product->price}
            <strong class='text-danger'>{!echo $config->product->currencySymbol . $userPrice}</strong>
          {elseif(isset($hasDiscount) and $hasDiscount)}
            {$userPrice = $product->price * $discount}
            <strong class='text-danger'>{!echo $config->product->currencySymbol . $userPrice}</strong>
          {else}
            <strong class='text-danger'>{!echo $config->product->currencySymbol . $product->price}</strong>
          {/if} 
          &nbsp;&nbsp;<small class='text-muted text-line-through'>{!echo $config->product->currencySymbol . $product->price}</small>
        {/if} 
      {/if} 
      {if(isset($toLogin) and $toLogin)} &nbsp;&nbsp;<small>{$lang->product->toLogin}</small> {/if}
      </div>
    {/if}
  </div>
</div>

{$attributeHtml = ''}
{if($product->amount)}
  {$attributeHtml .= "<tr><th>" . $lang->product->amount . "</th>"}
  {$attributeHtml .= "<td>" . $product->amount . " <small>" . $product->unit . "</small></td></tr>"}
{/if}
{if($product->brand)}
  {$attributeHtml .= "<tr><th>" . $lang->product->brand . "</th>"}
  {$attributeHtml .= "<td>" . $product->brand . " <small>" . $product->model . "</small></td></tr>"}
{/if}
{if(!$product->brand and $product->model)}
  {$attributeHtml .= "<tr><th>" . $lang->product->model . "</th>"}
  {$attributeHtml .= "<td>" . $product->model . "</td></tr>"}
{/if}
{if($product->color)}
  {$attributeHtml .= "<tr><th>" . $lang->product->color . "</th>"}
  {$attributeHtml .= "<td>" . $product->color . "</td></tr>"}
{/if}
{if($product->origin)}
  {$attributeHtml .= "<tr><th>" . $lang->product->origin . "</th>"}
  {$attributeHtml .= "<td>" . $product->origin . "</td></tr>"}
{/if}
{foreach($product->attributes as $attribute)}
  {if(empty($attribute->label) and empty($attribute->value))} {continue} {/if}
  {$attributeHtml .= "<tr><th>" . $attribute->label . "</th>"}

  {$http  = strpos($attribute->value, 'https') !== false ? 'https://' : 'http://'}
  {$attribute->value = str_replace($http, '', $attribute->value)}
  {$value = strpos($attribute->value, ':') !== false ? substr($attribute->value, 0, strpos($attribute->value, ':')) : $attribute->value}
  {if(preg_match('/^([a-z0-9\-]+\.)+[a-z0-9\-]+$/', $value))}
    {$attributeHtml .= "<td>" . html::a($http . $attribute->value, $attribute->value, "target='_blank'") . "</td></tr>"}
  {else}
    {$attributeHtml .= "<td>" . $attribute->value . "</td></tr>"}
  {/if}
{/foreach}
<hr class='space'>
<form id='buyForm' action="{!helper::createLink('order', 'confirm')}" method='post'>
<table class='table table-layout small'>
  <tbody>
    <div id='attribute'>
      {$control->product->printAttributes($product)}
    </div>
    {if(empty($attributeHtml))}
      <tr><td colspan='2' class='small'>{$product->desc}</td></tr>
    {else}
      {$attributeHtml}
    {/if}
    {if(!$product->unsaleable and commonModel::isAvailable('shop') and !$product->negotiate and !$product->mall)}
      {if(!$stockOpened or $product->amount > 0)}
      <tr>
        <th>{$lang->product->count}</th>
        <td>
          <div class='input-group input-group-sm input-number'>
            <div class='btn-update btn-minus'><i class='icon icon-minus'></i></div>
            <input type='number' class='btn-number text-center' value='1' id='count' name='count'>
            <div class='btn-update btn-plus'><i class='icon icon-plus'></i></div>
          </div>
        </td>
      </tr>
      {/if}
    {/if}
  </tbody>
</table>
{!html::hidden("price[$product->id]", $price)}
{!html::hidden("product[$product->id]", $product->id)}
{!html::hidden("count[$product->id]", 1, "class='count-input'")}
<hr class='space'>
<div class='panel panel-section'>
  <div class='panel-heading head-dividing hidden'><i class='icon-file-text-alt text-muted'></i>&nbsp;<strong>{$lang->product->content}</strong></div>
  <div class='panel-body'>
    <div class='article-content'>
      {$product->content}
    </div>
  </div>
  {if(!empty($product->files))} <section class='article-files'> {$control->loadModel('file')->printFiles($product->files)} </section> {/if}
</div>
</div>
<div class='block-region region-bottom blocks' data-region='product_view-bottom'>{$control->loadModel('block')->printRegion($layouts, 'product_view', 'bottom')}</div>
<footer class="appbar fix-bottom" id='footerNav' data-ve='navbar' data-type='mobile_bottom'>
  {if(commonModel::isAvailable('shop'))}
  <div class='footer-left'>
    {!html::a(helper::createLink('cart', 'browse', 'source=product'), html::image($config->webRoot . 'theme/mobile/product/cart.png') . "<span class='label badge red circle'>0</span>")}
  </div>
  {/if}
  <div class='footer-left'>
    {!html::a('#commentBox', html::image($config->webRoot . 'theme/mobile/product/comment.png'), "id='message'")}
  </div>
  <div class='footer-right'>
  {if(!$product->unsaleable and commonModel::isAvailable('shop') and !$product->negotiate and !$product->mall)}
    {if($stockOpened and $product->amount < 1)}
      <div class='right-btn'><button type='button' class='btn-soldout'>{$lang->product->soldout}</button></div>
    {else}
      <div class='right-btn left'><button type='button' class='btncart' data-url='{!$control->createLink('cart', 'add', "product={{$product->id}}&count=countParam")}'>{$lang->product->addToCart}</button></div>
      {if($control->app->user->account != 'guest')}
      <div class='right-btn'><button id='buyBtn' type='button' class='buy'>{$lang->product->buyNow}</button></div>
      {else}
      <div class='right-btn'><button id='buyBtn' type='button' class='login'>{$lang->product->buyNow}</button></div>
      {/if}
    {/if}
  {/if}
  {if(!$product->unsaleable and $product->mall and !$product->negotiate)}
    <div class='right-btn'><button type='button' class='btn-buy' data-url='{!$control->createLink('product', 'redirect', "id={{$product->id}}")}'>{$lang->product->buyNow}</button></div>
  {/if}
  </div>
</footer>
</form>
{if(commonModel::isAvailable('message'))}
<div id='comments'>
  <div id='commentBox'>
    {!echo $control->fetch('message', 'comment', "objectType=product&objectID={{$product->id}}")}
  </div>
  {!html::a('', '', "name='comment'")}
</div>
{/if}
{noparse}
<script>
$(function()
{
    var userLink = createLink('user', 'login');
    extra = {};

    $('.price-label').click(function()
    {
        hideAttrForm();
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');
        code = $(this).data('attribute');
        extra[code] = $(this).data('value');
        $(this).find('[type=hidden]').val($(this).data('value'));

        computedPrice();
    });

    $('.attr-selector').click(function()
    {
        code = $(this).data('attribute');
        $('.' + code + '-inputer').val($(this).data('value'));
    })

   $('#count').change(function()
   {
       $('.count-input').val($(this).val())
   });

    $('.btncart').click(function()
    {
        if(!checkAttr()) 
        {
            alertAttrForm();
            return false;
        }

        cartLink = $(this).data('url').replace('countParam', $('#count').val())
        $.post(cartLink, {extra: extra},
            function(response)
            {
                if(response.result == 'success')
                {
                    setCartCount();
                    $.messager.success(window.v.addToCartSuccess);
                }
                else
                {
                    location.href = response.locate;           
                }
            },
            'json'
        )
    });
    $('#buyBtn.login').click(function(){location.href=createLink('user', 'login', "referer=" + v.location)}); 
    $('#buyBtn.buy').click(function()
    {
        if(!checkAttr()) 
        {
            alertAttrForm();
            return false;
        }

        $('#buyForm').submit();
     });

    function alertAttrForm()
    {
        window.scrollTo(0,$('#attribute').offset().top-200)
        $('.attr-selector').parents('tr').css('border', '1px solid red');
    }
    function hideAttrForm() 
    {
        window.scrollTo(0,$('#attribute').offset().top-200)
        $('.attr-selector').parents('tr').css('border', 'none');
    }

    function computedPrice()
    {
        if(!checkAttr()) return false;
        price = v.price;

        $('.attr-selector.active').each(function()
        {
            if($(this).data('price') != 0)
            {
                value = $(this).data('price');
                price = parseFloat(price) + parseFloat(value);
            }
            price = parseFloat(price).toFixed(2);
        });
        if(v.hasDiscount)
        {
            price = price * v.discount;
            price = parseFloat(price).toFixed(2);
        }

        $('#priceBox .text-danger').html(v.currencySymbol + price);
        $('#price').val(price);
    }

    function checkAttr()
    {
        attrSelected = true;
        $('.attr-selector').each(function()
        {
            if($(this).parents('td').find('.attr-selector.active').size() == 0) attrSelected = false;
        });
        return attrSelected;
    }
    {/noparse}
});
</script>
{if(isset($pageJS))} {!js::execute($pageJS)} {/if}
