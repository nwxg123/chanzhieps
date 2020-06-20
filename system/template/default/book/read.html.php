{if(!defined("RUN_MODE"))} {!die()} {/if}
{if(!empty($control->config->book->fullScreen) or $control->get->fullScreen)}
  {include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'header.lite')}
  {!js::set('objectType', 'book')}
  {!js::set('objectID', $article->id)}
  {!js::set('fullScreen', 1)}
  <div class='fullScreen-book'>
    <div class='fullScreen-header'>
      {if($logo)}
        <div id='siteLogo' data-ve='logo'>
          {!html::a(helper::createLink('index'), html::image($control->loadModel('file')->printFileURL($logo)), "class='logo' alt='{{$config->company->name}}' title='{{$config->company->name}}'")}
        </div>
      {else}
        <div id='siteName' data-ve='logo'><h2>{!html::a(helper::createLink('index'), $config->site->name)}</h2></div>
      {/if}
      <div class='divider-line pull-left'></div>
      <div class='pull-left title strong'>{!echo $lang->book->common}</div>
      <div class='header-right'>
      {if(isset($config->book->index) and $config->book->index == 'list')}
      {!html::a(inlink('index'), $lang->book->list, "class='fullScreen-btn'")}
      {/if}
      {!html::a(helper::createLink('index'), $lang->book->goHome, "class='fullScreen-btn'")}
      </div>
      <div class='book-search'>
        <form action='{!inLink('searchfront')}' method='get' role='search'>
          <div class='input-group'>
            <input type='text' name='nodeID' id='nodeID' value='{!echo $nodeID}' class='hide'/>
            <input type='text' name='words' id='words' value='{!echo $words}' class='form-control' placeholder='{!echo $lang->book->searchBookPlaceholder}'/>
            <div class='input-group-btn'>
              <button class='btn btn-default' type='submit'><i class='icon icon-search'></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class='fullScreen-catalog pANeli bookScrollListsBox'>
      {if(!empty($book) && $book->title)}
        <div class='panel-heading clearfix'>
          <div class='dropdown pull-left'><i class="icon icon-book"></i> <strong>{!echo $book->title}</strong> </div>
          <div class='pull-right home'>
            <a href='javascript:;' data-toggle='dropdown' class='dropdown-toggle'><strong>{!echo $lang->more}</strong> <i class='icon-caret-down'></i></a>
            <ul role='menu' class='dropdown-menu'>
              {foreach($books as $bookMenu)}
              <li>{!html::a(inlink("browse", "id=$bookMenu->id", "book=$bookMenu->alias") . ($control->get->fullScreen ? "?fullScreen={{$control->get->fullScreen}}" : ''), $bookMenu->title)}</li>
              {/foreach}
            </ul>
          </div>
        </div>
      {/if}
      <div class='panel-body'>
        <div class='books'>
          {if(!empty($bookInfoLink) and !empty($book->content))} {!echo "<span id='bookInfoLink'>" . $bookInfoLink . "</span>"} {/if}
          {if(!empty($allCatalog))} {!echo $allCatalog} {/if}
        </div>
        <div class='powerby'>{!printf($lang->poweredBy, $config->version, k(), "<span class='icon icon-chanzhi'><i class='ic1'></i><i class='ic2'></i><i class='ic3'></i><i class='ic4'></i><i class='ic5'></i><i class='ic6'></i><i class='ic7'></i></span> <span class='name'>" . $lang->chanzhiEPSx . '</span>' . $config->version)}</div>
      </div>
    </div>
    <div class='fullScreen-content'>
      <div class='fullScreen-inner'>
        <header>
          <h2>{!echo $article->title}</h2>
          <dl class='dl-inline'>
            <dd data-toggle='tooltip' data-placement='top' data-original-title='{!printf($lang->book->lblViews, $article->views)}'><i class='icon-eye-open'></i> {!echo $config->viewsPlaceholder}</dd>
            <dd data-toggle='tooltip' data-placement='top' data-original-title='{!printf($lang->book->lblAuthor, $article->author)}'><i class='icon-user icon-large'></i> {!echo $article->author}</dd>
            <dd data-toggle='tooltip' data-placement='top' data-original-title='{!printf($lang->book->lblAddedDate, formatTime($article->addedDate))}'><i class='icon-time icon-large'></i> {!echo formatTime($article->addedDate)}</dd>
          </dl>
          {if($article->summary and $article->type != 'book')}
            <section class='abstract'><strong>{!echo $lang->book->summary}</strong>{!echo $lang->colon . $article->summary}</section>
          {/if}
        </header>
        <section class='article-content'>{$article->content}</section>
        <section>{$control->loadModel('file')->printFiles($article->files)}</section>
        {if(isset($prevAndNext))}
          {@extract($prevAndNext)}
          {if($prev)}
            <div class='icon-previous'>{!html::a(inlink('read', "articleID=$prev->id", "book={{$book->alias}}&node={{$prev->alias}}") . ($control->get->fullScreen ? "?fullScreen={{$control->get->fullScreen}}" : ''), "<i class='icon icon-chevron-left'></i>")}</div>
          {else}
            <div class='icon-previous disabled'><i class="icon icon-chevron-left"></i></div>
          {/if}
          {if($next)}
            <div class='icon-next'>{!html::a(inlink('read', "articleID=$next->id", "book={{$book->alias}}&node={{$next->alias}}") . ($control->get->fullScreen ? "?fullScreen={{$control->get->fullScreen}}" : ''), "<i class='icon icon-chevron-right'></i>")}</div>
          {else}
            <div class='icon-next disabled'><i class="icon icon-chevron-right"></i></div>
          {/if}
        {/if}
        <footer>
          {if($article->keywords)}
            <p class='small'><strong class='text-muted'>{$lang->book->keywords}</strong><span class='article-keywords'>{!echo $lang->colon . $article->keywords}</span></p>
          {/if}
          {if(isset($prevAndNext))}
            {@extract($prevAndNext)}
            <ul class='pager pager-justify'>
              {if($prev)}
                <li class='previous' title='{!echo $prev->title}'>{!html::a(inlink('read', "articleID=$prev->id", "book={{$book->alias}}&node={{$prev->alias}}") . ($control->get->fullScreen ? "?fullScreen={{$control->get->fullScreen}}" : ''), "<i class='icon-arrow-left'></i> <span>" . $prev->title . '</span>')}</li>
              {else}
                <li class='previous disabled'><a href='###'><i class='icon-arrow-left'></i> {!print($lang->book->none)}</a></li>
              {/if}
              {if(!$control->get->fullScreen)}
                <li class='back'>{!html::a(inlink('browse', "bookID{{$parent->id}}", "book={{$book->alias}}&title={{$parent->alias}}") . ($control->get->fullScreen ? "?fullScreen={{$control->get->fullScreen}}" : ''), "<i class='icon-list-ul'></i> " . $lang->book->chapter)}</li>
              {/if}
              {if($next)}
                <li class='next' title='{!echo $next->title}'>{!html::a(inlink('read', "articleID=$next->id", "book={{$book->alias}}&node={{$next->alias}}") . ($control->get->fullScreen ? "?fullScreen={{$control->get->fullScreen}}" : ''), '<span>' . $next->title . "</span> <i class='icon-arrow-right'></i>")}</li>
              {else}
                <li class='next disabled'><a href='###'> {!print($lang->book->none)}<i class='icon-arrow-right'></i></a></li>
              {/if}
            </ul>
          {/if}
        </footer>
        {if(commonModel::isAvailable('message'))}
        <div id='commentBox'>
          {!echo $control->fetch('message', 'comment', "objectType=book&objectID={{$article->id}}")}
        </div>
        {/if}
        <div class='blocks' data-region='book_read-bottom'>{$control->block->printRegion($layouts, 'book_read', 'bottom')}</div>
        <input type='text' id='id' value='{!echo $article->id}' class='hide'/>
      </div>
    </div>
    <div class='fullScreen-nav'>{$article->nav}</div>
  </div>
  {include TPL_ROOT . 'common/video.html.php'}
  {if($config->debug)} {!js::import($jsRoot . 'jquery/form/min.js')} {/if}
  {if(isset($pageJS))} {!js::execute($pageJS)} {/if}
  </body>
  </html>
{else}
  {include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'header')}
  {!js::set('objectType', 'book')}
  {!js::set('objectID', $article->id)}
  <div class='row blocks' data-region='book_read-top'>{$control->block->printRegion($layouts, 'book_read', 'top', true)}</div>
  {$common->printPositionBar($article->origins)}
  <div class='row'>
    <div class='col-md-3'>
      <div class='panel book-catalog bookScrollListsBox'>
        {if(!empty($book) && $book->title)}
          <div class='panel-heading clearfix'>
            <div class='dropdown pull-left'>
            <a href='javascript:;' data-toggle='dropdown' class='dropdown-toggle'><i class="icon icon-book"></i><strong>{!echo $book->title}</strong> <span>{!echo $lang->book->more}<i class='icon icon-caret-down'></i></span></a>
              <ul role='menu' class='dropdown-menu'>
                {foreach($books as $bookMenu)}
                  <li>{!html::a(inlink("browse", "id=$bookMenu->id", "book=$bookMenu->alias") . ($control->get->fullScreen ? "?fullScreen={{$control->get->fullScreen}}" : ''), $bookMenu->title)}</li>
                {/foreach}
              </ul>
            </div>
            <div class='pull-right home hide'><a href='/' title='{!echo $lang->book->goHome}'><i class='icon-home'></i></a></div>
          </div>
        {/if}
        <div class='panel-body'>
          <div class='books'>
            {if(!empty($bookInfoLink) and !empty($book->content))} {!echo "<span id='bookInfoLink'>" . $bookInfoLink . "</span>"} {/if}
            {if(!empty($allCatalog))} {!echo $allCatalog} {/if}
          </div>
        </div>
      </div>
    </div>
    <div class='col-md-9'>
      <div class='article book-content' id='book' data-id='{$article->id}'>
        <header>
          <h2>{!echo $article->title}</h2>
          <dl class='dl-inline'>
            <dd data-toggle='tooltip' data-placement='top' data-original-title='{!printf($lang->book->lblAddedDate, formatTime($article->addedDate))}'><i class='icon-time icon-large'></i> {!echo formatTime($article->addedDate)}</dd>
            <dd data-toggle='tooltip' data-placement='top' data-original-title='{!printf($lang->book->lblAuthor, $article->author)}'><i class='icon-user icon-large'></i> {!echo $article->author}</dd>
            <dd data-toggle='tooltip' data-placement='top' data-original-title='{!printf($lang->book->lblViews, $article->views)}'><i class='icon-eye-open'></i> {!echo $config->viewsPlaceholder}</dd>
            {if($article->editor)}
            <dd data-toggle='tooltip' data-placement='top' ><i class='icon-edit icon-large'></i>{!printf($lang->book->lblEditor, $control->loadModel('user')->getByAccount($article->editor)->realname, formatTime($article->editedDate))}</dd>
            {/if}
          </dl>
          {if($article->summary and $article->type != 'book')}
            <section class='abstract'><strong>{!echo $lang->book->summary}</strong>{!echo $lang->colon . $article->summary}</section>
          {/if}
        </header>
        <section class='article-content'>{$article->content}</section>
        <section>{$control->loadModel('file')->printFiles($article->files)}</section>
        <footer>
          {if($article->keywords)}
            <p class='small'><strong class='text-muted'>{!echo $lang->book->keywords}</strong><span class='article-keywords'>{!echo $lang->colon . $article->keywords}</span></p>
          {/if}
          {if(isset($prevAndNext))}
            {@extract($prevAndNext)}
            <ul class='pager pager-justify'>
              {if($prev)}
                <li class='previous' title='{!echo $prev->title}'>{!html::a(inlink('read', "articleID=$prev->id", "book={{$book->alias}}&node={{$prev->alias}}") . ($control->get->fullScreen ? "?fullScreen={{$control->get->fullScreen}}" : ''), "<i class='icon-arrow-left'></i> <span>" . $prev->title . '</span>')}</li>
              {else}
                <li class='previous disabled'><a href='###'><i class='icon-arrow-left'></i> {!print($lang->book->none)}</a></li>
              {/if}
              {if(!$control->get->fullScreen)}
                <li class='back'> {!html::a(inlink('browse', "bookID={{$parent->id}}", "book={{$book->alias}}&title={{$parent->alias}}") . ($control->get->fullScreen ? "?fullScreen={{$control->get->fullScreen}}" : ''), "<i class='icon-list-ul'></i> " . $lang->book->chapter)} </li>
              {/if}
              {if($next)}
                <li class='next' title='{!echo $next->title}'>{!html::a(inlink('read', "articleID=$next->id", "book={{$book->alias}}&node={{$next->alias}}") . ($control->get->fullScreen ? "?fullScreen={{$control->get->fullScreen}}" : ''), '<span>' . $next->title . "</span> <i class='icon-arrow-right'></i>")}</li>
              {else}
                <li class='next disabled'><a href='###'> {!print($lang->book->none)}<i class='icon-arrow-right'></i></a></li>
              {/if}
            </ul>
          {/if}
        </footer>
        <input type='text' id='id' value='{!echo $article->id}' class='hide'/>
      </div>
      {if(commonModel::isAvailable('message'))} {!echo "<div id='commentBox'>" . $control->fetch('message', 'comment', "objectType=book&objectID={{$article->id}}") . "</div>"} {/if}
      <div class='blocks' data-region='book_read-bottom'>{$control->block->printRegion($layouts, 'book_read', 'bottom')}</div>
    </div>
  </div>
  {include TPL_ROOT . 'common/video.html.php'}
  {include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'footer')}
{/if}
