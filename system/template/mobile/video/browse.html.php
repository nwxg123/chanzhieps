{*php
/**
 * The browse view file of video for mobile template of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com> 
 * @package     video 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header')}
{$path = array_keys($category->pathNames)}
{!js::set('path', $path)}
{!js::set('categoryID', $category->id)}
{!js::set('pageLayout', $control->block->getLayoutScope('video_browse', $category->id))}
<div class='block-region blocks region-top' data-region='video_browse-top'>{$control->loadModel('block')->printRegion($layouts, 'video_browse', 'top')}</div>
<div class='panel panel-section'>
  <div class='panel-heading page-header'>
    <strong>{!$category->name}</strong>
  </div>
  <div class='panel-body'>
    {$count = count($videos)}
    {if($count == 0)} {$count = 1} {/if}
    {$recPerRow = min($count, 2)}
    <div class='cards cards-videos' data-cols='{$recPerRow}' id='videos'>
      <style>{!echo ".col-custom-{{$recPerRow}} {{width: " . (100/$recPerRow) . "%}}"}</style>
      {$index = 0}
      {foreach($videos as $video)}
        {$rowIndex = $index % $recPerRow}
        {if($rowIndex === 0)}
          <div class='row'>
        {/if}
        <div class='col col-custom-{$recPerRow}'>
        {$url = helper::createLink('video', 'view', "id=$video->id", "category={{$video->category->alias}}&name=$video->alias")}
          <div class='card card-block' id='video{$video->id}' data-ve='video'>
            <a class='card-img' href='{$url}'>
              {if(empty($video->image))}
                {$imgColor = $video->id * 57 % 360}
                <div class='media-placeholder' style='background-color: hsl({$imgColor}, 60%, 80%); color: hsl({$imgColor}, 80%, 30%);' data-id='{$video->id}'>
                  {$video->title}
                </div>
              {else}
                {$imgsrc = $control->loadModel('file')->printFileURL($video->image->primary, 'middleURL')}
                <img class='lazy' alt='{$video->title}' title='{$video->title}' data-src='{$imgsrc}'>
              {/if}
            </a>
            <div class='card-content'><a href='{$url}'>{$video->title}</a>
            </div>
          </div>
        </div>

        {if($recPerRow === 1 || $rowIndex === ($recPerRow - 1))}
          </div>
        {/if}
        {@$index++}
      {/foreach}
    </div>
  </div>
  <div class='panel-footer'>{$pager->createPullUpJS('#videos', $lang->mobile->pullUpHint)}</div>
</div>

<div class='block-region blocks region-bottom' data-region='video_browse-bottom'>{$control->loadModel('block')->printRegion($layouts, 'video_browse', 'bottom')}</div>

{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
