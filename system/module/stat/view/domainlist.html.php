<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The domain list view file of stat module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan<guanxiying@xirangit.com>
 * @package     stat
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->stat->trafficModes as $code => $modeName):?>
      <li <?php if($mode == $code) {echo "class='active'";}?>>
        <?php echo html::a(inlink('domainlist', "&mode=$code"), $modeName);?>
      </li>
      <?php endforeach;?>
    </ul>
    <div class='search pull-left'>
      <form method='get' class='input-control search-box' data-ride='searchbox'>
        <?php echo html::hidden('m', 'stat');?>
        <?php echo html::hidden('f', 'domainlist');?>
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
  <table class='table tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <th class='text-middle'><?php echo $lang->stat->domain;?></th>
        <th>pv</th>
        <th>uv</th>
        <th>ip</th>
        <th class='text-middle'><?php echo $lang->actions?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($domains as $domain => $report):?>
      <tr class='text-center text-middle'>
        <td class='text-left'><?php echo $domain;?></td>
        <td class='w-100px'><?php echo $report->pv;?></td>
        <td class='w-100px'><?php echo $report->uv;?></td>
        <td class='w-100px'><?php echo $report->ip;?></td>
        <td class='w-100px'>
          <?php $domain = helper::safe64Encode($domain);?>
          <?php echo html::a(inlink('domaintrend', "domain={$domain}&mode={$mode}&begin={$this->get->begin}&end={$this->get->end}"), $lang->stat->domainTrend);?>
          <?php echo html::a(inlink('domainpage', "domain={$domain}&mode={$mode}&begin={$this->get->begin}&end={$this->get->end}"), $lang->stat->domainPage);?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot><tr><td colspan='5'><?php $pager->show();?></td></tr></tfoot>
  </table>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
