{*php
/**
 * The category front view file of video module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件 
 * @author      Gang Liu <liugang@cnezsoft.com> 
 * @package     video 
 * @version     $Id$
 * @link        http://www.chanzhi.org
*/
/php*}
{$model->loadModel('tree')}
{$block->content  = json_decode($block->content)}
{$type            = 'video'}
{$browseLink      = 'createVideoBrowseLink'}
{$startCategory = 0}
{if(isset($block->content->fromCurrent) and $block->content->fromCurrent)}
  {if($model->session->videoCategory)}
    {$category      = $model->tree->getByID($model->session->videoCategory)}
    {$startCategory = $category->parent}
  {/if}
{/if}
{if($block->content->showChildren)}
  {$treeMenu = $model->tree->getTreeMenu($type, $startCategory, array('treeModel', $browseLink))}
  <div id="block{$block->id}" class='panel panel-block {$blockClass}'>
    <div class='panel-heading'>
      <strong>{!echo $icon . $block->title}</strong>
    </div>
    <div class='panel-body'>{$treeMenu}</div>
  </div>
{else}
  {$topCategories = $model->tree->getChildren($startCategory, $type)}
  <div id="block{$block->id}" class='panel panel-block {$blockClass}'>
    <div class='panel-heading'>
      <strong>{!echo $icon . $block->title}</strong>
    </div>
    <div class='panel-body'>
      <ul class='nav nav-secondary nav-stacked'>
        {foreach($topCategories as $topCategory)}
          {$browseLink = helper::createLink($type, 'browse', "categoryID={{$topCategory->id}}", "category={{$topCategory->alias}}")}
          <li>{!html::a($browseLink, "<i class='icon-folder-close-alt '></i> &nbsp;" . $topCategory->name, "id='category{{$topCategory->id}}'")}</li>
        {/foreach}
      </ul>
    </div>
  </div>
{/if}
