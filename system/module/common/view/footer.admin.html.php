<?php if(!defined("RUN_MODE")) die();?>
<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
</div><?php /* Close #mainContent tag in header.admin.html.php */ ?>
</div><?php /* Close #main tag in header.admin.html.php */ ?>
<nav id='bottomBar'>
  <ul class='nav pull-right'>
    <?php
    $chanzhiVersion                   = $config->version;
    $isProVersion                     = strpos($chanzhiVersion, 'pro') !== false;
    if($isProVersion) $chanzhiVersion = str_replace('pro', '', $chanzhiVersion);
    $icon = 'icon-chanzhi';
    if($isProVersion) $icon = 'icon-chanzhi-pro';
    if($this->app->clientLang == 'en') $icon = 'icon-zsite';
    if($this->app->clientLang == 'en' and $isProVersion) $icon = 'icon-zsite-pro';
    ?>
    <li><?php printf($lang->poweredBy, $config->version, k(), "<span class='" . $icon . "'></span> <span class='name'>" . $lang->chanzhiEPSx . '</span>' . $chanzhiVersion);?></li>
  </ul>
</nav>

<?php
if($config->debug) js::import($jsRoot . 'jquery/form/min.js');
if(isset($pageJS)) js::execute($pageJS);

/* Load hook files for current page. */
$extPath      = dirname(dirname(dirname(__FILE__))) . '/common/ext/view/';
$extHookRule  = $extPath . 'footer.admin.*.hook.php';
$extHookFiles = glob($extHookRule);
if($extHookFiles) foreach($extHookFiles as $extHookFile) include $extHookFile;
/* Load hook file for site.*/
$siteExtPath  = dirname(dirname(dirname(__FILE__))) . "/common/ext/_{$this->app->siteCode}/view/";
$extHookRule  = $siteExtPath . 'footer.admin.*.hook.php';
$extHookFiles = glob($extHookRule);
if($extHookFiles) foreach($extHookFiles as $extHookFile) include $extHookFile;
?>
<?php if($this->app->user->account != 'guest' and commonModel::isAvailable('score') and (!isset($this->config->site->resetMaxLoginDate) or $this->config->site->resetMaxLoginDate < date('Y-m-d'))):?>
<script>$.get(createLink('score', 'resetMaxLogin'));</script>
<?php endif;?>
</body>
</html>
