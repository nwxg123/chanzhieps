<?php
if(!isset($lang->block)) $lang->block = new stdclass();
if(!isset($lang->block->default)) $lang->block->default = new stdclass();
if(!isset($lang->block->mobile))  $lang->block->mobile  = new stdclass();
if(!isset($lang->block->default->regions)) $lang->block->default->regions = new stdclass();
if(!isset($lang->block->default->layout))  $lang->block->default->layout  = new stdclass();
if(!isset($lang->block->mobile->layout))   $lang->block->default->layout  = new stdclass();

$lang->block->default->typeList['latestVideo']   = 'Latest Video';
$lang->block->default->typeList['hotVideo']      = 'Hot Video';
$lang->block->default->typeList['videoTree']     = 'Video Tree';

$lang->block->default->typeGroups['latestVideo'] = 'article';
$lang->block->default->typeGroups['hotVideo']    = 'article';
$lang->block->default->typeGroups['videoTree']   = 'category';

/* Lang config of the video layout in default. */
$lang->block->default->pages['video_browse'] = 'Video Browse';
$lang->block->default->pages['video_view']   = 'Video View';

$lang->block->default->regions->video_browse['topBanner']    = 'TopBanner';
$lang->block->default->regions->video_browse['top']          = 'Top';
$lang->block->default->regions->video_browse['bottom']       = 'Bottom';
$lang->block->default->regions->video_browse['side']         = 'Side';
$lang->block->default->regions->video_browse['bottomBanner'] = 'BottomBanner';

$lang->block->default->regions->video_view['topBanner']    = 'TopBanner';
$lang->block->default->regions->video_view['top']          = 'Top';
$lang->block->default->regions->video_view['bottom']       = 'Bottom';
$lang->block->default->regions->video_view['side']         = 'Side';
$lang->block->default->regions->video_view['bottomBanner'] = 'BottomBanner';

/* Lang config of the video layout under mobile. */
$lang->block->mobile->pages['video_browse'] = 'Video Browse';
$lang->block->mobile->pages['video_view']   = 'Video View';

$lang->block->mobile->regions->video_browse['top']    = 'Top';
$lang->block->mobile->regions->video_browse['bottom'] = 'Bottom';

$lang->block->mobile->regions->video_view['top']    = 'Top';
$lang->block->mobile->regions->video_view['bottom'] = 'Bottom';

$lang->block->default->layout->video_browse = array();
$lang->block->default->layout->video_browse = isset($lang->block->default->layout->article_browse) ? $lang->block->default->layout->article_browse : '';

$lang->block->default->layout->video_view   = array();
$lang->block->default->layout->video_view   = isset($lang->block->default->layout->video_browse) ? $lang->block->default->layout->video_browse : '';

$lang->block->mobile->layout->video_browse = array();
$lang->block->mobile->layout->video_browse = isset($lang->block->mobile->layout->article_browse) ? $lang->block->mobile->layout->article_browse : '';

$lang->block->mobile->layout->video_view   = array();
$lang->block->mobile->layout->video_view   = isset($lang->block->mobile->layout->video_browse) ? $lang->block->mobile->layout->video_browse : '';
