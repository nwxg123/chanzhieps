{include TPL_ROOT . '/common/header.html.php'}
{$common->printPositionBar('')}
<div id="main">
  <div class="giftList cards">
  {foreach($gifts as $gift)}
    {if($gift->status != 'offline')}
    <div class='col-md-4'>
      <div class="card">
        {$link = helper::createLink('product', "view", "giftID=$gift->id")}

        {if(empty($gift->image))}
        {!html::a($link, '<div class="media-placeholder" data-id="' . $gift->id . '">' . $gift->name . '</div>', "class='media-wrapper'");}
        {else}
        {$title = $gift->image->primary->title ? $gift->image->primary->title : $gift->name}
        {!html::a($link, html::image($control->loadModel('file')->printFileURL($gift->image->primary, 'middleURL'), "title='{{$title}}' alt='{{$gift->name}}'"), "class='media-wrapper'")}
        {/if}
        {!html::a($link, $gift->name, "class='card-heading'")}
        <div class="card-content text-left text-nowrap text-ellipsis" title="{!strip_tags($gift->desc)}">{$gift->desc}</div>
        <div class="card-actions">
          <span class='text-muted'>{!echo $lang->gift->score . "："}</span> <span class="lead text-danger">{$gift->score}</span>
          {!html::a($link, "<i class='icon icon-shopping-cart'> </i>" . $lang->gift->exchange, "class='btn btn-success pull-right'")}
        </div>
      </div>
    </div>
    {/if}
  {/foreach}
  </div>
  <footer class='clearfix'>
    {$pager->show('right', 'short')}
  </footer>
</div>
{include TPL_ROOT . '/common/footer.html.php'}
