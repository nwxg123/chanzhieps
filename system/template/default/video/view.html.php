{include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'header')}

{* /* set categoryPath for topNav highlight. */ *}
{!js::set('path', $video->path)}
{!js::set('objectType', 'article')}
{!js::set('objectID', $video->id)}
{!js::set('categoryID', $category->id)}
{!js::set('categoryPath', explode(',', trim($category->path, ',')))}
{if(isset($video->css))} {!css::internal($video->css)} {/if}
{if(isset($video->js))} {!js::execute($video->js)} {/if}
{!js::set('pageLayout', $control->block->getLayoutScope('video_view', $video->id))}
{!js::import($jsRoot . 'videojs/video.min.js')}
{!css::import($jsRoot . 'videojs/video-js.min.css')}
{$common->printPositionBar($category, $video)}
<div class='row blocks' data-region='video_view-topBanner'>{$control->block->printRegion($layouts, 'video_view', 'topBanner', true)}</div>
<div class='row' id='columns' data-page='video_view'>
  {if(!empty($layouts['video_view']['side']) and !empty($sideFloat) && $sideFloat != 'hidden')}
    <div class="col-md-{!echo 12 - $sideGrid} col-main{if($sideFloat === 'left')} {!echo ' pull-right' } {/if}">
  {else}
    <div class='col-md-12'>
  {/if}
    <div class='row blocks' data-region='video_view-top'>{$control->block->printRegion($layouts, 'video_view', 'top', true)}</div>
    <div class='article' id='article' data-id='{$video->id}'>
      <header>
        <h1>{$video->title}</h1>
        <dl class='dl-inline'>
          <dd data-toggle='tooltip' data-placement='top' data-original-title='{!printf($lang->article->lblAddedDate, formatTime($video->addedDate))}'><i class='icon-time icon-large'></i> {!formatTime($video->addedDate)}</dd>
          <dd data-toggle='tooltip' data-placement='top' data-original-title='{!printf($lang->article->lblAuthor, $video->author)}'><i class='icon-user icon-large'></i> {$video->author}</dd>
          {if($video->source != 'original' and $video->copyURL != '')}
            <dt>{!echo $lang->article->sourceList[$video->source] . $lang->colon}</dt>
            {if($video->source == 'article')}
              {$video->copyURL = $control->loadModel('common')->getSysURL() . $control->loadModel('article')->createPreviewLink($video->copyURL)}
            {/if}
            <dd>{!echo $video->copyURL ? print(html::a($video->copyURL, $video->copySite, "target='_blank'")) : print($video->copySite)}</dd>
          {else}
            <span class='label label-success'>{$lang->article->sourceList[$video->source]}</span>
          {/if}
          <dd class='pull-right'>
            {if(!empty($control->config->oauth->sina))}
              {$sina = json_decode($control->config->oauth->sina)}
              {if(isset($sina->widget))} <div class='sina-widget'>{$sina->widget}</div> {/if}
            {/if}
            <span class='label label-warning' data-toggle='tooltip' data-placement='top' data-original-title='{!printf($lang->article->lblViews, $video->views)}'><i class='icon-eye-open'></i> {$video->views}</span>
          </dd>
        </dl>
        {if($video->summary)}
          <section class='abstract'><strong>{$lang->article->summary}</strong>{!echo $lang->colon . $video->summary}</section>
        {/if}
      </header>
      <section class='article-video text-center'>
        {$autoplay = isset($video->autoplay) ? "autoplay='autoplay'" : ''}
        {$poster   = isset($video->image->primary) ?  "poster='{{$video->image->primary->fullURL}}'" : ''}
        {$width    = isset($videoInfo->width) ? $videoInfo->width : ''}
        {$height   = isset($videoInfo->height) ? $videoInfo->height : ''}
        <video id='videoPlayer' controls='controls'
          width='{$width}'
          height='{$height}'
          {$autoplay}
          {$poster}>
          {$videos = explode(';', $video->videoLink);}
          {foreach($videos as $link)}
          <source src='{$control->loadModel('guarder')->processURL($link)}' />
          {/foreach}
        </video>
      </section>
      <section class='article-content'>
        {$video->content}
      </section>
      {if(!empty($video->files))}
        <section class="article-files">
          {$control->loadModel('file')->printFiles($video->files)}
        </section>
      {/if}
      <footer>
        <div class='article-moreinfo clearfix'>
          {if($video->editor)}
            {$editor = $control->loadModel('user')->getByAccount($video->editor)}
            {if(!empty($editor))}
              <p class='text-right pull-right'>{!printf($lang->article->lblEditor, $editor->realname, formatTime($video->editedDate))}</p>
            {/if}
          {/if}
          {if($video->keywords)}
            <p class='small'><strong class="text-muted">{$lang->article->keywords}</strong><span class="video-keywords">{!echo $lang->colon . $video->keywords}</span></p>
          {/if}
        </div>
        {@extract($prevAndNext)}
        <ul class='pager pager-justify'>
          {if($prev)}
            <li class='previous'>{!html::a(inlink('view', "id=$prev->id", "category={{$category->alias}}&name={{$prev->alias}}"), '<i class="icon-arrow-left"></i> ' . $prev->title)}</li>
          {else}
            <li class='preious disabled'><a href='###'><i class='icon-arrow-left'></i> {!print($lang->article->none)}</a></li>
          {/if}
          {if($next)}
            <li class='next'>{!html::a(inlink('view', "id=$next->id", "category={{$category->alias}}&name={{$next->alias}}"), $next->title . ' <i class="icon-arrow-right"></i>')}</li>
          {else}
            <li class='next disabled'><a href='###'> {!print($lang->article->none)}<i class='icon-arrow-right'></i></a></li>
          {/if}
        </ul>
      </footer>
    </div>
    <div class='row blocks' data-region='video_view-bottom'>{$control->block->printRegion($layouts, 'video_view', 'bottom', true)}</div>
    {if(commonModel::isAvailable('message'))}
      <div id='commentBox'>
        {$control->fetch('message', 'comment', "objectType=article&objectID=$video->id")}
      </div>
    {/if}
  </div>
  {if(!empty($layouts['video_view']['side']) and !(empty($sideFloat) || $sideFloat === 'hidden'))}
    <div class='col-md-{$sideGrid} col-side'><side class='page-side blocks' data-region='video_view-side'>{$control->block->printRegion($layouts, 'video_view', 'side')}</side></div>
  {/if}
</div>
<div class='row blocks' data-region='video_view-bottomBanner'>{$control->block->printRegion($layouts, 'video_view', 'bottomBanner', true)}</div>
{if(strpos($video->content, '<embed') !== false)} {include TPL_ROOT . 'common/jplayer.html.php'} {/if}
{include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'footer')}
