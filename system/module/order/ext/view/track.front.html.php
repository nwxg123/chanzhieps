{include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'header.modal')}
{!echo zget($config->express->expressList, $order->express) . $lang->colon}
{$order->waybill}
{if($track->status == 'fail')}
  <div>
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
{include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'footer.modal')}
