{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header')}
<div class='panel panel-section'>
  <div class='panel-heading'>
    <div class='title strong'><i class='icon icon-list-ul'></i> {$lang->usercase->list}</div>
  </div>
  <div class='cards condensed cards-list bordered' id='cases'>
    {foreach($cases as $case)}
      <div class='card' id="case{{$case->id}}" data-ve='case'>
        {if($case->image->primary)}{!html::a(inlink('view', "id=$case->id"), html::image($config->usercase->snapURL . $case->image->primary, "alt='{{$case->company}}' height='300'"), "class='media-wrapper'")}{/if}
        <div class='card-heading'>
          <div class='pull-right'>
            <span title="{$case->views}"> <i class='icon-eye-open'></i> {$case->views} </span>
          </div>
          <h5>{!html::a(inlink('view', "id={{$case->id}}"), $case->company)}</h5>
        </div>
      </div>
    {/foreach}
  </div>
  <div class='panel-footer'>
    {$pager->show('justify')}
  </div>
</div>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
