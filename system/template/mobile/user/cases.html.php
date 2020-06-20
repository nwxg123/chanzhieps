{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header')}
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'user', 'side')}
<div class='panel-section'>
  <div class='panel-heading'>
    <button type='button' class='btn primary block' data-toggle='modal' data-remote="{!$control->createLink('usercase', 'create')}"><i class='icon icon-plus'></i>{$lang->usercase->create}</button>
  </div>
  <div class='panel-heading'>
    <div class='title strong'><i class='icon icon-list-ul'></i> {$lang->user->control->cases}</div>
  </div>

  <div class='cards condensed cards-list bordered' id='cases'>
    {foreach($cases as $case)}
      <div class='card' id="case{{$case->id}}" data-ve='case'>
        <div class='card-heading'>
          <div class='pull-right'>
            {if($case->status == 0)} {$statusClass = 'text-warning'} {/if}
            {if($case->status == 1)} {$statusClass = 'text-success'} {/if}
            {if($case->status == 2)} {$statusClass = 'text-danger'} {/if} 
            <small class='{$statusClass}'>{$lang->usercase->statusList[$case->status]}</small>
          </div>
          <h5>{$case->company}</h5>
        </div>
        <div class='table-layout'>
          <div class='table-cell'>
            <div class='card-content text-muted small'>
              <div>
                <span title="{$case->views}"> <i class='icon-eye-open'></i> {$case->views} </span>
                &nbsp;&nbsp; <span title="{$lang->case->addedDate}"><i class='icon-time'></i> {$case->addedDate}</span>
              </div>
            </div>
          </div>
        </div>
        <div class='card-footer'>
          {if($case->status != 1)}
            {!html::a($control->createLink('usercase', 'edit', "id=$case->id"), $lang->edit, "class='text-primary' data-toggle='modal'")}
          {else}
            {!html::a('javascript:;', $lang->edit, "class='disabled'")}
          {/if}
          {!html::a($control->createLink('usercase', 'view', "id=$case->id"), $lang->preview, "class='text-primary'")}
        </div>
      </div>
    {/foreach}
  </div>
</div>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
