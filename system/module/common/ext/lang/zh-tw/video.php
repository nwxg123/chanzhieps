<?php
if(!isset($lang->menu)) $lang->menu = new stdclass();
$lang->menu->video = '視頻|article|admin|type=video';

/* Menu of video module. */
if(!isset($lang->video)) $lang->video = new stdclass();
if(!isset($lang->video->menu)) $lang->video->menu = new stdclass();
$lang->video->menu->browse = '視頻列表|article|admin|type=video';

$lang->security->menu->antiSteelingLink = '視頻防盜鏈|guarder|antiSteelingLink|';
