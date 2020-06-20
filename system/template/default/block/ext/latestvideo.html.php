{*php
/**
 * The latest video front view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件 
 * @author      Gang Liu <liugang@cnezsoft.com> 
 * @package     video 
 * @version     $Id$
 * @link        http://www.chanzhi.org
*/
/php*}
{* /* Set $themRoot. */ *}
{$themeRoot = $config->webRoot . 'theme/'}

{* /* Decode the content and get videos. */ *}
{$content  = json_decode($block->content)}
{$method   = 'get' . ucfirst(str_replace('video', '', strtolower($block->type)))}
{$videos = $model->loadModel('article')->$method(empty($content->category) ? 0 : $content->category, $content->limit, 'video')}
{if(isset($content->image))} {$videos = $model->loadModel('file')->processImages($videos, 'video')} {/if}
<div id="block{$block->id}" class='panel panel-block {$blockClass}'>
  <div class='panel-heading'>
    <strong>{!echo $icon . $block->title}</strong>
    {if(isset($content->moreText) and isset($content->moreUrl))}
      <div class='pull-right'>{!html::a($content->moreUrl, $content->moreText)}</div>
    {/if}
  </div>
  {if(isset($content->image))}
    {$pull     = $content->imagePosition == 'right' ? 'pull-right' : 'pull-left'}
    {$imageURL = !empty($content->imageSize) ? $content->imageSize . 'URL' : 'smallURL'}
    <div class='panel-body'>
      <div class='items'>
      {foreach($videos as $video)}
        {$url = helper::createLink('video', 'view', "id=$video->id", "category={{$video->category->alias}}&name=$video->alias")}
        <div class='item'>
          <div class='item-heading'>
            {if($video->sticky)}<span class='label label-danger'>{$model->lang->article->stick}</span>{/if}
            {if(isset($content->showCategory) and $content->showCategory == 1)}
              {if($content->categoryName == 'abbr')}
                {$categoryName = '[' . ($video->category->abbr ? $video->category->abbr : $video->category->name) . '] '}
                {!html::a(helper::createLink('video', 'browse', "categoryID={{$video->category->id}}", "category={{$video->category->alias}}"), $categoryName)}
              {else}
                {!echo '[' . $video->category->name . '] '}
              {/if}
            {/if}
            <strong>{!html::a($url, $video->title)}</strong>
          </div>
          <div class='item-content'>
            <div class='text small text-muted'>
              <div class='media {$pull}' style="max-width: {!echo !empty($content->imageWidth) ? $content->imageWidth . 'px' : '60px'}">
              {if(!empty($video->image))}
                {$title = $video->image->primary->title ? $video->image->primary->title : $video->title}
                {!html::a($url, html::image($model->loadModel('file')->printFileURL($video->image->primary, $imageURL), "title='{{$title}}' class='thumbnail'"))}
              {/if}
              </div>
              <strong class='text-important'>
                {if(isset($content->time))}<i class='icon-time'></i> {!formatTime($video->addedDate, DT_DATE4)} {/if}
              </strong> 
              &nbsp;{$video->summary}
            </div>
          </div>
        </div>
      {/foreach}
      </div>
    </div>
  {else}
    <div class='panel-body'>
      <ul class='ul-list'>
        {foreach($videos as $video)}
          {$video->category->alias = isset($video->category->alias) ? $video->category->alias : ''}
          {$video->alias = isset($video->alias) ? $video->alias : ''}
          {$alias = "category={{$video->category->alias}}&name={{$video->alias}}"}
          {$url   = helper::createLink('video', 'view', "id={{$video->id}}", $alias)}
          {if(isset($content->time))}
            <li>
              {if(isset($content->showCategory) and $content->showCategory == 1)}
                {if($content->categoryName == 'abbr')}
                  {$categoryName = '[' . ($video->category->abbr ? $video->category->abbr : $video->category->name) . '] '}
                  {!html::a(helper::createLink('video', 'browse', "categoryID={{$video->category->id}}", "category={{$video->category->alias}}"), $categoryName)}
                {else}
                  {!html::a(helper::createLink('video', 'browse', "categoryID={{$video->category->id}}", "category={{$video->category->alias}}"), '[' . $video->category->name . '] ')}
                {/if}
              {/if}
              {!html::a($url, $video->title, "title='{{$video->titlei}}'")}
              {if($video->sticky)}<span class='label label-danger'>{$model->lang->article->stick}</span>{/if}
              <span class='pull-right'>{!substr($video->addedDate, 0, 10)}</span>
            </li>
            {else}
            <li>
              {if(isset($content->showCategory) and $content->showCategory == 1)}
                {if($content->categoryName == 'abbr')}
                  {$categoryName = '[' . ($video->category->abbr ? $video->category->abbr : $video->category->name) . '] '}
                  {!html::a(helper::createLink('video', 'browse', "categoryID={{$video->category->id}}", "category={{$video->category->alias}}"), $categoryName)}
                {else}
                  {!html::a(helper::createLink('video', 'browse', "categoryID={{$video->category->id}}", "category={{$video->category->alias}}"), '[' . $video->category->name . '] ')}
                {/if}
              {/if}
              {!html::a($url, $video->title, "title='{{$video->title}}'")}
              {if($video->sticky)}<span class='label label-danger'>{$model->lang->article->stick}</span>{/if}
            </li>
          {/if}
        {/foreach}
      </ul>
    </div>
  {/if}
</div>
