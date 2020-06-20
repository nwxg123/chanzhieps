<?php
if(!defined('TABLE_USERCASE')) define('TABLE_USERCASE', $config->db->prefix . 'usercase');
if(RUN_MODE == 'admin')
{
    $config->menus->user .= ',usercase,';
    $config->multiEntrances[] = 'usercase_browseadmin';
    $config->multiEntrances[] = 'usercase_setting';
    $config->multiEntrances[] = 'usercase_create';
}

$config->dependence->usercase[]     = 'usercase';

$config->seo->alias->method['usercase']['browse'] = 'browse';  
$config->seo->alias->method['usercase']['view']   = 'view';  

$config->rights->member['user']['cases']    = 'cases';

$config->rights->member['usercase']['edit']        = 'edit';
$config->rights->member['usercase']['create']      = 'create';
$config->rights->member['usercase']['getsiteinfo'] = 'getsiteinfo';

$config->rights->guest['usercase']['index']     = 'index';
$config->rights->guest['usercase']['view']      = 'view';
$config->rights->guest['usercase']['report']    = 'report';
$config->rights->guest['usercase']['browse']    = 'browse';
$config->rights->guest['usercase']['checksnap'] = 'checksnap';
$config->rights->guest['usercase']['setsnap']   = 'setsnap';
