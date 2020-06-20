<?php if(!class_exists('raintpl')){exit;}?><?php if(!defined("RUN_MODE")){ ?>

<?php echo die(); ?>

<?php } ?>

<section id="listMode" class='list-products<?php echo $config->product->browseType != "list" ? " hide" : ""; ?>'>
  <table class='table table-list'>
    <tbody>
      <?php foreach($products as $product): ?>

      <tr>
        <td class='w-80px text-middle'>
        <?php if(empty($product->image)){ ?>

          <?php echo html::a(inlink('view', "id=$product->id", "category={$product->category->alias}&name=$product->alias"), '<div class="media-placeholder media-placeholder-list" data-id="' . $product->id . '">' . $product->name . '</div>', "class='w-80px'"); ?>

        <?php }else{ ?>

          <?php $title=$this->var['title'] = $product->image->primary->title ? $product->image->primary->title : $product->name;?>

          <?php $product->image->primary->objectType = 'product';$this->var['product'] = $product;?>

          <?php echo html::a(inlink('view', "id=$product->id", "category={$product->category->alias}&name=$product->alias"), html::image($control->loadModel('file')->printFileURL($product->image->primary, 'middleURL'), "width='80' title='{$title}' alt='{$product->name}'"), "class='w-80px'"); ?>

<?php } ?>

        </td>
        <td id='listProduct<?php echo $product->id; ?>' data-ve='product' data-id='<?php echo $product->id; ?>'>
          <?php echo html::a(inlink('view', "id={$product->id}", "category={$product->category->alias}&name=$product->alias"), "<strong style='color:{$product->titleColor}'>" . $product->name . '</strong>'); ?>

        </td>
        <td class='w-100px'>
          <?php if(!$product->unsaleable){ ?>

            <?php if($product->negotiate){ ?>

              <?php echo "<strong class='text-danger'>" . $lang->product->negotiate . '</strong>&nbsp;&nbsp;'; ?>

            <?php }else{ ?>

              <?php if($product->promotion != 0){ ?>

                <?php echo "<strong class='text-muted'>"  .'</strong>'; ?>

                <?php echo "<strong class='text-danger'>" . $control->config->product->currencySymbol . $product->promotion . '</strong>&nbsp;&nbsp;'; ?>

              <?php }else{ ?>

                <?php if($product->price != 0){ ?>

                  <?php echo "<strong class='text-danger'>" . $control->config->product->currencySymbol . $product->price . '</strong>&nbsp;&nbsp;'; ?>

<?php } ?>

              <?php } ?>

<?php } ?>

<?php } ?>

        </td>
        <td class="w-100px">
          <?php if(!$product->unsaleable and commonModel::isAvailable('shop')){ ?>

            <?php if($product->negotiate){ ?>

              <?php echo html::a(helper::createLink('company', 'contact'), $lang->product->contact, "class='btn btn-xs btn-success'"); ?>

            <?php }else{ ?>

              <?php echo html::a(inlink('view', "id={$product->id}", "category={$product->category->alias}&name=$product->alias"), $lang->product->buyNow, "class='btn btn-xs btn-success'"); ?>

<?php } ?>

          <?php }else{ ?>

            <?php echo html::a(inlink('view', "id={$product->id}", "category={$product->category->alias}&name=$product->alias"), $lang->product->detail, "class='btn btn-xs btn-success'"); ?>

<?php } ?>

        </td>
      </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</section>
