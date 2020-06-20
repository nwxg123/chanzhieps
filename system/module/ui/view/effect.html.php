<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The admin view file of effect module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     ui
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php $this->app->loadLang('score'); ?>
<?php include '../../common/view/header.admin.html.php';?>
<?php $searchWord      = $this->get->searchWord ? $this->get->searchWord : '';?>
<section class='main-table'>
  <header class='clearfix'>
    <div class='pull-right btn-toolbar'>
      <span class='score'>
        <?php if(!empty($bindedUser)): ?>
        <span class='my-score'><?php echo $lang->score->usableScore . '：' . $bindedUser->score; ?></span>
        <?php endif; ?>
        <span class='get-score'><?php echo html::a($lang->score->getScoreURL,'<i class="icon icon-database"></i>' . $lang->score->getScore, 'class="btn" target="_blank"');?></span>
      </span>
      <span class='get-effect'>
      <?php echo html::a($this->config->admin->apiRoot . 'effect.html', '<i class="icon icon-effect"></i>' . $lang->effect->obtan, "target='_blank' class='btn'");?>
      </span>
      <form method='get' class='input-control search-box has-icon-right pull-right' data-ride='searchbox'>
        <?php echo html::hidden('m', 'ui');?>
        <?php echo html::hidden('f', 'effect');?>
        <?php echo html::hidden('pageID', isset($this->get->pageID) ? $this->get->pageID : '');?>
        <?php echo html::hidden('recTotal', isset($this->get->recTotal) ? $this->get->recTotal : '');?>
        <?php echo html::hidden('recPerPage', isset($this->get->recPerPage) ? $this->get->recPerPage : '');?>
        <?php echo html::input('searchWord', $searchWord, "class='form-control search-query' placeholder='{$lang->searchPlaceholder}'");?>
        <button type="submit" class="btn btn-link input-control-icon-right search-submit-btn"><i class="icon icon-search icon-lg"></i></button>
      </form>
    </div>
  </header>
  <?php if(!empty($effects)):?>
  <table class='table table-hover tablesorter table-fixed' id='effects'>
    <thead>
      <tr class='text-left'>
        <th class='padding-th'></th>
        <th class='name-th'><?php echo $lang->effect->name;?></th>
        <th class='category-th'><?php echo $lang->effect->category;?></th>
        <th class='created-time-th'><?php echo $lang->effect->createdTime;?></th>
        <th class='preview-th w-50px'><?php echo $lang->preview;?></th>
        <th class='import-th w-50px'><?php echo $lang->effect->import;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($effects as $record):?>
      <?php $effect = $record->effect;?>
      <?php if(!is_object($effect)) continue;?>
      <?php $viewLink    = $this->config->admin->apiRoot . "effect-view-{$effect->id}-{$record->id}";?> 
      <?php $previewLink = $this->config->admin->apiRoot . 'user-login-'. helper::safe64Encode("/effect-preview-{$effect->id}-{$record->id}");?>
      <?php $textClass   = isset($blocks[$record->id]) ? "imported" : "text-muted"; ?>
        <tr class='text-left'>
        <td class='padding'></td>
        <td class='name'>
          <?php echo html::a($viewLink, $effect->name, "target='_blank' class=$textClass");?>
          <?php if(isset($blocks[$record->id])) echo "<span title='{$lang->effect->imported}'><i class='icon icon-check'></i></span>";?>
        </td>
        <td class='category text-muted'><?php echo zget($categories, $effect->category);?></td>
        <td class='created-time text-muted'><?php echo $effect->createdTime;?></td>
        <td class='preview'>
          <?php 
          echo html::a($previewLink, '<icon class="icon icon-eye btn-icon"></icon>', "target='_blank'");
          ?>
        </td>
        <td class='import'>
          <?php
          if(!isset($blocks[$record->id]))echo html::a(inlink('importEffect', "id={$record->id}"), '<icon class="icon icon-download btn-icon"></icon>', "data-toggle='modal'");
          ?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr><td colspan='7'><?php $pager->show();?></td></tr>
    </tfoot>
  </table>
  <?php else:?>
  <div class='alert alert-info'><?php echo $lang->effect->noRsults?></div>
  <?php endif;?>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
