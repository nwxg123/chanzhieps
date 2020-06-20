<?php
if(!isset($config->dependence)) $config->dependence = new stdclass();
$config->dependence->video[] = 'video';
/* cache */
$config->cache->cachedPages .= ',video.browse,';

$config->cache->relation[TABLE_ARTICLE]['blocks'] .= ',latestvideo,hotvideo,';
$config->cache->relation[TABLE_ARTICLE]['pages']  .= ',video.browse,';

$config->cache->relation[TABLE_CATEGORY]['blocks'] .= ',latestvideo,hotvideo,videotree,';
$config->cache->relation[TABLE_CATEGORY]['pages']  .= ',video.browse,';

$config->cache->relation[TABLE_FILE]['blocks'] .= ',latestvideo,hotvideo,videotree,';
$config->cache->relation[TABLE_FILE]['pages']  .= ',video.browse,';

$config->cache->relation[TABLE_RELATION]['blocks'] .= ',latestvideo,hotvideo,';

/* menu */
if(RUN_MODE == 'admin')
{
    if(!isset($config->menus)) $config->menus = new stdclass();
    if(!isset($config->menuGroups)) $config->menuGroups = new stdclass();

    $config->menus->content   .= ',video';
    $config->menuGroups->video = 'content';
}

if(!isset($config->menuDependence)) $config->menuDependence = new stdclass();
$config->menuDependence->video = 'video';

/* seo */
if(!isset($config->seo)) $config->seo = new stdclass();
if(!isset($config->seo->alias)) $config->seo->alias = new stdclass();

$config->seo->alias->method['video']['browse'] = 'browse';  
$config->seo->alias->method['video']['view']   = 'view';  

/* rights */
$config->rights->guest['video']['index']         = 'index';
$config->rights->guest['video']['browse']        = 'browse';
$config->rights->guest['video']['view']          = 'view';
$config->rights->guest['video']['updateviews']   = 'updateViews';

if(!isset($filter->video)) $filter->video = new stdclass();
if(!isset($filter->video->view)) $filter->video->view = new stdclass();
$filter->video->view->cookie['cmts'] = 'reg::any';

if(!isset($filter->video->browse)) $filter->video->browse = new stdclass();
$filter->video->browse->cookie['articleOrderBy'] = 'array';

