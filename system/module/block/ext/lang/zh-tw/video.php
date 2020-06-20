<?php
if(!isset($lang->block)) $lang->block = new stdclass();
if(!isset($lang->block->default)) $lang->block->default = new stdclass();
if(!isset($lang->block->default->regions)) $lang->block->default->regions = new stdclass();
if(!isset($lang->block->default->layout)) $lang->block->default->layout = new stdclass();

$lang->block->default->typeList['latestVideo']   = '最新視頻';
$lang->block->default->typeList['hotVideo']      = '熱門視頻';
$lang->block->default->typeList['videoTree']     = '視頻分類';

$lang->block->default->typeGroups['latestVideo'] = 'article';
$lang->block->default->typeGroups['hotVideo']    = 'article';
$lang->block->default->typeGroups['videoTree']   = 'category';

/* Lang config of the video layout in default. */
$lang->block->default->pages['video_browse'] = '视频列表页面';
$lang->block->default->pages['video_view']   = '视频详情页面';

$lang->block->default->regions->video_browse['topBanner']    = '上部通欄';
$lang->block->default->regions->video_browse['top']          = '上部';
$lang->block->default->regions->video_browse['bottom']       = '底部';
$lang->block->default->regions->video_browse['side']         = '側邊';
$lang->block->default->regions->video_browse['bottomBanner'] = '底部通欄';

$lang->block->default->regions->video_view['topBanner']    = '上部通欄';
$lang->block->default->regions->video_view['top']          = '上部';
$lang->block->default->regions->video_view['bottom']       = '底部';
$lang->block->default->regions->video_view['side']         = '側邊';
$lang->block->default->regions->video_view['bottomBanner'] = '底部通欄';

/* Lang config of the video layout under mobile. */
$lang->block->mobile->pages['video_browse'] = '視頻列表頁面';
$lang->block->mobile->pages['video_view']   = '視頻詳情頁面';

$lang->block->mobile->regions->video_browse['top']    = '上部';
$lang->block->mobile->regions->video_browse['bottom'] = '底部';

$lang->block->mobile->regions->video_view['top']    = '上部';
$lang->block->mobile->regions->video_view['bottom'] = '底部';

$lang->block->default->layout->video_browse = array();
$lang->block->default->layout->video_browse[] = array('type' => 'placeholder', 'name' => 'page_header');
$lang->block->default->layout->video_browse[] = array('type' => 'placeholder', 'name' => 'breadcrumb');
$lang->block->default->layout->video_browse[] = array('type' => 'grid', 'name' => 'topBanner');

$lang->block->default->layout->video_view = array();
$lang->block->default->layout->video_view = $lang->block->default->layout->video_browse;
