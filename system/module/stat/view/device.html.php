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
<?php js::set('type', $type);?>
<?php js::set('statLang', $lang->stat);?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->stat->trafficModes as $code => $modeName):?>
      <li <?php if($mode == $code) {echo "class='active'";}?>>
        <?php echo html::a(inlink('device', "mode=$code"), $modeName);?>
      </li>
      <?php endforeach;?>
    </ul>
    <div class='search pull-left'>
      <form method='get' class='input-control search-box' data-ride='searchbox'>
        <?php echo html::hidden('m', 'stat');?>
        <?php echo html::hidden('f', 'device');?>
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
          <div class='order-title'><?php echo $lang->stat->pv;?></div>
          <div class='top-number'><?php echo $pvTotal;?></div>
        </td>
        <td class='text-center'>
          <div class='order-title'><?php echo $lang->stat->uv;?></div>
          <div class='top-number'><?php echo $uvTotal;?></div>
        </td>
        <td class='text-center'>
          <div class='order-title'><?php echo $lang->stat->ipCount;?></div>
          <div class='top-number'><?php echo $ipTotal;?></div>
        </td>
      </tr>
    </tbody>
  </table>
  <?php if(!empty($pieCharts)):?>
  <div class='panel-heading'>
    <div class="dropdown" id="switchBar"><a href="###" data-toggle="dropdown" class="btn"><?php echo $lang->stat->pv;?> <span class="icon-angle-down"></span></a>
      <ul class="dropdown-menu">
        <li class='active' data-type='pv'><a href="javascript:;"><?php echo $lang->stat->pv;?></a></li>
        <li data-type='uv'><a href="javascript:;"><?php echo $lang->stat->uv;?></a></li>
        <li data-type='ip'><a href="javascript:;"><?php echo $lang->stat->ipCount;?></a></li>
      </ul>
    </div>
  </div>
  <div class='chart-canvas center'><canvas height='310' width='700' id='pieChart'></canvas></div>
  <?php endif;?>
</section>

<?php if(!empty($pieCharts)):?>
<table class='table table-bordered table-report' id='reportData'>
  <thead>
    <tr class='text-center'>
      <td><?php echo zget($lang->stat, $type);?></td>
      <td><?php echo $lang->stat->pv;?></td>
      <td><?php echo $lang->stat->uv;?></td>
      <td><?php echo $lang->stat->ipCount;?></td>
    </tr>
  </thead>
  <?php for($i = 0 ; $i < count($pieCharts['pv']); $i ++):?>
  <?php $report = $pieCharts['pv'][$i];?>
  <tr class='text-center'>
    <?php if($type == 'domain'):?>
    <td><?php echo $report->label . ' ' . html::a(inlink('domain', "domain=" . urlencode($report->label)), " <i class='icon icon-search'></i>");?></td>
    <?php else:?>
    <td><?php echo $report->label;?></td>
    <?php endif;?>
    <td><?php echo $report->value;?></td>
    <td><?php echo $pieCharts['uv'][$i]->value;?></td>
    <td><?php echo $pieCharts['ip'][$i]->value;?></td>
  </tr>
  <?php endfor;?>
</table>
<?php endif;?>
<?php include '../../common/view/footer.admin.html.php';?>
