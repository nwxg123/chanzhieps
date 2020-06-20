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
<?php include '../../common/view/header.modal.html.php';?>
<?php include '../../common/view/chart.html.php';?>
<?php if(isset($lineCharts)) js::set('lineChart', $lineCharts);?>
<?php if(isset($lineLabels)) js::set('lineLabels', $lineLabels);?>
<div class='panel panel-head'>
  <div class='panel-body'>
    <div class='panel-mtag pull-left col-xs-6 text-center'>
      <div class='head-title'><?php echo $lang->stat->page->pv;?></div>
      <div class='today-number'><?php echo $pvTotal;?></div>
    </div>
    <div class='panel-mtag pull-left col-xs-6 text-center'>
      <div class='head-title'><?php echo $lang->stat->page->sales;?></div>
      <div class='today-number'><?php echo $salesTotal;?></div>
    </div>
  </div>
  <div class='panel-canvas'>
    <div class='chart-mcanvas'><canvas height='220' width='880' id='lineChart'></canvas></div>
  </div>
</div>
<?php include '../../common/view/footer.modal.html.php';?>
