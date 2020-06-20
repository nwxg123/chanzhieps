<?php
$lang->express = new stdclass();

$lang->express->common      = '物流';
$lang->express->enabledList = '啟用的快遞';
$lang->express->setting     = '物流設置';

$lang->express->kuaidiCustomer = '快遞100 公司編號';
$lang->express->kuaidiKey      = '快遞100 appkey';
$lang->express->noTraks        = "<div class='alert alert-warning text-center'><h3>自動獲取物流信息失敗</h3><a href='%s' target='_blank' class='btn btn-default'>到快遞100查看</a></div>";

$lang->express->statusList = new stdclass();
$lang->express->statusList->sending = '運輸中';
$lang->express->statusList->picked  = '已攬件';
$lang->express->statusList->problem = '疑難件';
$lang->express->statusList->signed  = '已簽收';

$lang->express->deliveryTypes = new stdclass();
$lang->express->deliveryTypes->logistics = '物流';
$lang->express->deliveryTypes->express   = '快遞';

$lang->express->placeholder = new stdclass();
$lang->express->placeholder->customer = '請輸入您在快遞100申請的API的公司編號';
$lang->express->placeholder->appkey   = '請輸入您在快遞100申請的API的key';
