<?php
if(!isset($lang->sms))$lang->sms = new stdclass();
$lang->sms->trySendLater  = '三分鐘內不能重復發送短信。';
$lang->sms->noMobile      = '手機不能為空';
$lang->sms->error         = '手機號不合法';
$lang->sms->successSended = '短信發送成功';
$lang->sms->verifyFail    = '請填寫正確的驗證碼';
$lang->sms->checkMobile   = '驗證手機';

$lang->sms->checkMobileSuccess = '手機驗證成功';

$lang->sms->setSendcloud = '認證短信設置';

$lang->sms->sendcloud = new stdclass();
$lang->sms->sendcloud->smsUser    = '用戶名';
$lang->sms->sendcloud->key        = '密鑰';
$lang->sms->sendcloud->templateId = '模板ID';
$lang->sms->sendcloud->vars       = '變量名';

$lang->sms->sendcloud->placeholder = new stdclass();
$lang->sms->sendcloud->placeholder->smsUser    = '請輸入sendcloud 的SMS_USE';
$lang->sms->sendcloud->placeholder->key        = '請輸入sendcloud 的SMS_KEY';
$lang->sms->sendcloud->placeholder->templateId = '請輸入sendcloud 的模板ID';
$lang->sms->sendcloud->placeholder->vars       = '請輸入您在sendcloud模板裏面設置的變量名';
