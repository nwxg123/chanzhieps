<?php if(!defined("RUN_MODE")) die();?>
<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<?php $currentGroup = commonModel::getCurrentGroup($this->moduleName);?>
<?php include 'header.lite.html.php';?>

<?php /* This #header tag is primary navbar fixed on top of current page, see http://xirang.5upm.com/task-view-3071.html */ ?>
<header id='header' class='bg-primary'>
  <ul class='nav pull-left'>
    <li><?php echo html::a(getHomeRoot(zget($this->config->langsShortcuts, $this->app->getClientLang())), '<i class="icon icon-eye-sign"></i> ' . $lang->frontHome, "target='_blank' class='navbar-link'");?></li>
    <li class='dropdown'>
      <?php echo commonModel::getShortcuts('create'); ?>
    </li>
    <li class='dropdown'>
      <?php echo commonModel::getShortcuts(); ?>
    </li>
  </ul>
  <?php echo commonModel::createManagerMenu('nav pull-right');?>
  <ul class='nav pull-right'>
    <li><a href='<?php echo helper::createLink('package', 'browse')?>'><?php echo $lang->proServices?></a></li>
    <li class='divider'></li>
    <li class='dropdown'><?php include 'selectlang.html.php';?></li>
    <li class='divider'></li>
    <li><a href='<?php echo helper::createLink('site', 'sethomemenu')?>' title='<?php echo $lang->settings?>'><i class='icon icon-setting icon-lg'></i></a></li>
    <!--<li><a title='<?php echo $lang->notifications?>' class='has-badge'><i class='icon icon-message icon-lg'></i><span class='label label-badge label-warning'>3</span></a></li>-->
  </ul>
</header>

<?php /* This #navbar tag is left navbar fixed on left of current page, see http://xirang.5upm.com/task-view-3073.html */ ?>
<nav id='navbar'>
  <a id='homeLink' href='<?php echo helper::createLink('admin', 'index')?>'></a>
  <div id='navWrapper'>
    <ul class='nav'>
    <?php
    if(!commonModel::isAvailable('shop'))
    {
      if(!commonModel::isAvailable('product'))
      {
        unset($lang->groups->shop);
      }
      else
      {
        $lang->groups->shop = array('title' => "$lang->productMenu", 'link' => 'product|admin|', 'icon' => 'shopping-cart');
      }
    }

    if(!commonModel::isAvailable('user')) unset($lang->groups->user);
    if(!commonModel::isAvailable('stat')) unset($lang->groups->statistics);

    foreach ($lang->groups as $menuGroup => $groupSetting)
    {
        if($menuGroup == 'home' || empty($groupSetting['title'])) continue;
        $groupMenus = explode(',', $this->config->menus->$menuGroup);

        list($module, $method, $params) = explode('|', $groupSetting['link']);

        $groupClass = $menuGroup == $currentGroup ? 'active' : '';
        $hasSub     = $menuGroup == 'design';

        if($hasSub) $groupClass .= ' has-sub';
        if($hasSub && $currentGroup == $menuGroup) $groupClass .= ' open';

        $groupUrl = $hasSub ? 'javascript:;' : helper::createLink($module, $method, $params);

        echo "<li class='{$groupClass}' data-id='{$menuGroup}'>";
        echo "<a href='{$groupUrl}'> {$groupSetting['title']}</a>";

        if($hasSub)
        {
            $currentMenuGroup = $menuGroup . 'Menus';
            echo "<ul class='nav nav-sub'>";
            foreach($lang->{$currentMenuGroup} as $submenu)
            {
                list($title, $module, $method) = explode('|', $submenu['link']);
                $isActive = (strtolower($method) == strtolower($this->app->methodName) && strtolower($module == $this->app->moduleName)) || (isset($submenu['alias']) && strpos($submenu['alias'], strtolower($this->app->methodName)) !== false);

                echo $isActive ? "<li class='active'>" : "<li>";
                echo html::a(helper::createLink($module, $method), $title);
                echo "</li>";
            }
            echo "</ul>";
        }

        echo "</li>";
    }
    ?>
    </ul>
  </div>
  <?php printf($lang->poweredBy, $config->version, k(), html::image($config->webRoot . 'theme/default/common/images/logo-inverse.png')); ?>
  <div id='navScrollbar'><div class='bar'></div></div>
</nav>

<?php $mainMenu = commonModel::createMainMenu($this->moduleName, $currentGroup);?>
<?php if(!empty($mainMenu) && strpos('ui_others,visual_design,ui_customtheme',$app->moduleName . '_' . $app->methodName) === false): ?>
<?php /* This #mainMenu tag is secondary navbar, see http://xirang.5upm.com/task-view-3117.html */ ?>
<nav id='mainMenu'>
  <div class='container'>
  <?php echo $mainMenu;?>
  </div>
  <?php if($currentGroup == 'design' && strpos('nav_admin,ui_effect,file_browsesource',$app->moduleName . '_' . $app->methodName) === false): ?>
  <?php $this->app->loadLang('ui');?>
  <ul class='nav nav-pills' id='deviceMenu'>
    <li<?php if($this->session->device != 'mobile') echo " class='active'";?>><?php echo html::a($this->createLink('ui', 'setDevice', "device=desktop"), '<i class="icon icon-desktop"></i> ' . $lang->ui->clientDesktop);?></li>
    <li<?php if($this->session->device == 'mobile') echo " class='active'";?>><?php echo html::a($this->createLink('ui', 'setDevice', "device=mobile"), '<i class="icon icon-tablet"></i> ' . $lang->ui->clientMobile);?></li>
  </ul>
  <?php endif; ?>
</nav>
<?php endif; ?>

<div id='main'><?php /* This tag close in footer.admin.html.php */ ?>
  <?php $moduleName = $this->moduleName; ?>
  <?php $menuGroup  = zget($lang->menuGroups, $moduleName);?>
  <?php $moduleMenu = commonModel::createModuleMenu($this->moduleName, '', false);?>
  <?php if($moduleMenu or !empty($treeModuleMenu)):?>
  <?php /* This #mainSidebar is third navbar in current page, see http://xirang.5upm.com/task-view-3115.html */ ?>
  <div id='mainSidebar'>
    <?php if(!empty($moduleMenu)) echo $moduleMenu;?>
    <?php if(!empty($treeModuleMenu)) echo $treeModuleMenu;?>
    <?php if(!empty($treeManageLink)):?>
    <div class='actions text-center'><?php if(commonModel::hasPriv('tree', 'browse')) echo $treeManageLink;?></div>
    <?php endif;?>
  </div>
  <?php endif;?>
  <div id='mainContent'><?php /* This tag close in footer.admin.html.php */ ?>
