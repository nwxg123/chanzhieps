<?php if(!class_exists('raintpl')){exit;}?><?php if(!defined("RUN_MODE")){ ?>

<?php echo die(); ?>

<?php } ?>

<?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'common', 'header'));?>

<?php $path=$this->var['path'] = isset($category->pathNames) ? array_keys($category->pathNames) : array(0);?>

<?php echo js::set('path', $path); ?>

<?php echo js::set('categoryID', $category->id); ?>

<?php echo js::set('pageLayout', $control->block->getLayoutScope('product_browse', $category->id)); ?>

<?php echo $common->printPositionBar($category, isset($product) ? $product : '');?>

<?php echo js::set('defaultMode', $config->product->browseType); ?>

<?php if(isset($productList)){ ?>

  <script><?php echo "place" . md5(time()). "='" . $config->idListPlaceHolder . $productList. $config->idListPlaceHolder . "';"; ?></script>
<?php }else{ ?>

  <script><?php echo "place" . md5(time()) . "='" . $config->idListPlaceHolder . '' . $config->idListPlaceHolder . "';"; ?></script>
<?php } ?>

<div class='row blocks' data-region='product_browse-topBanner'><?php echo $control->block->printRegion($layouts, 'product_browse', 'topBanner', true);?></div>
<div class='row' id='columns' data-page='product_browse'>
  <?php if(!empty($layouts['product_browse']['side']) and !empty($sideFloat) && $sideFloat != 'hidden'){ ?>

  <div class="col-md-<?php echo 12 - $sideGrid; ?> col-main<?php echo $sideFloat === 'left' ? ' pull-right' : ''; ?>" id='mainContainer'>
  <?php }else{ ?>

  <div class='col-md-12' id='mainContainer'>
  <?php } ?>

    <div class='list list-condensed' id='products' data-browse-type="<?php echo $config->product->browseType;?>">
      <div class='row blocks' data-region='product_browse-top'><?php echo $control->block->printRegion($layouts, 'product_browse', 'top', true);?></div>
      <header id='productHeader'>
        <strong><i class='icon-th'></i> <?php echo $category->name; ?></strong>
         <?php echo "<div class='header'>" . html::a('javascript:;', $lang->product->orderBy->time, "data-field='order' class='order setOrder'") . "</div>"; ?>

         <?php echo "<div class='header'>" . html::a('javascript:;', $lang->product->orderBy->hot, "data-field='views' class='views setOrder'") . "</div>"; ?>

        <div class='pull-right btn-group' id="modeControl">
          <?php foreach($lang->product->listMode as $mode => $text): ?>

            <?php echo html::a("javascript:;", $text, "data-mode='$mode' class='btn'"); ?>

          <?php endforeach; ?>

        </div>
      </header>
      <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'product', 'browse.card'));?>

      <?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'product', 'browse.list'));?>

      <footer class='clearfix'>
        <?php echo $pager->show('right', 'short');?>

      </footer>
    </div>
    <div class='row blocks' data-region='product_browse-bottom'><?php echo $control->block->printRegion($layouts, 'product_browse', 'bottom', true);?></div>
  </div>
  <?php if(!empty($layouts['product_browse']['side']) and !(empty($sideFloat) || $sideFloat === 'hidden')){ ?>

  <div class='col-md-<?php echo $sideGrid; ?> col-side'>
    <side class='page-side blocks' data-region='product_browse-side'><?php echo $control->block->printRegion($layouts, 'product_browse', 'side');?></side>
  </div>
  <?php } ?>

</div>
<div class='row blocks' data-region='product_browse-bottomBanner'><?php echo $control->block->printRegion($layouts, 'product_browse', 'bottomBanner', true);?></div>
<?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'common', 'footer'));?>

