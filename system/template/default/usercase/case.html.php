<div class='article'>
  <header>
    <h1>{$case->company}</h1>
    <div>
      {!printf($lang->usercase->lblAddedDate, $case->addedDate)}
      {!printf($lang->usercase->lblAuthor,    $case->author)}
      {!printf($lang->usercase->lblViews, $case->views)}
    </div>
  </header>
  <section class='article-content'>
    <div id='snap' class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
      {$i = 0}
      {foreach($case->snap['image'] as $image)}
        <div class="item {if($i == 0)} {!echo 'active'} {@$i++} {/if}"><img src="{!echo $config->usercase->snapURL . $image}"></div>
      {foreach}
      </div>
      <a class="left carousel-control" href="#snap" data-slide="prev">
        <span class="icon icon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#snap" data-slide="next">
        <span class="icon icon-chevron-right"></span>
      </a>
    </div>
    <ul>
      <li><strong>{!echo $lang->usercase->company   . $lang->colon}</strong>{$case->company}</li>
      <li><strong>{!echo $lang->usercase->industry  . $lang->colon}</strong>{(isset($industries[$case->industry]) ? $industries[$case->industry] : '')}</li>
      <li><strong>{!echo $lang->usercase->area      . $lang->colon}</strong>{$control->usercase->formatArea($case->area)}</li>
      {if(preg_match('/[^0-9a-zA-Z_\-:\/\.]/', $case->site))} {$case->site = ''} {/if}
      <li>
          <strong>{!echo $lang->usercase->site      . $lang->colon}</strong>
          <span" . ($case->site ? " onclick='openWindow(\"{$case->site}\")' style='color:#0D3D88;cursor:pointer;'" : '') . ">{$case->site}</span>
      </li>
      <li><strong>{!echo  $lang->usercase->keywords . $lang->colon}</strong>{$case->keywords . '</li>';
      <li><strong>{!echo $lang->usercase->desc      . $lang->colon}</strong><br />';
      {!htmlspecialchars_decode($case->desc)}
      </li>
    </ul>
  </section>
</div>
{if($mode == 'front')} {$control->fetch('message', 'comment', "object=usercase&id=$case->id")} {/if}
{noparse}
<script>
function openWindow(site)
{
    var tempwindow = window.open('_blank');
    tempwindow.location = site;
}
</script>
{/noparse}
