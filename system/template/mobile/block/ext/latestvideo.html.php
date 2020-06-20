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

{*/* Decode the content and get videos. */ *}
{$content  = json_decode($block->content)}
{$method   = 'get' . ucfirst(str_replace('video', '', strtolower($block->type)))}
{$videos   = $model->loadModel('article')->$method(empty($content->category) ? 0 : $content->category, $content->limit, 'video')}
{if(isset($content->image))} {$videos = $model->loadModel('file')->processImages($videos, 'video')} {/if}
<div id="block{$block->id}" class='panel panel-block {$blockClass}'>
  <div class='panel-heading'>
    <strong>{!echo $icon . $block->title}</strong>
    {if(isset($content->moreText) and isset($content->moreUrl))}
      <div class='pull-right'>{!html::a($content->moreUrl, $content->moreText)}</div>
    {/if}
  </div>
  {if(isset($content->image))}
    <div class='panel-body no-padding'>
      <div class='cards condensed cards-list'>
      {foreach($videos as $video)}
        {$url = helper::createLink('video', 'view', "id=$video->id", "category={{$video->category->alias}}&name=$video->alias")}
        <div class='card'>
          <div class='card-heading'>
            {if(isset($content->showCategory) and $content->showCategory == 1)}
              {if($content->categoryName == 'abbr')}
                {$categoryName = '[' . ($video->category->abbr ? $video->category->abbr : $video->category->name) . '] '}
                {!html::a(helper::createLink('video', 'browse', "categoryID={{$video->category->id}}", "category={{$video->category->alias}}"), $categoryName, "class='text-special'")}
              {else}
                <span class="text-special">{!echo [' . $video->category->name . ']}</span>
              {/if}
            {/if}
            {if($video->sticky)}<span class='text-danger'>[{$block->lang->article->stick}]</span>{/if}
            <strong>{!html::a($url, $video->title)}</strong>
          </div>
          <div class='table-layout'>
            <div class='table-cell'>
              <div class='card-content text-muted small'>
                <strong class='text-important'>
                  {if(isset($content->time))}
                    <i class='icon-time'></i> &nbsp;{!formatTime($video->addedDate, DT_DATE4)}
                  {/if}
                </strong>
                {$video->summary}
              </div>
            </div>
            {if(!empty($video->image))}
              <div class='table-cell thumbnail-cell'>
                {$title = $video->image->primary->title ? $video->image->primary->title : $video->title}
                {!html::a($url, html::image($model->loadModel('file')->printFileURL($video->image->primary, 'smallURL'), "title='{{$title}}' class='thumbnail'"))}
              </div>
            {/if}
          </div>
        </div>
      {/foreach}
      </div>
    </div>
  {else}
    <div class='panel-body no-padding'>
      <div class='list-group simple'>
        {foreach($videos as $video)}
          {$alias = "category={{$video->category->alias}}&name={{$video->alias}}"}
          {$url   = helper::createLink('video', 'view', "id={{$video->id}}", $alias)}
          {if(isset($content->time))}
            <div class='list-group-item'>
              {if(isset($content->showCategory) and $content->showCategory == 1)}
                {if($content->categoryName == 'abbr')}
                  {$categoryName = '[' . ($video->category->abbr ? $video->category->abbr : $video->category->name) . '] '}
                  {!html::a(helper::createLink('video', 'browse', "categoryID={{$video->category->id}}", "category={{$video->category->alias}}"), $categoryName, "class='text-special'")}
                {else}
                  {!html::a(helper::createLink('video', 'browse', "categoryID={{$video->category->id}}", "category={{$video->category->alias}}"), '[' . $video->category->name . '] ', "class='text-special'")}
                {/if}
              {/if}
              {if($video->sticky)}<span class='text-danger'>[{$model->lang->article->stick}]</span>{/if}
              {!html::a($url, $video->title, "title='{{$video->title}}'")}
              <span class='pull-right text-muted'>{!substr($video->addedDate, 0, 10)}</span>
            </div>
            {else}
              <div class='list-group-item'>
                {if(isset($content->showCategory) and $content->showCategory == 1)}
                  {if($content->categoryName == 'abbr')}
                    {$categoryName = '[' . ($video->category->abbr ? $video->category->abbr : $video->category->name) . '] '}
                    {!html::a(helper::createLink('video', 'browse', "categoryID={{$video->category->id}}", "category={{$video->category->alias}}"), $categoryName, "class='text-special'")}
                  {else}
                    {!html::a(helper::createLink('video', 'browse', "categoryID={{$video->category->id}}", "category={{$video->category->alias}}"), '[' . $video->category->name . '] ', "class='text-special'")}
                  {/if}
                {/if}
                {if($video->sticky)}<span class='text-danger'>[{$model->lang->article->stick}]</span>{/if}
                {!html::a($url, $video->title, "title='{{$video->title}}'")}
              </div>
          {/if}
        {/foreach}
      </div>
    </div>
  {/if}
</div>
