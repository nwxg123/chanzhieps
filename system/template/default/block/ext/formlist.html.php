{*php
/**
 * The form list front view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV12 (http://zpl.pub/form/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
*/
/php*}
{* /* Decode the content and get forms. */ *}
{$content = json_decode($block->content)}
{$forms   = $model->loadModel('form')->getFormList($content->limit)}
<div id="block{$block->id}" class='panel panel-block {$blockClass}'>
  <div class='panel-heading'>
    <strong>{!echo $icon . $block->title}</strong>
    {if(!empty($content->moreText) and !empty($content->moreUrl))}
      <div class='pull-right'>{!html::a($content->moreUrl, $content->moreText)}</div>
    {/if}
  </div>
  <div class='panel-body'>
    <ul class='ul-list'>
      {foreach($forms as $form)}
        {$url = helper::createLink('form', 'view', "id={{$form->id}}", "type={{$form->type}}")}
        {if(isset($content->time))}
          <li>
            {!html::a($url, $form->title, "title='{{$form->title}}'")}
            <span class='pull-right'>{!substr($form->createdDate, 0, 10)}</span>
          </li>
        {else}
          <li>{!html::a($url, $form->title, "title='{{$form->title}}'")}</li>
        {/if}
      {/foreach}
    </ul>
  </div>
</div>
