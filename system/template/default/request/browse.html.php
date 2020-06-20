{*php
/**
 * The browse view of request module of XiRangCSM
 *
 * @copyright   Copyright 2009-2011 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Congzhi Chen<congzhi@cnezsoft.com>
 * @package     request
 * @version     $Id: buildform.html.php 1914 2011-06-24 10:11:25Z yidong@cnezsoft.com $
 * @link        http://www.chanzhi.org
 */
/php*}
{include TPL_ROOT . 'common/header.html.php'}
{!js::set('browseType', 'by' . $type . 'Tab')}
<div class='row'>
  {include TPL_ROOT . 'user/side.html.php'}
  <div class='col-md-10'>
    <div class='panel'>
      <div class='panel-heading clearfix'>
        <ul class="nav nav-tabs pull-left" id="typeNav">
          {foreach($lang->request->statusList as $statusName => $statusLabel)}
            {if(!strpos($lang->request->statusTabs, $statusName))}{continue}{/if}
            <li id='by{$statusName}Tab'>{!html::a(inLink('browse', "type=$statusName"), $statusLabel)}</li>
          {/foreach}
        </ul>
        <div class='panel-actions'>
          {!html::a(inlink('create'), "<i class='icon icon-plus'> </i>" . $lang->request->create, "class='btn btn-primary'")}
        </div>
      </div>
      <!-- show header of table. -->
      {$vars = "type=$type&param=$param&orderBy=%s&recTotal=$recTotal&recPerPage=$recPerPage"}
      <table class='table table-list tablesorter'>
        <thead>
        <tr class='text-center'>
          <td class='w-id'>{!commonModel::printOrderLink('id',$orderBy, $vars, $lang->request->id)}</td>
          <td>{!commonModel::printOrderLink('title', $orderBy, $vars, $lang->request->title)}</td>
          <td>{!commonModel::printOrderLink('product', $orderBy, $vars, $lang->request->product)}</td>
          <td class='w-100px'>{!commonModel::printOrderLink('category', $orderBy, $vars, $lang->request->category)}</td>
          <td class='w-100px'>{!commonModel::printOrderLink('addedDate', $orderBy, $vars, $lang->request->addedDate)}</td>
          <td>{!commonModel::printOrderLink('status',  $orderBy, $vars, $lang->request->status)}</td>
          <td class='w-100px'>{!commonModel::printOrderLink('repliedDate', $orderBy, $vars, $lang->request->repliedDate)}</td>
          <td>{$lang->actions}</td>
        </tr>
        </thead>
        <tbody>
        {foreach($requests as $request)}
          <tr class='text-center'>
            <td>{$request->id}</td>
            <td class='text-left'>{!html::a(inlink('view', "id=$request->id"), $request->title, "data-toggle='modal'")}</td>
            <td>{if(!empty($request->productName))} {$request->productName} {/if}</td>
            <td>{if(!empty($request->category))} {$request->category} {/if}</td>
            <td>{!substr($request->addedDate, 5,11)}</td>
            <td>{$lang->request->statusList[$request->status]}</td>
            <td>{!substr($request->repliedDate, 5, 11)}</td> 
            <td>
            {if($request->status == 'wait')} {!html::a(inlink('edit', "requestID=$request->id"), $lang->request->edit)} {/if}
            {!html::a(inlink('doubt', "requestID=$request->id"), $lang->request->doubt, "data-toggle='modal'")}
            {if($request->status == 'replied')} {!html::a(inlink('valuate', "requestID=$request->id"), $lang->request->valuate, "data-toggle='modal'")} {/if}
            </td>
          </tr>
        {/foreach}
        </tbody>
        <tfoot>
          <tr><td class='text-right' colspan='8'>{$pager->show()}</td></tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
{include TPL_ROOT . 'common/footer.html.php'}
