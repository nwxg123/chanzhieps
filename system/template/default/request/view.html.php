{*php
/**
 * The view view of request module of XiRangCSM
 *
 * @copyright   Copyright 2009-2011 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Congzhi Chen<congzhi@cnezsoft.com>
 * @package     request
 * @version     $Id: buildform.html.php 1914 2011-06-24 10:11:25Z yidong@cnezsoft.com $
 * @link        http://www.chanzhi.org
 */
/php*}
{include TPL_ROOT . 'common/header.modal.html.php'}
<table class='table table-form' align='center' id='requestCont'>
  <tr>
    <th class='w-80px'>{$lang->request->product}</th>
    <td>{$request->productName}<span class="divider"></span></td>
  </tr>
  <tr>
    <th>{$lang->request->category}</th>
    <td>{$request->categoryName}<span class="divider"></span></td>
  </tr>
  <tr>
    <th>{$lang->request->status}</th>
    <td>{$status = $request->status == 'viewed' ? 'wait' : $request->status; echo $lang->request->statusList[$status]}<span class="divider"></span></td>
  </tr>
  <tr>
    <th>{!$lang->request->desc}</th>
    <td class='text-middle'> {!$request->desc}</td>
  </tr>
  <tr>
    <th>{!$lang->request->file}</th>
    <td>{$control->fetch('file', 'printFiles', array('files' => $request->files, 'fieldset' => 'false'))}<br /> </td>
  </tr>
</table>
<div class='panel'>
  <div class='panel-heading'><strong>{!$lang->request->actionList}</strong></div>
  <div class='panel-body'>
    <ol id='historyItem'>
      {$i = 1; }
      {foreach($actions as $action)}
      {if(RUN_MODE == 'front')}
        {if($action->action == 'commented')} {continue} {/if}
        {if($action->action == 'replied')} {$action->actor = $lang->request->servicer . $action->number} {/if}
      {/if}
      <li value='{@$i++}'>
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
{!js::set('viewType', $viewType)}
{!js::set('run_mode', RUN_MODE)}
{include TPL_ROOT . 'common/footer.modal.html.php'}
