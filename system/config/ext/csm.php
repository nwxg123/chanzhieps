<?php
/**
 * The config file of CSM.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Xiying Guan <guanxiying@cnezsoft.com>
 * @package     XiRangCSM
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
if(RUN_MODE == 'admin')
{
    $config->menus->request  = 'request,customer,faq,ask,question,answer,requestSetting,';
}

$config->request = new stdclass();
$config->request->defaultTime = 0;

$config->multiEntrances[] = 'customer_admin';
$config->multiEntrances[] = 'customer_edit';
$config->multiEntrances[] = 'customer_service';
$config->multiEntrances[] = 'tree_browse';
$config->multiEntrances[] = 'request_admin';
$config->multiEntrances[] = 'request_setcategory';
$config->multiEntrances[] = 'request_setting';
$config->multiEntrances[] = 'faq_admin';
$config->multiEntrances[] = 'faq_setting';
$config->multiEntrances[] = 'ask_managequestions';
$config->multiEntrances[] = 'ask_manageanswers';

$config->dependence->comment[] = 'message';
$config->dependence->ask[]     = 'ask';

if(!defined('TABLE_ACTION'))    define('TABLE_ACTION',    $config->db->prefix . 'action');
if(!defined('TABLE_MODULE'))    define('TABLE_MODULE',    $config->db->prefix . 'module');
if(!defined('TABLE_FAQ'))       define('TABLE_FAQ',       $config->db->prefix . 'faq');
if(!defined('TABLE_REQUEST'))   define('TABLE_REQUEST',   $config->db->prefix . 'request');
if(!defined('TABLE_ANSWER'))    define('TABLE_ANSWER',    $config->db->prefix . 'answer');
if(!defined('TABLE_QUESTION'))  define('TABLE_QUESTION',  $config->db->prefix . 'question');
if(!defined('TABLE_USERQUERY')) define('TABLE_USERQUERY', $config->db->prefix . 'userQuery');
if(!defined('TABLE_SERVICE'))   define('TABLE_SERVICE',   $config->db->prefix . 'service');

$config->seo->alias->method['ask']['browse'] = 'index';  
$config->seo->alias->method['ask']['view']   = 'view';  
$config->seo->alias->method['faq']['browse'] = 'index';  

$config->rights->member['request']['browse']  = 'browse';
$config->rights->member['request']['create']  = 'create';
$config->rights->member['request']['edit']    = 'edit';
$config->rights->member['request']['view']    = 'view';
$config->rights->member['request']['doubt']   = 'doubt';
$config->rights->member['request']['valuate'] = 'valuate';

$config->rights->member['ask']['ask']           = 'ask';
$config->rights->member['ask']['threadtoask']   = 'threadtoask';
$config->rights->member['ask']['addscore']      = 'addscore';
$config->rights->member['ask']['setcomment']    = 'setcomment';
$config->rights->member['ask']['answer']        = 'answer';
$config->rights->member['ask']['close']         = 'close';
$config->rights->member['ask']['delete']        = 'delete';
$config->rights->member['ask']['replyanswer']   = 'replyanswer';
$config->rights->member['ask']['editanswer']    = 'editanswer';
$config->rights->member['ask']['setbestanswer'] = 'setbestanswer';
$config->rights->member['ask']['awardanswer']   = 'awardanswer';
$config->rights->member['ask']['setasfaq']      = 'setasfaq';

$config->rights->guest['ask']['browse']  = 'browse';
$config->rights->guest['ask']['view']    = 'view';
$config->rights->guest['ask']['index']   = 'index';

$config->rights->guest['faq']['index'] = 'index';
$config->rights->guest['faq']['view']  = 'view';

if(!isset($filter->ask)) $filter->ask = new stdclass();
$filter->ask->index = new stdclass();
$filter->ask->index->get['keyword'] = 'reg::any';

$filter->customer = new stdclass();
$filter->customer->admin = new stdclass();
$filter->customer->admin->get['admin']    = 'account';
$filter->customer->admin->get['provider'] = 'account';
$filter->customer->admin->get['user']     = 'account';

$filter->faq = new stdclass();
$filter->faq->edit = new stdclass();
$filter->faq->edit->get['objectID'] = 'int';
