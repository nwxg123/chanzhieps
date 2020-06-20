{*php
/**
 * The create view file of recharge module of ChanZhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     rechange
 * @version     $Id$
 * @link        http://www.zentao.net
 */
/php*}
{include TPL_ROOT . 'common/header.modal.html.php'}
<form method='post' id='s' action='{!inlink('recharge')}'>
  <div class='input-group'>
    <span class='input-group-addon'>{$lang->balance->amount}</span>
    {!html::input('amount', $amount ? $amount : '', "class='form-control'")}
    <span class='input-group-btn'>{!html::submitButton()}</span>
  </div>
  {if(count($paymentList) == 1)}
    {!html::hidden('payment', current(array_keys($paymentList)))}
  {else}
    <div id='paymentBox'>
      <h5>{$lang->order->payment}</h5>
      <dl> <dd id='payment'>{!html::radio('payment', $paymentList)}</dd> </dl>
    </div>
  {/if}
</form>
{include TPL_ROOT . 'common/footer.modal.html.php'}
