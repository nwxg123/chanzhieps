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
<?php js::set('lineLabels', $labels);?>
<?php js::set('lineChart',  $lineChart);?>
<?php $domain = helper::safe64Encode($domain);?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->stat->trafficModes as $code => $modeName):?>
      <li <?php if($mode == $code) {echo "class='active'";}?>>
        <?php echo html::a(inlink('domaintrend', "domain={$domain}&mode=$code"), $modeName);?>
      </li>
      <?php endforeach;?>
    </ul>
    <div class='search pull-left'>
      <form method='get' class='input-control search-box' data-ride='searchbox'>
        <?php echo html::hidden('m', 'stat');?>
        <?php echo html::hidden('f', 'domaintrend');?>
        <?php echo html::hidden('domain', $domain);?>
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
  <?php if(!empty($lineChart)):?>
  <div class='chart-canvas center w-p100'><canvas height='240' width='1000' id='lineChart'></canvas></div>
  <table class='table table-hover table-bordered'>
    <thead>
      <tr class='text-center'>
        <th><?php echo $lang->stat->date;?></th>
        <th><?php echo $lang->stat->pv;?></th>
        <th><?php echo $lang->stat->uv;?></th>
        <th><?php echo $lang->stat->ipCount;?></th>
      </tr>
    </thead>
    <tbody>
      <?php for($i = 0; $i < count($labels); $i ++):?>
      <tr class='text-center text-middle'>
        <th class='w-100px'><?php echo $labels[$i];?></th>
        <td class='w-100px'><?php echo $lineChart[0]->data[$i]?></td>
        <td class='w-100px'><?php echo $lineChart[1]->data[$i]?></td>
        <td class='w-100px'><?php echo $lineChart[2]->data[$i]?></td>
      </tr>
      <?php endfor;?>
    </tbody>
  </table>
</section>
<?php endif;?>
<?php include '../../common/view/footer.admin.html.php';?>
