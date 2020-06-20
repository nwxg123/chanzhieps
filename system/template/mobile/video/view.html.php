{*php
/**
 * The view file of video for mobile template of chanzhiEPS.
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
{include TPL_ROOT . 'common/files.html.php'}
{!js::set('path', $video->path)}
{!js::set('categoryID', $category->id)}
{!js::set('categoryPath', explode(',', trim($category->path, ',')))}
{!css::internal($video->css)}
{!js::execute($video->js)}
{!js::set('pageLayout', $control->block->getLayoutScope('video_view', $video->id))}

{!js::import($jsRoot . 'videojs/video.min.js')}
{!css::import($jsRoot . 'videojs/video-js.min.css')}
<div class='block-region region-video-view-top blocks' data-region='video_view-top'>{$control->loadModel('block')->printRegion($layouts, 'video_view', 'top')}</div>
<div class='appheader'>
  <div class='heading'>
    <h2>{$video->title}</h2>
    <div class='caption text-muted'>
      <small><i class='icon-time icon-large'></i> {!formatTime($video->addedDate)}</small> &nbsp;&nbsp;
      <small><i class='icon-user icon-large'></i> {$video->author}</small> &nbsp;&nbsp;
      <small><i class='icon-eye-open'></i> {$video->views}</small> &nbsp;&nbsp;
      {if($video->source != 'original' and $video->copyURL != '')}
        <small>
          {!echo $lang->article->sourceList[$video->source] . $lang->colon}
          {$video->copyURL ? print(html::a($video->copyURL, $video->copySite, "target='_blank'")) : print($video->copySite)}
        </small>
      {else}
        <small class='text-success bg-success-pale'>{$lang->article->sourceList[$video->source]}</small>
      {/if}
    </div>
  </div>
</div>

<div class='panel-section video' id="video{$video->id}" data-ve='video'>
  {if($video->summary)}
    <section class='abstract hide bg-gray-pale small with-padding'>
      <strong>{$lang->article->summary}</strong>
      {!echo $lang->colon . $video->summary}
    </section>
  {/if}
  <section class='article-video text-center'>
    {$autoplay = $video->autoplay ? "autoplay='autoplay'" : ''}
    {$poster = isset($video->image->primary) ?  "poster='{{$video->image->primary->fullURL}}'" : ''}
    <video id='videoPlayer' class='video-js vjs-default-skin vjs-big-play-centered vjs-fluid'
      controls preload='auto' loop='loop'
      data-setup='{}'
      oncontextmenu='return false;'
      {$autoplay }
      {$poster } >
      {$videos = explode(';', $video->videoLink);}
      {foreach($videos as $link)}
      <source src='{$control->loadModel('guarder')->processURL($link)}' />
      {/foreach}
    </video>
  </section>
  <div class='panel-body'>
    <hr class="space">
    <section class='video-content'>
      {$video->content}
    </section>
  </div>
  {if(!empty($video->files))}
    <section class="video-files">
      {$control->loadModel('file')->printFiles($video->files)}
    </section>
  {/if}
  <div class='panel-footer'>
    <div class='video-moreinfo clearfix hide'>
      {if($video->editor)}
        {$editor = $control->loadModel('user')->getByAccount($video->editor)}
        {if(!empty($editor))}
          <p class='text-right pull-right'>{!printf($lang->article->lblEditor, $editor->realname, formatTime($video->editedDate))}</p>
        {/if}
      {/if}
      {if($video->keywords)}
        <p class='small'>
          <strong class="text-muted">{$lang->article->keywords}</strong>
          <span class="video-keywords">{!echo $lang->colon . $video->keywords}</span>
        </p>
      {/if}
    </div>
    {@extract($prevAndNext)}
    <ul class='pager pager-justify'>
      {if($prev)}
        <li class='previous'>{!html::a(inlink('view', "id=$prev->id", "category={{$category->alias}}&name={{$prev->alias}}"), '<i class="icon-arrow-left"></i> ' . $lang->article->previous, "title='{{$prev->title}}'")}</li>
      {else}
        <li class='previous disabled'><a href='###'><i class='icon-arrow-left'></i> {!print($lang->article->none)}</a></li>
      {/if}
      {if($next)}
        <li class='next'>{!html::a(inlink('view', "id=$next->id", "category={{$category->alias}}&name={{$next->alias}}"), $lang->article->next . ' <i class="icon-arrow-right"></i>', "title='{{$next->title}}'")}</li>
      {else}
        <li class='next disabled'><a href='###'>{!print($lang->article->none)}<i class='icon-arrow-right'></i></a></li>
      {/if}
    </ul>
  </div>
</div> 

{if(commonModel::isAvailable('message'))}
  <div id='commentBox'></div>
{/if}

<div class='block-region region-video-view-bottom blocks' data-region='video_view-bottom'>{$control->loadModel('block')->printRegion($layouts, 'video_view', 'bottom')}</div>
<script>
$(function()
{
    $('#commentBox').load('{!helper::createLink('message', 'comment', "objectType=video&objectID=$video->id", 'mhtml')}');
});
</script>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
