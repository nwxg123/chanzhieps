<?php
if(!isset($lang->sms))$lang->sms = new stdclass();
$lang->sms->trySendLater  = '三分钟内不能重复发送短信。';
$lang->sms->noMobile      = '手机不能为空';
$lang->sms->error         = '手机号不合法';
$lang->sms->successSended = '短信发送成功';
$lang->sms->verifyFail    = '请填写正确的验证码';
$lang->sms->checkMobile   = '验证手机';

$lang->sms->checkMobileSuccess = '手机验证成功';

$lang->sms->setSendcloud = '认证短信设置';

$lang->sms->sendcloud = new stdclass();
$lang->sms->sendcloud->smsUser    = '用户名';
$lang->sms->sendcloud->key        = '密钥';
$lang->sms->sendcloud->templateId = '模板ID';
$lang->sms->sendcloud->vars       = '变量名';

$lang->sms->sendcloud->placeholder = new stdclass();
$lang->sms->sendcloud->placeholder->smsUser    = '请输入sendcloud 的SMS_USER';
$lang->sms->sendcloud->placeholder->key        = '请输入sendcloud 的SMS_KEY';
$lang->sms->sendcloud->placeholder->templateId = '请输入sendcloud 的模板ID';
$lang->sms->sendcloud->placeholder->vars       = '请输入您在sendcloud模板里面设置的变量名';
