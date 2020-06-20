<?php if(!defined("RUN_MODE")) die();?>
<?php $templates       = $this->loadModel('ui')->getTemplates(); ?>
<?php $currentTemplate = $this->config->template->{$this->app->clientDevice}->name; ?>
<?php $currentTheme    = $this->config->template->{$this->app->clientDevice}->theme; ?>
<?php $currentDevice   = $this->session->device ? $this->session->device : 'desktop';?>
<?php include "header.html.php"; ?>
<?php
js::set('visuals', $config->visual->setting);
js::set('visualsLang', $lang->visual->setting);
js::set('visualLang', $lang->visual->js);
js::set('visualStyle', $themeRoot . 'common/visual.css');
js::set('zuiJsUrl', $jsRoot . 'zui/min.js');
js::set('zuiAdminJsUrl', $jsRoot . 'zui/admin.min.js');
js::set('jQueryUrl', $jsRoot . 'jquery/min.js');
js::set('visualBlocks', $blocks);
js::set('debug', $config->debug);
$frontDevice = $this->cookie->visualDevice ? $this->cookie->visualDevice : $this->app->clientDevice;
js::set('device', $frontDevice);
?>
<div class='navbar navbar-fixed-top' id='visualPanel'>
  <div class='container' id='menu'>
    <ul class='nav navbar-nav nav-main'>
      <li class='dropdown'>
        <?php
        $clientLang  = $this->app->getClientLang();
        $enableLangs = explode(',', $config->enabledLangs);
        $enableLangs = array_flip($enableLangs);
        $langs       = $config->langs;
        foreach($langs as $key => $value)
        {
            if(!isset($enableLangs[$key])) unset($langs[$key]);
        }
        if(count($langs) > 1):
        ?>
        <a href='###' class='dropdown-toggle' data-toggle='dropdown'><?php echo $langs[$clientLang]?><i class='icon icon-caret-lg-down'></i></a>
        <ul class='dropdown-menu'>
          <?php unset($langs[$clientLang]); ?>
          <?php foreach($langs as $langKey => $currentLang): ?>
          <li>
            <?php echo "<a rel='nofollow' href='javascript:selectLang(\"$langKey\")'>$currentLang</a>"; ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php endif;?>
      </li>
      <li class="divider"></li>
      <li class='nav-item-primary'>
        <?php $mobileTemplate = isset($this->config->site->mobileTemplate) ? $this->config->site->mobileTemplate : 'close';?>
        <?php if($mobileTemplate == 'close'):?>
        <?php echo html::a('javascript:;', $lang->ui->deviceList->desktop);?>
        <?php else:?>
        <a href='javascript:;' data-toggle='dropdown' class='dropdown-toggle'>
          <?php echo $lang->ui->deviceList->{$currentDevice};?><i class='icon icon-caret-lg-down'></i>
        </a>
        <ul id='deviceMenu' class='dropdown-menu'>
          <?php foreach($lang->ui->deviceList as $device => $name):?>
          <?php $class = $device == $currentDevice ? "class='active'" : '';?>
          <li <?php echo $class;?>><a href='###' data-href='<?php echo helper::createLink('ui', 'setdevice', "device={$device}&fromVisual=1")?>' class='ve-change-device'><i class='icon icon-<?php echo $device;?>'></i><?php echo $name;?><i class='icon icon-check'></i></a></li>
          <?php endforeach;?>
        </ul>
        <?php endif;?>
      </li>
      <li class="nav-right"><i class='icon icon-angle-lg-right'></i></li>
      <li class='menu-theme-picker'>
        <a href='javascript:;' data-toggle='dropdown' class='dropdown-toggle'><span class='menu-template-name'><?php echo $templates[$currentTemplate]['name'];?></span><i class="icon icon-angle-right"></i><span class='menu-theme-name'><?php echo $templates[$currentTemplate]['themes'][$currentTheme]?></span><i class='icon icon-caret-lg-down'></i></a>
        <div class='dropdown-menu theme-picker-dropdown'>
          <div class='theme-picker' data-template='<?php echo $currentTemplate?>' data-theme='<?php echo $currentTheme?>'>
            <div class='menu-templates'>
              <ul class='nav'>
                <?php $templateThemes = ''; ?>
                <?php foreach($templates as $code => $tpl):?>
                <?php
                $isCurrent    = $currentTemplate == $code;
                $themeName    = $isCurrent ? $currentTheme : 'default';
                $themesList   = '';
                ?>
                <li class='menu-template <?php if($isCurrent) echo 'active';?>' data-template='<?php echo $code; ?>'>
                  <?php commonModel::printLink('ui', 'settemplate', "template={$code}&theme={$themeName}", $tpl['name']) ?>
                </li>
                <?php
                foreach($tpl['themes'] as $theTheme => $name)
                {
                    $selectThemeUrl = $this->createLink('ui', 'setTemplate', "template={$code}&theme={$theTheme}");
                    $themeClass = $isCurrent && $currentTheme == $theTheme ? 'current' : '';
                    $themesList .= "<div class='theme menu-theme {$themeClass}' data-url='{$selectThemeUrl}' data-theme='{$theTheme}'><div class='theme-card'><i class='icon-ok icon'></i>";
                    $themesList .= "<div class='theme-img'>" . html::image($themeRoot . $theTheme . '/preview.png', "alt={$theTheme}") . '</div>';
                    $themesList .= "<div class='theme-name'>{$name}</div>";
                    $themesList .= '</div></div>';
                }
                ?>
                <?php $templateThemes .= "<div class='menu-themes clearfix" . ($isCurrent ? ' show' : '') . "' data-template='{$code}'>" . $themesList . '</div>'; ?>
                <?php endforeach;?>
              </ul>
              <div class='actions'>
                <?php commonModel::printLink('ui', 'setTemplate', '', '<i class="icon icon-setting"></i> ' . $lang->ui->manageTemplate, "target='_blank'")?>
              </div>
            </div>
            <div class='menu-themes-list'>
              <?php echo $templateThemes; ?>
            </div>
          </div>
          <div class='theme-picker-toolbar clearfix'>
            <ul class='nav'>
              <li><?php commonModel::printLink('ui', 'themestore',  '', '<i class="icon icon-apps"></i> ' . $lang->ui->themeStore, "target='_blank'")?></li>
              <li><?php commonModel::printLink('ui', 'exportTheme', '', '<i class="icon icon-download"></i> ' . $lang->ui->exportTheme, "data-toggle='modal' data-width='600'")?></li>
            </ul>
            <ul class='nav pull-right'>
              <li><?php commonModel::printLink('ui', 'setTemplate', '', '' . $lang->ui->manageTheme, "target='_blank'")?></li>
            </ul>
          </div>
        </div>
      </li>
      <li class="divider"></li>
      <li><?php commonModel::printLink('ui', 'customtheme', '', '<i class="icon icon-setting"></i>', "id='customThemeBtn' data-toggle='tooltip' data-placement='bottom' title='{$lang->visual->customTheme}'") ?></li>
      <li><a href='###' id='visualPageName' target='_blank' data-toggle='tooltip' data-placement='bottom' title='<?php echo $lang->visual->openInNewWindow?>'><i class='icon icon-clone'></i></a></li>
      <li id='pageLayoutSelector'>
        <a href='###' data-toggle='dropdown'><span class='layout-type-name'><?php echo $lang->visual->globalLayout; ?></span> <span class='icon icon-info-sign'></span></a>
        <ul class='dropdown-menu'>
          <li class='active hidden' data-type='global'>
            <a href='###'><i class='icon icon-check'></i><strong><?php echo $lang->visual->globalLayout ?></strong><small class='text-muted'><?php echo $lang->visual->globalLayoutInfo ?></small></a>
          </li>
          <li data-type='page'>
            <a href='###'><i class='icon icon-check'></i><strong><?php echo $lang->visual->pageLayout ?></strong><small class='text-muted'><?php echo $lang->visual->pageLayoutInfo ?></small></a>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav pull-right">
      <li><a href='###' id='visualReloadBtn'><i class='icon icon-reload'> </i><?php echo $lang->visual->reload?></a></li>

      <li><a href='###' id='visualPreviewBtn'><i class='icon icon-eye'></i> <?php echo $lang->visual->preview?></a></li>
      <li>
        <?php commonModel::printLink('admin', 'index', '', '<i class="icon-cogs"></i> ' . $lang->visual->admin, "target='_blank'") ?>
      </li>
    </ul>
  </div>
  <a href='<?php echo $referer;?>' class='close' id='visualExitBtn' data-toggle='tooltip' data-placement='left' title='<?php echo $lang->visual->exitVisualEdit;?>'>&times;</a>
</div>
<div id='visualPageWrapper'>
  <iframe id='visualPage' name='visualPage' src='<?php echo empty($referer) ? '/' : $referer;?>' frameborder='no' allowtransparency='true' scrolling='auto' hidefocus='' style='width: 100%; height: 100%; left: 0; top: 0'></iframe>
</div>
<?php include "footer.html.php"; ?>
