<?php
$lang->menuGroups->attribute = 'orderSetting';
$lang->menuGroups->express   = 'orderSetting';

$lang->orderSetting->menu->attribute = array('link' => 'Attribute|attribute|admin|', 'alias' => 'create,edit');
$lang->orderSetting->menu->express   = 'Express|express|setting|';
$lang->orderSetting->menu->adminapi  = array('link' => 'AdminApi|order|adminapi|', 'alias' => 'createapi,editapi');

$lang->site->menu->sms   = 'Sms Setting|sms|index|';
$lang->site->menu->score = array('link' => 'Score Rule|score|setcounts|', 'alias' => 'setlevel,setsect');

if(isset($lang->userSetting->menu))
{
    $lang->userSetting->menu->score = array('link' => 'Score Rule|score|setcounts|', 'alias' => 'setlevel,setsect');
}

$lang->order->menu->recharge = 'Recharge Order|order|admin|type=recharge';
