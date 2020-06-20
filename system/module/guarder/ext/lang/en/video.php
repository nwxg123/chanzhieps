<?php
if(!isset($lang->guarder)) $lang->guarder = new stdclass();

$lang->guarder->antiSteelingLink = new stdclass();
$lang->guarder->antiSteelingLink->common  = 'Anti-Stealing';
$lang->guarder->antiSteelingLink->setting = 'Qiniu Anti-Stealing Link';
$lang->guarder->antiSteelingLink->function= 'Anti-Stealing';
$lang->guarder->antiSteelingLink->key     = 'Key';
$lang->guarder->antiSteelingLink->expired = 'Disable Time';

$lang->guarder->antiSteelingLink->statusList = array();
$lang->guarder->antiSteelingLink->statusList['open']   = 'On';
$lang->guarder->antiSteelingLink->statusList['closed'] = 'Off';

$lang->guarder->antiSteelingLink->functionTips = 'Qiniu Anti-Stealing Link Only';
$lang->guarder->antiSteelingLink->keyTips      = 'Key provider by service provider';
$lang->guarder->antiSteelingLink->expiredTips  = 'Second';
$lang->guarder->antiSteelingLink->tips         = 'Please store your file on CDN of Qiniu, as Changer uses features of Qiniu Anti-Stealing Link.';
