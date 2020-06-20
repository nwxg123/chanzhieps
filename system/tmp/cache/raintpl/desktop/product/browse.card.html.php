<?php if(!class_exists('raintpl')){exit;}?><?php if(!defined("RUN_MODE")){ ?>


<?php echo die(); ?>

<?php } ?>

<section id="cardMode" class='cards cards-products cards-borderless<?php echo $config->product->browseType != "card" ? " hide" : ""; ?>'>
  <?php foreach($products as $product): ?>


  <div class='col-sm-4 col-xs-6'>
    <div class='card' data-ve='product' id='product<?php echo $product->id;?>'>
      <?php if(empty($product->image)){ ?>


        <?php echo html::a(inlink('view', "id=$product->id", "category={$product->category->alias}&name=$product->alias"), '<div class="media-placeholder" data-id="' . $product->id . '">' . $product->name . '</div>', "class='media-wrapper'");; ?>

      <?php }else{ ?>

        <?php $title=$this->var['title'] = $product->image->primary->title ? $product->image->primary->title : $product->name;?>

        <?php echo html::a(inlink('view', "id=$product->id", "category={$product->category->alias}&name=$product->alias"), html::image($control->loadModel('file')->printFileURL($product->image->primary, 'middleURL'), "title='{$title}' alt='{$product->name}'"), "class='media-wrapper'"); ?>

<?php } ?>

      <div class='card-heading'>
        <?php $showPrice=$this->var['showPrice']    = isset($control->config->product->showPrice) ? $control->config->product->showPrice : true;?>

        <?php $showViews=$this->var['showViews']    = isset($control->config->product->showViews) ? $control->config->product->showViews : true;?>

        <?php $namePosition=$this->var['namePosition'] = isset($control->config->product->namePosition) ? 'text-' . $control->config->product->namePosition : '';?>

        <?php if($showPrice){ ?>


        <div class='price'>
          <?php $currencySymbol=$this->var['currencySymbol'] = $control->config->product->currencySymbol;?>

          <?php if(!$product->unsaleable){ ?>


            <?php if($product->negotiate){ ?>


               <?php echo "<span class='text-danger'>" . $lang->product->negotiate . '</span>'; ?>

            <?php }else{ ?>

               <?php if($product->promotion != 0){ ?>


                 <?php echo "<strong class='text-danger' style='margin:-3px;'>" . $currencySymbol . $product->promotion . '</strong>'; ?>

               <?php }else{ ?>

                 <?php if($product->price != 0){ ?>


                   <?php echo "<strong class='text-danger' style='margin:-3px;'>" . $currencySymbol . $product->price . '</strong>'; ?>

<?php } ?>

              <?php } ?>

<?php } ?>

          <?php } ?>

        </div>
        <?php } ?>

        <div class='text-nowrap text-ellipsis <?php echo $namePosition;?>'>
          <span><?php echo html::a(inlink('view', "id={$product->id}", "category={$product->category->alias}&name=$product->alias"), $product->name, "style='color:{$product->titleColor}'"); ?>

</span>
          <?php if($showViews){ ?>

<span data-toggle='tooltip' class='text-muted views-count' title='<?php echo $lang->product->viewsCount;?>'><i class="icon icon-eye-open"></i> <?php echo $config->viewsPlaceholder . $product->id . $config->viewsPlaceholder; ?></span><?php } ?>

        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>

</section>
