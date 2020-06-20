{*php
/**
 * The view view of order module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include TPL_ROOT . 'common/header.modal.html.php'}
<table class='table table-form'>
  <tr>
    <th class='w-80px'>{$lang->order->type}</th>
    <td>{!zget($lang->order->types, $order->type, '')}</td>
  </tr> 
  <tr>
    <th class='w-80px'>{$lang->order->productInfo}</th>
    <td>
        {foreach($products as $product)}
          {$extra = json_decode($product->extra)}
          {if(!empty($extra))}
            {foreach($extra as $value)}
              {$product->productName .= '&nbsp;' . $value}
            {/foreach}
          {/if}
          <div>
            <span>{!html::a(commonModel::createFrontLink('product', 'view', "id=$product->productID"), $product->productName, "target='_blank'")}</span>
            <span>{!echo $lang->order->price . $lang->colon . $product->price . ' ' . $lang->order->count . $lang->colon . $product->count}</span>
          </div>
        {/foreach}
      </dl>
    </td>
  </tr>
  {if($order->type == 'shop' or $order->type == 'gift')}
    <tr>
      <th class='w-80px'>{$lang->order->expressInfo}</th>
      <td>
      {if($order->deliveryStatus !== 'not_s/')}
        {!echo $control->order->expressInfo($order) . '&nbsp;' . $order->waybill}
      {else}
        {$lang->order->noRecord}
      {/if}
      </td>
    </tr>
    <tr>
      <th class='w-80px'>{$lang->order->address}</th>
      <td>
        {$address = json_decode($order->address)}
        {!echo $address->contact . ',' . $address->address . ',' . $address->phone . ',' . $address->zipcode}
      </td>
    </tr> 
  {/if}
  <tr>
    <th class='w-80px'>{$lang->order->account}</th>
    <td>{!zget($users, $order->account, $order->account)}</td>
  </tr> 
  <tr>
    <th>{$lang->order->status}</th>
    <td>{$control->order->processStatus($order)}</td>
  </tr> 
  {if(($order->status == 'canceling' or $order->status == 'canceled') and $order->cancelReason)}
    <tr>
      <th>{$lang->order->cancelReason}</th>
      <td>{$order->cancelReason}</td>
    </tr> 
  {/if}
  <tr>
    <th>{$lang->order->amount}</th>
    <td>{!echo $order->amount + $order->balance}</td>
  </tr> 
  {if($order->balance > 0)}
    <tr>
      <th>{$lang->order->balance}</th>
      <td>{$order->balance}</td>
    </tr> 
  {/if}
  {if($order->score > 0)}
    <tr>
      <th>{$lang->order->score}</th>
      <td>{$order->score}</td>
    </tr> 
  {/if}
  <tr>
    <th>{$lang->order->payment}</th>
    <td>{!zget($lang->order->paymentList, $order->payment)}</td>
  </tr> 
  <tr>
    <th class='w-80px'>{$lang->order->note}</th>
    <td>{$order->note}</td>
  </tr> 
  <tr>
    <th>{$lang->order->createdDate}</th>
    <td>{$order->createdDate}</td>
  </tr> 
  {if($order->payment != 'COD' and ($order->paidDate > $order->createdDate))}
    <tr>
      <th>{$lang->order->paidDate}</th>
      <td>{$order->paidDate}</td>
    </tr> 
  {/if}
  {if($order->deliveriedDate > $order->createdDate)}
    <tr>
      <th>{$lang->order->deliveriedDate}</th>
      <td>{$order->deliveriedDate}</td>
    </tr> 
  {/if}
  {if($order->confirmedDate > $order->deliveriedDate)}
    <tr>
      <th>{$lang->order->confirmedDate}</th>
      <td>{$order->confirmedDate}</td>
    </tr> 
  {/if}
  {if($order->payment == 'COD' and ($order->paidDate > $order->createdDate))}
    <tr>
      <th>{$lang->order->paiedDate}</th>
      <td>{$order->paiedDate}</td>
    </tr> 
  {/if}
  <tr class='text-center'>
    <td colspan='2'>
      <div class='btn-group'> {$control->order->printActions($order, true)}</div>
    </td>
  </tr>
</table>
{include TPL_ROOT . 'common/footer.modal.html.php'}
