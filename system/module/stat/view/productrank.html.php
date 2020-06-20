<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The page access view file of stat module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     stat
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php $stateLang = $state == 'pv' ? 'pv' : 'sales';?>
<section class='main-table fixed'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->stat->trafficModes as $code => $modeName):?>
      <li <?php if($mode == $code) {echo "class='active'";}?>>
        <?php echo html::a(inlink('productRank', "&mode=$code&state=$state"), $modeName);?>
      </li>
      <?php endforeach;?>
    </ul>
    <div class='pull-left btn-toolbar'>
      <div class="dropdown" id="switchBar"><a href="###" data-toggle="dropdown" class="btn"><?php echo $lang->stat->page->{$stateLang};?> <span class="icon-angle-down"></span></a>
        <ul class="dropdown-menu">
          <li <?php echo $state == 'pv' ? "class='active'" : '';?> data-type='pv'>
            <a href="<?php echo inlink('productRank', "mode=$mode&state=pv");?>"><?php echo $lang->stat->page->pv;?></a>
          </li>
          <li <?php echo $state == 'extra' ? "class='active'" : '';?> data-type='extra'>
            <a href="<?php echo inlink('productRank', "mode=$mode&state=extra");?>"><?php echo $lang->stat->page->sales;?></a>
          </li>
        </ul>
      </div>
    </div>
  </header>
  <table class='table tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <th class='w-10px'></th>
        <th class='w-40px'></th>
        <th class='w-30px p0'></th>
        <th class='text-left'><?php echo $lang->stat->page->name;?></th>
        <th class='w-100px text-center'><?php echo $lang->stat->page->{$stateLang};?></th>
        <?php if($mode == 'weekly' || $mode == 'monthly'):?>
        <th class='w-150px text-center'><?php echo $lang->actions;?></th>
        <?php endif;?>
      </tr>
    </thead>
    <?php $i = 0;?>
    <?php foreach($pages as $page):?>
    <?php $i ++;?>
    <tr>
      <td></td>
      <td class="text-center p0 rank <?php if(isset($page->numberChange)) echo $page->numberChange >= 0 ? 'rank-up' : 'rank-down';?>">
        <div><?php echo isset($page->numberChange) ? $page->numberChange : '';?></div>
      </td>
      <td class='text-center p0'><div class="small <?php echo $i <= '5' ? 'top top' . $i : '';?>" ><?php echo $i;?></div></td>
      <td class='text-gray text-ellipsis'><?php echo html::a($this->loadModel('product')->createPreviewLink($page->item), $page->name, "target='_blank' class='text-muted'");?></td>
      <td class='text-center'><?php echo $page->{$state};?></td>
      <?php if($mode == 'weekly' || $mode == 'monthly'):?>
      <td class='text-center'><?php echo html::a(inLink('productTrend', "articleID={$page->item}&mode={$mode}"), $this->lang->stat->domainTrend, "data-toggle='modal' data-type='iframe' class='text-muted'");?></td>
      <?php endif;?>
    </tr>
    <?php endforeach;?>
  </table>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
