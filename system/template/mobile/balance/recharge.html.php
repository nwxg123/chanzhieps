{*php
/**
 * The recharge view file of balance module of ChanZhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV12 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     balance
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
<div class='modal-dialog'>
  <div class='modal-content'>
    <div class='modal-header'>
      <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>×</span></button>
      <h5 class='modal-title'><i class='icon-plus'></i> {$lang->balance->recharge}</h5>
    </div>
    <div class='modal-body'>
      <form id='rechargeForm' action='{!inlink('recharge')}' method='post'>
        <div class='form-group'>
          {!html::input('amount', $amount ? $amount : '', "class='form-control' placeholder='{{$lang->balance->amount}}'")}
        </div>
        {if(count($paymentList) == 1)}
          {!html::hidden('payment', current(array_keys($paymentList)))}
        {else}
          <div class='form-group'>
            {!html::radio('payment', $paymentList)}
          </div>
        {/if}
        <div class='form-group'>
          {!html::submitButton('', 'btn primary block')}
        </div>
      </form>
    </div>
  </div>
</div>
<script>
$(function()
{
    var $rechargeForm = $('#rechargeForm');
    $rechargeForm.ajaxform({onSuccess: function(response)
    {
        if(response.result == 'success')
        {
            $.closeModal();
        }
    }
    });
});
</script>
