{*php
/**
 * The order cancel of order module for mobile of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件授权
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include TPL_ROOT . 'common/header.html.php'}
<form id='orderCancelForm' action='{!helper::createLink('order', 'cancel', "orderID={{$orderID}}")}' method='post'>
  <div class='form-group'>
    {!html::textarea('cancelReason', '', "class='form-control' placeholder='{{$lang->order->cancelReason}}'")}
  </div>
  <div class='form-group'>{!html::submitButton('', 'btn primary block')}</div>
</form>
{noparse}
<script>
$(function()
{
    var $orderCancelForm = $('#orderCancelForm');
    $orderCancelForm.ajaxform({onResultSuccess: function(response)
    {
        $.closeModal();
    }
    } );
});
</script>
{/noparse}
