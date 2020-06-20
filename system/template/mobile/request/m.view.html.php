{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{noparse}
<style>
.panel-section {margin: 0;}
#requestDetailTable {margin-bottom: 0; background-color: #ffffff}
#requestDetailTable > tbody > tr > th {text-align: right; width: 90px;}
#requestDetailTable > tbody > tr > th,
#requestDetailTable > tbody > tr > td {border: none; word-break: break-all; padding: 4px 8px}
{/noparse}
</style>
<table class='table' id='requestDetailTable'>
  <tbody>
    <tr>
      <th>{$lang->request->product}</th>
      <td>{$request->productName}</td>
    </tr> 
    <tr>
      <th>{$lang->request->category}</th>
      <td>{$request->categoryName}</td>
    </tr> 
    <tr>
      <th>{$lang->request->status}</th>
      <td>{$status = $request->status == 'viewed' ? 'wait' : $request->status}{$lang->request->statusList[$status]}</td>
    </tr> 
    <tr>
      <th>{$lang->request->desc}</th>
      <td>{$request->desc}</td>
    </tr> 
  </tbody>
</table>
<hr/>
<div class='panel-section'>
  <div class='panel-heading'><strong>{$lang->request->actionList}</strong></div>
  <div class='panel-body'>
    <ol id='historyItem'>
      {$i = 1}
      {foreach($actions as $action)}
        {if(RUN_MODE == 'front')}
          {if($action->action == 'commented')} {continue} {/if}
          {if($action->action == 'replied')} {$action->actor = $lang->request->servicer . $action->number} {/if}
        {/if}
        <li value='{$i ++}'>
          {if(isset($users[$action->actor]))} {$action->actor = $users[$action->actor]} {/if}
          {if(strpos($action->actor, ':') !== false)} {$action->actor = substr($action->actor, strpos($action->actor, ':') + 1)} {/if}
          <span>{$control->action->printAction($action)}</span>
          {if(!empty($action->comment))}
            <div class='history'>{!nl2br($action->comment)}</div>
          {/if}
        </li>
      {/foreach}
    </ol>
  </div>
</div>
