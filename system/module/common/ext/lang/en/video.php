<?php
if(!isset($lang->menu)) $lang->menu = new stdclass();
$lang->menu->video = 'Video|article|admin|type=video';

/* Menu of video module. */
if(!isset($lang->video)) $lang->video = new stdclass();
if(!isset($lang->video->menu)) $lang->video->menu = new stdclass();
$lang->video->menu->browse = 'Video List|article|admin|type=video';

$lang->security->menu->antiSteelingLink = 'Set Anti-Leech|guarder|antiSteelingLink|';
