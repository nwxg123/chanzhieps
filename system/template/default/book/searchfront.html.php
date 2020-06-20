{if(!defined("RUN_MODE"))} {!die()} {/if}
{if(!empty($control->config->book->fullScreen) or $control->get->fullScreen)}
  {include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'header.lite')}
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
        <section class='items items-hover'>
        {foreach($results as $object)}
          <div class='item'>
            <div class='item-heading'>
              <div class="text-muted pull-right">
                <span title="{$lang->object->addedDate}"><i class='icon-time'></i> {!substr($object->editedDate, 0, 10)}</span>
              </div>
              <h4>{!html::a($object->url, $object->title, "target='_blank'")}</h4>
            </div>
            <div class='item-content'>
              {if(!empty($object->image->primary))}
                <div class='media pull-right'>
                  {$title = $object->image->primary->title ? $object->image->primary->title : strip_tags($object->title)}
                  {!html::a($object->url, html::image($control->loadModel('file')->printFileURL($object->image->primary, 'smallURL'), "title='$title' class='thumbnail'" ))}
                </div>
              {/if}
              <div class='text text-muted'>{$object->summary}</div>
            </div>
          </div>
        {/foreach}
      </section>
      <footer class='clearfix'>
        {!str_replace($words, urlencode($words), $pager->get('right', 'short'))}
      </footer>
      </div>
    </div>
    <div class='fullScreen-nav'></div>
  </div>
  {include TPL_ROOT . 'common/video.html.php'}
  {if($config->debug)} {!js::import($jsRoot . 'jquery/form/min.js')} {/if}
  {if(isset($pageJS))} {!js::execute($pageJS)} {/if}
  </body>
  </html>
{else}
{/if}
