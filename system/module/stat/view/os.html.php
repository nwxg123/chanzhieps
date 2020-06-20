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
<?php js::set('state', $state);?>
<?php js::set('statLang', $lang->stat);?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->stat->trafficModes as $code => $modeName):?>
      <li <?php if($mode == $code) {echo "class='active'";}?>>
        <?php echo html::a(inlink('os', "state=$state&mode=$code"), $modeName);?>
      </li>
      <?php endforeach;?>
    </ul>
    <div class='search pull-left'>
      <form method='get' class='input-control search-box' data-ride='searchbox'>
        <?php echo html::hidden('m', 'stat');?>
        <?php echo html::hidden('f', 'os');?>
        <?php echo html::hidden('state', $state);?>
        <?php echo html::hidden('mode', 'fixed');?>
        <div class='input-control has-icon-right '>
          <?php echo html::input('begin', $begin, "class='form-control form-date w-120px' data-picker-position='bottom-right' placeholder='{$lang->stat->begin}'");?>
          <label for="begin" class="input-control-icon-right"><i class="icon icon-calendar"></i></label>
        </div>
        <?php echo '-';?>
        <div class='input-control has-icon-right'>
          <?php echo html::input('end', $end, "class='form-control form-date w-120px' data-picker-position='bottom-right' placeholder='{$lang->stat->end}'");?>
          <label for="end" class="input-control-icon-right"><i class="icon icon-calendar"></i></label>
        </div>
        <?php echo html::submitButton($lang->stat->view, "btn");?>
      </form>
    </div>
    <form method='get' class='input-control search-box has-icon-right'>
    </form>
  </header>
  <?php if(!empty($pieCharts)):?>
  <?php $stateLang = $state == 'ip' ? 'ipCount' : $state;?>
  <div class='panel-heading'>
    <div class="dropdown" id="switchBar"><a href="###" data-toggle="dropdown" class="btn"><?php echo $lang->stat->{$stateLang};?> <span class="icon-angle-down"></span></a>
      <ul class="dropdown-menu">
        <li <?php echo $state == 'pv' ? "class='active'" : '';?> data-type='pv'>
          <a href="<?php echo inlink('os', "state=pv&mode=$mode&begin=$begin&end=$end");?>"><?php echo $lang->stat->pv;?></a>
        </li>
        <li <?php echo $state == 'uv' ? "class='active'" : '';?> data-type='uv'>
          <a href="<?php echo inlink('os', "state=uv&mode=$mode&begin=$begin&end=$end");?>"><?php echo $lang->stat->uv;?></a>
        </li>
        <li <?php echo $state == 'ip' ? "class='active'" : '';?> data-type='ip'>
          <a href="<?php echo inlink('os', "state=ip&mode=$mode&begin=$begin&end=$end");?>"><?php echo $lang->stat->ipCount;?></a>
        </li>
      </ul>
    </div>
  </div>
  <div class='panel-body'>
  <div class='chart-canvas <?php echo isset($totalState) ? "pie" : "center";?>'><canvas height='310' width='700' id='pieChart'></canvas></div>
    <?php if(isset($totalState)):?>
    <div class='chart-canvas'>
      <?php foreach($pieCharts[$state] as $colorKey => $pieChart):?>
      <div class='chart-progress'>
        <span class='text-ellipsis' title='<?php echo $pieChart->label;?>'><?php echo $pieChart->label;?></span>
        <div class="progress">
        <?php $ariaValueNow = number_format($pieChart->value * 100 / $totalState, 2);?>
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $ariaValueNow;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ariaValueNow;?>%;background-color:<?php echo $pieChart->color;?>"></div>
          <small><?php echo $pieChart->value;?></small>
        </div>
      </div>
      <?php endforeach;?>
    </div>
    <?php endif;?>
  </div>
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
      <?php if(isset($totalState)):?>
      <td><?php echo $lang->stat->percentage;?></td>
      <?php endif;?>
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
    <?php if(isset($totalState)):?>
    <td><?php echo number_format($pieCharts[$state][$i]->value * 100 / $totalState, 2);?>%</td>
    <?php endif;?>
  </tr>
  <?php endfor;?>
</table>
<?php endif;?>
<?php include '../../common/view/footer.admin.html.php';?>
