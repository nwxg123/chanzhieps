<?php
$config->rights->guest['mail']['apisendcode']   = 'apisendcode';
$config->rights->guest['mail']['apicertify']    = 'apicertify';
$config->rights->guest['sms']['apisendcode']    = 'apisendcode';
$config->rights->guest['sms']['apicertify']     = 'apicertify';
$config->rights->guest['user']['secretkey']     = 'secretkey';
$config->rights->guest['user']['apisetcompany'] = 'apisetcompany';

$config->rights->member['user']['certify']        = 'certify'; 
$config->rights->member['user']['setmobile']      = 'setmobile';
$config->rights->member['user']['checkmobile']    = 'checkmobile'; 
$config->rights->member['sms']['sendcertifycode'] = 'sendcertifycode';
$config->rights->member['user']['upload']         = 'upload';
$config->rights->member['user']['mail']           = 'mail';
$config->rights->member['user']['saveidcard']     = 'saveidcard';
$config->rights->member['user']['savebusiness']   = 'savebusiness';

if(!defined('TABLE_CERTIFY')) define('TABLE_CERTIFY', $config->db->prefix . 'certify');
if(RUN_MODE == 'admin')
{
    $config->menus->user .= ',review';
    $config->menuGroups->review = 'user';
}

$config->dependence->mobileCertify[]   = 'mobileCertify';
$config->dependence->realnameCertify[] = 'realnameCertify';
$config->dependence->companyCertify[]  = 'companyCertify';

$filter->mail = new stdclass();
$filter->sms  = new stdclass();

$filter->mail->apicertify = new stdclass();
$filter->sms->apicertify  = new stdclass();

$filter->mail->apicertify->get['u'] = 'account';
$filter->sms->apicertify->get['u']  = 'account';

$filter->user->apisetcompany = new stdclass();
$filter->user->apisetcompany->get['u'] = 'account';

$filter->user->secretkey = new stdclass();
$filter->user->secretkey->get['u'] = 'account';

$filter->user->default->get['emailCertified']  = 'equal::1';
$filter->user->default->get['mobileCertified'] = 'equal::1';

$filter->user->review = new stdclass();
$filter->user->review->get['status'] = 'reg::word';
