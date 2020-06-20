<?php
/**
 * The common simplified chinese file of XiRangCSM.
 
 * @copyright   Copyright 2009-2011 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     XiRangCSM
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$lang->menu->customer       = '客户|customer|admin|';
$lang->menu->faq            = 'FAQ|faq|admin|';
$lang->menu->request        = '工单|request|admin|';
$lang->menu->question       = '问题|ask|managequestions|';
$lang->menu->answer         = '回答|ask|manageanswers|';
$lang->menu->requestSetting = '设置|request|setting|';

$groups = (array) $lang->groups;

$lang->groups = new stdclass();
foreach($groups as $key => $group)
{
    if($key == 'user') $lang->groups->request = array('title' => '工单',  'link' => 'requset|admin|', 'icon' => 'exchange');
    $lang->groups->$key = $group;
}

$lang->customer = new stdclass();
$lang->request  = new stdclass();
$lang->faq      = new stdclass();

$lang->requestSetting = new stdclass();
$lang->requestSetting->menu = new stdclass();
$lang->requestSetting->menu->setting  = '工单设置|request|setting|';
$lang->requestSetting->menu->category = '工单分类|tree|browse|type=request';
