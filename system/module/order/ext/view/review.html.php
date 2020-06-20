{*php
/**
 * The order review of order module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件授权
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include TPL_ROOT . 'common/header.modal.html.php'}
<form id='ajaxForm' class='form-inline' action='{!helper::createLink('order', 'review', "orderID={{$order->id}")}}' method='post'>
  <table class='table table-form'>
    <tr>
      <th class='w-80px'>{$lang->order->cancelReason}</th> 
      <td>{$order->cancelReason}</td>
    </tr>
    <tr>
      <th></th>
      <td>{!html::radio('reviewResult', $lang->order->reviewList, 'pass')}</td>
    </tr>
    <tr>
      <th></th>
      <td>{!html::submitButton()}</td>
    </tr>
  </table>
</form>
{include TPL_ROOT . 'common/footer.modal.html.php'}
