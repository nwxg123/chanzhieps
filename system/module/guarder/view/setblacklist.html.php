<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The setBlacklist view file of guard module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Qiaqia LI <liqiaqia@cnezsoft.cn>
 * @package     guard
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<section class='main-table'>
  <header class='clearfix'>
    <ul id='typeNav' class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->guarder->blacklistModes as $code => $modeName):?>
      <li data-type='internal' <?php echo $mode == $code ? "class='active'" : '';?>>
        <?php echo html::a(inlink('setBlacklist', "mode=$code"), $modeName);?>
      </li>
      <?php endforeach;?>
    </ul>
    <div class='pull-left btn-toolbar'>
      <form method='get' class='input-control search-box has-icon-right' data-ride='searchbox'>
        <?php echo html::hidden('m', 'guarder');?> 
        <?php echo html::hidden('f', 'setBlacklist');?>
        <?php echo html::hidden('mode', $mode);?>
        <?php echo html::hidden('pageID', 1);?>
        <div class='input-group'>       
          <?php echo html::input('identity', $this->get->identity, "class='form-control search-query' placeholder='{$lang->blacklist->identity}'");?>
          <button type="submit" class="btn btn-link input-control-icon-right search-submit-btn"><i class="icon icon-search icon-lg"></i></button>
        </div>
      </form>
    </div>
    <div class='pull-right btn-toolbar'>
      <?php commonModel::printLink('guarder', 'addblacklist', '', '<i class="icon-plus"></i> ' . $lang->guarder->addBlacklist, 'class="btn btn-primary" data-toggle="modal"');?>
    </div>
  </header>
  <table class='table tablesorter table-fixed'>
    <thead>
      <tr>
        <th><?php echo $lang->blacklist->identity;?></th>
        <th class='text-center w-300px'><?php echo $lang->blacklist->expiredDate;?></th>
        <th><?php echo $lang->blacklist->reason;?></th>
        <th class='text-center w-60px'><?php echo $lang->delete;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($blacklist as $object):?>
      <tr>
        <td>
        <?php echo $object->identity;?>
        </td>
        <td class='text-center'>
        <?php echo ($object->expiredDate == '0000-00-00 00:00:00') ? $lang->guarder->permanent : $object->expiredDate;?>
        </td>
        <td>
        <?php echo $object->reason;?>
        </td>
        <td class='text-center text-middle'>
          <?php commonModel::printLink('guarder', 'delete', "type=$object->type&identity=$object->identity", "<i class='icon icon-delete'></i>", "title='{$lang->delete}' class='btn btn-icon deleter'");?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot><tr><td colspan='4' class='text-right'><?php $pager->show();?></td></tr></tfoot>
  </table>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
