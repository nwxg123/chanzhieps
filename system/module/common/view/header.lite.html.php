<?php if(!defined("RUN_MODE")) die();?>
<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<?php
$webRoot   = $config->webRoot;
$jsRoot    = $webRoot . "js/";
$themeRoot = $webRoot . "theme/default/";
?>
<!DOCTYPE html>
<html lang='<?php echo $app->getClientLang();?>'>
<head profile="http://www.w3.org/2005/10/profile">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Cache-Control"  content="no-transform">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php if($this->app->getModuleName() == 'user' and $this->app->getMethodName() == 'deny'):?>
  <meta http-equiv='refresh' content="5;url='<?php echo helper::createLink($config->default->module);?>'">
  <?php endif;?>
  <?php
  if(!isset($title))   $title    = '';
  if(!empty($title) && !empty($config->site->name))   $title   .= $lang->minus;
  if(empty($keywords)) $keywords = $config->site->keywords;
  if(empty($desc))     $desc     = $config->site->desc;

  echo html::title($title . $config->site->name);
  echo html::meta('keywords',    strip_tags($keywords));
  echo html::meta('description', strip_tags($desc));

  js::exportConfigVars();
  if($config->debug)
  {
      js::import($jsRoot . 'jquery/min.js');
      js::import($jsRoot . 'zui/admin.min.js');
      js::import($jsRoot . 'chanzhi.js');
      js::import($jsRoot . 'my.js');
      js::import($jsRoot . 'my.admin.js');

      css::import($webRoot . 'zui/css/admin.min.css');
      css::import($themeRoot . 'default/admin.css');
  }
  else
  {
      $jsRoot    = $webRoot . "js/";
      $themeRoot = $webRoot . "theme/default/";
      if($this->config->cdn->open == 'open')
      {
          if(!empty($this->config->cdn->site))
          {
              css::import(rtrim($this->config->cdn->site, '/') . '/theme/default/default/chanzhi.all.admin.css');
              js::import(rtrim($this->config->cdn->site, '/')  . '/js/chanzhi.all.admin.js');
          }
          else
          {
              css::import($this->config->cdn->host . $this->config->version . '/theme/default/default/chanzhi.all.admin.css', '', $version = false);
              js::import($this->config->cdn->host  . $this->config->version . '/js/chanzhi.all.admin.js', $version = false);
          }
      }
      else
      {
          css::import($themeRoot . 'default/chanzhi.all.admin.css');
          js::import($jsRoot     . 'chanzhi.all.admin.js');
      }
  }

  if(isset($pageCSS)) css::internal($pageCSS);

  if(!isset($this->config->site->favicon) and file_exists($this->app->getWwwRoot() . 'favicon.ico')) echo html::icon($webRoot . 'favicon.ico');
  if(isset($this->config->site->favicon)) echo html::icon(json_decode($this->config->site->favicon)->webPath);

  echo html::rss($this->createLink('rss', 'index', '', '', 'xml'), $config->site->name);
  ?>
  <!--[if lt IE 9]>
  <?php
  if($config->debug)
  {
      js::import($jsRoot . 'html5shiv/min.js');
      js::import($jsRoot . 'respond/min.js');
  }
  else
  {
      js::import($jsRoot . 'chanzhi.all.ie8.js');
  }
  ?>
  <![endif]-->
  <!--[if lt IE 10]>
  <?php
  if($config->debug)
  {
      js::import($jsRoot . 'jquery/placeholder/min.js');
  }
  else
  {
      js::import($jsRoot . 'chanzhi.all.ie9.js');
  }
  ?>
  <![endif]-->
  <?php js::set('lang', $lang->js);?>
</head>
<body>
