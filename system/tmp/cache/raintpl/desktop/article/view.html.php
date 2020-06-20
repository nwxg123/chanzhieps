<?php if(!class_exists('raintpl')){exit;}?><?php if(!defined("RUN_MODE")){ ?>





<?php echo die(); ?>

<?php } ?>

<?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'common', 'header'));?>





<?php echo js::set('path', $article->path); ?>





<?php echo js::set('objectType', 'article'); ?>





<?php echo js::set('objectID', $article->id); ?>





<?php echo js::set('categoryID', $category->id); ?>





<?php echo js::set('categoryPath', explode(',', trim($category->path, ','))); ?>





<?php if(isset($article->css)){ ?>





<?php echo css::internal($article->css); ?>

<?php } ?>

<?php if(isset($article->js)){ ?>





<?php echo js::execute($article->js); ?>

<?php } ?>

<?php echo js::set('pageLayout', $control->block->getLayoutScope('article_view', $article->id)); ?>





<?php echo $common->printPositionBar($category, $article);?>





<div class='row blocks' data-region='article_view-topBanner'><?php echo $control->block->printRegion($layouts, 'article_view', 'topBanner', true);?>




</div>
<div class='row' id='columns' data-page='article_view'>
<?php if(!empty($layouts['article_view']['side']) and !empty($sideFloat) && $sideFloat != 'hidden'){ ?>





  <div class="col-md-<?php echo 12 - $sideGrid; ?> col-main<?php echo ($sideFloat === 'left') ? ' pull-right' : ''; ?>">
<?php }else{ ?>

  <div class='col-md-12'>
<?php } ?>

    <div class='row blocks' data-region='article_view-top'><?php echo $control->block->printRegion($layouts, 'article_view', 'top', true);?>




</div>
    <div class='article' id='article' data-id='<?php echo $article->id;?>'>
      <header>
        <h1><?php echo $article->title;?></h1>
        <dl class='dl-inline'>
          <dd data-toggle='tooltip' data-placement='top' data-original-title='<?php printf($lang->article->lblAddedDate, formatTime($article->addedDate)); ?>




'><i class='icon-time icon-large'></i> <?php echo formatTime($article->addedDate); ?>




</dd>
          <dd data-toggle='tooltip' data-placement='top' data-original-title='<?php printf($lang->article->lblAuthor, $article->author); ?>




'><i class='icon-user icon-large'></i> <?php echo $article->author;?></dd>
          <?php if($article->source != 'original' and $article->copyURL != ''){ ?>





            <dt><?php echo $lang->article->sourceList[$article->source] . $lang->colon; ?></dt>
            <?php if($article->source == 'article'){ ?>





<?php $article->copyURL = $sysURL . $control->article->createPreviewLink($article->copyURL);$this->var['article'] = $article;?>

<?php } ?>

            <dd><?php echo $article->copyURL ? html::a($article->copyURL, $article->copySite, "target='_blank'") : $article->copySite; ?></dd>
          <?php }else{ ?>

            <span class='label label-success'><?php echo $lang->article->sourceList[$article->source];?></span>
          <?php } ?>

          <dd class='pull-right'>
            <?php if(!empty($control->config->oauth->sina)){ ?>





              <?php $sina=$this->var['sina'] = json_decode($control->config->oauth->sina);?>





              <?php if(isset($sina->widget)){ ?>




 <div class='sina-widget'><?php echo $sina->widget;?></div> <?php } ?>

<?php } ?>

            <span class='label label-warning' data-toggle='tooltip' data-placement='top' data-original-title='<?php printf($lang->article->lblViews, $config->viewsPlaceholder); ?>




'><i class='icon-eye-open'></i> <?php echo $config->viewsPlaceholder;?></span>
          </dd>
        </dl>
        <?php if($article->summary){ ?>





          <section class='abstract'><strong><?php echo $lang->article->summary;?></strong><?php echo $lang->colon . $article->summary; ?></section>
        <?php } ?>

      </header>
      <section class='article-content'>
        <?php echo $article->content;?>

      </section>
      <?php if(!empty($article->files)){ ?>





        <section class="article-files">
          <?php echo $control->loadModel('file')->printFiles($article->files);?>





        </section>
      <?php } ?>

      <footer>
        <div class='article-moreinfo clearfix'>
          <?php if($article->editor){ ?>





            <?php $editor=$this->var['editor'] = $control->loadModel('user')->getByAccount($article->editor);?>





            <?php if(!empty($editor)){ ?>




 <p class='text-right pull-right'><?php printf($lang->article->lblEditor, $editor->realname, formatTime($article->editedDate)); ?>




</p> <?php } ?>

<?php } ?>

          <?php if($article->keywords){ ?>




 <p class='small'><strong class="text-muted"><?php echo $lang->article->keywords;?></strong><span class="article-keywords"><?php echo $lang->colon . $article->keywords; ?></span></p> <?php } ?>

        </div>
        <?php extract($prevAndNext); ?>





        <ul class='pager pager-justify'>
        <?php if($prev){ ?>





          <li class='previous' title='<?php echo $prev->title;?>'><?php echo html::a(inlink('view', "id=$prev->id", "category={$category->alias}&name={$prev->alias}"), '<i class="icon-arrow-left"></i> <span>' . $prev->title . '</span>'); ?>




</li>
        <?php }else{ ?>

          <li class='preious disabled'><a href='###'><i class='icon-arrow-left'></i> <?php print($lang->article->none); ?>




</a></li>
        <?php } ?>

        <?php if($next){ ?>





          <li class='next' title='<?php echo $next->title;?>'><?php echo html::a(inlink('view', "id=$next->id", "category={$category->alias}&name={$next->alias}"), '<span>' . $next->title . '</span> <i class="icon-arrow-right"></i>'); ?>




</li>
        <?php }else{ ?>

          <li class='next disabled'><a href='###'> <?php print($lang->article->none); ?>




<i class='icon-arrow-right'></i></a></li>
        <?php } ?>

        </ul>
      </footer>
    </div>
    <div class='row blocks' data-region='article_view-bottom'><?php echo $control->block->printRegion($layouts, 'article_view', 'bottom', true);?>




</div>
    <?php if(commonModel::isAvailable('message')){ ?>





    <div id='commentBox'>
      <?php echo $control->fetch('message', 'comment', "objectType=article&objectID=$article->id");?>





    </div>
    <?php } ?>

  </div>
  <?php if(!empty($layouts['article_view']['side']) and !(empty($sideFloat) || $sideFloat === 'hidden')){ ?>




 <div class='col-md-<?php echo $sideGrid;?> col-side'><side class='page-side blocks' data-region='article_view-side'><?php echo $control->block->printRegion($layouts, 'article_view', 'side');?>




</side></div> <?php } ?>

</div>
<div class='row blocks' data-region='article_view-bottomBanner'><?php echo $control->block->printRegion($layouts, 'article_view', 'bottomBanner', true);?>




</div>
<?php if(strpos($article->content, '<embed') !== false){ ?>





  <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw(TPL_ROOT . 'common/video.html.php');?>

<?php } ?>

<?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'common', 'footer'));?>





