{*php
/**
 * The check view of order module for mobile of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include TPL_ROOT . 'common/header.simple.html.php'}
{!js::set('goToPay', $lang->order->goToPay)}
{!js::set('paid', $lang->order->paid)}
{!js::set('balance', $balance)}
{!js::set('amount', $order->amount)}
{!js::set('currencySymbol', $currencySymbol)}
<div class='panel panel-section'>
  <form id='checkForm' action='{!helper::createLink('order', 'pay', "orderID=$order->id")}' method='post' target='_blank'>
    <div class="panel-body">
      <div class='bg-gray-pale'><strong>{$lang->order->payment}</strong></div>
      <div class="form-group">
        <div class='checkarea'>
          {!html::radio('payment', $paymentList)}
        </div>
      </div>
      {if($inWechat)}<div class='alert bg-primary-pale'>{$lang->order->inWechatTip}</div>{/if}
    </div>
    
    <div class='panel-body'>
      <div class='alert bg-primary-pale'>
        {!printf($lang->order->selectProducts, count($products))}
        {!printf($lang->order->totalToPay, $currencySymbol . $order->amount)}
      </div>
    </div>
    <div class='panel-footer text-right'>
      <p class='text-right'>
        {if($balance && strpos($config->shop->payment, 'balance') !== false)} {!html::checkbox('balance', array(1 => sprintf($lang->order->placeholder->useBalance, $currencySymbol . $balance)), 1)} {/if}
      </p>
      <p>{!printf($lang->order->needToPay, $currencySymbol . $order->amount)}</p>
    </div>
    <footer class="appbar fix-bottom" id='footer' data-ve='navbar' data-type='mobile_bottom'>
      <div class='footer-right'>
        <div class='right-btn'>
          {!html::submitButton($lang->order->settlement, 'btn-order-submit btn danger')}
        </div>
        <div class='right-btn'>
          {!html::a(helper::createLink('order', 'browse'), $lang->order->admin, "class='btn-order-manage btn'")}
        </div>
      </div>
    </footer>
  </form>
</div>
{include TPL_ROOT . 'common/form.html.php'}
{noparse}
<script>
$(document).ready(function()
{
    $('[name=payment]').eq(0).prop('checked', true);

    $("input[name*=balance]").change(function()
    {
        if(!$('input[type=checkbox]').prop('checked'))
        {
            $('#remainAmount').html(v.currencySymbol + v.amount);
        }
        if($('input[type=checkbox]').prop('checked'))
        {
            if(v.balance >= v.amount)
            {
                $('#remainAmount').html(v.currencySymbol + '0');
            }
            else
            {
                payAmount = parseFloat(v.amount) - parseFloat(v.balance);
                $('#remainAmount').html(parseFloat(payAmount).toFixed(2)).parent().show();
            }
        }
    });

    $("input[name*=balance]").change();

    $('#checkForm').ajaxform(
    {
        onSuccess: function(response)
        {
            if(response.result != 'success') $.messager.success(response.message);
            if(response.locate) window.location.href = response.locate;
        }
    });
});
</script>
{/noparse}
