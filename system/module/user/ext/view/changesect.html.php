{*php
/**
 * The user view file of user module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     LGPL (http://www.gnu.org/licenses/lgpl.html)
 * @author      yidong Wang <yidong@cnezsoft.com>
 * @package     user
 * @version     $Id$
 * @link        http://www.zsite.com
 */
/php*}
{include TPL_ROOT . 'common/header.html.php'}
<div class='row'>
  {include TPL_ROOT . 'user/side.html.php'}
  <div class='col-md-10'>
    <div class='panel'>
      <div class='panel-heading'><strong>{$lang->user->changeSect}</strong></div>
      <table class='table table-board'>
        <tr>
          <td colspan={!echo count((array)$sectList) + 2}>
          {!printf($lang->user->currentSect, " <strong class='text-important'>" . $sectInfo['sect'] . "</strong> ")}
          <span class="f-14px">（{!sprintf($lang->user->notice->rank, $user->rank)}）</span>
          </td>
        </tr>
        <tr class='text-center'>
          <th>{$lang->user->level}</th>
          {foreach($sectList as $sectCode => $sectName)}
            {$color = zget($config->score->sectColor, $sectCode, '#333')}
            {$levels = zget($levelList, $sectCode)}
            <th {!echo "style='color:{{$color}}'"}>{!echo $sectInfo['sect'] == $sectCode ? "<span class='red'>$sectName</sapn>" : $sectName}</th>
          {/foreach}
          <th class='text-left'>{$lang->user->minRank}</th>
        </tr>
        {foreach($levelList['common'] as $level => $levelName)}
          <tr class='text-center'>
            <td>{$levelName}</td>
            {foreach($sectList as $sect => $sectName)}
              {$color = zget($config->score->sectColor, $sect, '#333')}
              {$sectLevels = zget($levelList, $sect)}
              <td {!echo "style='color:{{$color}}'"}><span class='level'>{$sectLevels[$level]}</sapn></td>
            {/foreach}
            <td class='text-left'>{$levelStandard[$level]}</td>
          </tr>
        {/foreach}
        <tr class='text-center'>
          <td></td>
          {foreach($sectList as $sectCode => $sectName)}
            <td>{if($sectInfo['sectCode'] != $sectCode)} {!html::a(inlink('changeSect', "sect=$sectCode"), $lang->user->enter, "class='btn join btn-info btn-sm'")} {/if}</td>
          {/foreach}
          <td></td>
        </tr>
      </table>
    </div>
  </div>
</div>
<script>$(function(){$.setAjaxJSONER('.join')})</script>
{include TPL_ROOT . 'common/footer.html.php'}
