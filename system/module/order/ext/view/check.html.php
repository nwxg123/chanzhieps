{*php
/**
 * The check view of order module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include TPL_ROOT . 'common/header.html.php'}
{!js::set('goToPay', $lang->order->goToPay)}
{!js::set('paid', $lang->order->paid)}
{!js::set('balance', $balance)}
{!js::set('amount', $order->amount)}
{!js::set('currencySymbol', $currencySymbol)}
<div class='panel'>
  <div class='panel-heading'><strong>{$lang->order->selectPayment}</strong></div>
  <form id='checkForm' action='{!helper::createLink('order', 'pay', "orderID=$order->id")}' method='post' target='_blank'>
    <div class='panel-body'>
      <div id='products'>
        <table class='table table-list'>
          <thead>
            <tr class='text-center'>
              <td class='text-left'><strong>{$lang->order->productInfo}</strong></td>
              <td>{$lang->order->count}</td>
              <td>{$lang->order->amount}</td>
            </tr>
          </thead>
          {foreach($products as $productID => $product)}
            {$extra = json_decode($product->extra)}
            <tr>
              <td class='text-left text-middle'>
                {$product->productName}
                {if(!empty($extra))}
                  {foreach($extra as $code => $value)}
                    {$value} &nbsp;
                  {/foreach}
                {/if}
              </td>
              <td class='w-140px text-middle text-center'>
                <div class='text-count'>{$product->count}</div>
              </td>
              <td class='w-100px text-middle text-danger'> 
                <div class='text-price'>{!echo $currencySymbol . number_format($product->price * $product->count, 2)}</div>
              </td>
            </tr>
          {/foreach}
        </table>
      </div>
      <div id='paymentBox'>
        <h5>{$lang->order->payment}</h5>
        <dl> <dd id='payment'>{!html::radio('payment', $paymentList)}</dd> </dl>
      </div>
    </div>
    <div class='panel-footer text-right'>
      <p>{!printf($lang->order->totalToPay, $currencySymbol . $order->amount)}<p>
      <p class='text-right'>
        {if($balance && strpos($config->shop->payment, 'balance') !== false)} {!html::checkbox('balance', array(1 => sprintf($lang->order->placeholder->useBalance, $currencySymbol . $balance)), 1)} {/if}
      </p>
      <p>{!printf($lang->order->needToPay, $currencySymbol . $order->amount)}</p>
      {!html::submitButton($lang->order->settlement, 'btn-order-submit')}
    </div>
  </form>
  <form class='hide' id='payForm' method='post' action="{!inlink('redirect')}" target='_blank'>
    {!html::hidden('payLink', '')}
    <input class='submitBtn' type='submit' value="{$lang->confirm}" />
  </form>
</div>
{include TPL_ROOT . 'common/footer.html.php'}
