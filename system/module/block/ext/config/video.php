<?php
if(!isset($config->block)) $config->block = new stdclass();
if(!isset($config->block->categoryList)) $config->block->categoryList = new stdclass();
if(!isset($config->block->categoryGroups)) $config->block->categoryGroups = new stdclass();

$config->block->categoryList->article .= ',latestVideo,hotVideo,videoTree,';

if(!isset($config->block->pageGroupList)) $config->block->pageGroupList = new stdclass();
$config->block->pageGroupList->content[] = 'video_browse';
$config->block->pageGroupList->content[] = 'video_view';

if(!isset($config->block->categoryGroups->article['video'])) $config->block->categoryGroups->article['video'] = '';
$config->block->categoryGroups->article['video'] .= ',latestVideo,hotVideo,videoTree,';

if(!isset($config->block->defaultIcons)) $config->block->defaultIcons = array();
$config->block->defaultIcons['latestVideo'] = 'icon-list-ul';
$config->block->defaultIcons['hotVideo']    = 'icon-list-ul';
$config->block->defaultIcons['videoTree']   = 'icon-folder-close';

$config->block->defaultMoreUrl['latestVideo'] = '';
$config->block->defaultMoreUrl['hotVideo']    = '';
