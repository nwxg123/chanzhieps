<?php
if(!isset($lang->guarder)) $lang->guarder = new stdclass();

$lang->guarder->antiSteelingLink = new stdclass();
$lang->guarder->antiSteelingLink->common  = '防盗链';
$lang->guarder->antiSteelingLink->setting = '七牛防盗链设置';
$lang->guarder->antiSteelingLink->function= '防盗链功能';
$lang->guarder->antiSteelingLink->key     = '密钥';
$lang->guarder->antiSteelingLink->expired = '过期时间';

$lang->guarder->antiSteelingLink->statusList = array();
$lang->guarder->antiSteelingLink->statusList['open']   = '开启';
$lang->guarder->antiSteelingLink->statusList['closed'] = '关闭';

$lang->guarder->antiSteelingLink->functionTips = '只提供对七牛防盗链系统支持';
$lang->guarder->antiSteelingLink->keyTips      = '服务商提供的密钥';
$lang->guarder->antiSteelingLink->expiredTips  = '秒';
$lang->guarder->antiSteelingLink->tips         = '防盗链功能采用七牛时间戳防盗链方式，请将资源文件放置在七牛的CDN上。';
