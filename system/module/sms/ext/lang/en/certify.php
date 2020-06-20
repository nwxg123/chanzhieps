<?php
if(!isset($lang->sms))$lang->sms = new stdclass();
$lang->sms->trySendLater  = 'You can not send message in three minutes.';
$lang->sms->noMobile      = 'Mobile can not be empty';
$lang->sms->error         = 'Mobile is illegal';
$lang->sms->successSended = 'SMS is sent successfully.';
$lang->sms->verifyFail    = 'Please fill in the correct verification code. ';
$lang->sms->checkMobile   = 'Check Mobile';

$lang->sms->checkMobileSuccess = 'Check mobile successfully.';

$lang->sms->setSendcloud = 'Set sendcloud';

$lang->sms->sendcloud = new stdclass();
$lang->sms->sendcloud->smsUser    = 'User';
$lang->sms->sendcloud->key        = 'Key';
$lang->sms->sendcloud->templateId = 'Template ID';
$lang->sms->sendcloud->vars       = 'Variable name';

$lang->sms->sendcloud->placeholder = new stdclass();
$lang->sms->sendcloud->placeholder->smsUser    = 'Please fill in the SMS_USER of sendcloud';
$lang->sms->sendcloud->placeholder->key        = 'Please fill in the SMS_KEY of sendcloud';
$lang->sms->sendcloud->placeholder->templateId = 'Please fill in the templateID of sendcloud';
$lang->sms->sendcloud->placeholder->vars       = 'Please fill in the variable name you set in the sendcloud template.';
