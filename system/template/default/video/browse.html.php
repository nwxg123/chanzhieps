{include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'header')}
{$path = array_keys($category->pathNames)}
{!js::set('path', $path)}
{!js::set('categoryID', $category->id)}
{!js::set('pageLayout', $control->block->getLayoutScope('video_browse', $category->id))}
{!$common->printPositionBar($category)}
<div class='row blocks' data-region='video_browse-topBanner'>{$control->block->printRegion($layouts, 'video_browse', 'topBanner', true)}</div>
<div class='row' id='columns' data-page='video_browse'>
  {if(!empty($layouts['video_browse']['side']) and !empty($sideFloat) && $sideFloat != 'hidden')}
    <div class="col-md-{!echo 12 - $sideGrid} col-main{if($sideFloat === 'left')} {!echo ' pull-right' } {/if}" id="mainContainer">
  {else}
    <div class="col-md-12" id="mainContainer">
  {/if}
    <div class='list list-condensed' id='videoList'>
    <div class='row blocks' data-region='video_browse-top'>{$control->block->printRegion($layouts, 'video_browse', 'top', true)}</div>
      <header id='articleHeader'>
        <h2>{$category->name}</h2>
        <div class='header'>{!html::a('javascript:;', $lang->video->default, "data-field='order' class='order setOrder'")}</div>
      </header>
      
      <section class='cards cards-videos' id='videoCard'>
        {foreach($videos as $video)}
          <div class='col-sm-4 col-xs-6'>
            <div class='card' data-ve='video' id='video{$video->id}'>
              {if(empty($video->image))}
                {!html::a(inlink('view', "id=$video->id", "category={{$video->category->alias}}&name=$video->alias"), '<div class="media-placeholder" data-id="' . $video->id . '">' . $video->title. '</div>', "class='media-wrapper'")}
              {else}
                {$title = $video->image->primary->title ? $video->image->primary->title : $video->title}
                {!html::a(inlink('view', "id=$video->id", "category={{$video->category->alias}}&name=$video->alias"), html::image($control->loadModel('file')->printFileURL($video->image->primary, 'middleURL'), "title='{{$title}}' alt='{{$video->title}}'"), "class='media-wrapper'")}
              {/if}
              <div class='card-heading'>
                <div class='text-nowrap text-ellipsis text-center'>
                  {!html::a(inlink('view', "id=$video->id", "category={{$video->category->alias}}&name=$video->alias"), $video->title)}
                  <span data-toggle='tooltip' class='text-muted views-count' title='{!echo $lang->article->views . $lang->colon . $video->views}'><i class="icon icon-eye-open"></i> {$video->views}</span>
                </div>
              </div>
            </div>
          </div>
        {/foreach}
      </section>
      <footer class='clearfix'>{$pager->show('right', 'short')}</footer>
    </div>
    <div class='row blocks' data-region='video_browse-bottom'>{$control->block->printRegion($layouts, 'video_browse', 'bottom', true)}</div>
  </div>
  {if(!empty($layouts['video_browse']['side']) and !(empty($sideFloat) || $sideFloat === 'hidden'))}
    <div class='col-md-{$sideGrid} col-side'><side class='page-side blocks' data-region='video_browse-side'>{$control->block->printRegion($layouts, 'video_browse', 'side')}</side></div>
  {/if}
</div>
<div class='row blocks' data-region='video_browse-bottomBanner'>{$control->block->printRegion($layouts, 'video_browse', 'bottomBanner', true)}</div>
{include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'footer')}
