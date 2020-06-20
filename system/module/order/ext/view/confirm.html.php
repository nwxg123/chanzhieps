{*php
/**
 * The order view of order module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件授权
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include TPL_ROOT . 'common/header.html.php'}
{!js::set('currencySymbol', $currencySymbol)}
{!js::set('userScore', $userScore)}
{!js::set('checkStock', isset($config->product->stock) ? $config->product->stock : false)}
{if(!empty($products))}
  {$total = 0}
  <div class='panel'>
    <div class='panel-heading'><strong>{$lang->order->confirm}</strong></div>
    <form id='confirmForm' action='{!helper::createLink('order', 'create')}' method='post'>
      <div class='panel-body'>
        <div id='addressBox'>
          <div>
            <strong>{$lang->order->address}</strong>
            {!html::a(helper::createLink('address', 'create') . ' form', $lang->address->create, "class='createAddress'")}
            {!html::hidden("createAddress", '')}
          </div>
          <div id='addressList'></div>
          <div class='div-create-address hide'>
            <table class='table table-borderless address-form table-list'>
              <tr>
                <td class='w-100px'>{!html::input('contact', '', "class='form-control' placeholder='{{$lang->address->contact}}'")}</td>
                <td class='w-130px'>{!html::input('phone', '', "class='form-control' placeholder='{{$lang->address->phone}}'")}</td>
                <td>{!html::input('address', '', "class='form-control' placeholder='{{$lang->address->address}}'")}</td>
                <td class='w-100px'>{!html::input('zipcode', '', "class='form-control' placeholder='{{$lang->address->zipcode}}'")}</td>
                <td class='w-50px text-middle'><strong class='icon icon-remove' style='cursor:pointer'> </i></td>
              </tr>
            </table>
          </div>
        </div>
        <table class='table table-list'>
          <thead>
            <tr class='text-center'>
              <td colspan='2' class='text-left'><strong>{$lang->order->productInfo}</strong></td>
              <td class='text-left'>{$lang->order->price}</td>
              <td>{$lang->order->count}</td>
              <td>{$lang->order->amount}</td>
              <td>{$lang->actions}</td>
            </tr>
          </thead>
          {$scoreLimit = 0}
          {foreach($products as $id => $goods)}
            {$scoreLimit += $goods->count * $goods->scoreLimit}
            {$goodsLink = helper::createLink('product', 'view', "id=$goods->product", "category={{$goods->categories[$goods->category]->alias}}&name=$goods->alias")}
            <tr>
              <td class='w-100px'>
                {if(!empty($goods->image))} 
                  {$title = $goods->image->primary->title ? $goods->image->primary->title : $goods->name}
                  {!html::a($goodsLink, html::image($control->loadModel('file')->printFileURL($goods->image->primary, 'smallURL'), "title='{{$title}}' alt='{{$goods->name}}'"), "class='media-wrapper'")}
                {/if}
              </td>
              <td class='text-left text-middle'>
                {!html::a($goodsLink, '<div class="" data-id="' . $goods->product . '">' . $goods->name . '</div>', "class='media-wrapper'")}
                {if(!empty($goods->extra))}
                  {foreach($goods->extra as $code => $value)}
                    {!zget($goods->attributes, $code) . $lang->colon . $value}
                    {!html::hidden("extra[$id][$code]", $value)}
                  {/foreach}
                {/if}
              </td>
              <td class='w-100px text-middle'> 
                {if($goods->promotion != 0)}
                  {$price = $goods->promotion}
                  <div class='text-muted'><del>{!echo $currencySymbol . $goods->price}</del></div>
                  <div class='text-price'>{!echo $currencySymbol . $goods->promotion}</div>
                {else}
                  {$price  = $goods->price}
                  <div class='text-price'>{!echo $currencySymbol . $goods->price}</div>
                {/if}
                {!html::hidden("price[$id]", $price)}
                {!html::hidden("scoreLimit[$id]", $goods->scoreLimit * $config->score->counts->exchangeRatio)}
                {$amount = $goods->count * $price}
                {$total += $amount}
              </td>
              <td class='w-140px text-middle'>
                <div class='input-group'>
                  <span class='input-group-addon'><i class='icon icon-minus'></i></span>
                  {!html::input("count[$id]", $goods->count, "data-stock='{{$goods->amount}}' class='form-control'")}
                  <span class='input-group-addon'><i class='icon icon-plus'></i></span>
                </div>
              </td>
              <td class='w-200px text-center text-middle'>
                <strong class='text-danger'>{$currencySymbol}</strong>
                <strong class='text-danger amountContainer'>{$amount}</strong>
              </td>
              <td class='text-middle text-center'>
                {!html::a('javascript:;', $lang->delete, "class='goodsDeleter'")}
                {!html::hidden("product[$id]", $goods->product)}
              </td>
            </tr>
          {/foreach}
          <tr>
            <th class='text-left text-middle'>{$lang->order->note}</th>
            <td colspan='5'>{!html::textarea('note', '', "class='form-control' rows=1")}</td>
          </tr>
        </table>
      </div>
      <div class='panel-footer text-right'>
        {if($scoreLimit > 0)}
          <div class='text-right alert'>
            {!html::checkbox('useScore', $lang->order->useScore, '') }
            <br>
            <span class='scoreForm'>
              {$scoreLimit = $config->score->counts->exchangeRatio * $scoreLimit}
              {!printf($lang->order->placeholder->useScore, $scoreLimit, $userScore)}
              {$maxScore = min($scoreLimit, $userScore)}
              {!html::input('score', $maxScore , "max='{{$maxScore}}' class='w-40px' data-ratio='{{$config->score->counts->exchangeRatio}}'")}
              <strong class='text-danger'> {!echo '-' . min($scoreLimit, $userScore) / $config->score->counts->exchangeRatio}</strong>
            </span>
          </div>
        {/if}
        {!printf($lang->order->selectProducts, count($products))}
        {!printf($lang->order->totalToPay, $currencySymbol . $total)}
        {!html::submitButton($lang->order->submit, 'btn-order-submit')}
      </div>
    </form>
    <form class='hide' id='payForm' method='post' action="{!inlink('redirect')}" target='_blank'>
      {!html::hidden('payLink', '')}
      <input class='submitBtn' type='submit' value="{$lang->confirm}" />
    </form>
  </div>
{else}
  <div class='panel'>
    <div class='panel-heading'>
      <strong>{$lang->order->browse}</strong>
    </div>
    <div class='panel-body'>
      {$lang->order->noProducts}
      {!html::a(helper::createLink('product', 'browse'), $lang->order->pickProducts, "class='btn btn-xs btn-primary'")}
      {!html::a(helper::createLink('index', 'index'), $lang->order->goHome, "class='btn btn-xs btn-default'")}
    </div>
  </div>
{/if}
{include TPL_ROOT . 'common/footer.html.php'}
