<?php
if(!isset($lang->menu)) $lang->menu = new stdclass();
$lang->menu->video = '视频|article|admin|type=video';

/* Menu of video module. */
if(!isset($lang->video)) $lang->video = new stdclass();
if(!isset($lang->video->menu)) $lang->video->menu = new stdclass();
$lang->video->menu->browse = '视频类目|article|admin|type=video';

$lang->security->menu->antiSteelingLink = '视频防盗链|guarder|antiSteelingLink|';
