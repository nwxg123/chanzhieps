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
<section class='main-table fixed'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <li <?php echo $mode == 'all' ? "class='active'" : '' ?>><?php echo html::a(inlink('clickRank', "mode=all"), $lang->stat->all);?></li>
      <?php foreach($lang->stat->trafficModes as $code => $modeName):?>
      <li <?php if($mode == $code) {echo "class='active'";}?>>
        <?php echo html::a(inlink('clickRank', "&mode=$code"), $modeName);?>
      </li>
      <?php endforeach;?>
    </ul>
    <div class='search pull-left'>
      <form method='get' class='input-control search-box' data-ride='searchbox'>
        <?php echo html::hidden('m', 'stat');?>
        <?php echo html::hidden('f', 'clickRank');?>
        <?php echo html::hidden('mode', 'fixed');?>
        <div class='input-control has-icon-right '>
          <?php echo html::input('begin', $this->get->begin, "class='form-control form-date w-120px' data-picker-position='bottom-right' placeholder='{$lang->stat->begin}'");?>
          <label for="begin" class="input-control-icon-right"><i class="icon icon-calendar"></i></label>
        </div>
        <?php echo '-';?>
        <div class='input-control has-icon-right'>
          <?php echo html::input('end', $this->get->end, "class='form-control form-date w-120px' data-picker-position='bottom-right' placeholder='{$lang->stat->end}'");?>
          <label for="end" class="input-control-icon-right"><i class="icon icon-calendar"></i></label>
        </div>
        <?php echo html::submitButton($lang->stat->view, "btn");?>
      </form>
    </div>
  </header>
  <table class='table table-hover tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <th class='w-30px'></th>
        <th class='text-left'><?php echo $lang->stat->page->url;?></th>
        <th class='w-120px'> <?php echo $lang->stat->pv;?></th>
      </tr>
    </thead>
    <tbody>
    <?php $i = 0;?>
    <?php foreach($pages as $page):?>
    <?php $i ++;?>
    <tr>
      <td class='text-center'><?php echo $i;?></td>
      <td class='text-gray'><?php echo html::a($page->item, $page->item);?></td>
      <td class='w-100px text-center'><?php echo $page->pv;?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
