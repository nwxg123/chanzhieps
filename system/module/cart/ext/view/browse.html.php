{*php 
/**
 * The cart view of cart module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     cart 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include TPL_ROOT . 'common/header.html.php'}
{!js::set('currencySymbol', $currencySymbol)}
{if(!empty($products))}
  {$total = 0}
  <div class='panel'>
    <div class='panel-heading'>
      <strong>{$lang->cart->browse}</strong>
    </div>
    <form action='{!helper::createLink('order', 'confirm')}' method='post'>
      <div class='panel-body'>
        <table class='table table-list'>
          <thead>
            <tr class='text-center'>
              <td colspan='2' class='text-left'>{$lang->order->productInfo}</td>
              <td>{$lang->product->attribute}</td>
              <td class='text-left'>{$lang->order->price}</td>
              <td>{$lang->order->count}</td>
              <td>{$lang->order->amount}</td>
              <td>{$lang->actions}</td>
            </tr>
          </thead>
          {foreach($products as $id => $product)}
            {$productLink = helper::createLink('product', 'view', "id=$product->product", "category={{$product->categories[$product->category]->alias}}&name=$product->alias")}
            <tr>
              <td class='w-100px'>
                {if(!empty($product->image))}
                {$title = $product->image->primary->title ? $product->image->primary->title : $product->name}
                {!html::a($productLink, html::image($control->loadModel('file')->printFileURL($product->image->primary, 'smallURL'), "title='{{$title}}' alt='{{$product->name}}'"), "class='media-wrapper'")}
                {/if}
              </td>
              <td class='text-left text-middle'>
                {!html::a($productLink, '<div class="" data-id="' . $product->product . '">' . $product->name . '</div>', "class='media-wrapper'")}
              </td>
              <td>
                {if(!empty($product->extra))}
                  {foreach($product->extra as $code => $value)}
                    {!echo zget($product->attributes, $code) . $lang->colon . $value}
                    {!html::hidden("extra[$id][$code]", $value)}
                  {/foreach}
                {/if}
              </td>
              <td class='w-100px text-middle'> 
                {if($product->promotion != 0)}
                  {$price = $product->promotion}
                  <div class='text-muted'><del>{!echo $currencySymbol . $product->price}</del></div>
                  <div class='text-price'>{!echo $currencySymbol . $product->promotion}</div>
                {else}
                  {$price  = $product->price}
                  <div class='text-price'>{!echo $currencySymbol . $product->price}</div>
                {/if}
                {!html::hidden("price[$id]", $price)}
                {$amount = $product->count * $price}
                {$total += $amount}
              </td>
              <td class='w-140px text-middle'>
                <div class='input-group'>
                  <span class='input-group-addon'><i class='icon icon-minus'></i></span>
                  {!html::input("count[$id]", $product->count, "class='form-control'")}
                  <span class='input-group-addon'><i class='icon icon-plus'></i></span>
                </div>
              </td>
              <td class='w-200px text-center text-middle'>
                <strong class='text-danger'>{$currencySymbol}</strong>
                <strong class='text-danger amountContainer'>{$amount}</strong>
              </td>
              <td class='text-middle text-center'>
                {!html::a(inlink('delete', "product={{$id}}"), $lang->delete, "class='deleter'")}
                {!html::hidden("product[$id]", $product->product)}
              </td>
            </tr>
          {/foreach}
        </table>
      </div>
      <div class='panel-footer text-right'>
        {!printf($lang->order->selectProducts, count($products))}
        {!printf($lang->order->totalToPay, $currencySymbol . $total)}
        {!html::submitButton($lang->cart->goAccount, 'btn-order-submit')}
      </div>
    </form>
  </div>
{else}
  <div class='panel'>
    <div class='panel-heading'>
      <strong>{$lang->cart->browse}</strong>
    </div>
    <div class='panel-body'>
      {$lang->cart->noProducts}
      {!html::a(helper::createLink('product', 'browse', 'category=0'), $lang->cart->pickProducts, "class='btn btn-xs btn-primary'")}
      {!html::a(helper::createLink('index', 'index'), $lang->cart->goHome, "class='btn btn-xs btn-default'")}
    </div>
  </div>
{/if}
{include TPL_ROOT . 'common/footer.html.php'}
