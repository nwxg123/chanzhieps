<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The settheme view file of ui module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     ui
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php js::set('custom', $lang->ui->custom);?>
<?php js::set('status', $this->get->status ? $this->get->status : 'internal');?>
<?php $searchWord      = $this->get->searchWord ? $this->get->searchWord : '';?>
<?php js::set('searchWord', $searchWord);?>
<?php $currentTheme    = $this->config->template->{$this->app->clientDevice}->theme; ?>
<?php $currentTemplate = $this->config->template->{$this->app->clientDevice}->name; ?>
<div class='panel'>
  <div class='panel-header'>
    <ul class='nav nav-dots' id='typeNav'>
      <li data-type='internal' class='active'><?php echo html::a('#internalSection', $lang->ui->installedThemes, "data-toggle='tab' class='active'");?></li>
      <li data-type='internal'><?php echo html::a('#packageSection', $lang->ui->installTheme, "data-toggle='tab'");?></li>
      <li class='search pull-right'>
        <form method='get' class='input-control search-box has-icon-right' data-ride='searchbox'>
          <?php echo html::hidden('m', 'ui');?>
          <?php echo html::hidden('f', 'settemplate');?>
          <?php echo html::hidden('template', isset($this->get->template) ? $this->get->template : '');?>
          <?php echo html::hidden('theme', isset($this->get->theme) ? $this->get->theme : '');?>
          <?php echo html::hidden('custom', isset($this->get->custom) ? $this->get->custom : false);?>
          <?php echo html::hidden('status', $this->get->status ? $this->get->status : 'internal');?>
          <?php echo html::input('searchWord', $searchWord, "class='form-control search-query' placeholder='{$lang->searchPlaceholder}'");?>
          <button type="submit" class="btn btn-link input-control-icon-right search-submit-btn"><i class="icon icon-search icon-lg"></i></button>
        </form>
      </li>
    </ul>
  </div>
  <div class='panel-body tab-content'>
    <section class='themes tab-pane active' id='internalSection'>
      <?php foreach($template['themes'] as $code => $theme):?>
        <?php $url = $this->createLink('ui', 'setTemplate', "template={$template['code']}&theme={$code}&custom=1");?>
        <?php $templateRoot = $webRoot . 'template/' . $template['code'] . '/';?>
        <?php $isCurrent =  $currentTheme === $code; ?>
        <div class='theme-wrapper col-lg-1_5 col-md-4 col-sm-6 <?php echo $isCurrent ? 'current' : ''; ?>'>
          <div class='rectangle'>
              <?php echo html::image($config->webRoot . 'theme/default/common/images/rectangle.png'); ?>
          </div>
          <div class='theme' data-url='<?php echo $url?>'>
            <?php echo html::a($url, html::image($webRoot . 'theme/' . $template['code'] . '/' . $code . '/preview.png'), "class='media-wrapper theme-img' data-url=$url");?>
            <div class='footer-wrapper'>
              <span class='info'>
                <span class='theme-name' title="<?php echo $theme; ?>">
                  <span class='current-text'><?php echo $lang->ui->currentTheme . '：';?></span>
                  <?php echo $theme;?>
                </span>
              </span>
              <span class='actions'>
                  <?php echo html::a('javascript:void(0);', $lang->ui->template->enable, 'class="btn btn-sm enable"')?>
                  <?php echo html::a($this->createLink('visual', 'design'), '<i class="icon icon-edit"> </i>' . $lang->ui->custom, 'class="btn btn-default text-primary btn-sm custom"')?>
                  <?php if(!in_array("$currentTemplate.$code", $this->config->ui->systemThemes)) commonModel::printLink('ui', 'deleteTheme', "template={$currentTemplate}&theme={$code}", "<span class='icon-delete'></span>", "title='{$lang->delete}' class='btn btn-link deleter' data-type='ajax' data-backdrop='true'") ?>
              </span>
            </div>
          </div>
        </div>
      <?php endforeach;?>
    </section>
    <section class='themes tab-pane import' id='packageSection'>
      <div class='text-center text-muted load-icon' style='padding: 50px'><i class='icon icon-2x icon-spinner icon-spin'></i></div>
    </section>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
