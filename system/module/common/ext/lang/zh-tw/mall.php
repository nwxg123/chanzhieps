<?php
$lang->menuGroups->attribute = 'orderSetting';

$lang->orderSetting->menu->attribute    = array('link' => '屬性|attribute|admin|', 'alias' => 'create,edit');
$lang->orderSetting->menu->express      = '快遞|express|setting|';
$lang->orderSetting->menu->adminapi     = array('link' => '自定義介面|order|adminapi|', 'alias' => 'createapi,editapi');

$lang->interface->menu->sms       = '短信配置|sms|index|';

$lang->score->menu->score       = array('link' => '積分規則|score|setcounts|', 'alias' => 'setlevel,setsect');
if(isset($lang->userSetting->menu))
{
    $lang->userSetting->menu->score = array('link' => '積分規則|score|setcounts|', 'alias' => 'setlevel,setsect');
}

$lang->mallsetting = new stdclass();
$lang->mallsetting->menu = new stdclass();
$lang->mallsetting->menu->setting      = '設置|product|setting|';
$lang->mallsetting->menu->attribute    = array('link' => '屬性|attribute|admin|', 'alias' => 'create,edit');
$lang->mallsetting->menu->express      = '快遞|express|setting|';
$lang->mallsetting->menu->adminapi     = array('link' => '自定義介面|order|adminapi|', 'alias' => 'createapi,editapi');

$lang->menu->mallsetting = '商城|product|setting|';
