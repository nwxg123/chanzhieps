<?php if(!class_exists('raintpl')){exit;}?><?php if(!defined("RUN_MODE")){ ?>


<?php echo die(); ?>

<?php } ?>

<?php if($page->onlyBody){ ?>


  <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw(TPL_ROOT . 'common/header.lite.html.php');?>

  <?php echo js::set('pageID', $page->id); ?>


  <?php echo css::internal($page->css); ?>


  <?php echo js::execute($page->js); ?>


  <?php echo $page->content; ?>

<?php }else{ ?>

  <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'common', 'header'));?>


  <?php echo js::set('pageID', $page->id); ?>


  <?php echo css::internal($page->css); ?>


  <?php echo js::execute($page->js); ?>


  <?php echo js::set('pageLayout', $control->block->getLayoutScope('page_view', $page->id)); ?>


  <?php echo $common->printPositionBar($page);?>


  <div class='row blocks' data-region='page_view-topBanner'><?php echo $control->block->printRegion($layouts, 'page_view', 'topBanner', true);?>

</div>
  <div class='row' id='columns' data-page='page_view'>
    <?php if(!empty($layouts['page_view']['side']) and !empty($sideFloat) && $sideFloat != 'hidden'){ ?>


      <div class="col-md-<?php echo 12 - $sideGrid; ?> col-main<?php if($sideFloat === 'left'){ ?>

 pull-right <?php } ?>">
    <?php }else{ ?>

      <div class="col-md-12">
    <?php } ?>

      <div class='row blocks' data-region='page_view-top'><?php echo $control->block->printRegion($layouts, 'page_view', 'top', true);?>

</div>
      <div class='article' id='page<?php echo $page->id; ?>' data-ve='page'>
        <header>
          <h1><?php echo $page->title; ?></h1>
          <dl class='dl-inline'></dl>
          <?php if($page->summary){ ?>


            <section class='abstract'><strong><?php echo $lang->article->summary;?></strong><?php echo $lang->colon . $page->summary; ?></section>
          <?php } ?>

        </header>
        <section class='article-content'>
          <?php echo $page->content; ?>

        </section>
        <?php if(!empty($page->files)){ ?>


        <section><?php echo $control->loadModel('file')->printFiles($page->files);?>

</section>
        <?php } ?>

        <?php if($page->keywords){ ?>


        <footer>
          <p class='small'><strong class="text-muted"><?php echo $lang->article->keywords; ?></strong><span class="article-keywords"><?php echo $lang->colon . $page->keywords; ?></span></p>
        </footer>
        <?php } ?>

      </div>
      <div class='row blocks' data-region='page_view-bottom'><?php echo $control->block->printRegion($layouts, 'page_view', 'bottom', true);?>

</div>
    </div>
    <?php if(!empty($layouts['page_view']['side']) and !(empty($sideFloat) || $sideFloat === 'hidden')){ ?>


    <div class='col-md-<?php echo $sideGrid; ?> col-side'><side class='page-side blocks blocks' data-region='page_view-side'><?php echo $control->block->printRegion($layouts, 'page_view', 'side');?>

</side></div>
    <?php } ?>

  </div>
  <div class='row blocks' data-region='page_view-bottomBanner'><?php echo $control->block->printRegion($layouts, 'page_view', 'bottomBanner', true);?>

</div>
  <?php if(strpos($page->content, '<embed ') !== false){ ?>

 <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw(TPL_ROOT . 'common/video.html.php');?>

<?php } ?>

  <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'common', 'footer'));?>

<?php } ?>

