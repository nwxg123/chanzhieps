<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The log view file of bear module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     bear
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->bear->logModes as $code => $modeName):?>
        <?php $class = $mode == $code ? "class='active'" : '';?>
        <li <?php echo $class?>><?php echo html::a(inlink('log', "mode=$code"), $modeName);?></li>
      <?php endforeach;?>
    </ul>
    <div class='search pull-left'>
      <form method='get' class='input-control search-box' data-ride='searchbox'>
        <?php echo html::hidden('m', 'bear');?>
        <?php echo html::hidden('f', 'log');?>
        <?php echo html::hidden('mode', 'fixed');?>
        <?php echo html::hidden('orderBy', $orderBy);?>
        <?php echo html::hidden('recTotal', 0);?>
        <?php echo html::hidden('recPerPage', 20);?>
        <?php echo html::hidden('pageID', 0);?>
        <div class='input-control has-icon-right '>
          <?php echo html::input('begin', $begin, "class='form-control form-date w-120px' data-picker-position='bottom-right' placeholder='{$lang->bear->begin}'");?>
          <label for="begin" class="input-control-icon-right"><i class="icon icon-calendar"></i></label>
        </div>
        <?php echo '-';?>
        <div class='input-control has-icon-right'>
          <?php echo html::input('end', $end, "class='form-control form-date w-120px' data-picker-position='bottom-right' placeholder='{$lang->bear->end}'");?>
          <label for="end" class="input-control-icon-right"><i class="icon icon-calendar"></i></label>
        </div>
        <?php echo html::submitButton($lang->search->common, "btn");?>
      </form>
    </div>
  </header>
  <table class='table tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <th><?php echo $lang->bear->id;?></th>
        <th class='text-left'><?php echo $lang->bear->url;?></th>
        <th><?php echo $lang->bear->status;?></th>
        <th><?php echo $lang->bear->response;?></th>
        <th><?php echo $lang->bear->time;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($records as $log):?>
      <tr class='text-center'>
        <td class='text-center'><?php echo $log->id;?></td>
        <td class='text-left'><?php echo $log->url;?></td>
        <td><?php echo zget($lang->bear->submitStatusList, $log->status, '');?></td>
        <td><?php echo $log->response;?></td>
        <td><?php echo $log->time;?></td>
      </tr>
      <?php endforeach;?>
      <tr>
        <td class='text-right' colspan="5"><?php echo $pager->show();?></td>
      </tr>
    </tbody>
  </table> 
<section>
<?php include '../../common/view/footer.admin.html.php';?>
