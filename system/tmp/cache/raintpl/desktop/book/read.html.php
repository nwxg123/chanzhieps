<?php if(!class_exists('raintpl')){exit;}?><?php if(!defined("RUN_MODE")){ ?>

<?php echo die(); ?>

<?php } ?>

<?php if(!empty($control->config->book->fullScreen) or $control->get->fullScreen){ ?>

  <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'common', 'header.lite'));?>

  <?php echo js::set('objectType', 'book'); ?>

  <?php echo js::set('objectID', $article->id); ?>

  <?php echo js::set('fullScreen', 1); ?>

  <div class='fullScreen-book'>
    <div class='fullScreen-header'>
      <?php if($logo){ ?>

        <div id='siteLogo' data-ve='logo'>
          <?php echo html::a(helper::createLink('index'), html::image($control->loadModel('file')->printFileURL($logo)), "class='logo' alt='{$config->company->name}' title='{$config->company->name}'"); ?>

        </div>
      <?php }else{ ?>

        <div id='siteName' data-ve='logo'><h2><?php echo html::a(helper::createLink('index'), $config->site->name); ?></h2></div>
      <?php } ?>

      <div class='divider-line pull-left'></div>
      <div class='pull-left title strong'><?php echo $lang->book->common; ?></div>
      <div class='header-right'>
      <?php if(isset($config->book->index) and $config->book->index == 'list'){ ?>

      <?php echo html::a(inlink('index'), $lang->book->list, "class='fullScreen-btn'"); ?>

<?php } ?>

      <?php echo html::a(helper::createLink('index'), $lang->book->goHome, "class='fullScreen-btn'"); ?>

      </div>
      <div class='book-search'>
        <form action='<?php echo inLink('searchfront'); ?>' method='get' role='search'>
          <div class='input-group'>
            <input type='text' name='nodeID' id='nodeID' value='<?php echo $nodeID; ?>' class='hide'/>
            <input type='text' name='words' id='words' value='<?php echo $words; ?>' class='form-control' placeholder='<?php echo $lang->book->searchBookPlaceholder; ?>'/>
            <div class='input-group-btn'>
              <button class='btn btn-default' type='submit'><i class='icon icon-search'></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class='fullScreen-catalog pANeli bookScrollListsBox'>
      <?php if(!empty($book) && $book->title){ ?>

        <div class='panel-heading clearfix'>
          <div class='dropdown pull-left'><i class="icon icon-book"></i> <strong><?php echo $book->title; ?></strong> </div>
          <div class='pull-right home'>
            <a href='javascript:;' data-toggle='dropdown' class='dropdown-toggle'><strong><?php echo $lang->more; ?></strong> <i class='icon-caret-down'></i></a>
            <ul role='menu' class='dropdown-menu'>
              <?php foreach($books as $bookMenu): ?>

              <li><?php echo html::a(inlink("browse", "id=$bookMenu->id", "book=$bookMenu->alias") . ($control->get->fullScreen ? "?fullScreen={$control->get->fullScreen}" : ''), $bookMenu->title); ?></li>
              <?php endforeach; ?>

            </ul>
          </div>
        </div>
      <?php } ?>

      <div class='panel-body'>
        <div class='books'>
          <?php if(!empty($bookInfoLink) and !empty($book->content)){ ?>

<?php echo "<span id='bookInfoLink'>" . $bookInfoLink . "</span>"; ?>

<?php } ?>

          <?php if(!empty($allCatalog)){ ?>

<?php echo $allCatalog; ?>

<?php } ?>

        </div>
        <div class='powerby'><?php printf($lang->poweredBy, $config->version, k(), "<span class='icon icon-chanzhi'><i class='ic1'></i><i class='ic2'></i><i class='ic3'></i><i class='ic4'></i><i class='ic5'></i><i class='ic6'></i><i class='ic7'></i></span> <span class='name'>" . $lang->chanzhiEPSx . '</span>' . $config->version); ?></div>
      </div>
    </div>
    <div class='fullScreen-content'>
      <div class='fullScreen-inner'>
        <header>
          <h2><?php echo $article->title; ?></h2>
          <dl class='dl-inline'>
            <dd data-toggle='tooltip' data-placement='top' data-original-title='<?php printf($lang->book->lblViews, $article->views); ?>'><i class='icon-eye-open'></i> <?php echo $config->viewsPlaceholder; ?></dd>
            <dd data-toggle='tooltip' data-placement='top' data-original-title='<?php printf($lang->book->lblAuthor, $article->author); ?>'><i class='icon-user icon-large'></i> <?php echo $article->author; ?></dd>
            <dd data-toggle='tooltip' data-placement='top' data-original-title='<?php printf($lang->book->lblAddedDate, formatTime($article->addedDate)); ?>'><i class='icon-time icon-large'></i> <?php echo formatTime($article->addedDate); ?></dd>
          </dl>
          <?php if($article->summary and $article->type != 'book'){ ?>

            <section class='abstract'><strong><?php echo $lang->book->summary; ?></strong><?php echo $lang->colon . $article->summary; ?></section>
          <?php } ?>

        </header>
        <section class='article-content'><?php echo $article->content;?></section>
        <section><?php echo $control->loadModel('file')->printFiles($article->files);?></section>
        <?php if(isset($prevAndNext)){ ?>

          <?php extract($prevAndNext); ?>

          <?php if($prev){ ?>

            <div class='icon-previous'><?php echo html::a(inlink('read', "articleID=$prev->id", "book={$book->alias}&node={$prev->alias}") . ($control->get->fullScreen ? "?fullScreen={$control->get->fullScreen}" : ''), "<i class='icon icon-chevron-left'></i>"); ?></div>
          <?php }else{ ?>

            <div class='icon-previous disabled'><i class="icon icon-chevron-left"></i></div>
          <?php } ?>

          <?php if($next){ ?>

            <div class='icon-next'><?php echo html::a(inlink('read', "articleID=$next->id", "book={$book->alias}&node={$next->alias}") . ($control->get->fullScreen ? "?fullScreen={$control->get->fullScreen}" : ''), "<i class='icon icon-chevron-right'></i>"); ?></div>
          <?php }else{ ?>

            <div class='icon-next disabled'><i class="icon icon-chevron-right"></i></div>
          <?php } ?>

<?php } ?>

        <footer>
          <?php if($article->keywords){ ?>

            <p class='small'><strong class='text-muted'><?php echo $lang->book->keywords;?></strong><span class='article-keywords'><?php echo $lang->colon . $article->keywords; ?></span></p>
          <?php } ?>

          <?php if(isset($prevAndNext)){ ?>

            <?php extract($prevAndNext); ?>

            <ul class='pager pager-justify'>
              <?php if($prev){ ?>

                <li class='previous' title='<?php echo $prev->title; ?>'><?php echo html::a(inlink('read', "articleID=$prev->id", "book={$book->alias}&node={$prev->alias}") . ($control->get->fullScreen ? "?fullScreen={$control->get->fullScreen}" : ''), "<i class='icon-arrow-left'></i> <span>" . $prev->title . '</span>'); ?></li>
              <?php }else{ ?>

                <li class='previous disabled'><a href='###'><i class='icon-arrow-left'></i> <?php print($lang->book->none); ?></a></li>
              <?php } ?>

              <?php if(!$control->get->fullScreen){ ?>

                <li class='back'><?php echo html::a(inlink('browse', "bookID{$parent->id}", "book={$book->alias}&title={$parent->alias}") . ($control->get->fullScreen ? "?fullScreen={$control->get->fullScreen}" : ''), "<i class='icon-list-ul'></i> " . $lang->book->chapter); ?></li>
              <?php } ?>

              <?php if($next){ ?>

                <li class='next' title='<?php echo $next->title; ?>'><?php echo html::a(inlink('read', "articleID=$next->id", "book={$book->alias}&node={$next->alias}") . ($control->get->fullScreen ? "?fullScreen={$control->get->fullScreen}" : ''), '<span>' . $next->title . "</span> <i class='icon-arrow-right'></i>"); ?></li>
              <?php }else{ ?>

                <li class='next disabled'><a href='###'> <?php print($lang->book->none); ?><i class='icon-arrow-right'></i></a></li>
              <?php } ?>

            </ul>
          <?php } ?>

        </footer>
        <?php if(commonModel::isAvailable('message')){ ?>

        <div id='commentBox'>
          <?php echo $control->fetch('message', 'comment', "objectType=book&objectID={$article->id}"); ?>

        </div>
        <?php } ?>

        <div class='blocks' data-region='book_read-bottom'><?php echo $control->block->printRegion($layouts, 'book_read', 'bottom');?></div>
        <input type='text' id='id' value='<?php echo $article->id; ?>' class='hide'/>
      </div>
    </div>
    <div class='fullScreen-nav'><?php echo $article->nav;?></div>
  </div>
  <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw(TPL_ROOT . 'common/video.html.php');?>

  <?php if($config->debug){ ?>

<?php echo js::import($jsRoot . 'jquery/form/min.js'); ?>

<?php } ?>

  <?php if(isset($pageJS)){ ?>

<?php echo js::execute($pageJS); ?>

<?php } ?>

  </body>
  </html>
<?php }else{ ?>

  <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'common', 'header'));?>

  <?php echo js::set('objectType', 'book'); ?>

  <?php echo js::set('objectID', $article->id); ?>

  <div class='row blocks' data-region='book_read-top'><?php echo $control->block->printRegion($layouts, 'book_read', 'top', true);?></div>
  <?php echo $common->printPositionBar($article->origins);?>

  <div class='row'>
    <div class='col-md-3'>
      <div class='panel book-catalog bookScrollListsBox'>
        <?php if(!empty($book) && $book->title){ ?>

          <div class='panel-heading clearfix'>
            <div class='dropdown pull-left'>
            <a href='javascript:;' data-toggle='dropdown' class='dropdown-toggle'><i class="icon icon-book"></i><strong><?php echo $book->title; ?></strong> <span><?php echo $lang->book->more; ?><i class='icon icon-caret-down'></i></span></a>
              <ul role='menu' class='dropdown-menu'>
                <?php foreach($books as $bookMenu): ?>

                  <li><?php echo html::a(inlink("browse", "id=$bookMenu->id", "book=$bookMenu->alias") . ($control->get->fullScreen ? "?fullScreen={$control->get->fullScreen}" : ''), $bookMenu->title); ?></li>
                <?php endforeach; ?>

              </ul>
            </div>
            <div class='pull-right home hide'><a href='/' title='<?php echo $lang->book->goHome; ?>'><i class='icon-home'></i></a></div>
          </div>
        <?php } ?>

        <div class='panel-body'>
          <div class='books'>
            <?php if(!empty($bookInfoLink) and !empty($book->content)){ ?>

<?php echo "<span id='bookInfoLink'>" . $bookInfoLink . "</span>"; ?>

<?php } ?>

            <?php if(!empty($allCatalog)){ ?>

<?php echo $allCatalog; ?>

<?php } ?>

          </div>
        </div>
      </div>
    </div>
    <div class='col-md-9'>
      <div class='article book-content' id='book' data-id='<?php echo $article->id;?>'>
        <header>
          <h2><?php echo $article->title; ?></h2>
          <dl class='dl-inline'>
            <dd data-toggle='tooltip' data-placement='top' data-original-title='<?php printf($lang->book->lblAddedDate, formatTime($article->addedDate)); ?>'><i class='icon-time icon-large'></i> <?php echo formatTime($article->addedDate); ?></dd>
            <dd data-toggle='tooltip' data-placement='top' data-original-title='<?php printf($lang->book->lblAuthor, $article->author); ?>'><i class='icon-user icon-large'></i> <?php echo $article->author; ?></dd>
            <dd data-toggle='tooltip' data-placement='top' data-original-title='<?php printf($lang->book->lblViews, $article->views); ?>'><i class='icon-eye-open'></i> <?php echo $config->viewsPlaceholder; ?></dd>
            <?php if($article->editor){ ?>

            <dd data-toggle='tooltip' data-placement='top' ><i class='icon-edit icon-large'></i><?php printf($lang->book->lblEditor, $control->loadModel('user')->getByAccount($article->editor)->realname, formatTime($article->editedDate)); ?></dd>
            <?php } ?>

          </dl>
          <?php if($article->summary and $article->type != 'book'){ ?>

            <section class='abstract'><strong><?php echo $lang->book->summary; ?></strong><?php echo $lang->colon . $article->summary; ?></section>
          <?php } ?>

        </header>
        <section class='article-content'><?php echo $article->content;?></section>
        <section><?php echo $control->loadModel('file')->printFiles($article->files);?></section>
        <footer>
          <?php if($article->keywords){ ?>

            <p class='small'><strong class='text-muted'><?php echo $lang->book->keywords; ?></strong><span class='article-keywords'><?php echo $lang->colon . $article->keywords; ?></span></p>
          <?php } ?>

          <?php if(isset($prevAndNext)){ ?>

            <?php extract($prevAndNext); ?>

            <ul class='pager pager-justify'>
              <?php if($prev){ ?>

                <li class='previous' title='<?php echo $prev->title; ?>'><?php echo html::a(inlink('read', "articleID=$prev->id", "book={$book->alias}&node={$prev->alias}") . ($control->get->fullScreen ? "?fullScreen={$control->get->fullScreen}" : ''), "<i class='icon-arrow-left'></i> <span>" . $prev->title . '</span>'); ?></li>
              <?php }else{ ?>

                <li class='previous disabled'><a href='###'><i class='icon-arrow-left'></i> <?php print($lang->book->none); ?></a></li>
              <?php } ?>

              <?php if(!$control->get->fullScreen){ ?>

                <li class='back'> <?php echo html::a(inlink('browse', "bookID={$parent->id}", "book={$book->alias}&title={$parent->alias}") . ($control->get->fullScreen ? "?fullScreen={$control->get->fullScreen}" : ''), "<i class='icon-list-ul'></i> " . $lang->book->chapter); ?> </li>
              <?php } ?>

              <?php if($next){ ?>

                <li class='next' title='<?php echo $next->title; ?>'><?php echo html::a(inlink('read', "articleID=$next->id", "book={$book->alias}&node={$next->alias}") . ($control->get->fullScreen ? "?fullScreen={$control->get->fullScreen}" : ''), '<span>' . $next->title . "</span> <i class='icon-arrow-right'></i>"); ?></li>
              <?php }else{ ?>

                <li class='next disabled'><a href='###'> <?php print($lang->book->none); ?><i class='icon-arrow-right'></i></a></li>
              <?php } ?>

            </ul>
          <?php } ?>

        </footer>
        <input type='text' id='id' value='<?php echo $article->id; ?>' class='hide'/>
      </div>
      <?php if(commonModel::isAvailable('message')){ ?>

<?php echo "<div id='commentBox'>" . $control->fetch('message', 'comment', "objectType=book&objectID={$article->id}") . "</div>"; ?>

<?php } ?>

      <div class='blocks' data-region='book_read-bottom'><?php echo $control->block->printRegion($layouts, 'book_read', 'bottom');?></div>
    </div>
  </div>
  <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw(TPL_ROOT . 'common/video.html.php');?>

  <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'common', 'footer'));?>

<?php } ?>

