<?php
if(!defined('TABLE_ACCESS')) define('TABLE_ACCESS', $config->db->prefix . 'access');

$config->rights->guest['help']['sect']        = 'sect';
$config->rights->guest['score']['sectrule']   = 'sectrule';

$config->rights->member['score']['buyobject'] = 'buyobject';
$config->rights->member['user']['changesect'] = 'changesect';

$config->rights->admin['access']['setaccess'] = 'setaccess';
$config->rights->admin['score']['setsect']    = 'setsect';

$config->dependence->sect[] = 'sect';
$config->dependence->sect[] = 'score';

$config->multiEntrances[] = 'product_setdiscount';
