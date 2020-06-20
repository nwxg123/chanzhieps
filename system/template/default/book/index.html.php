{if(!defined("RUN_MODE"))} {!die()} {/if}
{include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'header')}
<div class='panel'>
  <div class='panel-heading'><strong>{!echo $lang->book->list}</strong></div>
    <div class='row'>
      {foreach($books as $book)}
      <div class='col-xs-6 col-sm-4 col-md-3'>
        <div class='card'>
          <div class='card-heading'>
            {!html::a($control->createLink('book', 'browse', "nodeID=$book->id", "book=$book->alias") . ($control->get->fullScreen ? "?fullScreen={{$control->get->fullScreen}}" : ''), $book->title, "title='{{$book->title}}'")}
          </div>
          <i class='icon icon-columns'></i>
          <div class='card-content text-muted' title="{!echo $book->summary}">{!echo $book->summary ? $book->summary : $lang->book->noDesc}</div>
        </div>
      </div>
      {/foreach}
      {if($pager->pageTotal > 1)}
      <div class='col-xs-12 col-sm-12 col-md-12 pull-left'>{$pager->show('right', 'short')}</div>
      {/if}
    </div>
  </div>
</div>
{include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'footer')}
