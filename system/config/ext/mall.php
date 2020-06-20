<?php
if(!defined('TABLE_ATTRIBUTE'))        define('TABLE_ATTRIBUTE',         $config->db->prefix . 'attribute');
if(!defined('TABLE_PRODUCT_ATTRIBUTE'))define('TABLE_PRODUCT_ATTRIBUTE', $config->db->prefix . 'product_attribute');
if(!defined('TABLE_PRODUCT_PRICE'))    define('TABLE_PRODUCT_PRICE',     $config->db->prefix . 'product_price');
if(!defined('TABLE_ORDER_API'))        define('TABLE_ORDER_API',         $config->db->prefix . 'order_api');
if(!defined('TABLE_BALANCE_LOG'))      define('TABLE_BALANCE_LOG',       $config->db->prefix . 'balance_log');

$config->multiEntrances[] = 'express_setting';
$config->multiEntrances[] = 'express_setting';
$config->multiEntrances[] = 'product_setting';
$config->multiEntrances[] = 'attribute_admin';
$config->multiEntrances[] = 'attribute_create';
$config->multiEntrances[] = 'attribute_edit';
$config->multiEntrances[] = 'express_setting';
$config->multiEntrances[] = 'order_adminapi';
$config->multiEntrances[] = 'order_createapi';

$config->rights->member['order']['track']          = 'track';
$config->rights->member['balance']['recharge']     = 'recharge';
$config->rights->member['trade']['browse']         = 'browse';
$config->rights->member['score']['setlevel']       = 'setlevel';
$config->rights->member['order']['paypalcheckout'] = 'paypalcheckout';
$config->rights->member['user']['balance']         = 'balance';

$config->cache->relation[TABLE_CART]['blocks'] = '/';
$config->cache->relation[TABLE_CART]['pages']  = '/';

$filter->order->default->get['contact'] = 'reg::any';
$filter->order->default->get['phone']   = 'phone';
$filter->order->default->get['product'] = 'int';

if(!isset($filter->product)) $filter->product = new stdclass();
if(!isset($filter->product->browse)) $filter->product->browse = new stdclass();
$filter->product->browse->get = 'all';
