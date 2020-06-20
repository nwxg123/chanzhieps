{include TPL_ROOT . 'common/header.html.php'}
{noparse}
<style>
.alert > .alert {margin: 0; padding: 0;}
</style>
{/noparse}
<div class='text-center'>
  <div><small>{$lang->order->api->valueList['express']}</small></div>
  <h1 class='text-important'>{$order->waybill}</h1>
  <div class='text-muted'>{!zget($config->express->expressList, $order->express)}</div>
</div>
{if($track->status == 'fail')}
  <div class='alert bg-warning-pale'>
    {!printf($lang->express->noTraks, $track->link)}
  </div>
{else}
  <div class='alert'>
    <h4>{!zget($lang->express->statusList, strtolower($track->status))}</h4>
    <ul class="nav nav-primary nav-stacked">
      {$track->data = array_reverse($track->data)}
      {foreach($track->data as $item)}
        <li>{!echo $item->ftime . $lang->colon . $item->context}</li>
      {/foreach}
    </ul>
  </div>
{/if}
