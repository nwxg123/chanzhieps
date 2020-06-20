<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The admin browse view file of stat module of chanzhiEPS.
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
        <?php echo html::a(inlink('domainpage', "domain={$domain}&mode=$code"), $modeName);?>
      </li>
      <?php endforeach;?>
    </ul>
    <div class='search pull-left'>
      <form method='get' class='input-control search-box' data-ride='searchbox'>
        <?php echo html::hidden('m', 'stat');?>
        <?php echo html::hidden('f', 'domainpage');?>
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
  <table class='table table-hover table-bordered'>
    <thead>
      <tr class='text-center'>
        <th class='text-middle'><?php echo $lang->stat->domainPage;?></th>
        <?php foreach($labels as $label):?>
        <th><?php echo date('Y-m-d', strtotime($label));?></th>
        <?php endforeach;?>
        <th class='text-middle'><?php echo $lang->stat->totalPV;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($pages as $page => $reports):?>
      <?php $pv = 0;?>
      <tr class='text-center text-middle'>
        <td class='w-100px'><div class='w-800px text-ellipsis'><?php echo $page;?></div></td>
        <?php foreach($labels as $label):?>
        <?php if(isset($reports[$label])):?>
        <td class='w-100px <?php echo $label;?>'><?php echo $reports[$label]->pv;?></td>
      <?php $pv += $reports[$label]->pv;?>
        <?php else:?>
        <td class='w-100px <?php echo $label;?>'>0</td>
        <?php endif;?>
        <?php endforeach;?>
        <td class='w-100px'><?php echo $pv;?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot><tr><td colspan='3'><?php $pager->show();?></td></tr></tfoot>
  </table>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
