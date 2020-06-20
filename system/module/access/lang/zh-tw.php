<?php
$lang->access = new stdclass();
$lang->access->setAccess     = '訪問權限';
$lang->access->score         = '消耗積分';
$lang->access->levelScore    = '會員等級';
$lang->access->level         = '會員等級';
$lang->access->certification = '會員認證';
$lang->access->identity      = '訪問身份';
$lang->access->denied        = '對不起，訪問受限！';
$lang->access->payByScore    = '使用積分訪問';
$lang->access->ignoreLevel   = '低級會員可用積分訪問';

$lang->access->identityList = array();
$lang->access->identityList['guest'] = '公共';
$lang->access->identityList['user']  = '會員';

$lang->access->certificationList = array();
$lang->access->certificationList['mail']   = '郵箱'; 
//$lang->access->certificationList['mobile'] = '手機'; 

$lang->access->require = new stdclass();
$lang->access->require->login         = '您要訪問的內容需要登錄後才能訪問。';
$lang->access->require->higherLevel   = "您要訪問的內容需要 <strong>%s </strong>會員才能訪問。";
$lang->access->require->costScore     = "您要訪問的內容需要花費<strong>%s</strong>個積分才能訪問。";
$lang->access->require->needScore     = "您要訪問的內容需要花費積分才能訪問。";
$lang->access->require->contactUs     = "如有其他疑問請<a href='%s' target='_blank' class='text-primary'>聯繫我們</a>。";
$lang->access->require->certification = '您要訪問的內容需要通過<strong>會員%s認證</strong>後才能訪問。';
