<?php
/**
 * The common english file of XiRangCSM.
 
 * @copyright   Copyright 2009-2011 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     XiRangCSM
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$lang->menu->customer       = 'Customer|customer|admin|';
$lang->menu->faq            = 'FAQ|faq|admin|';
$lang->menu->request        = 'Request|request|admin|';
$lang->menu->question       = 'Questions|ask|managequestions|';
$lang->menu->answer         = 'Answers|ask|manageanswers|';
$lang->menu->requestSetting = 'Settings|request|setting|';

$groups = (array) $lang->groups;

$lang->groups = new stdclass();
foreach($groups as $key => $group)
{
    if($key == 'user') $lang->groups->request = array('title' => 'Req',  'link' => 'requset|admin|', 'icon' => 'exchange');
    $lang->groups->$key = $group;
}

$lang->customer = new stdclass();
$lang->request  = new stdclass();
$lang->faq      = new stdclass();

$lang->requestSetting = new stdclass();
$lang->requestSetting->menu = new stdclass();
$lang->requestSetting->menu->setting  = 'Settings|request|setting|';
$lang->requestSetting->menu->category = 'Category|tree|browse|type=request';
