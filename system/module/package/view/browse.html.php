<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The browse view file of package module of ChanZhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@xirangit.com>
 * @package     package
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php $status     = $this->get->status ? $this->get->status : 'installed';?>
<?php $searchWord = $this->get->searchWord ? $this->get->searchWord : '';?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->package->stateList as $state => $stateLang):?>
      <li <?php if($state == $status) {echo "class='active'";}?>>
        <?php echo html::a(inlink('browse', "status=$state"), sprintf($stateLang, $packageStat[$state]));?>
      </li>
      <?php endforeach;?>
    </ul>
    <div class='pull-left btn-toolbar'>
      <?php commonModel::printLink('package', 'upload', '', "<i class='icon icon-download'></i> " . $lang->package->upload, "class='btn' data-toggle='modal'");?>
      <?php echo html::a(inlink('obtain'), "<i class='icon icon-plus'></i> " . $lang->package->obtain, "class='btn'");?>
    </div>
    <div class='pull-right btn-toolbar'>
      <?php if($bindedUser):?>
      <div class='pull-left'>
        <span class='score'><?php echo $lang->score->usableScore . '：' . $bindedUser->score; ?></span>
        <span class='score'><?php echo html::a($lang->score->getScoreURL,'<i class="icon icon-database"></i>' . $lang->score->getScore, 'class="btn"  target="_blank"');?></span>
      </div>
      <?php endif;?>
      <div class='space'></div>
      <div class='space'></div>
      <form method='get' class='input-control search-box has-icon-right' data-ride='searchbox'>
        <?php echo html::hidden('m', 'package');?>
        <?php echo html::hidden('f', 'browse');?>
        <?php echo html::hidden('status', $status);?>
        <?php echo html::input('searchWord', $searchWord, "class='form-control search-query' placeholder='{$lang->searchPlaceholder}'");?>
        <button type="submit" class="btn btn-link input-control-icon-right search-submit-btn"><i class="icon icon-search icon-lg"></i></button>
      </form>
    </div>
  </header>
  <table class='table table-hover tablesorter table-fixed'>
    <thead>
      <tr>
        <th class='text-center w-20px'></th>
        <th class='text-left w-300px'><?php echo $lang->package->common;?></th>
        <th class='text-center'><?php echo $lang->package->abstract;?></th>
        <th class='text-center w-120px'><?php echo $lang->package->author;?></th>
        <th class='text-center w-120px'><?php echo $lang->package->version;?></th>
        <?php if($app->clientLang == 'zh-cn' || $app->clientLang == 'zh-tw'):?>
        <?php if($status == 'installed'):?>
        <th class="text-center actions w-30px"><?php echo $lang->package->structure;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->package->deactivate;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->package->uninstall;?></th>
        <?php endif;?>
        <?php if($status == 'deactivated'):?>
        <th class="text-center actions w-30px"><?php echo $lang->package->activate;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->package->uninstall;?></th>
        <?php endif;?>
        <?php if($status == 'available'):?>
        <th class="text-center actions w-30px"><?php echo $lang->package->install;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->package->erase;?></th>
        <?php endif;?>
        <?php else:?>
        <?php $colspan = $status == 'installed' ? '3' : '2';?>
        <?php $widthClass = 'w-' . $colspan * 30 . 'px';?>
        <th colspan='<?php echo $colspan;?>' class="actions <?php echo $widthClass;?>"><?php echo $lang->actions;?></th>
        <?php endif;?>
        <th class="text-center actions w-10px"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($packages as $package):?>
      <tr>
        <td></td>
        <td class='text-left text-ellipsis'><?php echo isset($package->viewLink) ? html::a($package->viewLink, $package->name, "target=_blank class='text-gray'") : $package->name;?></td>
        <td class='text-center text-ellipsis'><?php echo $package->desc;?></td>
        <td class='text-center'><?php echo $package->author;?></td>
        <td class='text-center'><?php echo $package->version;?></td>
        <?php if($package->status == 'installed'):?>
        <td class='c-actions'>
        <?php echo html::a(inlink('structure', "package=$package->code"), "<i class='icon icon-list'></i>", "title='{$lang->package->structure}' class='btn btn-icon' data-toggle='modal'");?>
        </td>
        <?php endif;?>
        <?php if($package->status == 'installed'):?>
        <td class='c-actions'>
        <?php echo html::a(inlink('deactivate', "package=$package->code"), "<i class='icon icon-cancel'></i>", "title='{$lang->package->deactivate}' class='btn btn-icon' data-toggle='modal'");?>
        </td>
        <?php endif?>
        <?php if($package->status == 'deactivated'):?>
        <td class='c-actions'>
        <?php echo html::a(inlink('activate', "package=$package->code"), "<i class='icon icon-play'></i>", "title='{$lang->package->activate}' class='btn btn-icon' data-toggle='modal'");?>
        </td>
        <?php endif?>

        <?php if($package->status == 'available'):?>
        <td class='c-actions'>
        <?php echo html::a(inlink('install', "package=$package->code"), "<i class='icon icon-cogs'></i>", "title='{$lang->package->install}' class='btn btn-icon' data-toggle='modal'");?>
        </td>
        <?php endif?>
        <?php if($package->status == 'installed' || $package->status == 'deactivated'):?>
        <td class='c-actions'>
        <?php echo html::a(inlink('uninstall', "package=$package->code"), "<i class='icon icon-close'></i>", "title='{$lang->package->uninstall}' class='btn btn-icon' data-toggle='modal'");?>
        </td>
        <?php endif?>
        <?php if($status == 'available'):?>
        <td class='c-actions'>
        <?php echo html::a(inlink('erase', "package=$package->code"), "<i class='icon icon-delete'></i>", "title='{$lang->package->erase}' class='btn btn-icon' data-toggle='modal'");?>
        </td>
        <?php endif;?>
        <td class='c-actions'></td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="<?php echo $status == 'install' || !$status ? 9 : 8;?>"><?php $pager->show();?></td>
      </tr>
    </tfoot>
  </table>
<section>
<?php include '../../common/view/footer.admin.html.php';?>
