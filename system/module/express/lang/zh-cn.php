<?php
$lang->express = new stdclass();

$lang->express->common      = '物流';
$lang->express->enabledList = '启用的快递';
$lang->express->setting     = '物流设置';

$lang->express->kuaidiCustomer = '快递100 公司编号';
$lang->express->kuaidiKey      = '快递100 appkey';
$lang->express->noTraks        = "<div class='alert alert-warning text-center'><h3>自动获取物流信息失败</h3><a href='%s' target='_blank' class='btn btn-default'>到快递100查看</a></div>";

$lang->express->statusList = new stdclass();
$lang->express->statusList->sending = '运输中';
$lang->express->statusList->picked  = '已揽件';
$lang->express->statusList->problem = '疑难件';
$lang->express->statusList->signed  = '已签收';

$lang->express->deliveryTypes = new stdclass();
$lang->express->deliveryTypes->logistics = '物流';
$lang->express->deliveryTypes->express   = '快递';

$lang->express->placeholder = new stdclass();
$lang->express->placeholder->customer = '请输入您在快递100申请的API的公司编号';
$lang->express->placeholder->appkey   = '请输入您在快递100申请的API的key';
