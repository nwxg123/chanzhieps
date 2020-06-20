<?php include $app->getModuleRoot() . 'common/view/header.admin.html.php';?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <li class='active'>
        <?php echo html::a(inlink('admin'), $lang->gift->list);?>
      </li>
    </ul>
    <div class='pull-right btn-toolbar'>
      <?php echo html::a(inlink('add'), $lang->gift->add, "class='btn btn-primary' data-toggle='modal'"); ?>
    </div>
  </header>
  <table class='table table-hover tablesorter table-fixed' id='giftdata'>
    <thead>
      <tr>
        <th class='w-id'><?php echo $lang->gift->id;?></th>
        <th><?php echo $lang->gift->name;?></th>
        <th><?php echo $lang->gift->score;?></th>
        <th class="w-150px"><?php echo $lang->gift->amount;?></th>
        <th class="w-150px"><?php echo $lang->gift->exchangeLimit;?></th>
        <th><?php echo $lang->gift->createdDate;?></th>
        <th><?php echo $lang->gift->status;?></th>
        <?php if($app->clientLang == 'zh-cn' || $app->clientLang == 'zh-tw'):?>
        <th class="text-center actions w-30px"><?php echo $lang->preview;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->gift->edit;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->gift->editProduct;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->product->images;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->gift->delete;?></th>
        <?php else:?>
        <th colspan='5' class="text-center actions w-150px"><?php echo $lang->actions;?></th>
        <?php endif;?>
        <th class="text-center actions w-10px"></th>
      </tr>
    </thead>
    <?php foreach($gifts as $gift):?>
    <tr class='a-center'>
      <td><?php echo $gift->id;?></td>
      <td><?php echo $gift->name;?></td>
      <td><?php echo $gift->score;?></td>
      <td><?php echo $gift->amount;?></td>
      <td><?php echo $gift->exchangeLimit;?></td>
      <td><?php echo $gift->addedDate;?></td>
      <td><?php echo $lang->product->statusList[$gift->status];?></td>
      <td class='c-actions'>
        <?php echo html::a(commonModel::createFrontLink('product', 'view',  "productID=$gift->id", ''), "<i class='icon icon-eye-sign'></i>", "target='_blank' title='{$lang->preview}' class='btn btn-icon'");?>
      </td>
      <td class='c-actions'>
        <?php echo html::a(inlink('edit', "id=$gift->id"), "<i class='icon icon-edit'></i>", "data-toggle='modal' title='{$lang->gift->edit}' class='btn btn-icon'");?>
      </td>
      <td class='c-actions'>
        <?php echo html::a(helper::createLink('product', 'edit', "id=$gift->id"), "<i class='icon icon-shopping'></i>", "title='{$lang->gift->editProduct}' class='btn btn-icon'");?>
      </td>
      <td class='c-actions'>
        <?php echo html::a(helper::createLink('file', 'browse', "objectType=product&objectID=$gift->id&isImage=1"), "<i class='icon icon-image'></i>", "data-toggle='modal' title='{$lang->product->images}' class='btn btn-icon'");?>
      </td>
      <td class='c-actions'>
        <?php echo html::a(inlink('delete', "id=$gift->id"), "<i class='icon icon-close'></i>", "title='{$lang->gift->delete}' class='reloadDeleter btn btn-icon'");?>
      </td>
      <td class='c-actions'></td>
    </tr>
    <?php endforeach;?>
    <tfoot><tr><td colspan='13'><?php $pager->show();?></td></tr></tfoot>
  </table>
</section>
<?php include $app->getModuleRoot() . 'common/view/footer.admin.html.php';?>
