<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The set sensitive view file of site module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      xiying Guang <guanxiying@xirangit.com>
 * @package     site
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<section class='main-table'>
  <header class='clearfix'>
    <ul id='typeNav' class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->site->sensitiveList as $key => $value):?>
      <li data-type='internal' <?php echo $type == $key ? "class='active'" : '';?>>
        <?php echo html::a(inlink('setsensitive', "type={$key}"), $value);?>
      </li>
      <?php endforeach;?>
    </ul>
  </header>
  <form method='post' id='ajaxForm'>
    <table class='table tablesorter table-fixed table-form'>
      <?php if($type == 'content'):?>
      <tr>
        <th class='w-100px text-right'><?php echo $lang->site->filterSensitive;?></th>
        <td class='col-xs-6'><?php echo html::radio('filterSensitive', $lang->site->filterSensitiveList, isset($this->config->site->filterSensitive) ? $this->config->site->filterSensitive : 'close');?></td><td></td>
      </tr>
      <tr>
        <th class='text-right'><?php echo $lang->site->sensitive;?></th>
        <td><?php echo html::textarea('sensitive', !empty($this->config->site->sensitive) ? $this->config->site->sensitive : $config->sensitive, "class='form-control' rows=14");?></td><td></td>
      </tr>
      <?php elseif($type == 'user'):?>
      <tr>
        <th class='w-100px text-right'><?php echo $lang->site->filterSensitive;?></th>
        <td class='col-xs-6'><?php echo html::radio('filterSensitive', $lang->site->filterSensitiveList, isset($this->config->user->filterSensitive) ? $this->config->user->filterSensitive : 'close');?></td><td></td>
      </tr>
      <tr>
        <th class='text-right'><?php echo $lang->site->sensitive;?></th>
        <td><?php echo html::textarea('sensitive', !empty($this->config->user->sensitive) ? $this->config->user->sensitive : '', "class='form-control' rows=4 placeholder='{$lang->site->sensitiveTip}'");?></td><td></td>
      </tr>
      <?php endif;?>
      <tr>
        <th></th>
        <td><?php echo html::submitButton();?></td>
      </tr>
    </table>
  </form>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
