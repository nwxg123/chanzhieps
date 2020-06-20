{if(commonModel::isAvailable('sect'))}
  {$sectInfo = $control->user->getUserSect($user)}
  {if($sectInfo['sectCode'] == 'no_sect')}
    {$sectHtml   = "<tr>"}
    {$sectHtml  .= "<th class='text-right'>{{$lang->user->sect}}{{$lang->user->level}}</th>"}
    {$sectHtml  .= "<td>"}
    {$sectHtml  .= "<span id='sect'>" . html::a(helper::createLink('score', 'rule'), $sectInfo['sect']) . "</span>"}
    {$sectHtml  .= "</td></tr>"}  
  {else}
    {$sectHtml   = "<tr>"}
    {$sectHtml  .= "<th class='text-right'>{{$lang->user->sect}}{{$lang->user->level}}</th>"}
    {$sectHtml  .= "<td>"}
    {$sectHtml  .= "<span id='sect' style='background-color:" . $sectInfo['color']  .  "'>" . html::a(helper::createLink('score', 'rule'), $sectInfo['sect'], "id='sect'") . "</span>"}
    {$sectHtml  .= "<span id='levelOrder' style='background-color:" . $sectInfo['color']  .  "'>" . html::a(helper::createLink('score', 'rule'), isset($sectInfo['levelName']) ? $sectInfo['levelName'] : $sectInfo['level'], "id='levelOrderLink'") . "</span>"}
    {$sectHtml  .= "<span class='level' style='border: 2px solid " . $sectInfo['color'] . "'>" . html::a(helper::createLink('score', 'rule'), $sectInfo['sectName']) . "</span>"}
    {$sectHtml  .= "</td></tr>"}  
  {/if}
  {$sectBtn = html::a(inlink('changeSect'), $lang->user->changeSect, "class='btn'")}
  <script>
  {if(!empty($sectInfo['sect']) && (!empty($sectInfo['levelName']) || $sectInfo['sectCode'] == 'no_sect') && isset($sectHtml))}
    $('.col-md-10 .panel table tr:first').after({!json_encode($sectHtml)});
    $('#btnBox').append({!json_encode($sectBtn)});
  {/if}
  </script>
{/if}
