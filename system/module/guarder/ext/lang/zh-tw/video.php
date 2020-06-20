<?php
if(!isset($lang->guarder)) $lang->guarder = new stdclass();

$lang->guarder->antiSteelingLink = new stdclass();
$lang->guarder->antiSteelingLink->common  = '防盜鏈';
$lang->guarder->antiSteelingLink->setting = '七牛防盜鏈設置';
$lang->guarder->antiSteelingLink->function= '防盜鏈功能';
$lang->guarder->antiSteelingLink->key     = '密鑰';
$lang->guarder->antiSteelingLink->expired = '過期時間';

$lang->guarder->antiSteelingLink->statusList = array();
$lang->guarder->antiSteelingLink->statusList['open']   = '開啟';
$lang->guarder->antiSteelingLink->statusList['closed'] = '關閉';

$lang->guarder->antiSteelingLink->functionTips = '只提供對七牛防盜鏈系統支持';
$lang->guarder->antiSteelingLink->keyTips      = '服務商提供的密鑰';
$lang->guarder->antiSteelingLink->expiredTips  = '秒';
$lang->guarder->antiSteelingLink->tips         = '防盜鏈功能採用七牛時間戳防盜鏈方式，請將資源檔案放置在七牛的CDN上。';
