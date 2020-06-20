<?php
$lang->menuGroups->attribute = 'orderSetting';
$lang->menuGroups->express   = 'orderSetting';

$lang->orderSetting->menu->attribute = array('link' => '属性|attribute|admin|', 'alias' => 'create,edit');
$lang->orderSetting->menu->express   = '快递设置|express|setting|';
$lang->orderSetting->menu->adminapi  = array('link' => '自定义接口|order|adminapi|', 'alias' => 'createapi,editapi');

$lang->site->menu->sms   = '短信配置|sms|index|';
$lang->site->menu->score = array('link' => '积分规则|score|setcounts|', 'alias' => 'setlevel,setsect');

if(isset($lang->userSetting->menu))
{
    $lang->userSetting->menu->score = array('link' => '积分规则|score|setcounts|', 'alias' => 'setlevel,setsect');
}

$lang->order->menu->recharge = '充值订单|order|admin|type=recharge';
