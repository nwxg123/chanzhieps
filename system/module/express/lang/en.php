<?php
$lang->express = new stdclass();

$lang->express->common      = 'Express';
$lang->express->enabledList = 'Express Enabled';
$lang->express->setting     = 'Express Setting';

$lang->express->kuaidiCustomer = 'Kuaidi100 Customer';
$lang->express->kuaidiKey      = 'Kuaidi100 Appkey';
$lang->express->noTraks        = "<div class='alert alert-warning text-center'><h3>Fail to get the informatio of the express.</h3><a href='%s' target='_blank' class='btn btn-default'>Go check in Kuaidi100</strong>   </div>";

$lang->express->statusList = new stdclass();
$lang->express->statusList->sending = 'Delivering';
$lang->express->statusList->picked  = 'Picked';
$lang->express->statusList->problem = 'Problem';
$lang->express->statusList->signed  = 'Signed';

$lang->express->deliveryTypes = new stdclass();
$lang->express->deliveryTypes->logistics = 'Transport';
$lang->express->deliveryTypes->express   = 'Express';

$lang->express->placeholder = new stdclass();
$lang->express->placeholder->customer = 'Please enter the company ID you have applied';
$lang->express->placeholder->appkey   = 'Please enter the key you have applied';
