<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The admin view file of product of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     product
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php js::set('categoryID', $categoryID);?>
<?php js::set('selectDate', $lang->selectDate);?>
<?php $status     = $this->get->status ? $this->get->status : 'all';?>
<?php $date       = $this->get->date ? $this->get->date : '';?>
<?php $searchWord = $this->get->searchWord ? $this->get->searchWord : '';?>
<?php $link = "categoryID=$categoryID&orderBy=$orderBy&recTotal=&recPerPage=&pageID=";?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->product->stateList as $state => $stateLang):?>
      <li <?php if($state == $status) {echo "class='active'";}?>>
        <?php echo html::a(inlink('admin', $link . "&status=$state&date=$date&searchWord=$searchWord"), sprintf($stateLang, $productStat[$state]));?>
      </li>
      <?php endforeach;?>
    </ul>
    <div class='pull-left btn-toolbar'>
      <div class='space'></div>
      <div class='input-control has-icon-right'>
        <button type='btn' class='btn'>
          <?php echo !empty($date) ? $date : $lang->selectDate;?>
          <i class='icon-angle-sm-down'></i>
          <?php if(!empty($date)):?> <i class='icon-close'></i> <?php endif;?>
        </button>
        <input type='btn' value='<?php echo $date;?>' class='btn form-datecustom w-90px' data-picker-position='bottom-right' href='<?php echo inlink('admin', $link . "&status=$status");?>'/>
      </div>
      <div class='space'></div>
      <div class='space'></div>
      <form method='get' class='input-control search-box has-icon-right' data-ride='searchbox'>
        <?php echo html::hidden('m', 'product');?>
        <?php echo html::hidden('f', 'admin');?>
        <?php echo html::hidden('categoryID', $categoryID);?>
        <?php echo html::hidden('orderBy', $orderBy);?>
        <?php echo html::hidden('recTotal', isset($this->get->recTotal) ? $this->get->recTotal : 0);?>
        <?php echo html::hidden('recPerPage', isset($this->get->recPerPage) ? $this->get->recPerPage : 10);?>
        <?php echo html::hidden('pageID', isset($this->get->pageID) ? $this->get->pageID :  1);?>
        <?php echo html::hidden('status', $status);?>
        <?php echo html::hidden('date', $date);?>
        <?php echo html::input('searchWord', $searchWord, "class='form-control search-query' placeholder='{$lang->searchPlaceholder}'");?>
        <button type="submit" class="btn btn-link input-control-icon-right search-submit-btn"><i class="icon icon-search icon-lg"></i></button>
      </form>
    </div>
    <div class='pull-right btn-toolbar'>
        <?php commonModel::printLink('product', 'create', "category={$categoryID}", '<i class="icon icon-plus"></i> ' . $lang->product->create, 'class="btn btn-primary"');?>
    </div>
  </header>
  <table class='table table-hover tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "categoryID=$categoryID&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&status=$status&date=$date";?>
        <th class='w-60px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->product->id);?></th>
        <th class='text-left'><?php commonModel::printOrderLink('name', $orderBy, $vars, $lang->product->info);?></th>
        <th class='w-100px c-views'><?php commonModel::printOrderLink('views', $orderBy, $vars, $lang->product->views);?></th>
        <?php if(commonmodel::isavailable('message')):?>
        <th class='text-center w-150px'><?php echo $lang->product->comments;?></th>
        <?php endif;?>
        <th class='w-160px c-addedDate'><?php commonModel::printOrderLink('addedDate', $orderBy, $vars, $lang->product->addedDate);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->product->status);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('amount', $orderBy, $vars, $lang->product->amount);?></th>
        <?php if($app->clientLang == 'zh-cn' || $app->clientLang == 'zh-tw'):?>
        <th class="text-center actions w-30px"><?php echo $lang->edit?></th>
        <th class="text-center actions w-30px"><?php echo $lang->preview;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->product->images;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->product->files;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->product->layout;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->actions;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->more;?></th>
        <?php else:?>
        <th colspan='7' class="actions w-210px"><?php echo $lang->actions;?></th>
        <?php endif;?>
        <th class="text-center actions w-10px"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($products as $product):?>
      <tr class='text-center'>
        <td><?php echo $product->id;?></td>
        <td class='text-left' title="<?php echo $product->name;?>">
        <?php if(!empty($product->image)):?>
          <?php $product->image->primary->objectType = 'product';?>
          <?php $imgsrc = $this->file->printFileURL($product->image->primary, 'middleURL');?>
          <div class='file-image'>
            <?php echo html::a($this->product->createPreviewLink($product->id), "<img class='image-small' src='$imgsrc'>", "target='_blank' class='text-gray'");?>
          </div>
        <?php else:?>
          <?php $imgColor = $product->id * 57 % 360;?>
          <a class='media-placeholder' target='_blank' href='<?php echo $this->product->createPreviewLink($product->id);?>'><div style='background-color: hsl(<?php echo $imgColor;?>, 60%, 80%); color: hsl(<?php echo $imgColor;?>, 80%, 30%);' data-id='<?php echo $product->id;?>'><?php echo $product->name;?></div></a>
        <?php endif;?>
        <div class='title text-ellipsis'><?php echo html::a($this->product->createPreviewLink($product->id), $product->name, "target='_blank' class='text-gray'");?></div>
        </td>
        <td class='c-views'><?php echo $product->views;?></td>
        <?php if(commonModel::isAvailable('message')):?>
        <td class='text-left c-comments'>
          <?php $reviewedMessageCount   = !empty($message[$product->id]) ? $message[$product->id]->count : 0;?>
          <?php $unReviewedMessageCount = !empty($unReviewedMessage[$product->id]) ? $unReviewedMessage[$product->id]->count : 0;?>
          <?php echo sprintf($lang->product->reviewed, $reviewedMessageCount);?>
          <?php if($unReviewedMessageCount):?>
          <?php commonModel::printLink('message', 'admin', "", sprintf($lang->product->underReview, $unReviewedMessageCount), 'class="reviewed text-danger"');?>
          <?php endif;?>
        </td>
        <?php endif;?>
        <td class='c-addedDate'><?php echo $product->addedDate;?></td>
        <td><?php echo isset($lang->product->statusList[$product->status]) ? $lang->product->statusList[$product->status] : '';?></td>
        <td>
          <?php if(!empty($config->product->stock)):?>
            <?php if($product->stockWarning):?>
            <?php echo $product->stockWarning > $product->amount ?  "<span class='text-danger'>" . $lang->product->replenish . '</span>' : $product->amount;?>
            <?php else:?>
            <?php echo !empty($config->product->stockWarning) && $config->product->stockWarning > $product->amount ?  "<span class='text-danger'>" . $lang->product->replenish . '</span>' : $product->amount;?>
            <?php endif;?>
          <?php else:?>
          <?php echo $product->amount;?>
          <?php endif;?>
        </td>
        <?php
        $categories    = $product->categories;
        $categoryAlias = !empty($categories) ? current($categories)->alias : '';
        $changeStatus  = $product->status == 'normal' ? 'offline' : 'normal';
        $iconClass     = $product->status == 'normal' ? 'icon icon-arrow-down' : 'icon icon-arrow-up';
        ?>
        <td class='c-actions'>
          <?php commonModel::printLink('product', 'edit', "productID=$product->id", "<i class='icon icon-edit'></i>", "title='{$lang->edit}' class='btn btn-icon'");?>
        </td>
        <td class='c-actions'>
          <?php echo html::a($this->product->createPreviewLink($product->id), "<i class='icon icon-eye'></i>", "title='{$lang->preview}' target='_blank' class='btn btn-icon'");?>
        </td>
        <td class='c-actions'>
          <?php commonModel::printLink('file', 'browse', "objectType=product&objectID=$product->id&isImage=1", "<i class='icon icon-image'></i>", "title='{$lang->product->images}' class='btn btn-icon' data-toggle='modal' data-width='1000'");?>
        </td>
        <td class='c-actions'>
          <?php commonModel::printLink('file', 'browse', "objectType=product&objectID=$product->id&isImage=0", "<i class='icon icon-paperclip'></i>", "title='{$lang->product->files}' class='btn btn-icon' data-toggle='modal' data-width='1000'");?>
        </td>
        <td class='c-actions'>
          <?php commonModel::printLink('visual', 'design', "page=product_view&object=$product->id", "<i class='icon icon-layout-empty'></i>", "data-toggle='modal' data-width='100%' data-type='iframe' title='{$lang->product->layout}' class='btn btn-icon'");?>
        </td>
        <td class='c-actions'>
          <?php commonModel::printLink('product', 'changeStatus', "productID=$product->id&status=$changeStatus", "<i class='{$iconClass}'></i>", "title='{$lang->product->statusList[$changeStatus]}' class='changeStatus btn btn-icon'");?>
        </td>
        <td class='c-actions'>
          <span class='dropdown'>
            <a data-toggle='dropdown' href='javascript:;' title='<?php echo $lang->more;?>' class='btn btn-icon'><i class='icon icon-ellipsis-h'></i></a>
            <ul class='dropdown-menu pull-right'>
              <li><?php commonModel::printLink('product', 'setcss', "productID=$product->id", $lang->product->css, "data-toggle='modal'");?></li>
              <li><?php commonModel::printLink('product', 'setjs', "productID=$product->id", $lang->product->js, "data-toggle='modal'");?></li>
              <li><?php commonModel::printLink('product', 'delete', "productID=$product->id", $lang->delete, "class='deleter'");?></li>
              <?php if(!empty($this->config->bear->appID)):?>
              <li><?php commonmodel::printlink('bear', 'submit', "objectType=product&objectID={$product->id}", $lang->product->forward2Baidu, "data-toggle='modal'");?></li>
              <?php endif;?>
            </ul>
          </span>
        </td>
        <td></td>
      </tr> <?php endforeach;?>
    </tbody>
  </table>
  <div class='table-footer'><?php $pager->show();?></div>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
