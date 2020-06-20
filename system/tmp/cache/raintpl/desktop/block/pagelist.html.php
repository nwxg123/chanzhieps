<?php if(!class_exists('raintpl')){exit;}?><?php if(!defined("RUN_MODE")){ ?>

<?php echo die(); ?>

<?php } ?>



<?php $content=$this->var['content'] = json_decode($block->content);?>

<?php $pages=$this->var['pages']   = $model->loadModel('article')->getPageList($content->limit);?>

<?php if(isset($content->image)){ ?>

<?php $pages=$this->var['pages'] = $model->loadModel('file')->processImages($pages, 'page');?>

<?php } ?>


<div id="block<?php echo $block->id; ?>" class='panel panel-block <?php echo $blockClass; ?>'>
  <div class='panel-heading'>
    <strong><?php echo $icon . $block->title; ?></strong>
    <?php if(!empty($content->moreText) and !empty($content->moreUrl)){ ?>

    <div class='pull-right'><?php echo html::a($content->moreUrl, $content->moreText); ?></div>
    <?php } ?>

  </div>
  <?php if(isset($content->image)){ ?>

    <?php $pull=$this->var['pull']     = $content->imagePosition == 'right' ? 'pull-right' : 'pull-left';?>

    <?php $imageURL=$this->var['imageURL'] = !empty($content->imageSize) ? $content->imageSize . 'URL' : 'smallURL';?>

    <div class='panel-body'>
      <div class='items'>
      <?php foreach($pages as $page): ?>

      <?php $url=$this->var['url'] = helper::createLink('page', 'view', "id=$page->id", "name=$page->alias");?>

      <div class='item'>
        <div class='item-heading'><strong><?php echo html::a($url, $page->title, "style='color:{$page->titleColor}'"); ?></strong></div>
        <div class='item-content'>
          
          <div class='text small text-muted'>
            <div class='media <?php echo $pull; ?>' style="max-width: <?php echo !empty($content->imageWidth) ? $content->imageWidth . 'px' : '60px'; ?>">
            <?php if(!empty($page->image)){ ?>

              <?php $title=$this->var['title'] = $page->image->primary->title ? $page->image->primary->title : $page->title;?>

              <?php $page->image->primary->objectType = 'article';$this->var['page'] = $page;?>

              <?php echo html::a($url, html::image($model->loadModel('file')->printFileURL($page->image->primary, $imageURL), "title='$title' class='thumbnail'" )); ?>

<?php } ?>

            </div>
            <strong class='text-important text-nowrap'>
              <?php if(isset($content->time)){ ?>

<?php echo "<i class='icon-time'></i> " . formatTime($page->addedDate, DT_DATE4); ?>

<?php } ?>

            </strong> 
            &nbsp;<?php echo $page->summary; ?>

          </div>
        </div>
      </div>
      <?php endforeach; ?>

      </div>
    </div>
  <?php }else{ ?>

    <div class='panel-body'>
      <ul class='ul-list'>
        <?php foreach($pages as $page): ?>

          <?php $url=$this->var['url'] = helper::createLink('page', 'view', "id={$page->id}", "name={$page->alias}");?>

          <?php if(isset($content->time)){ ?>

          <li>
            <?php echo html::a($url, $page->title, "title='{$page->title}' style='color:{$page->titleColor}'"); ?>

            <span class='pull-right'><?php echo substr($page->addedDate, 0, 10); ?></span>
          </li>
          <?php }else{ ?>

            <li><?php echo html::a($url, $page->title, "title='{$page->title}' style='color:{$page->titleColor}'"); ?></li>
          <?php } ?>

        <?php endforeach; ?>

      </ul>
    </div>
  <?php } ?>

</div>
