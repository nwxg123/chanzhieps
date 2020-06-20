<?php
if(!defined('EXT_ORDER'))  define('EXT_ORDER',  '`ext_order`');

if(RUN_MODE == 'admin')
{
    $config->menus->shop .= ',gift,';
    $config->multiEntrances[] = 'gift_admin';
}
$config->rights->member['user']['gift'] = 'gift';

$config->rights->member['gift']['payorder']    = 'payorder';
$config->rights->member['gift']['deleteorder'] = 'deleteorder';
$config->rights->member['gift']['receive']     = 'receive';
$config->rights->member['gift']['exchange']    = 'exchange';

$config->rights->guest['gift']['index'] = 'index';
