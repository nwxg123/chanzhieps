{*php
/**
 * The sectrule view file of score module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     score
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
{$common->printPositionBar('rankingList')}
<div class='panel'>
  <div class='panel-heading'>
    <ul id='typeNav' class='nav nav-tabs'>
    {foreach($control->config->score->ruleNav as $nav)}
      <li data-type='internal' {!echo $type == $nav ? "class='active'" : ''}>
        {!html::a(inlink($nav), $lang->score->$nav)}
      </li>
    {/foreach}
    </ul>
  </div>
   <table class='table table-board'>
     <tr class='text-center'>
       <th>{$lang->user->level}</th>
       {foreach($sectList as $sectCode => $sectName)}
         {$color = zget($config->score->sectColor, $sectCode, '#333')}
         {$levels = zget($levelList, $sectCode)}
         <th {!echo "style='color:{{$color}}'"}>{!$sectName}</th>
       {/foreach}
       <th class='text-left'>{$lang->user->minRank}</th>
     </tr>
     {if(isset($levelList['common']) and is_array($levelList['common']))}
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
     {/if}
   </table>
</div>