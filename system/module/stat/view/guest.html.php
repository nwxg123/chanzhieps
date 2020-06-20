<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The from view file of stat module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     stat
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/chart.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php if(isset($pieCharts)) js::set('pieCharts', $pieCharts);?>
<?php if(isset($lineCharts)) js::set('lineCharts', $lineCharts);?>
<?php if(isset($lineLabels)) js::set('lineLabels', $lineLabels);?>
<section class='main-table fixed'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->stat->trafficModes as $code => $modeName):?>
      <li <?php if($mode == $code) {echo "class='active'";}?>>
        <?php echo html::a(inlink('guest', "&mode=$code"), $modeName);?>
      </li>
      <?php endforeach;?>
    </ul>
    <div class='search pull-left'>
      <form method='get' class='input-control search-box' data-ride='searchbox'>
        <?php echo html::hidden('m', 'stat');?>
        <?php echo html::hidden('f', 'guest');?>
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
    <form method='get' class='input-control search-box has-icon-right'>
    </form>
  </header>
  <table class='table tablesorter table-fixed table-head'>
    <tbody>
      <tr>
        <td class='text-center'>
          <div class='order-title'><?php echo $lang->stat->newGuest;?></div>
          <div class='top-number'><?php echo $newGuest ? $newGuest : 0;?></div>
        </td>
        <td class='text-center'>
          <div class='order-title'><?php echo $lang->stat->newMember;?></div>
          <div class='top-number'><?php echo $newMember ? $newMember : 0;?></div>
        </td>
        <td class='text-center'>
          <div class='order-title'><?php echo $lang->stat->guestTotal;?></div>
          <div class='top-number'><?php echo $guestTotal ? $guestTotal : 0;?></div>
        </td>
      </tr>
    </tbody>
  </table>
</section>
<table class='table table-bordered table-report' id='reportData'>
    <thead>
      <tr class='text-center'>
        <td><?php echo $lang->stat->guestType;?></td>
        <td><?php echo $lang->stat->number;?></td>
        <td><?php echo $lang->stat->pv;?></td>
        <td><?php echo $lang->stat->ipCount;?></td>
      </tr>
    </thead>
    <?php foreach($lang->stat->guestTypes as $guestType => $typeLang):?>
    <tr class='text-center'>
      <td><?php echo $typeLang;?></td>
      <td><?php echo $statDataList[$guestType]['uv'];?></td>
      <td><?php echo $statDataList[$guestType]['pv'];?></td>
      <td><?php echo $statDataList[$guestType]['ip'];?></td>
    </tr>
    <?php endforeach;?>
  </table>
<?php include '../../common/view/footer.admin.html.php';?>
